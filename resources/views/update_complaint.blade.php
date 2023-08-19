@extends("layouts.masterlayout")
@section('title','Complaint List')
@section('bodycontent')
<div class="content-wrapper mobcss">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<div class="clear"></div>
					<div class="table-responsive">
						<h4 class="card-title">Complaint Update</h4>
						<br />
                        <form name="myForm" method="post" enctype="multipart/form-data" action="{{url('store-update-complaint')}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="row">
                                <div class="form-group col-md-3">
                                   <label>Job Card Number</label>
                                   <input type="text" name="job_card" id="job_card" class="form-control" value="{{$query[0]->job_card}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Registration Number</label>
                                    <input type="text" name="reg_no" id="reg_no" class="form-control" value="{{$query[0]->reg_no}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Verified In Vahan</label>
                                    <input type="text" name="verified_in_vahan" id="verified_in_vahan" class="form-control" value="{{$query[0]->verified_in_vahan}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Model</label>
                                    <input type="text" name="model" id="model" class="form-control" value="{{$query[0]->model}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Fuel Type</label>
                                    <input type="text" name="fuel_type" id="fuel_type" class="form-control" value="{{$query[0]->fuel_type}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Chassis Number</label>
                                    <input type="text" name="chassis_number" id="chassis_number" class="form-control" value="{{$query[0]->chassis_number}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Owner Name</label>
                                    <input type="text" name="owner_name" id="owner_name" class="form-control" value="{{$query[0]->owner_name}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Driver Name Contact</label>
                                    <input type="text" name="driver_name_contact" id="driver_name_contact" class="form-control" value="{{$query[0]->driver_name_contact}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Driving License Number</label>
                                    <input type="text" name="driving_license_number" id="driving_license_number" class="form-control" value="{{$query[0]->driving_license_number}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Driver Statement</label>
                                    <input type="text" name="driver_statement" id="driver_statement" class="form-control" value="{{$query[0]->driver_statement}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Insurance Policy Number</label>
                                    <input type="text" name="insurance_policy_number" id="insurance_policy_number" class="form-control" value="{{$query[0]->insurance_policy_number}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Insurance Name</label>
                                    <input type="text" name="name_of_the_insurance" id="name_of_the_insurance" class="form-control" value="{{$query[0]->name_of_the_insurance}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Insurance Type</label>
                                    <input type="text" name="type_of_insurance" id="type_of_insurance" class="form-control" value="{{$query[0]->type_of_insurance}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Policy Valid Date</label>
                                    <input type="text" name="policy_validity_date" id="policy_validity_date" class="form-control" value="{{$query[0]->policy_validity_date}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Date Of Accident</label>
                                    <input type="text" name="date_of_accident" id="date_of_accident" class="form-control" value="{{$query[0]->date_of_accident}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Location Of the Accident</label>
                                    <input type="text" name="location_of_the_accident" id="location_of_the_accident" class="form-control" value="{{$query[0]->location_of_the_accident}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Is 3<sup>rd</sup> Party Involved</label>
                                    <input type="text" name="is_third_party_involved" id="is_third_party_involved" class="form-control" value="{{$query[0]->is_third_party_involved}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>3<sup>rd</sup> party</label>
                                    <input type="text" name="third_party" id="third_party" class="form-control" value="{{$query[0]->third_party}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>3<sup>rd</sup> Response</label>
                                    <input type="text" name="third_party_response" id="third_party_response" class="form-control" value="{{$query[0]->third_party_response}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Spot Survey Remarks</label>
                                    <input type="text" name="spot_survey_remarks" id="spot_survey_remarks" class="form-control" value="{{$query[0]->spot_survey_remarks}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Vehicle Reporting Date At Workshop</label>
                                    <input type="text" name="vehicle_reporting_date_at_workshop" id="vehicle_reporting_date_at_workshop" class="form-control" value="{{$query[0]->vehicle_reporting_date_at_workshop}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Name  Of the Workshop</label>
                                    <input type="text" name="name_of_the_workshop" id="name_of_the_workshop" class="form-control" value="{{$query[0]->name_of_the_workshop}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>SAC Code Of The Workshop</label>
                                    <input type="text" name="sac_code_of_the_workshop" id="sac_code_of_the_workshop" class="form-control" value="{{$query[0]->sac_code_of_the_workshop}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Mode Of Claims</label>
                                    <input type="text" name="mode_of_claims" id="mode_of_claims" class="form-control" value="{{$query[0]->mode_of_claims}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>job Card Datetime</label>
                                    <input type="text" name="job_card_datetime" id="job_card_datetime" class="form-control" value="{{$query[0]->job_card_datetime}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Estimated Datetime</label>
                                    <input type="text" name="estimated_datetime" id="estimated_datetime" class="form-control" value="{{$query[0]->estimated_datetime}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Estimate Amount</label>
                                    <input type="text" name="estimate_amount" id="estimate_amount" class="form-control" value="{{$query[0]->estimate_amount}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Major Minor</label>
                                    <input type="text" name="major_minor" id="major_minor" class="form-control" value="{{$query[0]->major_minor}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>List Of Pending Documents</label>
                                    <input type="text" name="list_of_pending_documents" id="list_of_pending_documents" class="form-control" value="{{$query[0]->list_of_pending_documents}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>All Documents Submitted Date</label>
                                    <input type="text" name="all_documents_submitted_date" id="all_documents_submitted_date" class="form-control" value="{{$query[0]->all_documents_submitted_date}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Surveyor Name Contact</label>
                                    <input type="text" name="surveyor_name_contact" id="surveyor_name_contact" class="form-control" value="{{$query[0]->surveyor_name_contact}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Surveor Initial Inspection</label>
                                    <input type="text" name="surveor_initial_inspection" id="surveor_initial_inspection" class="form-control" value="{{$query[0]->surveor_initial_inspection}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Approval For Dismantling</label>
                                    <input type="text" name="approval_for_dismantling" id="approval_for_dismantling" class="form-control" value="{{$query[0]->approval_for_dismantling}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Dismantling Completion</label>
                                    <input type="text" name="dismantling_completion" id="dismantling_completion" class="form-control" value="{{$query[0]->dismantling_completion}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Salvage Value Agreed</label>
                                    <input type="text" name="salvage_value_agreed" id="salvage_value_agreed" class="form-control" value="{{$query[0]->salvage_value_agreed}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Surveyor Approval For Start Of Work</label>
                                    <input type="text" name="surveyor_approval_for_start_of_work" id="surveyor_approval_for_start_of_work" class="form-control" value="{{$query[0]->surveyor_approval_for_start_of_work}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Advance Payment From Customer</label>
                                    <input type="text" name="advance_payment_from_customer" id="advance_payment_from_customer" class="form-control" value="{{$query[0]->advance_payment_from_customer}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Advance Payment From Customer DateTime</label>
                                    <input type="text" name="advance_payment_from_customer_datetime" id="advance_payment_from_customer_datetime" class="form-control" value="{{$query[0]->advance_payment_from_customer_datetime}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Advance Payment From Insurance</label>
                                    <input type="text" name="advance_payment_from_insurance" id="advance_payment_from_insurance" class="form-control" value="{{$query[0]->advance_payment_from_insurance}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Advance Payment From Insurance DateTime</label>
                                    <input type="text" name="advance_payment_from_insurance_datetime" id="advance_payment_from_insurance_datetime" class="form-control" value="{{$query[0]->advance_payment_from_insurance_datetime}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Start Of Work</label>
                                    <input type="text" name="start_of_work" id="start_of_work" class="form-control" value="{{$query[0]->start_of_work}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Supplimentary Estimate</label>
                                    <input type="text" name="supplimentary_estimate" id="supplimentary_estimate" class="form-control" value="{{$query[0]->supplimentary_estimate}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Supplimentary Approval</label>
                                    <input type="text" name="supplimentary_approval" id="supplimentary_approval" class="form-control" value="{{$query[0]->supplimentary_approval}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Repair Completion</label>
                                    <input type="text" name="repair_completion" id="repair_completion" class="form-control" value="{{$query[0]->repair_completion}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Intimation For Final Inspection</label>
                                    <input type="text" name="intimation_for_final_inspection" id="intimation_for_final_inspection" class="form-control" value="{{$query[0]->intimation_for_final_inspection}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Final Inspection</label>
                                    <input type="text" name="final_inspection" id="final_inspection" class="form-control" value="{{$query[0]->final_inspection}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Proforma Submission</label>
                                    <input type="text" name="proforma_submission" id="proforma_submission" class="form-control" value="{{$query[0]->proforma_submission}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Delivery Order</label>
                                    <input type="text" name="delivery_order" id="delivery_order" class="form-control" value="{{$query[0]->delivery_order}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>JobCard Closed</label>
                                    <input type="text" name="jc_closed" id="jc_closed" class="form-control" value="{{$query[0]->jc_closed}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Balance Payment From Customer</label>
                                    <input type="text" name="balance_payment_from_customer" id="balance_payment_from_customer" class="form-control" value="{{$query[0]->balance_payment_from_customer}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Vehicle Delivery</label>
                                    <input type="text" name="vehicle_delivery" id="vehicle_delivery" class="form-control" value="{{$query[0]->vehicle_delivery}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Bill Value To Customer</label>
                                    <input type="text" name="bill_value_to_customer" id="bill_value_to_customer" class="form-control" value="{{$query[0]->bill_value_to_customer}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Bill Value To Insurance</label>
                                    <input type="text" name="bill_value_to_insurance" id="bill_value_to_insurance" class="form-control" value="{{$query[0]->bill_value_to_insurance}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Current Repair Stage</label>
                                    <input type="text" name="current_repair_stage" id="current_repair_stage" class="form-control" value="{{$query[0]->current_repair_stage}}" disabled/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Status</label>
                                    <input type="text" name="status" id="status" class="form-control" value="{{$query[0]->status}}" disabled/>
                                </div>

                            </div>
                        </form>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
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
					exportOptions: { modifier: { page: 'all'} }
				}]
		});
	});

</script>
@endsection
