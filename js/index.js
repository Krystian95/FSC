
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
    $('input[name="periodo"]').val(next_period);

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
    
    /* Slider range parametri per tutti i prodotti */
    var sliderPrezzoRange = new Slider('#prezzoRange', {});
    var sliderProduttivitaRange = new Slider('#produttivitaRange', {});
    var sliderImpattoGhgsRange = new Slider('#impattoGhgsRange', {});
    var sliderImpattoPmRange = new Slider('#impattoPmRange', {});
    var sliderPercentualeAnimaliPianteRange = new Slider("#percentuale_animali_piante_tot_range", { id: "percentuale_animali_piante_tot_range", min: 0, max: 100, value: 50 });
    
    $('#parametriRandom').on('click', function (event) {
       
        var prezzoRange = $('#prezzoRange').val();
        var arrayPrezzoRange = prezzoRange.split(',');
        
        var produttivitaRange = $('#produttivitaRange').val();
        var arrayProduttivitaRange = produttivitaRange.split(',');
        
        var impattoGhgsRange = $('#impattoGhgsRange').val();
        var arrayImpattoGhgsRange = impattoGhgsRange.split(',');
        
        var impattoPmRange = $('#impattoPmRange').val();
        var arrayImpattoPmRange = impattoPmRange.split(',');
        
        console.log(arrayPrezzoRange);
        console.log(arrayProduttivitaRange);
        console.log(arrayImpattoGhgsRange);
        console.log(arrayImpattoPmRange);
    });
    
    /* Nascondi bottone chiudi finestra */
    document.getElementById("chiudiFinestraPop").style.display = "none";
    document.getElementById("chiudiFinestraEnv").style.display = "none";
    document.getElementById("chiudiFinestraExtra").style.display = "none";
        
    var itemsProd = ['manzo', 'pollo', 'maiale', 'cavallo', 'tacchino', 'patate', 'zucchine', 'peperoni', 'melanzane',
            'pomodori', 'grano', 'riso', 'melo', 'pero', 'arancio'];
        
    $(itemsProd).each(function (index, value) {
        document.getElementById("chiudiFinestra" + value + "").style.display = "none";
    });
    
    /* Gestione scroll modal richiamate dentro modal principale */
    $(document).find('.child-modal').on('hidden.bs.modal', function () {
        console.log('hiding child modal');
        $('body').addClass('modal-open');
    });

    var current_period = getCurrentMonthYear();
    $('input[name="periodo"]').val(current_period);

    var utils = new Utils();

    /*
     * Start */
     
    $('#start').on('click', function (event) {
        var params = {};
        params['Action'] = 'Start';
        params['Data'] = {};
        current_period = $('input[name="periodo"]').val();
        params['Data']['Period'] = current_period;

        var response = utils.performAjaxCall(params);
        performResponseActions(current_period, response);

        var iterations = 100;

        // Next Iteration(s)
        
        setInterval(function () {
            //while (iterations > 0) {
            var params = {};
            params['Action'] = 'Period_Iteration';
            params['Data'] = {};
            current_period = $('input[name="periodo"]').val();
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
        document.getElementById("chiudiFinestraPop").style.display = "block";
        document.getElementById("chiudiFinestraEnv").style.display = "block";
        document.getElementById("chiudiFinestraExtra").style.display = "block";
        
        var itemsProd = ['manzo', 'pollo', 'maiale', 'cavallo', 'tacchino', 'patate', 'zucchine', 'peperoni', 'melanzane',
            'pomodori', 'grano', 'riso', 'melo', 'pero', 'arancio'];
        
        $(itemsProd).each(function (index, value) {
            document.getElementById("chiudiFinestra" + value + "").style.display = "block";
        });

        /* Disabilita gli elementi nelle finestre modali */
        $('#discardChangesPop').prop('disabled', true);
        $('#saveChangesPop').prop('disabled', true);
        $('#discardChangesEnv').prop('disabled', true);
        $('#saveChangesEnv').prop('disabled', true);
        $('#discardChangesProd').prop('disabled', true);
        $('#saveChangesProd').prop('disabled', true);
        $('#discardChangesExtra').prop('disabled', true);
        $('#saveChangesExtra').prop('disabled', true);
        
        var itemsPopEnvExtra = ['popolazione_iniziale', 'tendenza_mangiare_carne', 'salute_iniziale_media', 'salute_iniziale_dev_stan',
        'ricchezza_media', 'ricchezza_dev_stan', 'fabbisogno_cibo_media', 'fabbisogno_cibo_dev_stan', 'oscillazioni_temperatura_media',
        'oscillazioni_temperatura_ampiezza', 'valore_iniziale_ghgs', 'valore_iniziale_pm', 'valore_iniziale_nh3', 'salute',
        'crescita_industria', 'crescita_popolazione', 'quantita_cibo_acquistato'];
    
        $(itemsPopEnvExtra).each(function (index, value) {
            $('input[name="' + value + '"]').prop('disabled', true);
            $('input[name="' + value + '_slider"]').prop('disabled', true);
        });
        
        $(itemsProd).each(function (index, value) {
            $('input[name="' + value + '_prezzo_slider"]').prop('disabled', true);
            $('input[name="' + value + '_prezzo"]').prop('disabled', true);
            $('input[name="' + value + '_produttivita_slider"]').prop('disabled', true);
            $('input[name="' + value + '_produttivita"]').prop('disabled', true);
            $('input[name="' + value + '_impatto_ghgs_slider"]').prop('disabled', true);
            $('input[name="' + value + '_impatto_ghgs"]').prop('disabled', true);
            $('input[name="' + value + '_impatto_pm_slider"]').prop('disabled', true);
            $('input[name="' + value + '_impatto_pm"]').prop('disabled', true);
            $('input[name="' + value + '_impatto_nh3_slider"]').prop('disabled', true);
            $('input[name="' + value + '_impatto_nh3"]').prop('disabled', true);
            $('input[name="' + value + '_influenza_produzione_ghgs_slider"]').prop('disabled', true);
            $('input[name="' + value + '_influenza_produzione_ghgs"]').prop('disabled', true);
            $('input[name="' + value + '_influenza_produzione_pm_slider"]').prop('disabled', true);
            $('input[name="' + value + '_influenza_produzione_pm"]').prop('disabled', true);
            $('input[name="' + value + '_influenza_produzione_nh3_slider"]').prop('disabled', true);
            $('input[name="' + value + '_influenza_produzione_nh3"]').prop('disabled', true);
            $('input[name="' + value + '_influenza_produzione_temperatura_slider"]').prop('disabled', true);
            $('input[name="' + value + '_influenza_produzione_temperatura"]').prop('disabled', true);
            $('input[name="' + value + '_toll_influenza_produzione_temperatura_slider"]').prop('disabled', true);
            $('input[name="' + value + '_toll_influenza_produzione_temperatura"]').prop('disabled', true);
            $('#discardChanges' + value + '').prop('disabled', true);
            $('#saveChanges' + value + '').prop('disabled', true);
        });
    });

    /* Premo il bottone pausa */
    $('#pausa').on('click', function (event) {
 
        $("#starttext").text('Continua');
        $('#start').prop('disabled', false);
    });

    /* Premo il bottone stop */
    $('#stop').on('click', function (event) {

        $('#textboxAnno').attr('value', '0/0');

        /* Abilita bottone start */
        $("#starttext").text('Start');
        $('#start').prop('disabled', false);

        /* Disabilita bottone pausa e stop */
        $('#pausa').prop('disabled', true);
        $('#stop').prop('disabled', true);

        /* Disabilita avanzamento slider */
        /* clearInterval(interval); Disattiva timer */
        $('#progressBarYear').attr('aria-valuenow', 0);
        $('#progressBarYear').attr('style', '0%');

        /* Nascondi bottone chiudi finestra */
        document.getElementById("chiudiFinestraPop").style.display = "none";
        document.getElementById("chiudiFinestraEnv").style.display = "none";
        document.getElementById("chiudiFinestraExtra").style.display = "none";
        
        var itemsProd = ['manzo', 'pollo', 'maiale', 'cavallo', 'tacchino', 'patate', 'zucchine', 'peperoni', 'melanzane',
            'pomodori', 'grano', 'riso', 'melo', 'pero', 'arancio'];
        
        $(itemsProd).each(function (index, value) {
            document.getElementById("chiudiFinestra" + value + "").style.display = "none";
        });
        
        /* Abilita gli elementi nelle finestre modali */
        $('#discardChangesPop').prop('disabled', false);
        $('#saveChangesPop').prop('disabled', false);
        $('#discardChangesEnv').prop('disabled', false);
        $('#saveChangesEnv').prop('disabled', false);
        $('#discardChangesProd').prop('disabled', false);
        $('#saveChangesProd').prop('disabled', false);
        $('#discardChangesExtra').prop('disabled', false);
        $('#saveChangesExtra').prop('disabled', false);
        
        var itemsPopEnvExtra = ['popolazione_iniziale', 'tendenza_mangiare_carne', 'salute_iniziale_media', 'salute_iniziale_dev_stan',
        'ricchezza_media', 'ricchezza_dev_stan', 'fabbisogno_cibo_media', 'fabbisogno_cibo_dev_stan', 'oscillazioni_temperatura_media',
        'oscillazioni_temperatura_ampiezza', 'valore_iniziale_ghgs', 'valore_iniziale_pm', 'valore_iniziale_nh3', 'salute',
        'crescita_industria', 'crescita_popolazione', 'quantita_cibo_acquistato'];
    
        $(itemsPopEnvExtra).each(function (index, value) {
            $('input[name="' + value + '"]').prop('disabled', false);
            $('input[name="' + value + '_slider"]').prop('disabled', false);
        });
        
        $(itemsProd).each(function (index, value) {
            $('input[name="' + value + '_prezzo_slider"]').prop('disabled', false);
            $('input[name="' + value + '_prezzo"]').prop('disabled', false);
            $('input[name="' + value + '_produttivita_slider"]').prop('disabled', false);
            $('input[name="' + value + '_produttivita"]').prop('disabled', false);
            $('input[name="' + value + '_impatto_ghgs_slider"]').prop('disabled', false);
            $('input[name="' + value + '_impatto_ghgs"]').prop('disabled', false);
            $('input[name="' + value + '_impatto_pm_slider"]').prop('disabled', false);
            $('input[name="' + value + '_impatto_pm"]').prop('disabled', false);
            $('input[name="' + value + '_impatto_nh3_slider"]').prop('disabled', false);
            $('input[name="' + value + '_impatto_nh3"]').prop('disabled', false);
            $('input[name="' + value + '_influenza_produzione_ghgs_slider"]').prop('disabled', false);
            $('input[name="' + value + '_influenza_produzione_ghgs"]').prop('disabled', false);
            $('input[name="' + value + '_influenza_produzione_pm_slider"]').prop('disabled', false);
            $('input[name="' + value + '_influenza_produzione_pm"]').prop('disabled', false);
            $('input[name="' + value + '_influenza_produzione_nh3_slider"]').prop('disabled', false);
            $('input[name="' + value + '_influenza_produzione_nh3"]').prop('disabled', false);
            $('input[name="' + value + '_influenza_produzione_temperatura_slider"]').prop('disabled', false);
            $('input[name="' + value + '_influenza_produzione_temperatura"]').prop('disabled', false);
            $('input[name="' + value + '_toll_influenza_produzione_temperatura_slider"]').prop('disabled', false);
            $('input[name="' + value + '_toll_influenza_produzione_temperatura"]').prop('disabled', false);
            $('#discardChanges' + value + '').prop('disabled', false);
            $('#saveChanges' + value + '').prop('disabled', false);
        });
    });
    
    /* Premo il bottone reset */
    $('#reset').on('click', function (event) {

        location.reload();
    });
    
    /* Premo il bottone reset popolazione */
    $('#discardChangesPop').on('click', function (event) {

        var itemsPop = ['popolazione_iniziale', 'tendenza_mangiare_carne', 'salute_iniziale_media', 'salute_iniziale_dev_stan',
        'ricchezza_media', 'ricchezza_dev_stan', 'fabbisogno_cibo_media', 'fabbisogno_cibo_dev_stan'];

        $(itemsPop).each(function (index, value) {
            $('input[name="' + value + '"]').val(0);
            $('input[name="' + value + '_slider"]').val(0);
        });
    });
    
    /* Premo il bottone reset ambiente */
    $('#discardChangesEnv').on('click', function (event) {

        var itemsEnv = ['oscillazioni_temperatura_media', 'oscillazioni_temperatura_ampiezza', 'valore_iniziale_ghgs', 'valore_iniziale_pm', 
            'valore_iniziale_nh3'];

        $(itemsEnv).each(function (index, value) {
            $('input[name="' + value + '"]').val(0);
            $('input[name="' + value + '_slider"]').val(0);
        });
    });
    
    /* Premo il bottone reset parametri extra */
    $('#discardChangesExtra').on('click', function (event) {

        var itemsExtra = ['salute', 'crescita_industria', 'crescita_popolazione', 'quantita_cibo_acquistato'];

        $(itemsExtra).each(function (index, value) {
            $('input[name="' + value + '"]').val(0);
            $('input[name="' + value + '_slider"]').val(0);
        });
    });
    
    /* Accoppia elementi slider e textbox nelle finestre imposta altri parametri popolazione e ambiente */
    var itemsPopEnvExtra = ['popolazione_iniziale', 'tendenza_mangiare_carne', 'salute_iniziale_media', 'salute_iniziale_dev_stan',
        'ricchezza_media', 'ricchezza_dev_stan', 'fabbisogno_cibo_media', 'fabbisogno_cibo_dev_stan', 'oscillazioni_temperatura_media',
        'oscillazioni_temperatura_ampiezza', 'valore_iniziale_ghgs', 'valore_iniziale_pm', 'valore_iniziale_nh3', 'salute',
        'crescita_industria', 'crescita_popolazione', 'quantita_cibo_acquistato'];

    $(itemsPopEnvExtra).each(function (index, value) {
        $(document).on('input change', 'input[name="' + value + '_slider"]', function () {
            $('input[name="' + value + '"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '"]', function () {
            $('input[name="' + value + '_slider"]').val($(this).val());
        });
    });
    
    /* Accoppia elementi slider e textbox nelle finestre imposta parametri prodotti */
    var itemsProd = ['manzo', 'pollo', 'maiale', 'cavallo', 'tacchino', 'patate', 'zucchine', 'peperoni', 'melanzane',
                'pomodori', 'grano', 'riso', 'melo', 'pero', 'arancio'];

    $(itemsProd).each(function (index, value) {
        $(document).on('input change', 'input[name="' + value + '_prezzo_slider"]', function () {
            $('input[name="' + value + '_prezzo"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_prezzo"]', function () {
            $('input[name="' + value + '_prezzo_slider"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_produttivita_slider"]', function () {
            $('input[name="' + value + '_produttivita"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_produttivita"]', function () {
            $('input[name="' + value + '_produttivita_slider"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_impatto_ghgs_slider"]', function () {
            $('input[name="' + value + '_impatto_ghgs"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_impatto_ghgs"]', function () {
            $('input[name="' + value + '_impatto_ghgs_slider"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_impatto_pm_slider"]', function () {
            $('input[name="' + value + '_impatto_pm"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_impatto_pm"]', function () {
            $('input[name="' + value + '_impatto_pm_slider"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_impatto_nh3_slider"]', function () {
            $('input[name="' + value + '_impatto_nh3"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_impatto_nh3"]', function () {
            $('input[name="' + value + '_impatto_nh3_slider"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_influenza_produzione_ghgs_slider"]', function () {
            $('input[name="' + value + '_influenza_produzione_ghgs"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_influenza_produzione_ghgs"]', function () {
            $('input[name="' + value + '_influenza_produzione_ghgs_slider"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_influenza_produzione_pm_slider"]', function () {
            $('input[name="' + value + '_influenza_produzione_pm"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_influenza_produzione_pm"]', function () {
            $('input[name="' + value + '_influenza_produzione_pm_slider"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_influenza_produzione_nh3_slider"]', function () {
            $('input[name="' + value + '_influenza_produzione_nh3"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_influenza_produzione_nh3"]', function () {
            $('input[name="' + value + '_influenza_produzione_nh3_slider"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_influenza_produzione_temperatura_slider"]', function () {
            $('input[name="' + value + '_influenza_produzione_temperatura"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_influenza_produzione_temperatura"]', function () {
            $('input[name="' + value + '_influenza_produzione_temperatura_slider"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_toll_influenza_produzione_temperatura_slider"]', function () {
            $('input[name="' + value + '_toll_influenza_produzione_temperatura"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_toll_influenza_produzione_temperatura"]', function () {
            $('input[name="' + value + '_toll_influenza_produzione_temperatura_slider"]').val($(this).val());
        });
    });

    /* Anima slider */
    $("#params-form").submit(function (event) {
        $('.progress-bar').addClass('progress-bar-animated');
    });

    initChart();
});