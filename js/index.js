
function initChart() {

    var ctx = document.getElementById("myChart").getContext('2d');
    
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Red", "Blue", "Yellow 66", "Green", "Purple", "Orange"],
            datasets: [{
                    label: 'Legenda',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 255, 255, 0)'
                    ],
                    borderColor: [
                        'rgba(0, 119, 255, 1)'
                    ],
                    borderWidth: 1
                }]
        },
        options: {
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            }
        }
    });
}

$(function () {

    /* Popolazione */

    $(document).on('input change', 'input[name="popolazione_slider"]', function () {
        $('input[name="popolazione_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="popolazione_textbox"]', function () {
        $('input[name="popolazione_slider"]').val($(this).val());
    });

    /* Ricchezza */

    $(document).on('input change', 'input[name="ricchezza_slider"]', function () {
        $('input[name="ricchezza_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="ricchezza_textbox"]', function () {
        $('input[name="ricchezza_slider"]').val($(this).val());
    });

    /* Salute */

    $(document).on('input change', 'input[name="salute_slider"]', function () {
        $('input[name="salute_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="salute_textbox"]', function () {
        $('input[name="salute_slider"]').val($(this).val());
    });

    /* Anima slider */

    $("#params-form").submit(function (event) {
        $('.progress-bar').addClass('progress-bar-animated');
    });

    initChart();
});