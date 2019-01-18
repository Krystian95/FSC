
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