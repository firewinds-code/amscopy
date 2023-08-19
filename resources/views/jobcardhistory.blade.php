
<style>
    table {border-collapse: collapse;}
</style>
<p style="color: red;font-size: 18px;padding: 8px;"><img style="padding: 0 30px;position: relative;top: 29px;" id="logo" src="https://alpertestcallcenter.ashokleyland.com/elitesupport/public/images/logo.jpg" alt="logo" width="243" height="50"></p>
<p style="text-align: center;font-size: 18px;padding: 8px;">ACCIDENT VEHICLE TRACKER SHEET : @isset($records->Job_card_No){{ $records->Job_card_No }} @endisset</p>
<table class="table">
    <tbody>
        <tr style="background: #ccc;">
            <td colspan="6"><label style="font-size: 16px;"><b>ACCIDENT DETAILS</b></label></td>
        </tr>
        <tr>
            <td><b>Job card opened</b></td>
            <td>@isset($records->Job_Card_open_date){{ $records->Job_Card_open_date }} @endisset</td>
            <td><b>Model of vehicle</b></td>
            <td> @isset($records->model){{ $records->model }} @endisset</td>
            <td><b>Job card No.</b></td>
            <td> @isset($records->Job_card_No){{ $records->Job_card_No }} @endisset</td>
        </tr>
        <tr>
            <td><b>Chassis No.</b></td>
            <td>@isset($records->Chassis_Number){{ $records->Chassis_Number }} @endisset</td>
            <td><b>Customer Name</b></td>
            <td>@isset($records->Customer_Name){{ $records->Customer_Name }} @endisset</td>
            <td><b>Mobile No.</b></td>
            <td>@isset($records->Accident_In_charge_contact_Number){{ $records->Accident_In_charge_contact_Number }} @endisset</td>
        </tr>
        <tr>
            <td><b>Reg no.</b></td>
            <td> @isset($records->Vehicle_Registration_Number){{ $records->Vehicle_Registration_Number }} @endisset</td>
            <td><b>Estimate Value</b></td>
            <td> @isset($records->Initial_Estimate_Value_Rs){{ $records->Initial_Estimate_Value_Rs }} @endisset </td>
            <td><b>Insurance Companys Name & Type</b></td>
            <td>@isset($records->Name_of_Insurance_company){{ $records->Name_of_Insurance_company }} @endisset</td>
        </tr>
        <tr>
            <td><b>Outlet Name & Code</b></td>
            <td></td>
            <td><b>Surveyor Name & contact details</b></td>
            <td>@isset($records->Surveyor_Name){{ $records->Surveyor_Name }} @endisset</td>
            <td><b>Accident incharge Name & Mobile</b></td>
            <td>@isset($records->Accident_In_charge_Name){{ $records->Accident_In_charge_Name }} @endisset  &nbsp;&nbsp;&nbsp; @isset($records->Accident_In_charge_contact_Number){{ $records->Accident_In_charge_contact_Number }} @endisset</td>
        </tr>
    </tbody>
</table>

<table class="table" border="1">
    <tr style="background: #ccc;">
        <td colspan="10"><label style="font-size: 16px;"><b>Pre Approval Stage</b></label></td>
    </tr>
    <tr>
        <th style="text-align: left;"><b>Sr. No.</b></th>
        <th style="text-align: left;"><b>Accident Repair Activity</b></th>
        <th style="text-align: left;"><b>Started Date</b></th>
        <th style="text-align: left;"><b>Completed Date</b></th>
        <th style="text-align: left;"><b>No. of Days Delay</b></th>
        <th style="text-align: left;"><b>Status</b></th>
        <th style="text-align: left;"><b>Reason for Time Taken</b></th>
    </tr>
    <tbody>
        <tr>
            <td>1.</td>
            <td>Vehicle reported to W/s</td>
            <td>@isset($records->Job_Card_open_date){{ $records->Job_Card_open_date }} @endisset</td>
            <td>@isset($records->job_card_closed){{ $records->job_card_closed }} @endisset</td>
            <td>0</td>
            <td>Completed</td>
            <td></td>
        </tr>
        <tr>
            <td>2.</td>
           <td>Initial Estimation preparation</td>
           <td>@isset($records->initial_estimate_dealer){{ $records->initial_estimate_dealer }} @endisset </td>
           <td>@isset($records->initial_estimate_dealer){{ $records->initial_estimate_dealer }} @endisset </td>
            <td>0</td>
            <td>Completed</td>
            <td></td>
        </tr>
        <tr>
            <td>3.</td>
           <td>Surveyor Deputed</td>
           <td>@isset($records->Surveyor_initial_inspection_date){{ $records->Surveyor_initial_inspection_date }} @endisset </td>
           <td>@isset($records->Surveyor_initial_inspection_date){{ $records->Surveyor_initial_inspection_date }} @endisset </td>
            <td>0</td>
            <td>Completed</td>
            <td></td>
        </tr>
        <tr>
            <td>4.</td>
           <td> Initial Inspection/approval  by surveyor for dismantling</td>
           <td> @isset($records->Intimation_2_IC_for_surveyor_deputation){{ $records->Intimation_2_IC_for_surveyor_deputation }} @endisset</td>
           <td> @isset($records->Intimation_2_IC_for_surveyor_deputation){{ $records->Intimation_2_IC_for_surveyor_deputation }} @endisset</td>
            <td>0</td>
            <td>Completed</td>
            <td></td>
        </tr>
        <tr>
            <td>5.</td>
            <td>Job card opened</td>
            <td>@isset($records->Job_Card_open_date){{ $records->Job_Card_open_date }} @endisset</td>
            <td>@isset($records->job_card_closed){{ $records->job_card_closed }} @endisset</td>
            <td>0</td>
            <td>Completed</td>
            <td></td>
        </tr>
        <tr>
            <td>6.</td>
           <td>Original Document Submission</td>
           <td>@isset($records->all_docs_customer){{ $records->all_docs_customer }} @endisset </td>
           <td>@isset($records->all_docs_customer){{ $records->all_docs_customer }} @endisset </td>
            <td>0</td>
            <td>Completed</td>
            <td></td>
        </tr>
        <tr>
            <td>7.</td>
           <td>  Start the dismantling the vehicle on</td>
           <td>@isset($records->approval_dismantling_dealer){{ $records->approval_dismantling_dealer }} @endisset </td>
           <td>@isset($records->dismantling_completion_dealer){{ $records->dismantling_completion_dealer }} @endisset </td>
            <td>0</td>
            <td>Completed</td>
            <td></td>
        </tr>
        <tr>
            <td>8.</td>
           <td>Approval from Insurance company</td>
           <td>@isset($records->intimation_insurance_dealer){{ $records->intimation_insurance_dealer }} @endisset </td>
           <td>@isset($records->intimation_insurance_dealer){{ $records->intimation_insurance_dealer }} @endisset </td>
            <td>0</td>
            <td>Completed</td>
            <td></td>
        </tr>
</tbody></table>
<table class="table" border="1">
    <tr style="background: #ccc;">
        <td colspan="10"><label style="font-size: 16px;"><b>Repair Stage</b></label></td>
    </tr>
    <tr>
        <th style="text-align: left;"><b>Sr. No.</b></th>
        <th style="text-align: left;"><b>Accident Repair Activity</b></th>
        <th style="text-align: left;"><b>Started Date</b></th>
        <th style="text-align: left;"><b>Completed Date</b></th>
        <th style="text-align: left;"><b>No. of Days Delay</b></th>
        <th style="text-align: left;"><b>Status</b></th>
        <th style="text-align: left;"><b>Reason for Time Taken</b></th>
    </tr>
    <tbody>
        <tr>
            <td>1.</td>
            <td>Detail Damaged parts list preparation</td>
            <td>@isset($records->detail_damaged_dealer){{ $records->detail_damaged_dealer }} @endisset </td>
            <td>@isset($records->detail_damaged_dealer){{ $records->detail_damaged_dealer }} @endisset </td>
            <td>0</td>
            <td>Completed</td>
            <td></td>
        </tr>
        <tr>
           <td>2.</td>
           <td>AOR Raised - AOR No.</td>
           <td>@isset($records->AOR_raised){{ $records->AOR_raised }} @endisset </td>
           <td>@isset($records->AOR_raised){{ $records->AOR_raised }} @endisset </td>
           <td>0</td>
           <td>Completed</td>
           <td></td>
        </tr>
        <tr>
            <td>3.</td>
           <td>Receipt of Parts</td>
           <td>@isset($records->receipt_all_parts){{ $records->receipt_all_parts }} @endisset </td>
           <td>@isset($records->receipt_all_parts){{ $records->receipt_all_parts }} @endisset </td>
           <td>0</td>
           <td>Completed</td>
           <td></td>
        </tr>
        <tr>
            <td>4.</td>
           <td>Sheet Metal/ Denting  Repair work</td>
            <td>@isset($records->sheet_denting_repair){{ $records->sheet_denting_repair }} @endisset </td>
            <td>@isset($records->sheet_denting_repair){{ $records->sheet_denting_repair }} @endisset </td>
            <td>0</td>
            <td>Completed</td>
            <td></td>
        </tr>
        <tr>
            <td>5.</td>
           <td>Vehicle level mechanical & electrical repair (other than cabin)</td>
           <td>@isset($records->mech_elec_repair){{ $records->mech_elec_repair }} @endisset </td>
           <td>@isset($records->mech_elec_repair){{ $records->mech_elec_repair }} @endisset </td>
            <td>0</td>
            <td>Completed</td>
            <td></td>
        </tr>
        <tr>
           <td>6.</td>
           <td>Painting work </td>
           <td>@isset($records->painting_start){{ $records->painting_start }} @endisset </td>
           <td>@isset($records->painting_start){{ $records->painting_start }} @endisset </td>
           <td>0</td>
           <td>Completed</td>
           <td></td>
        </tr>
        <tr>
            <td>7.</td>
           <td>Cabin trims Parts fitment completed</td>
           <td>@isset($records->cabin_trims_parts){{ $records->cabin_trims_parts }} @endisset </td>
           <td>@isset($records->cabin_trims_parts){{ $records->cabin_trims_parts }} @endisset </td>
            <td>0</td>
            <td>Completed</td>
            <td></td>
        </tr>
   </tbody>
</table>
<table class="table" border="1">
    <tr style="background: #ccc;">
        <td colspan="10"><label style="font-size: 16px;"><b>Post Repair Activity</b></label></td>
    </tr>
    <tr>
        <th style="text-align: left;"><b>Sr. No.</b></th>
        <th style="text-align: left;"><b>Accident Repair Activity</b></th>
        <th style="text-align: left;"><b>Started Date</b></th>
        <th style="text-align: left;"><b>Completed Date</b></th>
        <th style="text-align: left;"><b>No. of Days Delay</b></th>
        <th style="text-align: left;"><b>Status</b></th>
        <th style="text-align: left;"><b>Reason for Time Taken</b></th>
    </tr>
    <tbody>
        <tr>
            <td>1.</td>
            <td>Pre- Invoice preparation</td>
            <td>@isset($records->receipt_delivery_order){{ $records->receipt_delivery_order }} @endisset </td>
           <td>@isset($records->receipt_delivery_order){{ $records->receipt_delivery_order }} @endisset </td>
            <td>0</td>
            <td>Completed</td>
            <td></td>
        </tr>
        <tr>
            <td>2.</td>
           <td>Re-Inspection by surveyor</td>
           <td>@isset($records->final_insption_surveyor){{ $records->final_insption_surveyor }} @endisset </td>
           <td>@isset($records->final_insption_surveyor){{ $records->final_insption_surveyor }} @endisset </td>
            <td>0</td>
            <td>Completed</td>
            <td></td>
        </tr>
        <tr>
            <td>3.</td>
           <td>Salvage (Amount)</td>
           <td>@isset($records->bal_payment_customer){{ $records->bal_payment_customer }} @endisset </td>
           <td>@isset($records->bal_payment_customer){{ $records->bal_payment_customer }} @endisset </td>
            <td>0</td>
            <td>Completed</td>
            <td></td>
        </tr>
        <tr>
            <td>4.</td>
           <td>Bill Submission to Surveyor/ insurance company</td>
           <td>@isset($records->bal_pymnt_ins){{ $records->bal_pymnt_ins }} @endisset </td>
           <td>@isset($records->bal_pymnt_ins){{ $records->bal_pymnt_ins }} @endisset </td>
            <td>0</td>
            <td>Completed</td>
            <td></td>
        </tr>
        <tr>
            <td>5.</td>
           <td>Final report from Surveyor</td>
           <td>@isset($records->Final_inspection_date){{ $records->Final_inspection_date }} @endisset </td>
           <td>@isset($records->Final_inspection_date){{ $records->Final_inspection_date }} @endisset </td>
            <td>0</td>
            <td>Completed</td>
            <td></td>
        </tr>
        <tr>
            <td>6.</td>
           <td>Receipt of DO/ Liability report from insurance company</td>
           <td>@isset($records->receipt_delivery_order){{ $records->receipt_delivery_order }} @endisset </td>
           <td>@isset($records->receipt_delivery_order){{ $records->receipt_delivery_order }} @endisset </td>
            <td>0</td>
            <td>Completed</td>
            <td></td>
        </tr>
        <tr>
            <td>7.</td>
           <td>Settlement from customer for payment</td>
           <td>@isset($records->bal_payment_customer){{ $records->bal_payment_customer }} @endisset </td>
           <td>@isset($records->bal_payment_customer){{ $records->bal_payment_customer }} @endisset </td>
            <td>0</td>
            <td>Completed</td>
            <td></td>
        </tr>
        <tr>
            <td>8.</td>
           <td>On Road the vehicle</td>
           <td>@isset($records->gate_pass){{ $records->gate_pass }} @endisset </td>
           <td>@isset($records->gate_pass){{ $records->gate_pass }} @endisset </td>
           <td>0</td>
           <td>Completed</td>
           <td></td>
        </tr>
</tbody>
</table>
