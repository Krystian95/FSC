
var chart_1;

function initChart() {

    var ctx = document.getElementById('chart_1').getContext('2d');

    chart_1 = new Chart(ctx, {
        type: 'line',
        data: {
            //labels: ['01/2019'],
            datasets: [
                {
                    label: 'Linea 1',
                    //data: [10],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Linea 2',
                    //data: [8],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            // Container for pan options
            pan: {
                // Boolean to enable panning
                enabled: true,
                // Panning directions. Remove the appropriate direction to disable 
                // Eg. 'y' would only allow panning in the y direction
                mode: 'xy',
                rangeMin: {
                    // Format of min pan range depends on scale type
                    x: null,
                    y: null
                },
                rangeMax: {
                    // Format of max pan range depends on scale type
                    x: null,
                    y: null
                },
                // Function called once panning is completed
                // Useful for dynamic data loading
                onPan: function () {
                    console.log('I was panned!!!');
                }
            },
            // Container for zoom options
            zoom: {
                // Boolean to enable zooming
                enabled: true,
                // Enable drag-to-zoom behavior
                drag: true,
                // Drag-to-zoom rectangle style can be customized
                // drag: {
                // 	 borderColor: 'rgba(225,225,225,0.3)'
                // 	 borderWidth: 5,
                // 	 backgroundColor: 'rgb(225,225,225)'
                // },

                // Zooming directions. Remove the appropriate direction to disable 
                // Eg. 'y' would only allow zooming in the y direction
                mode: 'xy',
                rangeMin: {
                    // Format of min zoom range depends on scale type
                    x: null,
                    y: null
                },
                rangeMax: {
                    // Format of max zoom range depends on scale type
                    x: null,
                    y: null
                },
                // Function called once zooming is completed
                // Useful for dynamic data loading
                onZoom: function () {
                    console.log('I was zoomed!!!');
                }
            }
        }
    }
    );
}

function performResponseActions(current_period, response_encoded) {

    var response = JSON.parse(response_encoded);
    console.log(response);
    var next_period = response.Next_Period;
    $('input[name="periodo_textbox"]').val(next_period);

    chart_1.data.labels.push(current_period);
    /**chart_1.data.datasets.forEach((dataset) => {
     var value = response['Charts']['Chart 1']['Linea 1'];
     var value = response['Charts']['Chart 1']['Linea 2'];
     dataset.data.push(value);
     });**/
    var value = response['Charts']['Chart 1']['Linea 1'];
    var value1 = response['Charts']['Chart 1']['Linea 2'];
    chart_1.data.datasets[0].data.push(value);
    chart_1.data.datasets[1].data.push(value1);
    chart_1.update();
}

function getCurrentMonthYear() {

    var today = new Date();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();

    if (mm < 10) {
        mm = '0' + mm;
    }

    return mm + '/' + yyyy;
}

$(function () {

    var current_period = getCurrentMonthYear();
    $('input[name="periodo_textbox"]').val(current_period);

    var utils = new Utils();

    /*
     * Start
     */
    $('#start').on('click', function (event) {
        var params = {};
        params['Action'] = 'Start';
        params['Data'] = {};
        current_period = $('input[name="periodo_textbox"]').val();
        params['Data']['Period'] = current_period;

        var response = utils.performAjaxCall(params);
        performResponseActions(current_period, response);

        var iterations = 100;

        /*
         * Next Iteration(s)
         */
        setInterval(function () {
            //while (iterations > 0) {
            var params = {};
            params['Action'] = 'Period_Iteration';
            params['Data'] = {};
            current_period = $('input[name="periodo_textbox"]').val();
            params['Data']['Period'] = current_period;

            var response = utils.performAjaxCall(params);
            performResponseActions(current_period, response);

            iterations--;
            //}
        }, 2000);
    });


    /* Premo il bottone start */
    $('#start').on('click', function (event) {

        /* Disabilita bottone start */
        $('#start').prop('disabled', true);

        /* Abilita bottoni pausa e stop */
        $('#pausa').prop('disabled', false);
        $('#stop').prop('disabled', false);

        /* Abilita avanzamento slider */
        /*var count = 8.3333;
         var mese = 1;
         var anno = 2019;
         
         interval = setInterval(function () {
         
         if (count < 100)
         {
         $('#textboxAnno').attr('value', mese + '/' + anno);
         $('#progressBarYear').attr('aria-valuenow', count);
         $('#progressBarYear').attr('style', 'width: ' + count + '%');
         count = count + 8.3333;
         mese++;
         } else {
         count = 0;
         mese = 0;
         anno++;
         }
         }, 1000);*/

        /* Mostra bottone chiudi finestra */
        document.getElementById("chiudiFinestra").style.display = "block";

        /* Disabilita gli elementi nella home */
        var items = ['popolazione', 'ricchezza', 'salute'];

        $(items).each(function (index, value) {
            $('input[name="' + value + '_textbox"]').prop('disabled', true);
            $('input[name="' + value + '_slider"]').prop('disabled', true);
        });

        /* Disabilita gli elementi nella finestra imposta altri parametri */
        $('#discardChanges').prop('disabled', true);
        $('#saveChanges').prop('disabled', true);

        var items = ['manzo', 'pollo', 'maiale', 'cavallo', 'tacchino', 'patate', 'zucchine', 'peperoni', 'melanzane',
            'pomodori', 'grano', 'riso', 'melo', 'pero', 'arancio'];

        $(items).each(function (index, value) {
            $('input[name="' + value + '_prezzo_textbox"]').prop('disabled', true);
            $('input[name="' + value + '_prezzo_slider"]').prop('disabled', true);
            $('input[name="' + value + '_produttivita_textbox"]').prop('disabled', true);
            $('input[name="' + value + '_produttivita_slider"]').prop('disabled', true);
        });
    });

    /* Premo il bottone pausa */
    $('#pausa').on('click', function (event) {

        /* Codice... */

    });

    /* Premo il bottone stop */
    $('#stop').on('click', function (event) {

        $('#textboxAnno').attr('value', '0/0');

        /* Abilita bottone start */
        $('#start').prop('disabled', false);

        /* Disabilita bottone pausa e stop */
        $('#pausa').prop('disabled', true);
        $('#stop').prop('disabled', true);

        /* Disabilita avanzamento slider */
        /* clearInterval(interval); Disattiva timer */
        $('#progressBarYear').attr('aria-valuenow', 0);
        $('#progressBarYear').attr('style', '0%');

        /* Nascondi bottone chiudi finestra */
        document.getElementById("chiudiFinestra").style.display = "none";

        /* Abilita gli elementi nella home */
        var items = ['popolazione', 'ricchezza', 'salute'];

        $(items).each(function (index, value) {
            $('input[name="' + value + '_textbox"]').prop('disabled', false);
            $('input[name="' + value + '_slider"]').prop('disabled', false);
        });

        /* Abilita gli elementi nella finestra imposta altri parametri */
        $('#discardChanges').prop('disabled', false);
        $('#saveChanges').prop('disabled', false);

        var items = ['manzo', 'pollo', 'maiale', 'cavallo', 'tacchino', 'patate', 'zucchine', 'peperoni', 'melanzane',
            'pomodori', 'grano', 'riso', 'melo', 'pero', 'arancio'];

        $(items).each(function (index, value) {
            $('input[name="' + value + '_prezzo_textbox"]').prop('disabled', false);
            $('input[name="' + value + '_prezzo_slider"]').prop('disabled', false);
            $('input[name="' + value + '_produttivita_textbox"]').prop('disabled', false);
            $('input[name="' + value + '_produttivita_slider"]').prop('disabled', false);
        });
    });

    /* Premo il bottone discard changes */
    $('#discardChanges').on('click', function (event) {

        /* Azzera parametri */
        var items = ['manzo', 'pollo', 'maiale', 'cavallo', 'tacchino', 'patate', 'zucchine', 'peperoni', 'melanzane',
            'pomodori', 'grano', 'riso', 'melo', 'pero', 'arancio'];

        $(items).each(function (index, value) {
            $('input[name="' + value + '_prezzo_textbox"]').val(0);
            $('input[name="' + value + '_prezzo_slider"]').val(0);
            $('input[name="' + value + '_produttivita_textbox"]').val(0);
            $('input[name="' + value + '_produttivita_slider"]').val(0);
        });
    });

    /* Accoppia elementi slider e textbox nella home */
    var items = ['popolazione', 'ricchezza', 'salute'];

    $(items).each(function (index, value) {
        $(document).on('input change', 'input[name="' + value + '_slider"]', function () {
            $('input[name="' + value + '_textbox"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_textbox"]', function () {
            $('input[name="' + value + '_slider"]').val($(this).val());
        });
    });

    /* Accoppia elementi slider e textbox nella finestra imposta altri parametri*/
    var items = ['manzo', 'pollo', 'maiale', 'cavallo', 'tacchino', 'patate', 'zucchine', 'peperoni', 'melanzane',
        'pomodori', 'grano', 'riso', 'melo', 'pero', 'arancio'];

    $(items).each(function (index, value) {
        $(document).on('input change', 'input[name="' + value + '_prezzo_slider"]', function () {
            $('input[name="' + value + '_prezzo_textbox"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_prezzo_textbox"]', function () {
            $('input[name="' + value + '_prezzo_slider"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_produttivita_slider"]', function () {
            $('input[name="' + value + '_produttivita_textbox"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_produttivita_textbox"]', function () {
            $('input[name="' + value + '_produttivita_slider"]').val($(this).val());
        });
    });

    /* Anima slider */
    $("#params-form").submit(function (event) {
        $('.progress-bar').addClass('progress-bar-animated');
    });

    initChart();
});