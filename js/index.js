
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
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                },{
                    label: 'aaa',
                    data: [2, 19, 5],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }],
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
    
    $("#bottoneStart").click(function () {
        myChart.data.labels.push("cacca");
        myChart.data.datasets.forEach((dataset) => {
            dataset.data.push(2);
        });
        myChart.update();
    });
}

$(function () {
    
    /* Premo il bottone start */
    $('#bottoneStart').on('click', function(event) {
        
        /* Mostra bottone chiudi finestra quando si preme su start */
        document.getElementById("bottoneChiudiFinestra").style.display = "block";
        
        /* Disabilita gli elementi nella finestra imposta altri parametri */
        $('#buttonDiscardChanges').prop('disabled', true);
        $('#buttonSaveChanges').prop('disabled', true);
        
        $('input[name="manzo_prezzo_textbox"]').prop('disabled', true);
        $('input[name="manzo_prezzo_slider"]').prop('disabled', true);
        $('input[name="pollo_prezzo_textbox"]').prop('disabled', true);
        $('input[name="pollo_prezzo_slider"]').prop('disabled', true);
        $('input[name="maiale_prezzo_textbox"]').prop('disabled', true);
        $('input[name="maiale_prezzo_slider"]').prop('disabled', true);
        $('input[name="cavallo_prezzo_textbox"]').prop('disabled', true);
        $('input[name="cavallo_prezzo_slider"]').prop('disabled', true);
        $('input[name="tacchino_prezzo_textbox"]').prop('disabled', true);
        $('input[name="tacchino_prezzo_slider"]').prop('disabled', true);
        $('input[name="patate_prezzo_textbox"]').prop('disabled', true);
        $('input[name="patate_prezzo_slider"]').prop('disabled', true);
        $('input[name="zucchine_prezzo_textbox"]').prop('disabled', true);
        $('input[name="zucchine_prezzo_slider"]').prop('disabled', true);
        $('input[name="peperoni_prezzo_textbox"]').prop('disabled', true);
        $('input[name="peperoni_prezzo_slider"]').prop('disabled', true);
        $('input[name="melanzane_prezzo_textbox"]').prop('disabled', true);
        $('input[name="melanzane_prezzo_slider"]').prop('disabled', true);
        $('input[name="pomodori_prezzo_textbox"]').prop('disabled', true);
        $('input[name="pomodori_prezzo_slider"]').prop('disabled', true);
        $('input[name="grano_prezzo_textbox"]').prop('disabled', true);
        $('input[name="grano_prezzo_slider"]').prop('disabled', true);
        $('input[name="riso_prezzo_textbox"]').prop('disabled', true);
        $('input[name="riso_prezzo_slider"]').prop('disabled', true);
        $('input[name="melo_prezzo_textbox"]').prop('disabled', true);
        $('input[name="melo_prezzo_slider"]').prop('disabled', true);
        $('input[name="pero_prezzo_textbox"]').prop('disabled', true);
        $('input[name="pero_prezzo_slider"]').prop('disabled', true);
        $('input[name="arancio_prezzo_textbox"]').prop('disabled', true);
        $('input[name="arancio_prezzo_slider"]').prop('disabled', true);
        
        $('input[name="manzo_produttivita_textbox"]').prop('disabled', true);
        $('input[name="manzo_produttivita_slider"]').prop('disabled', true);
        $('input[name="pollo_produttivita_textbox"]').prop('disabled', true);
        $('input[name="pollo_produttivita_slider"]').prop('disabled', true);
        $('input[name="maiale_produttivita_textbox"]').prop('disabled', true);
        $('input[name="maiale_produttivita_slider"]').prop('disabled', true);
        $('input[name="cavallo_produttivita_textbox"]').prop('disabled', true);
        $('input[name="cavallo_produttivita_slider"]').prop('disabled', true);
        $('input[name="tacchino_produttivita_textbox"]').prop('disabled', true);
        $('input[name="tacchino_produttivita_slider"]').prop('disabled', true);
        $('input[name="patate_produttivita_textbox"]').prop('disabled', true);
        $('input[name="patate_produttivita_slider"]').prop('disabled', true);
        $('input[name="zucchine_produttivita_textbox"]').prop('disabled', true);
        $('input[name="zucchine_produttivita_slider"]').prop('disabled', true);
        $('input[name="peperoni_produttivita_textbox"]').prop('disabled', true);
        $('input[name="peperoni_produttivita_slider"]').prop('disabled', true);
        $('input[name="melanzane_produttivita_textbox"]').prop('disabled', true);
        $('input[name="melanzane_produttivita_slider"]').prop('disabled', true);
        $('input[name="pomodori_produttivita_textbox"]').prop('disabled', true);
        $('input[name="pomodori_produttivita_slider"]').prop('disabled', true);
        $('input[name="grano_produttivita_textbox"]').prop('disabled', true);
        $('input[name="grano_produttivita_slider"]').prop('disabled', true);
        $('input[name="riso_produttivita_textbox"]').prop('disabled', true);
        $('input[name="riso_produttivita_slider"]').prop('disabled', true);
        $('input[name="melo_produttivita_textbox"]').prop('disabled', true);
        $('input[name="melo_produttivita_slider"]').prop('disabled', true);
        $('input[name="pero_produttivita_textbox"]').prop('disabled', true);
        $('input[name="pero_produttivita_slider"]').prop('disabled', true);
        $('input[name="arancio_produttivita_textbox"]').prop('disabled', true);
        $('input[name="arancio_produttivita_slider"]').prop('disabled', true);
    });
    
    /* Premo il bottone stop */
    $('#bottoneStop').on('click', function(event) {      
        
        /* Nascondi bottone chiudi finestra quando si preme su stop */
        document.getElementById("bottoneChiudiFinestra").style.display = "none";
        
        /* Abilita gli elementi nella finestra imposta altri parametri */
        $('#buttonDiscardChanges').prop('disabled', false);
        $('#buttonSaveChanges').prop('disabled', false);
        
        $('input[name="manzo_prezzo_textbox"]').prop('disabled', false);
        $('input[name="manzo_prezzo_slider"]').prop('disabled', false);
        $('input[name="pollo_prezzo_textbox"]').prop('disabled', false);
        $('input[name="pollo_prezzo_slider"]').prop('disabled', false);
        $('input[name="maiale_prezzo_textbox"]').prop('disabled', false);
        $('input[name="maiale_prezzo_slider"]').prop('disabled', false);
        $('input[name="cavallo_prezzo_textbox"]').prop('disabled', false);
        $('input[name="cavallo_prezzo_slider"]').prop('disabled', false);
        $('input[name="tacchino_prezzo_textbox"]').prop('disabled', false);
        $('input[name="tacchino_prezzo_slider"]').prop('disabled', false);
        $('input[name="patate_prezzo_textbox"]').prop('disabled', false);
        $('input[name="patate_prezzo_slider"]').prop('disabled', false);
        $('input[name="zucchine_prezzo_textbox"]').prop('disabled', false);
        $('input[name="zucchine_prezzo_slider"]').prop('disabled', false);
        $('input[name="peperoni_prezzo_textbox"]').prop('disabled', false);
        $('input[name="peperoni_prezzo_slider"]').prop('disabled', false);
        $('input[name="melanzane_prezzo_textbox"]').prop('disabled', false);
        $('input[name="melanzane_prezzo_slider"]').prop('disabled', false);
        $('input[name="pomodori_prezzo_textbox"]').prop('disabled', false);
        $('input[name="pomodori_prezzo_slider"]').prop('disabled', false);
        $('input[name="grano_prezzo_textbox"]').prop('disabled', false);
        $('input[name="grano_prezzo_slider"]').prop('disabled', false);
        $('input[name="riso_prezzo_textbox"]').prop('disabled', false);
        $('input[name="riso_prezzo_slider"]').prop('disabled', false);
        $('input[name="melo_prezzo_textbox"]').prop('disabled', false);
        $('input[name="melo_prezzo_slider"]').prop('disabled', false);
        $('input[name="pero_prezzo_textbox"]').prop('disabled', false);
        $('input[name="pero_prezzo_slider"]').prop('disabled', false);
        $('input[name="arancio_prezzo_textbox"]').prop('disabled', false);
        $('input[name="arancio_prezzo_slider"]').prop('disabled', false);
        
        $('input[name="manzo_produttivita_textbox"]').prop('disabled', false);
        $('input[name="manzo_produttivita_slider"]').prop('disabled', false);
        $('input[name="pollo_produttivita_textbox"]').prop('disabled', false);
        $('input[name="pollo_produttivita_slider"]').prop('disabled', false);
        $('input[name="maiale_produttivita_textbox"]').prop('disabled', false);
        $('input[name="maiale_produttivita_slider"]').prop('disabled', false);
        $('input[name="cavallo_produttivita_textbox"]').prop('disabled', false);
        $('input[name="cavallo_produttivita_slider"]').prop('disabled', false);
        $('input[name="tacchino_produttivita_textbox"]').prop('disabled', false);
        $('input[name="tacchino_produttivita_slider"]').prop('disabled', false);
        $('input[name="patate_produttivita_textbox"]').prop('disabled', false);
        $('input[name="patate_produttivita_slider"]').prop('disabled', false);
        $('input[name="zucchine_produttivita_textbox"]').prop('disabled', false);
        $('input[name="zucchine_produttivita_slider"]').prop('disabled', false);
        $('input[name="peperoni_produttivita_textbox"]').prop('disabled', false);
        $('input[name="peperoni_produttivita_slider"]').prop('disabled', false);
        $('input[name="melanzane_produttivita_textbox"]').prop('disabled', false);
        $('input[name="melanzane_produttivita_slider"]').prop('disabled', false);
        $('input[name="pomodori_produttivita_textbox"]').prop('disabled', false);
        $('input[name="pomodori_produttivita_slider"]').prop('disabled', false);
        $('input[name="grano_produttivita_textbox"]').prop('disabled', false);
        $('input[name="grano_produttivita_slider"]').prop('disabled', false);
        $('input[name="riso_produttivita_textbox"]').prop('disabled', false);
        $('input[name="riso_produttivita_slider"]').prop('disabled', false);
        $('input[name="melo_produttivita_textbox"]').prop('disabled', false);
        $('input[name="melo_produttivita_slider"]').prop('disabled', false);
        $('input[name="pero_produttivita_textbox"]').prop('disabled', false);
        $('input[name="pero_produttivita_slider"]').prop('disabled', false);
        $('input[name="arancio_produttivita_textbox"]').prop('disabled', false);
        $('input[name="arancio_produttivita_slider"]').prop('disabled', false);
    });
    
    /* Azzera parametri premendo su discard changes */
    $('#buttonDiscardChanges').on('click', function(event) {
        
        $('input[name="manzo_prezzo_textbox"]').val(0);
        $('input[name="manzo_prezzo_slider"]').val(0);
        $('input[name="pollo_prezzo_textbox"]').val(0);
        $('input[name="pollo_prezzo_slider"]').val(0);
        $('input[name="maiale_prezzo_textbox"]').val(0);
        $('input[name="maiale_prezzo_slider"]').val(0);
        $('input[name="cavallo_prezzo_textbox"]').val(0);
        $('input[name="cavallo_prezzo_slider"]').val(0);
        $('input[name="tacchino_prezzo_textbox"]').val(0);
        $('input[name="tacchino_prezzo_slider"]').val(0);
        $('input[name="patate_prezzo_textbox"]').val(0);
        $('input[name="patate_prezzo_slider"]').val(0);
        $('input[name="zucchine_prezzo_textbox"]').val(0);
        $('input[name="zucchine_prezzo_slider"]').val(0);
        $('input[name="peperoni_prezzo_textbox"]').val(0);
        $('input[name="peperoni_prezzo_slider"]').val(0);
        $('input[name="melanzane_prezzo_textbox"]').val(0);
        $('input[name="melanzane_prezzo_slider"]').val(0);
        $('input[name="pomodori_prezzo_textbox"]').val(0);
        $('input[name="pomodori_prezzo_slider"]').val(0);
        $('input[name="grano_prezzo_textbox"]').val(0);
        $('input[name="grano_prezzo_slider"]').val(0);
        $('input[name="riso_prezzo_textbox"]').val(0);
        $('input[name="riso_prezzo_slider"]').val(0);
        $('input[name="melo_prezzo_textbox"]').val(0);
        $('input[name="melo_prezzo_slider"]').val(0);
        $('input[name="pero_prezzo_textbox"]').val(0);
        $('input[name="pero_prezzo_slider"]').val(0);
        $('input[name="arancio_prezzo_textbox"]').val(0);
        $('input[name="arancio_prezzo_slider"]').val(0);
        
        $('input[name="manzo_produttivita_textbox"]').val(0);
        $('input[name="manzo_produttivita_slider"]').val(0);
        $('input[name="pollo_produttivita_textbox"]').val(0);
        $('input[name="pollo_produttivita_slider"]').val(0);
        $('input[name="maiale_produttivita_textbox"]').val(0);
        $('input[name="maiale_produttivita_slider"]').val(0);
        $('input[name="cavallo_produttivita_textbox"]').val(0);
        $('input[name="cavallo_produttivita_slider"]').val(0);
        $('input[name="tacchino_produttivita_textbox"]').val(0);
        $('input[name="tacchino_produttivita_slider"]').val(0);
        $('input[name="patate_produttivita_textbox"]').val(0);
        $('input[name="patate_produttivita_slider"]').val(0);
        $('input[name="zucchine_produttivita_textbox"]').val(0);
        $('input[name="zucchine_produttivita_slider"]').val(0);
        $('input[name="peperoni_produttivita_textbox"]').val(0);
        $('input[name="peperoni_produttivita_slider"]').val(0);
        $('input[name="melanzane_produttivita_textbox"]').val(0);
        $('input[name="melanzane_produttivita_slider"]').val(0);
        $('input[name="pomodori_produttivita_textbox"]').val(0);
        $('input[name="pomodori_produttivita_slider"]').val(0);
        $('input[name="grano_produttivita_textbox"]').val(0);
        $('input[name="grano_produttivita_slider"]').val(0);
        $('input[name="riso_produttivita_textbox"]').val(0);
        $('input[name="riso_produttivita_slider"]').val(0);
        $('input[name="melo_produttivita_textbox"]').val(0);
        $('input[name="melo_produttivita_slider"]').val(0);
        $('input[name="pero_produttivita_textbox"]').val(0);
        $('input[name="pero_produttivita_slider"]').val(0);
        $('input[name="arancio_produttivita_textbox"]').val(0);
        $('input[name="arancio_produttivita_slider"]').val(0);
    });

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

    /* Manzo Prezzo */
    $(document).on('input change', 'input[name="manzo_prezzo_slider"]', function () {
        $('input[name="manzo_prezzo_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="manzo_prezzo_textbox"]', function () {
        $('input[name="manzo_prezzo_slider"]').val($(this).val());
    });

    /* Pollo Prezzo */
    $(document).on('input change', 'input[name="pollo_prezzo_slider"]', function () {
        $('input[name="pollo_prezzo_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="pollo_prezzo_textbox"]', function () {
        $('input[name="pollo_prezzo_slider"]').val($(this).val());
    });

    /* Maiale Prezzo */
    $(document).on('input change', 'input[name="maiale_prezzo_slider"]', function () {
        $('input[name="maiale_prezzo_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="maiale_prezzo_textbox"]', function () {
        $('input[name="maiale_prezzo_slider"]').val($(this).val());
    });

    /* Cavallo Prezzo */
    $(document).on('input change', 'input[name="cavallo_prezzo_slider"]', function () {
        $('input[name="cavallo_prezzo_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="cavallo_prezzo_textbox"]', function () {
        $('input[name="cavallo_prezzo_slider"]').val($(this).val());
    });

    /* Tacchino Prezzo */
    $(document).on('input change', 'input[name="tacchino_prezzo_slider"]', function () {
        $('input[name="tacchino_prezzo_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="tacchino_prezzo_textbox"]', function () {
        $('input[name="tacchino_prezzo_slider"]').val($(this).val());
    });

    /* Patate Prezzo*/
    $(document).on('input change', 'input[name="patate_prezzo_slider"]', function () {
        $('input[name="patate_prezzo_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="patate_prezzo_textbox"]', function () {
        $('input[name="patate_prezzo_slider"]').val($(this).val());
    });

    /* Zucchine Prezzo*/
    $(document).on('input change', 'input[name="zucchine_prezzo_slider"]', function () {
        $('input[name="zucchine_prezzo_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="zucchine_prezzo_textbox"]', function () {
        $('input[name="zucchine_prezzo_slider"]').val($(this).val());
    });

    /* Peperoni Prezzo*/
    $(document).on('input change', 'input[name="peperoni_prezzo_slider"]', function () {
        $('input[name="peperoni_prezzo_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="peperoni_prezzo_textbox"]', function () {
        $('input[name="peperoni_prezzo_slider"]').val($(this).val());
    });

    /* Melanzane Prezzo*/
    $(document).on('input change', 'input[name="melanzane_prezzo_slider"]', function () {
        $('input[name="melanzane_prezzo_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="melanzane_prezzo_textbox"]', function () {
        $('input[name="melanzane_prezzo_slider"]').val($(this).val());
    });

    /* Pomodori Prezzo*/
    $(document).on('input change', 'input[name="pomodori_prezzo_slider"]', function () {
        $('input[name="pomodori_prezzo_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="pomodori_prezzo_textbox"]', function () {
        $('input[name="pomodori_prezzo_slider"]').val($(this).val());
    });

    /* Grano Prezzo*/
    $(document).on('input change', 'input[name="grano_prezzo_slider"]', function () {
        $('input[name="grano_prezzo_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="grano_prezzo_textbox"]', function () {
        $('input[name="grano_prezzo_slider"]').val($(this).val());
    });

    /* Riso Prezzo*/
    $(document).on('input change', 'input[name="riso_prezzo_slider"]', function () {
        $('input[name="riso_prezzo_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="riso_prezzo_textbox"]', function () {
        $('input[name="riso_prezzo_slider"]').val($(this).val());
    });

    /* Melo Prezzo*/
    $(document).on('input change', 'input[name="melo_prezzo_slider"]', function () {
        $('input[name="melo_prezzo_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="melo_prezzo_textbox"]', function () {
        $('input[name="melo_prezzo_slider"]').val($(this).val());
    });

    /* Pero Prezzo*/
    $(document).on('input change', 'input[name="pero_prezzo_slider"]', function () {
        $('input[name="pero_prezzo_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="pero_prezzo_textbox"]', function () {
        $('input[name="pero_prezzo_slider"]').val($(this).val());
    });

    /* Arancio Prezzo*/
    $(document).on('input change', 'input[name="arancio_prezzo_slider"]', function () {
        $('input[name="arancio_prezzo_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="arancio_prezzo_textbox"]', function () {
        $('input[name="arancio_prezzo_slider"]').val($(this).val());
    });

    /* Manzo Produttivita*/
    $(document).on('input change', 'input[name="manzo_produttivita_slider"]', function () {
        $('input[name="manzo_produttivita_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="manzo_produttivita_textbox"]', function () {
        $('input[name="manzo_produttivita_slider"]').val($(this).val());
    });

    /* Pollo Produttivita*/
    $(document).on('input change', 'input[name="pollo_produttivita_slider"]', function () {
        $('input[name="pollo_produttivita_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="pollo_produttivita_textbox"]', function () {
        $('input[name="pollo_produttivita_slider"]').val($(this).val());
    });

    /* Maiale Produttivita*/
    $(document).on('input change', 'input[name="maiale_produttivita_slider"]', function () {
        $('input[name="maiale_produttivita_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="maiale_produttivita_textbox"]', function () {
        $('input[name="maiale_produttivita_slider"]').val($(this).val());
    });

    /* Cavallo Produttivita*/
    $(document).on('input change', 'input[name="cavallo_produttivita_slider"]', function () {
        $('input[name="cavallo_produttivita_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="cavallo_produttivita_textbox"]', function () {
        $('input[name="cavallo_produttivita_slider"]').val($(this).val());
    });

    /* Tacchino Produttivita*/
    $(document).on('input change', 'input[name="tacchino_produttivita_slider"]', function () {
        $('input[name="tacchino_produttivita_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="tacchino_produttivita_textbox"]', function () {
        $('input[name="tacchino_produttivita_slider"]').val($(this).val());
    });

    /* Patate Produttivita*/
    $(document).on('input change', 'input[name="patate_produttivita_slider"]', function () {
        $('input[name="patate_produttivita_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="patate_produttivita_textbox"]', function () {
        $('input[name="patate_produttivita_slider"]').val($(this).val());
    });

    /* Zucchine Produttivita*/
    $(document).on('input change', 'input[name="zucchine_produttivita_slider"]', function () {
        $('input[name="zucchine_produttivita_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="zucchine_produttivita_textbox"]', function () {
        $('input[name="zucchine_produttivita_slider"]').val($(this).val());
    });

    /* Peperoni Produttivita*/
    $(document).on('input change', 'input[name="peperoni_produttivita_slider"]', function () {
        $('input[name="peperoni_produttivita_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="peperoni_produttivita_textbox"]', function () {
        $('input[name="peperoni_produttivita_slider"]').val($(this).val());
    });

    /* Melanzane Produttivita*/
    $(document).on('input change', 'input[name="melanzane_produttivita_slider"]', function () {
        $('input[name="melanzane_produttivita_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="melanzane_produttivita_textbox"]', function () {
        $('input[name="melanzane_produttivita_slider"]').val($(this).val());
    });

    /* Pomodori Produttivita*/
    $(document).on('input change', 'input[name="pomodori_produttivita_slider"]', function () {
        $('input[name="pomodori_produttivita_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="pomodori_produttivita_textbox"]', function () {
        $('input[name="pomodori_produttivita_slider"]').val($(this).val());
    });

    /* Grano Produttivita*/
    $(document).on('input change', 'input[name="grano_produttivita_slider"]', function () {
        $('input[name="grano_produttivita_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="grano_produttivita_textbox"]', function () {
        $('input[name="grano_produttivita_slider"]').val($(this).val());
    });

    /* Riso Produttivita*/
    $(document).on('input change', 'input[name="riso_produttivita_slider"]', function () {
        $('input[name="riso_produttivita_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="riso_produttivita_textbox"]', function () {
        $('input[name="riso_produttivita_slider"]').val($(this).val());
    });

    /* Melo Produttivita*/
    $(document).on('input change', 'input[name="melo_produttivita_slider"]', function () {
        $('input[name="melo_produttivita_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="melo_produttivita_textbox"]', function () {
        $('input[name="melo_produttivita_slider"]').val($(this).val());
    });

    /* Pero Produttivita*/
    $(document).on('input change', 'input[name="pero_produttivita_slider"]', function () {
        $('input[name="pero_produttivita_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="pero_produttivita_textbox"]', function () {
        $('input[name="pero_produttivita_slider"]').val($(this).val());
    });

    /* Arancio Produttivita*/
    $(document).on('input change', 'input[name="arancio_produttivita_slider"]', function () {
        $('input[name="arancio_produttivita_textbox"]').val($(this).val());
    });

    $(document).on('input change', 'input[name="arancio_produttivita_textbox"]', function () {
        $('input[name="arancio_produttivita_slider"]').val($(this).val());
    });

    initChart();
});