@extends("layouts.masterlayout")
@section('title','Complaint List')
@section('bodycontent')
<div class="content-wrapper mobcss">
	<div class="card">
		<div class="card-body">
			<div class="row">

				<div class="col-md-12">
                @if(Session::has('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success !</strong> {{__('PSF Query Updated Successfully ')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                 @endif
                 @if(Session::has('error'))
                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>
                @endif
                    <div class="clear"></div>

{{-- /////////////////////////////////////////////////////////////////////////////////////////// --}}

                    <div class="ribbon">Vehicle Details</div>
                    <div class="tab">
                        <div class="row ">
                            <div class="col-md-6">

                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <label for="inputEmail3">Veh Reg No.</label>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <input type="text" name="Vehicle_Registration_Number"
                                            id="Vehicle_Registration_Number" class="form-control"
                                            {{ Auth::user()->email != 'adminleyland@dispostable.com' ? 'readonly' : '' }}
                                            value="{{ $data->Vehicle_Registration_Number }}" readonly />
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="Vehicle_Registration_Number_remarks"
                                            id="Vehicle_Registration_Number_remarks" class="form-control"
                                            value="{{ $data->Vehicle_Registration_Number_remarks }}"
                                            placeholder="enter remarks" readonly />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>Verified in Vahan <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="verified_in_vahan"
                                            value="{{ $data->verified_in_vahan }}" id="verified_in_vahan"
                                            class="form-control" readonly />
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="verified_in_vahan_remarks"
                                            id="verified_in_vahan_remarks"
                                            value="{{ $data->verified_in_vahan_remarks }}" class="form-control"
                                            placeholder="Enter Remarks" readonly />
                                    </div>
                                </div>

                                <div class=" form-group row">
                                    <div class="col-md-4">
                                        <label>Model <span class="text-danger"></span></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="model" id="model" class="form-control"
                                            value="{{ $data->model }}" readonly />
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="model_remarks" id="model_remarks"
                                            class="form-control" value="{{ $data->model_remarks }}"
                                            placeholder="Enter Remarks" readonly />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>BS6/Non BS6 <span class="text-danger"></span></label>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="bs_nonbs" id="bs_nonbs" class="form-control"
                                            value="{{ $data->bs_nonbs }}" readonly />
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="bs_nonbs_remarks" id="bs_nonbs_remarks"
                                            class="form-control" value="{{ $data->bs_nonbs_remarks }}"
                                            placeholder="Enter Remarks" readonly />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="inputEmail3">Chassis Number</label>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <input type="text" name="Chassis_Number" id="Chassis_Number"
                                            class="form-control" value="{{ $data->Chassis_Number }}"
                                            {{ Auth::user()->email != 'adminleyland@dispostable.com' ? 'readonly' : '' }} readonly />
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="Chassis_Number_remarks"
                                            id="Chassis_Number_remarks" class="form-control"
                                            value="{{ $data->Chassis_Number_remarks }}"
                                            {{ Auth::user()->email != 'adminleyland@dispostable.com' ? 'readonly' : '' }}
                                            placeholder="enter remarks" readonly />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label>Engine No <span class="text-danger"></span></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="engine_no" id="engine_no" class="form-control"
                                            value="{{ $data->engine_no }}" readonly />
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="engine_no_remarks" id="engine_no_remarks"
                                            class="form-control" value="{{ $data->engine_no_remarks }}"
                                            placeholder="Enter Remarks" readonly />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>Date of Sale <span class="text-danger"></span></label>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="date_of_sale" id="date_of_sale"
                                            class="form-control" value="{{ $data->date_of_sale }}" readonly />
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="date_of_sale_remarks" id="date_of_sale"
                                            class="form-control" value="{{ $data->date_of_sale_remarks }}"
                                            placeholder="Enter remarks" readonly />
                                    </div>
                                </div>




                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label>Segment <span class="text-danger"></span></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="segment" id="segment" class="form-control"
                                            value="{{ $data->segment }}" readonly />
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="segment_remarks" id="segment_remarks"
                                            class="form-control" value="{{ $data->segment_remarks }}"
                                            placeholder="Enter Remarks" readonly />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>Name of the Insurance <span class="text-danger"></span></label>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="name_of_the_insurance"
                                            id="name_of_the_insurance" class="form-control"
                                            value="{{ $data->name_of_the_insurance }}" readonly />
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="name_of_the_insurance_remarks"
                                            id="name_of_the_insurance" class="form-control"
                                            value="{{ $data->name_of_the_insurance_remarks }}"
                                            placeholder="Enter remarks" readonly />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-4 form-group">
                                        <label>Insurance Policy No. <span class="text-danger"></span></label>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="insurance_policy_no" id="insurance_policy_no"
                                            class="form-control" value="{{ $data->insurance_policy_no }}" readonly />
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="insurance_policy_no_remarks"
                                            id="insurance_policy_no" class="form-control"
                                            value="{{ $data->insurance_policy_no_remarks }}"
                                            placeholder="Enter Remarks" readonly />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>Owner/ Customer Name <span class="text-danger"></span></label>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="customer_name" id="customer_name"
                                            class="form-control" value="{{ $data->customer_name }}" readonly />
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="customer_name_remarks"
                                            id="customer_name_remarks" class="form-control"
                                            value="{{ $data->customer_name_remarks }}"
                                            placeholder="Enter remarks" readonly />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>Owner/ Customer Contact<span class="text-danger"></span></label>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="customer_name" id="customer_name"
                                            class="form-control" value="{{ $data->customer_name }}" readonly />
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="customer_name_remarks"
                                            id="customer_name_remarks" class="form-control"
                                            value="{{ $data->customer_name_remarks }}"
                                            placeholder="Enter remarks" readonly />
                                    </div>
                                </div>

                            </div>

                        <div class="col-md-6">



                                <div class="form-group row">
                                    <div class="col-md-4 form-group">
                                        <label>Driver Name <span class="text-danger"></span></label>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="driver_name" id="driver_name"
                                            value="{{ $data->driver_name }}" class="form-control" readonly />
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="driver_name_remarks" id="driver_name_remarks"
                                            class="form-control" value="{{ $data->driver_name_remarks }}"
                                            placeholder="Enter Remarks" readonly />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>Driving Contact No<span class="text-danger"></span></label>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="driver_contact_no" id="driver_contact_no"
                                            value="{{ $data->driver_contact_no }}" class="form-control" readonly />
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="driver_contact_no_remarks"
                                            id="driver_contact_no_remarks" class="form-control"
                                            value="{{ $data->driver_contact_no_remarks }}"
                                            placeholder="Enter Remarks" readonly />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>Customer Email Id<span class="text-danger"></span></label>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="email" name="customer_email_id" id="customer_email_id"
                                            value="{{ $data->customer_email_id }}" class="form-control" readonly />
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="customer_email_id_remarks"
                                            id="customer_email_id_remarks" class="form-control"
                                            value="{{ $data->customer_email_id_remarks }}"
                                            placeholder="Enter Remarks" readonly />
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>Driving License Number <span class="text-danger"></span></label>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="driving_license_number"
                                            id="driving_license_number"
                                            value="{{ $data->driving_license_number }}"
                                            class="form-control" readonly />
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="driving_license_number_remarks"
                                            id="driving_license_number_remarks" class="form-control"
                                            value="{{ $data->driving_license_number_remarks }}"
                                            placeholder="Enter Remarks" readonly />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>DL Validity Date <span class="text-danger"></span></label>
                                    </div>
                                    <div class="col-md-4 form-group">

                                        <input type="date" name="DL_validity_date"
                                            value="{{ $data->DL_validity_date }}" id="DL_validity_date"
                                            class="form-control" readonly />
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="DL_validity_date_remarks"
                                            id="DL_validity_date_remarks" class="form-control"
                                            value="{{ $data->DL_validity_date_remarks }}"
                                            placeholder="Enter Remarks" readonly />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>Driver Statement <span class="text-danger"></span></label>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <textarea name="driver_statement" id="driver_statement" class="form-control" readonly>{{ $data->driver_statement }}</textarea>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <textarea name="driver_statement_remarks" id="driver_statement_remarks" class="form-control" readonly>{{ $data->driver_statement_remarks }}</textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="inputEmail3">Date of Accident</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="Date_of_Accident" id="Date_of_Accident"
                                            class="form-control" value="{{ $data->Date_of_Accident }}"
                                            {{ Auth::user()->email != 'adminleyland@dispostable.com' ? 'readonly' : '' }} readonly />
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="Date_of_Accident_remarks"
                                            id="Date_of_Accident_remarks" class="form-control"
                                            value="{{ $data->Date_of_Accident_remarks }}"
                                            {{ Auth::user()->email != 'adminleyland@dispostable.com' ? 'readonly' : '' }}
                                            placeholder="enter remarks" readonly />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Location of the accident <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <textarea name="location_of_the_accident" id="location_of_the_accident" class="form-control" readonly>{{ $data->location_of_the_accident }}</textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <textarea name="location_of_the_accident_remarks" id="location_of_the_accident_remarks" class="form-control" readonly>{{ $data->location_of_the_accident_remarks }}</textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>Mode of Claims <span class="text-danger"></span></label>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <select name="mode_of_claims" id="mode_of_claims" class="form-control"
                                            readonly>
                                            <option value="">--Select--</option>
                                            <option @if ($data->mode_of_claims == 'insurance') selected @endif
                                                value="insurance">Insurance</option>
                                            <option @if ($data->mode_of_claims == 'customer') selected @endif
                                                value="customer">Customer</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" name="mode_of_claims_remarks"
                                            id="mode_of_claims_remarks" class="form-control"
                                            value="{{ $data->mode_of_claims_remarks }}"
                                            placeholder="Enter remarks" readonly />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>Other than AL fitment, what extra fitted by Customer <span
                                                class="text-danger"></span></label>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="AL_fitment" id="AL_fitment"
                                            value="{{ $data->AL_fitment }}" readonly class="form-control" />
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input type="text" name="AL_fitment_remarks" id="AL_fitment_remarks"
                                            class="form-control" value="{{ $data->AL_fitment_remarks }}"
                                            placeholder="Enter Remarks" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

{{-- /////////////////////////////////////////////////////////////////////////////////////////// --}}

                    <div class="ribbon">General Details</div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Dealer</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Remarks</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Accident In Charge Name<span
                                                    class="text-danger"></span></label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" name="Accident_In_charge_Name"
                                        id="Accident_In_charge_Name" class="form-control"
                                        value="{{ $data->Accident_In_charge_Name }}"
                                        {{ Auth::user()->email != 'adminleyland@dispostable.com' ? 'readonly' : '' }} readonly />
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" name="Accident_In_charge_Name_remarks"
                                            id="Accident_In_charge_Name_remarks" class="form-control"
                                            value="{{ $data->Accident_In_charge_Name_remarks }}"
                                            placeholder="enter remarks"  readonly/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Accident in charge Mobile<span
                                                    class="text-danger"></span></label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" name="accident_charge_mobile_dealer"
                                                id="accident_charge_mobile_dealer" class="form-control"
                                                value="{{ $data->accident_charge_mobile_dealer }}" readonly />
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" name="accident_charge_mobile_dealer_remarks"
                                                id="accident_charge_mobile_dealer_remarks"class="form-control"
                                                value="{{ $data->accident_charge_mobile_dealer_remarks }}"
                                                placeholder="Enter remarks" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Accident In charge email ID <span
                                                    class="text-danger"></span></label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="email" name="customer_and_accident_in_charge_email_id"
                                                id="customer_and_accident_in_charge_email_id" class="form-control"
                                                value="{{ $data->customer_and_accident_in_charge_email_id }}" readonly />
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" name="customer_and_accident_in_charge_email_id_remarks"
                                                id="customer_and_accident_in_charge_email_id_remarks"class="form-control"
                                                value="{{ $data->customer_and_accident_in_charge_email_id_remarks }}"
                                                placeholder="Enter remarks" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Vehicle reported at workshop <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="date" name="veh_rep_wkshp_dealer"
                                                id="veh_rep_wkshp_dealer" class="form-control"
                                                value="{{ $data->veh_rep_wkshp_dealer }}" readonly />
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" name="veh_rep_wkshp_dealer_remarks"
                                                id="veh_rep_wkshp_dealer_remarks" class="form-control"
                                                value="{{ $data->veh_rep_wkshp_dealer_remarks }}"
                                                placeholder="Enter remarks" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Name of the workshop <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" name="name_wkshp_dealer"
                                                id="name_wkshp_dealer" class="form-control"
                                                value="{{ $data->name_wkshp_dealer }}" readonly />
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" name="name_wkshp_dealer_remarks"
                                                id="name_wkshp_dealer_remarks" class="form-control"
                                                value="{{ $data->name_wkshp_dealer_remarks }}"
                                                placeholder="Enter remarks" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Dealer</label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Remarks</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>SAC Code of the workshop <span
                                                    class="text-danger"></span></label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input readonly type="text" name="sac_code_wrkshp" id="sac_code_wrkshp" class="form-control" value="{{$data->sac_code_wrkshp}}">

                                        </div>
                                        <div class="form-group col-md-4">
                                            <input readonly type="text" name="sac_code_wrkshp_remarks"
                                                id="sac_code_wrkshp_remarks" class="form-control"
                                                value="{{ $data->sac_code_wrkshp_remarks }}"
                                                placeholder="Enter remarks" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <label for="inputEmail3">Zone</label>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <input readonly type="text" name="Zone" id="Zone"
                                            class="form-control" value="{{ $data->Zone }}"
                                            {{ Auth::user()->email != 'adminleyland@dispostable.com' ? 'readonly' : '' }} />
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input readonly type="text" name="Zone_remarks" id="Zone_remarks"
                                            class="form-control" value="{{ $data->Zone_remarks }}"
                                            {{ Auth::user()->email != 'adminleyland@dispostable.com' ? 'readonly' : '' }}
                                            placeholder="enter remarks" />
                                    </div>
                                </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Region Office <span class="text-danger"></span></label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input readonly type="text" name="region_office" id="region_office"
                                                class="form-control" value="{{ $data->region_office }}" />

                                        </div>
                                        <div class="form-group col-md-4">
                                            <input readonly type="text" name="region_office_remarks"
                                                id="region_office_remarks" class="form-control"
                                                value="{{ $data->region_office_remarks }}"
                                                placeholder="Enter remarks" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label for="inputEmail3">Area Office</label>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <input readonly type="text" name="Area_Office" id="Area_Office"
                                        class="form-control" value="{{ $data->Area_Office }}"
                                        {{ Auth::user()->email != 'adminleyland@dispostable.com' ? 'readonly' : '' }} />
                                </div>
                                <div class="col-md-4 form-group">
                                    <input readonly type="text" name="Area_Office_remarks"
                                        id="Area_Office_remarks" class="form-control"
                                        value="{{ $data->Area_Office_remarks }}"
                                        {{ Auth::user()->email != 'adminleyland@dispostable.com' ? 'readonly' : '' }}
                                        placeholder="enter remarks" />
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label for="inputEmail3">Job Card Open Date</label>
                                </div>
                                <div class="col-sm-4 form-group">
                                  <input readonly type="date" {{ Auth::user()->email != 'adminleyland@dispostable.com' ? 'readonly' : '' }} name="Job_Card_open_date" id="Job_Card_open_date" class="form-control" value="{{ $data->Job_Card_open_date }}"  />
                                </div>
                                <div class="col-md-4 form-group">
                                    <input readonly type="text" name="Job_Card_open_date_remarks"
                                        id="Job_Card_open_date_remarks" class="form-control"
                                        value="{{ $data->Job_Card_open_date_remarks }}"
                                        placeholder="enter remarks" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label for="inputEmail3">Job Card No</label>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <input readonly type="text" name="Job_card_No" id="Job_card_No"
                                        class="form-control"
                                        {{ Auth::user()->email != 'adminleyland@dispostable.com' ? 'readonly' : '' }}
                                        value="{{ $data->Job_card_No }}" />
                                </div>
                                <div class="col-md-4 form-group">
                                    <input readonly type="text" name="Job_card_No_remarks"
                                        id="Job_card_No_remarks" class="form-control"
                                        value="{{ $data->Job_card_No_remarks }}"
                                        placeholder="enter remarks" />
                                </div>
                            </div>

                        </div>
                    </div>

{{-- /////////////////////////////////////////////////////////////////////////////////////////// --}}

                    <div class="ribbon">Post Service Feedback Query</div>
                    <div class="col-md-12">
                        <form type="post" action="{{url('customer-query-update')}}" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden"  name="job_card_id" value="{{$id}}">
                            <div class="form-group col-md-6">
                                Are you satisfied with Quality of work. (Yes/No)
                            </div>
                            <div class="form-group col-md-3">
                                <select name="quality_of_work"
                                    id="quality_of_work" class="form-control">
                                <option @if($row->quality_of_work == 'yes') selected @endif value="yes">Yes</option>
                                <option @if($row->quality_of_work == 'no') selected @endif value="no">No</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <textarea name="quality_of_work_remarks"
                                   id="quality_of_work_remarks" class="form-control">@if(isset($row->quality_of_work_remarks)) {{$row->quality_of_work_remarks}} @endif</textarea>
                            </div>
                        </div>
{{-- ******************************************************************************************* --}}
                            <div class="row">
                                <div class="form-group col-md-6" id="1">
                                    Are you satisfied with labor /parts charged by the dealer.
                                </div>
                                <div class="form-group col-md-3">
                                    <select name="labour_work_satisfied"
                                        id="labour_work_satisfied" class="form-control">
                                    <option @if(isset($row->labour_work_satisfied) == 'yes') selected @endif value="yes">Yes</option>
                                    <option @if(isset($row->labour_work_satisfied) == 'no') selected @endif value="no">No</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <textarea name="labour_work_satisfied_remarks"
                                    id="labour_work_satisfied_remarks" class="form-control">@if(isset($row->labour_work_satisfied_remarks)){{$row->labour_work_satisfied_remarks}} @endif</textarea>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-md-6" id="2">
                                    Was the vehicle delivered as per the given timeline  (Yes/No)
                                </div>
                                <div class="form-group col-md-3">
                                    <select name="vehicle_deliverd_on_time"
                                    id="vehicle_deliverd_on_time" class="form-control">
                                <option @if(isset($row->vehicle_deliverd_on_time) == 'yes') selected @endif value="yes">Yes</option>
                                <option @if(isset($row->vehicle_deliverd_on_time) == 'no') selected @endif value="no">No</option>
                                </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <textarea name="vehicle_deliverd_on_time_remarks"
                                    id="vehicle_deliverd_on_time_remarks" class="form-control">@if(isset($row->vehicle_deliverd_on_time_remarks)){{$row->vehicle_deliverd_on_time_remarks}}@endif</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6" id="3">
                                    How comfortable you were with the Overall process
                                </div>
                                <div class="form-group col-md-6">
                                    <textarea name="comfortable_overall_process_remarks"
                                    id="comfortable_overall_process_remarks" class="form-control">@if(isset($row->comfortable_overall_process_remarks)){{$row->comfortable_overall_process_remarks}}@endif</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6" id="4">
                                    May I know what is the thing that you liked most about the servicing
                                </div>

                                <div class="form-group col-md-6">
                                    <textarea name="liked_most_about_the_servicing_services"
                                    id="liked_most_about_the_servicing_services" class="form-control">@if(isset($row->liked_most_about_the_servicing_services)){{$row->liked_most_about_the_servicing_services}}@endif</textarea>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="form-group col-md-6" id="5">
                                    Not Satisfy Reason
                                </div>
                                <div class="form-group col-md-6">
                                    <textarea name="not_satisfy_reason"
                                    id="not_satisfy_reason" class="form-control">@if(isset($row->not_satisfy_reason)){{$row->not_satisfy_reason}}@endif</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6" id="6">
                                    Not Satisfy Complaint/Concern 
                                </div>

                                <div class="form-group col-md-6">
                                    <textarea name="not_satisfy_complaint_concern"
                                    id="not_satisfy_complaint_concern" class="form-control">@if(isset($row->not_satisfy_complaint_concern)){{$row->not_satisfy_complaint_concern}}@endif</textarea>
                                </div>
                            </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                PSF VOC
                            </div>

                            <div class="form-group col-md-6">
                                <textarea name="psf_voc"
                                   id="psf_voc" class="form-control">@if(isset($row->psf_voc)){{$row->psf_voc}}@endif</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="ribbon">Pre- Closing</div>
                    <div class="row">
                        <div class="form-group col-md-6" id="suggest_to_the_improve_the_services">
                            Is there anything you want to suggest to the improve the services
                        </div>

                        <div class="form-group col-md-6">
                            <textarea name="suggest_to_the_improve_the_services_remarks"
                               id="suggest_to_the_improve_the_services_remarks" class="form-control">@if(isset($row->suggest_to_the_improve_the_services_remarks)){{$row->suggest_to_the_improve_the_services_remarks}}@endif</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6" id="feedback_that_you_want_to_give">
                            Is there any other feedback that you want to give
                        </div>
                        <div class="form-group col-md-6">
                            <textarea name="Is_there_any_other_feedback"
                               id="Is_there_any_other_feedback" class="form-control">@if(isset($row->Is_there_any_other_feedback)){{$row->Is_there_any_other_feedback}}@endif</textarea>
                        </div>
                    </div>


                    <div>
                        <button type="submit" class="btn btn-success">Query Update</button>
                    </div>
                </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script>
    $(function(){
      var work =  $('#quality_of_work').val();

      if(work == 'yes')
      {
        $('#1').show();
        $('#2').show();
        $('#3').show();
        $('#4').show();
        $('#suggest_to_the_improve_the_services_remarks').show();
        $('#suggest_to_the_improve_the_services').show();
        $('#labour_work_satisfied').show();
        $('#labour_work_satisfied_remarks').show();
        $('#vehicle_deliverd_on_time').show();
        $('#vehicle_deliverd_on_time_remarks').show();
        $('#comfortable_overall_process_remarks').show();
        $('#liked_most_about_the_servicing_services').show();
      }
      else{
        $('#1').hide();
        $('#2').hide();
        $('#4').hide();
        $('#3').hide();
        $('#labour_work_satisfied').hide();
        $('#labour_work_satisfied_remarks').hide();
        $('#vehicle_deliverd_on_time').hide();
        $('#vehicle_deliverd_on_time_remarks').hide();
        $('#comfortable_overall_process_remarks').hide();
        $('#liked_most_about_the_servicing_services').hide();
        $('#suggest_to_the_improve_the_services_remarks').hide();
        $('#suggest_to_the_improve_the_services').hide();
      }
      
      if(work == 'no')
      {
        $('#5').show();
        $('#6').show();
        $('#not_satisfy_reason').show();
        $('#not_satisfy_complaint_concern').show();
        $('#Is_there_any_other_feedback').show();
        $('#feedback_that_you_want_to_give').show();
      }
      else{
        $('#5').hide();
        $('#6').hide();
        $('#not_satisfy_reason').hide();
        $('#not_satisfy_complaint_concern').hide();
        $('#Is_there_any_other_feedback').hide();
        $('#feedback_that_you_want_to_give').hide();
      }
$('#quality_of_work').change(function(){
    if($(this).val() == 'yes')
    {
        $('#1').show();
        $('#2').show();
        $('#3').show();
        $('#4').show();
        $('#labour_work_satisfied').show();
        $('#labour_work_satisfied_remarks').show();
        $('#vehicle_deliverd_on_time').show();
        $('#vehicle_deliverd_on_time_remarks').show();
        $('#comfortable_overall_process_remarks').show();
        $('#liked_most_about_the_servicing_services').show();
        $('#Is_there_any_other_feedback').hide();
        $('#feedback_that_you_want_to_give').hide();
    }
    else{
        $('#1').hide();
        $('#2').hide();
        $('#4').hide();
        $('#3').hide();
        $('#labour_work_satisfied').hide();
        $('#labour_work_satisfied_remarks').hide();
        $('#vehicle_deliverd_on_time').hide();
        $('#vehicle_deliverd_on_time_remarks').hide();
        $('#comfortable_overall_process_remarks').hide();
        $('#liked_most_about_the_servicing_services').hide();
        $('#Is_there_any_other_feedback').show();
        $('#feedback_that_you_want_to_give').show();
    }

    if($(this).val() == 'no')
    {
        $('#5').show();
        $('#6').show();
        $('#suggest_to_the_improve_the_services_remarks').hide();
        $('#suggest_to_the_improve_the_services').hide();
        $('#not_satisfy_reason').show();
        $('#not_satisfy_complaint_concern').show();
    }
    else{
         $('#5').hide();
        $('#6').hide();
        $('#suggest_to_the_improve_the_services_remarks').show();
        $('#suggest_to_the_improve_the_services').show();
        $('#not_satisfy_reason').hide();
        $('#not_satisfy_complaint_concern').hide();
    }


});

    });
</script>
