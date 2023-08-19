<br>
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
            <th>TAT Name</th>
            <th>Major (Days)</th>
            <th>Minor (Days)</th>
            <th>Action</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach($data as $row)
        <tr role="row">
            <td> {{$row->tatName}}</td>
            <td> {{$row->majorTat}}</td>
            <td> {{$row->minorTat}}</td>
            <td name="action" id="action">
            <button  class="btn-default btn primary"><a href="javaScript:void(0)" data-toggle="modal" data-target="#exampleModal" onclick="editform({{$row->id}})" class="btn btn-sm btn-primary"  style="border-radius: 10px;"> Edit </a> </button>
            <button   class="btn-default btn danger"><a href="javaScript:void(0)" onclick="deleteTat({{$row->id}})"    class="btn btn-sm btn-danger" style="border-radius: 10px;"> Delete </a> </button>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>