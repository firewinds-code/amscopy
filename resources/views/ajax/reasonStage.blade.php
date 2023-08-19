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
<input type="hidden" name="slug" id="slug"
    value="@isset($slug) {{ $slug }} @endisset">
<table id="caller-listing" class="table">
    <thead>
        <tr>
            <th>Reason</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>

        @if (isset($repairdata))
            @foreach ($repairdata as $row)
                <tr role="row">
                    <td> {{ $row->repair_delay_reason }}</td>
                    <td name="action" id="action">
                        <button class="btn-default btn primary"><a href="javaScript:void(0)"
                                onclick="editReason({{ $row->id }})" class="btn btn-sm btn-primary"
                                style="border-radius: 10px;" data-toggle="modal" data-target="#exampleModal"> Edit
                            </a> </button>
                        <button class="btn-default btn danger"><a href="javaScript:void(0)"
                                onclick="deleteReason({{ $row->id }})" class="btn btn-sm btn-danger"
                                style="border-radius: 10px;"> Delete </a> </button>
                    </td>
                </tr>
            @endforeach
        @endif
        @if (isset($predata))
            @foreach ($predata as $row)
                <tr role="row">
                    <td> {{ $row->delay_reason }}</td>
                    <td name="action" id="action">
                        <button class="btn-default btn primary"><a href="javaScript:void(0)"
                                onclick="editReason({{ $row->id }})" class="btn btn-sm btn-primary"
                                style="border-radius: 10px;" data-toggle="modal" data-target="#exampleModal"> Edit
                            </a> </button>
                        <button class="btn-default btn danger"><a href="javaScript:void(0)"
                                onclick="deleteReason({{ $row->id }})" class="btn btn-sm btn-danger"
                                style="border-radius: 10px;"> Delete </a> </button>
                    </td>
                </tr>
            @endforeach
        @endif
        @if (isset($postdata))
            @foreach ($postdata as $row)
                <tr role="row">
                    <td> {{ $row->post_delay_reason }}</td>
                    <td name="action" id="action">
                        <button class="btn-default btn primary"><a href="javaScript:void(0)"
                                onclick="editReason({{ $row->id }})" class="btn btn-sm btn-primary"
                                style="border-radius: 10px;" data-toggle="modal" data-target="#exampleModal"> Edit
                            </a> </button>
                        <button class="btn-default btn primary"><a href="javaScript:void(0)"
                                onclick="deleteReason({{ $row->id }})" class="btn btn-sm btn-danger"
                                style="border-radius: 10px;"> Delete </a> </button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
