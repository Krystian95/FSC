
$(function () {
    var handle = $("#custom-handle");
    
    // http://api.jqueryui.com/slider/
    $("#slider").slider({
        max: 10000,
        create: function () {
            handle.text($(this).slider("value"));
        },
        slide: function (event, ui) {
            handle.text(ui.value);
        }
    });
});