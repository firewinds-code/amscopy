<form id="editformdata" type="post" action="{{url('update-tat')}}" >
  <div class="row">
    <div class="col-md-6">  
  <div class="form-group">
      <label >TAT Name</label>
      <input type="hidden" class="form-control" value="{{$row->id}}" name="id">
      <input type="hidden" class="form-control" value="{{ csrf_token()}}" name="_token">
      <input type="text" class="form-control" value="{{$row->tatName}}" name="tatName" placeholder="Enter TAT Name">
    </div>
    </div>
    <div class="col-md-6">
     <div class="form-group">
        <label >Major TAT (Days)</label>
        <input type="number" class="form-control" value="{{$row->majorTat}}" name="majorTat" placeholder="Enter Major TAT Days">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label >Minor TAT (Days)</label>
        <input type="number" class="form-control" value="{{$row->minorTat}}" name="minorTat" placeholder="Enter Minor TAT Days">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
      <button class="btn btn-primary" type="submit" style="margin: 14px; border-radius: 24px;">Update</button> 
      <button type="button" class="btn btn-danger" style="margin: 14px; border-radius: 24px;" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</form>

@include('includes.common')

<script>
  $(function()
  {
    $('#editformdata').validate({
    rules: {
      tatName: {
        required: true
        
      },
      majorTat: {
        required: true
        
      },
      minorTat: {
        required: true
      },
    },
    messages: {
      tatName: {
        required: "Please enter a TAT"
     
      },
      majorTat: {
        required: "Please provide a Major Days"
       
      },
      minorTat: "Please provide a Minor Days"
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

$('#editformdata').on('submit',function(events){
  events.preventDefault();
   var form  = $(this).serialize();
   var url  = $(this).attr('action');
   if($('#editformdata').valid())
   {
    $.post(url,form,function(response){
     if(response.success)
     { $('#tableBind').html(response.html);
       toastr.success(response.message);
     }
     if(response.error)
     {
      toastr.error(response.message);
     }
    
   });
  }
  
});

  });
  </script>