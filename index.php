<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="images/favicon.png" type="image/png" />
        
        <title>HESystem</title>

        <!-- CSS e JavaScript
        <link href="css/lib/font-awesome.min.css" rel="stylesheet">
        -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="css/lib/bootstrap-4.1.3.min.css" rel="stylesheet">
        <link href="css/lib/jquery-ui.min.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">
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
                </button><!--
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="services.html">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Portfolio
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                                <a class="dropdown-item" href="portfolio-1-col.html">1 Column Portfolio</a>
                                <a class="dropdown-item" href="portfolio-2-col.html">2 Column Portfolio</a>
                                <a class="dropdown-item" href="portfolio-3-col.html">3 Column Portfolio</a>
                                <a class="dropdown-item" href="portfolio-4-col.html">4 Column Portfolio</a>
                                <a class="dropdown-item" href="portfolio-item.html">Single Portfolio Item</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Blog
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                                <a class="dropdown-item" href="blog-home-1.html">Blog Home 1</a>
                                <a class="dropdown-item" href="blog-home-2.html">Blog Home 2</a>
                                <a class="dropdown-item" href="blog-post.html">Blog Post</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Other Pages
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                                <a class="dropdown-item" href="full-width.html">Full Width Page</a>
                                <a class="dropdown-item" href="sidebar.html">Sidebar Page</a>
                                <a class="dropdown-item" href="faq.html">FAQ</a>
                                <a class="dropdown-item" href="404.html">404</a>
                                <a class="dropdown-item" href="pricing.html">Pricing Table</a>
                            </div>
                        </li>
                    </ul>
                </div>-->
            </div>
        </nav>

        <header>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <!-- Slide One - Set the background image for this slide in the line below -->
                    <div class="carousel-item active" style="background-image: url('http://placehold.it/1900x1080')">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>First Slide</h3>
                            <p>This is a description for the first slide.</p>
                        </div>
                    </div>
                    <!-- Slide Two - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Second Slide</h3>
                            <p>This is a description for the second slide.</p>
                        </div>
                    </div>
                    <!-- Slide Three - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Third Slide</h3>
                            <p>This is a description for the third slide.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </header>

        <div class="container container-custom">
            <div class="row">
                <div class="col">
                    <div class="row align-items-center">
                        <div class="col">
                            <form id="params-form" method="post" action="#!">
                                <div class="row form-group align-items-center">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#parameterPopModal"><i class="fa fa-gear"></i>&nbsp&nbspImposta parametri popolazione</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#parameterModal"><i class="fa fa-gear"></i>&nbsp&nbspImposta parametri</button>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                     <div class="col-6">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#parameterEnvModal"><i class="fa fa-gear"></i>&nbsp&nbspImposta parametri ambiente</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="button" class="btn btn-success" id="start"><i class="fa fa-play"></i>&nbsp&nbsp<span id="starttext">Start</span></button>
                                    </div> 
                                </div>
                                <div class="row form-group align-items-center">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#parameterProdModal"><i class="fa fa-gear"></i>&nbsp&nbspImposta parametri prodotti</button>
                                    </div>
                                    <div class="col-2">
                                        <button type="button" class="btn btn-warning" id="pausa" disabled="true"><i class="fa fa-pause"></i>&nbspPausa</button>
                                    </div>
                                    <div class="col-2">
                                        <button type="button" class="btn btn-danger" id="stop" disabled="true"><i class="fa fa-stop"></i>&nbspStop</button>
                                    </div>
                                    <div class="col-2">
                                        <button type="button" class="btn btn-secondary" id="reset"><i class="fa fa-refresh"></i>&nbspReset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row form-group align-items-center">
                        <label class="col-form-label col-2">
                            Periodo
                        </label>
                        <div class="col">
                            <input type="text" class="form-control textbox" name="periodo_textbox" id="textboxAnno" readonly> 
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <label class="col-form-label col-2">
                            Anno
                        </label>
                        <div class="col">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" id="progressBarYear" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="popolazione">
                        <!--<img src="house.png" height="42" width="42">-->
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="industria">
                        <!--<img src="house.png" height="42" width="42">-->
                        </div>
                    </div>

                </div>
                <div class="col-6">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bar-chart"></i>&nbsp&nbspGrafici
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#"><i class="fa fa-users"></i>&nbsp&nbspGrafico 1</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-euro"></i>&nbsp&nbspGrafico 2</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-medkit"></i>&nbsp&nbspGrafico 3</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-industry"></i>&nbsp&nbspGrafico 4</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-envira"></i>&nbsp&nbspGrafico 5</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-cloud"></i>&nbsp&nbspGrafico 6</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-home"></i>&nbsp&nbspGrafico 7</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-car"></i>&nbsp&nbspGrafico 8</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-heart"></i>&nbsp&nbspGrafico 9</a>
                        </div>
                    </div>
                    <br>
                    <canvas id="chart_1" width="1550" height="1000"></canvas>
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
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="popolazione_iniziale_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="popolazione_iniziale_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Tendenza a mangiare carne
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="tendenza_mangiare_carne_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="tendenza_mangiare_carne_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Salute iniziale media
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="salute_iniziale_media_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="salute_iniziale_media_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Salute iniziale deviazione standard
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="salute_iniziale_dev_stan_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="salute_iniziale_dev_stan_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Ricchezza media
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="ricchezza_media_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="ricchezza_media_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Ricchezza deviazione standard
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="ricchezza_dev_stan_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="ricchezza_dev_stan_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Fabbisogno di cibo media
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="fabbisogno_cibo_media_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="fabbisogno_cibo_media_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Fabbisogno di cibo deviazione standard
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="fabbisogno_cibo_dev_stan_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="fabbisogno_cibo_dev_stan_textbox" value="0"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="discardChangesPop">Reset</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal" id="saveChangesPop">Salva</button>
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
                                        Oscillazioni temperatura media
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="oscillazioni_temperatura_media_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="oscillazioni_temperatura_media_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Oscillazioni temperatura ampiezza
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="oscillazioni_temperatura_ampiezza_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="oscillazioni_temperatura_ampiezza_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Valore iniziale GHGS
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="valore_iniziale_ghgs_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="valore_iniziale_ghgs_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Valore iniziale PM
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="valore_iniziale_pm_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="valore_iniziale_pm_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-4">
                                        Valore iniziale NH<sub>3</sub>
                                    </label>
                                    <div class="col-5">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="valore_iniziale_nh3_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="valore_iniziale_nh3_textbox" value="0"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="discardChangesEnv">Reset</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal" id="saveChangesEnv">Salva</button>
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
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Parametri per tutti i prodotti
                                    </label>
                                    <div class="col-9">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#tuttiProdottiModal"><i class="fa fa-gear"></i>&nbsp&nbspImposta parametri per tutti i prodotti</button>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Manzo
                                    </label>
                                    <div class="col-9">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#manzoModal"><i class="fa fa-gear"></i>&nbsp&nbspImposta parametri manzo</button>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Pollo
                                    </label>
                                    <div class="col-9">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#polloModal"><i class="fa fa-gear"></i>&nbsp&nbspImposta parametri pollo</button>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Maiale
                                    </label>
                                    <div class="col-9">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#maialeModal"><i class="fa fa-gear"></i>&nbsp&nbspImposta parametri maiale</button>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Cavallo
                                    </label>
                                    <div class="col-9">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#cavalloModal"><i class="fa fa-gear"></i>&nbsp&nbspImposta parametri cavallo</button>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Tacchino
                                    </label>
                                    <div class="col-9">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#tacchinoModal"><i class="fa fa-gear"></i>&nbsp&nbspImposta parametri tacchino</button>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Patate
                                    </label>
                                    <div class="col-9">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#patateModal"><i class="fa fa-gear"></i>&nbsp&nbspImposta parametri patate</button>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Zucchine
                                    </label>
                                    <div class="col-9">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#zucchineModal"><i class="fa fa-gear"></i>&nbsp&nbspImposta parametri zucchine</button>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Peperoni
                                    </label>
                                    <div class="col-9">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#peperoniModal"><i class="fa fa-gear"></i>&nbsp&nbspImposta parametri peperoni</button>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Melanzane
                                    </label>
                                    <div class="col-9">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#melanzaneModal"><i class="fa fa-gear"></i>&nbsp&nbspImposta parametri melanzane</button>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Pomodori
                                    </label>
                                    <div class="col-9">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#pomodoriModal"><i class="fa fa-gear"></i>&nbsp&nbspImposta parametri pomodori</button>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Grano
                                    </label>
                                    <div class="col-9">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#granoModal"><i class="fa fa-gear"></i>&nbsp&nbspImposta parametri grano</button>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Riso
                                    </label>
                                    <div class="col-9">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#risoModal"><i class="fa fa-gear"></i>&nbsp&nbspImposta parametri riso</button>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Melo
                                    </label>
                                    <div class="col-9">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#meloModal"><i class="fa fa-gear"></i>&nbsp&nbspImposta parametri melo</button>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Pero
                                    </label>
                                    <div class="col-9">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#peroModal"><i class="fa fa-gear"></i>&nbsp&nbspImposta parametri pero</button>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Arancio
                                    </label>
                                    <div class="col-9">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#arancioModal"><i class="fa fa-gear"></i>&nbsp&nbspImposta parametri arancio</button>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal singoli prodotti-->
        <?php
            $itemsProd = ['manzo', 'pollo', 'maiale', 'cavallo', 'tacchino', 'patate', 'zucchine', 'peperoni', 'melanzane',
                'pomodori', 'grano', 'riso', 'melo', 'pero', 'arancio'];

            foreach ($itemsProd as $value) {

              echo '<div class="modal fade child-modal" id="'.$value.'Modal" tabindex="-1" role="dialog" data-backdrop="static">';
              echo '<div class="modal-dialog">';
              echo '<div class="modal-content">';
              echo '<div class="modal-header">';
              echo '<h4 class="modal-title">Imposta parametri '.$value.'</h4>';
              echo '<button type="button" class="close" data-dismiss="modal" id="chiudiFinestra'.$value.'">&times;</button>';
              echo '</div>';
              echo '<div class="modal-body">';
              echo '<div class="row">';
              echo '<div class="col">';
              echo '<div class="row form-group align-items-center">';
              echo '<label class="col-form-label col-3">Prezzo</label>';
              echo '<div class="col-6">';
              echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="'.$value.'_prezzo_slider" value="0">';
              echo '</div><div class="col-3">';
              echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="'.$value.'_prezzo_textbox" value="0">';
              echo '</div></div>';
              echo '<div class="row form-group align-items-center">';
              echo '<label class="col-form-label col-3">Produttività</label>';
              echo '<div class="col-6">';
              echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="'.$value.'_produttivita_slider" value="0">';
              echo '</div><div class="col-3">';
              echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="'.$value.'_produttivita_textbox" value="0">';
              echo '</div></div>';
              echo '<div class="row form-group align-items-center">';
              echo '<label class="col-form-label col-3">Impatto su GHGS</label>';
              echo '<div class="col-6">';
              echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="'.$value.'_impatto_ghgs_slider" value="0">';
              echo '</div><div class="col-3">';
              echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="'.$value.'_impatto_ghgs_textbox" value="0">'; 
              echo '</div></div>';
              echo '<div class="row form-group align-items-center">';
              echo '<label class="col-form-label col-3">Impatto su PM</label>';
              echo '<div class="col-6">';
              echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="'.$value.'_impatto_pm_slider" value="0">';
              echo '</div><div class="col-3">';
              echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="'.$value.'_impatto_pm_textbox" value="0">';
              echo '</div></div>';
              echo '<div class="row form-group align-items-center">';
              echo '<label class="col-form-label col-3">Impatto su NH<sub>3</sub></label>';
              echo '<div class="col-6">';
              echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="'.$value.'_impatto_nh3_slider" value="0">';
              echo '</div><div class="col-3">';
              echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="'.$value.'_impatto_nh3_textbox" value="0">'; 
              echo '</div></div>';
              echo '<div class="row form-group align-items-center">';
              echo '<label class="col-form-label col-3">Influenza sulla produzione causata da GHGS</label>';
              echo '<div class="col-6">';
              echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="'.$value.'_influenza_produzione_ghgs_slider" value="0">';
              echo '</div><div class="col-3">';
              echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="'.$value.'_influenza_produzione_ghgs_textbox" value="0">'; 
              echo '</div></div>';
              echo '<div class="row form-group align-items-center">';
              echo '<label class="col-form-label col-3">Influenza sulla produzione causata da PM</label>';
              echo '<div class="col-6">';
              echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="'.$value.'_influenza_produzione_pm_slider" value="0">';
              echo '</div><div class="col-3">';
              echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="'.$value.'_influenza_produzione_pm_textbox" value="0">';
              echo '</div></div>';
              echo '<div class="row form-group align-items-center">';
              echo '<label class="col-form-label col-3">Influenza sulla produzione causata da NH<sub>3</sub></label>';
              echo '<div class="col-6">';
              echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="'.$value.'_influenza_produzione_nh3_slider" value="0">';
              echo '</div><div class="col-3">';
              echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="'.$value.'_influenza_produzione_nh3_textbox" value="0">';
              echo '</div></div>';
              echo '<div class="row form-group align-items-center">';
              echo '<label class="col-form-label col-3">Influenza sulla produzione causata dalla temperatura</label>';
              echo '<div class="col-6">';
              echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="'.$value.'_influenza_produzione_temperatura_slider" value="0">';
              echo '</div><div class="col-3">';
              echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="'.$value.'_influenza_produzione_temperatura_textbox" value="0">'; 
              echo '</div></div>';
              echo '<div class="row form-group align-items-center">';
              echo '<label class="col-form-label col-3">Tolleranza influenza sulla produzione causata dalla temperatura</label>';
              echo '<div class="col-6">';
              echo '<input type="range" class="custom-range" min="0" max="100" step="1" name="'.$value.'_toll_influenza_produzione_temperatura_slider" value="0">';
              echo '</div><div class="col-3">';
              echo '<input type="number" class="form-control textbox" min="0" max="100" step="1" name="'.$value.'_toll_influenza_produzione_temperatura_textbox" value="0">'; 
              echo '</div></div></div></div></div>';
              echo '<div class="modal-footer">';
              echo '<button type="button" class="btn btn-danger" data-dismiss="modal" id="discardChanges'.$value.'">Reset</button>';
              echo '<button type="button" class="btn btn-success" data-dismiss="modal" id="saveChanges'.$value.'">Salva</button>';
              echo '</div></div></div></div>';
            }
        ?>

        <!-- Bootstrap core JavaScript -->
        <script src="js/lib/jquery-3.3.1.min.js"></script>
        <script src="js/lib/jquery-ui.min.js"></script>
        <script src="js/lib/popper-1.14.3.min.js"></script>
        <script src="js/lib/bootstrap-4.1.3.min.js"></script>
        <script src="js/lib/Chart.bundle.min.js"></script>
        <script src="js/Utils.js"></script>
        <script src="js/index.js"></script>

    </body>

</html>