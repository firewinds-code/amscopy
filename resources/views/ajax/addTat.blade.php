<form action="{{url('save-tat')}}" id="addformdata">
   <div class="row"> 
    <div class="col-md-6"> 
  <div class="form-group">
      <label for="exampleInputEmail1">TAT Name</label>
      <input type="text" class="form-control"  name="tat_name" placeholder="Enter TAT Name">
      <input type="hidden"  name="_token" value="{{csrf_token()}}">
    </div>
    </div>
    <div class="col-md-6"> 
     <div class="form-group">
        <label for="exampleInputEmail1">Major TAT (Days)</label>
        <input type="number" class="form-control"  name="tat_days_major" placeholder="Enter Major TAT Days">
      </div>
    </div>
    
   <div class="col-md-6">
      <div class="form-group">
        <label for="exampleInputEmail1">Minor TAT (Days)</label>
        <input type="number" class="form-control"  name="tat_days_minor" placeholder="Enter Minor TAT Days">
      </div>
   </div>
      <div class="col-md-6">
        <button class="btn btn-primary" type="submit" style="margin: 14px; border-radius: 24px;">Save</button>         

        <button type="button" class="btn btn-danger" style="margin: 14px; border-radius: 24px;" data-dismiss="modal">Close</button>
      </div>
   </div>
</form>



@include('includes.common')
<script>
  $(function(){


    $('#addformdata').validate({
    rules: {
      tat_name: {
        required: true
        
      },
      tat_days_major: {
        required: true
        
      },
      tat_days_minor: {
        required: true
      },
    },
    messages: {
      tat_name: {
        required: "Please enter a TAT"
     
      },
      tat_days_major: {
        required: "Please provide a Major Days"
       
      },
      tat_days_minor: "Please provide a Minor Days"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });




$('#addformdata').on('submit',function(events){
  events.preventDefault();
 var form  = $(this).serialize();
 var url  = $(this).attr('action');
 if($('#addformdata').valid())
 {
  $.post(url,form,function(response){
    if(response.success)
     {
      $('#tableBind').html(response.html);
       toastr.success(response.message);
     }
     if(response.error)
     {
      toastr.success(response.message);
     }
  });
 }
  
})

  });
  </script>