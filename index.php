<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>HESystem</title>

        <!-- Bootstrap core CSS -->
        <link href="css/lib/bootstrap-4.1.3.min.css" rel="stylesheet">
        <link href="css/lib/jquery-ui.min.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">
    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="index.html">HESystem</a>
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
                                    <label class="col-form-label col-2">
                                        Popolazione
                                    </label>
                                    <div class="col-3">
                                        <input type="range" class="custom-range" min="10" max="5000" step="1" name="popolazione_slider" value="1000">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="10" max="5000" step="1" name="popolazione_textbox" value="1000"> 
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#parameterModal">Imposta parametri</button>
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-2">
                                        Ricchezza
                                    </label>
                                    <div class="col-3">
                                        <!--<div id="slider">
                                            <div id="custom-handle" class="ui-slider-handle"></div>
                                        </div>-->
                                        <input type="range" class="custom-range" min="10" max="5000" step="1" name="ricchezza_slider" value="1000">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="10" max="5000" step="1" name="ricchezza_textbox" value="1000"> 
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-success" id="bottoneStart">Start</button>
                                    </div> 
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-2">
                                        Salute
                                    </label>
                                    <div class="col-3">
                                        <!--<div id="slider">
                                            <div id="custom-handle" class="ui-slider-handle"></div>
                                        </div>-->
                                        <input type="range" class="custom-range" min="10" max="5000" step="1" name="salute_slider" value="1000">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="10" max="5000" step="1" name="salute_textbox" value="1000"> 
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-warning" id="bottonePausa" disabled="true">Pausa</button>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-danger" id="bottoneStop" disabled="true">Stop</button>
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
                            <input type="text" class="form-control textbox" name="periodo_textbox" value="0/0" id="textboxAnno" readonly> 
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
                            Grafici
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Grafico 1</a>
                            <a class="dropdown-item" href="#">Grafico 2</a>
                            <a class="dropdown-item" href="#">Grafico 3</a>
                            <a class="dropdown-item" href="#">Grafico 4</a>
                            <a class="dropdown-item" href="#">Grafico 5</a>
                            <a class="dropdown-item" href="#">Grafico 6</a>
                            <a class="dropdown-item" href="#">Grafico 7</a>
                            <a class="dropdown-item" href="#">Grafico 8</a>
                            <a class="dropdown-item" href="#">Grafico 9</a>
                        </div>
                    </div>
                    <br>
                    <canvas id="myChart" width="1550" height="1000"></canvas>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; 2019 HESystem. Tutti i diritti riservati.</p>
            </div>
            <!-- /.container -->
        </footer>

        <!-- Modal -->
        <div class="modal fade" id="parameterModal" role="dialog" data-backdrop="static">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Imposta parametri</h4>
                        <button type="button" class="close" data-dismiss="modal" id="bottoneChiudiFinestra">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <center>
                                    <label class="col-form-label form-group">
                                        <h4>Prezzo</h4>
                                    </label>
                                </center>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Manzo
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="manzo_prezzo_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="manzo_prezzo_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Pollo
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="pollo_prezzo_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="pollo_prezzo_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Maiale
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="maiale_prezzo_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="maiale_prezzo_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Cavallo
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="cavallo_prezzo_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="cavallo_prezzo_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Tacchino
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="tacchino_prezzo_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="tacchino_prezzo_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Patate
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="patate_prezzo_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="patate_prezzo_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Zucchine
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="zucchine_prezzo_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="zucchine_prezzo_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Peperoni
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="peperoni_prezzo_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="peperoni_prezzo_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Melanzane
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="melanzane_prezzo_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="melanzane_prezzo_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Pomodori
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="pomodori_prezzo_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="pomodori_prezzo_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Grano
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="grano_prezzo_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="grano_prezzo_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Riso
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="riso_prezzo_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="riso_prezzo_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Melo
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="melo_prezzo_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="melo_prezzo_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Pero
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="pero_prezzo_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="pero_prezzo_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Arancio
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="arancio_prezzo_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="arancio_prezzo_textbox" value="0"> 
                                    </div>
                                </div> 
                            </div>
                            <div class="col-6">
                                <center>
                                    <label class="col-form-label form-group">
                                        <h4>Produttività</h4>
                                    </label>
                                </center>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Manzo
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="manzo_produttivita_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="manzo_produttivita_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Pollo
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="pollo_produttivita_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="pollo_produttivita_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Maiale
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="maiale_produttivita_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="maiale_produttivita_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Cavallo
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="cavallo_produttivita_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="cavallo_produttivita_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Tacchino
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="tacchino_produttivita_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="tacchino_produttivita_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Patate
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="patate_produttivita_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="patate_produttivita_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Zucchine
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="zucchine_produttivita_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="zucchine_produttivita_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Peperoni
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="peperoni_produttivita_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="peperoni_produttivita_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Melanzane
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="melanzane_produttivita_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="melanzane_produttivita_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Pomodori
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="pomodori_produttivita_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="pomodori_produttivita_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Grano
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="grano_produttivita_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="grano_produttivita_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Riso
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="riso_produttivita_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="riso_produttivita_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Melo
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="melo_produttivita_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="melo_produttivita_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Pero
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="pero_produttivita_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="pero_produttivita_textbox" value="0"> 
                                    </div>
                                </div>
                                <div class="row form-group align-items-center">
                                    <label class="col-form-label col-3">
                                        Arancio
                                    </label>
                                    <div class="col-6">
                                        <input type="range" class="custom-range" min="0" max="100" step="1" name="arancio_produttivita_slider" value="0">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control textbox" min="0" max="100" step="1" name="arancio_produttivita_textbox" value="0"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal" id="buttonDiscardChanges">Discard changes</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal" id="buttonSaveChanges">Save changes</button>
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

    </body>

</html>
