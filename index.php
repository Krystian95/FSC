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
                                <div class="progress-bar progress-bar-striped" id="progressBarYear" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <br>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled="true">
                            <span id="simbol-left"><i class="fas fa-users fa-fw"></i></span><span id="text-left">Popolazione</span>
                        </button>
                        <div class="menu-left">
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item left-element" id="Popolazione left" href="#footer"><i class="fas fa-users fa-fw"></i>Popolazione</a></li>
                                <li><a class="dropdown-item left-element" id="Nati e morti left" href="#footer"><i class="fas fa-user-circle fa-fw"></i>Nati e morti</a></li>
                                <li><a class="dropdown-item left-element" id="Salute media left" href="#footer"><i class="fa fa-medkit fa-fw"></i>Salute media</a></li>
                                <li><a class="dropdown-item left-element" id="Distribuzione della salute left" href="#footer"><i class="fa fa-heartbeat fa-fw"></i>Distribuzione della salute</a></li>
                                <li><a class="dropdown-item left-element" id="Capacità produttiva left" href="#footer"><i class="fa fa-industry fa-fw"></i>Capacità produttiva</a></li>
                                <li><a class="dropdown-item left-element" id="Produzione left" href="#footer"><i class="fa fa-archive fa-fw"></i>Produzione</a></li>
                                <li><a class="dropdown-item left-element" id="Vendite left" href="#footer"><i class="fa fa-chart-line fa-fw"></i>Vendite</a></li>
                                <li><a class="dropdown-item left-element" id="Capacità, produzione e vendita mensile left" href="#footer"><i class="fa fa-signal fa-fw"></i>Capacità, produzione e vendita mensile</a></li>
                                <li><a class="dropdown-item left-element" id="Industria carni industria vegetali left" href="#footer"><i class="fa fa-seedling fa-fw"></i>Industria carni/industria vegetali</a></li>
                                <li><a class="dropdown-item left-element" id="Temperatura left" href="#footer"><i class="fa fa-thermometer-half fa-fw"></i>Temperatura</a></li>
                                <li><a class="dropdown-item left-element" id="Agenti atmosferici left" href="#footer"><i class="fas fa-cloud-sun-rain fa-fw"></i>Agenti atmosferici</a></li>
                                <li><a class="dropdown-item left-element" id="Distribuzione cibi acquistati/ricchezza left" href="#footer"><i class="fas fa-dollar-sign fa-fw"></i>Distribuzione cibi acquistati/ricchezza</a></li>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="charts_left"></div>
                </div>
                <div class="col-6">
                    <br>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled="true">
                            <span id="simbol-right"><i class="fa fa-industry fa-fw"></i></span><span id="text-right">Capacità produttiva</span>
                        </button>
                        <div class="menu-right">
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item right-element" id="Popolazione right" href="#footer"><i class="fas fa-users fa-fw"></i>Popolazione</a></li>
                                <li><a class="dropdown-item right-element" id="Nati e morti right" href="#footer"><i class="fas fa-user-circle fa-fw"></i>Nati e morti</a></li>
                                <li><a class="dropdown-item right-element" id="Salute media right" href="#footer"><i class="fa fa-medkit fa-fw"></i>Salute media</a></li>
                                <li><a class="dropdown-item left-element" id="Distribuzione della salute right" href="#footer"><i class="fa fa-heartbeat fa-fw"></i>Distribuzione della salute</a></li>
                                <li><a class="dropdown-item right-element" id="Capacità produttiva right" href="#footer"><i class="fa fa-industry fa-fw"></i>Capacità produttiva</a></li>
                                <li><a class="dropdown-item right-element" id="Produzione right" href="#footer"><i class="fa fa-archive fa-fw"></i>Produzione</a></li>
                                <li><a class="dropdown-item right-element" id="Vendite right" href="#footer"><i class="fa fa-chart-line fa-fw"></i>Vendite</a></li>
                                <li><a class="dropdown-item right-element" id="Capacità, produzione e vendita mensile right" href="#footer"><i class="fa fa-signal fa-fw"></i>Capacità, produzione e vendita mensile</a></li>
                                <li><a class="dropdown-item left-element" id="Industria carni industria vegetali right" href="#footer"><i class="fa fa-seedling fa-fw"></i>Industria carni/industria vegetali</a></li>
                                <li><a class="dropdown-item right-element" id="Temperatura right" href="#footer"><i class="fa fa-thermometer-half fa-fw"></i>Temperatura</a></li>
                                <li><a class="dropdown-item right-element" id="Agenti atmosferici right" href="#footer"><i class="fas fa-cloud-sun-rain fa-fw"></i>Agenti atmosferici</a></li>
                                <li><a class="dropdown-item right-element" id="Distribuzione cibi acquistati/ricchezza right" href="#footer"><i class="fas fa-dollar-sign fa-fw"></i>Distribuzione cibi acquistati/ricchezza</a></li>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="charts_right"></div>
                </div>
            </div>
        </div>

        <!-- #footer -->
        <footer class="py-4 bg-dark" style="height: 145px;">
            <div class="container">
                <p class="m-0 text-center text-white" style="padding: 40px;">Copyright &copy; 2019 HESystem. Tutti i diritti riservati.</p>
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
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="popolazione_iniziale_slider" value="70">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="popolazione_iniziale" value="70"> 
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
                                        <input type="range" class="custom-range" min="-100" max="100" step="1" name="tendenza_mangiare_carne_slider" value="27">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="-100" max="100" step="1" name="tendenza_mangiare_carne" value="27"> 
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
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="salute_iniziale_dev_stan_slider" value="0">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="salute_iniziale_dev_stan" value="0"> 
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
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="ricchezza_media_slider" value="85">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="ricchezza_media" value="85"> 
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
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="ricchezza_dev_stan_slider" value="0">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="ricchezza_dev_stan" value="0"> 
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
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="fabbisogno_cibo_media_slider" value="14">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="fabbisogno_cibo_media" value="14"> 
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
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="fabbisogno_cibo_dev_stan_slider" value="0">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="fabbisogno_cibo_dev_stan" value="0"> 
                                    </div>
                                    <div class="col-1">
                                        <div class="checkbox"><input type="checkbox" value="" id="fabbisogno_cibo_dev_stan_checkbox" class="parametri_popolazione"></div>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center variazione_percentuale">
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
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="oscillazioni_temperatura_ampiezza_slider" value="0">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="oscillazioni_temperatura_ampiezza" value="0"> 
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
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="valore_iniziale_ghgs_slider" value="10">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="valore_iniziale_ghgs" value="10"> 
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
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="valore_iniziale_pm_slider" value="10">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="valore_iniziale_pm" value="10"> 
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
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="valore_iniziale_nh3_slider" value="10">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="valore_iniziale_nh3" value="10"> 
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
                                        <input type="range" class="custom-range" min="-100" max="100" step="1" name="extern_ghgs_slider" value="-30">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="-100" max="100" step="1" name="extern_ghgs" value="-30"> 
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
                                        <input type="range" class="custom-range" min="-100" max="100" step="1" name="extern_pm_slider" value="-60">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="-100" max="100" step="1" name="extern_pm" value="-60"> 
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
                                        <input type="range" class="custom-range" min="-100" max="100" step="1" name="extern_nh3_slider" value="-15">
                                    </div>
                                    <div class="col-2">
                                        <input type="number" class="form-control textbox" min="-100" max="100" step="1" name="extern_nh3" value="15"> 
                                    </div>
                                    <div class="col-1">
                                        <div class="checkbox"><input type="checkbox" value="" id="extern_nh3_checkbox" class="parametri_ambiente"></div>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center variazione_percentuale">
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
                <div class="modal-content" id="parameterProdModalDialog">
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
                                            <b>0</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="numero_prodotti" data-slider-id='numero_prodotti' type="text" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="30"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
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
                                            &nbsp;&nbsp;&nbsp; <b>1</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="meat_prezzo" type="text" class="span2" value="" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="[17,17]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Capacità produttiva iniziale
                                        </label>
                                        <div class="col-8">
                                            &nbsp;&nbsp;&nbsp; <b>1</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="meat_produttivita" type="text" class="span2" value="" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="[45,45]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Impatto su GHGS
                                        </label>
                                        <div class="col-8">
                                            <b>-100</b>&nbsp;&nbsp;&nbsp;&nbsp;<input id="meat_impatto_ghgs" type="text" class="span2" value="" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[4,4]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Impatto su PM
                                        </label>
                                        <div class="col-8">
                                            <b>-100</b>&nbsp;&nbsp;&nbsp;&nbsp;<input id="meat_impatto_pm" type="text" class="span2" value="" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[6,6]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Impatto su NH<sub>3</sub>
                                        </label>
                                        <div class="col-8">
                                            <b>-100</b>&nbsp;&nbsp;&nbsp;&nbsp;<input id="meat_impatto_nh3" type="text" class="span2" value="" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[10,10]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            GHGS ideale
                                        </label>
                                        <div class="col-8">
                                            &nbsp;&nbsp;&nbsp; <b>0</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="meat_ideal_ghgs" type="text" class="span2" value="" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="[0,0]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Tolleranza all'influenza di GHGS
                                        </label>
                                        <div class="col-8">
                                            &nbsp;&nbsp;&nbsp; <b>0</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="meat_toll_infl_prod_ghgs" type="text" class="span2" value="" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="[70,70]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            PM ideale
                                        </label>
                                        <div class="col-8">
                                            &nbsp;&nbsp;&nbsp; <b>0</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="meat_ideal_pm" type="text" class="span2" value="" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="[0,0]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Tolleranza all'influenza di PM
                                        </label>
                                        <div class="col-8">
                                            &nbsp;&nbsp;&nbsp; <b>0</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="meat_toll_infl_prod_pm" type="text" class="span2" value="" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="[100,100]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            NH<sub>3</sub> ideale
                                        </label>
                                        <div class="col-8">
                                            &nbsp;&nbsp;&nbsp; <b>0</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="meat_ideal_nh3" type="text" class="span2" value="" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="[0,0]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Tolleranza all'influenza di NH<sub>3</sub>
                                        </label>
                                        <div class="col-8">
                                            &nbsp;&nbsp;&nbsp; <b>0</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="meat_toll_infl_prod_nh3" type="text" class="span2" value="" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="[50,50]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Temperatura ideale
                                        </label>
                                        <div class="col-8">
                                            &nbsp;&nbsp;&nbsp; <b>0</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="meat_ideal_temp" type="text" class="span2" value="" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="[25,25]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Tolleranza all'influenza della temperatura
                                        </label>
                                        <div class="col-8">
                                            &nbsp;&nbsp;&nbsp; <b>0</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="meat_toll_infl_prod_temp" type="text" class="span2" value="" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="[20,20]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
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
                                            &nbsp;&nbsp;&nbsp; <b>1</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="veg_prezzo" type="text" class="span2" value="" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="[10,10]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Capacità produttiva iniziale
                                        </label>
                                        <div class="col-8">
                                            &nbsp;&nbsp;&nbsp; <b>1</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="veg_produttivita" type="text" class="span2" value="" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="[43,43]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Impatto su GHGS
                                        </label>
                                        <div class="col-8">
                                            <b>-100</b>&nbsp;&nbsp;&nbsp;&nbsp;<input id="veg_impatto_ghgs" type="text" class="span2" value="" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[1,1]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Impatto su PM
                                        </label>
                                        <div class="col-8">
                                            <b>-100</b>&nbsp;&nbsp;&nbsp;&nbsp;<input id="veg_impatto_pm" type="text" class="span2" value="" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[2,2]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Impatto su NH<sub>3</sub>
                                        </label>
                                        <div class="col-8">
                                            <b>-100</b>&nbsp;&nbsp;&nbsp;&nbsp;<input id="veg_impatto_nh3" type="text" class="span2" value="" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-5,-5]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            GHGS ideale
                                        </label>
                                        <div class="col-8">
                                            &nbsp;&nbsp;&nbsp; <b>0</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="veg_ideal_ghgs" type="text" class="span2" value="" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="[0,0]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Tolleranza all'influenza di GHGS
                                        </label>
                                        <div class="col-8">
                                            &nbsp;&nbsp;&nbsp; <b>0</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="veg_toll_infl_prod_ghgs" type="text" class="span2" value="" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="[50,50]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            PM ideale
                                        </label>
                                        <div class="col-8">
                                            &nbsp;&nbsp;&nbsp; <b>0</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="veg_ideal_pm" type="text" class="span2" value="" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="[0,0]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Tolleranza all'influenza di PM
                                        </label>
                                        <div class="col-8">
                                            &nbsp;&nbsp;&nbsp; <b>0</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="veg_toll_infl_prod_pm" type="text" class="span2" value="" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="[80,80]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            NH<sub>3</sub> ideale
                                        </label>
                                        <div class="col-8">
                                            &nbsp;&nbsp;&nbsp; <b>0</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="veg_ideal_nh3" type="text" class="span2" value="" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="[15,15]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Tolleranza all'influenza di NH<sub>3</sub>
                                        </label>
                                        <div class="col-8">
                                            &nbsp;&nbsp;&nbsp; <b>0</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="veg_toll_infl_prod_nh3" type="text" class="span2" value="" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="[40,40]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Temperatura ideale
                                        </label>
                                        <div class="col-8">
                                            &nbsp;&nbsp;&nbsp; <b>0</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="veg_ideal_temp" type="text" class="span2" value="" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="[25,25]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
                                        </div>
                                    </div>
                                    <div class="row form-group align-items-center">
                                        <label class="col-form-label col-4">
                                            Tolleranza all'influenza della temperatura
                                        </label>
                                        <div class="col-8">
                                            &nbsp;&nbsp;&nbsp; <b>0</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="veg_toll_infl_prod_temp" type="text" class="span2" value="" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="[10,10]"/>&nbsp;&nbsp;&nbsp;&nbsp;<b>100</b>
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
    
    $products = Array(
        'manzo' => Array(
            'tipo' => 'meat',
            'prezzo' => 9,
            'capacita_produttiva_iniziale' => 3,
            'impatto_ghgs' => 4,
            'impatto_pm' => 2,
            'impatto_nh3' => 2,
            'ghgs_ideale' => 3,
            'tolleranza_influenza_ghgs' => 69,
            'pm_ideale' => 0,
            'tolleranza_influenza_pm' => 85,
            'nh3_ideale' => 2,
            'tolleranza_influenza_nh3' => 70,
            'temperatura_ideale' => 22,
            'tolleranza_influenza_temperatura' => 5
        ),
        'pollo' => Array(
            'tipo' => 'meat',
            'prezzo' => 11,
            'capacita_produttiva_iniziale' => 4,
            'impatto_ghgs' => 4,
            'impatto_pm' => 3,
            'impatto_nh3' => 1,
            'ghgs_ideale' => 6,
            'tolleranza_influenza_ghgs' => 59,
            'pm_ideale' => 0,
            'tolleranza_influenza_pm' => 80,
            'nh3_ideale' => 3,
            'tolleranza_influenza_nh3' => 65,
            'temperatura_ideale' => 28,
            'tolleranza_influenza_temperatura' => 6
        ),
        'maiale' => Array(
            'tipo' => 'meat',
            'prezzo' => 10,
            'capacita_produttiva_iniziale' => 5,
            'impatto_ghgs' => 3,
            'impatto_pm' => 2,
            'impatto_nh3' => 2,
            'ghgs_ideale' => 9,
            'tolleranza_influenza_ghgs' => 65,
            'pm_ideale' => 0,
            'tolleranza_influenza_pm' => 75,
            'nh3_ideale' => 6,
            'tolleranza_influenza_nh3' => 60,
            'temperatura_ideale' => 25,
            'tolleranza_influenza_temperatura' => 8
        ),
        'cavallo' => Array(
            'tipo' => 'meat',
            'prezzo' => 14,
            'capacita_produttiva_iniziale' => 4,
            'impatto_ghgs' => 4,
            'impatto_pm' => 3,
            'impatto_nh3' => 1,
            'ghgs_ideale' => 8,
            'tolleranza_influenza_ghgs' => 55,
            'pm_ideale' => 0,
            'tolleranza_influenza_pm' => 70,
            'nh3_ideale' => 8,
            'tolleranza_influenza_nh3' => 55,
            'temperatura_ideale' => 26,
            'tolleranza_influenza_temperatura' => 10
        ),
        'tacchino' => Array(
            'tipo' => 'meat',
            'prezzo' => 11,
            'capacita_produttiva_iniziale' => 5,
            'impatto_ghgs' => 3,
            'impatto_pm' => 2,
            'impatto_nh3' => 2,
            'ghgs_ideale' => 2,
            'tolleranza_influenza_ghgs' => 52,
            'pm_ideale' => 0,
            'tolleranza_influenza_pm' => 65,
            'nh3_ideale' => 10,
            'tolleranza_influenza_nh3' => 50,
            'temperatura_ideale' => 28,
            'tolleranza_influenza_temperatura' => 12
        ),
        'patate' => Array(
            'tipo' => 'veg',
            'prezzo' => 2,
            'capacita_produttiva_iniziale' => 4,
            'impatto_ghgs' => 9,
            'impatto_pm' => 2,
            'impatto_nh3' => -2,
            'ghgs_ideale' => 9,
            'tolleranza_influenza_ghgs' => 55,
            'pm_ideale' => 0,
            'tolleranza_influenza_pm' => 56,
            'nh3_ideale' => 9,
            'tolleranza_influenza_nh3' => 20,
            'temperatura_ideale' => 20,
            'tolleranza_influenza_temperatura' => 5
        ),
        'zucchine' => Array(
            'tipo' => 'veg',
            'prezzo' => 5,
            'capacita_produttiva_iniziale' => 5,
            'impatto_ghgs' => 1,
            'impatto_pm' => 1,
            'impatto_nh3' => -1,
            'ghgs_ideale' => 2,
            'tolleranza_influenza_ghgs' => 60,
            'pm_ideale' => 0,
            'tolleranza_influenza_pm' => 52,
            'nh3_ideale' => 15,
            'tolleranza_influenza_nh3' => 30,
            'temperatura_ideale' => 21,
            'tolleranza_influenza_temperatura' => 2
        ),
        'peperoni' => Array(
            'tipo' => 'veg',
            'prezzo' => 7,
            'capacita_produttiva_iniziale' => 6,
            'impatto_ghgs' => 0,
            'impatto_pm' => 2,
            'impatto_nh3' => -2,
            'ghgs_ideale' => 5,
            'tolleranza_influenza_ghgs' => 46,
            'pm_ideale' => 0,
            'tolleranza_influenza_pm' => 51,
            'nh3_ideale' => 17,
            'tolleranza_influenza_nh3' => 29,
            'temperatura_ideale' => 22,
            'tolleranza_influenza_temperatura' => 3
        ),
        'melanzane' => Array(
            'tipo' => 'veg',
            'prezzo' => 8,
            'capacita_produttiva_iniziale' => 7,
            'impatto_ghgs' => 2,
            'impatto_pm' => 1,
            'impatto_nh3' => -1,
            'ghgs_ideale' => 4,
            'tolleranza_influenza_ghgs' => 32,
            'pm_ideale' => 0,
            'tolleranza_influenza_pm' => 43,
            'nh3_ideale' => 19,
            'tolleranza_influenza_nh3' => 26,
            'temperatura_ideale' => 23,
            'tolleranza_influenza_temperatura' => 4
        ),
        'pomodori' => Array(
            'tipo' => 'veg',
            'prezzo' => 5,
            'capacita_produttiva_iniziale' => 6,
            'impatto_ghgs' => 1,
            'impatto_pm' => 2,
            'impatto_nh3' => -2,
            'ghgs_ideale' => 3,
            'tolleranza_influenza_ghgs' => 58,
            'pm_ideale' => 0,
            'tolleranza_influenza_pm' => 57,
            'nh3_ideale' => 21,
            'tolleranza_influenza_nh3' => 22,
            'temperatura_ideale' => 24,
            'tolleranza_influenza_temperatura' => 5
        ),
        'grano' => Array(
            'tipo' => 'veg',
            'prezzo' => 3,
            'capacita_produttiva_iniziale' => 5,
            'impatto_ghgs' => -1,
            'impatto_pm' => 1,
            'impatto_nh3' => -1,
            'ghgs_ideale' => 2,
            'tolleranza_influenza_ghgs' => 46,
            'pm_ideale' => 0,
            'tolleranza_influenza_pm' => 49,
            'nh3_ideale' => 23,
            'tolleranza_influenza_nh3' => 30,
            'temperatura_ideale' => 25,
            'tolleranza_influenza_temperatura' => 6
        ),
        'riso' => Array(
            'tipo' => 'veg',
            'prezzo' => 4,
            'capacita_produttiva_iniziale' => 4,
            'impatto_ghgs' => -1,
            'impatto_pm' => 2,
            'impatto_nh3' => -2,
            'ghgs_ideale' => 5,
            'tolleranza_influenza_ghgs' => 39,
            'pm_ideale' => 0,
            'tolleranza_influenza_pm' => 60,
            'nh3_ideale' => 25,
            'tolleranza_influenza_nh3' => 27,
            'temperatura_ideale' => 26,
            'tolleranza_influenza_temperatura' => 7
        ),
        'melo' => Array(
            'tipo' => 'veg',
            'prezzo' => 9,
            'capacita_produttiva_iniziale' => 7,
            'impatto_ghgs' => 0,
            'impatto_pm' => 1,
            'impatto_nh3' => -1,
            'ghgs_ideale' => 1,
            'tolleranza_influenza_ghgs' => 53,
            'pm_ideale' => 0,
            'tolleranza_influenza_pm' => 55,
            'nh3_ideale' => 20,
            'tolleranza_influenza_nh3' => 25,
            'temperatura_ideale' => 27,
            'tolleranza_influenza_temperatura' => 8
        ),
        'pero' => Array(
            'tipo' => 'veg',
            'prezzo' => 10,
            'capacita_produttiva_iniziale' => 5,
            'impatto_ghgs' => 1,
            'impatto_pm' => 2,
            'impatto_nh3' => -2,
            'ghgs_ideale' => 4,
            'tolleranza_influenza_ghgs' => 44,
            'pm_ideale' => 0,
            'tolleranza_influenza_pm' => 50,
            'nh3_ideale' => 22,
            'tolleranza_influenza_nh3' => 23,
            'temperatura_ideale' => 28,
            'tolleranza_influenza_temperatura' => 9
        ),
        'arancio' => Array(
            'tipo' => 'veg',
            'prezzo' => 8,
            'capacita_produttiva_iniziale' => 4,
            'impatto_ghgs' => 2,
            'impatto_pm' => 1,
            'impatto_nh3' => -1,
            'ghgs_ideale' => 2,
            'tolleranza_influenza_ghgs' => 35,
            'pm_ideale' => 0,
            'tolleranza_influenza_pm' => 42,
            'nh3_ideale' => 16,
            'tolleranza_influenza_nh3' => 21,
            'temperatura_ideale' => 25,
            'tolleranza_influenza_temperatura' => 10
        )
    );

    foreach($products as $product => $parameter)
    {
        echo '<div class="modal fade child-modal" id="' . $product . 'Modal" tabindex="-1" role="dialog" data-backdrop="static">';
        echo '<div class="modal-dialog">';
        echo '<div class="modal-content" id="parameterProdSingoliModalDialog">';
        echo '<div class="modal-header">';
        echo '<h4 class="modal-title">Imposta parametri ' . $product . '</h4>';
        echo '<button type="button" class="close" data-dismiss="modal" id="chiudiFinestra' . $product . '">&times;</button>';
        echo '</div>';
        echo '<div class="modal-body">';
        echo '<div class="row">';
        echo '<div class="col-3">';
        echo '<input type="text" readonly class="form-control textbox" name="' . $product . '_tipo" value="' . $parameter['tipo'] . '" style="display: none;">';
        echo '</div></div>';
        echo '<div class="row">';
        echo '<div class="col">';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">Prezzo</label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $product . '_prezzo_slider" value="' . $parameter['prezzo'] . '">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $product . '_prezzo" value="' . $parameter['prezzo'] . '">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $product . '_prezzo_checkbox" class="parametri_' . $product . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">Capacità produttiva iniziale</label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $product . '_produttivita_slider" value="' . $parameter['capacita_produttiva_iniziale'] . '">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $product . '_produttivita" value="' . $parameter['capacita_produttiva_iniziale'] . '">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $product . '_produttivita_checkbox" class="parametri_' . $product . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">Impatto su GHGS</label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $product . '_impatto_ghgs_slider" value="' . $parameter['impatto_ghgs'] . '">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $product . '_impatto_ghgs" value="' . $parameter['impatto_ghgs'] . '">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $product . '_impatto_ghgs_checkbox" class="parametri_' . $product . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">Impatto su PM</label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $product . '_impatto_pm_slider" value="' . $parameter['impatto_pm'] . '">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $product . '_impatto_pm" value="' . $parameter['impatto_pm'] . '">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $product . '_impatto_pm_checkbox" class="parametri_' . $product . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">Impatto su NH<sub>3</sub></label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $product . '_impatto_nh3_slider" value="' . $parameter['impatto_nh3'] . '">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $product . '_impatto_nh3" value="' . $parameter['impatto_nh3'] . '">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $product . '_impatto_nh3_checkbox" class="parametri_' . $product . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">GHGS ideale</label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $product . '_ghgs_ideale_slider" value="' . $parameter['ghgs_ideale'] . '">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $product . '_ghgs_ideale" value="' . $parameter['ghgs_ideale'] . '">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $product . '_ghgs_ideale_checkbox" class="parametri_' . $product . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">Tolleranza all\'influenza di GHGS</label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $product . '_tolleranza_ghgs_slider" value="' . $parameter['tolleranza_influenza_ghgs'] . '">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $product . '_tolleranza_ghgs" value="' . $parameter['tolleranza_influenza_ghgs'] . '">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $product . '_tolleranza_ghgs_checkbox" class="parametri_' . $product . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">PM ideale</label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $product . '_pm_ideale_slider" value="' . $parameter['pm_ideale'] . '">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $product . '_pm_ideale" value="' . $parameter['pm_ideale'] . '">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $product . '_pm_ideale_checkbox" class="parametri_' . $product . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">Tolleranza all\'influenza di PM</label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $product . '_tolleranza_pm_slider" value="' . $parameter['tolleranza_influenza_pm'] . '">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $product . '_tolleranza_pm" value="' . $parameter['tolleranza_influenza_pm'] . '">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $product . '_tolleranza_pm_checkbox" class="parametri_' . $product . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">NH<sub>3</sub> ideale</label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $product . '_nh3_ideale_slider" value="' . $parameter['nh3_ideale'] . '">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $product . '_nh3_ideale" value="' . $parameter['nh3_ideale'] . '">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $product . '_nh3_ideale_checkbox" class="parametri_' . $product . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">Tolleranza all\'influenza di NH<sub>3</sub></label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $product . '_tolleranza_nh3_slider" value="' . $parameter['tolleranza_influenza_nh3'] . '">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $product . '_tolleranza_nh3" value="' . $parameter['tolleranza_influenza_nh3'] . '">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $product . '_tolleranza_nh3_checkbox" class="parametri_' . $product . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">Temperatura ideale</label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $product . '_temperatura_ideale_slider" value="' . $parameter['temperatura_ideale'] . '">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $product . '_temperatura_ideale" value="' . $parameter['temperatura_ideale'] . '">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $product . '_temperatura_ideale_checkbox" class="parametri_' . $product . '"></div></div></div>';
        echo '<div class="row form-group align-items-center">';
        echo '<label class="col-form-label col-3">Tolleranza all\'influenza della temperatura</label>';
        echo '<div class="col-6">';
        echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="' . $product . '_tolleranza_temperatura_slider" value="' . $parameter['tolleranza_influenza_temperatura'] . '">';
        echo '</div><div class="col-2">';
        echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="' . $product . '_tolleranza_temperatura" value="' . $parameter['tolleranza_influenza_temperatura'] . '">';
        echo '</div><div class="col-1">';
        echo '<div class="checkbox"><input type="checkbox" value="" id="' . $product . '_tolleranza_temperatura_checkbox" class="parametri_' . $product . '"></div></div></div>';
        echo '<div class="row form-group align-items-center variazione_percentuale">';
        echo '<label class="col-form-label col-3">Variazione percentuale</label>';
        echo '<div class="col-8">';
        echo '<input type="number" class="form-control textbox" min="-100" max="100" step="1" name="variazione_percentuale_' . $product . '" value="0" disabled>';
        echo '</div><div class="col-1"></div></div>';
        echo '</div></div></div>';
        echo '<div class="modal-footer">';
        echo '<button type="button" class="btn btn-danger" data-dismiss="modal" id="discardChanges' . $product . '"><i class="fas fa-sync-alt"></i>&nbsp&nbspReset</button>';
        echo '<button type="button" class="btn btn-success" data-dismiss="modal" id="saveChanges' . $product . '"><i class="fa fa-check"></i>&nbsp&nbspSalva</button>';
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
                                    <input type="range" class="custom-range" min="0" max="100" step="1" name="step_nascita_popolazione_slider" value="70">
                                </div>
                                <div class="col-2">
                                    <input type="number" class="form-control textbox" min="0" max="100" step="1" name="step_nascita_popolazione" value="70"> 
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
                                    <input type="range" class="custom-range" min="0" max="100" step="1" name="step_morte_popolazione_slider" value="35">
                                </div>
                                <div class="col-2">
                                    <input type="number" class="form-control textbox" min="0" max="100" step="1" name="step_morte_popolazione" value="35"> 
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
                                    <input type="range" class="custom-range" min="0" max="100" step="1" name="rapporto_nascite_salute_slider" value="10">
                                </div>
                                <div class="col-2">
                                    <input type="number" class="form-control textbox" min="0" max="100" step="1" name="rapporto_nascite_salute" value="10"> 
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
                                    <input type="range" class="custom-range" min="0" max="100" step="1" name="valore_salute_stabile_slider" value="50">
                                </div>
                                <div class="col-2">
                                    <input type="number" class="form-control textbox" min="0" max="100" step="1" name="valore_salute_stabile" value="50"> 
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
                                    <input type="range" class="custom-range" min="0" max="100" step="1" name="valore_capacita_stabile_slider" value="50">
                                </div>
                                <div class="col-2">
                                    <input type="number" class="form-control textbox" min="0" max="100" step="1" name="valore_capacita_stabile" value="50"> 
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
                                    <input type="range" class="custom-range" min="0" max="100" step="1" name="massima_crescita_capacita_slider" value="5">
                                </div>
                                <div class="col-2">
                                    <input type="number" class="form-control textbox" min="0" max="100" step="1" name="massima_crescita_capacita" value="5"> 
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
                                    Aleatorietà delle preferenze
                                </label>
                                <div class="col-5">
                                    <input type="range" class="custom-range" min="0" max="100" step="1" name="aleatorieta_preferenze_slider" value="0">
                                </div>
                                <div class="col-2">
                                    <input type="number" class="form-control textbox" min="0" max="100" step="1" name="aleatorieta_preferenze" value="0"> 
                                </div>
                                <div class="col-1">
                                    <div class="checkbox"><input type="checkbox" value="" id="aleatorieta_preferenze_checkbox" class="parametri_extra"></div>
                                </div>
                            </div>
                            <div class="row form-group align-items-center variazione_percentuale">
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