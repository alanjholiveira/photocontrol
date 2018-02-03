jQuery(function($) {

    var triggeredByChild = false;

    $('input').iCheck({
        checkboxClass: 'icheckbox_flat-purple',
        radioClass: 'iradio_flat-purple'
    });

    $('#check-all').on('ifChecked', function (event) {
        $('.check').iCheck('check');
        triggeredByChild = false;
    });

    $('#check-all').on('ifUnchecked', function (event) {
        if (!triggeredByChild) {
            $('.check').iCheck('uncheck');
        }
        triggeredByChild = false;
    });

    // Removed the checked state from "All" if any checkbox is unchecked
    $('.check').on('ifUnchecked', function (event) {
        triggeredByChild = true;
        $('#check-all').iCheck('uncheck');
    });

    $('.check').on('ifChecked', function (event) {
        if ($('.check').filter(':checked').length == $('.check').length) {
            $('#check-all').iCheck('check');
        }
    });

    //Initialize Select2 Elements
    $('.select2').select2();


    $('.submitbuttondel').on('click', function (e) {

        var form = $(this).parents('#frmDelete');
        e.preventDefault();

        var url = $("#frmDelete").attr("action");
        var total = $('input[name="table_recordsId[]"]:checkbox:checked').length;
        var ids = $('input[name="table_recordsId[]"]:checked').map(function () {
            return this.value;
        }).get();

        swal({
                title: "Are you sure?",
                text: "Your will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            },
            function(){
                setTimeout(function() {
                    $.ajax({
                        url: url,
                        type: "delete",
                        dataType: 'json',
                        data: {ids: ids},
                        success: function (data) {
                            swal("Deleted!", data.msg, "success");
                        },
                        error: function (data) {
                            swal("Warning!", data.responseJSON.msg, "error");
                        }
                    });
                }, 2000);
            });

    });


});