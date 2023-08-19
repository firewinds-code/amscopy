<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use App\Models\ams_info;
use App\Models\ams_info_log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\VehicleQuestion;
use App\Models\VehicleDetails;
use App\Models\GeneralDetails;
use App\Models\DocumentStatus;
use App\Models\Post_App_Stage;
use App\Models\Pre_App_Stage;
use App\Models\Repair_Stage;
use App\Models\Post_Approval_Delay_Analysis;
use App\Models\Pre_App_Delay;
use App\Models\Repair_Delay;
use App\Models\UserLog;
use App\Models\ExceptionLog;

class ComplaintController extends Controller
{
    /****************************************** Home 2 ************************************************/
    
    public function __construct(ams_info $info, UserLog $userLog, ams_info_log $amsinfo)
    {
        $this->middleware('auth');
        $this->info = $info;
        $this->userLog = $userLog;
        $this->amsinfo = $amsinfo;
    }
    
    public function index()
    {
        try 
        {
            $data['finalData'] = DB::select("Select * from complaint");
            return view('create_complaint',$data);
        } 
        catch (\Exception $ex)
        {
            $notification = array(
            'message' => $ex->getMessage().' Line: '.$ex->getLine(),
            'alert-type' => 'error' );
            return back()->with($notification);
        }
    }
    
    public function complaintList()
    {
        try 
        {
            $agent_id = Auth::user()->id;
            $data['finalData'] = ams_info::get();
            return view('complaint_list',$data);
        } 
        catch (\Exception $ex)
        {
            $notification = array(
            'message' => $ex->getMessage().' Line: '.$ex->getLine(),
            'alert-type' => 'error');
            return back()->with($notification);
        }
    }
     
    public function complaintListBySearch(Request $request)
    {
        try 
        {
            return view('complaintListBySearch');
        } 
        catch (\Exception $ex)
        {
            $notification = array(
                'message' => $ex->getMessage().' Line: '.$ex->getLine(),
                'alert-type' => 'error');
            return back()->with($notification);
        }
    }

    public function complaintListJobCard(Request $request)
    {
        try
        {
            if($request->chassis_number != null || $request->veh_reg_no != null || $request->customer_name != null || $request->job_card_no != null)
            { 
                $row = $this->info::where(function ($query) use ($request) 
                {
                    if ($request->job_card_no !== null) 
                    {
                        $query->orWhere('Job_card_No', '=', $request->job_card_no);
                    }
                
                    if ($request->customer_name !== null) 
                    {
                    $query->orWhere('Customer_Name', '=', $request->customer_name);
                    }
                
                    if ($request->veh_reg_no !== null) 
                    {
                    $query->orWhere('Vehicle_Registration_Number', '=', $request->veh_reg_no);
                    }
                
                    if ($request->chassis_number !== null) 
                    {
                    $query->orWhere('Chassis_Number', '=', $request->chassis_number);
                    }
                })->first();
                
                if ($row !== null) 
                {
                    $html = view('ajax.jobcard',compact('row'))->render();
                    return response()->json(['success'=>true ,'html'=> $html,'message'=>'Record Found Successfully..! ']);
                }
                return response()->json(['error'=>true, 'message'=> 'Record Not Found !']);
            }
            return response()->json(['warning'=>true, 'message'=> 'Fill Atleast One Value in field !']);
        }
        catch(\Exception $ex)
        {
            return response()->json(['error'=>true, 'message'=> $ex->getMessage()]);
        }
    }

    public function getData(){
        try 
        {
            $rowData = DB::select("SELECT * FROM ams_info where Plant_Name = (
                SELECT Plant_Name FROM ams_info where flag=0  order by created_at, Plant_Name ASC limit 1) and flag=0 order by created_at, Plant_Name");

            $val='';
			echo '<script>
            $(document).ready(function() {
                $("#caller-listing").DataTable({
                    dom: "Bfrtip",
                    "language": {
                        "paginate": {
                            "previous": "<",
                            "next": ">"
                        }
                    },
                    buttons: [{
                        extend: "excel",
                        text: "Excel",
                        className: "exportExcel",
                        filename: "Get_Data_Report",
                        exportOptions: {
                            modifier: {
                                page: "all"
                            }
                        }
                    }]
                });
            });
            </script>';
            echo '<table id="caller-listing" class="table">
            <thead>
                <tr>
                    <th>Job Card No</th>
                    <th>Plant Name</th>
                    <th>SAC Code</th>
                    <th>Accident In Charge Name</th>
                    <th>Accident In Charge Name Contact Number</th>
                    <th>Zone</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead><tbody>';
            foreach($rowData as $row){
                $Job_card_No = $row->Job_card_No;
                $Plant_Name = $row->Plant_Name;
                ams_info::where('Job_card_No',$Job_card_No)->update(['flag'=>'1']);
                if($row->status == 'notassign'){
                    $status =  "Not Assigned";
                }else{
                    $status = "Assigned";
                }
                $rowId = base64_encode($row->id);
            echo '<tr role="row">
                <td class="cls_complaint_number">'.$row->Job_card_No.'</td>
                <td> '.$row->Plant_Name.'</td>
                <td> '.$row->SAC_Code.'</td>
                <td> '.$row->Accident_In_charge_Name.'</td>
                <td> '.$row->Accident_In_charge_contact_Number.'</td>
                <td> '.$row->Zone.'</td>
                <td> '.$status.' </td>
                <td name="action" id="action">
                <button name="updateuser" id="updateuser" value="updateuser"  class="btn-default btn primary"><a href="' . route('update-case',['id' =>$rowId] ) . '" class="btn btn-sm btn-primary" target="blank" style="border-radius: 10px;"> Click </a> </button>
                </td>
            </tr>';
            }
			echo '</tbody>
            </table>';

        } 
        catch (\Exception $ex)
        {
            $notification = array(
                'message' => $ex->getMessage().' Line: '.$ex->getLine(),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }
    /********************************************** Home 1 ***********************************************/
    public function updateComplaint($id)
    {
        try
        {
            $data['query'] = DB::select("Select * from complaint where id = $id");
            return view('update_complaint',$data);   
        }
        catch (\Exception $ex)
        {
            $notification = array(
                'message' => $ex->getMessage().' Line: '.$ex->getLine(),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }
    
	public function getRemarksData(Request $request)
    {
        try
        {
        $val= $request->input('val');
        $data = DB::table('remarks')->select('*')->where('stage',$val)->get();
        $dt = '';
        foreach($data as $row)
        {
            $dt .=$row->stage.'~~'.$row->remark.',';
        }
        echo rtrim($dt,',');
        }
        catch (\Exception $ex)
        {
            $notification = array(
                'message' => $ex->getMessage().' Line: '.$ex->getLine(),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }

    public function updateCase($id) 
    {
    //-------------------tables from the data is being fetched combined---------------------------------
        try 
        {
            $data['data'] = ams_info::select('general_acce_details.*', 'comp_repair_delays.*', 'comp_post_approval_delays.*', 'comp_pre_app_delays.*','comp_repair_stages.*', 'comp_pre_app_stages.*', 'comp_post_app_stages.*','document_status.*','document_status.remarks as doc_remarks','question_vehicle.*','ams_info.*', 'general_acce_details.*', 'ams_info.id as amsid', 'vehicle_details.*', 'question_vehicle.remarks as questionRemarsk')
                ->leftjoin('question_vehicle', 'ams_info.id', '=', 'question_vehicle.ams_info_id')
                ->leftjoin('vehicle_details', 'ams_info.id', '=', 'vehicle_details.ams_info_id')
                ->leftjoin('general_acce_details', 'ams_info.id', '=', 'general_acce_details.ams_info_id')
                ->leftjoin('document_status', 'ams_info.id', '=', 'document_status.ref_id')
                ->leftjoin('comp_repair_stages', 'ams_info.id', '=', 'comp_repair_stages.ref_id')
                ->leftjoin('comp_pre_app_stages', 'ams_info.id', '=', 'comp_pre_app_stages.ref_id')
                ->leftjoin('comp_post_app_stages', 'ams_info.id', '=', 'comp_post_app_stages.ref_id')
                ->leftjoin('comp_repair_delays', 'ams_info.id',  'comp_repair_delays.ref_id')
                 ->leftjoin('comp_pre_app_delays', 'ams_info.id', 'comp_pre_app_delays.ref_id')
                ->leftjoin('comp_post_approval_delays', 'ams_info.id', 'comp_post_approval_delays.ref_id')
                ->where('ams_info.id', base64_decode($id))->get();

            $Job_card_No = $data['data'][0]->Job_card_No;
            $data['history'] = ams_info_log::where('Job_card_No',$Job_card_No)->orderby('Job_card_No', 'desc')->get();
            $data['remarksData'] = DB::table('remarks')->select('stage')->distinct()->get();
            $data['finalData'] = DB::select("Select * from complaint");
            
            $intimation = date("Y-m-d", strtotime($data['data'][0]->Intimation_2_IC_for_surveyor_deputation));
            $job_Card_open_date = date("Y-m-d", strtotime($data['data'][0]->Job_Card_open_date));
            $diff = strtotime($job_Card_open_date) - strtotime($intimation);
            $days = abs(round($diff / 86400));
            if($data['data'][0]->Major_Minor__Final_bill == 'Minor')
            {
                if($days == 1 || $days == 0)
                {
                    $status = 'within a TAT';
                    $class = 'text-success';
                }
                $status = 'Out Of TAT';
                $class= 'text-danger';
            }
            if($data['data'][0]->Major_Minor__Final_bill == 'Major')
            {
                if($days == 2 || $days == 0)
                {
                    $status = 'within a TAT';
                    $class = 'text-success';
                }
                $status = 'Out Of TAT';
                $class= 'text-danger';
            }
            return view('update_case',$data);
        } 
        catch (\Exception $ex)
        {
            $notification = array(
                'message' => $ex->getMessage().' Line: '.$ex->getLine(),
                'alert-type' => 'error'
            );
            dd($ex->getMessage());
            return back()->with($notification);
        }
    }
    
    public function storeForm(request $request) 
    {
        DB::beginTransaction();
        try 
        {
            $updateArr = array();
            $updateArr = $request->all();
            $uid = $updateArr['id'];
            $Job_card_No = $updateArr['Job_card_No'];
            $data = json_encode($updateArr,true);
            $updateArr['case_status_flag']='1';
			$currentDateTime = date("Y-m-d H:i:s");
            $updateArr['updated_at']= $currentDateTime;
            unset($updateArr['_token']);
            unset($updateArr['update']);

            $updateQuery = 
            [
                "Vehicle_Registration_Number" =>$request->Vehicle_Registration_Number,
                "Vehicle_Registration_Number_remarks" => $request->Vehicle_Registration_Number_remarks,
                "chassis_number" => $request->chassis_number,
                "chassis_number_remarks" => $request->chassis_number_remarks,
                "Plant_Name" => $request->Plant_Name,
                "Plant_Name_remarks" => $request->Plant_Name_remarks,
                "SAC_Code" => $request->SAC_Code,
                "SAC_Code_remarks" => $request->SAC_Code_remarks,
                "Job_card_No" => $request->Job_card_No,
                "Job_card_No_remarks" => $request->Job_card_No_remarks,
                "Accident_In_charge_Name" =>$request->Accident_In_charge_Name,
                "Accident_In_charge_Name_remarks" => $request->Accident_In_charge_Name_remarks,
                "Accident_In_charge_contact_Number" =>$request->Accident_In_charge_contact_Number,
                "Accident_In_charge_contact_Number_remarks" => $request->Accident_In_charge_contact_Number_remarks,
                "Zone" =>$request->Zone,
                "Zone_remarks" => $request->Zone_remarks,
                "Area_Office" => $request->Area_Office,
                "Area_Office_remarks" => $request->Area_Office_remarks,
                "Chassis_Number" => $request->Chassis_Number,
                "Chassis_Number_remarks" => $request->Chassis_Number_remarks,
                "Select_ID" => $request->Select_ID,
                "Select_ID_remarks" =>$request->Select_ID_remarks,
                "Select_Tier" => $request->Select_Tier,
                "Select_Tier_remarks" => $request->Select_Tier_remarks,
                "Customer_Name" => $request->Customer_Name,
                "Customer_Name_remarks" => $request->Customer_Name_remarks,
                "Mode_of_Claim" => $request->Mode_of_Claim,
                "Mode_of_Claim_remarks" => $request->Mode_of_Claim_remarks,
                "Name_of_Insurance_company" => $request->Name_of_Insurance_company,
                "Name_of_Insurance_company_remarks" => $request->Name_of_Insurance_company_remarks,
                "Initial_Estimate_Value_Rs" => $request->Initial_Estimate_Value_Rs,
                "Initial_Estimate_Value_Rs_remarks" => $request->Initial_Estimate_Value_Rs_remarks,
                "Major_Minor_Quotation" => $request->Major_Minor_Quotation,
                "Major_Minor_Quotation_remarks" => $request->Major_Minor_Quotation_remarks,
                "Surveyor_E_mail_id" => $request->Surveyor_E_mail_id,
                "Surveyor_E_mail_id_remarks" => $request->Surveyor_E_mail_id_remarks,
                "Quotation_Date" => $request->Quotation_Date,
                "Quotation_Date_remarks" => $request->Quotation_Date_remarks,
                "Date_of_Accident" => $request->Date_of_Accident,
                "Date_of_Accident_remarks" => $request->Date_of_Accident_remarks,
                "Vehicle_inward" => $request->Vehicle_inward,
                "Vehicle_inward_remarks" => $request->Vehicle_inward_remarks,
                "Job_Card_open_date" => $request->Job_Card_open_date,
                "Job_Card_open_date_remarks" => $request->Job_Card_open_date_remarks,
                "Documents_submitted" => $request->Documents_submitted,
                "Documents_submitted_remarks" => $request->Documents_submitted_remarks,
                "Surveyor_approval_for_dismantling" => $request->Surveyor_approval_for_dismantling,
                "Surveyor_approval_for_dismantling_remarks" => $request->Surveyor_approval_for_dismantling_remarks,
                "Dismantling_completed_on" => $request->Dismantling_completed_on,
                "Dismantling_completed_on_remarks" => $request->Dismantling_completed_on_remarks,
                "Intimation_to_surveyor_for_2nd__inspecti" => $request->Intimation_to_surveyor_for_2nd__inspecti,
                "Intimation_to_surveyor_for_2nd__inspecti_remarks" => $request->Intimation_to_surveyor_for_2nd__inspecti_remarks,
                "Intimation_2_IC_for_advance_payment" => $request->Intimation_2_IC_for_advance_payment,
                "Intimation_2_IC_for_advance_payment_remarks" => $request->Intimation_2_IC_for_advance_payment_remarks,
                "Advance_payment_received_onInsurance" => $request->Advance_payment_received_onInsurance,
                "Advance_payment_received_onInsurance_remarks" => $request->Advance_payment_received_onInsurance,
                "Supplementary_estimate_Value_Rs" => $request->Supplementary_estimate_Value_Rs,
                "Supplementary_estimate_Value_Rs_remarks" => $request->Supplementary_estimate_Value_Rs_remarks,
                "Supplementary_repair_inspection_date" => $request->Supplementary_estimate_Value_Rs_remarks,
                "Supplementary_repair_inspection_date_remarks" => $request->Supplementary_repair_inspection_date_remarks,
                "Written_approval_for_supplementary_Est" => $request->Written_approval_for_supplementary_Est,
                "Written_approval_for_supplementary_Est_remarks" =>$request->Written_approval_for_supplementary_Est_remarks,
                "Post_inspection_final_invoice_submit_on" => $request->Post_inspection_final_invoice_submit_on,
                "Post_inspection_final_invoice_submit_on_remarks" => $request->Post_inspection_final_invoice_submit_on_remarks,
                "Customer_Portion_payment_received" => $request->Customer_Portion_payment_received,
                "Customer_Portion_payment_received_remarks" => $request->Customer_Portion_payment_received_remarks,
                "Customer_payable_amount" => $request->Customer_payable_amount,
                "Customer_payable_amount_remarks" => $request->Customer_payable_amount_remarks,
                "Final_Bill_value" => $request->Final_Bill_value,
                "Final_Bill_value_remarks" => $request->Final_Bill_value_remarks,
                "Major_Minor__Final_bill" => $request->Major_Minor__Final_bill,
                "Major_Minor__Final_bill_remarks" => $request->Major_Minor__Final_bill_remarks,
                "Job_card_closed_Date" => $request->Job_card_closed_Date,
                "Job_card_closed_Date_remarks" => $request->Job_card_closed_Date_remarks,
                "Gate_Pass_Date" => $request->Gate_Pass_Date,
                "Gate_Pass_Date_remarks" =>  $request->Gate_Pass_Date_remarks,
                "Accidental_Stages" => $request->Accidental_Stages,
                "Accidental_Stages_remarks" => $request->Accidental_Stages_remarks,
                "No_of_days_taken_as_on_date" => $request->No_of_days_taken_as_on_date,
                "No_of_days_taken_as_on_date_remarks" => $request->No_of_days_taken_as_on_date_remarks,
                "No_of_days_inside_the_workshop" => $request->No_of_days_inside_the_workshop,
                "No_of_days_inside_the_workshop_remarks" => $request->No_of_days_inside_the_workshop_remarks,
                "Surveyor_Name" => $request->Surveyor_Name,
                "Surveyor_Mobile_no" => $request->Surveyor_Mobile_no,
                "Registration_of_certificate_upload" => $request->Registration_of_certificate_upload,
                "National_Permit_A_B_upload" => $request->National_Permit_A_B_upload,
                "Road_Tax_upload" => $request->Road_Tax_upload,
                "Claim_Form_upload" => $request->Claim_Form_upload,
                "Intimation_2_IC_for_surveyor_deputation" => $request->Intimation_2_IC_for_surveyor_deputation,
                "Intimation_2_IC_for_surveyor_deputation_reason" => $request->Intimation_2_IC_for_surveyor_deputation_reason,
                "Surveyor_initial_inspection_date" => $request->Surveyor_initial_inspection_date,
                "Surveyor_initial_inspection_date_remarks" => $request->Surveyor_initial_inspection_date_remarks,
                "Salvage_value_agreed_by_Customer_Ins_co" => $request->Salvage_value_agreed_by_Customer_Ins_co,
                "Salvage_value_agreed_by_Customer_Ins_co_remarks" => $request->Salvage_value_agreed_by_Customer_Ins_co_remarks,
                "Written_work_order_approval_2_start_work" => $request->Written_work_order_approval_2_start_work,
                "Written_work_order_approval_2_start_work_reason" => $request->Written_work_order_approval_2_start_work_reason,
                "Intimation_2_customer_for_advance_paymen" => $request->Intimation_2_customer_for_advance_paymen,
                "Advance_payment_received_onCustomer" => $request->Advance_payment_received_onCustomer,
                "Advance_payment_received_onCustomer_reason" => $request->Advance_payment_received_onCustomer_reason,
                "Advance_payment_Value_RsCustomer" => $request->Advance_payment_Value_RsCustomer,
                "Customer_written_approval_2_start_of_wor" => $request->Customer_written_approval_2_start_of_wor,
                "Customer_written_approval_2_start_of_wor_reason" => $request->Customer_written_approval_2_start_of_wor_reason,
                "pre_delay_reaosn" => $request->pre_delay_reaosn,
                "pre_overall_delay" => $request->pre_overall_delay,
                "Repair_work_start_date" => $request->Repair_work_start_date,
                "Repair_work_start_date_reason" => $request->Repair_work_start_date_reason,
                "Repair_completion_date" => $request->Repair_completion_date,
                "Repair_completion_date_reason" => $request->Repair_completion_date_reason,
                "repair_delay_reaosn" => $request->repair_delay_reaosn,
                "repair_overall_delay" => $request->repair_overall_delay,
                "Intimation_to_IC_for_final_inspection" => $request->Intimation_to_IC_for_final_inspection,
                "Final_inspection_date" => $request->Final_inspection_date,
                "Final_inspection_date_reason" => $request->Final_inspection_date_reason,
                "post_delay_reason" => $request->post_delay_reason,
                "post_overall_delay" => $request->post_overall_delay,
                "overall_delay_by" => $request->overall_delay_by,
                "case_status" => $request->case_status,
                "stage" => $request->stage,
                "remarks" => $request->remarks,
                "additional_remark" => $request->additional_remark,
                "case_status_flag" => "1",
                "Claim_Form_upload_remarks" => $request->Claim_Form_upload_remarks,
                "Road_Tax_upload_remarks" => $request->Road_Tax_upload_remarks,
                "National_Permit_A_B_upload_remarks" => $request->National_Permit_A_B_upload_remarks,
                "Registration_of_certificate_upload_remarks" => $request->Registration_of_certificate_upload_remarks,
                "Surveyor_Name_remarks" => $request->Surveyor_Name_remarks,
                "Surveyor_Mobile_no_remarks" => $request->Surveyor_Mobile_no_remarks,
                "case_status" => $request->case_status,
                "stage" => $request->stage,
                "remarks" => $request->remarks,
                "additional_remark" => $request->additional_remark,
                "updated_at" => $currentDateTime
            ];
            $jobCardDoestExist = $this->info::where('Job_card_No', $Job_card_No)->doesntExist();
            if($jobCardDoestExist)
            {   
                $insert = $this->info::create($updateArr)->id;
                if($insert)
                {
                    $notification = callNotification('success',"Inserted Data Successfully");
                    return back()->with($notification);
                }
                $notification = callNotification('error',"Inserted Data Failed");
                return back()->with($notification);
            }
            else
            {
                $insert = '';
            }
            ams_info::where('id', $uid)->update($updateQuery);
            if($insert != '')
            {$amsid = $insert;}
            else
            {$amsid = $uid;}

            /*********************************************************************************************************/
            $questionQuery = 
            [
                "third_party" => $request->third_party,
                "third_party_dealer" => $request->third_party_dealer,
                "third_party_customer" => $request->third_party_customer,
                "accident_vehicle" => $request->accident_vehicle,
                "accident_vehicle_dealer" => $request->accident_vehicle_dealer,
                "accident_vehicle_customer" => $request->accident_vehicle_customer,
                "thermal_incident" => $request->thermal_incident,
                "thermal_incident_dealer" => $request->thermal_incident_dealer,
                "thermal_incident_customer" => $request->thermal_incident_customer,
                "Vehicle_towed" => $request->Vehicle_towed,
                "Vehicle_towed_dealer" => $request->Vehicle_towed_dealer,
                "Vehicle_towed_customer" => $request->Vehicle_towed_customer,
                "theft_cases" => $request->theft_cases,
                "theft_cases_dealer" => $request->theft_cases_dealer,
                "theft_cases_customer" => $request->theft_cases_customer,
                "loss_damage_theft" => $request->loss_damage_theft,
                "loss_damage_theft_dealer" => $request->loss_damage_theft_dealer,
                "loss_damage_theft_customer" => $request->loss_damage_theft_customer,
                "PA_claim" => $request->PA_claim,
                "PA_claim_dealer" => $request->PA_claim_dealer,
                "PA_claim_customer" => $request->PA_claim_customer,
                "brake_policies" => $request->brake_policies,
                "brake_policies_dealer" => $request->brake_policies_dealer,
                "brake_policies_customer" => $request->brake_policies_customer,
                "remarks" => $request->question_remarks,
                "ams_info_id" => $amsid,
                "created_at" => $currentDateTime
            ];
            $amsIdExist = VehicleQuestion::where('ams_info_id', $amsid)->doesntExist();
            if($amsIdExist)
            {
                VehicleQuestion::insert($questionQuery);
            }
            else
            {
                VehicleQuestion::where('ams_info_id', $amsid)->update($questionQuery);
            }
            /**********************************************************************************************************/ 
            $vehicleDetails  = 
            [
                "model" => $request->model,
                "model_remarks" => $request->model_remarks,
                "ams_info_id" => $amsid,
                "engine_no" => $request->engine_no,
                "engine_no_remarks" => $request->engine_no_remarks,
                "segment" => $request->segment,
                "segment_remarks" => $request->segment_remarks,
                "insurance_policy_no" => $request->insurance_policy_no,
                "insurance_policy_no_remarks" => $request->insurance_policy_no_remarks,
                "driver_name" => $request->driver_name,
                "driver_name_remarks" => $request->driver_name_remarks,
                "driver_contact_no" => $request->driver_contact_no,
                "driver_contact_no_remarks" => $request->driver_contact_no_remarks,
                "driving_license_number" => $request->driving_license_number,
                "driving_license_number_remarks" => $request->driving_license_number_remarks,
                "DL_validity_date" => $request->DL_validity_date,
                "DL_validity_date_remarks" => $request->DL_validity_date_remarks,
                "AL_fitment" => $request->AL_fitment,
                "AL_fitment_remarks" => $request->AL_fitment_remarks,
                "wood_cabin_load" => $request->wood_cabin_load,
                "wood_cabin_load_remarks" => $request->wood_cabin_load_remarks,
                "verified_in_vahan" => $request->verified_in_vahan,
                "verified_in_vahan_remarks" => $request->verified_in_vahan_remarks,
                "bs_nonbs" => $request->bs_nonbs,
                "bs_nonbs_remarks" => $request->bs_nonbs_remarks,
                "date_of_sale" => $request->date_of_sale,
                "date_of_sale_remarks" => $request->date_of_sale_remarks,
                "name_of_the_insurance" => $request->name_of_the_insurance,
                "name_of_the_insurance_remarks" => $request->name_of_the_insurance_remarks,
                "customer_name" => $request->customer_name,
                "customer_email_id" => $request->customer_email_id,
                "customer_email_id_remarks" => $request->customer_email_id_remarks,
                "customer_name_remarks" => $request->customer_name_remarks,
                "mode_of_claims" => $request->mode_of_claims,
                "mode_of_claims_remarks" => $request->mode_of_claims_remarks,
                "location_of_the_accident" => $request->location_of_the_accident,
                "location_of_the_accident_remarks" => $request->location_of_the_accident_remarks,
                "driver_statement" => $request->driver_statement,
                "created_at" => $currentDateTime
            ];
            $amsIdExist = VehicleDetails::where('ams_info_id', $amsid)->doesntExist();
            if($amsIdExist)
            {VehicleDetails::insert($vehicleDetails);}
            else
            {VehicleDetails::where('ams_info_id', $amsid)->update($vehicleDetails);}
            
            /**********************************************************************************************************/
            $generalDetails = 
            [
                "ams_info_id" => $amsid,
                "accident_charge_mobile_dealer" => $request->accident_charge_mobile_dealer,
                "accident_charge_mobile_dealer_remarks" => $request->accident_charge_mobile_dealer_remarks,
                "veh_rep_wkshp_dealer" => $request->veh_rep_wkshp_dealer,
                "customer_and_accident_in_charge_email_id" => $request->customer_and_accident_in_charge_email_id,
                "customer_and_accident_in_charge_email_id_remarks" => $request->customer_and_accident_in_charge_email_id_remarks,
                "veh_rep_wkshp_dealer_remarks" => $request->veh_rep_wkshp_dealer_remarks,
                "name_wkshp_dealer" => $request->name_wkshp_dealer,
                "name_wkshp_dealer_remarks" => $request->name_wkshp_dealer_remarks,
                "region_office" => $request->region_office,
                "region_office_remarks" => $request->region_office_remarks,
                "sac_code_wrkshp" => $request->sac_code_wrkshp,
                "sac_code_wrkshp_remarks" => $request->sac_code_wrkshp_remarks,
                "auto_upt_sac_code" => $request->auto_upt_sac_code,
                "auto_upt_sac_code_remarks" => $request->auto_upt_sac_code_remarks,
                "created_at" => $currentDateTime
            ];
            $amsIdExist = GeneralDetails::where('ams_info_id', $amsid)->doesntExist();
            if($amsIdExist)
            {GeneralDetails::insert($generalDetails);}
            else
            {GeneralDetails::where('ams_info_id', $amsid)->update($generalDetails);}
            
            /***********************************************************************************************************/
            $documentStatus = 
            [
                "Claim_Form_dealer" => $request->Claim_Form_dealer,
                "Claim_Form_customer" => $request->Claim_Form_customer,
                "KYC_dealer" => $request->KYC_dealer,
                "KYC_customer" => $request->KYC_customer,
                "aadhar_dealer" => $request->aadhar_dealer,
                "aadhar_customer" => $request->aadhar_customer,
                "pan_dealer" => $request->pan_dealer,
                "pan_customer" => $request->pan_customer,
                "Policy_dealer" => $request->Policy_dealer,
                "Policy_customer" => $request->Policy_customer,
                "DL_dealer" => $request->DL_dealer,
                "DL_customer" => $request->DL_customer,
                "National_Permit_dealer" => $request->National_Permit_dealer,
                "National_Permit_customer" => $request->National_Permit_customer,
                "road_tax_dealer" => $request->road_tax_dealer,
                "road_tax_customer" => $request->road_tax_customer,
                "fitness_dealer" => $request->fitness_dealer,
                "fitness_customer" => $request->fitness_customer,
                "registration_dealer" => $request->registration_dealer,
                "registration_customer" => $request->registration_customer,
                "form23_dealer" => $request->form23_dealer,
                "form23_customer" => $request->form23_customer,
                "all_doc_submitted_dealer" => $request->all_doc_submitted_dealer,
                "all_doc_submitted_customer" => $request->all_doc_submitted_customer,
                "last_doc_submitted_date" => $request->last_doc_submitted_date,
                "last_doc_submitted_date_customer" => $request->last_doc_submitted_date_customer,
                "spot_surveyor_name_dealer" => $request->spot_surveyor_name_dealer,
                "spot_surveyor_name_customer" => $request->spot_surveyor_name_customer,
                "spot_surveyor_mobile_dealer" => $request->spot_surveyor_mobile_dealer,
                "spot_surveyor_mobile_customer" => $request->spot_surveyor_mobile_customer,
                "spot_surveyor_email_dealer" => $request->spot_surveyor_email_dealer,
                "spot_surveyor_email_customer" => $request->spot_surveyor_email_customer,
                "spot_surveyor_reportl_dealer" => $request->spot_surveyor_reportl_dealer,
                "spot_surveyor_reportl_customer" => $request->spot_surveyor_reportl_customer,
                "towing_bill_dealer" => $request->towing_bill_dealer,
                "towing_bill_customer" => $request->towing_bill_customer,
                "load_challan_dealer" => $request->load_challan_dealer,
                "load_challan_customer" => $request->load_challan_customer,
                "dec_letter_dealer" => $request->dec_letter_dealer,
                "dec_letter_customer" => $request->dec_letter_customer,
                "veh_ins_report_dealer" => $request->veh_ins_report_dealer,
                "veh_ins_report_customer" => $request->veh_ins_report_customer,
                "fire_brigade_report_dealer" => $request->fire_brigade_report_dealer,
                "fire_brigade_report_customer" => $request->fire_brigade_report_customer,
                "non_trace_cert_dealer" => $request->non_trace_cert_dealer,
                "non_trace_cert_customer" => $request->non_trace_cert_customer,
                "fir_copy_dealer" => $request->fir_copy_dealer,
                "fir_copy_customer" => $request->fir_copy_customer,
                "postmortem_report_dealer" => $request->postmortem_report_dealer,
                "postmortem_report_customer" => $request->postmortem_report_customer,
                "remarks"=>$request->doc_remarks,

                "Claim_Form_remarks"  =>$request->Claim_Form_remarks,
                "KYC_remarks"  => $request->KYC_remarks,
                "aadhar_remarks"  =>$request->aadhar_remarks,
                "pan_remarks"  =>$request->pan_remarks,
                "Policy_remarks"  =>$request->Policy_remarks,
                "DL_remarks"  =>$request->DL_remarks,
                "National_Permit_remarks"  =>$request->National_Permit_remarks,
                "road_tax_remarks"  =>$request->road_tax_remarks,
                "fitness_remarks"  =>$request->fitness_remarks,
                "registration_remarks"  =>$request->registration_remarks,
                "form23_remarks"  =>$request->form23_remarks,
                "all_doc_submitted_remarks"  =>$request->all_doc_submitted_remarks,
                "last_doc_submitted_date_remarks"  =>$request->last_doc_submitted_date_remarks,
                "spot_surveyor_name_remarks"  =>$request->spot_surveyor_name_remarks,
                "spot_surveyor_mobile_remarks"  =>$request->spot_surveyor_mobile_remarks,
                "spot_surveyor_email_remarks"  =>$request->spot_surveyor_email_remarks,
                "spot_surveyor_reportl_remarks"  =>$request->spot_surveyor_reportl_remarks,
                "towing_bill_remarks"  =>$request->towing_bill_remarks,
                "load_challan_remarks"  =>$request->load_challan_remarks,
                "dec_letter_remarks"  =>$request->dec_letter_remarks,
                "veh_ins_report_remarks"  =>$request->veh_ins_report_remarks,
                "fire_brigade_report_remarks"  =>$request->fire_brigade_report_remarks,
                "non_trace_cert_remarks"  =>$request->non_trace_cert_remarks,
                "fir_copy_remarks"  =>$request->fir_copy_remarks,
                "postmortem_report_remarks"  =>$request->postmortem_report_remarks,
                "document_statuscol"  =>$request->document_statuscol,
                "ref_id" => $amsid,
            ];
            $amsIdExist = DocumentStatus::where('ref_id', $amsid)->doesntExist();
            if($amsIdExist)
            {DocumentStatus::insert($documentStatus);}
            else
            {DocumentStatus::where('ref_id', $amsid)->update($documentStatus);}
            
            /**********************************************************************************************************/
            $preStage =
            [
                "ref_id"=>$amsid,
                "initial_estimate_dealer" => $request->initial_estimate_dealer,
                "initial_estimate_dealer_remarks" => $request->initial_estimate_dealer_remarks,
                "need_to_verfy_cust" => $request->need_to_verfy_cust,
                "intimation_insurance_dealer_remarks"=>$request->intimation_insurance_dealer_remarks,
                "need_to_verfy_cust_remarks" => $request->need_to_verfy_cust_remarks,
                "initial_estimate_val_dealer" => $request->initial_estimate_val_dealer,
                "initial_estimate_val_dealer_remarks" => $request->initial_estimate_val_dealer_remarks,
                "need_to_verify_cust" => $request->need_to_verify_cust,
                "need_to_verify_cust_remarks" => $request->need_to_verify_cust_remarks,
                "major_minor_dealer" => $request->major_minor_dealer,
                "major_minor_dealer_remarks" => $request->major_minor_dealer_remarks,
                "classfy_based_est_amnt" => $request->classfy_based_est_amnt,
                "intimation_insurance_dealer" => $request->intimation_insurance_dealer,
                "mail_copy_dealer" => $request->mail_copy_dealer,
                "surveyor_name_dealer" => $request->surveyor_name_dealer,
                "surveyor_name_dealer_remarks" => $request->surveyor_name_dealer_remarks,
                "surveyor_mob_dealer" => $request->surveyor_mob_dealer,
                "surveyor_mob_dealer_remarks" => $request->surveyor_mob_dealer_remarks,
                "surveyor_email_dealer" => $request->surveyor_email_dealer,
                "surveyor_email_dealer_remarks" => $request->surveyor_email_dealer_remarks,
                "surveyor_initial_inspection_dealer" => $request->surveyor_initial_inspection_dealer,
                "surveyor_initial_inspection_dealer_remarks" => $request->surveyor_initial_inspection_dealer_remarks,
                "need_to_b_vrfy_srvyr" => $request->need_to_b_vrfy_srvyr,
                "need_to_b_vrfy_srvyr_remarks" => $request->need_to_b_vrfy_srvyr_remarks,
                "approval_dismantling_dealer" => $request->approval_dismantling_dealer,
                "approval_dismantling_dealer_remarks" => $request->approval_dismantling_dealer_remarks,
                "need_to_b_vrfy_srvyr_als" => $request->need_to_b_vrfy_srvyr_als,
                "need_to_b_vrfy_srvyr_als_remarks" => $request->need_to_b_vrfy_srvyr_als_remarks,
                "dismantling_completion_dealer" => $request->dismantling_completion_dealer,
                "dismantling_completion_dealer_remarks" => $request->dismantling_completion_dealer_remarks,
                "intimation_surveyor_dealer" => $request->intimation_surveyor_dealer,
                "intimation_surveyor_dealer_remarks" => $request->intimation_surveyor_dealer_remarks,
                "surveyor_second_dealer" => $request->surveyor_second_dealer,
                "surveyor_second_dealer_remarks" => $request->surveyor_second_dealer_remarks,
                "sva_dealer" => $request->sva_dealer,
                "sva_dealer_remarks" => $request->sva_dealer_remarks,
                "surveyor_written_approval_dealer" => $request->surveyor_written_approval_dealer,
                "surveyor_written_approval_dealer_remarks" => $request->surveyor_written_approval_dealer_remarks,
                "dealer_need_to_upload_approval_copy" => $request->dealer_need_to_upload_approval_copy,
                "dealer_need_to_upload_approval_copy_remarks" => $request->dealer_need_to_upload_approval_copy_remarks,
                "parts_approved_dealer" => $request->parts_approved_dealer,
                "parts_approved_dealer_remarks" => $request->parts_approved_dealer_remarks,
                "customer_approval_dealer" => $request->customer_approval_dealer,
                "customer_approval_dealer_remarks" => $request->customer_approval_dealer_remarks,
                "need_to_verified_with_customer" => $request->need_to_verified_with_customer,
                "need_to_verified_with_customer_remarks" => $request->need_to_verified_with_customer_remarks,
                "dealer_need_to_upload_approval" => $request->dealer_need_to_upload_approval,
                "dealer_need_to_upload_approval_remarks" => $request->dealer_need_to_upload_approval_remarks,
                "intimation_insurance_dealer_adv" => $request->intimation_insurance_dealer_adv,
                "intimation_insurance_dealer_adv_remarks" => $request->intimation_insurance_dealer_adv_remarks,
                "mail_copy_ad_pymnt_dealer" => $request->mail_copy_ad_pymnt_dealer,
                "mail_copy_ad_pymnt_dealer_remarks" => $request->mail_copy_ad_pymnt_dealer_remarks,
                "apc_time_dealer" => $request->apc_time_dealer,
                "apc_time_dealer_remarks" => $request->apc_time_dealer_remarks,
                "need_to_b_vrfy_custmr_als" => $request->need_to_b_vrfy_custmr_als,
                "need_to_b_vrfy_custmr_als_remarks" => $request->need_to_b_vrfy_custmr_als_remarks,
                "apc_rs_dealer" => $request->apc_rs_dealer,
                "apc_rs_dealer_remarks" => $request->apc_rs_dealer_remarks,
                "need_to_b_vrfy_cust_als" => $request->need_to_b_vrfy_cust_als,
                "need_to_b_vrfy_cust_als_remarks" => $request->need_to_b_vrfy_cust_als_remarks,
                "api_time_dealer" => $request->api_time_dealer,
                "api_rs_dealer" => $request->api_rs_dealer,
                "pre_delay_reason" => $request->pre_delay_reason,
                "initial_estimate_dealer_callcenter"=>$request->initial_estimate_dealer_callcenter,
                "need_to_verfy_cust_callcenter"=>$request->need_to_verfy_cust_callcenter,
                "initial_estimate_val_dealer_callcenter"=>$request->initial_estimate_val_dealer_callcenter,
                "need_to_verify_cust_callcenter"=>$request->need_to_verify_cust_callcenter,
                "major_minor_dealer_callcenter"=>$request->major_minor_dealer_callcenter,
                "classfy_based_est_amnt_callcenter"=>$request->classfy_based_est_amnt_callcenter,
                "intimation_insurance_dealer_callcenter"=>$request->intimation_insurance_dealer_callcenter,
                "mail_copy_dealer_callcenter"=>$request->mail_copy_dealer_callcenter,
                "surveyor_name_dealer_callcenter"=>$request->surveyor_name_dealer_callcenter,
                "surveyor_mob_dealer_callcenter"=>$request->surveyor_mob_dealer_callcenter,
                "surveyor_email_dealer_callcenter"=>$request->surveyor_email_dealer_callcenter,
                "surveyor_initial_inspection_dealer_callcenter"=>$request->surveyor_initial_inspection_dealer_callcenter,
                "need_to_b_vrfy_srvyr_callcenter"=>$request->need_to_b_vrfy_srvyr_callcenter,
                "approval_dismantling_dealer_callcenter"=>$request->approval_dismantling_dealer_callcenter,
                "need_to_b_vrfy_srvyr_als_callcenter"=>$request->need_to_b_vrfy_srvyr_als_callcenter,
                "dismantling_completion_dealer_callcenter"=>$request->dismantling_completion_dealer_callcenter,
                "intimation_surveyor_dealer_callcenter"=>$request->intimation_surveyor_dealer_callcenter,
                "surveyor_second_dealer_callcenter"=>$request->surveyor_second_dealer_callcenter,
                "sva_dealer_callcenter"=>$request->sva_dealer_callcenter,
                "surveyor_written_approval_dealer_callcenter"=>$request->surveyor_written_approval_dealer_callcenter,
                "dealer_need_to_upload_approval_copy_callcenter"=>$request->dealer_need_to_upload_approval_copy_callcenter,
                "parts_approved_dealer_callcenter"=>$request->parts_approved_dealer_callcenter,
                "customer_approval_dealer_callcenter"=>$request->customer_approval_dealer_callcenter,
                "need_to_verified_with_customer_callcenter"=>$request->need_to_verified_with_customer_callcenter,
                "dealer_need_to_upload_approval_callcenter"=>$request->dealer_need_to_upload_approval_callcenter,
                "intimation_insurance_dealer_adv_callcenter"=>$request->intimation_insurance_dealer_adv_callcenter,
                "mail_copy_ad_pymnt_dealer_callcenter"=>$request->mail_copy_ad_pymnt_dealer_callcenter,
                "apc_time_dealer_callcenter"=>$request->apc_time_dealer_callcenter,
                "need_to_b_vrfy_custmr_als_callcenter"=>$request->need_to_b_vrfy_custmr_als_callcenter,
                "apc_rs_dealer_callcenter"=>$request->apc_rs_dealer_callcenter,
                "need_to_b_vrfy_cust_als_callcenter"=>$request->need_to_b_vrfy_cust_als_callcenter,
                "api_time_dealer_callcenter"=>$request->api_time_dealer_callcenter,
                "api_rs_dealer_callcenter"=>$request->api_rs_dealer_callcenter
            ];
            $amsIdExist = Pre_App_Stage::where('ref_id', $amsid)->doesntExist();
            if($amsIdExist)
            {Pre_App_Stage::insert($preStage);}
            else
            {Pre_App_Stage::where('ref_id', $amsid)->update($preStage);}
            
            /********************************************************************************************************/
            $repairStage = 
            [
                "ref_id"=>$amsid,
                "repair_work_start_dealer" => $request->repair_work_start_dealer,
                "repair_work_start_dealer_remarks" => $request->repair_work_start_dealer_remarks,
                "tech_id_mob" => $request->tech_id_mob,
                "tech_id_mob_remarks" => $request->tech_id_mob_remarks,
                "need_to_be_verify_with_technician_remarks" => $request->need_to_be_verify_with_technician_remarks,
                "detail_damaged_dealer" => $request->detail_damaged_dealer,
                "detail_damaged_dealer_remarks" => $request->detail_damaged_dealer_remarks,
                "available_at_dealer" => $request->available_at_dealer,
                "available_at_dealer_remarks" => $request->available_at_dealer_remarks,
                "AOR_need_to_place" => $request->AOR_need_to_place,
                "AOR_need_to_place_remarks" => $request->AOR_need_to_place_remarks,
                "In_Transit" => $request->In_Transit,
                "In_Transit_remarks" => $request->In_Transit_remarks,
                "Local_purchase" => $request->Local_purchase,
                "Local_purchase_remarks" => $request->Local_purchase_remarks,
                "Arrange_form_other_branch" => $request->Arrange_form_other_branch,
                "Arrange_form_other_branch_remarks" => $request->Arrange_form_other_branch_remarks,
                "TOC_order" => $request->TOC_order,
                "TOC_order_remarks" => $request->TOC_order_remarks,
                "sheet_denting_repair" => $request->sheet_denting_repair,
                "sheet_denting_repair_remarks" => $request->sheet_denting_repair_remarks,
                "mech_elec_repair" => $request->mech_elec_repair,
                "mech_elec_repair_remarks" => $request->mech_elec_repair_remarks,
                "painting_start" => $request->painting_start,
                "painting_start_remarks" => $request->painting_start_remarks,
                "painting_start_date_yet_to_collect" => $request->painting_start_date_yet_to_collect,
                "painting_start_date_yet_to_collect_remarks" => $request->painting_start_date_yet_to_collect_remarks,
                "cabin_trims_parts" => $request->cabin_trims_parts,
                "cabin_trims_parts_remarks" => $request->cabin_trims_parts_remarks,
                "trim_of_cabin_date_to_collect" => $request->trim_of_cabin_date_to_collect,
                "trim_of_cabin_date_to_collect_remarks" => $request->trim_of_cabin_date_to_collect_remarks,
                "outside_job" => $request->outside_job,
                "outside_job_remarks" => $request->outside_job_remarks,
                "outside_purpose" => $request->outside_purpose,
                "outside_purpose_remarks" => $request->outside_purpose_remarks,
                "AOR_raised" => $request->AOR_raised,
                "AOR_raised_remarks" => $request->AOR_raised_remarks,
                "so_no" => $request->so_no,
                "so_no_remarks" => $request->so_no_remarks,
                "arrange_mat" => $request->arrange_mat,
                "arrange_mat_remarks" => $request->arrange_mat_remarks,
                "if_yes_no" => $request->if_yes_no,
                "if_yes_no_remarks" => $request->if_yes_no_remarks,
                "receipt_all_parts" => $request->receipt_all_parts,
                "receipt_all_parts_remarks" => $request->receipt_all_parts_remarks,
                "intimation_surveyor" => $request->intimation_surveyor,
                "intimation_surveyor_remarks" => $request->intimation_surveyor_remarks,
                "supplementary_estimate" => $request->supplementary_estimate,
                "supplementary_estimate_remarks" => $request->supplementary_estimate_remarks,
                "supplementary_estimate_val" => $request->supplementary_estimate_val,
                "supplementary_estimate_val_remarks" => $request->supplementary_estimate_val_remarks,
                "supplementary_inspection" => $request->supplementary_inspection,
                "supplementary_inspection_remarks" => $request->supplementary_inspection_remarks,
                "supplementary_written_approval" => $request->supplementary_written_approval,
                "inform_to_customer_on_approval_remarks" => $request->inform_to_customer_on_approval_remarks,
                "parts_get_approval" => $request->parts_get_approval,
                "parts_get_approval_remarks" => $request->parts_get_approval_remarks,
                "repair_completion" => $request->repair_completion,
                "repair_completion_remarks" => $request->repair_completion_remarks,
                "inform_to_customer_vehicle" => $request->inform_to_customer_vehicle,
                "inform_to_customer_vehicle_remarks" => $request->inform_to_customer_vehicle_remarks,
                "repair_delay_reason" => $request->repair_delay_reason,
                "repair_work_start_dealer_callcenter"=>$request->repair_work_start_dealer_callcenter,
                "tech_id_mob_callcenter"=>$request->tech_id_mob_callcenter,
                "need_to_be_verify_with_technician_callcenter"=>$request->need_to_be_verify_with_technician_callcenter,
                "detail_damaged_dealer_callcenter"=>$request->detail_damaged_dealer_callcenter,
                "available_at_dealer_callcenter"=>$request->available_at_dealer_callcenter,
                "AOR_need_to_place_callcenter"=>$request->AOR_need_to_place_callcenter,
                "Local_purchase_callcenter"=>$request->Local_purchase_callcenter,
                "Arrange_form_other_branch_callcenter"=>$request->Arrange_form_other_branch_callcenter,
                "TOC_order_callcenter"=>$request->TOC_order_callcenter,
                "sheet_denting_repair_callcenter"=>$request->sheet_denting_repair_callcenter,
                "mech_elec_repair_callcenter"=>$request->mech_elec_repair_callcenter,
                "painting_start_callcenter"=>$request->painting_start_callcenter,
                "painting_start_date_yet_to_collect_callcenter"=>$request->painting_start_date_yet_to_collect_callcenter,
                "cabin_trims_parts_callcenter"=>$request->cabin_trims_parts_callcenter,
                "trim_of_cabin_date_to_collect_callcenter"=>$request->trim_of_cabin_date_to_collect_callcenter,
                "outside_job_callcenter"=>$request->outside_job_callcenter,
                "outside_purpose_callcenter"=>$request->outside_purpose_callcenter,
                "AOR_raised_callcenter"=>$request->AOR_raised_callcenter,
                "so_no_callcenter"=>$request->so_no_callcenter,
                "arrange_mat_callcenter"=>$request->arrange_mat_callcenter,
                "if_yes_no_callcenter"=>$request->if_yes_no_callcenter,
                "receipt_all_parts_callcenter"=>$request->receipt_all_parts_callcenter,
                "intimation_surveyor_callcenter"=>$request->intimation_surveyor_callcenter,
                "supplementary_estimate_callcenter"=>$request->supplementary_estimate_callcenter,
                "supplementary_estimate_val_callcenter"=>$request->supplementary_estimate_val_callcenter,
                "supplementary_inspection_callcenter"=>$request->supplementary_inspection_callcenter,
                "In_Transit_callcenter"=>$request->In_Transit_callcenter,
                "supplementary_written_approval_callcenter"=>$request->supplementary_written_approval_callcenter,
                "inform_to_customer_on_approval_callcenter"=>$request->inform_to_customer_on_approval_callcenter,
                "parts_get_approval_callcenter"=>$request->parts_get_approval_callcenter,
                "repair_completion_callcenter"=>$request->repair_completion_callcenter,
                "inform_to_customer_vehicle_callcenter"=>$request->inform_to_customer_vehicle_callcenter
            ];
            $amsIdExist = Repair_Stage::where('ref_id', $amsid)->doesntExist();
            if($amsIdExist)
            {Repair_Stage::insert($repairStage);}
            else
            {Repair_Stage::where('ref_id', $amsid)->update($repairStage);}
            
            /********************************************************************************************************/
            $postStage = 
            [
                "ref_id" => $amsid,
                "iicfi" => $request->iicfi,
                "mail_copy_final_insption" => $request->mail_copy_final_insption,
                "conduct_road_test" => $request->conduct_road_test,
                "need_to_vrfy_with_customer" => $request->need_to_vrfy_with_customer,
                "final_insption_surveyor" => $request->final_insption_surveyor,
                "proforma_submission" => $request->proforma_submission,
                "Need__be_verified_with_Surveyor" => $request->Need__be_verified_with_Surveyor,
                "receipt_delivery_order" => $request->receipt_delivery_order,
                "job_card_closed" => $request->job_card_closed,
                "bill_value_customer" => $request->bill_value_customer,
                "bill_value_insurance" => $request->bill_value_insurance,
                "bal_payment_customer" => $request->bal_payment_customer,
                "Need_be_verified_Customer" => $request->Need_be_verified_Customer,
                "bal_payment_customer_rs" => $request->bal_payment_customer_rs,
                "Need_be_verified_Customer_" => $request->Need_be_verified_Customer_,
                "collecting_satisfaction_voucher" => $request->collecting_satisfaction_voucher,
                "veh_delivery_customer" => $request->veh_delivery_customer,
                "Need_be_verified_Custmr_" => $request->Need_be_verified_Custmr_,
                "bal_pymnt_ins" => $request->bal_pymnt_ins,
                "bal_pymnt_ins_rs" => $request->bal_pymnt_ins_rs,
                "gate_pass" => $request->gate_pass,
                "post_delay_reason" => $request->post_delay_reason,
                "iicfi_callcenter" => $request->iicfi_callcenter,
                "mail_copy_final_insption_callcenter" => $request->mail_copy_final_insption_callcenter,
                "conduct_road_test_callcenter" => $request->conduct_road_test_callcenter,
                "need_to_vrfy_with_customer_callcenter" => $request->need_to_vrfy_with_customer_callcenter,
                "final_insption_surveyor_callcenter" => $request->final_insption_surveyor_callcenter,
                "proforma_submission_callcenter" => $request->proforma_submission_callcenter,
                "receipt_delivery_order_callcenter" => $request->receipt_delivery_order_callcenter,
                "Need__be_verified_with_Surveyor_callcenter" => $request->Need__be_verified_with_Surveyor_callcenter,
                "job_card_closed_callcenter" => $request->job_card_closed_callcenter,
                "bill_value_customer_callcenter" => $request->bill_value_customer_callcenter,
                "bal_payment_customer_callcenter" => $request->bal_payment_customer_callcenter,
                "bill_value_insurance_callcenter" => $request->bill_value_insurance_callcenter,
                "bal_payment_customer_rs_callcenter" => $request->bal_payment_customer_rs_callcenter,
                "Need_be_verified_Customer_callcenter" => $request->Need_be_verified_Customer_callcenter,
                "collecting_satisfaction_voucher_callcenter" => $request->collecting_satisfaction_voucher_callcenter,
                "veh_delivery_customer_callcenter" => $request->veh_delivery_customer_callcenter,
                "Need_be_verified_Custmr_callcenter" => $request->Need_be_verified_Custmr_callcenter,
                "bal_pymnt_ins_callcenter" => $request->bal_pymnt_ins_callcenter,
                "bal_pymnt_ins_rs_callcenter" => $request->bal_pymnt_ins_rs_callcenter,
                "gate_pass_callcenter" => $request->gate_pass_callcenter
            ];
            $amsIdExist = Post_App_Stage::where('ref_id', $amsid)->doesntExist();
            if($amsIdExist)
            {Post_App_Stage::insert($postStage);}
            else
            {Post_App_Stage::where('ref_id', $amsid)->update($postStage);}
            
            /*********************************************************************************************************/
            $preAnalysis =  
            [
                "delay_prepare_dealer" => $request->delay_prepare_dealer,
                "ref_id"=>$amsid,
                "delay_submsn_docs" => $request->delay_submsn_docs,
                "surveyor_deputation_dealer" => $request->surveyor_deputation_dealer,
                "delay_surveyor_deputation" => $request->delay_surveyor_deputation,
                "approval_dismantling_surveyor" => $request->approval_dismantling_surveyor,
                "delay_dismantling_completion" => $request->delay_dismantling_completion,
                "intimation_to_surveyor_for_second_inspection" => $request->intimation_to_surveyor_for_second_inspection,
                "delay_surveyor_completion" => $request->delay_surveyor_completion,
                "surveyor_approval" => $request->surveyor_approval,
                "approval_delay" => $request->approval_delay,
                "advance_payment_delay" => $request->advance_payment_delay,
                "delay_intimation_nsurance" => $request->delay_intimation_nsurance,
                "advance_payment_delay_ins" => $request->advance_payment_delay_ins,
                "pre_delay_dealer" => $request->pre_delay_dealer,
                "pre_delay_customer" => $request->pre_delay_customer,
                "pre_surveyor_company" => $request->pre_surveyor_company,
                "delay_prepare_dealer_remarks" => $request->delay_prepare_dealer_remarks,
                "delay_submsn_docs_remarks" => $request->delay_submsn_docs_remarks,
                "surveyor_deputation_dealer_remarks" => $request->surveyor_deputation_dealer_remarks,
                "delay_surveyor_deputation_remarks" => $request->delay_surveyor_deputation_remarks,
                "approval_dismantling_surveyor_remarks" => $request->approval_dismantling_surveyor_remarks,
                "delay_dismantling_completion_remarks" => $request->delay_dismantling_completion_remarks,
                "intimation_to_surveyor_for_second_inspection_remarks" => $request->intimation_to_surveyor_for_second_inspection_remarks,
                "delay_surveyor_completion_remarks" => $request->delay_surveyor_completion_remarks,
                "surveyor_approval_remarks" => $request->surveyor_approval_remarks,
                "approval_delay_remarks" => $request->approval_delay_remarks,
                "advance_payment_delay_remarks" => $request->advance_payment_delay_remarks,
                "delay_intimation_nsurance_remarks" => $request->delay_intimation_nsurance_remarks,
                "advance_payment_delay_ins_remarks" => $request->advance_payment_delay_ins_remarks,
                "pre_delay_dealer_remarks" => $request->pre_delay_dealer_remarks,
                "pre_delay_customer_remarks" => $request->pre_delay_customer_remarks,
                "pre_surveyor_company_remarks" => $request->pre_surveyor_company_remarks
            ];
            $amsIdExist = Pre_App_Delay::where('ref_id', $amsid)->doesntExist();
            if($amsIdExist)
            {Pre_App_Delay::insert($preAnalysis);}
            else
            {Pre_App_Delay::where('ref_id', $amsid)->update($preAnalysis);}
            
            /************************************************************************************************************/
            $repairAnalysis = 
            [
                "delay_start" => $request->delay_start,
                "ref_id"=>$amsid,
                "delay_preparing" => $request->delay_preparing,
                "no_days_taken_metal" => $request->no_days_taken_metal,
                "no_days_taken_works" => $request->no_days_taken_works,
                "no_days_taken_painting" => $request->no_days_taken_painting,
                "no_days_taken_cabin" => $request->no_days_taken_cabin,
                "repair_receipt_all_parts" => $request->repair_receipt_all_parts,
                "repair_outside_job" => $request->repair_outside_job,
                "delay_supp_estimate" => $request->delay_supp_estimate,
                "delay_report_workshop" => $request->delay_report_workshop,
                "delay_approval_supp_est" => $request->delay_approval_supp_est,
                "approval_delay_customer" => $request->approval_delay_customer,
                "repair_completion_bibo" => $request->repair_completion_bibo,
                "inform_to_customer_work_completed" => $request->inform_to_customer_work_completed,
                "repaire_delay_customer" => $request->repaire_delay_customer,
                "repaire_surveyor_company" => $request->repaire_surveyor_company,
                "delay_start_remarks" => $request->delay_start_remarks,
                "delay_preparing_remarks" => $request->delay_preparing_remarks,
                "no_days_taken_metal_remarks" => $request->no_days_taken_metal_remarks,
                "no_days_taken_works_remarks" => $request->no_days_taken_works_remarks,
                "no_days_taken_painting_remarks" => $request->no_days_taken_painting_remarks,
                "no_days_taken_cabin_remarks" => $request->no_days_taken_cabin_remarks,
                "repair_receipt_all_parts_remarks" => $request->repair_receipt_all_parts_remarks,
                "repair_outside_job_remarks" => $request->repair_outside_job_remarks,
                "delay_supp_estimate_remarks" => $request->delay_supp_estimate_remarks,
                "delay_report_workshop_remarks" => $request->delay_report_workshop_remarks,
                "delay_approval_supp_est_remarks" => $request->delay_approval_supp_est,
                "approval_delay_customer_remarks" => $request->approval_delay_customer_remarks,
                "repair_completion_bibo_remarks" => $request->repair_completion_bibo_remarks,
                "inform_to_customer_work_completed_remarks" => $request->inform_to_customer_work_completed_remarks,
                "repaire_delay_customer_remarks" => $request->repaire_delay_customer_remarks,
                "repaire_surveyor_company_remarks" => $request->repaire_surveyor_company_remarks
            ];
            $amsIdExist = Repair_Delay::where('ref_id', $amsid)->doesntExist();
            if($amsIdExist)
            {Repair_Delay::insert($repairAnalysis);}
            else
            {Repair_Delay::where('ref_id', $amsid)->update($repairAnalysis);}
            
            /***********************************************************************************************************/
            $postAnalysis =  
            [
                "delay_final_inspection" => $request->delay_final_inspection,
                "ref_id"=>$amsid,
                "delay_road_test" => $request->delay_road_test,
                "delay_final_inspection_surveyor" => $request->delay_final_inspection_surveyor,
                "delay_submission_invoice" => $request->delay_submission_invoice,
                "receipt_delivery_report" => $request->receipt_delivery_report,
                "job_card_open_close" => $request->job_card_open_close,
                "delay_final_payment_customer" => $request->delay_final_payment_customer,
                "delay_final_payment_insurance" => $request->delay_final_payment_insurance,
                "delay_collect_vehicle" => $request->delay_collect_vehicle,
                "vehicle_inward_wards" => $request->vehicle_inward_wards,
                "gigo" => $request->gigo,
                "post_delay_dealer" => $request->post_delay_dealer,
                "post_delay_customer" => $request->post_delay_customer,
                "post_surveyor_company" => $request->post_surveyor_company,
                "delay_final_inspection_remarks" => $request->delay_final_inspection_remarks,
                "delay_road_test_remarks" => $request->delay_road_test_remarks,
                "delay_final_inspection_surveyor_remarks" => $request->delay_final_inspection_surveyor_remarks,
                "delay_submission_invoice_remarks" => $request->delay_submission_invoice_remarks,
                "receipt_delivery_report_remarks" => $request->receipt_delivery_report_remarks,
                "job_card_open_close_remarks" => $request->job_card_open_close_remarks,
                "delay_final_payment_customer_remarks" => $request->delay_final_payment_customer_remarks,
                "delay_final_payment_insurance_remarks" => $request->delay_final_payment_insurance_remarks,
                "delay_collect_vehicle_remarks" => $request->delay_collect_vehicle_remarks,
                "vehicle_inward_wards_remarks" => $request->vehicle_inward_wards_remarks,
                "gigo_remarks" => $request->gigo_remarks,
                "post_delay_dealer_remarks" => $request->post_delay_dealer_remarks,
                "post_delay_customer_remarks" => $request->post_delay_customer_remarks,
                "post_surveyor_company_remarks" => $request->post_surveyor_company_remarks 
            ];
            $amsIdExist = Post_Approval_Delay_Analysis::where('ref_id', $amsid)->doesntExist();
            if($amsIdExist)
            {Post_Approval_Delay_Analysis::insert($postAnalysis);}
            else
            {Post_Approval_Delay_Analysis::where('ref_id', $amsid)->update($postAnalysis);}
            
            /**********************************************************************************************************/


            $query  = $this->userLog::where('job_card_no', $request->Job_card_No)->exists();
                if($query)
                {
                    $this->userLog::where('job_card_no',$request->Job_card_No)->update(['user_id'=>Auth::user()->id,
                            'updated_by' => Auth::user()->name,
                            'label'=> 'Complaint Controller Job card Updated',
                            'updated_data'=> $data,
                            'job_card_no'=> $request->Job_card_No,
                            'updated_at' => date('Y-m-d h:m:s')
                            ]);
                }
                else
                {
                    $this->userLog::insert(['user_id'=>Auth::user()->id,
                            'updated_by'=>Auth::user()->name,
                            'label'=> 'Complaint Controller Job card Updated',
                            'updated_data'=> $data,
                            'job_card_no'=> $request->Job_card_No,
                            'created_at' => date('Y-m-d h:m:s')
                            ]);
                }

            // trackLogs($Job_card_No, "Update", "Complaint Controller", $data, Auth::user()->name);
            $this->amsinfo::insert(['Job_card_No' => $Job_card_No, 'action' => "Update", 'title' => "Complaint Controller", 'data' => $data,  'created_by' => Auth::user()->name]);
            $notification = callNotification('success',"Update Successfully");
            DB::commit();
            return back()->with($notification);
        } 
        catch (\Exception $ex)
        {
            DB::rollback();
            ExceptionLog::create(['type'=>'update_job_card', 'exception' => $ex->getMessage(),'job_card_no' => $Job_card_No]);
            $notification = array(
                        'message' => $ex->getMessage().' Line: '.$ex->getLine(),
                        'message' => "Something went wrong!",
                        'alert-type' => 'error');
            return back()->with($notification);
        }
    }

	public function recycleData()
    {
        try 
        {
			if( Auth::user()->email == 'ramjin@dispostable.com')
            {
				ams_info::where("case_status",'!=', 'Completed')->update(["flag" => "0","case_status_flag"=>"0"]);
				ams_info::whereNull('case_status')->update(["flag" => "0","case_status_flag"=>"0"]);
				$notification = array(
					'message' => "Reset Data successfully",
					'alert-type' => 'success'
				);
			}
            else
            {
				$notification = array(
					'message' => "You are not autherized",
					'alert-type' => 'error'
				);
			}
            return back()->with($notification);
        } 
        catch (\Exception $ex)
        {
            $notification = array(
                'message' => "Something went wrong!",
                'alert-type' => 'error');
            return back()->with($notification);
        }
    }

	public function jobcardDelete($id)
	{
		try
        {
            $loginEmail = Auth::user()->email;
            if($loginEmail == "adminleyland@dispostable.com")
            {
                $res=ams_info::where('id',$id)->get()->first()->toArray();
                $Job_card_No = $res['Job_card_No'];
                ams_info::where('id',$id)->delete();
                ams_info_log::where('Job_card_No',$Job_card_No)->delete();
                $notification = array(
                    'message' => "Delete Successfully",
                    'alert-type' => "success"
                );
            }
            else
            {
                $notification = array(
                    'message' => "You are not autherized",
                    'alert-type' => "error"
                );
            }
            return back()->with($notification);
		}
        catch (\Exception $ex) 
        {
			$notification = array(
                'message' => $ex->getMessage(),
                'alert-type' => 'error');
            return redirect()->route('access')->with($notification);
        }
	}
}