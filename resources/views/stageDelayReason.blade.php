@extends('layouts.adminlayout')
@section('title', 'Complaint List')
@section('bodycontent')

    <div class="content-wrapper mobcss">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="clear"></div>
                        <div class="table-responsive">
                            <h4 class="card-title" id="title"><b>Complaint List</b></h4>
                            <hr>
                            <br>
                            <span class="btn btn-primary" onclick="getData()"
                                style="border-radius: 14px; cursor: pointer;">Get Data</span>
                            @if (Auth::user()->email == 'ramjin@dispostable.com')
                            <a href="javaScript:void(0)" class="btn btn-primary" style="border-radius: 14px; float:right"
                                onclick="addReason()" data-toggle="modal" data-target="#exampleModal">Add Reason</a>
                            @endif
                            <div id="tableBind"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container" id="formdata">

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes.common')

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
                    filename: '@yield('title')',
                    exportOptions: {
                        modifier: {
                            page: 'all'
                        }
                    }
                }]
            });
        });

        function getData() {
            $.ajax({
                url: '{{ url('reason-get-data') }}',
                data: {
                    slug: "{{ Request::segment(1) }}"
                },
                success: function(response) {
                    $('#tableBind').html(response.html);
                }
            });
        }

        function addReason() {

            $.ajax({
                url: '{{ url('add-reason') }}',
                type: 'GET',
                success: function(response) {

                    $('#exampleModalLabel').text('Add Reason');
                    $('#formdata').html(response.html);

                }
            });
        }

        function deleteReason(id) {
            var result = confirm('Do you want to Delete Reason ?');
            if (result == true) {
                $.ajax({
                    url: "{{ url('delete-reason') }}",
                    type: 'GET',
                    data: {
                        "id": id
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        $('#tableBind').html(response.html);
                        table.draw();
                    }
                });
            }
        }

        function editReason(id) {
            var slug = "{{ Request::segment(1) }}";
            $.ajax({
                type: "get",
                url: "{{ url('edit-reason') }}",
                data: {
                    "id": id,
                    "slug": slug
                },
                success: function(response) {
                    $('#exampleModalLabel').text('Edit Reason');
                    $('#formdata').html(response.html);
                }

            });
        }
    </script>

@endsection
