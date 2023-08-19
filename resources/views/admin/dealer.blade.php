@extends("layouts.adminlayout")
@section('title','Dealer')
@section('bodycontent')
<head>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
	
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table display" id="callerlisting">
                            <thead>
                              <tr>
								<th><b>Actions</b></th> 
                                <th><b>Job card No</b></th>
                                <th><b>Plant Name</b></th>
                                <th><b>SAC Code</b></th>
                                <th><b>Accident In charge Name</b></th>
                                <th><b>Accident In charge contact Number</b></th>
                                <th><b>Zone</b></th>
                              </tr>
                            </thead>
                           
                            <tbody>
                                @isset($amsDetails)
                                @foreach ($amsDetails as $get_data)
                                @php 
                                    $rowId = base64_encode($get_data->id);
                                    /* base64_encode(): This is a PHP function used to encode data into a Base64 representation. Base64 encoding is a way to convert binary or text data into a safe format for transmission over systems that may not handle certain characters well (e.g., in URLs or email attachments). */
                                @endphp
                                <tr>
                                    <td>
                                        <a href="{{route('jobcard-delete.jobcardDelete', ['id' => $get_data->id])}}" class="btn btn-sm btn-danger"  onclick="return confirm('Do you want to delete?')">
                                            <i class="fa fa-trash-o" aria-hidden="true" style="cursor: pointer;"></i>
                                        </a>
                                    </td> 
                                    <td>
                                        <a href="{{ route('update-case',['id' =>$rowId] ) }}" class="btn btn-sm btn-primary" target="_blank" style="border-radius: 10px;"> {{ $get_data->Job_card_No }} </a>  
                                    </td>
                                    <td>{{ $get_data->Plant_Name }}</td>
                                    <td>{{ $get_data->SAC_Code }}</td>
                                    <td>{{ $get_data->Accident_In_charge_Name }}</td>
                                    <td>{{ $get_data->Accident_In_charge_contact_Number }}</td>
                                    <td>{{ $get_data->Zone }}</td>
                                </tr>
                                @endforeach
                                @endisset
                            </tbody>
                        </table>
                   </div>
                </div>
            </div>
        </div>
    
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

<script>
    $(document).ready( function () {
    $('#callerlisting').DataTable();
    } );
</script>

@endsection
