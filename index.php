<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="images/favicon.png" type="image/png" />
        <title>HESystem</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="css/lib/bootstrap-4.1.3.min.css" rel="stylesheet">
        <link href="css/lib/jquery-ui.min.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">
        <link href="css/lib/bootstrap-slider.min.css" rel="stylesheet">
    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="images/favicon.png" height="35" width="35" style="display: inline-block;">
                    <span style="display: inline-block;">HESystem</span>
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <div class="container container-custom">
            <div class="row">
                <div class="col">
                    <div class="row align-items-center">
                        <div class="col">
                            <form id="params-form" method="post" action="#!">
                                <div class="row form-group align-items-center">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#parameterPopModal"><i class="fa fa-users"></i>&nbsp&nbspPopolazione</button>
                                    </div> 
                                    <div class="col-6">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#parameterProdModal"><i class="fa fa-industry"></i>&nbsp&nbspProdotti</button>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#parameterEnvModal"><i class="fa fa-tree"></i>&nbsp&nbspAmbiente</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#parameterExtraModal"><i class="fa fa-cog"></i>&nbsp&nbspParametri di sistema</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row form-group align-items-center">
                        <div class="col-6">
                            <button type="button" class="btn btn-success" id="start"><i class="fa fa-play"></i>&nbsp&nbsp<span id="starttext">Start</span></button>
                        </div>

                        <label class="col-form-label col-2">
                            Periodo
                        </label>
                        <div class="col-4">
                            <input type="text" class="form-control textbox" name="periodo" id="textboxAnno" readonly> 
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-2">
                            <button type="button" class="btn btn-warning" id="pausa" disabled="true"><i class="fa fa-pause"></i>&nbspPausa</button>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-danger" id="stop" disabled="true"><i class="fa fa-stop"></i>&nbspStop</button>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-secondary" id="reset"><i class="fas fa-sync-alt"></i>&nbspReset</button>
                        </div>



                        <label class="col-form-label col-2">
                            Anno
                        </label>
                        <div class="col-4">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" id="progressBarYear" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <br>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-chart-bar"></i>&nbsp&nbspGrafici
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-users fa-fw"></i>&nbsp&nbspPopolazione</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user-circle fa-fw"></i>&nbsp&nbspNati e morti</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-medkit fa-fw"></i>&nbsp&nbspSalute media</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-industry fa-fw"></i>&nbsp&nbspCapacità produttiva</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-archive fa-fw"></i>&nbsp&nbspProduzione </a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-chart-line fa-fw"></i>&nbsp&nbspVendita</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-signal fa-fw"></i>&nbsp&nbspCapacità/produzione/vendita mensile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-thermometer-half fa-fw"></i>&nbsp&nbspTemperatura</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cloud-sun-rain fa-fw"></i>&nbsp&nbspAgenti atmosferici</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-dollar-sign fa-fw"></i>&nbsp&nbspTipologie di cibo in relazione alla ricchezza</a></li>
                        </div>
                    </div>
                    <br>
                    <canvas id="chart_1" width="1550" height="1000"></canvas>
                </div>
                <div class="col-6">
                    <br>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-chart-bar"></i>&nbsp&nbspGrafici
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-users fa-fw"></i>&nbsp&nbspPopolazione</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user-circle fa-fw"></i>&nbsp&nbspNati e morti</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-medkit fa-fw"></i>&nbsp&nbspSalute media</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-industry fa-fw"></i>&nbsp&nbspCapacità produttiva</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-archive fa-fw"></i>&nbsp&nbspProduzione </a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-chart-line fa-fw"></i>&nbsp&nbspVendita</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-signal fa-fw"></i>&nbsp&nbspCapacità/produzione/vendita mensile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-thermometer-half fa-fw"></i>&nbsp&nbspTemperatura</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cloud-sun-rain fa-fw"></i>&nbsp&nbspAgenti atmosferici</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-dollar-sign fa-fw"></i>&nbsp&nbspTipologie di cibo in relazione alla ricchezza</a></li>
                        </div>
                    </div>
                    <br>
                    <canvas id="chart_2" width="1550" height="1000"></canvas>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="py-4 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; 2019 HESystem. Tutti i diritti riservati.</p>
            </div>
            <!-- /.container -->
        </footer>

        <!-- Modal popolazione-->
        <div class="modal fade" id="parameterPopModal" role="dialog" data-backdrop="static">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Imposta parametri popolazione</h4>
                        <button type="button" class="close" data-dismiss="modal" id="chiudiFinestraPop">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Popolazione iniziale
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="popolazione_iniziale_slider" value="10">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="popolazione_iniziale" value="10"> 
                                    </div>
                                    <div class="col-1">
                                        <div class="checkbox"><input type="checkbox" value="" id="popolazione_iniziale_checkbox" class="parametri_popolazione"></div>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Tendenza a mangiare carne
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="tendenza_mangiare_carne_slider" value="20">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="tendenza_mangiare_carne" value="20"> 
                                    </div>
                                    <div class="col-1">
                                        <div class="checkbox"><input type="checkbox" value="" id="tendenza_mangiare_carne_checkbox" class="parametri_popolazione"></div>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Salute iniziale media
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="salute_iniziale_media_slider" value="50">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="salute_iniziale_media" value="50"> 
                                    </div>
                                    <div class="col-1">
                                        <div class="checkbox"><input type="checkbox" value="" id="salute_iniziale_media_checkbox" class="parametri_popolazione"></div>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Salute iniziale deviazione standard
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="salute_iniziale_dev_stan_slider" value="20">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="salute_iniziale_dev_stan" value="20"> 
                                    </div>
                                    <div class="col-1">
                                        <div class="checkbox"><input type="checkbox" value="" id="salute_iniziale_dev_stan_checkbox" class="parametri_popolazione"></div>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Ricchezza media
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="ricchezza_media_slider" value="40">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="ricchezza_media" value="40"> 
                                    </div>
                                    <div class="col-1">
                                        <div class="checkbox"><input type="checkbox" value="" id="ricchezza_media_checkbox" class="parametri_popolazione"></div>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Ricchezza deviazione standard
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="ricchezza_dev_stan_slider" value="20">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="ricchezza_dev_stan" value="20"> 
                                    </div>
                                    <div class="col-1">
                                        <div class="checkbox"><input type="checkbox" value="" id="ricchezza_dev_stan_checkbox" class="parametri_popolazione"></div>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Fabbisogno di cibo media
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="fabbisogno_cibo_media_slider" value="15">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="fabbisogno_cibo_media" value="15"> 
                                    </div>
                                    <div class="col-1">
                                        <div class="checkbox"><input type="checkbox" value="" id="fabbisogno_cibo_media_checkbox" class="parametri_popolazione"></div>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Fabbisogno di cibo deviazione standard
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="fabbisogno_cibo_dev_stan_slider" value="10">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="fabbisogno_cibo_dev_stan" value="10"> 
                                    </div>
                                    <div class="col-1">
                                        <div class="checkbox"><input type="checkbox" value="" id="fabbisogno_cibo_dev_stan_checkbox" class="parametri_popolazione"></div>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Variazione percentuale
                                    </label>
                                    <div class="col-7">
                                        <input type="number" class="form-control textbox" min="-100" max="100" step="1" name="variazione_percentuale_popolazione" value="0" disabled> 
                                    </div>
                                    <div class="col-1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="discardChangesPop"><i class="fas fa-sync-alt"></i>&nbsp&nbspReset</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal" id="saveChangesPop"><i class="fa fa-check"></i>&nbsp&nbspSalva</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal ambiente-->
        <div class="modal fade" id="parameterEnvModal" role="dialog" data-backdrop="static">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Imposta parametri ambiente</h4>
                        <button type="button" class="close" data-dismiss="modal" id="chiudiFinestraEnv">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Temperatura media
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="oscillazioni_temperatura_media_slider" value="25">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="oscillazioni_temperatura_media" value="25"> 
                                    </div>
                                    <div class="col-1">
                                        <div class="checkbox"><input type="checkbox" value="" id="oscillazioni_temperatura_media_checkbox" class="parametri_ambiente"></div>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Ampiezza oscillazioni temperatura
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="oscillazioni_temperatura_ampiezza_slider" value="5">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="oscillazioni_temperatura_ampiezza" value="5"> 
                                    </div>
                                    <div class="col-1">
                                        <div class="checkbox"><input type="checkbox" value="" id="oscillazioni_temperatura_ampiezza_checkbox" class="parametri_ambiente"></div>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Valore iniziale GHGS
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="valore_iniziale_ghgs_slider" value="2">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="valore_iniziale_ghgs" value="2"> 
                                    </div>
                                    <div class="col-1">
                                        <div class="checkbox"><input type="checkbox" value="" id="valore_iniziale_ghgs_checkbox" class="parametri_ambiente"></div>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Valore iniziale PM
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="valore_iniziale_pm_slider" value="2">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="valore_iniziale_pm" value="2"> 
                                    </div>
                                    <div class="col-1">
                                        <div class="checkbox"><input type="checkbox" value="" id="valore_iniziale_pm_checkbox" class="parametri_ambiente"></div>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Valore iniziale NH<sub>3</sub>
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="valore_iniziale_nh3_slider" value="1">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="valore_iniziale_nh3" value="1"> 
                                    </div>
                                    <div class="col-1">
                                        <div class="checkbox"><input type="checkbox" value="" id="valore_iniziale_nh3_checkbox" class="parametri_ambiente"></div>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Apporto esterno GHGS
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="extern_ghgs_slider" value="-1">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="extern_ghgs" value="-1"> 
                                    </div>
                                    <div class="col-1">
                                        <div class="checkbox"><input type="checkbox" value="" id="extern_ghgs_checkbox" class="parametri_ambiente"></div>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Apporto esterno PM
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="extern_pm_slider" value="-2">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="extern_pm" value="-2"> 
                                    </div>
                                    <div class="col-1">
                                        <div class="checkbox"><input type="checkbox" value="" id="extern_pm_checkbox" class="parametri_ambiente"></div>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Apporto esterno NH<sub>3</sub>
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="extern_nh3_slider" value="-5">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="extern_nh3" value="-5"> 
                                    </div>
                                    <div class="col-1">
                                        <div class="checkbox"><input type="checkbox" value="" id="extern_nh3_checkbox" class="parametri_ambiente"></div>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Variazione percentuale
                                    </label>
                                    <div class="col-7">
                                        <input type="number" class="form-control textbox" min="-100" max="100" step="1" name="variazione_percentuale_ambiente" value="0" disabled> 
                                    </div>
                                    <div class="col-1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="discardChangesEnv"><i class="fas fa-sync-alt"></i>&nbsp&nbspReset</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal" id="saveChangesEnv"><i class="fa fa-check"></i>&nbsp&nbspSalva</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal prodotti-->
        <div class="modal fade" id="parameterProdModal" tabindex="-1" role="dialog" data-backdrop="static">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Imposta parametri prodotti</h4>
                        <button type="button" class="close" data-dismiss="modal" id="chiudiFinestraProd">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <form>
                                    <div class="form-group">
                                        <select class="form-control" id="selectModProd">
                                            <option value="1">Tutti i prodotti</option>
                                            <option value="0">Singoli prodotti</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="tutti_prodotti">
                            <div class="row">
                                <div class="col">
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-2">
                                            Numero prodotti
                                        </label>
                                        <div class="col-10">
                                            <b>0</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="numero_prodotti" data-slider-id='numero_prodotti' type="text" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="15"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-2">
                                            Percentuale carne/vegetali
                                        </label>
                                        <div class="col-10">
                                            <b>0</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="percentuale_carne_vegetali" type="text"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="row align-items-center">
                                        <h3 class="text-center container-fluid">Carne</h3>
                                    </div>
                                    <br>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Prezzo
                                        </label>
                                        <div class="col-8">
                                            &nbsp; <b>1</b>&nbsp;&nbsp;&nbsp;&nbsp;<input id="meat_prezzo" type="text" class="span2" value="" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="[8,14]"/>&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Capacità produttiva iniziale
                                        </label>
                                        <div class="col-8">
                                            &nbsp; <b>1</b>&nbsp;&nbsp;&nbsp;&nbsp;<input id="meat_produttivita" type="text" class="span2" value="" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="[3,5]"/>&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Impatto su GHGS
                                        </label>
                                        <div class="col-8">
                                            <b>-50</b>&nbsp;&nbsp;&nbsp;<input id="meat_impatto_ghgs" type="text" class="span2" value="" data-slider-min="-50" data-slider-max="50" data-slider-step="1" data-slider-value="[3,4]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>50</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Impatto su PM
                                        </label>
                                        <div class="col-8">
                                            <b>-50</b>&nbsp;&nbsp;&nbsp;<input id="meat_impatto_pm" type="text" class="span2" value="" data-slider-min="-50" data-slider-max="50" data-slider-step="1" data-slider-value="[2,3]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>50</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Impatto su NH<sub>3</sub>
                                        </label>
                                        <div class="col-8">
                                            <b>-50</b>&nbsp;&nbsp;&nbsp;<input id="meat_impatto_nh3" type="text" class="span2" value="" data-slider-min="-50" data-slider-max="50" data-slider-step="1" data-slider-value="[1,2]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>50</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            GHGS ideale
                                        </label>
                                        <div class="col-8">
                                            <b>-50</b>&nbsp;&nbsp;&nbsp;<input id="meat_ideal_ghgs" type="text" class="span2" value="" data-slider-min="-50" data-slider-max="50" data-slider-step="1" data-slider-value="[0,10]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>50</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Tolleranza all'influenza di GHGS
                                        </label>
                                        <div class="col-8">
                                            <b>-90</b>&nbsp;&nbsp;&nbsp;<input id="meat_toll_infl_prod_ghgs" type="text" class="span2" value="" data-slider-min="-90" data-slider-max="90" data-slider-step="1" data-slider-value="[50,70]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>90</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            PM ideale
                                        </label>
                                        <div class="col-8">
                                            <b>-50</b>&nbsp;&nbsp;&nbsp;<input id="meat_ideal_pm" type="text" class="span2" value="" data-slider-min="-50" data-slider-max="50" data-slider-step="1" data-slider-value="[0,0]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>50</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Tolleranza all'influenza di PM
                                        </label>
                                        <div class="col-8">
                                            <b>-90</b>&nbsp;&nbsp;&nbsp;<input id="meat_toll_infl_prod_pm" type="text" class="span2" value="" data-slider-min="-90" data-slider-max="90" data-slider-step="1" data-slider-value="[60,90]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>90</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            NH<sub>3</sub> ideale
                                        </label>
                                        <div class="col-8">
                                            <b>-50</b>&nbsp;&nbsp;&nbsp;<input id="meat_ideal_nh3" type="text" class="span2" value="" data-slider-min="-50" data-slider-max="50" data-slider-step="1" data-slider-value="[0,10]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>50</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Tolleranza all'influenza di NH<sub>3</sub>
                                        </label>
                                        <div class="col-8">
                                            <b>-90</b>&nbsp;&nbsp;&nbsp;<input id="meat_toll_infl_prod_nh3" type="text" class="span2" value="" data-slider-min="-90" data-slider-max="90" data-slider-step="1" data-slider-value="[50,70]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>90</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Temperatura ideale
                                        </label>
                                        <div class="col-8">
                                            <b>-50</b>&nbsp;&nbsp;&nbsp;<input id="meat_ideal_temp" type="text" class="span2" value="" data-slider-min="-50" data-slider-max="50" data-slider-step="1" data-slider-value="[22,28]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>50</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Tolleranza all'influenza della temperatura
                                        </label>
                                        <div class="col-8">
                                            <b>-50</b>&nbsp;&nbsp;&nbsp;<input id="meat_toll_infl_prod_temp" type="text" class="span2" value="" data-slider-min="-50" data-slider-max="50" data-slider-step="1" data-slider-value="[5,12]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>50</b>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row align-items-center">
                                        <h3 class="text-center container-fluid">Vegetali</h3>
                                    </div>
                                    <br>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Prezzo
                                        </label>
                                        <div class="col-8">
                                            &nbsp; <b>1</b>&nbsp;&nbsp;&nbsp;&nbsp;<input id="veg_prezzo" type="text" class="span2" value="" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="[3,10]"/>&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Capacità produttiva iniziale
                                        </label>
                                        <div class="col-8">
                                            &nbsp; <b>1</b>&nbsp;&nbsp;&nbsp;&nbsp;<input id="veg_produttivita" type="text" class="span2" value="" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="[4,7]"/>&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Impatto su GHGS
                                        </label>
                                        <div class="col-8">
                                            <b>-50</b>&nbsp;&nbsp;&nbsp;<input id="veg_impatto_ghgs" type="text" class="span2" value="" data-slider-min="-50" data-slider-max="50" data-slider-step="1" data-slider-value="[-1,2]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>50</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Impatto su PM
                                        </label>
                                        <div class="col-8">
                                            <b>-50</b>&nbsp;&nbsp;&nbsp;<input id="veg_impatto_pm" type="text" class="span2" value="" data-slider-min="-50" data-slider-max="50" data-slider-step="1" data-slider-value="[1,2]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>50</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Impatto su NH<sub>3</sub>
                                        </label>
                                        <div class="col-8">
                                            <b>-50</b>&nbsp;&nbsp;&nbsp;<input id="veg_impatto_nh3" type="text" class="span2" value="" data-slider-min="-50" data-slider-max="50" data-slider-step="1" data-slider-value="[-1,-2]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>50</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            GHGS ideale
                                        </label>
                                        <div class="col-8">
                                            <b>-50</b>&nbsp;&nbsp;&nbsp;<input id="veg_ideal_ghgs" type="text" class="span2" value="" data-slider-min="-50" data-slider-max="50" data-slider-step="1" data-slider-value="[0,5]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>50</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Tolleranza all'influenza di GHGS
                                        </label>
                                        <div class="col-8">
                                            <b>-90</b>&nbsp;&nbsp;&nbsp;<input id="veg_toll_infl_prod_ghgs" type="text" class="span2" value="" data-slider-min="-90" data-slider-max="90" data-slider-step="1" data-slider-value="[30,60]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>90</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            PM ideale
                                        </label>
                                        <div class="col-8">
                                            <b>-50</b>&nbsp;&nbsp;&nbsp;<input id="veg_ideal_pm" type="text" class="span2" value="" data-slider-min="-50" data-slider-max="50" data-slider-step="1" data-slider-value="[0,0]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>50</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Tolleranza all'influenza di PM
                                        </label>
                                        <div class="col-8">
                                            <b>-90</b>&nbsp;&nbsp;&nbsp;<input id="veg_toll_infl_prod_pm" type="text" class="span2" value="" data-slider-min="-90" data-slider-max="90" data-slider-step="1" data-slider-value="[40,60]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>90</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            NH<sub>3</sub> ideale
                                        </label>
                                        <div class="col-8">
                                            <b>-50</b>&nbsp;&nbsp;&nbsp;<input id="veg_ideal_nh3" type="text" class="span2" value="" data-slider-min="-50" data-slider-max="50" data-slider-step="1" data-slider-value="[15,25]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>50</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Tolleranza all'influenza di NH<sub>3</sub>
                                        </label>
                                        <div class="col-8">
                                            <b>-50</b>&nbsp;&nbsp;&nbsp;<input id="veg_toll_infl_prod_nh3" type="text" class="span2" value="" data-slider-min="-50" data-slider-max="50" data-slider-step="1" data-slider-value="[20,30]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>50</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Temperatura ideale
                                        </label>
                                        <div class="col-8">
                                            <b>-50</b>&nbsp;&nbsp;&nbsp;<input id="veg_ideal_temp" type="text" class="span2" value="" data-slider-min="-50" data-slider-max="50" data-slider-step="1" data-slider-value="[20,30]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>50</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Tolleranza all'influenza della temperatura
                                        </label>
                                        <div class="col-8">
                                            <b>-50</b>&nbsp;&nbsp;&nbsp;<input id="veg_toll_infl_prod_temp" type="text" class="span2" value="" data-slider-min="-50" data-slider-max="50" data-slider-step="1" data-slider-value="[2,10]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>50</b>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" id="discardChangesTuttiProd"><i class="fas fa-sync-alt"></i>&nbsp&nbspReset</button>
                                <button type="button" class="btn btn-success" data-dismiss="modal" id="saveChangesTuttiProd"><i class="fa fa-check"></i>&nbsp&nbspSalva</button>
                            </div>
                        </div>
                        <div id="singoli_prodotti">
                            <div class="row">
                                <div class="col-4">
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-6">
                                            Manzo
                                        </label>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#manzoModal"><i class="fa fa-cog"></i></button>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-6">
                                            Pollo
                                        </label>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#polloModal"><i class="fa fa-cog"></i></button>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-6">
                                            Maiale
                                        </label>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#maialeModal"><i class="fa fa-cog"></i></button>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-6">
                                            Cavallo
                                        </label>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#cavalloModal"><i class="fa fa-cog"></i></button>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-6">
                                            Tacchino
                                        </label>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#tacchinoModal"><i class="fa fa-cog"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-6">
                                            Patate
                                        </label>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#patateModal"><i class="fa fa-cog"></i></button>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-6">
                                            Zucchine
                                        </label>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#zucchineModal"><i class="fa fa-cog"></i></button>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-6">
                                            Peperoni
                                        </label>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#peperoniModal"><i class="fa fa-cog"></i></button>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-6">
                                            Melanzane
                                        </label>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#melanzaneModal"><i class="fa fa-cog"></i></button>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-6">
                                            Pomodori
                                        </label>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#pomodoriModal"><i class="fa fa-cog"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-6">
                                            Grano
                                        </label>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#granoModal"><i class="fa fa-cog"></i></button>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-6">
                                            Riso
                                        </label>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#risoModal"><i class="fa fa-cog"></i></button>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-6">
                                            Melo
                                        </label>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#meloModal"><i class="fa fa-cog"></i></button>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-6">
                                            Pero
                                        </label>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#peroModal"><i class="fa fa-cog"></i></button>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-6">
                                            Arancio
                                        </label>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#arancioModal"><i class="fa fa-cog"></i></button>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal" id="saveChangesSingoliProd"><i class="fa fa-check"></i>&nbsp&nbspSalva</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal singoli prodotti-->
    <?php
    $itemsProd = ['manzo' => 'carne', 'pollo' => 'carne', 'maiale' => 'carne', 'cavallo' => 'carne', 'tacchino' => 'carne',
        'patate' => 'vegetale', 'zucchine' => 'vegetale', 'peperoni' => 'vegetale', 'melanzane' => 'vegetale', 'pomodori' => 'vegetale',
        'grano' => 'vegetale', 'riso' => 'vegetale', 'melo' => 'vegetale', 'pero' => 'vegetale', 'arancio' => 'vegetale'];

    foreach ($itemsProd as $value => $value_tipo) {

        echo '<div class="modal fade child-modal" id="' . $value . 'Modal" tabindex="-1" role="dialog" data-backdrop="static">';
        echo '<div class="modal-dialog">';
        echo '<div class="modal-content">';
        echo '<div class="modal-header">';
        echo '<h4 class="modal-title">Imposta parametri ' . $value . '</h4>';
        echo '<button type="button" class="close" data-dismiss="modal" id="chiudiFinestra' . $value . '">&times;</button>';
        echo '</div>';
        echo '<div class="modal-body">';
        echo '<div class="row">';
        echo '<div class="col-3">';
        echo '<input type="text" readonly class="form-control textbox" name="' . $value . '_tipo" value="' . $value_tipo . '" style="display: none;">';
        echo '</div></div>';
        echo '<div class="row">';
        echo '<div class="col">';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">Prezzo</label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $value . '_prezzo_slider" value="30">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $value . '_prezzo" value="30">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $value . '_prezzo_checkbox" class="parametri_' . $value . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">Capacità produttiva iniziale</label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $value . '_produttivita_slider" value="30">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $value . '_produttivita" value="30">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $value . '_produttivita_checkbox" class="parametri_' . $value . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">Impatto su GHGS</label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $value . '_impatto_ghgs_slider" value="30">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $value . '_impatto_ghgs" value="30">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $value . '_impatto_ghgs_checkbox" class="parametri_' . $value . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">Impatto su PM</label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $value . '_impatto_pm_slider" value="30">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $value . '_impatto_pm" value="30">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $value . '_impatto_pm_checkbox" class="parametri_' . $value . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">Impatto su NH<sub>3</sub></label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $value . '_impatto_nh3_slider" value="30">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $value . '_impatto_nh3" value="30">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $value . '_impatto_nh3_checkbox" class="parametri_' . $value . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">GHGS ideale</label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $value . '_ghgs_ideale_slider" value="30">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $value . '_ghgs_ideale" value="30">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $value . '_ghgs_ideale_checkbox" class="parametri_' . $value . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">Tolleranza all\'influenza di GHGS</label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $value . '_tolleranza_ghgs_slider" value="30">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $value . '_tolleranza_ghgs" value="30">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $value . '_tolleranza_ghgs_checkbox" class="parametri_' . $value . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">PM ideale</label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $value . '_pm_ideale_slider" value="30">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $value . '_pm_ideale" value="30">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $value . '_pm_ideale_checkbox" class="parametri_' . $value . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">Tolleranza all\'influenza di PM</label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $value . '_tolleranza_pm_slider" value="30">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $value . '_tolleranza_pm" value="30">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $value . '_tolleranza_pm_checkbox" class="parametri_' . $value . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">NH<sub>3</sub> ideale</label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $value . '_nh3_ideale_slider" value="30">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $value . '_nh3_ideale" value="30">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $value . '_nh3_ideale_checkbox" class="parametri_' . $value . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">Tolleranza all\'influenza di NH<sub>3</sub></label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $value . '_tolleranza_nh3_slider" value="30">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $value . '_tolleranza_nh3" value="30">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $value . '_tolleranza_nh3_checkbox" class="parametri_' . $value . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">Temperatura ideale</label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $value . '_temperatura_ideale_slider" value="30">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $value . '_temperatura_ideale" value="30">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $value . '_temperatura_ideale_checkbox" class="parametri_' . $value . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">Tolleranza all\'influenza della temperatura</label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $value . '_tolleranza_temperatura_slider" value="30">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $value . '_tolleranza_temperatura" value="30">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $value . '_tolleranza_temperatura_checkbox" class="parametri_' . $value . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">Variazione percentuale</label>';
        echo '<div class="col-8">';
        echo '<input type="number" class="form-control textbox" min="-100" max="100" step="1" name="variazione_percentuale_' . $value . '" value="0" disabled>';
        echo '</div><div class="col-1"></div></div>';
        echo '</div></div></div>';
        echo '<div class="modal-footer">';
        echo '<button type="button" class="btn btn-danger" data-dismiss="modal" id="discardChanges' . $value . '"><i class="fas fa-sync-alt"></i>&nbsp&nbspReset</button>';
        echo '<button type="button" class="btn btn-success" data-dismiss="modal" id="saveChanges' . $value . '"><i class="fa fa-check"></i>&nbsp&nbspSalva</button>';
        echo '</div></div></div></div>';
    }
    ?>

    <!-- Modal extra-->
    <div class="modal fade" id="parameterExtraModal" role="dialog" data-backdrop="static">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Imposta parametri di sistema</h4>
                    <button type="button" class="close" data-dismiss="modal" id="chiudiFinestraExtra">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="row form-group align-items-center">
                                <label class="col-form-label col-4">
                                    Step nascita popolazione
                                </label>
                                <div class="col-5">
                                    <input type="range" class="custom-range" min="0" max="100" step="1" name="step_nascita_popolazione_slider" value="60">
                                </div>
                                <div class="col-2">
                                    <input type="number" class="form-control textbox" min="0" max="100" step="1" name="step_nascita_popolazione" value="60"> 
                                </div>
                                <div class="col-1">
                                    <div class="checkbox"><input type="checkbox" value="" id="step_nascita_popolazione_checkbox" class="parametri_extra"></div>
                                </div>
                            </div>
                            <div class="row form-group align-items-center">
                                <label class="col-form-label col-4">
                                    Step morte popolazione
                                </label>
                                <div class="col-5">
                                    <input type="range" class="custom-range" min="0" max="100" step="1" name="step_morte_popolazione_slider" value="25">
                                </div>
                                <div class="col-2">
                                    <input type="number" class="form-control textbox" min="0" max="100" step="1" name="step_morte_popolazione" value="25"> 
                                </div>
                                <div class="col-1">
                                    <div class="checkbox"><input type="checkbox" value="" id="step_morte_popolazione_checkbox" class="parametri_extra"></div>
                                </div>
                            </div>
                            <div class="row form-group align-items-center">
                                <label class="col-form-label col-4">
                                    Rapporto nascite salute
                                </label>
                                <div class="col-5">
                                    <input type="range" class="custom-range" min="0" max="100" step="1" name="rapporto_nascite_salute_slider" value="20">
                                </div>
                                <div class="col-2">
                                    <input type="number" class="form-control textbox" min="0" max="100" step="1" name="rapporto_nascite_salute" value="20"> 
                                </div>
                                <div class="col-1">
                                    <div class="checkbox"><input type="checkbox" value="" id="rapporto_nascite_salute_checkbox" class="parametri_extra"></div>
                                </div>
                            </div>
                            <div class="row form-group align-items-center">
                                <label class="col-form-label col-4">
                                    Valore salute stabile
                                </label>
                                <div class="col-5">
                                    <input type="range" class="custom-range" min="0" max="100" step="1" name="valore_salute_stabile_slider" value="60">
                                </div>
                                <div class="col-2">
                                    <input type="number" class="form-control textbox" min="0" max="100" step="1" name="valore_salute_stabile" value="60"> 
                                </div>
                                <div class="col-1">
                                    <div class="checkbox"><input type="checkbox" value="" id="valore_salute_stabile_checkbox" class="parametri_extra"></div>
                                </div>
                            </div>
                            <div class="row form-group align-items-center">
                                <label class="col-form-label col-4">
                                    Massima crescita salute
                                </label>
                                <div class="col-5">
                                    <input type="range" class="custom-range" min="0" max="100" step="1" name="massima_crescita_salute_slider" value="3">
                                </div>
                                <div class="col-2">
                                    <input type="number" class="form-control textbox" min="0" max="100" step="1" name="massima_crescita_salute" value="3"> 
                                </div>
                                <div class="col-1">
                                    <div class="checkbox"><input type="checkbox" value="" id="massima_crescita_salute_checkbox" class="parametri_extra"></div>
                                </div>
                            </div>
                            <div class="row form-group align-items-center">
                                <label class="col-form-label col-4">
                                    Valore capacità stabile
                                </label>
                                <div class="col-5">
                                    <input type="range" class="custom-range" min="0" max="100" step="1" name="valore_capacita_stabile_slider" value="70">
                                </div>
                                <div class="col-2">
                                    <input type="number" class="form-control textbox" min="0" max="100" step="1" name="valore_capacita_stabile" value="70"> 
                                </div>
                                <div class="col-1">
                                    <div class="checkbox"><input type="checkbox" value="" id="valore_capacita_stabile_checkbox" class="parametri_extra"></div>
                                </div>
                            </div>
                            <div class="row form-group align-items-center">
                                <label class="col-form-label col-4">
                                    Massima crescita capacita
                                </label>
                                <div class="col-5">
                                    <input type="range" class="custom-range" min="0" max="100" step="1" name="massima_crescita_capacita_slider" value="7">
                                </div>
                                <div class="col-2">
                                    <input type="number" class="form-control textbox" min="0" max="100" step="1" name="massima_crescita_capacita" value="7"> 
                                </div>
                                <div class="col-1">
                                    <div class="checkbox"><input type="checkbox" value="" id="massima_crescita_capacita_checkbox" class="parametri_extra"></div>
                                </div>
                            </div>
                            <div class="row form-group align-items-center">
                                <label class="col-form-label col-4">
                                    Influenza differenze ricchezza
                                </label>
                                <div class="col-5">
                                    <input type="range" class="custom-range" min="0" max="100" step="1" name="influenza_differenze_ricchezza_slider" value="30">
                                </div>
                                <div class="col-2">
                                    <input type="number" class="form-control textbox" min="0" max="100" step="1" name="influenza_differenze_ricchezza" value="30"> 
                                </div>
                                <div class="col-1">
                                    <div class="checkbox"><input type="checkbox" value="" id="influenza_differenze_ricchezza_checkbox" class="parametri_extra"></div>
                                </div>
                            </div>
                            <div class="row form-group align-items-center">
                                <label class="col-form-label col-4">
                                    Variazione percentuale
                                </label>   
                                <div class="col-7">
                                    <input type="number" class="form-control textbox" min="-100" max="100" step="1" name="variazione_percentuale_extra" value="0" disabled> 
                                </div>
                                <div class="col-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="discardChangesExtra"><i class="fas fa-sync-alt"></i>&nbsp&nbspReset</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal" id="saveChangesExtra"><i class="fa fa-check"></i>&nbsp&nbspSalva</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="js/lib/jquery-3.3.1.min.js"></script>
    <script src="js/lib/jquery-ui.min.js"></script>
    <script src="js/lib/popper-1.14.3.min.js"></script>
    <script src="js/lib/bootstrap-4.1.3.min.js"></script>
    <script src="js/lib/Chart.bundle.min.js"></script>
    <script src="js/Utils.js"></script>
    <script src="js/index.js"></script>
    <script src="js/lib/bootstrap-slider.min.js"></script>

</body>

</html>