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
						<h4 class="card-title">Post Service Feedback List</h4>
						<br>
						<span class="btn btn-primary" onclick="getData()" style="border-radius: 14px; cursor: pointer;">Get Data</span>
						<hr>
						<div id="tableBind"></div>
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
				exportOptions: {
					modifier: {
						page: 'all'
					}
				}
			}]
		});
	});

	// Function to show the loader
	function showLoader() {
			$('#ajaxLoader').show();
		}

    // Function to hide the loader
    function hideLoader() {
        // Stop the loader animation by removing the CSS animation property
        $('#ajaxLoader').css('animation', 'none');
        $('#ajaxLoader').hide();
    }

	// Function to hide the loader
	function getData(){
		
		showLoader(); // Show the loader before starting the AJAX request
	
		$.ajax({ url: '{{url("get-psf-data")}}',
				success: function(response){
					
					$('#tableBind').html(response.html);
				},
				complete: function() {
					// Hide the loader when the AJAX request completes (whether success or error)
					hideLoader();
				}
		});
	}


	$('#searchForm').on('submit',function(e){
	e.preventDefault();
	var form = $(this).serialize();
	var  url = $(this).attr('action');
	$.post(url,form,function(response)
	{
		if(response.success)
		{
			$('#tableBind').html(response.html);
			$('.message').addClass('btn btn-success').html('Record Found Successfully !').fadeIn("slow").fadeIn(3000).fadeOut(3000);
		}
		if(response.error)
		{
			$('.message').addClass('btn btn-danger').html('Record Not Found !').fadeIn("slow").fadeIn(3000).fadeOut(3000);
		}
		if(response.warning)
		{
			$('.message').addClass('btn btn-danger').html(response.message).fadeIn("slow").fadeIn(3000).fadeOut(3000);
		}
	});

});

</script>


<style>
	.loader {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background: url('images/loading.gif') center no-repeat #fff;
	}
	</style> 

@endsection
