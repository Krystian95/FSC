
$(function () {
    var handle = $("#custom-handle");

    // http://api.jqueryui.com/slider/
    /*$("#slider").slider({
     max: 10000,
     create: function () {
     handle.text($(this).slider("value"));
     },
     slide: function (event, ui) {
     handle.text(ui.value);
     }
     });*/
    $(document).on('input change', 'input[name="popolazione_slider"]', function () {
        $('input[name="popolazione_textbox"]').val($(this).val());
    });
    
    $(document).on('input change', 'input[name="popolazione_textbox"]', function () {
        $('input[name="popolazione_slider"]').val($(this).val());
    });
    
    $(document).on('input change', 'input[name="ricchezza_slider"]', function () {
        $('input[name="ricchezza_textbox"]').val($(this).val());
    });
    
    $(document).on('input change', 'input[name="ricchezza_textbox"]', function () {
        $('input[name="ricchezza_slider"]').val($(this).val());
    });
    
    $(document).on('input change', 'input[name="salute_slider"]', function () {
        $('input[name="salute_textbox"]').val($(this).val());
    });
    
    $(document).on('input change', 'input[name="salute_textbox"]', function () {
        $('input[name="salute_slider"]').val($(this).val());
    });
});