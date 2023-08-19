@extends('layouts.masterlayout')
@section('title', 'Job Card History Days Wise')

@section('bodycontent')
<div class="content-wrapper mobcss">
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Job Card History Report</h4>
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 18px;">
                <form id="myForm" method="post" enctype="multipart/form-data" action="{{ url('job-card-report-get') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="datefrom">Job Card Number</label>
                            <span style="color: red;">*</span>
                            <input type="text" name="job_card_number_search" id="job_card_number_search"  class="form-control" placeholder="Job Card Number" required="" style="background: rgb(255, 255, 255);">
                            <div id="suggesstion"></div>
                        </div>
                        <div class="form-group col-md-6" style="position: relative;top: 15px;">
                            <input type="submit" class="btn btn-primary rounded" name="submit" value="Submit">
                            <a href="#" onclick="printDiv('ticketDataPDf')" class="btn btn-primary rounded">Generate PDF</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-12" style="border: 1px solid #ccc;" id="ticketDataPDf">

        </div>
   </div>
 </div>
</div>
@endsection
<script src="{{asset('plugins/popper/umd/popper.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src ="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
<script>
$(document).ready(function()
{
    $('#job_card_number_search').on('keyup', function()
    {
        var job_card_no = $(this).val();
        var url = "{{ url('suggestion?') }}"+job_card_no;
        var blank = "Sorry Didn't find suggestions";
        if(job_card_no != '')
        {  $.get(url, function(response) 
            {
             if(response.success)
             {
                $('#suggesstion').html(response.response);
             }
             else{
                var out = '<ul>';
                    out += "<li>" + blank + "</li>";
                    out += '</ul>';
                $('#suggesstion').html(out);
             }
            });
        }
        else{$('#suggesstion').html('');}
    });

    $('#myForm').on('submit', function(event)
    {
        event.preventDefault();
        var url  =  $(this).attr('action');
        var form =  $(this).serialize();
        $.post(url, form, function(response) 
        {
            if(response.success)
            {
            $('#ticketDataPDf').html(response.response);
            }
            else{
            var out = 'Sorry Content Not Found ! ';

            $('#ticketDataPDf').html(out);
            }
        });
    });
});

function printDiv(divName) 
{
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}

function jobcard(jobcardno)
{
    var job_card = jobcardno;
    $('#job_card_number_search').val(job_card);
    $('#suggesstion').html('');
}

</script>

