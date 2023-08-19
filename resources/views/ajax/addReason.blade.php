<form action="{{ url('save-reason') }}" id="addformdata">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Reason </label>
                <input type="text" class="form-control" name="reason" placeholder="Enter Reason" id="reason">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="slugtype" id="slugtype" value="">
            </div>
        </div>

        <div class="col-md-6">
            <button class="btn btn-primary" type="submit" style="margin: 14px; border-radius: 24px;">Save</button>
            <button type="button" class="btn btn-danger" style="margin: 14px; border-radius: 24px;"
                data-dismiss="modal">Close</button>
        </div>
    </div>
</form>


@include('includes.common')

<script>
    $(function() {
        $('#addformdata').validate({
            rules: {
                reason: {
                    required: true

                },
            },
            messages: {
                reason: "Please enter a Reason"
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

        $('#addformdata').on('submit', function(events) {
            events.preventDefault();
            var slug = $("#slug").val();
            $("#slugtype").val(slug);
            var form = $(this).serialize();
            var url = $(this).attr('action');

            if ($('#addformdata').valid()) {
                $.post(url, form, function(response) {
                    if (response.success) {
                        $('#tableBind').html(response.html);
                        toastr.success(response.message);
                    }
                    if (response.error) {
                        toastr.success(response.message);
                    }
                });
            }

        })

    });
</script>
