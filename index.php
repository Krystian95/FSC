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
                <a class="navbar-brand" href="index.html">Start Bootstrap</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
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
                </div>
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
                                        <button type="button" class="btn btn-light">Imposta parametri</button>
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
                                    <button type="submit" class="btn btn-success">Start</button>
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
                                        <button type="button" class="btn btn-light">Pause</button>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-danger">Stop</button>
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
                            <input type="text" class="form-control textbox" name="periodo_textbox" value="11/18"> 
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <label class="col-form-label col-2">
                            Anno
                        </label>
                        <div class="col">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
        
        <canvas id="myChart" width="100" height="100"></canvas>

        <!-- Footer -->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
            </div>
            <!-- /.container -->
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="js/lib/jquery-3.3.1.min.js"></script>
        <script src="js/lib/jquery-ui.min.js"></script>
        <script src="js/lib/popper-1.14.3.min.js"></script>
        <script src="js/lib/bootstrap-4.1.3.min.js"></script>
        <script src="js/lib/Chart.bundle.min.js"></script>
        <script src="js/index.js"></script>

    </body>

</html>
