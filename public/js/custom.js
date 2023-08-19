
$('#third_party').on('change', function() {
            if( this.value == 'yes' ) { $('#spot_surveyor_dealer').attr('disabled', 'disabled');
            $('#spot_surveyor_mob_dealer').attr('disabled', 'disabled');
            $('#spot_surveyor_email_dealer').attr('disabled', 'disabled');
            $('#spot_surveyor_report_dealer').attr('disabled', 'disabled');

            $('#spot_surveyor_customer').attr('disabled', 'disabled');
            $('#spot_surveyor_mob_customer').attr('disabled', 'disabled');
            $('#spot_surveyor_email_customer').attr('disabled', 'disabled');
            $('#spot_surveyor_report_customer').attr('disabled', 'disabled');


             }
            else { $('#spot_surveyor_dealer').removeAttr('disabled');
            $('#spot_surveyor_mob_dealer').removeAttr('disabled');
            $('#spot_surveyor_email_dealer').removeAttr('disabled');
            $('#spot_surveyor_report_dealer').removeAttr('disabled');


            $('#spot_surveyor_customer').removeAttr('disabled');
            $('#spot_surveyor_mob_customer').removeAttr('disabled');
            $('#spot_surveyor_email_customer').removeAttr('disabled');
            $('#spot_surveyor_report_customer').removeAttr('disabled');
            }

    });

    $('#accident_vehicle').on('change', function() {

       if( this.value == 'yes' ) {

           $('#load_challan_dealer').attr('type', 'date');
           $('#load_challan_customer').attr('type', 'date');
           $('#decrtn_letter_dealer').attr('type', 'text');
           $('#decrtn_letter_customer').attr('type', 'text');

       } else {
           $('#load_challan_dealer').attr('type', 'text');
           $('#load_challan_customer').attr('type', 'text');
           $('#decrtn_letter_dealer').attr('type', 'date');
           $('#decrtn_letter_customer').attr('type', 'date');
       }

    });

    $('#thermal_incident').on('change', function() {
            if( this.value == 'yes' ) {
                $('#fire_brigade_dealer').attr('disabled', 'disabled');
                $('#fire_brigade_customer').attr('disabled', 'disabled');

             }
            else {

                $('#fire_brigade_dealer').removeAttr('disabled');
                $('#fire_brigade_customer').removeAttr('disabled', 'disabled');
            }

    });

    $('#Vehicle_towed').on('change', function() {
            if( this.value == 'yes' ) {
                $('#towing_bill_dealer').attr('disabled', 'disabled');
                $('#towing_bill_customer').attr('disabled', 'disabled');

             }
            else {

                $('#towing_bill_dealer').removeAttr('disabled');
                $('#towing_bill_customer').removeAttr('disabled', 'disabled');
            }

    });

    $('#theft_cases').on('change', function() {
            if( this.value == 'yes' ) {
                $('#ntc_dealer').attr('disabled', 'disabled');
                $('#ntc_customer').attr('disabled', 'disabled');

             }
            else {

                $('#ntc_dealer').removeAttr('disabled');
                $('#ntc_customer').removeAttr('disabled', 'disabled');
            }

    });



    $('#loss_damage_theft').on('change', function() {
            if( this.value == 'yes' ) {
                $('#fir_copy_dealer').attr('disabled', 'disabled');
                $('#fir_copy_customer').attr('disabled', 'disabled');

             }
            else {

               $('#fir_copy_dealer').removeAttr('disabled', 'disabled');
               $('#fir_copy_customer').removeAttr('disabled', 'disabled');
            }

    });


    $('#loss_damage_theft').on('change', function() {
            if( this.value == 'yes' ) {
                $('#fir_copy_dealer').attr('disabled', 'disabled');
                $('#fir_copy_customer').attr('disabled', 'disabled');

             }
            else {

               $('#fir_copy_dealer').removeAttr('disabled', 'disabled');
               $('#fir_copy_customer').removeAttr('disabled', 'disabled');
            }

    });


    $('#brake_policies').on('change', function() {
            if( this.value == 'yes' ) {
                $('#motor_vehicle_insp_dealer').attr('disabled', 'disabled');
                $('#motor_vehicle_insp_customer').attr('disabled', 'disabled');

             }
            else {

               $('#motor_vehicle_insp_dealer').removeAttr('disabled', 'disabled');
               $('#motor_vehicle_insp_customer').removeAttr('disabled', 'disabled');
            }

    });


    function checkValue (id) {

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

               if (delay_prepare_dealer.length == 0 || delay_submsn_docs.length == 0 || surveyor_deputation_dealer.length == 0|| delay_surveyor_deputation.length == 0|| approval_dismantling_surveyor.length == 0|| delay_dismantling_completion.length == 0|| delay_surveyor_completion.length == 0|| surveyor_approval.length == 0|| approval_delay.length == 0|| advance_payment_delay.length == 0|| delay_intimation_nsurance.length == 0|| pre_delay_dealer.length == 0|| pre_delay_customer.length == 0|| pre_surveyor_company.length == 0) $('.repdeanasis').prop('disabled', true)
               else $('.repdeanasis').removeAttr('disabled');

           });
    }
   function checkValue2 (id) {

       $(`#${id}`).on('keyup paste propertychange input keydown', function() {


       var delay_start = $("#delay_start").val();
       var delay_preparing = $("#delay_preparing").val();
       var no_days_taken_metal = $("#no_days_taken_metal").val();
       var no_days_taken_works = $("#no_days_taken_works").val();
       var no_days_taken_painting = $("#no_days_taken_painting").val();
       var no_days_taken_cabin = $("#no_days_taken_cabin").val();
       var repair_receipt_all_parts = $("#repair_receipt_all_parts").val();
       var repair_outside_job = $("#repair_outside_job").val();
       var delay_supp_estimate = $("#delay_supp_estimate").val();
       var delay_report_workshop = $("#delay_report_workshop").val();
       var delay_approval_supp_est = $("#delay_approval_supp_est").val();
       var approval_delay_customer = $("#approval_delay_customer").val();
       var repair_completion_bibo = $("#repair_completion_bibo").val();
       var repaire_delay_dealer = $("#repaire_delay_dealer").val();
       var repaire_delay_customer = $("#repaire_delay_customer").val();
       var repaire_surveyor_company = $("#repaire_surveyor_company").val();


       if (delay_start.length == 0 || delay_preparing.length == 0 || no_days_taken_metal.length == 0 || no_days_taken_works.length == 0 || no_days_taken_painting.length == 0 || no_days_taken_cabin.length == 0 || repair_receipt_all_parts.length == 0 || repair_outside_job.length == 0 || delay_supp_estimate.length == 0 || delay_report_workshop.length == 0 || delay_approval_supp_est.length == 0 || approval_delay_customer.length == 0 || repair_completion_bibo.length == 0 || repaire_delay_dealer.length == 0 || repaire_delay_customer.length == 0 || repaire_surveyor_company.length == 0  ) $('.appsdasis').prop('disabled', true)
       else $('.appsdasis').removeAttr('disabled');


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

