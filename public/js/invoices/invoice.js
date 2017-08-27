$(document).ready(function () {
    $('#dp1').datepicker({
        format: 'dd-mm-yyyy'
    }).on('changeDate', function (e) {
        $(this).datepicker('hide');
    });

    $(document).on('change', '#select_owner', function (e) {
        e.preventDefault();
        var owner_id = $(this).val();

        if (owner_id !== '') {
            $.ajax({
                url: window.owner_filter_url,
                data: {
                'owner_id': owner_id
            },
            headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
            beforeSend: function () {
                $('#owner_lots').removeClass('form-group').html('');
            },
            success: function (response) {
                if (response.status === true) {
                    $('#owner_lots').addClass('form-group').html(response.view);
                }
            },
            type: 'POST'
        });
        }
    });
});