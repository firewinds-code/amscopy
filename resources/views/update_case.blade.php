@extends('layouts.masterlayout')
@section('title', 'Create Complaint')
<style>
    #pageloader {
        background: rgba(255, 255, 255, 0.8);
        display: none;
        height: 100%;
        position: fixed;
        width: 100%;
        z-index: 9999;
    }

    #pageloader img {
        left: 50%;
        margin-left: -32px;
        margin-top: -32px;
        position: absolute;
        top: 50%;
    }

    * {
        box-sizing: border-box;
    }

    /* Style the search field */
    .example input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        float: right;
        width: 10%;
        background: #f1f1f1;
    }

    /* Style the submit button */
    .example button {
        float: right;
        width: 8%;
        padding: 3px;
        background: #00A6D7;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        /* Prevent double borders */
        cursor: pointer;
    }

    .example button:hover {
        background: #0b7dda;
    }

    /* Clear floats */
    form.example::after {
        content: "";
        clear: both;
        display: table;
    }
</style>

@section('bodycontent')
    <div class="content-wrapper mobcss">
        <div id="pageloader">
            <img src="http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif" alt="processing..." />
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="clear"></div>
                        <form name="myFormaa" method="post" id="myFormaa" enctype="multipart/form-data"
                            action="{{ route('store-form') }}" target="blank">

                            @csrf
                            <input type="hidden" name="id" value="{{ $data[0]->amsid }}" />
                            <div class="ribbon">Vehicle Details</div>
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label for="inputEmail3">Vehicle Reg No.</label>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <input type="text" name="Vehicle_Registration_Number"
                                                id="Vehicle_Registration_Number" class="form-control"
                                                {{ Auth::user()->email != 'adminleyland@dispostable.com' ? 'readonly' : '' }}
                                                {{-- ternary operator - if the condition Auth::user()->email != 'adminleyland@dispostable.com' evaluates to true, then the value 'readonly' will be assigned. If the condition is false, an empty string will be assigned --}} value="{{ $data[0]->Vehicle_Registration_Number }}" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="Vehicle_Registration_Number_remarks"
                                                id="Vehicle_Registration_Number_remarks" class="form-control"
                                                value="{{ $data[0]->Vehicle_Registration_Number_remarks }}"
                                                placeholder="enter remarks" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Verified in Vahan <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="verified_in_vahan"
                                                value="{{ $data[0]->verified_in_vahan }}" id="verified_in_vahan"
                                                class="form-control" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="verified_in_vahan_remarks"
                                                id="verified_in_vahan_remarks"
                                                value="{{ $data[0]->verified_in_vahan_remarks }}" class="form-control"
                                                placeholder="Enter Remarks" />
                                        </div>
                                    </div>

                                    <div class=" form-group row">
                                        <div class="col-md-4">
                                            <label>Model <span class="text-danger"></span></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="model" id="model" class="form-control"
                                                value="{{ $data[0]->model }}" />
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="model_remarks" id="model_remarks"
                                                class="form-control" value="{{ $data[0]->model_remarks }}"
                                                placeholder="Enter Remarks" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>BS6/Non BS6 <span class="text-danger"></span></label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="bs_nonbs" id="bs_nonbs" class="form-control"
                                                value="{{ $data[0]->bs_nonbs }}" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="bs_nonbs_remarks" id="bs_nonbs_remarks"
                                                class="form-control" value="{{ $data[0]->bs_nonbs_remarks }}"
                                                placeholder="Enter Remarks" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label for="inputEmail3">Chassis Number</label>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <input type="text" name="Chassis_Number" id="Chassis_Number"
                                                class="form-control" value="{{ $data[0]->Chassis_Number }}"
                                                {{ Auth::user()->email != 'adminleyland@dispostable.com' ? 'readonly' : '' }} />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="Chassis_Number_remarks" id="Chassis_Number_remarks"
                                                class="form-control" value="{{ $data[0]->Chassis_Number_remarks }}"
                                                {{ Auth::user()->email != 'adminleyland@dispostable.com' ? 'readonly' : '' }}
                                                placeholder="enter remarks" />
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            <label>Engine No <span class="text-danger"></span></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="engine_no" id="engine_no" class="form-control"
                                                value="{{ $data[0]->engine_no }}" />
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="engine_no_remarks" id="engine_no_remarks"
                                                class="form-control" value="{{ $data[0]->engine_no_remarks }}"
                                                placeholder="Enter Remarks" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Date of Sale <span class="text-danger"></span></label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="date_of_sale" id="date_of_sale"
                                                class="form-control" value="{{ $data[0]->date_of_sale }}" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="date_of_sale_remarks" id="date_of_sale"
                                                class="form-control" value="{{ $data[0]->date_of_sale_remarks }}"
                                                placeholder="Enter remarks" />
                                        </div>
                                    </div>




                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            <label>Segment <span class="text-danger"></span></label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="segment" id="segment" class="form-control"
                                                value="{{ $data[0]->segment }}" />
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="segment_remarks" id="segment_remarks"
                                                class="form-control" value="{{ $data[0]->segment_remarks }}"
                                                placeholder="Enter Remarks" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Name of the Insurance <span class="text-danger"></span></label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="name_of_the_insurance" id="name_of_the_insurance"
                                                class="form-control" value="{{ $data[0]->name_of_the_insurance }}" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="name_of_the_insurance_remarks"
                                                id="name_of_the_insurance" class="form-control"
                                                value="{{ $data[0]->name_of_the_insurance_remarks }}"
                                                placeholder="Enter remarks" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-4 form-group">
                                            <label>Insurance Policy No. <span class="text-danger"></span></label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="insurance_policy_no" id="insurance_policy_no"
                                                class="form-control" value="{{ $data[0]->insurance_policy_no }}" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="insurance_policy_no_remarks"
                                                id="insurance_policy_no" class="form-control"
                                                value="{{ $data[0]->insurance_policy_no_remarks }}"
                                                placeholder="Enter Remarks" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Owner/ Customer Name <span class="text-danger"></span></label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="customer_name" id="customer_name"
                                                class="form-control" value="{{ $data[0]->customer_name }}" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="customer_name_remarks" id="customer_name_remarks"
                                                class="form-control" value="{{ $data[0]->customer_name_remarks }}"
                                                placeholder="Enter remarks" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Owner/ Customer Contact<span class="text-danger"></span></label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="customer_name" id="customer_name"
                                                class="form-control" value="{{ $data[0]->customer_name }}" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="customer_name_remarks" id="customer_name_remarks"
                                                class="form-control" value="{{ $data[0]->customer_name_remarks }}"
                                                placeholder="Enter remarks" />
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
                                                value="{{ $data[0]->driver_name }}" class="form-control" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="driver_name_remarks" id="driver_name_remarks"
                                                class="form-control" value="{{ $data[0]->driver_name_remarks }}"
                                                placeholder="Enter Remarks" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Driving Contact No<span class="text-danger"></span></label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="driver_contact_no" id="driver_contact_no"
                                                value="{{ $data[0]->driver_contact_no }}" class="form-control" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="driver_contact_no_remarks"
                                                id="driver_contact_no_remarks" class="form-control"
                                                value="{{ $data[0]->driver_contact_no_remarks }}"
                                                placeholder="Enter Remarks" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Customer Email Id<span class="text-danger"></span></label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="email" name="customer_email_id" id="customer_email_id"
                                                value="{{ $data[0]->customer_email_id }}" class="form-control" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="customer_email_id_remarks"
                                                id="customer_email_id_remarks" class="form-control"
                                                value="{{ $data[0]->customer_email_id_remarks }}"
                                                placeholder="Enter Remarks" />
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Driving License Number <span class="text-danger"></span></label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="driving_license_number"
                                                id="driving_license_number"
                                                value="{{ $data[0]->driving_license_number }}" class="form-control" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="driving_license_number_remarks"
                                                id="driving_license_number_remarks" class="form-control"
                                                value="{{ $data[0]->driving_license_number_remarks }}"
                                                placeholder="Enter Remarks" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>DL Validity Date <span class="text-danger"></span></label>
                                        </div>
                                        <div class="col-md-4 form-group">

                                            <input type="text" name="DL_validity_date"
                                                value="{{ $data[0]->DL_validity_date }}" id="DL_validity_date"
                                                class="form-control datepickr" onchange="dateformat(this)" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="DL_validity_date_remarks"
                                                id="DL_validity_date_remarks" class="form-control"
                                                value="{{ $data[0]->DL_validity_date_remarks }}"
                                                placeholder="Enter Remarks" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Driver Statement <span class="text-danger"></span></label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <textarea name="driver_statement" id="driver_statement" class="form-control">{{ $data[0]->driver_statement }}</textarea>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <textarea name="driver_statement_remarks" id="driver_statement_remarks" class="form-control">{{ $data[0]->driver_statement_remarks }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="inputEmail3">Date of Accident</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" name="Date_of_Accident" id="Date_of_Accident"
                                                class="form-control" value="{{ $data[0]->Date_of_Accident }}"
                                                {{ Auth::user()->email != 'adminleyland@dispostable.com' ? 'readonly' : '' }} />
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="Date_of_Accident_remarks"
                                                id="Date_of_Accident_remarks" class="form-control"
                                                value="{{ $data[0]->Date_of_Accident_remarks }}"
                                                {{ Auth::user()->email != 'adminleyland@dispostable.com' ? 'readonly' : '' }}
                                                placeholder="enter remarks" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Location of the accident <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <textarea name="location_of_the_accident" id="location_of_the_accident" class="form-control">{{ $data[0]->location_of_the_accident }}</textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <textarea name="location_of_the_accident_remarks" id="location_of_the_accident_remarks" class="form-control">{{ $data[0]->location_of_the_accident_remarks }}</textarea>
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
                                                <option @if ($data[0]->mode_of_claims == 'insurance') selected @endif
                                                    value="insurance">Insurance</option>
                                                <option @if ($data[0]->mode_of_claims == 'customer') selected @endif value="customer">
                                                    Customer</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" name="mode_of_claims_remarks"
                                                id="mode_of_claims_remarks" class="form-control"
                                                value="{{ $data[0]->mode_of_claims_remarks }}"
                                                placeholder="Enter remarks" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Other than AL fitment, what extra fitted by Customer <span
                                                    class="text-danger"></span></label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="AL_fitment" id="AL_fitment"
                                                value="{{ $data[0]->AL_fitment }}" class="form-control" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="AL_fitment_remarks" id="AL_fitment_remarks"
                                                class="form-control" value="{{ $data[0]->AL_fitment_remarks }}"
                                                placeholder="Enter Remarks" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ribbon">General Details</div>
                            <div class="row">
                                <div class="form-group col-md-6" style="border: 1px solid #ccc;">
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
                                                    <label>Accident In Charge Name<span class="text-danger"></span></label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="text" name="Accident_In_charge_Name"
                                                        id="Accident_In_charge_Name" class="form-control"
                                                        value="{{ $data[0]->Accident_In_charge_Name }}"
                                                        {{ Auth::user()->email != 'adminleyland@dispostable.com' ? 'readonly' : '' }} />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="text" name="Accident_In_charge_Name_remarks"
                                                        id="Accident_In_charge_Name_remarks" class="form-control"
                                                        value="{{ $data[0]->Accident_In_charge_Name_remarks }}"
                                                        placeholder="enter remarks" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label>Accident in Charge Mobile<span
                                                            class="text-danger"></span></label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="text" name="accident_charge_mobile_dealer"
                                                        id="accident_charge_mobile_dealer" class="form-control"
                                                        value="{{ $data[0]->accident_charge_mobile_dealer }}" />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="text" name="accident_charge_mobile_dealer_remarks"
                                                        id="accident_charge_mobile_dealer_remarks"class="form-control"
                                                        value="{{ $data[0]->accident_charge_mobile_dealer_remarks }}"
                                                        placeholder="Enter remarks" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label>Accident In Charge Email ID <span
                                                            class="text-danger"></span></label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="email" name="customer_and_accident_in_charge_email_id"
                                                        id="customer_and_accident_in_charge_email_id" class="form-control"
                                                        value="{{ $data[0]->customer_and_accident_in_charge_email_id }}" />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="text"
                                                        name="customer_and_accident_in_charge_email_id_remarks"
                                                        id="customer_and_accident_in_charge_email_id_remarks"class="form-control"
                                                        value="{{ $data[0]->customer_and_accident_in_charge_email_id_remarks }}"
                                                        placeholder="Enter remarks" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label>Vehicle Reported at Workshop <span
                                                            class="text-danger">*</span></label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="text" name="veh_rep_wkshp_dealer"
                                                        id="veh_rep_wkshp_dealer" class="form-control datepickr"
                                                        value="{{ $data[0]->veh_rep_wkshp_dealer }}" />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="text" name="veh_rep_wkshp_dealer_remarks"
                                                        id="veh_rep_wkshp_dealer_remarks" class="form-control"
                                                        value="{{ $data[0]->veh_rep_wkshp_dealer_remarks }}"
                                                        placeholder="Enter remarks" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label>Name of the Workshop <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="text" name="name_wkshp_dealer" id="name_wkshp_dealer"
                                                        class="form-control" value="{{ $data[0]->name_wkshp_dealer }}" />
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="text" name="name_wkshp_dealer_remarks"
                                                        id="name_wkshp_dealer_remarks" class="form-control"
                                                        value="{{ $data[0]->name_wkshp_dealer_remarks }}"
                                                        placeholder="Enter remarks" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6" style="border: 1px solid #ccc;">
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
                                                    <label>SAC Code of the Workshop <span
                                                            class="text-danger"></span></label>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="text" name="sac_code_wrkshp" id="sac_code_wrkshp"
                                                        class="form-control" value="{{ $data[0]->sac_code_wrkshp }}">

                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="text" name="sac_code_wrkshp_remarks"
                                                        id="sac_code_wrkshp_remarks" class="form-control"
                                                        value="{{ $data[0]->sac_code_wrkshp_remarks }}"
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
                                            <input type="text" name="Zone" id="Zone" class="form-control"
                                                value="{{ $data[0]->Zone }}"
                                                {{ Auth::user()->email != 'adminleyland@dispostable.com' ? 'readonly' : '' }} />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="Zone_remarks" id="Zone_remarks"
                                                class="form-control" value="{{ $data[0]->Zone_remarks }}"
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
                                                    <input type="text" name="region_office" id="region_office"
                                                        class="form-control" value="{{ $data[0]->region_office }}" />

                                                </div>
                                                <div class="form-group col-md-4">
                                                    <input type="text" name="region_office_remarks"
                                                        id="region_office_remarks" class="form-control"
                                                        value="{{ $data[0]->region_office_remarks }}"
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
                                            <input type="text" name="Area_Office" id="Area_Office"
                                                class="form-control" value="{{ $data[0]->Area_Office }}"
                                                {{ Auth::user()->email != 'adminleyland@dispostable.com' ? 'readonly' : '' }} />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="Area_Office_remarks" id="Area_Office_remarks"
                                                class="form-control" value="{{ $data[0]->Area_Office_remarks }}"
                                                {{ Auth::user()->email != 'adminleyland@dispostable.com' ? 'readonly' : '' }}
                                                placeholder="enter remarks" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label for="inputEmail3">Job Card Open Date</label>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <input type="date"
                                                {{ Auth::user()->email != 'adminleyland@dispostable.com' ? 'readonly' : '' }}
                                                name="Job_Card_open_date" id="Job_Card_open_date" class="form-control"
                                                value="{{ $data[0]->Job_Card_open_date }}" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="Job_Card_open_date_remarks"
                                                id="Job_Card_open_date_remarks" class="form-control datepickr"
                                                value="{{ $data[0]->Job_Card_open_date_remarks }}"
                                                placeholder="enter remarks" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label for="inputEmail3">Job Card No</label>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <input type="text" name="Job_card_No" id="Job_card_No"
                                                class="form-control"
                                                {{ Auth::user()->email != 'adminleyland@dispostable.com' ? 'readonly' : '' }}
                                                value="{{ $data[0]->Job_card_No }}" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" name="Job_card_No_remarks" id="Job_card_No_remarks"
                                                class="form-control" value="{{ $data[0]->Job_card_No_remarks }}"
                                                placeholder="enter remarks" />
                                        </div>
                                    </div>

                                </div>
                                <div class="ribbon"></div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-1">
                                                Status
                                                <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <select name="case_status" id="case_status" class="form-control"
                                                    required="" onclick="checkAll()">
                                                    <option value="">Select</option>
                                                    <option value="InProgress" selected="">In Progress</option>
                                                    <option value="callback">Call Back</option>
                                                    <option value="Completed" id="Completed" style="display: none;">
                                                        Completed</option>

                                                    <option value="Not Connected">Not Connected</option>
                                                    <option value="RNR">RNR</option>
                                                    <option value="Number Busy">Number Busy</option>
                                                    <option value="Wrong Number">Wrong Number</option>

                                                    <option value="Switched OFF">Switched OFF</option>
                                                    <option value="Out of Services">Out of Services</option>
                                                    <option value="No Response">No Response</option>
                                                    <option value="Call Disconnected By Customer / Dealer">Call
                                                        Disconnected By Customer / Dealer</option>

                                                </select>
                                            </div>
                                            <div class="form-group col-md-1">
                                                Stage <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <select name="stage" id="stage" class="form-control">
                                                    <option value="NA">Select</option>
                                                    <option value="Post Approval stage">Post Approval Stage</option>
                                                    <option value="Pre Approval stage" selected="">Pre Approval
                                                        Stage</option>
                                                    <option value="Repair stage">Repair Stage</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                Remarks <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <select id="remarks" name="remarks" class="form-control">
                                                    <option value="NA">--Select--</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ribbon">Question</div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Is 3rd party involved ?</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <select name="third_party" id="third_party" class="form-control">
                                                <option value="">--Select--</option>
                                                <option @if ($data[0]->third_party == 'yes') selected @endif value="yes">
                                                    Yes</option>
                                                <option @if ($data[0]->third_party == 'no') selected @endif value="no">No
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>Dealer</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" name="third_party_dealer" id="third_party_dealer"
                                                value="{{ $data[0]->third_party_dealer }}" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>Customer</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" name="third_party_customer" id="third_party_customer"
                                                value="{{ $data[0]->third_party_customer }}" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>At time of accident vehicle was loaded ?</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <select name="accident_vehicle" id="accident_vehicle" class="form-control">
                                                <option value="">--Select--</option>
                                                <option @if ($data[0]->accident_vehicle == 'yes') selected @endif value="yes">
                                                    Yes</option>
                                                <option @if ($data[0]->accident_vehicle == 'no') selected @endif value="no">No
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>Dealer</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" name="accident_vehicle_dealer"
                                                value="{{ $data[0]->accident_vehicle_dealer }}"
                                                id="accident_vehicle_dealer" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>Customer</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" name="accident_vehicle_customer"
                                                value="{{ $data[0]->accident_vehicle_customer }}"
                                                id="accident_vehicle_customer" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Whether Vehicle towed to workshop ?</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <select name="Vehicle_towed" id="Vehicle_towed" class="form-control">
                                                <option value="">--Select--</option>
                                                <option @if ($data[0]->Vehicle_towed == 'yes') selected @endif value="yes">
                                                    Yes</option>
                                                <option @if ($data[0]->Vehicle_towed == 'no') selected @endif value="no">No
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>Dealer</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" name="Vehicle_towed_dealer"
                                                value="{{ $data[0]->Vehicle_towed_dealer }}" id="Vehicle_towed_dealer"
                                                class="form-control" />
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>Customer</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" name="Vehicle_towed_customer"
                                                value="{{ $data[0]->Vehicle_towed_customer }}"
                                                id="Vehicle_towed_customer" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Applicable only if PA claim (Driver death)</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <select name="PA_claim" id="PA_claim" class="form-control">
                                                <option value="">--Select--</option>
                                                <option @if ($data[0]->PA_claim == 'yes') selected @endif value="yes">
                                                    Yes</option>
                                                <option @if ($data[0]->PA_claim == 'no') selected @endif value="no">No
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>Dealer</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" name="PA_claim_dealer"
                                                value="{{ $data[0]->PA_claim_dealer }}" id="PA_claim_dealer"
                                                class="form-control" />
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>Customer</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" name="PA_claim_customer"
                                                value="{{ $data[0]->PA_claim_customer }}" id="PA_claim_customer"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Any thermal incident ?</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <select name="thermal_incident" id="thermal_incident" class="form-control">
                                                <option value="">--Select--</option>
                                                <option @if ($data[0]->thermal_incident == 'yes') selected @endif value="yes">
                                                    Yes</option>
                                                <option @if ($data[0]->thermal_incident == 'no') selected @endif value="no">
                                                    No</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>Dealer</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" name="thermal_incident_dealer"
                                                value="{{ $data[0]->thermal_incident_dealer }}"
                                                id="thermal_incident_dealer" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>Customer</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" name="thermal_incident_customer"
                                                value="{{ $data[0]->thermal_incident_customer }}"
                                                id="thermal_incident_customer" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>What are the modifications done in the vehicles ?</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" value="{{ $data[0]->theft_cases }}" name="theft_cases"
                                                id="theft_cases" class="form-control">

                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>Dealer</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" name="theft_cases_dealer"
                                                value="{{ $data[0]->theft_cases_dealer }}" id="theft_cases_dealer"
                                                class="form-control" />
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>Customer</label>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" name="theft_cases_customer"
                                                value="{{ $data[0]->theft_cases_customer }}" id="theft_cases_customer"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label>Remarks if any</label>
                                </div>
                                <div class="form-group col-md-9">
                                    <textarea name="question_remarks" id="question_remarks" class="form-control">{{ $data[0]->questionRemarsk }}</textarea>
                                </div>
                            </div>

                            {{-- ------------------------------------------------------------------------------------------ --}}

                            <div class="ribbon">Document status</div>
                            <div class="row">
                                <div class="form-group col-md-6" style="border: 1px solid #ddd;">
                                    <div class="row form-group">
                                        <div class="form-group col-md-3">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Dealer</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Customer</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Remarks</label>
                                        </div>
                                    </div>
                                    <div class="row form-group" style="padding-top: 10px;">
                                        <div class="form-group col-md-3">
                                            Claim Form <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="Claim_Form_dealer" id="Claim_Form_dealer"
                                                value="{{ $data[0]->Claim_Form_dealer }}" class="form-control datepickr">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="Claim_Form_customer" id="Claim_Form_customer"
                                                class="form-control datepickr"
                                                value="{{ $data[0]->Claim_Form_customer }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="Claim_Form_remarks" id="Claim_Form_remarks"
                                                class="form-control" value="{{ $data[0]->Claim_Form_remarks }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3" style="padding-top: 10px;">
                                            KYC documents as per insurer <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="KYC_dealer" id="KYC_dealer"
                                                value="{{ $data[0]->KYC_dealer }}" class="form-control datepickr">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="KYC_customer" id="KYC_customer"
                                                class="form-control datepickr" value="{{ $data[0]->KYC_customer }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="KYC_remarks" id="KYC_remarks"
                                                class="form-control" value="{{ $data[0]->KYC_remarks }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            Aadhaar Card No. <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="aadhar_dealer" id="aadhar_dealer"
                                                value="{{ $data[0]->aadhar_customer }}" class="form-control datepickr">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="aadhar_customer" id="aadhar_customer"
                                                class="form-control datepickr" value="{{ $data[0]->aadhar_customer }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="aadhar_remarks" id="aadhar_remarks"
                                                class="form-control" value="{{ $data[0]->aadhar_remarks }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            Pan Card of owner <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="pan_dealer" id="pan_dealer"
                                                value="{{ $data[0]->pan_dealer }}" class="form-control datepickr">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="pan_customer" id="pan_customer"
                                                class="form-control datepickr" value="{{ $data[0]->pan_customer }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="pan_remarks" id="pan_remarks"
                                                class="form-control" value="{{ $data[0]->pan_remarks }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            Policy Copy <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="Policy_dealer" id="Policy_dealer"
                                                value="{{ $data[0]->Policy_dealer }}"class="form-control datepickr">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="Policy_customer" id="Policy_customer"
                                                class="form-control datepickr" value="{{ $data[0]->Policy_customer }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="Policy_remarks" id="Policy_remarks"
                                                class="form-control" value="{{ $data[0]->Policy_remarks }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            Driving License <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="DL_dealer" id="DL_dealer"
                                                value="{{ $data[0]->DL_dealer }}" class="form-control datepickr">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="DL_customer" id="DL_customer"
                                                class="form-control datepickr" value="{{ $data[0]->DL_customer }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="DL_remarks" id="DL_remarks" class="form-control"
                                                value="{{ $data[0]->DL_remarks }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            National Permit Route A & B <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="National_Permit_dealer"
                                                id="National_Permit_dealer"
                                                value="{{ $data[0]->National_Permit_dealer }}"
                                                class="form-control datepickr">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="National_Permit_customer"
                                                id="National_Permit_customer" class="form-control datepickr"
                                                value="{{ $data[0]->National_Permit_customer }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="National_Permit_remarks"
                                                id="National_Permit_remarks" class="form-control"
                                                value="{{ $data[0]->National_Permit_remarks }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            Road Tax challan <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="road_tax_dealer" id="road_tax_dealer"
                                                value="{{ $data[0]->road_tax_dealer }}" class="form-control datepickr">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="road_tax_customer" id="road_tax_customer"
                                                class="form-control datepickr"
                                                value="{{ $data[0]->road_tax_customer }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="road_tax_remarks" id="road_tax_remarks"
                                                class="form-control" value="{{ $data[0]->road_tax_remarks }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            Fitness Certificate <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="fitness_dealer" id="fitness_dealer"
                                                value="{{ $data[0]->fitness_dealer }}" class="form-control datepickr">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="fitness_customer" id="fitness_customer"
                                                class="form-control datepickr" value="{{ $data[0]->fitness_customer }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="fitness_remarks" id="fitness_remarks"
                                                class="form-control" value="{{ $data[0]->fitness_remarks }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            Registration of Certification <span class="text-danger">*</span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="registration_dealer"
                                                value="{{ $data[0]->registration_dealer }}" id="registration_dealer"
                                                class="form-control datepickr">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="registration_customer" id="registration_customer"
                                                class="form-control datepickr"
                                                value="{{ $data[0]->registration_customer }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="registration_remarks" id="registration_remarks"
                                                class="form-control" value="{{ $data[0]->registration_remarks }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            Form 23 <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="form23_dealer" id="form23_dealer"
                                                value="{{ $data[0]->form23_dealer }}" class="form-control datepickr">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="form23_customer" id="form23_customer"
                                                class="form-control datepickr"
                                                value="{{ $data[0]->form23_customer }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="form23_remarks" id="form23_remarks"
                                                class="form-control" value="{{ $data[0]->form23_remarks }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            ALL Document submitted <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="all_doc_submitted_dealer"
                                                id="all_doc_submitted_dealer"
                                                value="{{ $data[0]->all_doc_submitted_dealer }}"
                                                class="form-control datepickr">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="all_doc_submitted_customer"
                                                id="all_doc_submitted_customer" class="form-control datepickr"
                                                value="{{ $data[0]->all_doc_submitted_customer }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="all_doc_submitted_remarks"
                                                id="all_doc_submitted_remarks" class="form-control"
                                                value="{{ $data[0]->all_doc_submitted_remarks }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            Last Document submitted date <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="last_doc_submitted_date"
                                                id="last_doc_submitted_date"
                                                value="{{ $data[0]->last_doc_submitted_date }}"
                                                class="form-control datepickr">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="last_doc_submitted_date_customer"
                                                id="last_doc_submitted_date_customer"
                                                value="{{ $data[0]->last_doc_submitted_date_customer }}"
                                                class="form-control datepickr">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="last_doc_submitted_date_remarks"
                                                id="last_doc_submitted_date_remarks"
                                                value="{{ $data[0]->last_doc_submitted_date_remarks }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6" style="border: 1px solid #ddd">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Dealer</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Customer</label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Remarks</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            Spot Surveyor Name <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="spot_surveyor_name_dealer"
                                                id="spot_surveyor_name_dealer"
                                                value="{{ $data[0]->spot_surveyor_name_dealer }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="spot_surveyor_name_customer"
                                                value="{{ $data[0]->spot_surveyor_name_customer }}"
                                                id="spot_surveyor_customer" class="form-control">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="spot_surveyor_name_remarks"
                                                value="{{ $data[0]->spot_surveyor_name_remarks }}"
                                                id="spot_surveyor_name_remarks" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            Spot Surveyor Mobile No <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="spot_surveyor_mobile_dealer"
                                                id="spot_surveyor_mobile_dealer"
                                                value="{{ $data[0]->spot_surveyor_mobile_dealer }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="spot_surveyor_mobile_customer"
                                                id="spot_surveyor_mobile_customer" class="form-control"
                                                value="{{ $data[0]->spot_surveyor_mobile_customer }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="spot_surveyor_mobile_remarks"
                                                id="spot_surveyor_mobile_remarks" class="form-control"
                                                value="{{ $data[0]->spot_surveyor_mobile_remarks }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            Spot Surveyor E-mail ID <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="email" name="spot_surveyor_email_dealer"
                                                id="spot_surveyor_email_dealer"
                                                value="{{ $data[0]->spot_surveyor_email_dealer }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="email" name="spot_surveyor_email_customer"
                                                id="spot_surveyor_email_customer" class="form-control"
                                                value="{{ $data[0]->Spot_Surveyor_E_mail_ID }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="spot_surveyor_email_remarks"
                                                id="spot_surveyor_email_remarks" class="form-control"
                                                value="{{ $data[0]->spot_surveyor_email_remarks }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            Spot Surveyor Report <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="spot_surveyor_reportl_dealer"
                                                id="spot_surveyor_reportl_dealer"
                                                value="{{ $data[0]->spot_surveyor_reportl_dealer }}"
                                                class="form-control datepickr">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="spot_surveyor_reportl_customer"
                                                id="spot_surveyor_reportl_customer" class="form-control datepickr"
                                                value="{{ $data[0]->spot_surveyor_reportl_customer }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="spot_surveyor_reportl_remarks"
                                                id="spot_surveyor_reportl_remarks" class="form-control"
                                                value="{{ $data[0]->spot_surveyor_reportl_remarks }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            FIR copy <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="fir_copy_dealer" id="fir_copy_dealer"
                                                value="{{ $data[0]->fir_copy_dealer }}"
                                                class="form-control datepickr">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="fir_copy_customer" id="fir_copy_customer"
                                                class="form-control datepickr"
                                                value="{{ $data[0]->fir_copy_customer }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="fir_copy_remarks" id="fir_copy_remarks"
                                                class="form-control" value="{{ $data[0]->fir_copy_remarks }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            Load Challan / Trip Sheet <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="load_challan_dealer" id="load_challan_dealer"
                                                value="{{ $data[0]->load_challan_dealer }}"
                                                class="form-control datepickr">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="load_challan_customer"
                                                id="load_challan_customer" class="form-control datepickr"
                                                value="{{ $data[0]->load_challan_customer }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="load_challan_remarks"
                                                id="load_challan_remarks" class="form-control"
                                                value="{{ $data[0]->load_challan_remarks }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            Declaration letter if NO Load (on Rs.100/- Stamp Paper) <span
                                                class="text-danger">*</span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="dec_letter_dealer" id="dec_letter_dealer"
                                                value="{{ $data[0]->dec_letter_dealer }}"
                                                class="form-control datepickr">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="dec_letter_customer" id="dec_letter_customer"
                                                class="form-control datepickr"
                                                value="{{ $data[0]->dec_letter_customer }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="dec_letter_remarks" id="dec_letter_remarks"
                                                class="form-control" value="{{ $data[0]->dec_letter_remarks }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            Fire Brigade Report <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="fire_brigade_report_dealer"
                                                id="fire_brigade_report_dealer"
                                                value="@if (isset($data->fire_brigade_report_dealer)) {{ $data->fire_brigade_report_dealer }} @endif"
                                                class="form-control">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="fire_brigade_report_customer"
                                                id="fire_brigade_report_customer"
                                                value="{{ $data[0]->fire_brigade_report_customer }}"
                                                class="form-control datepickr">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="fire_brigade_report_remarks"
                                                id="fire_brigade_report_remarks"
                                                value="{{ $data[0]->fire_brigade_report_remarks }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            Towing Bill Original <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="towing_bill_dealer" id="towing_bill_dealer"
                                                value="{{ $data[0]->towing_bill_dealer }}"
                                                class="form-control datepickr">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="towing_bill_customer"
                                                id="towing_bill_customer" class="form-control datepickr"
                                                value="{{ $data[0]->towing_bill_customer }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="towing_bill_remarks" id="towing_bill_remarks"
                                                class="form-control" value="{{ $data[0]->towing_bill_remarks }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            Postmortem Report <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="postmortem_report_dealer"
                                                id="postmortem_report_dealer"
                                                value="{{ $data[0]->postmortem_report_dealer }}"
                                                class="form-control datepickr">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="postmortem_report_customer"
                                                id="postmortem_report_customer" class="form-control datepickr"
                                                value="{{ $data[0]->postmortem_report_customer }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <input type="text" name="postmortem_report_remarks"
                                                id="postmortem_report_remarks" class="form-control"
                                                value="{{ $data[0]->postmortem_report_remarks }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            Remarks if any <span class="text-danger"></span>
                                        </div>

                                        <div class="form-group col-md-9">
                                            <textarea name="doc_remarks" id="doc_remarks" class="form-control">{{ $data[0]->doc_remarks }}</textarea>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            {{-- ------------------------------------------------------------------------------------------ --}}
                            <hr>
                            <div class="tab">
                                <div class="ribbon Preplus"><button type="button"
                                        class="btn btn-primary preApprovalshow">Pre - Approval Stage&nbsp;&nbsp;<i
                                            class="fa fa-plus" aria-hidden="true"></i></button></Span></div>
                                <div class="ribbon Preminus"><button type="button"
                                        class="btn btn-primary preApprovalhide">Pre - Approval Stage&nbsp;&nbsp;<i
                                            class="fa fa-minus" aria-hidden="true"></i></button></Span></div>
                                <div class="row preApproval">
                                    <div class="form-group col-md-12" id="add" style="border: 1px solid #ddd">
                                        <br />
                                        <div class="ribbon">Pre - Approval Stage</div>

                                        <hr>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label><span class="text-danger"></span>Dealer</label>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Call Centre Data</label>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Remarks</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Initial Estimate <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="initial_estimate_dealer"
                                                    value="{{ $data[0]->initial_estimate_dealer }}"
                                                    id="initial_estimate_dealer" class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="initial_estimate_dealer_callcenter"
                                                    value="{{ $data[0]->initial_estimate_dealer_callcenter }}"
                                                    id="initial_estimate_dealer_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="initial_estimate_dealer_remarks"
                                                    value="{{ $data[0]->initial_estimate_dealer_remarks }}"
                                                    id="initial_estimate_dealer_remarks" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Initial Estimate Value <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="initial_estimate_val_dealer"
                                                    value="{{ $data[0]->initial_estimate_val_dealer }}"
                                                    id="initial_estimate_val_dealer" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="initial_estimate_val_dealer_callcenter"
                                                    value="{{ $data[0]->initial_estimate_val_dealer_callcenter }}"
                                                    id="initial_estimate_val_dealer_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="initial_estimate_val_dealer_remarks"
                                                    value="{{ $data[0]->initial_estimate_val_dealer_remarks }}"
                                                    id="initial_estimate_val_dealer_remarks" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Major / Minor <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="major_minor_dealer"
                                                    id="major_minor_dealer" class="form-control"
                                                    value="{{ $data[0]->major_minor_dealer }}">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="major_minor_dealer_callcenter"
                                                    id="major_minor_dealer_callcenter" class="form-control"
                                                    value="{{ $data[0]->major_minor_dealer_callcenter }}">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="major_minor_dealer_remarks"
                                                    value="{{ $data[0]->major_minor_dealer_remarks }}"
                                                    id="major_minor_dealer_remarks" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Intimation to insurance company for surveyor deputation <span
                                                    class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="intimation_insurance_dealer"
                                                    value="{{ $data[0]->intimation_insurance_dealer }}"
                                                    id="intimation_insurance_dealer" class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="intimation_insurance_dealer_callcenter"
                                                    value="{{ $data[0]->intimation_insurance_dealer_callcenter }}"
                                                    id="intimation_insurance_dealer_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="intimation_insurance_dealer_remarks"
                                                    value="{{ $data[0]->intimation_insurance_dealer_remarks }}"
                                                    id="intimation_insurance_dealer_remarks" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Mail copy which send to Insurance company for surveyor deputation <span
                                                    class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="mail_copy_dealer"
                                                    value="{{ $data[0]->mail_copy_dealer }}" id="mail_copy_dealer"
                                                    class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="mail_copy_dealer_callcenter"
                                                    value="{{ $data[0]->mail_copy_dealer_callcenter }}"
                                                    id="mail_copy_dealer_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="mail_copy_dealer_remarks"
                                                    value="{{ $data[0]->mail_copy_dealer_remarks }}"
                                                    id="mail_copy_dealer_remarks" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Surveyor Name <span class="text-danger">*</span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="surveyor_name_dealer"
                                                    value="{{ $data[0]->surveyor_name_dealer }}"
                                                    id="surveyor_name_dealer" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="surveyor_name_dealer_callcenter"
                                                    value="{{ $data[0]->surveyor_name_dealer_callcenter }}"
                                                    id="surveyor_name_dealer_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="surveyor_name_dealer_remarks"
                                                    value="{{ $data[0]->surveyor_name_dealer_remarks }}"
                                                    id="surveyor_name_dealer_remarks" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Surveyor Mobile No. <span class="text-danger">*</span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="surveyor_mob_dealer"
                                                    value="{{ $data[0]->surveyor_mob_dealer }}"
                                                    id="surveyor_mob_dealer" class="form-control"
                                                    value="{{ $data[0]->Surveyor_Mobile_No }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="surveyor_mob_dealer_callcenter"
                                                    value="{{ $data[0]->surveyor_mob_dealer_callcenter }}"
                                                    id="surveyor_mob_dealer_callcenter" class="form-control"
                                                    value="{{ $data[0]->Surveyor_Mobile_No }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="surveyor_mob_dealer_remarks"
                                                    value="{{ $data[0]->surveyor_mob_dealer_remarks }}"
                                                    id="surveyor_mob_dealer_remarks" class="form-control"
                                                    value="{{ $data[0]->surveyor_mob_dealer_remarks }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Surveyor E-mail ID <span class="text-danger">*</span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="email" name="surveyor_email_dealer"
                                                    value="{{ $data[0]->surveyor_email_dealer }}"
                                                    id="surveyor_email_dealer" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="email" name="surveyor_email_dealer_callcenter"
                                                    value="{{ $data[0]->surveyor_email_dealer_callcenter }}"
                                                    id="surveyor_email_dealer_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="surveyor_email_dealer_remarks"
                                                    value="{{ $data[0]->surveyor_email_dealer_remarks }}"
                                                    id="surveyor_email_dealer_remarks" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Surveyor initial inspection <span class="text-danger">*</span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="date" name="surveyor_initial_inspection_dealer"
                                                    value="{{ $data[0]->surveyor_initial_inspection_dealer }}"
                                                    id="surveyor_initial_inspection_dealer" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text"
                                                    name="surveyor_initial_inspection_dealer_callcenter"
                                                    value="{{ $data[0]->surveyor_initial_inspection_dealer_callcenter }}"
                                                    id="surveyor_initial_inspection_dealer_callcenter"
                                                    class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="surveyor_initial_inspection_dealer_remarks"
                                                    value="{{ $data[0]->surveyor_initial_inspection_dealer_remarks }}"
                                                    id="surveyor_initial_inspection_dealer_remarks"
                                                    class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Approval for Dismantling <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="approval_dismantling_dealer"
                                                    value="{{ $data[0]->approval_dismantling_dealer }}"
                                                    id="approval_dismantling_dealer" class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="approval_dismantling_dealer_callcenter"
                                                    value="{{ $data[0]->approval_dismantling_dealer_callcenter }}"
                                                    id="approval_dismantling_dealer_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="approval_dismantling_dealer_remarks"
                                                    value="{{ $data[0]->approval_dismantling_dealer_remarks }}"
                                                    id="approval_dismantling_dealer_remarks" class="form-control" />
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Dismantling completion<span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="dismantling_completion_dealer"
                                                    value="{{ $data[0]->dismantling_completion_dealer }}"
                                                    id="dismantling_completion_dealer" class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="dismantling_completion_dealer_callcenter"
                                                    value="{{ $data[0]->dismantling_completion_dealer_callcenter }}"
                                                    id="dismantling_completion_dealer_callcenter"
                                                    class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="dismantling_completion_dealer_remarks"
                                                    value="{{ $data[0]->dismantling_completion_dealer_remarks }}"
                                                    id="dismantling_completion_dealer_remarks" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Intimation to surveyor for Second inspection <span
                                                    class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="intimation_surveyor_dealer"
                                                    value="{{ $data[0]->intimation_surveyor_dealer }}"
                                                    id="intimation_surveyor_dealer" class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="intimation_surveyor_dealer_callcenter"
                                                    value="{{ $data[0]->intimation_surveyor_dealer_callcenter }}"
                                                    id="intimation_surveyor_dealer_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="intimation_surveyor_dealer_remarks"
                                                    value="{{ $data[0]->intimation_surveyor_dealer_remarks }}"
                                                    id="intimation_surveyor_dealer_remarks" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Surveyor second inspection <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="surveyor_second_dealer"
                                                    value="{{ $data[0]->surveyor_second_dealer }}"
                                                    id="surveyor_second_dealer" class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="surveyor_second_dealer_callcenter"
                                                    value="{{ $data[0]->surveyor_second_dealer_callcenter }}"
                                                    id="surveyor_second_dealer_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="surveyor_second_dealer_remarks"
                                                    value="{{ $data[0]->surveyor_second_dealer_remarks }}"
                                                    id="surveyor_second_dealer_remarks" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Salvage value agreed(Rs) <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <select name="sva_dealer" id="sva_dealer" class="form-control">
                                                    <option @if ($data[0]->sva_dealer == 'yes') selected @endif
                                                        value="yes">Yes</option>
                                                    <option @if ($data[0]->sva_dealer == 'no') selected @endif
                                                        value="no">No</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="sva_dealer_callcenter"
                                                    id="sva_dealer_callcenter" class="form-control"
                                                    value="{{ $data[0]->sva_dealer_callcenter }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="sva_dealer_remarks"
                                                    id="sva_dealer_remarks" class="form-control"
                                                    value="{{ $data[0]->sva_dealer_remarks }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Surveyor written approval for start of work <span
                                                    class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="surveyor_written_approval_dealer"
                                                    value="{{ $data[0]->surveyor_written_approval_dealer }}"
                                                    id="surveyor_written_approval_dealer"
                                                    class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="surveyor_written_approval_dealer_callcenter"
                                                    value="{{ $data[0]->surveyor_written_approval_dealer_callcenter }}"
                                                    id="surveyor_written_approval_dealer_callcenter"
                                                    class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="surveyor_written_approval_dealer_remarks"
                                                    value="{{ $data[0]->surveyor_written_approval_dealer_remarks }}"
                                                    id="surveyor_written_approval_dealer_remarks"
                                                    class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Parts which not approved need to get approval from customer <span
                                                    class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="parts_approved_dealer"
                                                    value="{{ $data[0]->parts_approved_dealer }}"
                                                    id="parts_approved_dealer" class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="parts_approved_dealer_callcenter"
                                                    value="{{ $data[0]->parts_approved_dealer_callcenter }}"
                                                    id="parts_approved_dealer_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="parts_approved_dealer_remarks"
                                                    value="{{ $data[0]->parts_approved_dealer_remarks }}"
                                                    id="parts_approved_dealer_remarks" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Customer written approval for start of work <span
                                                    class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="customer_approval_dealer"
                                                    value="{{ $data[0]->customer_approval_dealer }}"
                                                    id="customer_approval_dealer" class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="customer_approval_dealer_callcenter"
                                                    value="{{ $data[0]->customer_approval_dealer_callcenter }}"
                                                    id="customer_approval_dealer_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="customer_approval_dealer_remarks"
                                                    value="{{ $data[0]->customer_approval_dealer_remarks }}"
                                                    id="customer_approval_dealer_remarks" class="form-control" />
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Intimation to insurance company for advance payment<span
                                                    class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="intimation_insurance_dealer_adv"
                                                    value="{{ $data[0]->intimation_insurance_dealer_adv }}"
                                                    id="intimation_insurance_dealer_adv"
                                                    class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="intimation_insurance_dealer_adv_callcenter"
                                                    value="{{ $data[0]->intimation_insurance_dealer_adv_callcenter }}"
                                                    id="intimation_insurance_dealer_adv_callcenter"
                                                    class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="intimation_insurance_dealer_adv_remarks"
                                                    value="{{ $data[0]->intimation_insurance_dealer_adv_remarks }}"
                                                    id="intimation_insurance_dealer_adv_remarks" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Mail copy which send to Insurance company for advance payment<span
                                                    class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="mail_copy_ad_pymnt_dealer"
                                                    value="{{ $data[0]->mail_copy_ad_pymnt_dealer }}"
                                                    id="mail_copy_ad_pymnt_dealer" class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="mail_copy_ad_pymnt_dealer_callcenter"
                                                    value="{{ $data[0]->mail_copy_ad_pymnt_dealer_callcenter }}"
                                                    id="mail_copy_ad_pymnt_dealer_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="mail_copy_ad_pymnt_dealer_remarks"
                                                    value="{{ $data[0]->mail_copy_ad_pymnt_dealer_remarks }}"
                                                    id="mail_copy_ad_pymnt_dealer_remarks" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Advance payment from customer<span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="apc_time_dealer" id="apc_time_dealer"
                                                    class="form-control datepickr"
                                                    value="{{ $data[0]->apc_time_dealer }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="apc_time_dealer_callcenter"
                                                    id="apc_time_dealer_callcenter" class="form-control"
                                                    value="{{ $data[0]->apc_time_dealer_callcenter }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="apc_time_dealer_remarks"
                                                    id="apc_time_dealer_remarks" class="form-control"
                                                    value="{{ $data[0]->apc_time_dealer_remarks }}" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Advance payment from customer (Rs)<span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="apc_rs_dealer" id="apc_rs_dealer"
                                                    class="form-control" value="{{ $data[0]->apc_rs_dealer }}"
                                                    readonly />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="apc_rs_dealer_callcenter"
                                                    id="apc_rs_dealer_callcenter" class="form-control"
                                                    value="{{ $data[0]->apc_rs_dealer_callcenter }}" readonly />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="apc_rs_dealer_remarks"
                                                    id="apc_rs_dealer_remarks" class="form-control"
                                                    value="{{ $data[0]->apc_rs_dealer_remarks }}" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Need to be verified with Customer <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="need_to_b_vrfy_cust_als"
                                                    value="{{ $data[0]->need_to_b_vrfy_cust_als }}"
                                                    id="need_to_b_vrfy_cust_als" class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="need_to_b_vrfy_cust_als_callcenter"
                                                    value="{{ $data[0]->need_to_b_vrfy_cust_als_callcenter }}"
                                                    id="need_to_b_vrfy_cust_als_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="need_to_b_vrfy_cust_als_remarks"
                                                    value="{{ $data[0]->need_to_b_vrfy_cust_als_remarks }}"
                                                    id="need_to_b_vrfy_cust_als_remarks" class="form-control"
                                                    placeholder="enter remarks" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Advance payment from Insurance
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="api_time_dealer" id="api_time_dealer"
                                                    class="form-control datepickr"
                                                    value="{{ $data[0]->api_time_dealer }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="api_time_dealer_callcenter"
                                                    id="api_time_dealer_callcenter" class="form-control"
                                                    value="{{ $data[0]->api_time_dealer_callcenter }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="api_time_dealer_remarks"
                                                    id="api_time_dealer_remarks" class="form-control"
                                                    value="{{ $data[0]->api_time_dealer_remarks }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Advance payment from Insurance (Rs) <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="api_rs_dealer" id="api_rs_dealer"
                                                    class="form-control datepickr"
                                                    value="{{ $data[0]->api_rs_dealer }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="api_rs_dealer_callcenter"
                                                    id="api_rs_dealer_callcenter" class="form-control"
                                                    value="{{ $data[0]->api_rs_dealer_callcenter }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="api_rs_dealer_remarks"
                                                    id="api_rs_dealer_remarks" class="form-control"
                                                    value="{{ $data[0]->api_rs_dealer_remarks }}"
                                                    placeholder="enter remarks" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="inputEmail3" id="label">Intimation 2 IC for surveyor
                                                    deputation <span class="text-danger"></span></label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" onchange="intemationDate(this.value)"
                                                    name="Intimation_2_IC_for_surveyor_deputation"
                                                    id="Intimation_2_IC_for_surveyor_deputation" class="form-control"
                                                    value="{{ $data[0]->Intimation_2_IC_for_surveyor_deputation }}" />
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" onchange="intemationDate(this.value)"
                                                    name="Intimation_2_IC_for_surveyor_deputation_callcenter"
                                                    id="Intimation_2_IC_for_surveyor_deputation_callcenter"
                                                    class="form-control"
                                                    value="{{ $data[0]->Intimation_2_IC_for_surveyor_deputation_callcenter }}" />
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text"
                                                    name="Intimation_2_IC_for_surveyor_deputation_reason"
                                                    id="Intimation_2_IC_for_surveyor_deputation_reason"
                                                    class="form-control"
                                                    value="{{ $data[0]->Intimation_2_IC_for_surveyor_deputation_reason }}"
                                                    placeholder="enter reason for delay" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="inputEmail3">Surveyor Initial Inspection Date <span
                                                        class="text-danger"></span></label>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" name="Surveyor_initial_inspection_date"
                                                    id="Surveyor_initial_inspection_date" class="form-control"
                                                    value="{{ $data[0]->Surveyor_initial_inspection_date }}" />
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" name="Surveyor_initial_inspection_date_callcenter"
                                                    id="Surveyor_initial_inspection_date_callcenter"
                                                    class="form-control"
                                                    value="{{ $data[0]->Surveyor_initial_inspection_date_callcenter }}" />
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="Surveyor_initial_inspection_date_remarks"
                                                    id="Surveyor_initial_inspection_date_remarks" class="form-control"
                                                    value="{{ $data[0]->Surveyor_initial_inspection_date_remarks }}"
                                                    placeholder="enter remarks" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="inputEmail3">Salvage Value Agreed By Customer & Ins Co
                                                    <span class="text-danger"></span></label>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" name="Salvage_value_agreed_by_Customer_Ins_co"
                                                    id="Salvage_value_agreed_by_Customer_Ins_co" class="form-control"
                                                    value="{{ $data[0]->Salvage_value_agreed_by_Customer_Ins_co }}" />
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text"
                                                    name="Salvage_value_agreed_by_Customer_Ins_co_callcenter"
                                                    id="Salvage_value_agreed_by_Customer_Ins_co_callcenter"
                                                    class="form-control"
                                                    value="{{ $data[0]->Salvage_value_agreed_by_Customer_Ins_co_callcenter }}" />
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text"
                                                    name="Salvage_value_agreed_by_Customer_Ins_co_remarks"
                                                    id="Salvage_value_agreed_by_Customer_Ins_co_remarks"
                                                    class="form-control"
                                                    value="{{ $data[0]->Salvage_value_agreed_by_Customer_Ins_co_remarks }}"
                                                    placeholder="enter remarks" />
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label id="work">Written work order approval 2 start work <span
                                                        class="text-danger"></span></label>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" onchange="writtenWork(this.value)"
                                                    name="Written_work_order_approval_2_start_work"
                                                    id="Written_work_order_approval_2_start_work" class="form-control"
                                                    value="{{ $data[0]->Written_work_order_approval_2_start_work }}" />
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" onchange="writtenWork(this.value)"
                                                    name="Written_work_order_approval_2_start_work_callcenter"
                                                    id="Written_work_order_approval_2_start_work_callcenter"
                                                    class="form-control"
                                                    value="{{ $data[0]->Written_work_order_approval_2_start_work_callcenter }}" />
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text"
                                                    name="Written_work_order_approval_2_start_work_reason"
                                                    id="Written_work_order_approval_2_start_work_reason"
                                                    class="form-control"
                                                    value="{{ $data[0]->Written_work_order_approval_2_start_work_reason }}"
                                                    placeholder="enter remarks" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label id="work">Intimation 2 customer for advance payment <span
                                                        class="text-danger"></span></label>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" name="Intimation_2_customer_for_advance_paymen"
                                                    id="Intimation_2_customer_for_advance_paymen" class="form-control"
                                                    value="{{ $data[0]->Intimation_2_customer_for_advance_paymen }}" />
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text"
                                                    name="Intimation_2_customer_for_advance_paymen_callcenter"
                                                    id="Intimation_2_customer_for_advance_paymen_callcenter"
                                                    class="form-control"
                                                    value="{{ $data[0]->Intimation_2_customer_for_advance_paymen_callcenter }}" />
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text"
                                                    name="Intimation_2_customer_for_advance_paymen_remarks"
                                                    id="Intimation_2_customer_for_advance_paymen_remarks"
                                                    class="form-control"
                                                    value="{{ $data[0]->Intimation_2_customer_for_advance_paymen_remarks }}"
                                                    placeholder="enter remarks" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label id="advance">Advance payment received on(Customer) <span
                                                        class="text-danger"></span></label>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" onchange="advancePayment(this.value)"
                                                    name="Advance_payment_received_onCustomer"
                                                    id="Advance_payment_received_onCustomer" class="form-control"
                                                    value="{{ $data[0]->Advance_payment_received_onCustomer }}" />
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" onchange="advancePayment(this.value)"
                                                    name="Advance_payment_received_onCustomer_callcenter"
                                                    id="Advance_payment_received_onCustomer_callcenter"
                                                    class="form-control"
                                                    value="{{ $data[0]->Advance_payment_received_onCustomer_callcenter }}" />
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="Advance_payment_received_onCustomer_reason"
                                                    id="Advance_payment_received_onCustomer_reason" class="form-control"
                                                    value="{{ $data[0]->Advance_payment_received_onCustomer_reason }}"
                                                    placeholder="enter remarks" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Advance payment Value Rs.(Customer) <span
                                                        class="text-danger"></span></label>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" name="Advance_payment_Value_RsCustomer"
                                                    id="Advance_payment_Value_RsCustomer" class="form-control"
                                                    value="{{ $data[0]->Advance_payment_Value_RsCustomer }}" />
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" name="Advance_payment_Value_RsCustomer_callcenter"
                                                    id="Advance_payment_Value_RsCustomer_callcenter"
                                                    class="form-control"
                                                    value="{{ $data[0]->Advance_payment_Value_RsCustomer_callcenter }}" />
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="Advance_payment_Value_RsCustomer_remarks"
                                                    id="Advance_payment_Value_RsCustomer_remarks" class="form-control"
                                                    value="{{ $data[0]->Advance_payment_Value_RsCustomer_remarks }}"
                                                    placeholder="enter remarks" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label id="customerApproval">Customer written approval 2 start of work
                                                    <span class="text-danger"></span></label>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" onchange="customerApproval(this.value)"
                                                    name="Customer_written_approval_2_start_of_wor"
                                                    id="Customer_written_approval_2_start_of_wor" class="form-control"
                                                    value="{{ $data[0]->Customer_written_approval_2_start_of_wor }}" />
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" onchange="customerApproval(this.value)"
                                                    name="Customer_written_approval_2_start_of_wor_callcenter"
                                                    id="Customer_written_approval_2_start_of_wor_callcenter"
                                                    class="form-control"
                                                    value="{{ $data[0]->Customer_written_approval_2_start_of_wor_callcenter }}" />
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text"
                                                    name="Customer_written_approval_2_start_of_wor_reason"
                                                    id="Customer_written_approval_2_start_of_wor_reason"
                                                    class="form-control"
                                                    value="{{ $data[0]->Customer_written_approval_2_start_of_wor_reason }}"
                                                    placeholder="enter reason for delay" />
                                            </div>
                                        </div>


                                        <div class="row">

                                            <div class="form-group col-md-6">
                                                <label>Pre - Approval Stage - Delay Reason <span
                                                        class="text-danger"></span></label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="pre_delay_reaosn" id="pre_delay_reaosn"
                                                    class="form-control">
                                                    <option value="">Select Delay Reason</option>
                                                    @foreach (preApprovalStageReason() as $list)
                                                        <option @if ($list->id == $data[0]->pre_delay_reaosn) selected @endif
                                                            value="{{ $list->id }}">{{ $list->delay_reason }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Pre Overall Delay By <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="pre_overall_delay" id="pre_overall_delay"
                                                    class="form-control">
                                                    <option value="">Select Overall Delay Reason</option>
                                                    <option @if ($data[0]->pre_overall_delay == 'Dealer') selected @endif
                                                        value="Dealer">Dealer</option>
                                                    <option @if ($data[0]->pre_overall_delay == 'Customer') selected @endif
                                                        value="Customer">Customer</option>
                                                    <option @if ($data[0]->pre_overall_delay == 'Surveyor/Insurance company') selected @endif
                                                        value="Surveyor/Insurance company">Surveyor/Insurance company
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Delay reason if any
                                            </div>
                                            <div class="form-group col-md-6">
                                                <textarea name="pre_delay_reason" id="pre_delay_reason" class="form-control">{{ $data[0]->pre_delay_reason }}</textarea>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                {{-- ****************************************************************************************** --}}

                                <div class="ribbon repairPlus"><button type="button"
                                        class="btn btn-primary repairStageshow">Repair Stage&nbsp;&nbsp;<i
                                            class="fa fa-plus" aria-hidden="true"></i></button></Span></div>
                                <div class="ribbon repairMinus"><button type="button"
                                        class="btn btn-primary repairStagehide">Repair Stage&nbsp;&nbsp;<i
                                            class="fa fa-minus" aria-hidden="true"></i></button></Span></div>
                                <div class="row repairStage">
                                    <div class="form-group col-md-12" style="border: 1px solid #ddd">
                                        <br />
                                        <div class="ribbon">Repair Stage</div>
                                        <hr>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label><span class="text-danger"></span>Dealer<span
                                                        class="text-danger"></span></label>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label><span class="text-danger"></span>Call Center Data<span
                                                        class="text-danger"></span></label>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Remarks</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Repair Work Start <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="repair_work_start_dealer"
                                                    id="repair_work_start_dealer" class="form-control datepickr"
                                                    value="{{ $data[0]->repair_work_start_dealer }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="repair_work_start_dealer_callcenter"
                                                    id="repair_work_start_dealer_callcenter" class="form-control"
                                                    value="{{ $data[0]->repair_work_start_dealer_callcenter }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="repair_work_start_dealer_remarks"
                                                    id="repair_work_start_dealer_remarks" class="form-control"
                                                    value="{{ $data[0]->repair_work_start_dealer_remarks }}" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Detail Damaged Parts List Preparation <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="detail_damaged_dealer"
                                                    value="{{ $data[0]->detail_damaged_dealer }}"
                                                    id="detail_damaged_dealer" data-date=""
                                                    class="form-control datepickr" data-date-format="DD MMMM YYYY" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="detail_damaged_dealer_callcenter"
                                                    value="{{ $data[0]->detail_damaged_dealer_callcenter }}"
                                                    id="detail_damaged_dealer_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="detail_damaged_dealer_remarks"
                                                    value="{{ $data[0]->detail_damaged_dealer_remarks }}"
                                                    id="detail_damaged_dealer_remarks" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="ribbon"> From Whom Delay ("100% All the data should be collected
                                            by Call Centre")</div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                AOR need to place <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="AOR_need_place" id="AOR_need_place"
                                                    class="form-control repdeanasis"
                                                    value="{{ $data[0]->AOR_need_place }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="AOR_need_place_callcenter"
                                                    value="{{ $data[0]->AOR_need_place_callcenter }}"
                                                    id="AOR_need_place_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="AOR_need_place_remarks"
                                                    value="{{ $data[0]->AOR_need_place_remarks }}"
                                                    id="AOR_need_place_remarks" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                In Transit <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="In_Transit_" id="In_Transit_"
                                                    class="form-control repdeanasis"
                                                    value="{{ $data[0]->In_Transit_ }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="In_Transit_callcenter"
                                                    value="{{ $data[0]->In_Transit_callcenter }}"
                                                    id="In_Transit_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="In_Transit_remarks"
                                                    value="{{ $data[0]->In_Transit_remarks }}" id="In_Transit_remarks"
                                                    class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Local purchase <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="Local_purchase_" id="Local_purchase_"
                                                    class="form-control repdeanasis"
                                                    value="{{ $data[0]->Local_purchase_ }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="Local_purchase_callcenter"
                                                    value="{{ $data[0]->Local_purchase_callcenter }}"
                                                    id="Local_purchase_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="Local_purchase_remarks"
                                                    value="{{ $data[0]->Local_purchase_remarks }}"
                                                    id="Local_purchase_remarks" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Arrange form other branch <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="Arrange_form_other_branch_"
                                                    id="Arrange_form_other_branch_" class="form-control repdeanasis"
                                                    value="{{ $data[0]->Arrange_form_other_branch_ }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="Arrange_form_other_callcenter"
                                                    value="{{ $data[0]->Arrange_form_other_callcenter }}"
                                                    id="Arrange_form_other_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="Arrange_form_other_remarks"
                                                    value="{{ $data[0]->Arrange_form_other_remarks }}"
                                                    id="Arrange_form_other_remarks" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                TOC order <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="TOC_order_" id="TOC_order_"
                                                    class="form-control repdeanasis"
                                                    value="{{ $data[0]->TOC_order_ }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="TOC_order_callcenter"
                                                    value="{{ $data[0]->TOC_order_callcenter }}"
                                                    id="TOC_order_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="TOC_order_remarks"
                                                    value="{{ $data[0]->TOC_order_remarks }}" id="TOC_order_remarks"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Sheet Metal / Denting Repair Work <span class="text-danger">*</span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                Start Date <span class="text-danger"></span>
                                                <input type="text" name="sheet_denting_repair"
                                                    value="{{ $data[0]->sheet_denting_repair }}"
                                                    id="sheet_denting_repair" class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2"><br>
                                                <span class="text-danger"></span>
                                                <input type="text" name="sheet_denting_repair_callcenter"
                                                    value="{{ $data[0]->sheet_denting_repair_callcenter }}"
                                                    id="sheet_denting_repair_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                End Date <span class="text-danger"></span>
                                                <input type="date" name="sheet_denting_repair_remarks"
                                                    value="{{ $data[0]->sheet_denting_repair_remarks }}"
                                                    id="sheet_denting_repair_remarks" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Vehicle Level Mechanical & Electrical Repair (other than cabin) <span
                                                    class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                Start Date <span class="text-danger"></span>
                                                <input type="text" name="mech_elec_repair"
                                                    value="{{ $data[0]->mech_elec_repair }}" id="mech_elec_repair"
                                                    class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <span class="text-danger"></span><br>
                                                <input type="text" name="mech_elec_repair_callcenter"
                                                    value="{{ $data[0]->mech_elec_repair_callcenter }}"
                                                    id="mech_elec_repair_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                End Date <span class="text-danger"></span>
                                                <input type="text" name="mech_elec_repair_remarks"
                                                    value="{{ $data[0]->mech_elec_repair_remarks }}"
                                                    id="mech_elec_repair_remarks" class="form-control datepickr" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Painting Start <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                Start Date <span class="text-danger"></span>
                                                <input type="text" name="painting_start"
                                                    value="{{ $data[0]->painting_start }}" id="painting_start"
                                                    class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <span class="text-danger"></span><br>
                                                <input type="text" name="painting_start_callcenter"
                                                    value="{{ $data[0]->painting_start_callcenter }}"
                                                    id="painting_start_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                End Date <span class="text-danger"></span>
                                                <input type="date" name="painting_start_remarks"
                                                    value="{{ $data[0]->painting_start_remarks }}"
                                                    id="painting_start_remarks" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Cabin Trims Parts Fitment Completed <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                Start Date <span class="text-danger"></span>
                                                <input type="text" name="cabin_trims_parts"
                                                    value="{{ $data[0]->cabin_trims_parts }}" id="cabin_trims_parts"
                                                    class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <span class="text-danger"></span><br>
                                                <input type="text" name="cabin_trims_parts_callcenter"
                                                    value="{{ $data[0]->cabin_trims_parts_callcenter }}"
                                                    id="cabin_trims_parts_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                End Date <span class="text-danger"></span>
                                                <input type="text" name="cabin_trims_parts_remarks"
                                                    value="{{ $data[0]->cabin_trims_parts_remarks }}"
                                                    id="cabin_trims_parts_remarks" class="form-control datepickr" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12" style="background: #ccc;">
                                                <b>Outsource</b>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Outside Job <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                Start Date <span class="text-danger"></span>
                                                <input type="text" name="outside_job"
                                                    value="{{ $data[0]->outside_job }}" id="outside_job"
                                                    class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <span class="text-danger"></span><br>
                                                <input type="text" name="outside_job_callcenter"
                                                    value="{{ $data[0]->outside_job_callcenter }}"
                                                    id="outside_job_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                End Date<span class="text-danger"></span>
                                                <input type="text" name="outside_job_remarks"
                                                    value="{{ $data[0]->outside_job_remarks }}"
                                                    id="outside_job_remarks" class="form-control datepickr" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12" style="background: #ccc;">
                                                <b>Parts Order Details</b>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                AOR Raised on <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="AOR_raised"
                                                    value="{{ $data[0]->AOR_raised }}" id="AOR_raised"
                                                    class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="AOR_raised_callcenter"
                                                    value="{{ $data[0]->AOR_raised_callcenter }}"
                                                    id="AOR_raised_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="AOR_raised_remarks"
                                                    value="{{ $data[0]->AOR_raised_remarks }}" id="AOR_raised_remarks"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                So No. <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="so_no" value="{{ $data[0]->so_no }}"
                                                    id="so_no" class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="so_no_callcenter"
                                                    value="{{ $data[0]->so_no_callcenter }}" id="so_no_callcenter"
                                                    class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="so_no_remarks"
                                                    value="{{ $data[0]->so_no_remarks }}" id="so_no_remarks"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Arrange the Material from local/ other branch <span
                                                    class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="arrange_mat"
                                                    value="{{ $data[0]->arrange_mat }}" id="arrange_mat"
                                                    class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="arrange_mat_callcenter"
                                                    value="{{ $data[0]->arrange_mat_callcenter }}"
                                                    id="arrange_mat_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="arrange_mat_remarks"
                                                    value="{{ $data[0]->arrange_mat_remarks }}"
                                                    id="arrange_mat_remarks" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Receipt of all parts from AOR,TOC, Other branch Etc..,
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="receipt_all_parts"
                                                    value="{{ $data[0]->receipt_all_parts }}" id="receipt_all_parts"
                                                    class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="receipt_all_parts_callcenter"
                                                    value="{{ $data[0]->receipt_all_parts_callcenter }}"
                                                    id="receipt_all_parts_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="receipt_all_parts_remarks"
                                                    value="{{ $data[0]->receipt_all_parts_remarks }}"
                                                    id="receipt_all_parts_remarks" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12" style="background: #ccc;">
                                                <b>Any Supplementary Required</b>

                                            </div>
                                        </div>
                                        <select name="supplementary_required" id="supplementary_required"
                                            class="form-control"><br><br>
                                            <option>--Select--</option><br><br>
                                            <option @if ($data[0]->supplementary_required == 'yes') selected @endif value="yes">Yes
                                            </option>
                                            <option @if ($data[0]->supplementary_required == 'no') selected @endif value="no">No
                                            </option>
                                        </select>
                                        <br>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Intimation to surveyor for Supp. inspection <span
                                                    class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="intimation_surveyor"
                                                    value="{{ $data[0]->intimation_surveyor }}"
                                                    id="intimation_surveyor" class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="intimation_surveyor_callcenter"
                                                    value="{{ $data[0]->intimation_surveyor_callcenter }}"
                                                    id="intimation_surveyor_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="intimation_surveyor_remarks"
                                                    value="{{ $data[0]->intimation_surveyor_remarks }}"
                                                    id="intimation_surveyor_remarks" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Supplementary Estimate <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="supplementary_estimate"
                                                    id="supplementary_estimate" class="form-control datepickr"
                                                    value="{{ $data[0]->supplementary_estimate }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="supplementary_estimate_callcenter"
                                                    id="supplementary_estimate_callcenter" class="form-control"
                                                    value="{{ $data[0]->supplementary_estimate_callcenter }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="supplementary_estimate_remarks"
                                                    id="supplementary_estimate_remarks" class="form-control"
                                                    value="{{ $data[0]->supplementary_estimate_remarks }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Supplementary Estimate Value <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="supplementary_estimate_val"
                                                    id="supplementary_estimate_val" class="form-control"
                                                    value="{{ $data[0]->supplementary_estimate_val }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="supplementary_estimate_val_callcenter"
                                                    id="supplementary_estimate_val_callcenter" class="form-control"
                                                    value="{{ $data[0]->supplementary_estimate_val_callcenter }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="supplementary_estimate_val_remarks"
                                                    id="supplementary_estimate_val_remarks" class="form-control"
                                                    value="{{ $data[0]->supplementary_estimate_val_remarks }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Supplementary Inspection <span class="text-danger">*</span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="supplementary_inspection"
                                                    value="{{ $data[0]->supplementary_inspection }}"
                                                    id="supplementary_inspection" class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="supplementary_inspection_callcenter"
                                                    value="{{ $data[0]->supplementary_inspection_callcenter }}"
                                                    id="supplementary_inspection_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="supplementary_inspection_remarks"
                                                    value="{{ $data[0]->supplementary_inspection_remarks }}"
                                                    id="supplementary_inspection_remarks" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Supplementary Written Approval
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="supplementary_written_approval"
                                                    id="supplementary_written_approval" class="form-control datepickr"
                                                    value="{{ $data[0]->supplementary_written_approval }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="supplementary_written_approval_callcenter"
                                                    id="supplementary_written_approval_callcenter" class="form-control"
                                                    value="{{ $data[0]->supplementary_written_approval_callcenter }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="supplementary_written_approval_remarks"
                                                    id="supplementary_written_approval_remarks" class="form-control"
                                                    value="{{ $data[0]->supplementary_written_approval_remarks }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Inform to customer on supplementary approval
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="inform_to_customer_on_approval"
                                                    value="{{ $data[0]->inform_to_customer_on_approval }}"
                                                    id="inform_to_customer_on_approval" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="inform_to_customer_on_approval_callcenter"
                                                    value="{{ $data[0]->inform_to_customer_on_approval_callcenter }}"
                                                    id="inform_to_customer_on_approval_callcenter"
                                                    class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="inform_to_customer_on_approval_remarks"
                                                    value="{{ $data[0]->inform_to_customer_on_approval_remarks }}"
                                                    id="inform_to_customer_on_approval" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Parts which not approved need to get approval from customer <span
                                                    class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="parts_get_approval"
                                                    value="{{ $data[0]->parts_get_approval }}" id="parts_get_approval"
                                                    class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="parts_get_approval_callcenter"
                                                    value="{{ $data[0]->parts_get_approval_callcenter }}"
                                                    id="parts_get_approval_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="parts_get_approval_remarks"
                                                    value="{{ $data[0]->parts_get_approval_remarks }}"
                                                    id="parts_get_approval_remarks" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Repair Completion <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="repair_completion" id="repair_completion"
                                                    class="form-control datepickr"
                                                    value="{{ $data[0]->repair_completion }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="repair_completion_callcenter"
                                                    id="repair_completion_callcenter" class="form-control"
                                                    value="{{ $data[0]->repair_completion_callcenter }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="repair_completion_remarks"
                                                    id="repair_completion_remarks" class="form-control"
                                                    value="{{ $data[0]->repair_completion_remarks }}" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Repair Stage - Delay Reason <span
                                                        class="text-danger"></span></label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="repair_delay_reason" id="repair_delay_reason"
                                                    class="form-control">

                                                    <option value="">Select Delay Reason</option>
                                                    @foreach (repairApprovalStageReason() as $list)
                                                        <option @if ($list->repair_delay_reason == $data[0]->repair_delay_reason) selected @endif
                                                            value="{{ $list->repair_delay_reason }}">
                                                            {{ $list->repair_delay_reason }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Repair Overall Delay By <span class="text-danger"></span></label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="repair_overall_delay" id="repair_overall_delay"
                                                    class="form-control">
                                                    <option value="">Select Overall Delay Reason</option>
                                                    <option @if ($data[0]->pre_overall_delay == 'Dealer') selected @endif
                                                        value="Dealer">Dealer</option>
                                                    <option @if ($data[0]->pre_overall_delay == 'Customer') selected @endif
                                                        value="Customer">Customer</option>
                                                    <option @if ($data[0]->pre_overall_delay == 'Surveyor/Insurance company') selected @endif
                                                        value="Surveyor/Insurance company">Surveyor/Insurance company
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Delay reason if any
                                            </div>
                                            <div class="form-group col-md-6">
                                                <textarea name="repair_delay_reason_if_any" id="repair_delay_reason_if_any" class="form-control"
                                                    value="{{ $data[0]->repair_delay_reason }}"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- ------------------------------------------------------------------------------------------ --}}

                                <div class="ribbon postplus"><button type="button"
                                        class="btn btn-primary postApprovalStageshow">Post - Approval
                                        Stage&nbsp;&nbsp;<i class="fa fa-plus"></i></button></div>
                                <div class="ribbon postminus"><button type="button"
                                        class="btn btn-primary postApprovalStagehide">Post - Approval
                                        Stage&nbsp;&nbsp;<i class="fa fa-minus"></i></button></div>
                                <div class="row postApprovalStage">
                                    <div class="form-group col-md-12" style="border: 1px solid #ddd">
                                        <br />
                                        <div class="ribbon">Post Approval Stage</div>
                                        <hr>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label><span class="text-danger"></span>Dealer<span
                                                        class="text-danger"></span></label>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label><span class="text-danger"></span>Call Center Data <span
                                                        class="text-danger"></span></label>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Remarks</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Intimation to Insurance company final inspection <span
                                                    class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="iicfi" id="iicfi"
                                                    class="form-control datepickr" value="{{ $data[0]->iicfi }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="iicfi_callcenter" id="iicfi_callcenter"
                                                    class="form-control datepickr"
                                                    value="{{ $data[0]->iicfi_callcenter }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="iicfi_remarks" id="iicfi_remarks"
                                                    class="form-control" value="{{ $data[0]->iicfi_remarks }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Mail copy which send to Surveyor for final inspecting
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="mail_copy_final_insption"
                                                    value="{{ $data[0]->mail_copy_final_insption }}"
                                                    id="mail_copy_final_insption" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="mail_copy_final_insption_callcenter"
                                                    value="{{ $data[0]->mail_copy_final_insption_callcenter }}"
                                                    id="mail_copy_final_insption_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="mail_copy_final_insption"
                                                    value="{{ $data[0]->mail_copy_final_insption }}"
                                                    id="mail_copy_final_insption" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Conduct the Road test <span class="text-danger">*</span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="conduct_road_test"
                                                    value="{{ $data[0]->conduct_road_test }}" id="conduct_road_test"
                                                    class="form-control datepickr" data-date-format="DD-MMM-YYYY" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="conduct_road_test_callcenter"
                                                    value="{{ $data[0]->conduct_road_test_callcenter }}"
                                                    id="conduct_road_test_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="conduct_road_test_remarks"
                                                    value="{{ $data[0]->conduct_road_test_remarks }}"
                                                    id="conduct_road_test_remarks" class="form-control" />
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Final Inspection from surveyor <span class="text-danger">*</span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="final_insption_surveyor"
                                                    id="final_insption_surveyor" class="form-control datepickr"
                                                    value="{{ $data[0]->final_insption_surveyor }}"
                                                    data-date-format="DD-MMM-YYYY" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="final_insption_surveyor_callcenter"
                                                    id="final_insption_surveyor_callcenter" class="form-control"
                                                    value="{{ $data[0]->final_insption_surveyor_callcenter }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="final_insption_surveyor_remarks"
                                                    id="final_insption_surveyor_remarks" class="form-control"
                                                    value="{{ $data[0]->final_insption_surveyor_remarks }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Proforma Submission to surveyor post inspection <span
                                                    class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="proforma_submission"
                                                    id="proforma_submission" class="form-control datepickr"
                                                    value="{{ $data[0]->proforma_submission }}"
                                                    data-date-format="DD-MMM-YYYY" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="proforma_submission_callcenter"
                                                    id="proforma_submission_callcenter" class="form-control"
                                                    value="{{ $data[0]->proforma_submission_callcenter }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="proforma_submission_remarks"
                                                    id="proforma_submission_remarks" class="form-control"
                                                    value="{{ $data[0]->proforma_submission_remarks }}" />
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Receipt of Delivery Order/ Liability report <span
                                                    class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="receipt_delivery_order"
                                                    id="receipt_delivery_order" class="form-control datepickr"
                                                    value="{{ $data[0]->receipt_delivery_order }}"
                                                    data-date-format="DD-MMM-YYYY" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="receipt_delivery_order_callcenter"
                                                    id="receipt_delivery_order_callcenter" class="form-control"
                                                    value="{{ $data[0]->receipt_delivery_order_callcenter }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="receipt_delivery_order_remarks"
                                                    id="receipt_delivery_order_remarks" class="form-control"
                                                    value="{{ $data[0]->receipt_delivery_order_remarks }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Job Card Closed <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="job_card_closed" id="job_card_closed"
                                                    class="form-control datepickr"
                                                    value="{{ $data[0]->job_card_closed }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="job_card_closed_callcenter"
                                                    id="job_card_closed_callcenter" class="form-control"
                                                    value="{{ $data[0]->job_card_closed_callcenter }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="job_card_closed_remarks"
                                                    id="job_card_closed_remarks" class="form-control"
                                                    value="{{ $data[0]->job_card_closed_remarks }}" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Balance payment from Customer <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="bal_payment_customer"
                                                    id="bal_payment_customer" class="form-control datepickr"
                                                    value="{{ $data[0]->bal_payment_customer }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="bal_payment_customer_callcenter"
                                                    id="bal_payment_customer_callcenter" class="form-control"
                                                    value="{{ $data[0]->bal_payment_customer_callcenter }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="bal_payment_customer_remarks"
                                                    id="bal_payment_customer_remarks" class="form-control"
                                                    value="{{ $data[0]->bal_payment_customer_remarks }}" />
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Balance payment from Customer Value Rs. <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="bal_payment_customer_rs"
                                                    id="bal_payment_customer_rs" class="form-control datepicker"
                                                    value="{{ $data[0]->bal_payment_customer_rs }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="bal_payment_customer_rs_callcenter"
                                                    id="bal_payment_customer_rs_callcenter" class="form-control"
                                                    value="{{ $data[0]->bal_payment_customer_rs_callcenter }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="bal_payment_customer_rs_remarks"
                                                    id="bal_payment_customer_rs_remarks" class="form-control"
                                                    value="{{ $data[0]->bal_payment_customer_rs_remarks }}" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Vehicle delivery to customer <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="veh_delivery_customer"
                                                    value="{{ $data[0]->veh_delivery_customer }}"
                                                    id="veh_delivery_customer" class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="veh_delivery_customer_callcenter"
                                                    value="{{ $data[0]->veh_delivery_customer_callcenter }}"
                                                    id="veh_delivery_customer_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="veh_delivery_customer_remarks"
                                                    value="{{ $data[0]->veh_delivery_customer_remarks }}"
                                                    id="veh_delivery_customer_remarks" class="form-control" />
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Balance payment from Insurance <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="bal_pymnt_ins"
                                                    value="{{ $data[0]->bal_pymnt_ins }}" id="bal_pymnt_ins"
                                                    class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="bal_pymnt_ins_callcenter"
                                                    value="{{ $data[0]->bal_pymnt_ins_callcenter }}"
                                                    id="bal_pymnt_ins_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="bal_pymnt_ins_remarks"
                                                    value="{{ $data[0]->bal_pymnt_ins_remarks }}"
                                                    id="bal_pymnt_ins_remarks" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Balance payment from Insurance Value Rs. <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="bal_pymnt_ins_rs"
                                                    value="{{ $data[0]->bal_pymnt_ins_rs }}" id="bal_pymnt_ins_rs"
                                                    class="form-control datepickr" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="bal_pymnt_ins_rs_callcenter"
                                                    value="{{ $data[0]->bal_pymnt_ins_rs_callcenter }}"
                                                    id="bal_pymnt_ins_rs_callcenter" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="bal_pymnt_ins_rs_remarks"
                                                    value="{{ $data[0]->bal_pymnt_ins_rs_remarks }}"
                                                    id="bal_pymnt_ins_rs_remarks" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Gate Pass <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="gate_pass" id="gate_pass"
                                                    class="form-control datepickr"
                                                    value="{{ $data[0]->gate_pass }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="gate_pass_callcenter"
                                                    id="gate_pass_callcenter" class="form-control"
                                                    value="{{ $data[0]->gate_pass_callcenter }}" />
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="text" name="gate_pass_remarks" id="gate_pass_remarks"
                                                    class="form-control" value="{{ $data[0]->gate_pass_remarks }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Intimation to IC for final inspection <span
                                                        class="text-danger"></span></label>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" name="Intimation_to_IC_for_final_inspection"
                                                    id="Intimation_to_IC_for_final_inspection" class="form-control"
                                                    value="{{ $data[0]->Intimation_to_IC_for_final_inspection }}" />
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text"
                                                    name="Intimation_to_IC_for_final_inspection_callcenter"
                                                    id="Intimation_to_IC_for_final_inspection_callcenter"
                                                    class="form-control"
                                                    value="{{ $data[0]->Intimation_to_IC_for_final_inspection_callcenter }}" />
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text"
                                                    name="Intimation_to_IC_for_final_inspection_remarks"
                                                    id="Intimation_to_IC_for_final_inspection_remarks"
                                                    class="form-control"
                                                    value="{{ $data[0]->Intimation_to_IC_for_final_inspection_remarks }}"
                                                    placeholder="enter reason for delay" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label id="final">Final inspection date <span
                                                        class="text-danger"></span></label>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" onchange="finalinspection(this.value)"
                                                    name="Final_inspection_date" id="Final_inspection_date"
                                                    class="form-control"
                                                    value="{{ $data[0]->Final_inspection_date }}" />
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" onchange="finalinspection(this.value)"
                                                    name="Final_inspection_date_callcenter"
                                                    id="Final_inspection_date_callcenter" class="form-control"
                                                    value="{{ $data[0]->Final_inspection_date_callcenter }}" />
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="Final_inspection_date_reason"
                                                    id="Final_inspection_date_reason" class="form-control"
                                                    value="{{ $data[0]->Final_inspection_date_reason }}"
                                                    placeholder="enter reason for delay" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Post Approval Stage - Delay Reason <span
                                                        class="text-danger"></span></label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="post_delay_reason" id="post_delay_reason"
                                                    class="form-control">
                                                    <option value="">Select Delay Reason</option>
                                                    @foreach (postApprovalStageReason() as $list)
                                                        <option @if ($list->id == $data[0]->post_delay_reason) selected @endif
                                                            value="{{ $list->id }}">
                                                            {{ $list->post_delay_reason }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Post Overall Delay By <span class="text-danger"></span></label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="post_overall_delay" id="post_overall_delay"
                                                    class="form-control">
                                                    <option value="">Select Overall Delay Reason</option>
                                                    <option @if ($data[0]->pre_overall_delay == 'Dealer') selected @endif
                                                        value="Dealer">Dealer</option>
                                                    <option @if ($data[0]->pre_overall_delay == 'Customer') selected @endif
                                                        value="Customer">Customer</option>
                                                    <option @if ($data[0]->pre_overall_delay == 'Surveyor/Insurance company') selected @endif
                                                        value="Surveyor/Insurance company">Surveyor/Insurance company
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Delay reason if any <span class="text-danger"></span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <textarea name="post_delay_reason" id="post_delay_reason" class="form-control"
                                                    value="{{ $data[0]->post_delay_reason }}"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- ------------------------------------------------------------------------------------------ --}}

                                <div class="ribbon preDelayPlus"><button type="button"
                                        class="btn btn-primary preDelayAnalysisshow">Pre - Approval Stage - Delay
                                        Analysis&nbsp;&nbsp;<i class="fa fa-plus"></i></button></div>
                                <div class="ribbon preDelayMinus"><button type="button"
                                        class="btn btn-primary preDelayAnalysishide">Pre - Approval Stage - Delay
                                        Analysis&nbsp;&nbsp;<i class="fa fa-minus"></i></button></div>
                                <div class="row preDelayAnalysis">
                                    <div class="form-group col-md-12" style="border: 1px solid #ddd">
                                        <br />
                                        {{-- <h5><b> </b></h5> --}}
                                        <div class="ribbon">Pre - Approval Stage - Delay Analysis</div>
                                        <hr>
                                        <div class="row">
                                            <div class="form-group col-md-12" id="aqwwe">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Delay in prepare the initial estimate by dealer <span
                                                            class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text" name="delay_prepare_dealer"
                                                            value="{{ $data[0]->delay_prepare_dealer }}"
                                                            id="delay_prepare_dealer" class="form-control" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text" name="delay_prepare_dealer_remarks"
                                                            value="{{ $data[0]->delay_prepare_dealer_remarks }}"
                                                            id="delay_prepare_dealer_remarks" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Delay in Submission of the documents by customer <span
                                                            class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text" name="delay_submsn_docs"
                                                            value="{{ $data[0]->delay_submsn_docs }}"
                                                            id="delay_submsn_docs" class="form-control" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text" name="delay_submsn_docs_remarks"
                                                            value="{{ $data[0]->delay_submsn_docs_remarks }}"
                                                            id="delay_submsn_docs_remarks" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Intimation to insurance company for surveyor deputation by
                                                        dealer <span class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text" name="surveyor_deputation_dealer"
                                                            value="{{ $data[0]->surveyor_deputation_dealer }}"
                                                            id="surveyor_deputation_dealer" class="form-control" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text" name="surveyor_deputation_dealer_remarks"
                                                            value="{{ $data[0]->surveyor_deputation_dealer_remarks }}"
                                                            id="surveyor_deputation_dealer_remarks"
                                                            class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Delay in Surveyor deputation from Insurance company <span
                                                            class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text" name="delay_surveyor_deputation"
                                                            value="{{ $data[0]->delay_surveyor_deputation }}"
                                                            id="delay_surveyor_deputation" class="form-control" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text" name="delay_surveyor_deputation_remarks"
                                                            value="{{ $data[0]->delay_surveyor_deputation_remarks }}"
                                                            id="delay_surveyor_deputation_remarks"
                                                            class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Approval for dismantling from surveyor <span
                                                            class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text" name="approval_dismantling_surveyor"
                                                            value="{{ $data[0]->approval_dismantling_surveyor }}"
                                                            id="approval_dismantling_surveyor" class="form-control" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            name="approval_dismantling_surveyor_remarks"
                                                            value="{{ $data[0]->approval_dismantling_surveyor_remarks }}"
                                                            id="approval_dismantling_surveyor_remarks"
                                                            class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Delay in dismantling completion by dealer <span
                                                            class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_dismantling_completion }}"
                                                            name="delay_dismantling_completion"
                                                            id="delay_dismantling_completion" class="form-control" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_dismantling_completion_remarks }}"
                                                            name="delay_dismantling_completion_remarks"
                                                            id="delay_dismantling_completion_remarks"
                                                            class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Intimation to surveyor for Second inspection by dealer <span
                                                            class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->intimation_to_surveyor_for_second_inspection }}"
                                                            name="intimation_to_surveyor_for_second_inspection"
                                                            id="intimation_to_surveyor_for_second_inspection"
                                                            class="form-control" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->intimation_to_surveyor_for_second_inspection_remarks }}"
                                                            name="intimation_to_surveyor_for_second_inspection_remarks"
                                                            id="intimation_to_surveyor_for_second_inspection_remarks"
                                                            class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Delay by the surveyor to report to workshop <span
                                                            class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_surveyor_completion }}"
                                                            name="delay_surveyor_completion"
                                                            id="delay_surveyor_completion" class="form-control" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_surveyor_completion_remarks }}"
                                                            name="delay_surveyor_completion_remarks"
                                                            id="delay_surveyor_completion_remarks"
                                                            class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Surveyor approval to start of work <span
                                                            class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->surveyor_approval }}"
                                                            name="surveyor_approval" id="surveyor_approval"
                                                            class="form-control" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->surveyor_approval_remarks }}"
                                                            name="surveyor_approval_remarks"
                                                            id="surveyor_approval_remarks" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Approval delay by the customer <span class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text" value="{{ $data[0]->approval_delay }}"
                                                            name="approval_delay" id="approval_delay"
                                                            class="form-control" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->approval_delay_remarks }}"
                                                            name="approval_delay_remarks" id="approval_delay_remarks"
                                                            class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Advance payment delay by the customer <span
                                                            class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->advance_payment_delay }}"
                                                            name="advance_payment_delay" id="advance_payment_delay"
                                                            class="form-control" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->advance_payment_delay_remarks }}"
                                                            name="advance_payment_delay_remarks"
                                                            id="advance_payment_delay_remarks" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Delay in intimation to Insurance company for advance payment
                                                        <span class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_intimation_nsurance }}"
                                                            name="delay_intimation_nsurance"
                                                            id="delay_intimation_nsurance" class="form-control" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_intimation_nsurance_remarks }}"
                                                            name="delay_intimation_nsurance_remarks"
                                                            id="delay_intimation_nsurance_remarks"
                                                            class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Advance payment delay by the Insurance <span
                                                            class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->advance_payment_delay_ins }}"
                                                            name="advance_payment_delay_ins"
                                                            id="advance_payment_delay_ins" class="form-control" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input
                                                            type="text"value="{{ $data[0]->advance_payment_delay_ins_remarks }}"
                                                            name="advance_payment_delay_ins_remarks"
                                                            id="advance_payment_delay_ins_remarks"
                                                            class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-12" style="background: #ccc;">
                                                        Overall Delay by
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6"
                                                        style="background: #0080ff;color:#fff">
                                                        Dealer
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text" value="{{ $data[0]->pre_delay_dealer }}"
                                                            name="pre_delay_dealer" id="pre_delay_dealer"
                                                            class="form-control" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->pre_delay_dealer_remarks }}"
                                                            name="pre_delay_dealer_remarks"
                                                            id="pre_delay_dealer_remarks" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6"
                                                        style="background: #33cc33;color:#fff">
                                                        Customer <span class="text-danger">*</span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->pre_delay_customer }}"
                                                            name="pre_delay_customer" id="pre_delay_customer"
                                                            class="form-control" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->pre_delay_customer_remarks }}"
                                                            name="pre_delay_customer_remarks"
                                                            id="pre_delay_customer_remarks" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6"
                                                        style="background: #ff9900;color:#fff">
                                                        Surveyor/Insurance company
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->pre_surveyor_company }}"
                                                            name="pre_surveyor_company" id="pre_surveyor_company"
                                                            class="form-control" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->pre_surveyor_company_remarks }}"
                                                            name="pre_surveyor_company_remarks"
                                                            id="pre_surveyor_company_remarks" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- ------------------------------------------------------------------------------------------ --}}

                                <div class="ribbon repairStageAnalysisPlus"><button type="button"
                                        class="btn btn-primary repairStageAnalysisShow"> Repair Stage - Delay Analysis
                                        And Post Approval Stage - Delay Analysis&nbsp;&nbsp;<i
                                            class="fa fa-plus"></i></button></div>
                                <div class="ribbon repairStageAnalysisMinus"><button type="button"
                                        class="btn btn-primary repairStageAnalysishide"> Repair Stage - Delay Analysis
                                        And Post Approval Stage - Delay Analysis&nbsp;&nbsp;<i
                                            class="fa fa-minus"></i></button></div>
                                <div class="row  repairStageAnalysis">
                                    <div class="form-group col-md-6" style="border: 1px solid #ddd"><br />
                                        <div class="ribbon">Repair Stage - Delay Analysis</div>
                                        <hr>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Delay in start of Work <span class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text" value="{{ $data[0]->delay_start }}"
                                                            name="delay_start" id="delay_start"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_start_remarks }}"
                                                            name="delay_start_remarks" id="delay_start_remarks"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Delay in preparing the damaged parts <span
                                                            class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text" value="{{ $data[0]->delay_preparing }}"
                                                            name="delay_preparing" id="delay_preparing"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_preparing_remarks }}"
                                                            name="delay_preparing_remarks" id="delay_preparing_remarks"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        No of days taken in sheet metal <span class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->no_days_taken_metal }}"
                                                            name="no_days_taken_metal" id="no_days_taken_metal"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->no_days_taken_metal_remarks }}"
                                                            name="no_days_taken_metal_remarks"
                                                            id="no_days_taken_metal_remarks"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        No of days taken for other works <span class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->no_days_taken_works }}"
                                                            name="no_days_taken_works" id="no_days_taken_works"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->no_days_taken_works_remarks }}"
                                                            name="no_days_taken_works_remarks"
                                                            id="no_days_taken_works_remarks"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        No of days taken for Painting <span class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->no_days_taken_painting }}"
                                                            name="no_days_taken_painting" id="no_days_taken_painting"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->no_days_taken_painting_remarks }}"
                                                            name="no_days_taken_painting_remarks"
                                                            id="no_days_taken_painting_remarks"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        No of days taken for Trim the cabin <span
                                                            class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->no_days_taken_cabin }}"
                                                            name="no_days_taken_cabin" id="no_days_taken_cabin"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->no_days_taken_cabin_remarks }}"
                                                            name="no_days_taken_cabin" id="no_days_taken_cabin"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Receipt of all parts <span class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->repair_receipt_all_parts }}"
                                                            name="repair_receipt_all_parts"
                                                            id="repair_receipt_all_parts"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->repair_receipt_all_parts_remarks }}"
                                                            name="repair_receipt_all_parts_remarks"
                                                            id="repair_receipt_all_parts_remarks"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Outside job <span class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->repair_outside_job }}"
                                                            name="repair_outside_job" id="repair_outside_job"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->repair_outside_job_remarks }}"
                                                            name="repair_outside_job_remarks"
                                                            id="repair_outside_job_remarks"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Delay in intimation to surveyor for supp. Estimate <span
                                                            class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_supp_estimate }}"
                                                            name="delay_supp_estimate" id="delay_supp_estimate"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_supp_estimate_remarks }}"
                                                            name="delay_supp_estimate_remarks"
                                                            id="delay_supp_estimate_remarks"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Delay by the surveyor to report to workshop<span
                                                            class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_report_workshop }}"
                                                            name="delay_report_workshop" id="delay_report_workshop"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_report_workshop_remarks }}"
                                                            name="delay_report_workshop_remarks"
                                                            id="delay_report_workshop_remarks"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Delay by Surveyor to provide the approval on Supp. Est.<span
                                                            class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_approval_supp_est }}"
                                                            name="delay_approval_supp_est" id="delay_approval_supp_est"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_approval_supp_est_remarks }}"
                                                            name="delay_approval_supp_est_remarks"
                                                            id="delay_approval_supp_est_remarks"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Approval delay by the customer
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->approval_delay_customer }}"
                                                            name="approval_delay_customer" id="approval_delay_customer"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->approval_delay_customer_remarks }}"
                                                            name="approval_delay_customer_remarks"
                                                            id="approval_delay_customer_remarks"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Repair completion (BIBO)
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->repair_completion_bibo }}"
                                                            name="repair_completion_bibo" id="repair_completion_bibo"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->repair_completion_bibo_remarks }}"
                                                            name="repair_completion_bibo_remarks"
                                                            id="repair_completion_bibo_remarks"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-12" style="background: #ccc;">
                                                        Overall Delay by
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6"
                                                        style="background: #0080ff;color:#fff">
                                                        Dealer <span class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->inform_to_customer_work_completed }}"
                                                            name="inform_to_customer_work_completed"
                                                            id="inform_to_customer_work_completed"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->inform_to_customer_work_completed_remarks }}"
                                                            name="inform_to_customer_work_completed_remarks"
                                                            id="inform_to_customer_work_completed_remarks"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6"
                                                        style="background: #33cc33;color:#fff">
                                                        Customer<span class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->repaire_delay_customer }}"
                                                            name="repaire_delay_customer" id="repaire_delay_customer"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->repaire_delay_customer_remarks }}"
                                                            name="repaire_delay_customer_remarks"
                                                            id="repaire_delay_customer_remarks"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6"
                                                        style="background: #ff9900;color:#fff">
                                                        Surveyor/Insurance company <span class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->repaire_surveyor_company }}"
                                                            name="repaire_surveyor_company"
                                                            id="repaire_surveyor_company"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->repaire_surveyor_company_remarks }}"
                                                            name="repaire_surveyor_company_remarks"
                                                            id="repaire_surveyor_company_remarks"
                                                            class="form-control repdeanasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6" style="border: 1px solid #ddd">
                                        <br />
                                        <div class="ribbon">Post Approval Stage - Delay Analysis</div>
                                        <hr>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Delay in intimation to surveyor for final inspection <span
                                                            class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_final_inspection }}"
                                                            name="delay_final_inspection" id="delay_final_inspection"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_final_inspection_remarks }}"
                                                            name="delay_final_inspection_remarks"
                                                            id="delay_final_inspection_remarks"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Delay in road test <span class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text" value="{{ $data[0]->delay_road_test }}"
                                                            name="delay_road_test" id="delay_road_test"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_road_test_remarks }}"
                                                            name="delay_road_test_remarks" id="delay_road_test_remarks"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Delay in final inspection by surveyor<span
                                                            class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_final_inspection_surveyor }}"
                                                            name="delay_final_inspection_surveyor"
                                                            id="delay_final_inspection_surveyor"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_final_inspection_surveyor_remarks }}"
                                                            name="delay_final_inspection_surveyor_remarks"
                                                            id="delay_final_inspection_surveyor_remarks"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Delay in Submission of Proforma invoice <span
                                                            class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_submission_invoice }}"
                                                            name="delay_submission_invoice"
                                                            id="delay_submission_invoice"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_submission_invoice_remarks }}"
                                                            name="delay_submission_invoice_remarks"
                                                            id="delay_submission_invoice_remarks"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Receipt of Delivery Order/ Liability report <span
                                                            class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->receipt_delivery_report }}"
                                                            name="receipt_delivery_report" id="receipt_delivery_report"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->receipt_delivery_report_remarks }}"
                                                            name="receipt_delivery_report_remarks"
                                                            id="receipt_delivery_report_remarks"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Job card open to Job card closed
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->job_card_open_close }}"
                                                            name="job_card_open_close" id="job_card_open_close"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->job_card_open_close_remarks }}"
                                                            name="job_card_open_close_remarks"
                                                            id="job_card_open_close_remarks"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Delay in final payment from customer <span
                                                            class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_final_payment_customer }}"
                                                            name="delay_final_payment_customer"
                                                            id="delay_final_payment_customer"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_final_payment_customer_remarks }}"
                                                            name="delay_final_payment_customer_remarks"
                                                            id="delay_final_payment_customer_remarks"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Delay in final payment from Insurance <span
                                                            class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_final_payment_insurance }}"
                                                            name="delay_final_payment_insurance"
                                                            id="delay_final_payment_insurance"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_final_payment_insurance_remarks }}"
                                                            name="delay_final_payment_insurance_remarks"
                                                            id="delay_final_payment_insurance_remarks"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Delay in collect the vehicle <span class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_collect_vehicle }}"
                                                            name="delay_collect_vehicle" id="delay_collect_vehicle"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->delay_collect_vehicle_remarks }}"
                                                            name="delay_collect_vehicle_remarks"
                                                            id="delay_collect_vehicle_remarks"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        Vehicle inward to out wards <span class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->vehicle_inward_wards }}"
                                                            name="vehicle_inward_wards" id="vehicle_inward_wards"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->vehicle_inward_wards_remarks }}"
                                                            name="vehicle_inward_wards_remarks"
                                                            id="vehicle_inward_wards_remarks"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        GIGO <span class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text" value="{{ $data[0]->gigo }}"
                                                            name="gigo" id="gigo"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text" value="{{ $data[0]->gigo_remarks }}"
                                                            name="gigo_remarks" id="gigo_remarks"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-12" style="background: #ccc;">
                                                        Overall Delay by
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6"
                                                        style="background: #0080ff;color:#fff">
                                                        Dealer<span class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->post_delay_dealer }}"
                                                            name="post_delay_dealer" id="post_delay_dealer"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->post_delay_dealer_remarks }}"
                                                            name="post_delay_dealer_remarks"
                                                            id="post_delay_dealer_remarks"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6"
                                                        style="background: #33cc33;color:#fff">
                                                        Customer
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->post_delay_customer }}"
                                                            name="post_delay_customer" id="post_delay_customer"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->post_delay_customer_remarks }}"
                                                            name="post_delay_customer_remarks"
                                                            id="post_delay_customer_remarks"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6"
                                                        style="background: #ff9900;color:#fff">
                                                        Surveyor/Insurance company
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->post_surveyor_company }}"
                                                            name="post_surveyor_company" id="post_surveyor_company"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <input type="text"
                                                            value="{{ $data[0]->post_surveyor_company_remarks }}"
                                                            name="post_surveyor_company" id="post_surveyor_company"
                                                            class="form-control appsdasis" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- ------------------------------------------------------------------------------------------ --}}

                                <div class="form-group col-md-12" style="border: 1px solid #ddd">
                                    <div class="ribbon">Description</div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Dealer</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="description_dealer"
                                                        id="description_dealer" class="form-control" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Customer</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="description_customer"
                                                        id="description_customer" class="form-control" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Surveyor/Insurance company</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="description_surveyor"
                                                        id="description_surveyor" class="form-control"
                                                        readonly="true" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>GIGO</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="description_GIGO"
                                                        id="description_GIGO" class="form-control" readonly="true" />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>BIBO</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="description_BIBO"
                                                        id="description_BIBO" class="form-control" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Vehicle inward to out ward</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="description_Vehicle_inward_to_out_ward"
                                                        id="description_Vehicle_inward_to_out_ward" class="form-control"
                                                        readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Job card open to Job card closed</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text"
                                                        name="description_Job_card_open_to_Job_card_closed"
                                                        id="description_Job_card_open_to_Job_card_closed"
                                                        class="form-control" readonly="true" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <br>

                            {{-- ------------------------------------------------------------------------------------------ --}}

                            <div class="ribbon">Additional Remarks</div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-1">
                                            Additional Remarks <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <textarea name="additional_remark" value="{{ $data[0]->additional_remarks }}" id="additional_remark"
                                                class="form-control">
                                           </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row justify-content-center">
                                <div class="col-md-2">
                                    <input type="submit" name="update" id="update"
                                        class="btn btn-block btn-info btn-sm" value="Update" />
                                </div>
                            </div>
                            <br />
                            <hr>
                    </div>

                    </form>
                    <hr>

                    {{-- ------------------------------------------------------------------------------------------ --}}

                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                <span class="btn-primary"
                                    style="padding-left: 5px;padding-right: 5px;padding-top: 2px;padding-bottom: 2px;cursor: pointer;position: relative;top: 13px;"
                                    title="History" data-toggle="collapse" data-target=".history"
                                    aria-expanded="false"
                                    aria-controls="multiCollapseExample1 multiCollapseExample2">History</span>
                                <span class="btn-primary"
                                    style="padding-left: 5px;padding-right: 5px;padding-top: 2px;padding-bottom: 2px;cursor: pointer;position: relative;top: 13px;"
                                    title="BIBO History" data-toggle="collapse" data-target=".history1"
                                    aria-expanded="false"
                                    aria-controls="multiCollapseExample2 multiCollapseExample1">Bibo History</span>
                            </p>
                            <div class="collapse multi-collapse history" id="multiCollapseExample2"
                                style="position: relative;top: 10px;">
                                <div class="card card-body" style="width: 100%;overflow: auto;">
                                    <table style="font-size: 11px;" class="table table-bordered">
                                        <tr>
                                            <th style="text-align: left;">Job Card Number</th>
                                            <th style="text-align: left;">Created By</th>
                                            <th style="text-align: left;">Status</th>
                                            <th style="text-align: left;">Remarks</th>
                                            <th style="text-align: left;">Date</th>
                                        </tr>
                                        @isset($history)

                                            @foreach ($history as $row)
                                                @php
                                                    $dataVAlue = json_decode($row->data);
                                                    
                                                @endphp
                                                <tr>
                                                    <td style="text-align: left;">{{ $row->Job_card_No }}</td>
                                                    <td style="text-align: left;">{{ $row->created_by }}</td>
                                                    <td style="text-align: left;"> @isset($dataVAlue->case_status)
                                                            {{ $dataVAlue->case_status }}
                                                        @endisset
                                                    </td>
                                                    <td style="text-align: left;"> @isset($dataVAlue->remarks)
                                                            {{ $dataVAlue->remarks }}
                                                        @endisset
                                                    </td>
                                                    <td style="text-align: left;">
                                                        {{ $row->created_at != '' ? date('d-m-Y H:i:s', strtotime($row->created_at)) : 'NA' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                    </table>
                                </div>
                            </div>
                            <div class="collapse multi-collapse history1" id="multiCollapseExample2"
                                style="position: relative;top: 10px;">
                                <div class="card card-body" style="width: 100%;overflow: auto;">
                                    <table style="font-size: 11px;" class="table table-bordered">
                                        <tr>
                                            <th style="text-align: left;">Job Card Number</th>
                                            <th style="text-align: left;">Created By</th>
                                            <th style="text-align: left;">BIBO Stage Delay</th>
                                            <th style="text-align: left;">Remarks</th>
                                            <th style="text-align: left;">Date</th>
                                        </tr>
                                        @isset($history)

                                            @foreach ($history as $row)
                                                @php
                                                    $datavalue = json_decode($row->data);
                                                    
                                                @endphp
                                                <tr>
                                                    <td style="text-align: left;">{{ $row->Job_card_No }}</td>
                                                    <td style="text-align: left;">{{ $row->created_by }}</td>
                                                    <td style="text-align: left;">
                                                        @isset($datavalue->repair_delay_reason)
                                                            {{ $datavalue->repair_delay_reason }}
                                                        @endisset
                                                    </td>
                                                    <td style="text-align: left;"> @isset($datavalue->remarks)
                                                            {{ $datavalue->remarks }}
                                                        @endisset
                                                    </td>
                                                    <td style="text-align: left;">
                                                        {{ $row->created_at != '' ? date('d-m-Y H:i:s', strtotime($row->created_at)) : 'NA' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="{{ asset('plugins/popper/umd/popper.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function() {

            $('#postApprovalremarks').hide();
            $('#PreApprovalremarks').hide();
            $('#repairStageRemarks').hide();

            $('.datepickr').datetimepicker({
                format: 'd-M-Y',
            });


            $('#stage').on('change', function() {
                var val = $(this).val();
                if (val == 'Post Approval stage') {

                    var postStage =
                        `<option value="NA">--Select--</option>
                                <option value="Awaiting Delivery Order from Insurance">Awaiting Delivery Order from Insurance</option>
                                <option value="Awaiting Pre Invoice Generation">Awaiting Pre Invoice Generation</option>
                                <option value="Final inspection pending by Surveyor">Final inspection pending by Surveyor</option>
                                <option value="Final Insurance Approval">Final Insurance Approval</option>
                                <option value="Final Payment from Customer">Final Payment from Customer</option>
                                <option value="Final Payment from Insurance">Final Payment from Insurance</option>
                                <option value="Job card already closed">Job card already closed</option>
                                <option value="Job Card Yet to close">Job Card Yet to close</option>
                                <option value="Vehicle delivered - JOB CARD NOT CLOSED">Vehicle delivered - JOB CARD NOT CLOSED</option>
                                <option value="Vehicle ready customer not taken delivery">Vehicle ready customer not taken delivery</option>`;
                    $('#remarks').html(postStage);
                }
                if (val == 'Pre Approval stage') {
                    var preStage =
                        `<option value="NA">--Select--</option>
                <option value="Advance payment from customer">Advance payment from customer</option>
                <option value="Advance payment from Insurance company">Advance payment from Insurance company</option>
                <option value="Approval pending from customer to start of work">Approval pending from customer to start of work</option>
                <option value="Awaiting approval from dealer management">Awaiting approval from dealer management</option>
                <option value="Awaiting for Surveyor approval for dismantling">Awaiting for Surveyor approval for dismantling</option>
                <option value="Awaiting for Surveyor approval to start of work">Awaiting for Surveyor approval to start of work</option>
                <option value="Claim intimation not done by customer">Claim intimation not done by customer</option>
                <option value="Claim rejected/No response from customer">Claim rejected/No response from customer</option>
                <option value="Data Not Available">Data Not Available</option>
                <option value="Dismantling - WIP">Dismantling - WIP</option>
                <option value="Dispute between customer &amp; Surveyor">Dispute between customer &amp; Surveyor</option>
                <option value="Document Pending  from customer">Document Pending  from customer</option>
                <option value="Initial estimate pending">Initial estimate pending</option>
                <option value="Initial inspection pending from Surveyor">Initial inspection pending from Surveyor</option>
                <option value="Initial Insurance approval Pending">Initial Insurance approval Pending</option>
                <option value="Job Card Opened for Parts Purpose">Job Card Opened for Parts Purpose</option>
                <option value="Job card opened Wrongly">Job card opened Wrongly</option>
                <option value="Legal issue">Legal issue</option>
                <option value="Total Loss">Total Loss</option>
                <option value="Documentation disputes.">Documentation disputes.</option>
                <option value="Vehicle under Investigation">Vehicle under Investigation</option>
                <option value="Dealer having fund issue to raise the parts">Dealer having fund issue to raise the parts</option>
                <option value="Outlet closed - unable to close the JC">Outlet closed - unable to close the JC</option>`;
                    $('#remarks').html(preStage);
                }
                if (val == 'Repair stage') {
                    var repairStage = `<option value="Awaiting for Parts">Awaiting for Parts</option>
                            <option value="Awaiting for parts to Close the Job card">Awaiting for parts to Close the Job card</option>
                            <option value="Outside job - WIP">Outside job - WIP</option>
                            <option value="Repair WIP">Repair WIP</option>
                            <option value="Tinker/ Painter not available">Tinker/ Painter not available</option>`;
                    $('#remarks').html(repairStage);
                }

                if (val == 'NA') {
                    var naStage = `<option value="NA">Please Select</option>`;
                    $('#remarks').html(naStage);
                }
            });






        });

        $(document).ready(function() {

            ////////////////////////////// readonly content 13-05-2023 /////////////////
            $('#third_party').on('change', function() {
                if (this.value == 'no') {
                    $('#spot_surveyor_dealer').attr('readonly', 'readonly');
                    $('#spot_surveyor_mob_dealer').attr('readonly', 'readonly');
                    $('#spot_surveyor_email_dealer').attr('readonly', 'readonly');
                    $('#spot_surveyor_report_dealer').attr('readonly', 'readonly');
                    $('#spot_surveyor_customer').attr('readonly', 'readonly');
                    $('#spot_surveyor_mob_customer').attr('readonly', 'readonly');
                    $('#spot_surveyor_email_customer').attr('readonly', 'readonly');
                    $('#spot_surveyor_report_customer').attr('readonly', 'readonly')
                } else {
                    $('#spot_surveyor_dealer').removeAttr('readonly');
                    $('#spot_surveyor_mob_dealer').removeAttr('readonly');
                    $('#spot_surveyor_email_dealer').removeAttr('readonly');
                    $('#spot_surveyor_report_dealer').removeAttr('readonly');
                    $('#spot_surveyor_customer').removeAttr('readonly');
                    $('#spot_surveyor_mob_customer').removeAttr('readonly');
                    $('#spot_surveyor_email_customer').removeAttr('readonly');
                    $('#spot_surveyor_report_customer').removeAttr('readonly');
                }
            });
            $('#accident_vehicle').on('change', function() {
                if (this.value == 'no') {
                    $('#load_challan_dealer').attr('type', 'text');
                    $('#load_challan_customer').attr('type', 'text');
                    $('#decrtn_letter_dealer').attr('type', 'date');
                    $('#decrtn_letter_customer').attr('type', 'date');
                    $('#load_challan_dealer').attr('readonly', 'readonly')
                    $('#load_challan_customer').attr('readonly', 'readonly')
                    $('#decrtn_letter_customer').removeAttr('readonly');
                    $('#decrtn_letter_dealer').removeAttr('readonly');
                } else {
                    $('#load_challan_dealer').attr('type', 'date');
                    $('#load_challan_customer').attr('type', 'date');
                    $('#decrtn_letter_dealer').attr('type', 'text');
                    $('#decrtn_letter_customer').attr('type', 'text');
                    $('#load_challan_dealer').removeAttr('readonly');
                    $('#load_challan_customer').removeAttr('readonly');
                    $('#decrtn_letter_dealer').attr('readonly', 'readonly')
                    $('#decrtn_letter_customer').attr('readonly', 'readonly')
                }
            });
            $('#thermal_incident').on('change', function() {
                if (this.value == 'no') {
                    $('#fire_brigade_dealer').attr('readonly', 'readonly');
                    $('#fire_brigade_customer').attr('readonly', 'readonly');
                } else {
                    $('#fire_brigade_dealer').removeAttr('readonly');
                    $('#fire_brigade_customer').removeAttr('readonly', 'readonly');
                }
            });
            $('#Vehicle_towed').on('change', function() {
                if (this.value == 'no') {
                    $('#towing_bill_dealer').attr('readonly', 'readonly');
                    $('#towing_bill_customer').attr('readonly', 'readonly');
                } else {
                    $('#towing_bill_dealer').removeAttr('readonly');
                    $('#towing_bill_customer').removeAttr('readonly', 'readonly');
                }
            });
            $('#PA_claim').on('change', function() {
                if (this.value == 'no') {
                    $('#postmortem_report_dealer').attr('readonly', 'readonly');
                    $('#postmortem_report_customer').attr('readonly', 'readonly');
                } else {

                    $('#postmortem_report_dealer').removeAttr('readonly', 'readonly');
                    $('#postmortem_report_customer').removeAttr('readonly', 'readonly');
                }
            });


            // Function to enable the datetimepicker
            function enableDatetimePicker() {
                $('.datepickr').prop('disabled', false);
                $('.datepickr').datetimepicker('enable');
            }
            
            // Function to disable the datetimepicker
            function disableDatetimePicker() {
                $('.datepickr').prop('disabled', true);
                $('.datepickr').datetimepicker("disable");
            }

            // Initial state
            disableDatetimePicker();
            // Listen for changes in the userChoice select element
            $('#supplementary_required').on('change', function() {
                if (this.value == 'yes') {
                    $('#intimation_surveyor').removeAttr('readonly', 'readonly');
                    $('#supplementary_estimate').removeAttr('readonly', 'readonly');
                    $('#supplementary_estimate_val').removeAttr('readonly', 'readonly');
                    $('#supplementary_inspection').removeAttr('readonly', 'readonly');
                    $('#repair_completion').removeAttr('readonly', 'readonly');
                    $('#parts_get_approval').removeAttr('readonly', 'readonly');
                    $('#inform_to_customer_vehicle').removeAttr('readonly', 'readonly');
                    $('#supplementary_written_approval').removeAttr('readonly', 'readonly');
                    $('#inform_to_customer_on_approval').removeAttr('readonly', 'readonly');
                    $('#delay_supp_estimate').removeAttr('readonly', 'readonly');
                    $('#delay_report_workshop').removeAttr('readonly', 'readonly');
                    $('#delay_approval_supp_est').removeAttr('readonly', 'readonly');
                    enableDatetimePicker();
                } else {
                    $('#intimation_surveyor').attr('readonly', 'readonly');
                    $('#supplementary_estimate').attr('readonly', 'readonly');
                    $('#supplementary_estimate_val').attr('readonly', 'readonly');
                    $('#supplementary_inspection').attr('readonly', 'readonly');
                    $('#repair_completion').attr('readonly', 'readonly');
                    $('#supplementary_written_approval').attr('readonly', 'readonly');
                    $('#inform_to_customer_vehicle').attr('readonly', 'readonly');
                    $('#inform_to_customer_on_approval').attr('readonly', 'readonly');
                    $('#parts_get_approval').attr('readonly', 'readonly');
                    $('#delay_supp_estimate').attr('readonly', 'readonly');
                    $('#delay_report_workshop').attr('readonly', 'readonly');
                    $('#delay_approval_supp_est').attr('readonly', 'readonly');
                    disableDatetimePicker();
                }
            });



            ////////////////////////Document Status ///////////////////////
            $('#initial_estimate_val_dealer').on('blur', function() {
                var estimate_value = $(this).val();
                if (estimate_value > 100000) {
                    $('#major_minor_dealer').val('Major');
                }
                if (estimate_value <= 100000) {
                    $('#major_minor_dealer').val('Minor');
                }
            });

            //////////////////////// Content Hide and Show Div ////////////////
            //pre Approvela Stage
            $(".preApproval").hide();
            $('.Preminus').hide();
            $(".preApprovalshow").click(function() {
                $(".preApproval").show("slow");
                $('.Preminus').show();
                $('.Preplus').hide();
            });
            $(".preApprovalhide").on('click', function() {
                $(".preApproval").hide("slow");
                $('.Preminus').hide();
                $('.Preplus').show();
            });
            //Repair Stage
            $(".repairStage").hide();
            $('.repairMinus').hide();
            $(".repairStageshow").click(function() {
                $(".repairStage").show("slow");
                $('.repairMinus').show();
                $('.repairPlus').hide();
            });
            $(".repairStagehide").on('click', function() {
                $(".repairStage").hide("slow");
                $('.repairMinus').hide();
                $('.repairPlus').show();
            });

            //Post Stage
            $(".postApprovalStage").hide();
            $('.postminus').hide();
            $(".postApprovalStageshow").click(function() {
                $(".postApprovalStage").show("slow");
                $('.postplus').hide();
                $('.postminus').show();
            });
            $(".postApprovalStagehide").on('click', function() {
                $(".postApprovalStage").hide("slow");
                $('.postplus').show();
                $('.postminus').hide();
            });

            ///Pre Delay Analysis
            $(".preDelayAnalysis").hide();
            $('.preDelayMinus').hide();
            $(".preDelayAnalysisshow").click(function() {
                $(".preDelayAnalysis").show("slow");
                $('.preDelayPlus').hide();
                $('.preDelayMinus').show();
            });
            $(".preDelayAnalysishide").on('click', function() {
                $(".preDelayAnalysis").hide("slow");
                $('.preDelayPlus').show();
                $('.preDelayMinus').hide();
            });
            $('.repairStageAnalysis').hide();
            $('.repairStageAnalysisMinus').hide();
            $(".repairStageAnalysisShow").click(function() {
                $(".repairStageAnalysis").show("slow");
                $('.repairStageAnalysisMinus').show();
                $('.repairStageAnalysisPlus').hide();
            });
            $(".repairStageAnalysishide").click(function() {
                $(".repairStageAnalysis").hide("slow");
                $('.repairStageAnalysisMinus').hide();
                $('.repairStageAnalysisPlus').show();
            });


            /////////////////////////////////////////////// Description section starts here////////////////////////////////////


            ///////////////////////////////readonly content ////////////////////////////////////////
            var desde = $('#pre_delay_dealer').val(); //dealer : pre-approval stage - delay analysis
            var inform = $('#inform_to_customer_work_completed').val(); //dealer: repair stage - delay analysis
            var post = $('#post_delay_dealer').val(); //dealer: post-approval stage - delay analysis
            var desc_dealer = parseInt(desde) + parseInt(inform) + parseInt(post);
            $('#description_dealer').val(Math.round(desc_dealer)); //description dealer

            var pred = $('#pre_delay_customer').val(); //customer : pre-approval stage - delay analysis
            var repairec = $('#repaire_delay_customer').val(); //customer: repair stage - delay analysis
            var postd = $('#post_delay_dealer').val(); //customer: post-approval stage - delay analysis
            var desc_dealer = parseInt(pred) + parseInt(repairec) + parseInt(postd);
            $('#description_customer').val(Math.round(desc_dealer)); //description customer

            var presuper = $('#pre_surveyor_company').val();
            var repaire_surv = $('#repaire_surveyor_company').val();
            var post_surveyor = $('#post_surveyor_company').val();
            var descsup = parseInt(presuper) + parseInt(repaire_surv) + parseInt(post_surveyor);
            $('#description_surveyor').val(Math.round(descsup));

            var repaird = $('#repair_completion_bibo').val();
            $('#description_BIBO').val(Math.round(repaird));

            var vehicled = $('#vehicle_inward_wards').val();
            $('#description_Vehicle_inward_to_out_ward').val(Math.round(vehicled));

            var jobdd = $('#job_card_open_close').val();
            $('#description_Job_card_open_to_Job_card_closed').val(Math.round(jobdd));

            var gigod = $('#gigo').val();
            $('#description_GIGO').val(Math.round(gigod));
            /******************************************* Description section ends here *******************************************/

            ///////////////////////////////////////// Post approval stage, delay analysis Sections//////////////////////////////////

            var veh_rep_wkshp_dealer = new Date($('#veh_rep_wkshp_dealer')
                .val()); //General Details:Vehicle reported at workshop
            var gate_pass = new Date($('#gate_pass').val()); //post-approval section : gate pass
            var gigo_diff = veh_rep_wkshp_dealer.getTime() - gate_pass.getTime();
            //calculate days difference by dividing total milliseconds in a day
            // effects on GIGO : Post Approval Stage - Delay Analysis  
            var gigo = gigo_diff / (1000 * 60 * 60 * 24);
            $('#gigo').val(Math.round(gigo));
            $('#gigo').attr('readonly', true);
            if ((major == 'Major' && Math.round(gigo) == 0) || (major == 'Minor' && Math.round(gigo) == 0)) {
                $('#gigo').addClass('bg-success');
            } else {
                $('#gigo').addClass('bg-danger');
            }
            /*********************************************************************************************************************/
            var iicfi = new Date($('#conduct_road_test').val()); //post-approval stage conduct road test
            var repair_completion = new Date($('#repair_completion')
                .val()); //repair stage- any supplementary required
            var conduct_road_test_diff = iicfi.getTime() - repair_completion.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var conduct_road = conduct_road_test_diff / (1000 * 60 * 60 * 24);
            $('#delay_road_test').val(Math.round(
                conduct_road)); //post-approval stage delay analysis delay road test
            $('#delay_road_test').attr('readonly', true);
            if ((major == 'Major' && Math.round(conduct_road) <= 1) || (major == 'Minor' && Math.round(
                    conduct_road) == 0)) {
                $('#delay_road_test').addClass('bg-success');
            } else {
                $('#delay_road_test').addClass('bg-danger');
            }
            /***********************************************************************************************************************/
            var veh_delivery_customer = new Date($('#veh_delivery_customer')
                .val()); //post-approval stage vehicle delivery to customer
            var veh_rep_wkshp_dealer = new Date($('#veh_rep_wkshp_dealer')
                .val()); //General Details:Vehicle reported at workshop
            var veh_rep_dealer_diff = veh_delivery_customer.getTime() - veh_rep_wkshp_dealer.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var veh_rep_dealer = veh_rep_dealer_diff / (1000 * 60 * 60 * 24);
            $('#vehicle_inward_wards').val(Math.round(veh_rep_dealer)); //Post Approval Stage-Delay Analysis
            $('#vehicle_inward_wards').attr('readonly', true);
            if ((major == 'Major' && Math.round(veh_rep_dealer) == 0) || (major == 'Minor' && Math.round(
                    veh_rep_dealer) == 0)) {
                $('#vehicle_inward_wards').addClass('bg-success');
            } else {
                $('#vehicle_inward_wards').addClass('bg-danger');
            }
            /***********************************************************************************************************************/
            var bal_payment_customer = new Date($('#bal_payment_customer')
                .val()); //post-approval stage Balance payment from Customer
            var bal_payment_customer_diff = veh_delivery_customer.getTime() - bal_payment_customer.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var bal_payment = bal_payment_customer_diff / (1000 * 60 * 60 * 24);
            //Delay in collect the vehicle : Post Approval Stage-Delay Analysis
            $('#delay_collect_vehicle').val(Math.round(bal_payment));
            $('#delay_collect_vehicle').attr('readonly', true);
            if ((major == 'Major' && Math.round(bal_payment) == 0) || (major == 'Minor' && Math.round(
                    bal_payment) == 0)) {
                $('#delay_collect_vehicle').addClass('bg-success');
            } else {
                $('#delay_collect_vehicle').addClass('bg-danger');
            }
            /***********************************************************************************************************************/
            var bal_pymnt_ins = new Date($('#bal_pymnt_ins')
                .val()); //post-approval stage:Balance payment from Insurance
            var receipt_delivery_order = new Date($('#receipt_delivery_order')
                .val()); //post-approval stage:Receipt of Delivery Order/Liability report
            var bal_pymnt_ins_diff = bal_pymnt_ins.getTime() - receipt_delivery_order.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var bal_pymnty = bal_pymnt_ins_diff / (1000 * 60 * 60 * 24);
            //Delay in final payment from Insurance: Post Approval Stage-Delay Analysis
            $('#delay_final_payment_insurance').val(Math.round(bal_pymnty));
            $('#delay_final_payment_insurance').attr('readonly', true);
            if ((major == 'Major' && Math.round(bal_pymnty) == 0) || (major == 'Minor' && Math.round(
                        bal_pymnty) ==
                    0)) {
                $('#delay_final_payment_insurance').addClass('bg-success');
            } else {
                $('#delay_final_payment_insurance').addClass('bg-danger');
            }
            /***********************************************************************************************************************/
            var bal_pymnt_ins = new Date($('#bal_pymnt_ins')
                .val()); //post-approval stage:Balance payment from Insurance
            var bal_pymnt_ins_diff = bal_pymnt_ins.getTime() - receipt_delivery_order.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var bal_pymnt = bal_pymnt_ins_diff / (1000 * 60 * 60 * 24);
            //Delay in final payment from customer : Post Approval Stage-Delay Analysis
            $('#delay_final_payment_customer').val(Math.round(bal_pymnt));
            $('#delay_final_payment_customer').attr('readonly', true);
            if ((major == 'Major' && Math.round(bal_pymnt) == 0) || (major == 'Minor' && Math.round(
                        bal_pymnt) ==
                    0)) {
                $('#delay_final_payment_customer').addClass('bg-success');
            } else {
                $('#delay_final_payment_customer').addClass('bg-danger');
            }
            /***********************************************************************************************************************/
            var job_card_closed = new Date($('#job_card_closed').val()); //job card closed : post-approval stage
            var Job_Card_open_date = new Date($('#Job_Card_open_date')
                .val()); //general details : job card open date
            var job_card_closed_diif = job_card_closed.getTime() - Job_Card_open_date.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var job_card = job_card_closed_diif / (1000 * 60 * 60 * 24);
            // Post Approval Stage-Delay Analysis : Job card open to Job card closed
            $('#job_card_open_close').val(Math.round(job_card));
            $('#job_card_open_close').attr('readonly', true);
            if ((major == 'Major' && Math.round(job_card) == 0) || (major == 'Minor' && Math.round(job_card) ==
                    0)) {
                $('#job_card_open_close').addClass('bg-success');
            } else {
                $('#job_card_open_close').addClass('bg-danger');
            }
            /***********************************************************************************************************************/
            var receipt_delivery_order = new Date($('#receipt_delivery_order')
                .val()); //post-approval stage:Receipt of Delivery Order/Liability report
            var proforma_submission = new Date($('#proforma_submission')
                .val()); //post-approval stage:Proforma Submission to surveyor post inspection
            var receipt_delivery_order_diff = receipt_delivery_order.getTime() - proforma_submission.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var receipt_delivery = receipt_delivery_order_diff / (1000 * 60 * 60 * 24);
            //Post Approval Stage-Delay Analysis : Receipt of Delivery Order/ Liability report
            $('#receipt_delivery_report').val(Math.round(receipt_delivery));
            $('#receipt_delivery_report').attr('readonly', true);
            if ((major == 'Major' && Math.round(receipt_delivery) <= 2) || (major == 'Minor' && Math.round(
                    receipt_delivery) <= 1)) {
                $('#receipt_delivery_report').addClass('bg-success');
            } else {
                $('#receipt_delivery_report').addClass('bg-danger');
            }
            /***********************************************************************************************************************/
            var final_insption_surveyor = new Date($('#final_insption_surveyor')
                .val()); //post-approval stage:Final Inspection from surveyor
            var delay_submission_invoice_diff = proforma_submission.getTime() - final_insption_surveyor
                .getTime();
            //calculate days difference by dividing total milliseconds in a day
            var delay_submission = delay_submission_invoice_diff / (1000 * 60 * 60 * 24);
            //Delay in Submission of Proforma invoice: Post Approval Stage-Delay Analysis
            $('#delay_submission_invoice').val(Math.round(delay_submission));
            $('#delay_submission_invoice').attr('readonly', true);
            if ((major == 'Major' && Math.round(delay_submission) <= 1) || (major == 'Minor' && Math.round(
                    delay_submission) <= 1)) {
                $('#delay_submission_invoice').addClass('bg-success');
            } else {
                $('#delay_submission_invoice').addClass('bg-danger');
            }
            /***********************************************************************************************************************/
            var iicfi = new Date($('#iicfi')
                .val()); //Intimation to Insurance company final inspection : post approval stage
            var iicfi_diff = final_insption_surveyor.getTime() - iicfi.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var iicfi_ = iicfi_diff / (1000 * 60 * 60 * 24);
            //Delay in final inspection by surveyor : Post Approval Stage-Delay Analysis
            $('#delay_final_inspection_surveyor').val(Math.round(iicfi_));
            $('#delay_final_inspection_surveyor').attr('readonly', true);
            /***********************************************************************************************************************/
            var iicfi = new Date($('#iicfi').val());
            var iicfi_diff = final_insption_surveyor.getTime() - iicfi.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var iicfi_ = iicfi_diff / (1000 * 60 * 60 * 24);
            //Delay in intimation to surveyor for final inspection : Post Approval Stage-Delay Analysis
            $('#delay_final_inspection').val(Math.round(iicfi_));
            $('#delay_final_inspection').attr('readonly', true);
            if ((major == 'Major' && iicfi_ <= 2) || (major == 'Minor' && iicfi_ <= 1)) {
                $('#delay_final_inspection').addClass('bg-success');
            } else {
                $('#delay_final_inspection').addClass('bg-danger');
            }
            /**********************************************************************************************************************/
            var df = $('#delay_final_inspection')
                .val(); //Delay in intimation to surveyor for final inspection : Post Approval Stage-Delay Analysis
            var ds = $('#delay_submission_invoice')
                .val(); //Delay in final inspection by surveyor : Post Approval Stage-Delay Analysis
            var dfds = parseInt(df) + parseInt(ds);
            $('#post_delay_dealer').val(Math.round(dfds)); //dealer: post-approval stage - delay analysis
            $('#post_delay_dealer').attr('readonly', true);
            /***********************************************************************************************************************/
            var dfd = $('#delay_road_test').val(); //post-approval stage delay analysis delay road test
            var ddd = $('#delay_final_payment_customer')
                .val(); //Delay in final payment from customer : Post Approval Stage-Delay Analysis
            var dfdsd = parseInt(dfd) + parseInt(ddd); //customer: post-approval stage - delay analysis
            $('#post_delay_customer').val(Math.round(dfdsd));
            $('#post_delay_customer').attr('readonly', true);
            /***********************************************************************************************************************/
            var delay_final = $('#delay_final_inspection_surveyor')
                .val(); //Delay in final inspection by surveyor : Post Approval Stage-Delay Analysis
            var receipt = $('#receipt_delivery_report')
                .val(); //Post Approval Stage-Delay Analysis : Receipt of Delivery Order/ Liability report
            var insurance = $('#delay_final_payment_insurance')
                .val(); //Delay in final payment from Insurance: Post Approval Stage-Delay Analysis
            suppost = parseInt(delay_final) + parseInt(receipt) + parseInt(insurance);
            //Surveyor/Insurance company : post-approval stage - delay analysis
            $('#post_surveyor_company').val(Math.round(suppost));
            $('#post_surveyor_company').attr('readonly', true);
            /**********************************************End of post-approval stage - delay analysis******************************/


            /////////////////////////// Repair Stage, delay analysis section/////////////////////////////////////////////////////////

            var initial_estimate_dealer_date1 = new Date($('#apc_time_dealer')
                .val()); //Advance payment from customer : pre-approval stage
            var initial_estimate_dealer_date2 = new Date($('#repair_work_start_dealer')
                .val()); //Repair Work Start : repair stage
            var initial_estimate_dealer_diff = initial_estimate_dealer_date1.getTime() -
                initial_estimate_dealer_date2.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var intemation_difference_deler = initial_estimate_dealer_diff / (1000 * 60 * 60 * 24);
            //Delay in start of Work : repair stage - delay analysis
            $('#delay_start').val(Math.round(intemation_difference_deler));
            $('#delay_start').attr('readonly', true);
            /*********************************************************************************************************************/
            var initial_estimate_dealer_date1 = new Date($('#detail_damaged_dealer')
                .val()); //Detail Damaged Parts List Preparation : repair stage
            var detail_damaged_dealer_diff = initial_estimate_dealer_date1.getTime() -
                initial_estimate_dealer_date2
                .getTime();
            //calculate days difference by dividing total milliseconds in a day
            var detail_damaged_dealer = detail_damaged_dealer_diff / (1000 * 60 * 60 * 24);
            //Delay in preparing the damaged parts : repair stage - delay analysis
            $('#delay_preparing').val(Math.round(detail_damaged_dealer));
            $('#delay_preparing').attr('readonly', true);
            if ((major == 'Major' && detail_damaged_dealer <= 2) || (major == 'Minor' &&
                    detail_damaged_dealer <=
                    1)) {
                $('#delay_preparing').addClass('bg-success');
            } else {
                $('#delay_preparing').addClass('bg-danger');
            }
            /*******************************************************************************************************************/
            var sheet_denting_repair1 = new Date($('#sheet_denting_repair')
                .val()); //start date->Sheet Metal/Denting Repair Work : repair stage
            var sheet_denting_repair2 = new Date($('#sheet_denting_repair_remarks')
                .val()); // end date->Sheet Metal/Denting Repair Work : repair stage
            var sheet_denting_repair_diff = sheet_denting_repair1.getTime() - sheet_denting_repair2.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var sheet_denting_repai = sheet_denting_repair_diff / (1000 * 60 * 60 * 24);
            //No of days taken in sheet metal : repair stage - delay analysis
            $('#no_days_taken_metal').val(Math.round(sheet_denting_repai));
            $('#no_days_taken_metal').attr('readonly', true);
            if ((major == 'Major' && sheet_denting_repai <= 5) || (major == 'Minor' && sheet_denting_repai <=
                    3)) {
                $('#no_days_taken_metal').addClass('bg-success');
            } else {
                $('#no_days_taken_metal').addClass('bg-danger');
            }
            /***********************************************************************************************************************/
            var mech_elec_repair = new Date($('#mech_elec_repair')
                .val()
            ); //start date->Vehicle Level Mechanical & Electrical Repair(other than cabin) : repair stage
            var mech_elec_repair_remarks = new Date($('#mech_elec_repair_remarks')
                .val()
            ); //end date->Vehicle Level Mechanical & Electrical Repair(other than cabin) : repair stage
            var mech_elec_repair_diff = mech_elec_repair.getTime() - mech_elec_repair_remarks.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var sheet_denting_repait = mech_elec_repair_diff / (1000 * 60 * 60 * 24);
            //No of days taken for other works : repair stage - delay analysis
            $('#no_days_taken_works').val(Math.round(sheet_denting_repait));
            $('#no_days_taken_works').attr('readonly', true);
            /*******************************************************************************************************************/
            var painting_start = new Date($('#painting_start')
                .val()); //start date->Painting Start : repair stage
            var painting_start_remarks = new Date($('#painting_start_remarks')
                .val()); //end date->Painting Start : repair stage
            var painting_start_diff = painting_start.getTime() - painting_start_remarks.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var painting_start = painting_start_diff / (1000 * 60 * 60 * 24);
            //No of days taken for Painting : repair stage - delay analysis
            $('#no_days_taken_painting').val(Math.round(painting_start));
            $('#no_days_taken_painting').attr('readonly', true);
            if ((major == 'Major' && painting_start <= 2) || (major == 'Minor' && painting_start <= 1)) {
                $('#no_days_taken_painting').addClass('bg-success');
            } else {
                $('#no_days_taken_painting').addClass('bg-danger');
            }
            /********************************************************************************************************************/
            var cabin_trims_parts = new Date($('#cabin_trims_parts')
                .val()); // start date->Cabin Trims Parts Fitment Completed : repair stage
            var cabin_trims_parts_remarks = new Date($('#cabin_trims_parts_remarks')
                .val()); // end date->Cabin Trims Parts Fitment Completed : repair stage
            var cabin_trims_parts_diff = cabin_trims_parts.getTime() - cabin_trims_parts_remarks.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var cabin_trims = cabin_trims_parts_diff / (1000 * 60 * 60 * 24);
            //No of days taken for Trim the cabin : repair stage - delay analysis
            $('#no_days_taken_cabin').val(Math.round(cabin_trims));
            $('#no_days_taken_cabin').attr('readonly', true);
            if ((major == 'Major' && cabin_trims <= 2) || (major == 'Minor' && cabin_trims <= 1)) {
                $('#no_days_taken_cabin').addClass('bg-success');
            } else {
                $('#no_days_taken_cabin').addClass('bg-danger');
            }
            /*******************************************************************************************************************/
            var receipt_all_parts = new Date($('#receipt_all_parts')
                .val()); //Receipt of all parts from AOR,TOC, Other branch Etc.., : repair stage
            var AOR_raised = new Date($('#AOR_raised').val()); //AOR Raised on : repair stage 
            var receipt_all_parts_diff = receipt_all_parts.getTime() - AOR_raised.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var receipt_all = receipt_all_parts_diff / (1000 * 60 * 60 * 24);
            //Receipt of all parts :  repair stage - delay analysis
            $('#repair_receipt_all_parts').val(Math.round(receipt_all));
            $('#repair_receipt_all_parts').attr('readonly', true);
            /*******************************************************************************************************************/
            var outside_job = new Date($('#outside_job').val()); //start date ->Outside Job : repair stage
            var outside_job_remarks = new Date($('#outside_job_remarks')
                .val()); //end date ->Outside Job : repair stage
            var outside_job_diff = outside_job.getTime() - outside_job_remarks.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var outside = outside_job_diff / (1000 * 60 * 60 * 24);
            //Outside Job : repair stage - delay analysis
            $('#repair_outside_job').val(Math.round(outside));
            $('#repair_outside_job').attr('readonly', true);
            if ((major == 'Major' && outside <= 9) || (major == 'Minor' && outside <= 2)) {
                $('#repair_outside_job').addClass('bg-success');
            } else {
                $('#repair_outside_job').addClass('bg-danger');
            }
            /********************************************************************************************************************/
            var parts_get_approval = new Date($('#intimation_surveyor')
                .val()); //Intimation to surveyor for Supp. inspection : repair stage 
            var Repair_work_start_date = new Date($('#repair_work_start_dealer')
                .val()); //Repair Work Start : repair stage
            var Repair_work_start_date_diff = parts_get_approval.getTime() - Repair_work_start_date.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var Repair_work = Repair_work_start_date_diff / (1000 * 60 * 60 * 24);
            //Delay in intimation to surveyor for supp. Estimate : repair stage - delay analysis
            $('#delay_supp_estimate').val(Math.round(Repair_work));
            $('#delay_supp_estimate').attr('readonly', true);
            /********************************************************************************************************************/
            var supplementary_inspection = new Date($('#supplementary_inspection')
                .val()); //Supplementary Inspection : repair stage
            var intimation_surveyor = new Date($('#intimation_surveyor')
                .val()); //Intimation to surveyor for Supp. inspection : repair stage 
            var delay_report_workshop_dif = supplementary_inspection.getTime() - intimation_surveyor.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var delay_report_workshop = delay_report_workshop_dif / (1000 * 60 * 60 * 24);
            //Delay by the surveyor to report to workshop : repair stage - delay analysis
            $('#delay_report_workshop').val(Math.round(delay_report_workshop));
            $('#delay_report_workshop').attr('readonly', true);
            /*******************************************************************************************************************/
            var supplementary_written_approval = new Date($('#supplementary_written_approval')
                .val()); //Supplementary Written Approval : repair stage
            var delay_approval_supp_est_dif = supplementary_written_approval.getTime() -
                supplementary_inspection
                .getTime();
            //calculate days difference by dividing total milliseconds in a day
            var delay_approval_supp_est = delay_approval_supp_est_dif / (1000 * 60 * 60 * 24);
            //Delay by Surveyor to provide the approval on Supp. Est. : repair stage - delay analysis
            $('#delay_approval_supp_est').val(Math.round(delay_approval_supp_est));
            $('#delay_approval_supp_est').attr('readonly', true);
            /***********************************************************************************************************************/
            var repair_completion = new Date($('#repair_completion')
                .val()); //repair stage->any supplementary required->repair_completion
            var repair_completion_dif = repair_completion.getTime() - Repair_work_start_date.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var repair = repair_completion_dif / (1000 * 60 * 60 * 24);
            //Repair completion (BIBO) : repair stage - delay analysis
            $('#repair_completion_bibo').val(Math.round(repair));
            $('#repair_completion_bibo').attr('readonly', true);
            /*******************************************************************************************************************/
            var parts_get = new Date($('#parts_get_approval')
                .val()); //Parts which not approved need to get approval from customer : repair stage
            var parts_get_approval_diff = parts_get.getTime() - supplementary_written_approval.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var parts_get = parts_get_approval_diff / (1000 * 60 * 60 * 24);
            //Approval delay by the customer : repair stage - delay analysis
            $('#approval_delay_customer').val(Math.round(parts_get));
            $('#approval_delay_customer').attr('readonly', true);
            /*******************************************************************************************************************/
            var aa = $('#delay_start').val();
            var bb = $('#delay_preparing').val();
            var cc = $('#no_days_taken_metal').val();
            var dd = $('#no_days_taken_works').val();
            var ee = $('#no_days_taken_painting').val();
            var ff = $('#no_days_taken_cabin').val();
            var hh = $('#delay_supp_estimate').val();
            var ii = $('#repair_completion_bibo').val();
            var dealer_repair = parseInt(aa) + parseInt(bb) + parseInt(cc) + parseInt(dd) + parseInt(ee) +
                parseInt(
                    ff) + parseInt(hh) + parseInt(ii);
            $('#inform_to_customer_work_completed').val(dealer_repair); //dealer: repair stage - delay analysis
            $('#inform_to_customer_work_completed').attr('readonly', true);
            /*****************************************************************************************************************/
            var approval_delay_customer = $('#approval_delay_customer').val();
            $('#repaire_delay_customer').val(approval_delay_customer); //customer: repair stage - delay analysis
            $('#repaire_delay_customer').attr('readonly', true);
            /******************************************************************************************************************/
            var supaa = $('#delay_report_workshop')
                .val(); //Delay by the surveyor to report to workshop : repair stage - delay analysis
            var supbb = $('#delay_approval_supp_est')
                .val(); //Delay by Surveyor to provide the approval on Supp. Est. : repair stage - delay analysis
            var sup_repair = parseInt(supaa) + parseInt(supbb);
            $('#repaire_surveyor_company').val(
                sup_repair); //Surveyor/Insurance company : repair stage - delay analysis
            $('#repaire_surveyor_company').attr('readonly', true);
            /***************************************End of repair stage - delay analysis**********************************************/


            /////////////////////////////////////////////// Pre Stage, delay analysis section//////////////////////////////////////

            var major = $('#major_minor_dealer').val(); //Major/Minor : pre-approval stage
            var initial_estimate_dealer_date1 = new Date($('#Job_Card_open_date')
                .val()); //general details : job card open date
            var initial_estimate_dealer_date2 = new Date($('#initial_estimate_dealer')
                .val()); //Initial Estimate : pre-approval stage
            var initial_estimate_dealer_diff = initial_estimate_dealer_date2.getTime() -
                initial_estimate_dealer_date1.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var intemation_difference_deler = initial_estimate_dealer_diff / (1000 * 60 * 60 * 24);
            //Delay in prepare the initial estimate by dealer : Pre-approval Stage - delay analysis
            $('#delay_prepare_dealer').val(Math.round(intemation_difference_deler));
            $('#delay_prepare_dealer').attr('readonly', true);
            if ((major == 'Major' && intemation_difference_deler <= 2) || (major == 'Minor' &&
                    intemation_difference_deler <= 1)) {
                $('#delay_prepare_dealer').addClass('bg-success');
            } else {
                $('#delay_prepare_dealer').addClass('bg-danger');
            }
            /******************************************************************************************************************/
            var mailcopy = new Date($('#mail_copy_dealer')
                .val()
            ); // Mail copy which send to Insurance company for surveyor deputation : pre-approval stage
            var mailcopy_diff = mailcopy.getTime() - initial_estimate_dealer_date2.getTime();
            var mailCopyDelay = mailcopy_diff / (1000 * 60 * 60 * 24);
            //Intimation to insurance company for surveyor deputation by dealer : Pre-approval Stage - delay analysis
            $('#surveyor_deputation_dealer').val(Math.round(mailCopyDelay));
            $('#surveyor_deputation_dealer').attr('readonly', true);
            if ((major == 'Major' && mailCopyDelay <= 1) || (major == 'Minor' && mailCopyDelay <= 1)) {
                $('#surveyor_deputation_dealer').addClass('bg-success');
            } else {
                $('#surveyor_deputation_dealer').addClass('bg-danger');
            }
            /*******************************************************************************************************************/
            var surveyor_initial_inspection_dealer = new Date($('#surveyor_initial_inspection_dealer')
                .val()); //Surveyor initial inspection : pre-approval stage
            var intimation_insurance_dealer = new Date($('#intimation_insurance_dealer')
                .val()); //Intimation to insurance company for surveyor deputation : pre-approval stage 
            var delay_deputation_diff = surveyor_initial_inspection_dealer.getTime() -
                intimation_insurance_dealer
                .getTime();
            var delay_deputation = delay_deputation_diff / (1000 * 60 * 60 * 24);
            //Delay in Surveyor deputation from Insurance company : Pre-approval Stage - delay analysis
            $('#delay_surveyor_deputation').val(Math.round(delay_deputation));
            $('#delay_surveyor_deputation').attr('readonly', true);
            if ((major == 'Major' && delay_deputation == 0) || (major == 'Minor' && delay_deputation == 0)) {
                $('#delay_surveyor_deputation').addClass('bg-success');
            } else {
                $('#delay_surveyor_deputation').addClass('bg-danger');
            }
            /*******************************************************************************************************************/
            var dismanting = new Date($('#approval_dismantling_dealer')
                .val()); //Approval for Dismantling :pre-approval stage
            var inspectDealer = new Date($('#surveyor_initial_inspection_dealer')
                .val()); //Surveyor initial inspection : pre-approval stage
            var delay_dismanting_diff = inspectDealer.getTime() - dismanting.getTime();
            var approval_dismantling = delay_dismanting_diff / (1000 * 60 * 60 * 24);
            //Approval for dismantling from surveyor : Pre-approval Stage - delay analysis
            $('#approval_dismantling_surveyor').val(Math.round(approval_dismantling));
            $('#approval_dismantling_surveyor').attr('readonly', true);
            if ((major == 'Major' && approval_dismantling == 0) || (major == 'Minor' && approval_dismantling ==
                    0)) {
                $('#approval_dismantling_surveyor').addClass('bg-success');
            } else {
                $('#approval_dismantling_surveyor').addClass('bg-danger');
            }
            /*******************************************************************************************************************/
            var dismantling_completion_dealer = new Date($('#dismantling_completion_dealer')
                .val()); //Dismantling completion : pre-approval stage
            var approval_dismantling_dealer = new Date($('#approval_dismantling_dealer')
                .val()); //Approval for Dismantling :pre-approval stage
            var delay_dismantling_diff = dismantling_completion_dealer.getTime() - approval_dismantling_dealer
                .getTime();
            var delay_dismantling_completion = delay_dismantling_diff / (1000 * 60 * 60 * 24);
            //Delay in dismantling completion by dealer : Pre-approval Stage - delay analysis
            $('#delay_dismantling_completion').val(Math.round(delay_dismantling_completion));
            $('#delay_dismantling_completion').attr('readonly', true);
            if ((major == 'Major' && delay_dismantling_completion == 0) || (major == 'Minor' &&
                    delay_dismantling_completion == 0)) {
                $('#delay_dismantling_completion').addClass('bg-success');
            } else {
                $('#delay_dismantling_completion').addClass('bg-danger');
            }
            /*******************************************************************************************************************/
            var intimation_surveyor_dealer = new Date($('#intimation_surveyor_dealer')
                .val()); //Intimation to surveyor for Second inspection : pre-approval stage
            var intimation_surveyor_dealer_diff = dismantling_completion_dealer.getTime() -
                intimation_surveyor_dealer.getTime();
            var intimation_to_surveyor_for_second_inspection = intimation_surveyor_dealer_diff / (1000 * 60 *
                60 *
                24);
            //Intimation to surveyor for Second inspection by dealer : Pre-approval Stage - delay analysis
            $('#intimation_to_surveyor_for_second_inspection').val(Math.round(
                intimation_to_surveyor_for_second_inspection));
            $('#intimation_to_surveyor_for_second_inspection').attr('readonly', true);
            if ((major == 'Major' && intimation_to_surveyor_for_second_inspection == 0) || (major == 'Minor' &&
                    intimation_to_surveyor_for_second_inspection == 0)) {
                $('#approval_dismantling_surveyor').addClass('bg-success');
            } else {
                $('#approval_dismantling_surveyor').addClass('bg-danger');
            }
            /*********************************************************************************************************************/
            var surveyor_second_dealer = new Date($('#surveyor_second_dealer')
                .val()); //Surveyor second inspection : pre-approval stage
            var delay_surveyor_completion_diff = intimation_surveyor_dealer.getTime() - surveyor_second_dealer
                .getTime();
            var delay_surveyor_completion = delay_surveyor_completion_diff / (1000 * 60 * 60 * 24);
            //Delay by the surveyor to report to workshop : Pre-approval Stage - delay analysis
            $('#delay_surveyor_completion').val(Math.round(delay_surveyor_completion));
            $('#delay_surveyor_completion').attr('readonly', true);
            if ((major == 'Major' && delay_surveyor_completion <= 1) || (major == 'Minor' &&
                    delay_surveyor_completion <= 0)) {
                $('#delay_surveyor_completion').addClass('bg-success');
            } else {
                $('#delay_surveyor_completion').addClass('bg-danger');
            }
            /*********************************************************************************************************************/
            var surveyor_written_approval_dealer = new Date($('#surveyor_written_approval_dealer')
                .val()); //Surveyor written approval for start of work : pre-approval stage
            var surveyor_written_approval_dealer_diff = surveyor_written_approval_dealer.getTime() -
                surveyor_second_dealer.getTime();
            var surveyor_written_approval = surveyor_written_approval_dealer_diff / (1000 * 60 * 60 * 24);
            //Surveyor approval to start of work : Pre-approval Stage - delay analysis
            $('#surveyor_approval').val(Math.round(surveyor_written_approval));
            $('#surveyor_approval').attr('readonly', true);
            if ((major == 'Major' && surveyor_written_approval <= 1) || (major == 'Minor' &&
                    surveyor_written_approval <= 0)) {
                $('#surveyor_approval').addClass('bg-success');
            } else {
                $('#surveyor_approval').addClass('bg-danger');
            }
            /*******************************************************************************************************************/
            var parts_approved_dealer = new Date($('#parts_approved_dealer')
                .val()); //Parts which not approved need to get approval from customer : pre-approval stage
            var parts_approved_dealer_diff = parts_approved_dealer.getTime() - surveyor_written_approval_dealer
                .getTime();
            var parts_approved = parts_approved_dealer_diff / (1000 * 60 * 60 * 24);
            //Approval delay by the customer : Pre-approval Stage - delay analysis
            $('#approval_delay').val(Math.round(parts_approved));
            $('#approval_delay').attr('readonly', true);
            if ((major == 'Major' && parts_approved <= 1) || (major == 'Minor' && parts_approved <= 0)) {
                $('#approval_delay').addClass('bg-success');
            } else {
                $('#approval_delay').addClass('bg-danger');
            }
            /******************************************************************************************************************/
            var customer_approval_dealer = new Date($('#customer_approval_dealer')
                .val()); //Customer written approval for start of work : pre-approval stage
            var apc_time_dealer = new Date($('#apc_time_dealer')
                .val()); //Advance payment from customer : pre-approval stage
            var advance_payment_delay_diff = customer_approval_dealer.getTime() - apc_time_dealer.getTime();
            var advance_payment_delay = advance_payment_delay_diff / (1000 * 60 * 60 * 24);
            //Advance payment delay by the customer : Pre-approval Stage - delay analysis
            $('#advance_payment_delay').val(Math.round(advance_payment_delay));
            $('#advance_payment_delay').attr('readonly', true);
            if ((major == 'Major' && advance_payment_delay <= 1) || (major == 'Minor' &&
                    advance_payment_delay <=
                    0)) {
                $('#advance_payment_delay').addClass('bg-success');
            } else {
                $('#advance_payment_delay').addClass('bg-danger');
            }
            /********************************************************************************************************************/
            var mail_copy_ad_pymnt_dealer = new Date($('#mail_copy_ad_pymnt_dealer')
                .val()); //Mail copy which send to Insurance company for advance payment : pre-approval stage
            var surveyor_written_approval_dealer = new Date($('#surveyor_written_approval_dealer')
                .val()); //Surveyor written approval for start of work : pre-approval stage
            var surveyor_written_approval_dealer_diff = mail_copy_ad_pymnt_dealer.getTime() -
                surveyor_written_approval_dealer.getTime();
            var surveyor_written_approval = surveyor_written_approval_dealer_diff / (1000 * 60 * 60 * 24);
            //Delay in intimation to Insurance company for advance payment : Pre-approval Stage - delay analysis
            $('#delay_intimation_nsurance').val(Math.round(surveyor_written_approval));
            $('#delay_intimation_nsurance').attr('readonly', true);
            if ((major == 'Major' && surveyor_written_approval == 0) || (major == 'Minor' &&
                    surveyor_written_approval == 0)) {
                $('#delay_intimation_nsurance').addClass('bg-success');
            } else {
                $('#delay_intimation_nsurance').addClass('bg-danger');
            }
            /******************************************************************************************************************/
            var api_time_dealer = new Date($('#api_time_dealer')
                .val()); //Advance payment from Insurance : pre-approval stage
            var intimation_insurance_dealer_adv = new Date($('#intimation_insurance_dealer_adv')
                .val()); //Intimation to insurance company for advance payment : pre-approval stage
            var advance_payment_delay_ins_diff = api_time_dealer.getTime() - intimation_insurance_dealer_adv
                .getTime();
            var advance_paymen = advance_payment_delay_ins_diff / (1000 * 60 * 60 * 24);
            //Advance payment delay by the Insurance : Pre-approval Stage - delay analysis
            $('#advance_payment_delay_ins').val(Math.round(advance_paymen));
            $('#advance_payment_delay_ins').attr('readonly', true);
            if ((major == 'Major' && advance_paymen <= 2) || (major == 'Minor' && advance_paymen <= 0)) {
                $('#advance_payment_delay_ins').addClass('bg-success');
            } else {
                $('#advance_payment_delay_ins').addClass('bg-danger');
            }
            /*******************************************************************************************************************/
            let x = $('#delay_prepare_dealer')
                .val(); //Delay in prepare the initial estimate by dealer : Pre-approval Stage - delay analysis
            let y = $('#surveyor_deputation_dealer')
                .val(); //Intimation to insurance company for surveyor deputation by dealer : Pre-approval Stage - delay analysis
            let z = $('#delay_dismantling_completion')
                .val(); //Delay in dismantling completion by dealer : Pre-approval Stage - delay analysis
            let zz = $('#intimation_to_surveyor_for_second_inspection')
                .val(); //Intimation to surveyor for Second inspection by dealer : Pre-approval Stage - delay analysis
            let dealer = parseInt(x) + parseInt(y) + parseInt(z) + parseInt(zz);
            $('#pre_delay_dealer').val(Math.round(dealer)); //dealer : pre-approval stage - delay analysis
            $('#pre_delay_dealer').attr('readonly', true);
            /**************************************************************************************************************************/
            let cx = $('#approval_delay').val();
            let cy = $('#advance_payment_delay').val();
            let customer = parseInt(cx) + parseInt(cy);
            $('#pre_delay_customer').val(Math.round(customer)); //customer : pre-approval stage - delay analysis
            $('#pre_delay_customer').attr('readonly', true);
            /******************************************************************************************************************/
            let cs = $('#delay_surveyor_deputation').val();
            let ys = $('#approval_dismantling_surveyor').val();
            let zs = $('#delay_dismantling_completion').val();
            let zzs = $('#surveyor_approval').val();
            let zzzs = $('#advance_payment_delay_ins').val();
            let supervisor = parseInt(cs) + parseInt(ys) + parseInt(zs) + parseInt(zzs) + parseInt(zzzs);
            $('#pre_surveyor_company').val(Math.round(
                supervisor)); //Surveyor/Insurance company : pre-approval stage - delay analysis
            $('#pre_surveyor_company').attr('readonly', true);
            /**************************************End of pre-approval stage - delay analysis****************************************/


            $('#Repair_work_start_date_reason').hide();
            $('#Final_inspection_date_reason').hide();
            $('#Repair_completion_date_reason').hide();
            $('#Intimation_2_IC_for_surveyor_deputation_reason').hide();
            $('#Written_work_order_approval_2_start_work_reason').hide();
            $('#Customer_written_approval_2_start_of_wor_reason').hide();
            $('#Advance_payment_received_onCustomer_reason').hide();

            if ($('#Intimation_2_IC_for_surveyor_deputation_reason').val()) {
                $('#Intimation_2_IC_for_surveyor_deputation_reason').show();
            }
            if ($('#Written_work_order_approval_2_start_work_reason').val()) {
                $('#Written_work_order_approval_2_start_work_reason').show();
            }
            if ($('#Customer_written_approval_2_start_of_wor_reason').val()) {
                $('#Customer_written_approval_2_start_of_wor_reason').show();
            }
            if ($('#Advance_payment_received_onCustomer_reason').val()) {
                $('#Advance_payment_received_onCustomer_reason').show();
            }
            if ($('#Repair_completion_date_reason').val()) {
                $('#Repair_completion_date_reason').show();
            }
            if ($('#Final_inspection_date_reason').val()) {
                $('#Final_inspection_date_reason').show();
            }
            if ($('#Repair_work_start_date_reason').val()) {
                $('#Repair_work_start_date_reason').show();
            }

            var Mode_of_Claim = "{{ $data[0]->Mode_of_Claim }}";
            if (Mode_of_Claim == 'Customer') {
                $('.hide').hide();
            } else {
                $('.hide').show();
            }

            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            var stage = "{{ $data[0]->stage }}";
            var remarks = "{{ $data[0]->remarks }}";
            $.ajax({
                url: '{{ url('get-remarks-data') }}',
                type: "GET",
                data: {
                    'val': stage
                },
                success: function(response) {
                    console.log(response);
                    var Result = response.split(",");
                    var str = '';
                    Result.pop();
                    str += "<option value='NA'>--Select--</option>";
                    for (item1 in Result) {
                        var Result2 = Result[item1].split("~~");
                        if (remarks != '') {
                            if (Result2[1] == remarks) {
                                str += "<option value='" + Result2[1] + "' selected>" + Result2[1] +
                                    "</option>";
                            } else {
                                str += "<option value='" + Result2[1] + "'>" + Result2[1] +
                                    "</option>";
                            }
                        } else {
                            str += "<option value='" + Result2[1] + "'>" + Result2[1] + "</option>";
                        }
                    }
                    document.getElementById('remarks').innerHTML = str;
                }
            });

        });

        /*********************************************************************************************************************/
        function changeAcc(slug) {
            var jobCard = $('#Job_Card_open_date').val(); //general details : job card open date
            var date1 = new Date(jobCard);
            var intemationdate = new Date($('#Intimation_2_IC_for_surveyor_deputation')
                .val()); //Intimation 2 IC for surveyor deputation: pre-approval stage
            var intetime_difference = intemationdate.getTime() - date1.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var intemation_difference = intetime_difference / (1000 * 60 * 60 * 24);

            if (slug == 'Major') {
                if (intemation_difference <= 2) {
                    $('#Intimation_2_IC_for_surveyor_deputation_reason').hide();
                    $('#label').removeClass('text-danger').addClass('text-success');
                    $('#Intimation_2_IC_for_surveyor_deputation').removeClass('is-invalid');
                } else {
                    $('#Intimation_2_IC_for_surveyor_deputation_reason').show();
                    $('#label').removeClass('text-success').addClass('text-danger');
                    $('#Intimation_2_IC_for_surveyor_deputation').addClass('is-invalid');
                }
            }
            if (slug == 'Minor') {
                if (intemation_difference <= 1) {
                    $('#Intimation_2_IC_for_surveyor_deputation_reason').hide();
                    $('#label').removeClass('text-danger').addClass('text-success');
                    $('#Intimation_2_IC_for_surveyor_deputation').removeClass('is-invalid');
                } else {
                    $('#Intimation_2_IC_for_surveyor_deputation_reason').show();
                    $('#label').removeClass('text-success').addClass('text-danger');
                    $('#Intimation_2_IC_for_surveyor_deputation').addClass('is-invalid');
                }
            }
            /**********************************************************************************************************************/
            var workdate = new Date($('#Written_work_order_approval_2_start_work').val());
            var writtime_difference = workdate.getTime() - date1.getTime();
            /*var date1 = new Date(jobCard); var jobCard = $('#Job_Card_open_date').val();  general details : job card open date */

            //calculate days difference by dividing total milliseconds in a day
            var written_difference = writtime_difference / (1000 * 60 * 60 * 24);
            if (slug == 'Major') {
                if (written_difference <= 6) {
                    $('#work').removeClass('text-danger').addClass('text-success');
                    $('#Written_work_order_approval_2_start_work').removeClass('is-invalid');
                    $('#Written_work_order_approval_2_start_work_reason').hide();
                } else {
                    $('#work').removeClass('text-success').addClass('text-danger');
                    $('#Written_work_order_approval_2_start_work').addClass('is-invalid');
                    $('#Written_work_order_approval_2_start_work_reason').show();
                }
            }
            if (slug == 'Minor') {
                if (written_difference <= 3) {
                    $('#work').removeClass('text-danger').addClass('text-success');
                    $('#Written_work_order_approval_2_start_work').removeClass('is-invalid');
                    $('#Written_work_order_approval_2_start_work_reason').hide();
                } else {
                    $('#work').removeClass('text-success').addClass('text-danger');
                    $('#Written_work_order_approval_2_start_work').addClass('is-invalid');
                    $('#Written_work_order_approval_2_start_work_reason').show();
                }
            }
            /***********************************************************************************************************************/
            var finaldate = new Date(('#Final_inspection_date_reason').val());
            var finaltime_difference = finaldate.getTime() - date1.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var final_difference = finaltime_difference / (1000 * 60 * 60 * 24);
            if (slug == 'Major') {
                if (final_difference <= 26) {
                    $('#Final_inspection_date_reason').hide();
                    $('#final').removeClass('text-danger').addClass('text-success');
                    $('#Final_inspection_date').removeClass('is-invalid');
                } else {
                    $('#Final_inspection_date_reason').show();
                    $('#final').removeClass('text-success').addClass('text-danger');
                    $('#Final_inspection_date').addClass('is-invalid');
                }
            }
            if (slug == 'Minor') {
                if (final_difference <= 16) {
                    $('#Final_inspection_date_reason').hide();
                    $('#final').removeClass('text-danger').addClass('text-success');
                    $('#Final_inspection_date').removeClass('is-invalid');
                } else {
                    $('#Final_inspection_date_reason').show();
                    $('#final').removeClass('text-success').addClass('text-danger');
                    $('#Final_inspection_date').addClass('is-invalid');
                }
            }
            /*********************************************************************************************************************************/
            var advanceDate = new Date($('#Advance_payment_received_onCustomer').val());
            var advancetime_difference = advanceDate.getTime() - date1.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var advance_difference = advancetime_difference / (1000 * 60 * 60 * 24);
            if (slug == 'Major') {
                if (advance_difference <= 5) {
                    $('#advance').removeClass('text-danger').addClass('text-success');
                    $('#Advance_payment_received_onCustomer').removeClass('is-invalid');
                    $('#Advance_payment_received_onCustomer_reason').hide();
                } else {
                    $('#Advance_payment_received_onCustomer_reason').show();
                    $('#advance').removeClass('text-success').addClass('text-danger');
                    $('#Advance_payment_received_onCustomer').addClass('is-invalid');
                }
            }
            if (slug == 'Minor') {
                if (advance_difference <= 2) {
                    $('#advance').removeClass('text-danger').addClass('text-success');
                    $('#Advance_payment_received_onCustomer').removeClass('is-invalid');
                    $('#Advance_payment_received_onCustomer_reason').hide();
                } else {
                    $('#Advance_payment_received_onCustomer_reason').show();
                    $('#advance').removeClass('text-success').addClass('text-danger');
                    $('#Advance_payment_received_onCustomer').addClass('is-invalid');
                }
            }
            /*********************************************************************************************************************/
            var repairDate = new Date($('#Repair_completion_date').val());
            var repairtime_difference = repairDate.getTime() - date1.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var repairdays_difference = repairtime_difference / (1000 * 60 * 60 * 24);
            if (slug == 'Major') {
                if (repairdays_difference <= 30) {
                    $('#repair').removeClass('text-danger').addClass('text-success');
                    $('#Repair_completion_date').removeClass('is-invalid');
                    $('#Repair_completion_date_reason').hide();
                } else {
                    $('#Repair_completion_date_reason').show();
                    $('#repair').removeClass('text-success').addClass('text-danger');
                    $('#Repair_completion_date').addClass('is-invalid');
                }
            }
            if (slug == 'Minor') {
                if (repairdays_difference <= 15) {
                    $('#repair').removeClass('text-danger').addClass('text-success');
                    $('#Repair_completion_date').removeClass('is-invalid');
                    $('#Repair_completion_date_reason').hide();
                } else {
                    $('#Repair_completion_date_reason').show();
                    $('#repair').removeClass('text-success').addClass('text-danger');
                    $('#Repair_completion_date').addClass('is-invalid');
                }
            }
            /*******************************************************************************************************************/
            var repairStart = new Date($('#Repair_work_start_date').val());
            var starttime_difference = repairStart.getTime() - date1.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var startdays_difference = starttime_difference / (1000 * 60 * 60 * 24);
            if (slug == 'Major') {
                if (startdays_difference <= 6) {
                    $('#startRe').removeClass('text-danger').addClass('text-success');
                    $('#Repair_work_start_date').removeClass('is-invalid');
                    $('#Repair_work_start_date_reason').hide();
                } else {
                    $('#Repair_work_start_date_reason').show();
                    $('#startRe').removeClass('text-success').addClass('text-danger');
                    $('#Repair_work_start_date').addClass('is-invalid');
                }
            }
            if (slug == 'Minor') {
                if (startdays_difference <= 4) {
                    $('#startRe').removeClass('text-danger').addClass('text-success');
                    $('#Repair_work_start_date').removeClass('is-invalid');
                    $('#Repair_work_start_date_reason').hide();
                } else {
                    $('#Repair_work_start_date_reason').show();
                    $('#startRe').removeClass('text-success').addClass('text-danger');
                    $('#Repair_work_start_date').addClass('is-invalid');
                }
            }
            /*********************************************************************************************************************/
            var customer_written = new Date($('#Customer_written_approval_2_start_of_wor').val());
            var customertime_difference = customer_written.getTime() - date1.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var customerdays_difference = customertime_difference / (1000 * 60 * 60 * 24);
            if (slug == 'Major') {
                if (customerdays_difference <= 6) {
                    $('#Customer_written_approval_2_start_of_wor_reason').hide();
                    $('#customerApproval').removeClass('text-danger').addClass('text-success');
                    $('#Customer_written_approval_2_start_of_wor').removeClass('is-invalid');
                } else {
                    $('#Customer_written_approval_2_start_of_wor_reason').show();
                    $('#customerApproval').removeClass('text-success').addClass('text-danger');
                    $('#Customer_written_approval_2_start_of_wor').addClass('is-invalid');
                }
            }
            if (slug == 'Minor') {
                if (customerdays_difference <= 3) {
                    $('#Customer_written_approval_2_start_of_wor_reason').hide();
                    $('#customerApproval').removeClass('text-danger').addClass('text-success');
                    $('#Customer_written_approval_2_start_of_wor').removeClass('is-invalid');
                } else {
                    $('#Customer_written_approval_2_start_of_wor_reason').show();
                    $('#customerApproval').removeClass('text-success').addClass('text-danger');
                    $('#Customer_written_approval_2_start_of_wor').addClass('is-invalid');
                }
            }

        }
        /**********************************************************************************************************************/
        function intemationDate(intemationDate) {
            var jobCard = $('#Job_Card_open_date').val();
            var slug = $('#Major_Minor__Final_bill').val();
            var date1 = new Date(jobCard);
            var date2 = new Date(intemationDate);
            var time_difference = date2.getTime() - date1.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var days_difference = time_difference / (1000 * 60 * 60 * 24);
            if (slug == 'Major') {
                if (days_difference <= 2) {
                    $('#Intimation_2_IC_for_surveyor_deputation_reason').hide();
                    $('#label').removeClass('text-danger').addClass('text-success');
                    $('#Intimation_2_IC_for_surveyor_deputation').removeClass('is-invalid');
                } else {
                    $('#Intimation_2_IC_for_surveyor_deputation_reason').show();
                    $('#label').removeClass('text-success').addClass('text-danger');
                    $('#Intimation_2_IC_for_surveyor_deputation').addClass('is-invalid');
                }
            }
            if (slug == 'Minor') {

                if (days_difference <= 1) {
                    $('#Intimation_2_IC_for_surveyor_deputation_reason').hide();
                    $('#label').removeClass('text-danger').addClass('text-success');
                    $('#Intimation_2_IC_for_surveyor_deputation').removeClass('is-invalid');
                } else {
                    $('#Intimation_2_IC_for_surveyor_deputation_reason').show();
                    $('#label').removeClass('text-success').addClass('text-danger');
                    $('#Intimation_2_IC_for_surveyor_deputation').addClass('is-invalid');
                }
            }
        }
        /***********************************************************************************************************************/
        function writtenWork(work) {
            var jobCard = $('#Job_Card_open_date').val();
            var slug = $('#Major_Minor__Final_bill').val();
            var date1 = new Date(jobCard);
            var date2 = new Date(work);
            var time_difference = date2.getTime() - date1.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var days_difference = time_difference / (1000 * 60 * 60 * 24);
            if (slug == 'Major') {
                if (days_difference <= 6) {
                    $('#work').removeClass('text-danger').addClass('text-success');
                    $('#Written_work_order_approval_2_start_work').removeClass('is-invalid');
                    $('#Written_work_order_approval_2_start_work_reason').hide();
                } else {
                    $('#work').removeClass('text-success').addClass('text-danger');
                    $('#Written_work_order_approval_2_start_work').addClass('is-invalid');
                    $('#Written_work_order_approval_2_start_work_reason').show();
                }
            }
            if (slug == 'Minor') {
                if (days_difference <= 3) {
                    $('#work').removeClass('text-danger').addClass('text-success');
                    $('#Written_work_order_approval_2_start_work').removeClass('is-invalid');
                    $('#Written_work_order_approval_2_start_work_reason').hide();
                } else {
                    $('#work').removeClass('text-success').addClass('text-danger');
                    $('#Written_work_order_approval_2_start_work').addClass('is-invalid');
                    $('#Written_work_order_approval_2_start_work_reason').show();
                }
            }
        }
        /**********************************************************************************************************************/
        function finalinspection(final) {
            var jobCard = $('#Job_Card_open_date').val();
            var slug = $('#Major_Minor__Final_bill').val();
            var date1 = new Date(jobCard);
            var date2 = new Date(final);
            var time_difference = date2.getTime() - date1.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var days_difference = time_difference / (1000 * 60 * 60 * 24);
            if (slug == 'Major') {
                if (days_difference <= 26) {
                    $('#Final_inspection_date_reason').hide();
                    $('#final').removeClass('text-danger').addClass('text-success');
                    $('#Final_inspection_date').removeClass('is-invalid');
                } else {
                    $('#Final_inspection_date_reason').show();
                    $('#final').removeClass('text-success').addClass('text-danger');
                    $('#Final_inspection_date').addClass('is-invalid');
                }
            }
            if (slug == 'Minor') {
                if (days_difference <= 16) {
                    $('#Final_inspection_date_reason').hide();
                    $('#final').removeClass('text-danger').addClass('text-success');
                    $('#Final_inspection_date').removeClass('is-invalid');
                } else {
                    $('#Final_inspection_date_reason').show();
                    $('#final').removeClass('text-success').addClass('text-danger');
                    $('#Final_inspection_date').addClass('is-invalid');
                }
            }
        }
        /***********************************************************************************************************************/
        function advancePayment(advancePayment) //Advance payment received on(Customer) : pre-approval stage
        {
            var jobCard = $('#Job_Card_open_date').val();
            var slug = $('#Major_Minor__Final_bill').val();
            var date1 = new Date(jobCard);
            var date2 = new Date(advancePayment);
            var time_difference = date2.getTime() - date1.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var days_difference = time_difference / (1000 * 60 * 60 * 24);
            if (slug == 'Major') {
                if (days_difference <= 5) {
                    $('#advance').removeClass('text-danger').addClass('text-success');
                    $('#Advance_payment_received_onCustomer').removeClass('is-invalid');
                    $('#Advance_payment_received_onCustomer_reason').hide();
                } else {
                    $('#Advance_payment_received_onCustomer_reason').show();
                    $('#advance').removeClass('text-success').addClass('text-danger');
                    $('#Advance_payment_received_onCustomer').addClass('is-invalid');
                }
            }
            if (slug == 'Minor') {
                if (days_difference <= 2) {
                    $('#advance').removeClass('text-danger').addClass('text-success');
                    $('#Advance_payment_received_onCustomer').removeClass('is-invalid');
                    $('#Advance_payment_received_onCustomer_reason').hide();
                } else {
                    $('#Advance_payment_received_onCustomer_reason').show();
                    $('#advance').removeClass('text-success').addClass('text-danger');
                    $('#Advance_payment_received_onCustomer').addClass('is-invalid');
                }
            }
        }
        /***********************************************************************************************************************/
        function repairDate(date) {
            var jobCard = $('#Job_Card_open_date').val();
            var slug = $('#Major_Minor__Final_bill').val();
            var date1 = new Date(jobCard);
            var date2 = new Date(date);
            var time_difference = date2.getTime() - date1.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var days_difference = time_difference / (1000 * 60 * 60 * 24);
            if (slug == 'Major') {
                if (days_difference <= 30) {
                    $('#repair').removeClass('text-danger').addClass('text-success');
                    $('#Repair_completion_date').removeClass('is-invalid');
                    $('#Repair_completion_date_reason').hide();
                } else {
                    $('#Repair_completion_date_reason').show();
                    $('#repair').removeClass('text-success').addClass('text-danger');
                    $('#Repair_completion_date').addClass('is-invalid');
                }
            }
            if (slug == 'Minor') {
                if (days_difference <= 15) {
                    $('#repair').removeClass('text-danger').addClass('text-success');
                    $('#Repair_completion_date').removeClass('is-invalid');
                    $('#Repair_completion_date_reason').hide();
                } else {
                    $('#Repair_completion_date_reason').show();
                    $('#repair').removeClass('text-success').addClass('text-danger');
                    $('#Repair_completion_date').addClass('is-invalid');
                }
            }
        }
        /**********************************************************************************************************************/
        function repairStart(date) {
            var jobCard = $('#Job_Card_open_date').val();
            var slug = $('#Major_Minor__Final_bill').val();
            var date1 = new Date(jobCard);
            var date2 = new Date(date);
            var time_difference = date2.getTime() - date1.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var days_difference = time_difference / (1000 * 60 * 60 * 24);
            if (slug == 'Major') {
                if (days_difference <= 6) {
                    $('#startRe').removeClass('text-danger').addClass('text-success');
                    $('#Repair_work_start_date').removeClass('is-invalid');
                    $('#Repair_work_start_date_reason').hide();
                } else {
                    $('#Repair_work_start_date_reason').show();
                    $('#startRe').removeClass('text-success').addClass('text-danger');
                    $('#Repair_work_start_date').addClass('is-invalid');
                }
            }
            if (slug == 'Minor') {
                if (days_difference <= 4) {
                    $('#startRe').removeClass('text-danger').addClass('text-success');
                    $('#Repair_work_start_date').removeClass('is-invalid');
                    $('#Repair_work_start_date_reason').hide();
                } else {
                    $('#Repair_work_start_date_reason').show();
                    $('#startRe').removeClass('text-success').addClass('text-danger');
                    $('#Repair_work_start_date').addClass('is-invalid');
                }
            }
        }
        /***************************************************************************************************************************/
        function customerApproval(date) {
            var jobCard = $('#Job_Card_open_date').val();
            var slug = $('#Major_Minor__Final_bill').val();
            var date1 = new Date(jobCard);
            var date2 = new Date(date);
            var time_difference = date2.getTime() - date1.getTime();
            //calculate days difference by dividing total milliseconds in a day
            var days_difference = time_difference / (1000 * 60 * 60 * 24);
            if (slug == 'Major') {
                if (days_difference <= 6) {
                    $('#Customer_written_approval_2_start_of_wor_reason').hide();
                    $('#customerApproval').removeClass('text-danger').addClass('text-success');
                    $('#Customer_written_approval_2_start_of_wor').removeClass('is-invalid');
                } else {
                    $('#Customer_written_approval_2_start_of_wor_reason').show();
                    $('#customerApproval').removeClass('text-success').addClass('text-danger');
                    $('#Customer_written_approval_2_start_of_wor').addClass('is-invalid');
                }
            }
            if (slug == 'Minor') {
                if (days_difference <= 3) {
                    $('#Customer_written_approval_2_start_of_wor_reason').hide();
                    $('#customerApproval').removeClass('text-danger').addClass('text-success');
                    $('#Customer_written_approval_2_start_of_wor').removeClass('is-invalid');
                } else {
                    $('#Customer_written_approval_2_start_of_wor_reason').show();
                    $('#customerApproval').removeClass('text-success').addClass('text-danger');
                    $('#Customer_written_approval_2_start_of_wor').addClass('is-invalid');
                }
            }
        }
        /***********************************************************************************************************************/
        function checkAll() {
            var Mode_of_Claim = "{{ $data[0]->Mode_of_Claim }}";
            var Intimation_2_customer_for_advance_paymen = $('#Intimation_2_customer_for_advance_paymen').val();
            var Advance_payment_received_onCustomer = $('#Advance_payment_received_onCustomer').val();
            var Advance_payment_Value_RsCustomer = $('#Advance_payment_Value_RsCustomer').val();
            var Customer_written_approval_2_start_of_wor = $('#Customer_written_approval_2_start_of_wor').val();
            var Repair_work_start_date = $('#Repair_work_start_date').val();
            var Repair_completion_date = $('#Repair_completion_date').val();
            var Surveyor_Name = $('#Surveyor_Name').val();
            var Surveyor_Mobile_no = $('#Surveyor_Mobile_no').val();
            var Registration_of_certificate_upload = $('#Registration_of_certificate_upload').val();
            var National_Permit_A_B_upload = $('#National_Permit_A_B_upload').val();
            var Road_Tax_upload = $('#Road_Tax_upload').val();
            var Claim_Form_upload = $('#Claim_Form_upload').val();
            var Intimation_2_IC_for_surveyor_deputation = $('#Intimation_2_IC_for_surveyor_deputation').val();
            var Surveyor_initial_inspection_date = $('#Surveyor_initial_inspection_date').val();
            var Salvage_value_agreed_by_Customer_Ins_co = $('#Salvage_value_agreed_by_Customer_Ins_co').val();
            var Written_work_order_approval_2_start_work = $('#Written_work_order_approval_2_start_work').val();
            var Intimation_to_IC_for_final_inspection = $('#Intimation_to_IC_for_final_inspection').val();
            var Final_inspection_date = $('#Final_inspection_date').val();
            if (Mode_of_Claim == 'Customer') {
                if (Intimation_2_customer_for_advance_paymen == '' || Advance_payment_received_onCustomer == '' ||
                    Advance_payment_Value_RsCustomer == '' || Customer_written_approval_2_start_of_wor == '' ||
                    Repair_work_start_date == '' || Repair_completion_date == '') {
                    $('#Completed').hide();
                } else {
                    $('#Completed').show();
                }
            } else {
                if (Intimation_2_customer_for_advance_paymen == '' || Advance_payment_received_onCustomer == '' ||
                    Advance_payment_Value_RsCustomer == '' || Customer_written_approval_2_start_of_wor == '' ||
                    Repair_work_start_date == '' || Repair_completion_date == '' ||
                    Surveyor_Name == '' || Surveyor_Mobile_no == '' || Registration_of_certificate_upload == '' ||
                    National_Permit_A_B_upload == '' || Road_Tax_upload == '' || Claim_Form_upload == '' ||
                    Intimation_2_IC_for_surveyor_deputation == '' || Surveyor_initial_inspection_date == '' ||
                    Salvage_value_agreed_by_Customer_Ins_co == '' || Written_work_order_approval_2_start_work ==
                    '' ||
                    Intimation_to_IC_for_final_inspection == '' || Final_inspection_date == '') {
                    $('#Completed').hide();
                } else {
                    $('#Completed').show();
                }

            }
        }

        $(document).on('input', '#Surveyor_Mobile_no', function() {
            var phone = $('#Surveyor_Mobile_no').val();
            if (phone.indexOf('0') == 0) {
                $('#Surveyor_Mobile_no').val('');
            }
            if (phone.indexOf('1') == 0) {
                $('#Surveyor_Mobile_no').val('');
            }
            if (phone.indexOf('2') == 0) {
                $('#Surveyor_Mobile_no').val('');
            }
        });

        function stageFun(param) {
            var val = param.value;
            var Repair_work_start_date = $('#Repair_work_start_date').val();
            var Repair_completion_date = $('#Repair_completion_date').val();
            var ell = '';
            $.ajax({
                url: '{{ url('get-remarks-data') }}',
                type: "GET",
                data: {
                    'val': val
                },
                success: function(response) {
                    console.log(response);
                    var Result = response.split(",");
                    var str = '';
                    Result.pop();
                    str += "<option value='NA'>--Select--</option>";
                    for (item1 in Result) {
                        var Result2 = Result[item1].split("~~");
                        if (ell != '') {
                            if (Result2[0] == ell) {
                                str += "<option value='" + Result2[1] + "' selected>" + Result2[1] +
                                    "</option>";
                            } else {
                                str += "<option value='" + Result2[1] + "'>" + Result2[1] + "</option>";
                            }
                        } else {
                            str += "<option value='" + Result2[1] + "'>" + Result2[1] + "</option>";
                        }
                    }
                    document.getElementById('remarks').innerHTML = str;
                }
            });
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <div id="pageloader">
        <img src="http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif"
            alt="processing..." />
    </div>
    <script src="{{ asset('js/tab.js') }}"></script>

@endsection
