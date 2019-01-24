
function Utils() {}
;

Utils.prototype.performAjaxCall = function (params) {

    var resp = null;
    console.log(params);

    $.ajax({
        url: './class/controllers/Controller.php',
        data: params,
        type: 'POST',
        async: false,
        success: function (response) {
            resp = response;
        },
        error: function (response) {
            resp = response;
        }
    });

    return resp;
};