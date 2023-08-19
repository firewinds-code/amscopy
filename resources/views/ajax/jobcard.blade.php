<script>
    $(document).ready(function() {
        $("#caller-listing").DataTable({
            dom: "Bfrtip",
            "language": {
                "paginate": {
                    "previous": "<",
                    "next": ">"
                }
            },
            buttons: [{
                extend: "excel",
                text: "Excel",
                className: "exportExcel",
                filename: "Get_Data_Report",
                exportOptions: {
                    modifier: {
                        page: "all"
                    }
                }
            }]
        });
    });
    </script>
    <table id="caller-listing" class="table">
    <thead>
        <tr>
            <th>Job Card No</th>
            <th>Plant Name</th>
            <th>SAC Code</th>
            <th>Accident In Charge Name</th>
            <th>Accident In Charge Name Contact Number</th>
            <th>Zone</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <tr role="row">
        <td class="cls_complaint_number">{{$row->Job_card_No}}</td>
        <td> {{$row->Plant_Name}}</td>
        <td> {{$row->SAC_Code}}</td>
        <td> {{$row->Accident_In_charge_Name}}</td>
        <td> {{$row->Accident_In_charge_contact_Number}}</td>
        <td> {{$row->Zone}}</td>
        <td> @if($row->status == 'notassign') Not Assigned @else Assigned @endif</td>
        <td name="action" id="action">
        <button name="updateuser" id="updateuser" value="updateuser"  class="btn-default btn primary"><a href="{{route('update-case',['id' =>base64_encode($row->id)] )}}" class="btn btn-sm btn-primary" style="border-radius: 10px;"> Click </a> </button>
        </td>
    </tr>
    </tbody>
    </table>