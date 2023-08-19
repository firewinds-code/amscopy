 @extends("layouts.masterlayout")
@section('title', 'Create Complaint')
<link rel="stylesheet" href="{{asset('css/tab.css')}}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

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
<?php $data = App\Models\case_detail_infos::where('id',  base64_decode(Request::input('id')))->get();
$btype = Request::input('btype');
?>
<div class="content-wrapper mobcss">

            <div id="pageloader">
                <img src="http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif" alt="processing..." />
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="clear"></div>
                            <h4 class="card-title">Create Complaint</h4>
                            <!-- @if($btype=='update') -->
                            <!-- <form name="myForm" method="post" id="myForm" enctype="multipart/form-data" action="{{ url('update-complaint') }}"> -->

                            <!-- @else -->
                            <!-- { -->
                            <form name="myForm" method="post" id="myForm" enctype="multipart/form-data">
                                <!-- } -->
                                <!-- @endif -->

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label>Veh Reg No.</label>
                                        <input type="text" name="veh_reg_no" id="veh_reg_no" class="form-control" readonly value="{{ $data[0]->Veh_Reg_No}}" />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Chassis Number</label>
                                        <input type="text" name="chassis_number" id="chassis_number" class="form-control" readonly value="{{ $data[0]->Chassis_Number }}" />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Engine No </label>
                                        <input type="text" name="engine_no" id="engine_no" class="form-control" readonly value="{{ $data[0]->Engine_No }}" />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Owner/ Customer Name </label>
                                        <input type="text" name="customer_name " id="customer_name " class="form-control" value="{{ $data[0]->Owner_Customer_Name }}" readonly />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Job Card No</label>
                                        <input type="text" name="job_card_no" id="job_card_no" class="form-control" readonly value="{{ $data[0]->Job_Card_No }}" />
                                    </div>
                                </div>
                                
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                                <br>
                                <hr>
                                <div class="tab">
                                    <h5><b>Vehicle Details:</b></h5>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label>Veh Reg No.</label>
                                            <input type="text" name="veh_reg_no" id="veh_reg_no" class="form-control" value="{{ $data[0]->Veh_Reg_No}}" readonly />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Verified in Vahan </label>
                                            <input type="text" name="verified_in_vahan" id="verified_in_vahan" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Model</label>
                                            <input type="text" name="model" id="model" class="form-control" readonly value="{{ $data[0]->Model}}" />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>BS6/Non BS6</label>
                                            <input type="text" name="bs_nonbs" id="bs_nonbs" class="form-control" readonly value="{{ $data[0]->BS6_Non_BS6 }}" />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Chassis Number </label>
                                            <input type="text" name="chassis_number" id="chassis_number" class="form-control" value="{{ $data[0]->Chassis_Number }}" readonly />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Engine No</label>
                                            <input type="text" name="engine_no" id="engine_no" class="form-control" value="{{ $data[0]->Engine_No}}" readonly />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Date of Sale</label>
                                            <input type="text" name="date_of_sale" id="date_of_sale" class="form-control" readonly value="{{ $data[0]->Date_of_Sale}}" />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Segment</label>
                                            <input type="text" name="segment" id="segment" class="form-control" readonly value="{{ $data[0]->Segment }}" />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Name of the Insurance </label>
                                            <input type="text" name="name_of_the_insurance" id="name_of_the_insurance" class="form-control" readonly value="{{ $data[0]->Name_of_the_Insurance }}" />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Insurance Policy No.</label>
                                            <input type="text" name="insurance_policy_no" id="insurance_policy_no" class="form-control" readonly value="{{ $data[0]->Insurance_Policy_No}}" />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Owner/ Customer Name </label>
                                            <input type="text" name="customer_name" id="customer_name" class="form-control" readonly value="{{ $data[0]->Owner_Customer_Name }}" />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Owner/ Customer Contact </label>
                                            <input type="text" name="customer_contact" id="customer_contact" class="form-control" value="{{ $data[0]->Owner_Customer_Name_Mobile_No}}" />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Driver Name</label>
                                            <input type="text" name="driver_name" id="driver_name" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Driver Contact No</label>
                                            <input type="text" name="driver_contact_no" id="driver_contact_no" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Driving License Number </label>
                                            <input type="text" name="driving_license_number" id="driving_license_number" class="form-control" />
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>DL Validity Date</label>
                                            <input type="text" name="DL_validity_date" id="DL_validity_date" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Driver statement</label>
                                            <textarea name="driver_statement" id="driver_statement" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Date of Accident </label>
                                            <input type="text" name="date_of_accident" id="date_of_accident" class="form-control" value="{{ $data[0]->Date_of_Accident }}" readonly />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Location of the accident</label>
                                            <input type="text" name="location_of_the_accident" id="location_of_the_accident" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Mode of Claims</label>
                                            <select name="mode_of_claims" id="mode_of_claims" class="form-control" readonly>
                                                <option>--Select--</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>

                                        <input type="hidden" name="ref_id" id="ref_id">
                                        <div class="form-group col-md-2">
                                            <label>Other than AL fitment, what extra fitted by Customer</label>
                                            <input type="text" name="AL_fitment" id="AL_fitment" class="form-control" />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Wood Cabin Load body modification Extra leaf spring </label>
                                            <input type="text" name="wood_cabin_load" id="wood_cabin_load" class="form-control" />
                                        </div>
                                    </div><br>
            
                                </div>
                                <br />
                                <hr>


                                <h5><b>Question:</b></h5>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Is 3rd party involved?</label>
                                                <select name="third_party" id="third_party" class="form-control">
                                                    <option>--Select--</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Dealer</label>
                                                <input type="text" name="third_party_dealer" id="third_party_dealer" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Customer</label>
                                                <input type="text" name="third_party_customer" id="third_party_customer" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>At time of accident vehicle loaded</label>
                                                <select name="accident_vehicle" id="accident_vehicle" class="form-control">
                                                    <option>--Select--</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Dealer</label>
                                                <input type="text" name="accident_vehicle_dealer" id="accident_vehicle_dealer" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Customer</label>
                                                <input type="text" name="accident_vehicle_customer" id="accident_vehicle_customer" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Any thermal incident</label>
                                                <select name="thermal_incident" id="thermal_incident" class="form-control">
                                                    <option>--Select--</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Dealer</label>
                                                <input type="text" name="thermal_incident_dealer" id="thermal_incident_dealer" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Customer</label>
                                                <input type="text" name="thermal_incident_customer" id="thermal_incident_customer" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Whether Vehicle towed to workshop</label>
                                                <select name="Vehicle_towed" id="Vehicle_towed" class="form-control">
                                                    <option>--Select--</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Dealer</label>
                                                <input type="text" name="Vehicle_towed_dealer" id="Vehicle_towed_dealer" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Customer</label>
                                                <input type="text" name="Vehicle_towed_customer" id="Vehicle_towed_customer" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Theft cases only</label>
                                                <select name="theft_cases" id="theft_cases" class="form-control">
                                                    <option>--Select--</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Dealer</label>
                                                <input type="text" name="theft_cases_dealer" id="theft_cases_dealer" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Customer</label>
                                                <input type="text" name="theft_cases_customer" id="theft_cases_customer" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Third Party Loss/ Damage/Theft. (waived if No TP Loss)</label>
                                                <select name="loss_damage_theft" id="loss_damage_theft" class="form-control">
                                                    <option>--Select--</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Dealer</label>
                                                <input type="text" name="loss_damage_theft_dealer" id="loss_damage_theft_dealer" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Customer</label>
                                                <input type="text" name="loss_damage_theft_customer" id="loss_damage_theft_customer" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Applicable only if PA claim (Driver death)</label>
                                                <select name="PA_claim" id="PA_claim" class="form-control">
                                                    <option>--Select--</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Dealer</label>
                                                <input type="text" name="PA_claim_dealer" id="PA_claim_dealer" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Customer</label>
                                                <input type="text" name="PA_claim_customer" id="PA_claim_customer" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Total Loss, Fire Loss, Death, Major injury & if any brake in policies </label>
                                                <select name="brake_policies" id="brake_policies" class="form-control">
                                                    <option>--Select--</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Dealer</label>
                                                <input type="text" name="brake_policies_dealer" id="brake_policies_dealer" class="form-control" />
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Customer</label>
                                                <input type="text" name="brake_policies_customer" id="brake_policies_customer" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Remarks if any</label>
                                        <textarea name="question_remarks" id="question_remarks" class="form-control"></textarea>

                                    </div>
                                </div>
                                <!-- <div class="row-4">
                                    <button type="button" OnClick="GetRandom()" name="submit" id="submit" class="btn btn-block btn-info btn-sm">submit</button>
                                    <br><br>

                                </div> -->
                                <!-- <br><br>
                                    <div class="row" style="float: center">
                                        <div class="form-group col-md-2">
                                            <input type="submit" name="submit" class="btn-secondary" />
                                        </div>
                                    </div> -->
                                <hr>
                                <h5><b>General Details:</b></h5>
                                <div class="row">
                                    <div class="form-group col-md-6" style="border: 1px solid #ccc;">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Dealer</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label>Accident in charge Name</label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="accident_charge_name_dealer" id="accident_charge_name_dealer" class="form-control" readonly value="{{ $data[0]->Accident_in_charge_Name }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label>Accident in charge Mobile</label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="accident_charge_mobile_dealer" id="accident_charge_mobile_dealer" class="form-control" readonly value="{{ $data[0]->Accident_in_charge_Mobile }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label>Vehicle reported at workshop</label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="veh_rep_wkshp_dealer" id="veh_rep_wkshp_dealer" class="form-control" value="{{ $data[0]->Vehicle_reported_at_workshop}}" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label>Name of the workshop</label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="name_wkshp_dealer" id="name_wkshp_dealer" class="form-control" readonly value="{{ $data[0]->Name_of_the_workshop }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label>Auto update from SAC code</label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="auto_upt_sac_code" id="auto_upt_sac_code" class="form-control" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label>SAC Code of the workshop</label>
                                                    </div>
                                                    <div class="form-group col-md-4" readonly>
                                                        <select name="sac_code_wrkshp" id="sac_code_wrkshp" class="form-control" readonly>
                                                            <option>--Select--</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6" style="border: 1px solid #ccc;">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Dealer</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label>Zone</label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="zone" id="zone" class="form-control" readonly value="{{ $data[0]->Zone }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label>Auto update from SAC code

                                                        </label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="auto_updt_frm_sac" id="auto_updt_frm_sac" class="form-control" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label>Region Office</label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="region_office" id="region_office" class="form-control" readonly value="{{ $data[0]->Region_Office }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label>Auto update from SAC code

                                                        </label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="auto_updt_frm_sac_cod" id="auto_updt_frm_sac_cod" class="form-control" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label>Area Office</label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="area_office" id="area_office" class="form-control" readonly value="{{ $data[0]->Area_Office }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label>Auto update from SAC code

                                                        </label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="auto_updt_frm_sac_code" id="auto_updt_frm_sac_code" class="form-control" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label>Job Card Open</label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="job_card_open" id="job_card_open" class="form-control" value="{{ $data[0]->Job_Card_Open }}" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="ref_id" id="ref_id">
                                        <input type="hidden" name="id" id="id">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        <label>Job Card No.</label>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="job_card_no" id="job_card_no" class="form-control" readonly value="{{ $data[0]->Job_Card_No }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><br><br>
                                <!-- <div class="row" style="float: center">
                                    <div class="form-group col-md-2">
                                        <input type="submit" name="submit" class="btn-secondary" />
                                    </div>
                                </div> -->
                                <hr>
                                <h5><b>Document status:</b></h5>
                                <div class="row">
                                    <div class="form-group col-md-6" style="border: 1px solid #ddd">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Dealer</label>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Customer</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Claim Form
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="claim_form_dealer" id="claim_form_dealer" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="claim_form_customer" id="claim_form_customer" class="form-control" value="{{ $data[0]->Claim_Form}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                KYC documents as per insurer
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="KYC_documents_dealer" id="KYC_documents_dealer" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="KYC_documents_customer" id="KYC_documents_customer" class="form-control" value="{{ $data[0]->KYC_documents_as_per_insurer}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Aadhaar Card No.
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="aadhaar_card_no_dealer" id="aadhaar_card_no_dealer" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="aadhaar_card_no_customer" id="aadhaar_card_no_customer" class="form-control" value="{{ $data[0]->Aadhaar_Card_No}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Pan Card of owner
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="pan_card_owner_dealer" id="pan_card_owner_dealer" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="pan_card_owner_customer" id="pan_card_owner_customer" class="form-control" value="{{ $data[0]->Pan_Card_of_owner}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Policy Copy
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="policy_copy_dealer" id="policy_copy_dealer" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="policy_copy_customer" id="policy_copy_customer" class="form-control" value="{{ $data[0]->Policy_Copy}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Driving License
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="driving_license_dealer" id="driving_license_dealer" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="driving_license_customer" id="driving_license_customer" class="form-control" value="{{ $data[0]->Driving_License}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                National Permit Route A & B
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="npr_dealer" id="npr_dealer" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="npr_customer" id="npr_customer" class="form-control" value="{{ $data[0]->National_Permit_Route_A_B}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Road Tax challan
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="road_tax_dealer" id="road_tax_dealer" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="road_tax_customer" id="road_tax_customer" class="form-control" value="{{ $data[0]->Road_Tax_challan}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Fitness Certificate
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="fitness_certificate_dealer" id="fitness_certificate_dealer" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="fitness_certificate_customer" id="fitness_certificate_customer" class="form-control" value="{{ $data[0]->Fitness_Certificate}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Registration of Certification
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="reg_certification_dealer" id="reg_certification_dealer" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="reg_certification_customer" id="reg_certification_customer" class="form-control" value="{{ $data[0]->Registration_of_Certification}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Form 23
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="form_twothree_dealer" id="form_twothree_dealer" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="form_twothree_customer" id="form_twothree_customer" class="form-control" value="{{ $data[0]->Form_23}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                ALL Document submitted
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="all_docs_dealer" id="all_docs_dealer" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="all_docs_customer" id="all_docs_customer" class="form-control" value="{{ $data[0]->ALL_Document_submitted }}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Last Document submitted date
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="last_docs_dealer_date" id="last_docs_dealer_date" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="last_docs_customer_date" id="last_docs_customer_date" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6" style="border: 1px solid #ddd">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Dealer</label>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Customer</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Spot Surveyor Name
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="spot_surveyor_dealer" id="spot_surveyor_dealer" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3"> <input type="text" name="spot_surveyor_customer" id="spot_surveyor_customer" class="form-control" readonly value="{{ $data[0]->Spot_Surveyor_Name }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Spot Surveyor Mobile No
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="spot_surveyor_mob_dealer" id="spot_surveyor_mob_dealer" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="spot_surveyor_mob_customer" id="spot_surveyor_mob_customer" class="form-control" readonly value="{{ $data[0]->Spot_Surveyor_Mobile_No }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Spot Surveyor E-mail ID
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="spot_surveyor_email_dealer" id="spot_surveyor_email_dealer" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="spot_surveyor_email_customer" id="spot_surveyor_email_customer" class="form-control" readonly value="{{ $data[0]->Spot_Surveyor_E_mail_ID}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Spot Surveyor Report
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="spot_surveyor_report_dealer" id="spot_surveyor_report_dealer" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="spot_surveyor_report_customer" id="spot_surveyor_report_customer" class="form-control" value="{{ $data[0]->Spot_Surveyor_Report}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Towing Bill Original
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="towing_bill_dealer" id="towing_bill_dealer" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="towing_bill_customer" id="towing_bill_customer" class="form-control" value="{{ $data[0]->Towing_bill_original}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Load Challan / Trip Sheet
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="load_challan_dealer" id="load_challan_dealer" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="load_challan_customer" id="load_challan_customer" class="form-control" value="{{ $data[0]->Load_Challan_Trip_sheet}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Declaration letter if NO Load (on Rs.100/- Stamp Paper)
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="decrtn_letter_dealer" id="decrtn_letter_dealer" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="decrtn_letter_customer" id="decrtn_letter_customer" class="form-control" value="{{ $data[0]->Declaration_letter_if_NO_Load_on_Rs_100_Stamp_Paper}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Motor Vehicle Inspection Report
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="motor_vehicle_insp_dealer" id="motor_vehicle_insp_dealer" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="motor_vehicle_insp_customer" id="motor_vehicle_insp_customer" class="form-control" value="{{ $data[0]->Motor_Vehicle_Inspection_Report}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Fire Brigade Report
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="fire_brigade_dealer" id="fire_brigade_dealer" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="fire_brigade_customer" id="fire_brigade_customer" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Non-Traceable Certificate
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="ntc_dealer" id="ntc_dealer" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="ntc_customer" id="ntc_customer" class="form-control" value="{{ $data[0]->Non_Traceable_Certificate}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                FIR copy
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="fir_copy_dealer" id="fir_copy_dealer" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="fir_copy_customer" id="fir_copy_customer" class="form-control" value="{{ $data[0]->FIR_copy}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Postmortem Report
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="postmortem_report_dealer" id="postmortem_report_dealer" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="postmortem_report_customer" id="postmortem_report_customer" class="form-control" value="{{ $data[0]->Postmortem_Report}}" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                Remarks if any
                                            </div>

                                            <div class="form-group col-md-6">
                                                <textarea name="docs_remarks" id="docs_remarks" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-md-4" id="add" style="border: 1px solid #ddd">
                                        <br />
                                        <h5><b>Pre - Approval Stage</b></h5>
                                        <hr>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Dealer</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Initial Estimate
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="initial_estimate_dealer" id="initial_estimate_dealer" class="form-control" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Need to be verified with Customer
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="need_to_verfy_cust" id="need_to_verfy_cust" class="form-control" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Initial Estimate Value
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="initial_estimate_val_dealer" id="initial_estimate_val_dealer" class="form-control" value="{{ $data[0]->Initial_Estimate_Value }}" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Need to be verified with Customer
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="need_to_verify_cust" id="need_to_verify_cust" class="form-control" readonly />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Major / Minor
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="major_minor_dealer" id="major_minor_dealer" class="form-control" readonly value="{{ $data[0]->Major_Minor }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Classify based on estimate amount<br> > 1lac major else minor
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="classfy_based_est_amnt" id="classfy_based_est_amnt" class="form-control" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Intimation to insurance company for surveyor deputation
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="intimation_insurance_dealer" id="intimation_insurance_dealer" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Mail copy which send to Insurance company for surveyor deputation
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="mail_copy_dealer" id="mail_copy_dealer" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Surveyor Name
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="surveyor_name_dealer" id="surveyor_name_dealer" class="form-control" readonly value="{{ $data[0]->Surveyor_Name }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Surveyor Mobile No.
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="surveyor_mob_dealer" id="surveyor_mob_dealer" class="form-control" readonly value="{{ $data[0]->Surveyor_Mobile_No}}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Surveyor E-mail ID
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="surveyor_email_dealer" id="surveyor_email_dealer" class="form-control" readonly value="{{ $data[0]->Surveyor_E_mail_ID }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Surveyor initial inspection
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="surveyor_initial_inspection_dealer" id="surveyor_initial_inspection_dealer" class="form-control" value="{{ $data[0]->Surveyor_initial_inspection }}" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Need to be verified with Surveyor also
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="need_to_b_vrfy_srvyr" id="need_to_b_vrfy_srvyr" class="form-control" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Approval for Dismantling
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="approval_dismantling_dealer" id="approval_dismantling_dealer" class="form-control" value="{{ $data[0]->Approval_for_Dismantling }}" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Need to be verified with Surveyor
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="need_to_b_vrfy_srvyr_als" id="need_to_b_vrfy_srvyr_als" class="form-control" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Dismantling completion
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="dismantling_completion_dealer" id="dismantling_completion_dealer" class="form-control" value="{{ $data[0]->Dismantling_completion }}" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Intimation to surveyor for Second inspection
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="intimation_surveyor_dealer" id="intimation_surveyor_dealer" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Surveyor second inspection
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="surveyor_second_dealer" id="surveyor_second_dealer" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Salvage value agreed(Rs)
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="sva_dealer" id="sva_dealer" class="form-control" value="{{ $data[0]->Salvage_value_agreed_by_Customer_Ins_co }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Surveyor written approval for start of work
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="surveyor_written_approval_dealer" id="surveyor_written_approval_dealer" class="form-control" value="{{ $data[0]->Surveyor_written_approval_for_start_of_work }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Need to be verified with Surveyor
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="need_to_b_vrfy_srvyr_als" id="need_to_b_vrfy_srvyr_als" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Dealer need to upload the approval copy in AL SAP (verfiy)
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="dealer_need_to_upload_approval_copy" id="dealer_need_to_upload_approval_copy" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Parts which not approved need to get approval from customer
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="parts_approved_dealer" id="parts_approved_dealer" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Customer written approval for start of work
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="customer_approval_dealer" id="customer_approval_dealer" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Need to be verified with Customer
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="need_to_verified_with_customer" id="need_to_verified_with_customer" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Dealer need to upload the approval copy
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="dealer_need_to_upload_approval" id="dealer_need_to_upload_approval" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Intimation to insurance company for advance payment
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="intimation_insurance_dealer_adv" id="intimation_insurance_dealer_adv" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Mail copy which send to Insurance company for advance payment
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="mail_copy_ad_pymnt_dealer" id="mail_copy_ad_pymnt_dealer" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Advance payment from customer
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="apc_time_dealer" id="apc_time_dealer" class="form-control" value="{{ $data[0]->Advance_payment_from_customer }}" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Need to be verified with Customer
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="need_to_b_vrfy_custmr_als" id="need_to_b_vrfy_custmr_als" class="form-control" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Advance payment from customer (Rs)
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="apc_rs_dealer" id="apc_rs_dealer" class="form-control" value="{{ $data[0]->Advance_payment_from_customer_Rs }}" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Need to be verified with Customer
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="need_to_b_vrfy_cust_als" id="need_to_b_vrfy_cust_als" class="form-control" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Advance payment from Insurance
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="api_time_dealer" id="api_time_dealer" class="form-control" value="{{ $data[0]->Advance_payment_from_Insurance}}" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Advance payment from Insurance (Rs)
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="api_rs_dealer" id="api_rs_dealer" class="form-control" value="{{ $data[0]->Advance_payment_from_Insurance_Rs}}" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Delay reason if any
                                            </div>
                                            <div class="form-group col-md-3">
                                                <textarea name="pre_delay_reason" id="pre_delay_reason" class="form-control" value="{{ $data[0]->Pre_Approval_Stage_Dealy_Reason}}"></textarea>
                                            </div>
                                        </div>
                                        <!-- <div class="py-4">
                                                <button type="button" name="submit" id="submit" class="btn btn-block btn-info btn-sm">submit</button>
                                            </div>
                                            <br /> -->
                                    </div>






                                    <div class="form-group col-md-4" style="border: 1px solid #ddd">
                                        <br />
                                        <h5><b>Repair Stage</b></h5>
                                        <hr>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Dealer</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Repair Work Start
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="repair_work_start_dealer" id="repair_work_start_dealer" class="form-control" value="{{ $data[0]->Repair_work_start }}" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Technician name, ID & Mobile form Accidental in charge.
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="tech_id_mob" id="tech_id_mob" class="form-control" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Need to be verified with technician once a while.
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="need_to_be_verify_with_technician" id="need_to_be_verify_with_technician" class="form-control" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Detail Damaged Parts List Preparation
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="detail_damaged_dealer" id="detail_damaged_dealer" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Available at Dealer
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="available_at_dealer" id="available_at_dealer" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                AOR need to place
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="AOR_need_to_place" id="AOR_need_to_place" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                In Transit
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="In_Transit" id="In_Transit" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Local purchase
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="Local_purchase" id="Local_purchase" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Arrange form other branch
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="Arrange_form_other_branch" id="Arrange_form_other_branch" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                TOC order
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="TOC_order" id="TOC_order" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Sheet Metal / Denting Repair Work
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="sheet_denting_repair" id="sheet_denting_repair" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Vehicle Level Mechanical & Electrical Repair (other than cabin)
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="mech_elec_repair" id="mech_elec_repair" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Painting Start
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="painting_start" id="painting_start" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                After completion of Sheet metal work, Painting start date yet to collect.
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="painting_start_date_yet_to_collect" id="painting_start_date_yet_to_collect" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Cabin Trims Parts Fitment Completed
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="cabin_trims_parts" id="cabin_trims_parts" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                After painting completed, Trim of Cabin date to collect
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="trim_of_cabin_date_to_collect" id="trim_of_cabin_date_to_collect" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12" style="background: #ccc;">
                                                <b>Outsource</b>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Outside Job
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="outside_job" id="outside_job" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Need to collect
                                                what purpose send out side
                                                Time duration
                                                Out side contact details
                                                Day wise activity capture
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="outside_purpose" id="outside_purpose" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12" style="background: #ccc;">
                                                <b>Parts Order Details</b>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                AOR Raised on
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="AOR_raised" id="AOR_raised" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                So No.
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="so_no" id="so_no" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Arrange the Material from local/ other branch
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="arrange_mat" id="arrange_mat" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                IF YES, (DATE/TIME)
                                                NO - Closed
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="if_yes_no" id="if_yes_no" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Receipt of all parts from AOR,TOC, Other branch Etc..,
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="receipt_all_parts" id="receipt_all_parts" class="form-control" />
                                            </div>
                                        </div>
                                        <!-- <b>Any Supplementary Required</b> -->
                                        <div class="row">
                                            <div class="form-group col-md-12" style="background: #ccc;">
                                                <b>Any Supplementary Required</b>

                                            </div>
                                        </div>
                                        <select name="supplementary_required" id="supplementary_required" class="form-control"><br><br>
                                            <option>--Select--</option><br><br>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                        <br>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Intimation to surveyor for Supp. inspection
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="intimation_surveyor" id="intimation_surveyor" class="form-control" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Supplementary Estimate
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="supplementary_estimate" id="supplementary_estimate" class="form-control" value="{{ $data[0]->Supplementary_estimate }}" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Supplementary Estimate Value
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="supplementary_estimate_val" id="supplementary_estimate_val" class="form-control" readonly value="{{ $data[0]->Supplementary_estimate_Value }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Supplementary Inspection
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="supplementary_inspection" id="supplementary_inspection" class="form-control" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Supplementary Written Approval
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="supplementary_written_approval" id="supplementary_written_approval" class="form-control" value="{{ $data[0]->Supplementary_written_approval}}" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Inform to customer on supplementary approval
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="inform_to_customer_on_approval" id="inform_to_customer_on_approval" class="form-control" readonly />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Parts which not approved need to get approval from customer
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="parts_get_approval" id="parts_get_approval" class="form-control" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Repair Completion
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="repair_completion" id="repair_completion" class="form-control" value="{{ $data[0]->Repair_completion }}" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Inform to customer vehicle repair work has completed (Call Center)
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="inform_to_customer_vehicle" id="inform_to_customer_vehicle" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Delay reason if any
                                            </div>
                                            <div class="form-group col-md-3">
                                                <textarea name="repair_delay_reason" id="repair_delay_reason" class="form-control" value="{{ $data[0]->Repair_Stage_Dealy_Reason}}"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4" style="border: 1px solid #ddd">
                                        <br />
                                        <h5><b>Post Approval Stage</b></h5>
                                        <hr>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Dealer</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Intimation to Insurance company final inspection
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="iicfi" id="iicfi" class="form-control" readonly value="{{ $data[0]->Intimation_to_Insurance_company_final_inspection}}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Mail copy which send to Surveyor for final inspecting
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="mail_copy_final_insption" id="mail_copy_final_insption" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Conduct the Road test
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="conduct_road_test" id="conduct_road_test" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Need to be verified with Customer
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="need_to_vrfy_with_customer" id="need_to_vrfy_with_customer" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Final Inspection from surveyor
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="final_insption_surveyor" id="final_insption_surveyor" class="form-control" readonly value="{{ $data[0]->Final_Inspection_from_surveyor}}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Proforma Submission to surveyor post inspection
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="proforma_submission" id="proforma_submission" class="form-control" value="{{ $data[0]->Proforma_Submission_to_surveyor_post_inspection}}" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Need to be verified with Surveyor
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="Need__be_verified_with_Surveyor" id="Need__be_verified_with_Surveyor" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Receipt of Delivery Order/ Liability report
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="receipt_delivery_order" id="receipt_delivery_order" class="form-control" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Job Card Closed
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="job_card_closed" id="job_card_closed" class="form-control" value="{{ $data[0]->Job_Card_Closed}}" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Bill Value to Customer (Rs)
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="bill_value_customer" id="bill_value_customer" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Bill Value to Insurance (Rs)
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="bill_value_insurance" id="bill_value_insurance" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Balance payment from Customer
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="bal_payment_customer" id="bal_payment_customer" class="form-control" value="{{ $data[0]->Balance_payment_from_Customer}}" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Need to be verified with Customer
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="Need_be_verified_Customer" id="Need_be_verified_Customer" class="form-control" readonly />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Balance payment from Customer Value Rs.
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="bal_payment_customer_rs" id="bal_payment_customer_rs" class="form-control" value="{{ $data[0]->Balance_payment_from_Customer_Value_Rs}}" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Need to be verified with Customer
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="Need_be_verified_Customer_" id="Need_be_verified_Customer_" class="form-control" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Collecting of Satisfaction voucher from customer
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="collecting_satisfaction_voucher" id="collecting_satisfaction_voucher" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Vehicle delivery to customer
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="veh_delivery_customer" id="veh_delivery_customer" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Need to be verified with Customer
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="Need_be_verified_Custmr_" id="Need_be_verified_Custmr_" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Balance payment from Insurance
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="bal_pymnt_ins" id="bal_pymnt_ins" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Balance payment from Insurance Value Rs.
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="bal_pymnt_ins_rs" id="bal_pymnt_ins_rs" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Gate Pass
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" name="gate_pass" id="gate_pass" class="form-control" value="{{ $data[0]->Gate_Pass}}" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-9">
                                                Delay reason if any
                                            </div>
                                            <div class="form-group col-md-3">
                                                <textarea name="post_delay_reason" id="post_delay_reason" class="form-control" value="{{ $data[0]->Post_Approval_Stage_Dealy_Reason}}"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4" style="border: 1px solid #ddd">
                                        <br />
                                        <h5><b>Pre - Approval Stage - Delay Analysis </b></h5>
                                        <hr>
                                        <div class="row">
                                            <div class="form-group col-md-12" id="aqwwe">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Delay in prepare the initial estimate by dealer
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="delay_prepare_dealer" id="delay_prepare_dealer" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Delay in Submission of the documents by customer
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="delay_submsn_docs" id="delay_submsn_docs" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Which documents delay by the customer for submission.<br>
                                                        1.
                                                    </div>
                                                    <div class="form-group col-md-4"><br><br>
                                                        <input type="text" name="doc_1" id="doc_1" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        2.
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="doc_2" id="doc_2" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        3.
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="doc_3" id="doc_3" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        4.
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="doc_4" id="doc_4" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        5.
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="doc_5" id="doc_5" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Intimation to insurance company for surveyor deputation by dealer
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="surveyor_deputation_dealer" id="surveyor_deputation_dealer" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Delay in Surveyor deputation from Insurance company
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="delay_surveyor_deputation" id="delay_surveyor_deputation" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Approval for dismantling from surveyor
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="approval_dismantling_surveyor" id="approval_dismantling_surveyor" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Delay in dismantling completion by dealer
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="delay_dismantling_completion" id="delay_dismantling_completion" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Intimation to surveyor for Second inspection by dealer </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="intimation_to_surveyor_for_second_inspection" id="intimation_to_surveyor_for_second_inspection" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Delay by the surveyor to report to workshop
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="delay_surveyor_completion" id="delay_surveyor_completion" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Surveyor approval to start of work
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="surveyor_approval" id="surveyor_approval" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Approval delay by the customer
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="approval_delay" id="approval_delay" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Advance payment delay by the customer
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="advance_payment_delay" id="advance_payment_delay" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Delay in intimation to Insurance company for advance payment
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="delay_intimation_nsurance" id="delay_intimation_nsurance" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Advance payment delay by the Insurance
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="advance_payment_delay_ins" id="advance_payment_delay_ins" class="form-control" />
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
                                                    <div class="form-group col-md-8" style="background: #0080ff;color:#fff">
                                                        Dealer
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="pre_delay_dealer" id="pre_delay_dealer" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8" style="background: #33cc33;color:#fff">
                                                        Customer
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="pre_delay_customer" id="pre_delay_customer" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8" style="background: #ff9900;color:#fff">
                                                        Surveyor/Insurance company
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="pre_surveyor_company" id="pre_surveyor_company" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4" style="border: 1px solid #ddd">
                                        <br />
                                        <h5><b>Repair Stage - Delay Analysis </b></h5>
                                        <hr>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Delay in start of Work
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="delay_start" id="delay_start" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Manpower
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="Manpower" id="Manpower" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Crane facility
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="Crane_facility" id="Crane_facility" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Power not available
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="Power_not_available" id="Power_not_available" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Equipment
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="Equipment" id="Equipment" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Delay in preparing the damaged parts
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="delay_preparing" id="delay_preparing" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        From Whom Delay<br>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        AOR need to place
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="AOR_need_place" id="AOR_need_place" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        In Transit
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="In_Transit_" id="In_Transit_" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Local purchase
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="Local_purchase_" id="Local_purchase_" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Arrange form other branch
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="Arrange_form_other_branch_" id="Arrange_form_other_branch_" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        TOC order
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name=" TOC_order_" id="TOC_order_" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        No of days taken in sheet metal
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="no_days_taken_metal" id="no_days_taken_metal" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        No of days taken for other works
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="no_days_taken_works" id="no_days_taken_works" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        No of days taken for Painting
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="no_days_taken_painting" id="no_days_taken_painting" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        No of days taken for Trim the cabin
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="no_days_taken_cabin" id="no_days_taken_cabin" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Receipt of all parts
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="repair_receipt_all_parts" id="repair_receipt_all_parts" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        From Whom Delay<br>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        AOR need to place
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="_AOR_need_place" id="_AOR_need_place" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        In Transit
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="_In_Transit_" id="_In_Transit_" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Local purchase
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="_Local_purchase_" id="_Local_purchase_" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Arrange form other branch
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="_Arrange_form_other_branch_" id="_Arrange_form_other_branch_" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        TOC order
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="_TOC_order_" id="_TOC_order_" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Outside job
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="repair_outside_job" id="repair_outside_job" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Delay in intimation to surveyor for supp. Estimate
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="delay_supp_estimate" id="delay_supp_estimate" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Delay by the surveyor to report to workshop
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="delay_report_workshop" id="delay_report_workshop" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Delay by Surveyor to provide the approval on Supp. Est.
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="delay_approval_supp_est" id="delay_approval_supp_est" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Approval delay by the customer
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="approval_delay_customer" id="approval_delay_customer" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Repair completion (BIBO)
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="repair_completion_bibo" id="repair_completion_bibo" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-12" style="background: #ccc;">
                                                        Inform to customer vehicle repair work has completed (Call Center)
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8" style="background: #0080ff;color:#fff">
                                                        Dealer
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="inform_to_customer_work_completed" id="inform_to_customer_work_completed" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8" style="background: #33cc33;color:#fff">
                                                        Customer
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="repaire_delay_customer" id="repaire_delay_customer" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8" style="background: #ff9900;color:#fff">
                                                        Surveyor/Insurance company
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="repaire_surveyor_company" id="repaire_surveyor_company" class="form-control repdeanasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4" style="border: 1px solid #ddd">
                                        <br />
                                        <h5><b>Post Approval Stage - Delay Analysis </b></h5>
                                        <hr>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Delay in intimation to surveyor for final inspection
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="delay_final_inspection" id="delay_final_inspection" class="form-control appsdasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Delay in road test
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="delay_road_test" id="delay_road_test" class="form-control appsdasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Delay in final inspection by surveyor
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="delay_final_inspection_surveyor" id="delay_final_inspection_surveyor" class="form-control appsdasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Delay in Submission of Proforma invoice
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="delay_submission_invoice" id="delay_submission_invoice" class="form-control appsdasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Receipt of Delivery Order/ Liability report
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="receipt_delivery_report" id="receipt_delivery_report" class="form-control appsdasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Job card open to Job card closed
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="job_card_open_close" id="job_card_open_close" class="form-control appsdasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Delay in final payment from customer
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="delay_final_payment_customer" id="delay_final_payment_customer" class="form-control appsdasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Delay in final payment from Insurance
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="delay_final_payment_insurance" id="delay_final_payment_insurance" class="form-control appsdasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Delay in collect the vehicle
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="delay_collect_vehicle" id="delay_collect_vehicle" class="form-control appsdasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        Vehicle inward to out wards
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="vehicle_inward_wards" id="vehicle_inward_wards" class="form-control appsdasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8">
                                                        GIGO
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="gigo" id="gigo" class="form-control appsdasis" readonly="readonly" />
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
                                                    <div class="form-group col-md-8" style="background: #0080ff;color:#fff">
                                                        Dealer
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="post_delay_dealer" id="post_delay_dealer" class="form-control appsdasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8" style="background: #33cc33;color:#fff">
                                                        Customer
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="post_delay_customer" id="post_delay_customer" class="form-control appsdasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-8" style="background: #ff9900;color:#fff">
                                                        Surveyor/Insurance company
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <input type="text" name="post_surveyor_company" id="post_surveyor_company" class="form-control appsdasis" readonly="readonly" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group col-md-3" style="overflow:auto;">
                            <div style="float:right;">
                                <!-- {{-- <button type="submit" id="prevBtn" name="submit" class="btn-secondary" onclick="nextPrev(-1)">Previous</button> --}} -->
                                <!-- <button type="button" id="nextBtn" class="btn-secondary">Submit</button> -->
                                <!-- {{-- <button  type="button" id="addoption">submit</button> --}} -->
                                <!-- <div class="py-4">
                                                <button type="button" name="submit" id="submit" class="btn btn-block btn-info btn-sm">submit</button>
                                            </div>
                                            <br />  -->

                                <div class="row-4">

                                    <?php if ($btype == 'update') { ?> <br>
                                        <button type="button" name="update" id="update" class="btn btn-block btn-info btn-sm">
                                            Update</button>
                                    <?php } elseif ($btype == 'add') { ?>
                                        <button type="button" name="submit" id="submit" class="btn btn-block btn-info btn-sm">

                                            Submit </button>
                                        <?php
                                        // } else {
                                        ?>
                                        <!-- <button type="button" name="submit" id="submit" class="btn btn-block btn-info btn-sm">

                                            Submit -->
                                    <?php } ?>

                                    </button>
                                    <div class="wait">
                                        <div class="spinner-border" style="display: none;"></div>
                                    </div>
                                </div>

                                <!-- </div><br>
                                <h3 class="wait" style="display: none;">Data Uploaded!<br> Please Wait...</h3>
                            </div> -->
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</div>
<script>
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
    $('#theft_cases').on('change', function() {
        if (this.value == 'no') {
            $('#ntc_dealer').attr('readonly', 'readonly');
            $('#ntc_customer').attr('readonly', 'readonly');
        } else {
            $('#ntc_dealer').removeAttr('readonly');
            $('#ntc_customer').removeAttr('readonly', 'readonly');
        }
    });
    $('#loss_damage_theft').on('change', function() {
        if (this.value == 'no') {
            $('#fir_copy_dealer').attr('readonly', 'readonly');
            $('#fir_copy_customer').attr('readonly', 'readonly');
        } else {
            $('#fir_copy_dealer').removeAttr('readonly', 'readonly');
            $('#fir_copy_customer').removeAttr('readonly', 'readonly');
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
    $('#brake_policies').on('change', function() {
        if (this.value == 'no') {
            $('#motor_vehicle_insp_dealer').attr('readonly', 'readonly');
            $('#motor_vehicle_insp_customer').attr('readonly', 'readonly');
        } else {
            $('#motor_vehicle_insp_dealer').removeAttr('readonly', 'readonly');
            $('#motor_vehicle_insp_customer').removeAttr('readonly', 'readonly');
        }
    });
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
        }
    });
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<div id="pageloader">
    <img src="http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif" alt="processing..." />
</div>

<script>
    function checkValue(id) {

        $(`#${id}`).on('keyup paste propertychange input keydown', function() {

            var delay_prepare_dealer = $("#delay_prepare_dealer").val();
            var delay_submsn_docs = $("#delay_submsn_docs").val();
            var surveyor_deputation_dealer = $("#surveyor_deputation_dealer").val();
            var delay_surveyor_deputation = $("#delay_surveyor_deputation").val();
            var approval_dismantling_surveyor = $("#approval_dismantling_surveyor").val();
            var delay_dismantling_completion = $("#delay_dismantling_completion").val();
            var delay_surveyor_completion = $("#delay_surveyor_completion").val();
            var surveyor_approval = $("#surveyor_approval").val();
            var approval_delay = $("#approval_delay").val();
            var advance_payment_delay = $("#advance_payment_delay").val();
            var delay_intimation_nsurance = $("#delay_intimation_nsurance").val();
            var pre_delay_dealer = $("#pre_delay_dealer").val();
            var pre_delay_customer = $("#pre_delay_customer").val();
            var pre_surveyor_company = $("#pre_surveyor_company").val();

            if (delay_prepare_dealer.length == 0 || delay_submsn_docs.length == 0 || surveyor_deputation_dealer.length == 0 || delay_surveyor_deputation.length == 0 || approval_dismantling_surveyor.length == 0 || delay_dismantling_completion.length == 0 || delay_surveyor_completion.length == 0 || surveyor_approval.length == 0 || approval_delay.length == 0 || advance_payment_delay.length == 0 || delay_intimation_nsurance.length == 0 || pre_delay_dealer.length == 0 || pre_delay_customer.length == 0 || pre_surveyor_company.length == 0) $('.repdeanasis').prop('readonly', true)
            else $('.repdeanasis').removeAttr('readonly');
        });
    }

    function checkValue2(id) {
        $(`#${id}`).on('keyup paste propertychange input keydown', function() {
            var delay_start = $("#delay_start").val();
            var delay_preparing = $("#delay_preparing").val();
            var no_days_taken_metal = $("#no_days_taken_metal").val();
            var no_days_taken_works = $("#no_days_taken_works").val();
            var no_days_taken_painting = $("#no_days_taken_painting").val();
            var no_days_taken_cabin = $("#no_days_taken_cabin").val();
            var repair_receipt_all_parts = $("#repair_receipt_all_parts").val();
            var repair_outside_job = $("#repair_outside_job").val();
            var approval_delay_customer = $("#approval_delay_customer").val();
            var repair_completion_bibo = $("#repair_completion_bibo").val();
            var repaire_delay_dealer = $("#repaire_delay_dealer").val();
            var repaire_delay_customer = $("#repaire_delay_customer").val();
            var repaire_surveyor_company = $("#repaire_surveyor_company").val();
            if (delay_start.length == 0 || delay_preparing.length == 0 || no_days_taken_metal.length == 0 || no_days_taken_works.length == 0 || no_days_taken_painting.length == 0 || no_days_taken_cabin.length == 0 || repair_receipt_all_parts.length == 0 || repair_outside_job.length == 0 || approval_delay_customer.length == 0 || repair_completion_bibo.length == 0 || repaire_delay_dealer.length == 0 || repaire_delay_customer.length == 0 || repaire_surveyor_company.length == 0) $('.appsdasis').prop('readonly', true)
            else $('.appsdasis').removeAttr('readonly');
        });
    }
    checkValue2('delay_start');
    checkValue2('delay_preparing');
    checkValue2('no_days_taken_metal');
    checkValue2('no_days_taken_works');
    checkValue2('no_days_taken_painting');
    checkValue2('no_days_taken_cabin');
    checkValue2('repair_receipt_all_parts');
    checkValue2('repair_outside_job');
    checkValue2('delay_supp_estimate');
    checkValue2('delay_report_workshop');
    checkValue2('delay_approval_supp_est');
    checkValue2('approval_delay_customer');
    checkValue2('repair_completion_bibo');
    checkValue2('repaire_delay_dealer');
    checkValue2('repaire_delay_customer');
    checkValue2('repaire_surveyor_company');
    checkValue('delay_prepare_dealer');
    checkValue('delay_submsn_docs');
    checkValue('surveyor_deputation_dealer');
    checkValue('delay_surveyor_deputation');
    checkValue('approval_dismantling_surveyor');
    checkValue('delay_dismantling_completion');
    checkValue('delay_surveyor_completion');
    checkValue('surveyor_approval');
    checkValue('approval_delay');
    checkValue('advance_payment_delay');
    checkValue('delay_intimation_nsurance');
    checkValue('pre_delay_dealer');
    checkValue('pre_delay_customer');
    checkValue('pre_surveyor_company');
</script>
<script src="{{asset('js/tab.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#caller-listing').DataTable({
            dom: 'Bfrtip',
            "language": {
                "paginate": {
                    "previous": "<",
                    "next": ">"
                }
            },
            buttons: [{
                extend: 'excel',
                text: 'Excel',
                className: 'exportExcel',
                filename: '@yield("title")',
                exportOptions: {
                    modifier: {
                        page: 'all'
                    }
                }
            }]
        });
    });
</script>
<script>
    $('#submit').on('click', function() {
        $('.wait').css("display", "block");
        // Pre Aprroval Stage
        var initial_estimate_dealer = $('#initial_estimate_dealer').val();
        var need_to_verfy_cust = $('#need_to_verfy_cust').val();
        var initial_estimate_val_dealer = $('#initial_estimate_val_dealer').val();
        var need_to_verify_cust = $('#need_to_verify_cust').val();
        var major_minor_dealer = $('#major_minor_dealer').val();
        var classfy_based_est_amnt = $('#classfy_based_est_amnt').val();
        var intimation_insurance_dealer = $('#intimation_insurance_dealer').val();
        var mail_copy_dealer = $('#mail_copy_dealer').val();
        var surveyor_name_dealer = $('#surveyor_name_dealer').val();
        var surveyor_mob_dealer = $('#surveyor_mob_dealer').val();
        var surveyor_email_dealer = $('#surveyor_email_dealer').val();
        var surveyor_initial_inspection_dealer = $('#surveyor_initial_inspection_dealer').val();
        var need_to_b_vrfy_srvyr = $('#need_to_b_vrfy_srvyr').val();
        var approval_dismantling_dealer = $('#approval_dismantling_dealer').val();
        var need_to_b_vrfy_srvyr_als = $('#need_to_b_vrfy_srvyr_als').val();
        var dismantling_completion_dealer = $('#dismantling_completion_dealer').val();
        var intimation_surveyor_dealer = $('#intimation_surveyor_dealer').val();
        var surveyor_second_dealer = $('#surveyor_second_dealer').val();
        var sva_dealer = $('#sva_dealer').val();
        var surveyor_written_approval_dealer = $('#surveyor_written_approval_dealer ').val();
        var dealer_need_to_upload_approval_copy = $('#dealer_need_to_upload_approval_copy').val();
        var parts_approved_dealer = $('#parts_approved_dealer').val();
        var customer_approval_dealer = $('#customer_approval_dealer').val();
        var need_to_verified_with_customer = $('#need_to_verified_with_customer').val();
        var mail_copy_ad_pymnt_dealer = $('#mail_copy_ad_pymnt_dealer').val();
        var apc_time_dealer = $('#apc_time_dealer').val();
        var need_to_b_vrfy_custmr_als = $('#need_to_b_vrfy_custmr_als').val();
        var apc_rs_dealer = $('#apc_rs_dealer').val();
        var need_to_b_vrfy_cust_als = $('#need_to_b_vrfy_cust_als').val();
        var api_time_dealer = $('#api_time_dealer').val();
        var api_rs_dealer = $('#api_rs_dealer').val();
        var pre_delay_reason = $('#pre_delay_reason').val();
        var intimation_insurance_dealer_adv = $('#intimation_insurance_dealer_adv').val();


        // VEHICLE DETAILS
        var veh_reg_no = $('#veh_reg_no').val();
        var verified_in_vahan = $('#verified_in_vahan').val();
        var bs_nonbs = $('#bs_nonbs').val();
        var model = $('#model').val();
        var chassis_number = $('#chassis_number').val();
        var engine_no = $('#engine_no').val();
        var customer_contact = $('#customer_contact').val();
        var driver_name = $('#driver_name').val();
        var DL_validity_date = $('#DL_validity_date').val();
        var driver_statement = $('#driver_statement').val();
        var date_of_accident = $('#date_of_accident').val();
        var location_of_the_accident = $('#location_of_the_accident').val();
        var driving_license_number = $('#driving_license_number').val();
        var driver_contact_no = $('#driver_contact_no').val();
        var date_of_sale = $('#date_of_sale').val();
        var segment = $('#segment').val();
        var name_of_the_insurance = $('#name_of_the_insurance').val();
        var insurance_policy_no = $('#insurance_policy_no').val();
        var customer_name = $('#customer_name').val();
        var wood_cabin_load = $('#wood_cabin_load').val();
        var AL_fitment = $('#AL_fitment').val();
        var ref_id = $('#ref_id').val();
        var mode_of_claims = $('#mode_of_claims').val();
        //  GENERAL DETAILS
        var accident_charge_name_dealer = $('#accident_charge_name_dealer').val();
        var accident_charge_mobile_dealer = $('#accident_charge_mobile_dealer').val();
        var veh_rep_wkshp_dealer = $('#veh_rep_wkshp_dealer').val();
        var name_wkshp_dealer = $('#name_wkshp_dealer').val();
        var auto_upt_sac_code = $('#auto_upt_sac_code').val();
        var sac_code_wrkshp = $('#sac_code_wrkshp').val();
        var zone = $('#zone').val();
        var auto_updt_frm_sac = $('#auto_updt_frm_sac').val();
        var region_office = $('#region_office').val();
        var auto_updt_frm_sac_cod = $('#auto_updt_frm_sac_cod').val();
        var area_office = $('#area_office').val();
        var auto_updt_frm_sac_code = $('#auto_updt_frm_sac_code').val();
        var job_card_open = $('#job_card_open').val();
        var job_card_no = $('#job_card_no').val();
        // Question
        var third_party = $('#third_party').val();
        var third_party_dealer = $('#third_party_dealer').val();
        var third_party_customer = $('#third_party_customer').val();
        var accident_vehicle = $('#accident_vehicle').val();
        var accident_vehicle_dealer = $('#accident_vehicle_dealer').val();
        var accident_vehicle_customer = $('#accident_vehicle_customer').val();
        var thermal_incident = $('#thermal_incident').val();
        var thermal_incident_dealer = $('#thermal_incident_dealer').val();
        var thermal_incident_customer = $('#thermal_incident_customer').val();
        var Vehicle_towed = $('#Vehicle_towed').val();
        var Vehicle_towed_dealer = $('#Vehicle_towed_dealer').val();
        var Vehicle_towed_customer = $('#Vehicle_towed_customer').val();
        var theft_cases = $('#theft_cases').val();
        var theft_cases_dealer = $('#theft_cases_dealer').val();
        var theft_cases_customer = $('#theft_cases_customer').val();
        var loss_damage_theft = $('#loss_damage_theft').val();
        var loss_damage_theft_customer = $('#theft_cases_customer').val();
        var loss_damage_theft_dealer = $('#loss_damage_theft_dealer').val();
        var PA_claim = $('#PA_claim').val();
        var PA_claim_dealer = $('#PA_claim_dealer').val();
        var PA_claim_customer = $('#PA_claim_customer').val();
        var brake_policies = $('#brake_policies').val();
        var brake_policies_dealer = $('#brake_policies_dealer').val();
        var brake_policies_customer = $('#brake_policies_customer').val();
        var question_remarks = $('#question_remarks').val();
        var ref_id = $('#ref_id').val();
        // Documents Status
        var claim_form_dealer = $('#claim_form_dealer').val();
        var claim_form_customer = $('#claim_form_customer').val();
        var KYC_documents_dealer = $('#KYC_documents_dealer').val();
        var KYC_documents_customer = $('#KYC_documents_customer').val();
        var aadhaar_card_no_dealer = $('#aadhaar_card_no_dealer').val();
        var aadhaar_card_no_customer = $('#aadhaar_card_no_customer').val();
        var pan_card_owner_dealer = $('#pan_card_owner_dealer').val();
        var pan_card_owner_customer = $('#pan_card_owner_customer').val();
        var policy_copy_dealer = $('#policy_copy_dealer').val();
        var policy_copy_customer = $('#policy_copy_customer').val();
        var driving_license_dealer = $('#driving_license_dealer').val();
        var driving_license_customer = $('#driving_license_customer').val();
        var npr_dealer = $('#npr_dealer').val();
        var npr_customer = $('#npr_customer').val();
        var road_tax_dealer = $('#road_tax_dealer').val();
        var road_tax_customer = $('#road_tax_customer').val();
        var fitness_certificate_dealer = $('#fitness_certificate_dealer').val();

        var fitness_certificate_customer = $('#fitness_certificate_customer').val();
        var reg_certification_dealer = $('#reg_certification_dealer').val();
        var reg_certification_customer = $('#reg_certification_customer').val();
        var form_twothree_dealer = $('#form_twothree_dealer').val();
        var form_twothree_customer = $('#form_twothree_customer').val();
        var all_docs_dealer = $('#all_docs_dealer').val();
        var all_docs_customer = $('#all_docs_customer').val();
        var last_docs_dealer_date = $('#last_docs_dealer_date').val();
        var last_docs_customer_date = $('#last_docs_customer_date').val();
        var spot_surveyor_dealer = $('#spot_surveyor_dealer').val();
        var spot_surveyor_customer = $('#spot_surveyor_customer').val();
        var spot_surveyor_mob_dealer = $('#spot_surveyor_mob_dealer').val();
        var spot_surveyor_mob_customer = $('#spot_surveyor_mob_customer').val();
        var spot_surveyor_email_dealer = $('#spot_surveyor_email_dealer').val();
        var spot_surveyor_email_customer = $('#spot_surveyor_email_customer').val();
        var spot_surveyor_report_dealer = $('#spot_surveyor_report_dealer').val();
        var spot_surveyor_report_customer = $('#spot_surveyor_report_customer').val();
        var towing_bill_dealer = $('#towing_bill_dealer').val();
        var towing_bill_customer = $('#towing_bill_customer').val();
        var load_challan_dealer = $('#load_challan_dealer').val();
        var load_challan_customer = $('#load_challan_customer').val();
        var decrtn_letter_dealer = $('#decrtn_letter_dealer').val();
        var decrtn_letter_customer = $('#decrtn_letter_customer').val();
        var motor_vehicle_insp_dealer = $('#motor_vehicle_insp_dealer').val();
        var motor_vehicle_insp_customer = $('#motor_vehicle_insp_customer').val();
        var fire_brigade_dealer = $('#fire_brigade_dealer').val();
        var fire_brigade_customer = $('#fire_brigade_customer').val();
        var ntc_dealer = $('#ntc_dealer').val();
        var ntc_customer = $('#ntc_customer').val();
        var fir_copy_dealer = $('#fir_copy_dealer').val();
        var fir_copy_customer = $('#fir_copy_customer').val();
        var postmortem_report_dealer = $('#postmortem_report_dealer').val();
        var postmortem_report_customer = $('#postmortem_report_customer').val();
        var docs_remarks = $('#docs_remarks').val();
        var ref_id = $('#ref_id').val();
        // Repair Stage
        var repair_work_start_dealer = $('#repair_work_start_dealer').val();
        var tech_id_mob = $('#tech_id_mob').val();
        var need_to_be_verify_with_technician = $('#need_to_be_verify_with_technician').val();
        var detail_damaged_dealer = $('#detail_damaged_dealer').val();
        var available_at_dealer = $('#available_at_dealer').val();
        var AOR_need_to_place = $('#AOR_need_to_place').val();
        var In_Transit = $('#In_Transit').val();
        var Local_purchase = $('#Local_purchase').val();
        var Arrange_form_other_branch = $('#Arrange_form_other_branch').val();
        var TOC_order = $('#TOC_order').val();
        var sheet_denting_repair = $('#sheet_denting_repair').val();
        var mech_elec_repair = $('#refmech_elec_repair_id').val();
        var painting_start = $('#painting_start').val();
        var painting_start_date_yet_to_collect = $('#painting_start_date_yet_to_collect').val();
        var cabin_trims_parts = $('#cabin_trims_parts').val();
        var trim_of_cabin_date_to_collect = $('#trim_of_cabin_date_to_collect').val();
        var outside_job = $('#outside_job').val();
        var outside_purpose = $('#outside_purpose').val();
        var AOR_raised = $('#AOR_raised').val();
        var varso_no = $('#so_no').val();
        var arrange_mat = $('#arrange_mat').val();
        var if_yes_no = $('#if_yes_no').val();
        var receipt_all_parts = $('#receipt_all_parts').val();
        var intimation_surveyor = $('#intimation_surveyor').val();
        var supplementary_estimate = $('#supplementary_estimate').val();
        var supplementary_estimate_val = $('#supplementary_estimate_val').val();
        var supplementary_inspection = $('#supplementary_inspection').val();
        var supplementary_written_approval = $('#supplementary_written_approval').val();
        var inform_to_customer_on_approval = $('#inform_to_customer_on_approval').val();
        var parts_get_approval = $('#parts_get_approval').val();
        var repair_completion = $('#repair_completion').val();
        var inform_to_customer_vehicle = $('#inform_to_customer_vehicle').val();
        var repair_delay_reason = $('#repair_delay_reason').val();
        var ref_id = $('#ref_id').val();
        // Post Approval Stage
        var iicfi = $('#iicfi').val();
        var mail_copy_final_insption = $('#mail_copy_final_insption').val();
        var conduct_road_test = $('#conduct_road_test').val();
        var need_to_vrfy_with_customer = $('#need_to_vrfy_with_customer').val();
        var final_insption_surveyor = $('#final_insption_surveyor').val();
        var proforma_submission = $('#proforma_submission').val();
        var Need__be_verified_with_Surveyor = $('#Need__be_verified_with_Surveyor').val();
        var receipt_delivery_order = $('#receipt_delivery_order').val();
        var job_card_closed = $('#job_card_closed').val();
        var bill_value_customer = $('#bill_value_customer').val();
        var bill_value_insurance = $('#bill_value_insurance').val();
        var bal_payment_customer = $('#bal_payment_customer').val();
        var Need_be_verified_Customer = $('#Need_be_verified_Customer').val();
        var bal_payment_customer_rs = $('#bal_payment_customer_rs').val();
        var Need_be_verified_Customer_ = $('#Need_be_verified_Customer_').val();
        var collecting_satisfaction_voucher = $('#collecting_satisfaction_voucher').val();
        var veh_delivery_customer = $('#veh_delivery_customer').val();
        var Need_be_verified_Custmr_ = $('#Need_be_verified_Custmr_').val();
        var bal_pymnt_ins = $('#bal_pymnt_ins').val();
        var bal_pymnt_ins_rs = $('#bal_pymnt_ins_rs').val();
        var gate_pass = $('#gate_pass').val();
        var post_delay_reason = $('#post_delay_reason').val();
        var ref_id = $('#ref_id').val();
        // Pre Approval Delay Analysis
        var delay_prepare_dealer = $('#delay_prepare_dealer').val();
        var delay_submsn_docs = $('#delay_submsn_docs').val();
        var doc_1 = $('#doc_1').val();
        var doc_2 = $('#doc_2').val();
        var doc_3 = $('#doc_3').val();
        var doc_4 = $('#doc_4').val();
        var doc_5 = $('#doc_5').val();
        var surveyor_deputation_dealer = $('#surveyor_deputation_dealer').val();
        var delay_surveyor_deputation = $('#delay_surveyor_deputation').val();
        var approval_dismantling_surveyor = $('#approval_dismantling_surveyor').val();
        var delay_dismantling_completion = $('#delay_dismantling_completion').val();
        var intimation_to_surveyor_for_second_inspection = $('#intimation_to_surveyor_for_second_inspection').val();
        var delay_surveyor_completion = $('#delay_surveyor_completion').val();
        var surveyor_approval = $('#surveyor_approval').val();
        var approval_delay = $('#approval_delay').val();
        var advance_payment_delay = $('#advance_payment_delay').val();
        var delay_intimation_nsurance = $('#delay_intimation_nsurance').val();
        var advance_payment_delay_ins = $('#advance_payment_delay_ins').val();
        var pre_delay_dealer = $('#pre_delay_dealer').val();
        var pre_delay_customer = $('#pre_delay_customer').val();
        var pre_surveyor_company = $('#pre_surveyor_company').val();
        var ref_id = $('#ref_id').val();
        // Repair Stage Delay Analysis
        var delay_start = $('#delay_start').val();
        var Manpower = $('#Manpower').val();
        var Crane_facility = $('#Crane_facility').val();
        var Power_not_available = $('#Power_not_available').val();
        var Equipment = $('#Equipment').val();
        var delay_preparing = $('#delay_preparing').val();
        var AOR_need_place = $('#AOR_need_place').val();
        var In_Transit_ = $('#In_Transit_').val();
        var Local_purchase_ = $('#Local_purchase_').val();
        var Arrange_form_other_branch_ = $('#Arrange_form_other_branch_').val();
        var TOC_order_ = $('#TOC_order_').val();
        var no_days_taken_metal = $('#no_days_taken_metal').val();
        var no_days_taken_works = $('#no_days_taken_works').val();
        var no_days_taken_painting = $('#no_days_taken_painting').val();
        var no_days_taken_cabin = $('#no_days_taken_cabin').val();
        var repair_receipt_all_parts = $('#repair_receipt_all_parts').val();
        var _AOR_need_place = $('#_AOR_need_place').val();
        var _In_Transit_ = $('#_In_Transit_').val();
        var _Local_purchase_ = $('#_Local_purchase_').val();
        var _Arrange_form_other_branch_ = $('#_Arrange_form_other_branch_').val();
        var _TOC_order_ = $('#_TOC_order_').val();
        var repair_outside_job = $('#repair_outside_job').val();
        var delay_supp_estimate = $('#delay_supp_estimate').val();
        var delay_report_workshop = $('#delay_report_workshop').val();
        var delay_approval_supp_est = $('#delay_approval_supp_est').val();
        var approval_delay_customer = $('#approval_delay_customer').val();
        var repair_completion_bibo = $('#repair_completion_bibo').val();
        var inform_to_customer_work_completed = $('#inform_to_customer_work_completed').val();
        var repaire_delay_customer = $('#repaire_delay_customer').val();
        var repaire_surveyor_company = $('#repaire_surveyor_company').val();
        var ref_id = $('#ref_id').val();
        // Post Approval Stage Delay Analysis
        var delay_final_inspection = $('#delay_final_inspection').val();
        var delay_road_test = $('#delay_road_test').val();
        var delay_final_inspection_surveyor = $('#delay_final_inspection_surveyor').val();
        var delay_submission_invoice = $('#delay_submission_invoice').val();
        var receipt_delivery_report = $('#receipt_delivery_report').val();
        var job_card_open_close = $('#job_card_open_close').val();
        var delay_final_payment_customer = $('#delay_final_payment_customer').val();
        var delay_collect_vehicle = $('#delay_collect_vehicle').val();
        var delay_final_payment_insurance = $('#delay_final_payment_insurance').val();
        var vehicle_inward_wards = $('#vehicle_inward_wards').val();
        var gigo = $('#gigo').val();
        var post_delay_dealer = $('#post_delay_dealer').val();
        var post_delay_customer = $('#post_delay_customer').val();
        var post_surveyor_company = $('#post_surveyor_company').val();
        var ref_id = $('#ref_id').val();
        // var job_card_no = $('#job_card_no').val();

        var Vdata = $('#myForm').serialize();
		//alert("dvdstvdt");
        $.ajax({
            url:  "{{url('api/CreateComplaint')}}", //Define Post URL
            type: "post",
            data: Vdata,
            //Display Response Success Message
            success: function(response) {
				console.log(response);
                $('.wait').css("display", "none");
                $('#res_message').show();
                $('#res_message').html(response.msg);
                $('#msg_div').removeClass('d-none');
				
				alert("Data Submitted Succesfully");
                //location.reload();
				var url = "{{url('complaint-list')}}";
                
				$(location).attr('href', url);
                // $("#create_complaint").reset();
                setTimeout(function() {
                    $('#res_message').hide();
                    $('#msg_div').hide();
                }, 8000);
            },
        });


         
    });
</script>
@endsection

<div class="modal">
    <!-- Place at bottom of page -->
</div>
