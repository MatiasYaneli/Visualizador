<?php
    include_once('locales/global/es.php');
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Visualizador</title>
    <link rel='stylesheet' href='assets/css/main.min.css' />
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.1/mapbox-gl-geocoder.css' type='text/css' />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">CEPLAN	</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#"> . <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="#">Sistema de Información Geográfica  Electoral</a>
            </div>
        </div>
    </nav>

    <div class="main-container container-fluid">
        <div class="row">
            <div class="col-12 col-sm-8">
                <div id='map' style='width: 100%; height: 90vh;'></div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Distrito Local
                                </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinners1996">
                                        <label class="custom-control-label" for="checkWinners1996">1996</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinners2000">
                                        <label class="custom-control-label" for="checkWinners2000">2000</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinners2003">
                                        <label class="custom-control-label" for="checkWinners2003">2003</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinners2006">
                                        <label class="custom-control-label" for="checkWinners2006">2006</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinners2009">
                                        <label class="custom-control-label" for="checkWinners2009">2009</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinners2012">
                                        <label class="custom-control-label" for="checkWinners2012">2012</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinners2015">
                                        <label class="custom-control-label" for="checkWinners2015">2015</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinners2018">
                                        <label class="custom-control-label" for="checkWinners2018">2018</label>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Municipio
                                </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersM2000">
                                        <label class="custom-control-label" for="checkWinnersM2000">2000</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersM2003">
                                        <label class="custom-control-label" for="checkWinnersM2003">2003</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersM2006">
                                        <label class="custom-control-label" for="checkWinnersM2006">2006</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersM2009">
                                        <label class="custom-control-label" for="checkWinnersM2009">2009</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersM2012">
                                        <label class="custom-control-label" for="checkWinnersM2012">2012</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersM2015">
                                        <label class="custom-control-label" for="checkWinnersM2015">2015</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersM2018">
                                        <label class="custom-control-label" for="checkWinnersM2018">2018</label>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Sección
                                </button>
                                </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersS1996">
                                        <label class="custom-control-label" for="checkWinnersS1996">1996</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnerS2000">
                                        <label class="custom-control-label" for="checkWinnerS2000">2000</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersS2003">
                                        <label class="custom-control-label" for="checkWinnersS2003">2003</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersS2006">
                                        <label class="custom-control-label" for="checkWinnersS2006">2006</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersS2009">
                                        <label class="custom-control-label" for="checkWinnersS2009">2009</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersS2012">
                                        <label class="custom-control-label" for="checkWinnersS2012">2012</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersS2015">
                                        <label class="custom-control-label" for="checkWinnersS2015">2015</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersS2018">
                                        <label class="custom-control-label" for="checkWinnersS2018">2018</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Gobernador en Municipio
                                </button>
                                </h2>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersGM1996">
                                        <label class="custom-control-label" for="checkWinnersGM1996">1996</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersGM2000">
                                        <label class="custom-control-label" for="checkWinnersGM2000">2000</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersGM2003">
                                        <label class="custom-control-label" for="checkWinnersGM2003">2003</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersGM2006">
                                        <label class="custom-control-label" for="checkWinnersGM2006">2006</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersGM2009">
                                        <label class="custom-control-label" for="checkWinnersGM2009">2009</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersGM2012">
                                        <label class="custom-control-label" for="checkWinnersGM2012">2012</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersGM2015">
                                        <label class="custom-control-label" for="checkWinnersGM2015">2015</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersGM2018">
                                        <label class="custom-control-label" for="checkWinnersGM2018">2018</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-header" id="headingSix">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Gobernador por Distrito Local
                                </button>
                                </h2>
                            </div>
                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersGDL1999">
                                        <label class="custom-control-label" for="checkWinnersGDL1999">1999</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersGDL2005">
                                        <label class="custom-control-label" for="checkWinnersGDL2005">2005</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersGDL2011">
                                        <label class="custom-control-label" for="checkWinnersGDL2011">2011</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersGDL2017">
                                        <label class="custom-control-label" for="checkWinnersGDL2017">2017</label>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="card">
                            <div class="card-header" id="headingSeven">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                Gobernador por Sección
                                </button>
                                </h2>
                            </div>
                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersGS1996">
                                        <label class="custom-control-label" for="checkWinnersGS1996">1996</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersGS2000">
                                        <label class="custom-control-label" for="checkWinnersGS2000">2000</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersGS2003">
                                        <label class="custom-control-label" for="checkWinnersGS2003">2003</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersGS2006">
                                        <label class="custom-control-label" for="checkWinnersGS2006">2006</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersGS2009">
                                        <label class="custom-control-label" for="checkWinnersGS2009">2009</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersGS2012">
                                        <label class="custom-control-label" for="checkWinnersGS2012">2012</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersGS2015">
                                        <label class="custom-control-label" for="checkWinnersGS2015">2015</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkWinnersGS2018">
                                        <label class="custom-control-label" for="checkWinnersGS2018">2018</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id='container-video'></div>

                        <!--
                    <div class="card">
                        <div class="card-header" id="headingEight">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                Explicación
                                </button>
                            </h2>
                        </div>
                        <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                            <div class="card-body">
                                Este proyecto fue desarrollado para el

                            </div>
                        </div>
                    </div>
-->

                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="./assets/js/jquery-3.3.1.slim.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
        <script src="./assets/js/mapbox-gl.js"></script>
        <script src='./assets/js/main.min.js'></script>
        <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.4.1/mapbox-gl-geocoder.min.js'></script>
</body>

</html>