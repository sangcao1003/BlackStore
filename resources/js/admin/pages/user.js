$(function () {
    $('.select2').select2({
        minimumInputLength: 0,
        width: '100%',
    });

    $('.birthday').datetimepicker({
        format: 'Y/m/d',
        timepicker: false,
    });
});