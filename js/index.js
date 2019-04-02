
var chart_1;
var chart_2;
var sliders = [];
var slider_numero_prodotti;
var slider_percentuale_carne_vegetali;
var charts = {};

function getDefaultChart(chart_id) {
    return new Chart(document.getElementById(chart_id).getContext('2d'), {
        type: 'line',
        data: {
            datasets: []
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
            pan: {
                enabled: true,
                mode: 'xy',
                rangeMin: {x: null, y: null},
                rangeMax: {x: null, y: null},
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
    });
}

/*
 * Move the specified chart to the specified destination.
 * @param {type} chart_id Te chart id (Title)
 * @param {type} destination The class name (without the dot '.')
 * @returns {undefined}
 */
function moveChart(chart_id, destination) {

    $('.' + destination).find('.chart').removeClass('shown').addClass('hidden');
    var chart = $('[id="' + chart_id + '"]');
    chart.detach();
    $('.' + destination).append(chart);
    chart.removeClass('hidden').addClass('shown');
}

function initCharts() {

    var charts_settings = [
        {
            title: 'Popolazione',
            lines: ['Popolazione']
        },
        {
            title: 'Nati e morti',
            lines: ['Nati', 'Morti']
        },
        {
            title: 'Salute media',
            lines: ['Salute media']
        },
        {
            title: 'Temperatura',
            lines: ['Temperatura']
        },
        {
            title: 'Agenti atmosferici',
            lines: ['GHGS', 'PM', 'NH3']
        },
        // do not move objects, they are linked by index for selectModProd
        {
            title: 'Capacità produttiva',
            lines: []
        },
        {
            title: 'Produzione',
            lines: []
        },
        {
            title: 'Vendite',
            lines: []
        },
    ];

    // Modalità prodotti

    var selectModProd = String($('#selectModProd').val());

    if (selectModProd == 1) { // Tutti i prodotti
        var numero_prodotti = String(slider_numero_prodotti.getValue());
        for (var i = 0; i < numero_prodotti; i++) {
            charts_settings[5].lines.push(i);
            charts_settings[6].lines.push(i);
            charts_settings[7].lines.push(i);
        }
    } else if (selectModProd == 0) { // Singoli prodotti
        var prodotti_default = ['Manzo', 'Pollo', 'Maiale', 'Cavallo', 'Tacchino', 'Patate', 'Zucchine', 'Peperoni', 'Melanzane', 'Pomodori', 'Grano', 'Riso', 'Melo', 'Pero', 'Arancio'];
        for (var i = 0; i < prodotti_default.length; i++) {
            charts_settings[5].lines.push(prodotti_default[i]);
            charts_settings[6].lines.push(prodotti_default[i]);
            charts_settings[7].lines.push(prodotti_default[i]);
        }
    }

    // Creazione grafici

    for (var i = 0; i < charts_settings.length; i++) {

        var chart_title = charts_settings[i].title;

        $('.charts_left').append('<canvas id="' + chart_title + '" class="chart" width="1550" height="1000"></canvas>');

        var chart = getDefaultChart(chart_title);

        for (var j = 0; j < charts_settings[i].lines.length; j++) {

            var line = {
                label: charts_settings[i].lines[j],
                data: [],
                backgroundColor: ['rgba(255, 99, 132, 0)'],
                borderColor: ['rgba(255, 99, 132, 1)'],
                borderWidth: 1
            };

            chart.data.datasets.push(line);
        }

        chart.update();

        charts[chart_title] = chart;
    }

    /*
     * Visualizzazione iniziale grafici (sinistra e destra)
     */

    moveChart('Popolazione', 'charts_left');
    moveChart('Nati e morti', 'charts_right');
}

function performResponseActions(current_period, response_encoded) {

    var response = JSON.parse(response_encoded);
    /*console.log(response);*/
    var next_period = response.Next_Period;
    $('input[name="periodo"]').val(next_period);

    $.each(response['Charts'], function (chart_title, value_outer) {
        /*console.log(charts[chart_title]);*/
        charts[chart_title].data.labels.push(current_period);
        var count = 0;
        $.each(response['Charts'][chart_title], function (chart_line, value_inner) {
            //alert(key + ": " + value);
            var value = response['Charts'][chart_title][chart_line];
            /*console.log(charts[chart_title].data.datasets[0]);*/
            charts[chart_title].data.datasets[count].data.push(value);
            count++;
        });
        charts[chart_title].update();
    });


    /**chart_1.data.datasets.forEach((dataset) => {
     var value = response['Charts']['Chart 1']['Linea 1'];
     var value = response['Charts']['Chart 1']['Linea 2'];
     dataset.data.push(value);
     });**/

    /*chart_1.data.labels.push(current_period);
     var value_1 = response['Charts']['Popolazione']['Popolazione'];
     chart_1.data.datasets[0].data.push(value_1);
     chart_1.update();*/
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

function getInputValues() {

    var data = {};

    $('input.form-control.textbox').each(function (index, value) {
        var name = $(this).attr('name');
        var value = $(this).val();
        data[name] = value;
    });

    data['selectModProd'] = String($('#selectModProd').val());
    data['numero_prodotti'] = String(slider_numero_prodotti.getValue());
    data['percentuale_carne_vegetali'] = String(slider_percentuale_carne_vegetali.getValue());

    $(sliders).each(function (index, value) {
        var name = this.element.id;
        data[name + '_min'] = String(this.getValue()[0]);
        data[name + '_max'] = String(this.getValue()[1]);
    });

    //console.log(data);
    return data;
}

$(function () {

    $(".menu-left .dropdown-menu li a").not('.disabled').click(function () {

        console.log($(this).html());

        $(this).parents(".dropdown").find('.btn').html('<span id="text-left">' + $(this).html() + '</span><span class="caret"></span>');
        $(this).parents(".dropdown").find('.btn #text-left').val($(this).data('value'));
        moveChart(String($(this)[0].innerText), 'charts_left');

        if (String($(this)[0].innerText) == $('#text-right').html()) {
            $('#text-right').html('Seleziona un grafico');
        }
    });

    $(".menu-right .dropdown-menu li a").not('.disabled').click(function () {

        console.log($(this).html());

        $(this).parents(".dropdown").find('.btn').html('<span id="text-right">' + $(this).html() + '</span><span class="caret"></span>');
        $(this).parents(".dropdown").find('.btn #text-right').val($(this).data('value'));
        moveChart(String($(this)[0].innerText), 'charts_right');

        if (String($(this)[0].innerText) == $('#text-left').html()) {
            $('#text-left').html('Seleziona un grafico');
        }
    });

    /*
     $(".menu-left .dropdown-menu li a").not('.disabled').click(function () {
     
     $('.right-element').removeClass('disabled');
     
     var grafico_selezionato = String($(this)[0].innerText);
     console.log(grafico_selezionato);
     $('[id="' + grafico_selezionato + ' right"]').addClass('disabled');
     
     if ($('[id="' + grafico_selezionato + '"]').attr('class').indexOf('hidden') >= 0){
     
     $(this).parents(".dropdown").find('.btn').html($(this).html() + ' <span class="caret"></span>');
     $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
     moveChart(String($(this)[0].innerText), 'charts_left');
     }
     });
     
     $(".menu-right .dropdown-menu li a").not('.disabled').click(function () {
     
     $('.left-element').removeClass('disabled');
     
     var grafico_selezionato = String($(this)[0].innerText);
     console.log(grafico_selezionato);
     $('[id="' + grafico_selezionato + ' left"]').addClass('disabled');
     
     if ($('[id="' + grafico_selezionato + '"]').attr('class').indexOf('hidden') >= 0){
     
     $(this).parents(".dropdown").find('.btn').html($(this).html() + ' <span class="caret"></span>');
     $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
     moveChart(String($(this)[0].innerText), 'charts_right');
     }
     });
     */

    // Abilita/disabilita textbox variazione percentuale in base alla selezione delle checkbox dialog popolazione, 
    // ambiente, parametri extra e singoli prodotti
    var itemsPopEnvExtraProd = ['popolazione', 'ambiente', 'extra', 'manzo', 'pollo', 'maiale', 'cavallo', 'tacchino',
        'patate', 'zucchine', 'peperoni', 'melanzane', 'pomodori', 'grano', 'riso', 'melo', 'pero', 'arancio'];

    $(itemsPopEnvExtraProd).each(function (index, value) {

        $('.parametri_' + value + '').change(function () {

            if (this.checked) {
                $('input[name="variazione_percentuale_' + value + '"]').prop('disabled', false);
            } else if ($('.parametri_' + value + ':checked').length == 0) {
                $('input[name="variazione_percentuale_' + value + '"]').prop('disabled', true);
            }
        });
    });

    /* Nascondi bottoni scelta singoli prodotti */
    $("#singoli_prodotti").hide();

    /* Slider numero prodotti modal imposta parametri per tutti i prodotti */
    slider_numero_prodotti = new Slider('#numero_prodotti', {formatter: function (value) {
            return value;
        }});

    /* Slider percentuale carne vegetali modal imposta parametri per tutti i prodotti */
    slider_percentuale_carne_vegetali = new Slider("#percentuale_carne_vegetali", {formatter: function (value) {
            return 'Carne: ' + value + '% - Vegetali: ' + (100 - value) + '%';
        }, id: "percentuale_carne_vegetali", min: 0, max: 100, value: 33});

    /* Range carne modal imposta parametri per tutti i prodotti */
    var meat_prezzo = new Slider('#meat_prezzo', {});
    sliders.push(meat_prezzo);
    var meat_produttivita = new Slider('#meat_produttivita', {});
    sliders.push(meat_produttivita);
    var meat_impatto_ghgs = new Slider('#meat_impatto_ghgs', {});
    sliders.push(meat_impatto_ghgs);
    var meat_impatto_pm = new Slider('#meat_impatto_pm', {});
    sliders.push(meat_impatto_pm);
    var meat_impatto_nh3 = new Slider('#meat_impatto_nh3', {});
    sliders.push(meat_impatto_nh3);
    var meat_ideal_ghgs = new Slider('#meat_ideal_ghgs', {});
    sliders.push(meat_ideal_ghgs);
    var meat_toll_infl_prod_ghgs = new Slider('#meat_toll_infl_prod_ghgs', {});
    sliders.push(meat_toll_infl_prod_ghgs);
    var meat_ideal_pm = new Slider('#meat_ideal_pm', {});
    sliders.push(meat_ideal_pm);
    var meat_toll_infl_prod_pm = new Slider('#meat_toll_infl_prod_pm', {});
    sliders.push(meat_toll_infl_prod_pm);
    var meat_ideal_nh3 = new Slider('#meat_ideal_nh3', {});
    sliders.push(meat_ideal_nh3);
    var meat_toll_infl_prod_nh3 = new Slider('#meat_toll_infl_prod_nh3', {});
    sliders.push(meat_toll_infl_prod_nh3);
    var meat_ideal_temp = new Slider('#meat_ideal_temp', {});
    sliders.push(meat_ideal_temp);
    var meat_toll_infl_prod_temp = new Slider('#meat_toll_infl_prod_temp', {});
    sliders.push(meat_toll_infl_prod_temp);

    /* Range vegetali modal imposta parametri per tutti i prodotti */
    var veg_prezzo = new Slider('#veg_prezzo', {});
    sliders.push(veg_prezzo);
    var veg_produttivita = new Slider('#veg_produttivita', {});
    sliders.push(veg_produttivita);
    var veg_impatto_ghgs = new Slider('#veg_impatto_ghgs', {});
    sliders.push(veg_impatto_ghgs);
    var veg_impatto_pm = new Slider('#veg_impatto_pm', {});
    sliders.push(veg_impatto_pm);
    var veg_impatto_nh3 = new Slider('#veg_impatto_nh3', {});
    sliders.push(veg_impatto_nh3);
    var veg_ideal_ghgs = new Slider('#veg_ideal_ghgs', {});
    sliders.push(veg_ideal_ghgs);
    var veg_toll_infl_prod_ghgs = new Slider('#veg_toll_infl_prod_ghgs', {});
    sliders.push(veg_toll_infl_prod_ghgs);
    var veg_ideal_pm = new Slider('#veg_ideal_pm', {});
    sliders.push(veg_ideal_pm);
    var veg_toll_infl_prod_pm = new Slider('#veg_toll_infl_prod_pm', {});
    sliders.push(veg_toll_infl_prod_pm);
    var veg_ideal_nh3 = new Slider('#veg_ideal_nh3', {});
    sliders.push(veg_ideal_nh3);
    var veg_toll_infl_prod_nh3 = new Slider('#veg_toll_infl_prod_nh3', {});
    sliders.push(veg_toll_infl_prod_nh3);
    var veg_ideal_temp = new Slider('#veg_ideal_temp', {});
    sliders.push(veg_ideal_temp);
    var veg_toll_infl_prod_temp = new Slider('#veg_toll_infl_prod_temp', {});
    sliders.push(veg_toll_infl_prod_temp);

    /*
     $('#parametriRandom').on('click', function (event) {
     
     // Recupero valori dei due slider
     //console.log(numero_prodotti.getValue());
     //console.log(percentuale_carne_vegetali.getValue());
     
     // Recupero valori dei range della carne
     //console.log(meat_prezzo.getValue()[0]);
     
     var itemsMeat = [meat_prezzo, meat_produttivita, meat_impatto_ghgs, meat_impatto_pm, meat_impatto_nh3, 
     meat_infl_prod_ghgs, meat_toll_infl_prod_ghgs, meat_infl_prod_pm, meat_toll_infl_prod_pm, 
     meat_infl_prod_nh3, meat_toll_infl_prod_nh3, meat_infl_prod_temp, meat_toll_infl_prod_temp];
     
     $(itemsMeat).each(function (index, value) {
     var random =  Math.floor(value.getValue()[0] + (value.getValue()[1] - value.getValue()[0]) * Math.random());
     console.log(random);
     });
     });
     */

    /* Select list tutti i prodotti o prodotti singoli */
    $('#selectModProd').change(function () {
        var selectedText = $(this).find("option:selected").text();

        console.log(selectedText);

        if (selectedText == "Tutti i prodotti") {
            $("#singoli_prodotti").hide();
            $("#tutti_prodotti").show();
        } else {
            $("#tutti_prodotti").hide();
            $("#singoli_prodotti").show();
        }
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

    // Premo il bottone start
    $('#start').on('click', function (event) {

        startPerform();

        var params = {};
        params['Action'] = 'Start';
        params['Data'] = {};
        current_period = $('input[name="periodo"]').val();
        params['Data']['Period'] = current_period;
        params['Data']['Params'] = getInputValues();

        initCharts();

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

    function startPerform() {

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
        $('#discardChangesTuttiProd').prop('disabled', true);
        $('#saveChangesTuttiProd').prop('disabled', true);
        $('#saveChangesSingoliProd').prop('disabled', true);

        var itemsPopEnvExtra = ['popolazione_iniziale', 'tendenza_mangiare_carne', 'salute_iniziale_media', 'salute_iniziale_dev_stan',
            'ricchezza_media', 'ricchezza_dev_stan', 'fabbisogno_cibo_media', 'fabbisogno_cibo_dev_stan', 'oscillazioni_temperatura_media',
            'oscillazioni_temperatura_ampiezza', 'valore_iniziale_ghgs', 'valore_iniziale_pm', 'valore_iniziale_nh3', 'extern_ghgs',
            'extern_pm', 'extern_nh3', 'step_nascita_popolazione', 'step_morte_popolazione', 'rapporto_nascite_salute', 'valore_salute_stabile',
            'massima_crescita_salute', 'valore_capacita_stabile', 'massima_crescita_capacita', 'influenza_differenze_ricchezza'];

        $(itemsPopEnvExtra).each(function (index, value) {
            $('input[name="' + value + '"]').prop('disabled', true);
            $('input[name="' + value + '_slider"]').prop('disabled', true);
            $('#' + value + '_checkbox').prop('disabled', true);
        });

        $(itemsProd).each(function (index, value) {
            $('.parametri_' + value + '').prop('disabled', true);
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
            $('input[name="' + value + '_ghgs_ideale_slider"]').prop('disabled', true);
            $('input[name="' + value + '_ghgs_ideale"]').prop('disabled', true);
            $('input[name="' + value + '_tolleranza_ghgs_slider"]').prop('disabled', true);
            $('input[name="' + value + '_tolleranza_ghgs"]').prop('disabled', true);
            $('input[name="' + value + '_pm_ideale_slider"]').prop('disabled', true);
            $('input[name="' + value + '_pm_ideale"]').prop('disabled', true);
            $('input[name="' + value + '_tolleranza_pm_slider"]').prop('disabled', true);
            $('input[name="' + value + '_tolleranza_pm"]').prop('disabled', true);
            $('input[name="' + value + '_nh3_ideale_slider"]').prop('disabled', true);
            $('input[name="' + value + '_nh3_ideale"]').prop('disabled', true);
            $('input[name="' + value + '_tolleranza_nh3_slider"]').prop('disabled', true);
            $('input[name="' + value + '_tolleranza_nh3"]').prop('disabled', true);
            $('input[name="' + value + '_temperatura_ideale_slider"]').prop('disabled', true);
            $('input[name="' + value + '_temperatura_ideale"]').prop('disabled', true);
            $('input[name="' + value + '_tolleranza_temperatura_slider"]').prop('disabled', true);
            $('input[name="' + value + '_tolleranza_temperatura"]').prop('disabled', true);
            $('#discardChanges' + value + '').prop('disabled', true);
            $('#saveChanges' + value + '').prop('disabled', true);
        });

        slider_numero_prodotti.disable();
        slider_percentuale_carne_vegetali.disable();
        meat_prezzo.disable();
        meat_produttivita.disable();
        meat_impatto_ghgs.disable();
        meat_impatto_pm.disable();
        meat_impatto_nh3.disable();
        meat_ideal_ghgs.disable();
        meat_toll_infl_prod_ghgs.disable();
        meat_ideal_pm.disable();
        meat_toll_infl_prod_pm.disable();
        meat_ideal_nh3.disable();
        meat_toll_infl_prod_nh3.disable();
        meat_ideal_temp.disable();
        meat_toll_infl_prod_temp.disable();
        veg_prezzo.disable();
        veg_produttivita.disable();
        veg_impatto_ghgs.disable();
        veg_impatto_pm.disable();
        veg_impatto_nh3.disable();
        veg_ideal_ghgs.disable();
        veg_toll_infl_prod_ghgs.disable();
        veg_ideal_pm.disable();
        veg_toll_infl_prod_pm.disable();
        veg_ideal_nh3.disable();
        veg_toll_infl_prod_nh3.disable();
        veg_ideal_temp.disable();
        veg_toll_infl_prod_temp.disable();
    }

    /* Premo il bottone pausa */
    $('#pausa').on('click', function (event) {

        $("#starttext").text('Continua');
        $('#start').prop('disabled', false);
    });

    /* Premo il bottone stop */
    $('#stop').on('click', function (event) {

        stopPerform();
    });

    function stopPerform() {

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
        $('#discardChangesTuttiProd').prop('disabled', false);
        $('#saveChangesTuttiProd').prop('disabled', false);
        $('#saveChangesSingoliProd').prop('disabled', false);

        var itemsPopEnvExtra = ['popolazione_iniziale', 'tendenza_mangiare_carne', 'salute_iniziale_media', 'salute_iniziale_dev_stan',
            'ricchezza_media', 'ricchezza_dev_stan', 'fabbisogno_cibo_media', 'fabbisogno_cibo_dev_stan', 'oscillazioni_temperatura_media',
            'oscillazioni_temperatura_ampiezza', 'valore_iniziale_ghgs', 'valore_iniziale_pm', 'valore_iniziale_nh3', 'extern_ghgs',
            'extern_pm', 'extern_nh3', 'step_nascita_popolazione', 'step_morte_popolazione', 'rapporto_nascite_salute', 'valore_salute_stabile',
            'massima_crescita_salute', 'valore_capacita_stabile', 'massima_crescita_capacita', 'influenza_differenze_ricchezza'];

        $(itemsPopEnvExtra).each(function (index, value) {
            $('input[name="' + value + '"]').prop('disabled', false);
            $('input[name="' + value + '_slider"]').prop('disabled', false);
            $('#' + value + '_checkbox').prop('disabled', false);
        });

        $(itemsProd).each(function (index, value) {
            $('.parametri_' + value + '').prop('disabled', false);
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
            $('input[name="' + value + '_ghgs_ideale_slider"]').prop('disabled', false);
            $('input[name="' + value + '_ghgs_ideale"]').prop('disabled', false);
            $('input[name="' + value + '_tolleranza_ghgs_slider"]').prop('disabled', false);
            $('input[name="' + value + '_tolleranza_ghgs"]').prop('disabled', false);
            $('input[name="' + value + '_pm_ideale_slider"]').prop('disabled', false);
            $('input[name="' + value + '_pm_ideale"]').prop('disabled', false);
            $('input[name="' + value + '_tolleranza_pm_slider"]').prop('disabled', false);
            $('input[name="' + value + '_tolleranza_pm"]').prop('disabled', false);
            $('input[name="' + value + '_nh3_ideale_slider"]').prop('disabled', false);
            $('input[name="' + value + '_nh3_ideale"]').prop('disabled', false);
            $('input[name="' + value + '_tolleranza_nh3_slider"]').prop('disabled', false);
            $('input[name="' + value + '_tolleranza_nh3"]').prop('disabled', false);
            $('input[name="' + value + '_temperatura_ideale_slider"]').prop('disabled', false);
            $('input[name="' + value + '_temperatura_ideale"]').prop('disabled', false);
            $('input[name="' + value + '_tolleranza_temperatura_slider"]').prop('disabled', false);
            $('input[name="' + value + '_tolleranza_temperatura"]').prop('disabled', false);
            $('#discardChanges' + value + '').prop('disabled', false);
            $('#saveChanges' + value + '').prop('disabled', false);
        });

        slider_numero_prodotti.enable();
        slider_percentuale_carne_vegetali.enable();
        meat_prezzo.enable();
        meat_produttivita.enable();
        meat_impatto_ghgs.enable();
        meat_impatto_pm.enable();
        meat_impatto_nh3.enable();
        meat_ideal_ghgs.enable();
        meat_toll_infl_prod_ghgs.enable();
        meat_ideal_pm.enable();
        meat_toll_infl_prod_pm.enable();
        meat_ideal_nh3.enable();
        meat_toll_infl_prod_nh3.enable();
        meat_ideal_temp.enable();
        meat_toll_infl_prod_temp.enable();
        veg_prezzo.enable();
        veg_produttivita.enable();
        veg_impatto_ghgs.enable();
        veg_impatto_pm.enable();
        veg_impatto_nh3.enable();
        veg_ideal_ghgs.enable();
        veg_toll_infl_prod_ghgs.enable();
        veg_ideal_pm.enable();
        veg_toll_infl_prod_pm.enable();
        veg_ideal_nh3.enable();
        veg_toll_infl_prod_nh3.enable();
        veg_ideal_temp.enable();
        veg_toll_infl_prod_temp.enable();
    }

    /* Premo il bottone reset */
    $('#reset').on('click', function (event) {

        location.reload();
    });

    /* Premo il bottone reset popolazione */
    $('#discardChangesPop').on('click', function (event) {

        var itemsPop = ['popolazione_iniziale', 'tendenza_mangiare_carne', 'salute_iniziale_media', 'salute_iniziale_dev_stan',
            'ricchezza_media', 'ricchezza_dev_stan', 'fabbisogno_cibo_media', 'fabbisogno_cibo_dev_stan'];

        var valoriPop = [10, 20, 50, 20, 40, 20, 15, 10];

        $(itemsPop).each(function (index, value) {
            $('input[name="' + value + '"]').val(valoriPop[index]);
            $('input[name="' + value + '_slider"]').val(valoriPop[index]);
            $('#' + value + '_checkbox').prop('checked', false);
        });

        $('input[name="variazione_percentuale_popolazione"]').val(0);
        $('input[name="variazione_percentuale_popolazione"]').prop('disabled', true);
    });

    /* Premo il bottone reset ambiente */
    $('#discardChangesEnv').on('click', function (event) {

        var itemsEnv = ['oscillazioni_temperatura_media', 'oscillazioni_temperatura_ampiezza', 'valore_iniziale_ghgs', 'valore_iniziale_pm',
            'valore_iniziale_nh3', 'extern_ghgs', 'extern_pm', 'extern_nh3', ];

        var valoriEnv = [25, 5, 2, 2, 1, -1, -2, -5];

        $(itemsEnv).each(function (index, value) {
            $('input[name="' + value + '"]').val(valoriEnv[index]);
            $('input[name="' + value + '_slider"]').val(valoriEnv[index]);
            $('#' + value + '_checkbox').prop('checked', false);
        });

        $('input[name="variazione_percentuale_ambiente"]').val(0);
        $('input[name="variazione_percentuale_ambiente"]').prop('disabled', true);
    });

    /* Premo il bottone reset parametri extra */
    $('#discardChangesExtra').on('click', function (event) {

        var itemsExtra = ['step_nascita_popolazione', 'step_morte_popolazione', 'rapporto_nascite_salute', 'valore_salute_stabile',
            'massima_crescita_salute', 'valore_capacita_stabile', 'massima_crescita_capacita', 'influenza_differenze_ricchezza'];

        var valoriExtra = [60, 25, 20, 60, 3, 70, 7, 30];

        $(itemsExtra).each(function (index, value) {
            $('input[name="' + value + '"]').val(valoriExtra[index]);
            $('input[name="' + value + '_slider"]').val(valoriExtra[index]);
            $('#' + value + '_checkbox').prop('checked', false);
        });

        $('input[name="variazione_percentuale_extra"]').val(0);
        $('input[name="variazione_percentuale_extra"]').prop('disabled', true);
    });

    /* Premo il bottone reset parametri per ogni singolo prodotto */
    var itemsProd = ['manzo', 'pollo', 'maiale', 'cavallo', 'tacchino', 'patate', 'zucchine', 'peperoni', 'melanzane',
        'pomodori', 'grano', 'riso', 'melo', 'pero', 'arancio'];

    $(itemsProd).each(function (index1, value1) {

        $('#discardChanges' + value1).on('click', function (event) {

            var itemsParProd = ['_prezzo', '_produttivita', '_impatto_ghgs', '_impatto_pm', '_impatto_nh3', '_ghgs_ideale', '_tolleranza_ghgs',
                '_pm_ideale', '_tolleranza_pm', '_nh3_ideale', '_tolleranza_nh3', '_temperatura_ideale', '_tolleranza_temperatura', ];

            $(itemsParProd).each(function (index2, value2) {
                $('input[name="' + value1 + value2 + '"]').val(0);
                $('input[name="' + value1 + value2 + '_slider"]').val(0);
                $('#' + value1 + value2 + '_checkbox').prop('checked', false);
            });

            $('input[name="variazione_percentuale_' + value1 + '"]').val(0);
            $('input[name="variazione_percentuale_' + value1 + '"]').prop('disabled', true);
        });
    });

    /* Premo il bottone reset parametri per tutti i prodotti */
    $('#discardChangesTuttiProd').on('click', function (event) {

        slider_numero_prodotti.setAttribute('value', 15).refresh();
        slider_percentuale_carne_vegetali.setAttribute('value', 33).refresh();

        meat_prezzo.setAttribute('value', [8, 14]).refresh();
        meat_produttivita.setAttribute('value', [3, 5]).refresh();
        meat_impatto_ghgs.setAttribute('value', [3, 4]).refresh();
        meat_impatto_pm.setAttribute('value', [2, 3]).refresh();
        meat_impatto_nh3.setAttribute('value', [1, 2]).refresh();
        meat_ideal_ghgs.setAttribute('value', [0, 10]).refresh();
        meat_toll_infl_prod_ghgs.setAttribute('value', [50, 70]).refresh();
        meat_ideal_pm.setAttribute('value', [0, 0]).refresh();
        meat_toll_infl_prod_pm.setAttribute('value', [60, 100]).refresh();
        meat_ideal_nh3.setAttribute('value', [0, 10]).refresh();
        meat_toll_infl_prod_nh3.setAttribute('value', [50, 70]).refresh();
        meat_ideal_temp.setAttribute('value', [22, 28]).refresh();
        meat_toll_infl_prod_temp.setAttribute('value', [5, 12]).refresh();

        veg_prezzo.setAttribute('value', [3, 10]).refresh();
        veg_produttivita.setAttribute('value', [4, 7]).refresh();
        veg_impatto_ghgs.setAttribute('value', [-1, 2]).refresh();
        veg_impatto_pm.setAttribute('value', [1, 2]).refresh();
        veg_impatto_nh3.setAttribute('value', [-1, -2]).refresh();
        veg_ideal_ghgs.setAttribute('value', [0, 5]).refresh();
        veg_toll_infl_prod_ghgs.setAttribute('value', [30, 60]).refresh();
        veg_ideal_pm.setAttribute('value', [0, 0]).refresh();
        veg_toll_infl_prod_pm.setAttribute('value', [40, 60]).refresh();
        veg_ideal_nh3.setAttribute('value', [15, 25]).refresh();
        veg_toll_infl_prod_nh3.setAttribute('value', [20, 30]).refresh();
        veg_ideal_temp.setAttribute('value', [20, 30]).refresh();
        veg_toll_infl_prod_temp.setAttribute('value', [2, 10]).refresh();
    });

    /* Accoppia elementi slider e textbox nelle finestre imposta altri parametri popolazione e ambiente */
    var itemsPopEnvExtra = ['popolazione_iniziale', 'tendenza_mangiare_carne', 'salute_iniziale_media', 'salute_iniziale_dev_stan',
        'ricchezza_media', 'ricchezza_dev_stan', 'fabbisogno_cibo_media', 'fabbisogno_cibo_dev_stan', 'oscillazioni_temperatura_media',
        'oscillazioni_temperatura_ampiezza', 'valore_iniziale_ghgs', 'valore_iniziale_pm', 'valore_iniziale_nh3', 'extern_ghgs',
        'extern_pm', 'extern_nh3', 'step_nascita_popolazione', 'step_morte_popolazione', 'rapporto_nascite_salute', 'valore_salute_stabile',
        'massima_crescita_salute', 'valore_capacita_stabile', 'massima_crescita_capacita', 'influenza_differenze_ricchezza'];

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
        $(document).on('input change', 'input[name="' + value + '_ghgs_ideale_slider"]', function () {
            $('input[name="' + value + '_ghgs_ideale"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_ghgs_ideale"]', function () {
            $('input[name="' + value + '_ghgs_ideale_slider"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_tolleranza_ghgs_slider"]', function () {
            $('input[name="' + value + '_tolleranza_ghgs"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_tolleranza_ghgs"]', function () {
            $('input[name="' + value + '_tolleranza_ghgs_slider"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_pm_ideale_slider"]', function () {
            $('input[name="' + value + '_pm_ideale"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_pm_ideale"]', function () {
            $('input[name="' + value + '_pm_ideale_slider"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_tolleranza_pm_slider"]', function () {
            $('input[name="' + value + '_tolleranza_pm"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_tolleranza_pm"]', function () {
            $('input[name="' + value + '_tolleranza_pm_slider"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_nh3_ideale_slider"]', function () {
            $('input[name="' + value + '_nh3_ideale"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_nh3_ideale"]', function () {
            $('input[name="' + value + '_nh3_ideale_slider"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_tolleranza_nh3_slider"]', function () {
            $('input[name="' + value + '_tolleranza_nh3"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_tolleranza_nh3"]', function () {
            $('input[name="' + value + '_tolleranza_nh3_slider"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_temperatura_ideale_slider"]', function () {
            $('input[name="' + value + '_temperatura_ideale"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_temperatura_ideale"]', function () {
            $('input[name="' + value + '_temperatura_ideale_slider"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_tolleranza_temperatura_slider"]', function () {
            $('input[name="' + value + '_tolleranza_temperatura"]').val($(this).val());
        });
        $(document).on('input change', 'input[name="' + value + '_tolleranza_temperatura"]', function () {
            $('input[name="' + value + '_tolleranza_temperatura_slider"]').val($(this).val());
        });
    });

    /* Anima slider */
    $("#params-form").submit(function (event) {
        $('.progress-bar').addClass('progress-bar-animated');
    });
});