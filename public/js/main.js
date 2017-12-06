
$.datepicker.setDefaults( $.datepicker.regional[ "fr" ] );
jQuery(function ($) {
    $('.datepicker').datepicker({
        dateFormat : 'dd-mm-yy',
        defaultDate : 0

    })
});