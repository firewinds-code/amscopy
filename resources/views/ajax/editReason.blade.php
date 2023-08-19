<form id="editformdata" type="post" action="{{ url('update-reason') }}">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Reason</label>

                <input type="hidden" class="form-control" value="{{ csrf_token() }}" name="_token">
                @if (isset($predata))
                    @php $id = $predata->id; @endphp
                    <input type="text" class="form-control" value="{{ $predata->delay_reason }}" name="reason"
                        placeholder="Enter Reason">
                @endif
                @if (isset($repairdata))
                    @php $id = $repairdata->id; @endphp
                    <input type="text" class="form-control" value="{{ $repairdata->repair_delay_reason }}"
                        name="reason" placeholder="Enter Reason">
                @endif
                @if (isset($postdata))
                    @php $id = $postdata->id; @endphp
                    <input type="text" class="form-control" value="{{ $postdata->post_delay_reason }}" name="reason"
                        placeholder="Enter Reason">
                @endif
                <input type="hidden" class="form-control" value="{{ $id }}" name="id">
                <input type="hidden" class="form-control" name="slugtype"
                    value="@isset($slug) {{ $slug }} @endisset">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <button class="btn btn-primary" type="submit"
                    style="margin: 14px; border-radius: 24px;">Update</button>
                <button type="button" class="btn btn-danger" style="margin: 14px; border-radius: 24px;"
                    data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</form>

@include('includes.common')

<script>
    $(function() {
        $('#editformdata').validate({
            rules: {
                reason: {
                    required: true

                }

            },
            messages: {
                reason: {
                    required: "Please enter a Reason"

                },

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        $('#editformdata').on('submit', function(events) {
            events.preventDefault();
            var form = $(this).serialize();
            var url = $(this).attr('action');


            if ($('#editformdata').valid()) {
                $.post(url, form, function(response) {
                    if (response.success) {
                        $('#tableBind').html(response.html);
                        toastr.success(response.message);
                    }
                    if (response.error) {
                        toastr.error(response.message);
                    }
                });
            }
        });
    });
</script>
