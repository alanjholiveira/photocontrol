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


    // Delete one or more records in the database
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
                            swal("Deleted!", data.message, "success");
                        },
                        error: function (data) {
                            swal("Warning!", data.responseJSON.message, "error");
                        }
                    });
                }, 2000);
            }
        );

    });


    // Delete record button "data-action"
    $("button.remove").on('click', function(e){

        var action = $(this).data("action");
        var parent = $(this).parent();
        var csrf = $("meta[name='csrf-token']").attr('content');

        swal({
                title: "Are you sure?",
                text: "Do you want to delete this record?",
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
                        type: "delete",
                        url: action,
                        data: '_token=' + csrf,
                        beforeSend: function() {
                            parent.closest("tr").animate({'backgroundColor':'#fb6c6c'},300);
                        },
                        success: function (data) {
                            swal("Deleted!", data.message, "success");
                            parent.slideUp(300,function() {
                                parent.closest("tr").remove();
                            });
                        },
                        error: function (data) {
                            swal("Warning!", data.responseJSON.message, "error");
                        }
                    });
                }, 2000);
            }
        );
    })


});