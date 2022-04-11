<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ShinobiEra - Uma história inesquecível</title>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="materialize/css/materialize.css" />
        <link rel="stylesheet" href="css/style.css">

        <link rel="icon" href="icon/icon.ico">
    </head>

    <body>
        <header>
            <nav id="navbar">
                <div class="nav-wrapper">
                <a href="#!" class="brand-logo"><img class="logo-imagem" src="images/Logo.png" alt=""></a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#sobre">SOBRE O JOGO</a></li>
                    <li><a href="#fases">FASES</a></li>
                    <li><a href="#desenvolvedores">DESENVOLVEDORES</a></li>
                    <li><p class="divisor">l</p></li>
                    <li><a class="red darken-3 waves-effect waves-light btn">BAIXE AGORA</a></li>
                </ul>
                </div>
            </nav>
        
            <ul class="sidenav" id="mobile-demo">
                <li><a href="#sobre">SOBRE O JOGO</a></li>
                <li><a href="#fases">FASES</a></li>
                <li><a href="#desenvolvedores">DESENVOLVEDORES</a></li>
            </ul>
        </header>

        <main>
            <div class="section" id="home">
                <br>
                <br>
                <br>
                <div class="row">
                    <div class="col s12 m10 offset-m1">
                        <div class="row">
                            <div class="col s12 m7">
                                <div class="center promo">
                                    <img width="100%" src="images/LogoOficial.png" alt="">
                                    <div class="row center">
                                        <a href="#" class="btn black-text white waves-effect waves-light">39 MB</a>
                                        <a href="#" class="btn black-text white waves-effect waves-light">WINDOWS 7,8 E 10</a>
                                    </div>
                                    <div class="row center">
                                        <a class=" btn-large red darken-3 waves-effect waves-light"><i class="material-icons left">vertical_align_bottom</i>DOWNLOAD</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col s12 m5">
                                <div class="center promo">
                                    <div class="video-container">
                                        <iframe style="width: 100%;" src="//www.youtube.com/embed/ciganosdamafia" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section" id="fases">
                <div class="container">
                    <div class="row center">
                        <h3 class="white-text" >SEJA BEM VINDO AO</h3>
                        <h1 class="white-text" >Shinobi Era</h1>
                    </div>
                    <div class="carousel carousel-slider center">
                        <?php
						
						    include_once("classes/Sliders.class.php");

						    $slider = new Slider();
						    $lista = $slider->listSlider();

						    if($lista){
							    foreach($lista as $sld){
								    echo 
                                    '
                                    <div class="carousel-item white-text" href="#" style="background-image: url(admin/sliders/'.$sld[2].'); background-position: center; background-repeat: no-repeat;">
                                        <h2>'.$sld[3].'</h2>
                                        <div class="carousel-fixed-item center">
                                            <a class=" btn red darken-3 waves-effect waves-light" href="fase.php?cod='.$sld[0].'">SAIBA MAIS</a>
                                        </div>
                                    </div>
                                    ';
							    }
						    }else{
							    echo 
                                '
                                <div class="carousel-item black white-text" href="#">
                                    <h2>EM BREVE...</h2>
                                </div>
                                ';
						    }

						

						?>
                    </div>
                </div>
            </div>

            <div class="section" id="sobre">
                <div class="container">
                    <div class="row">
                        <div class="col l4 s12">
                            <img width="100%" src="images/img-body-2.png" alt="">
                            <h3 class="center white-text">SHINOBIS</h3>
                            <h5 class="center white-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h5>
                        </div>
                        <div class="col l4 s12">
                            <img width="100%" src="images/img-body-3.png" alt="">
                            <h3 class="center white-text">CLASSES & SKILLS</h3>
                            <h5 class="center white-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h5>
                        </div>
                        <div class="col l4 s12">
                            <img width="100%" src="images/img-body-1.png" alt="">
                            <h3 class="center white-text">ARMAS & JUTSUS</h3>
                            <h5 class="center white-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section" id="desenvolvedores">
                <div class="row center">
                    <h5>ESTES SÃO OS NOSSOS</h5>
                    <h4>DESENVOLVEDORES</h4>
                </div>
                <div class="row center">
                    <div class="col s12 m4 l4 dev">
                        <img class="circle img-dev"src="images/barbara.jpg">
                        <h4>Barbara de Oliveira Moreira</h4>
                        <p>Responsável pelos sprites e desenhos dentro do jogo.</p>
                    </div>
                    <div class="col s12 m4 l4 dev">
                        <img class="circle img-dev"src="images/cristian.jpg">
                        <h4>Cristian Silva Soares</h4>
                        <p>Responsável pela programação do jogo.</p>
                    </div>
                    <div class="col s12 m4 l4 dev">
                        <img class="circle img-dev"src="images/nickolas.jpg">
                        <h4>Nickolas da Silva Veiga</h4>
                        <p>Responsável pela criação do site do projeto.</p>
                    </div>
                    <div class="col s12 m4 l4 dev">
                        <img class="circle img-dev"src="images/thiago.jpg">
                        <h4>Thiago Gomes Magalhães</h4>
                        <p>Responsável pela parte escrita do projeto.</p>
                    </div>
                    <div class="col s12 m4 l4 dev">
                        <img class="circle img-dev"src="images/bolivia.jpg">
                        <h4>Vinicius Elizaks dos Santos</h4>
                        <p>Responsável pela parte escrita do projeto.</p>
                    </div>
                </div>
            </div>
        </main>

        <footer class="page-footer black">
            <div class="container">
                <div class="row center">
                    <div class="col l6 s12">
                        <h5 class="white-text">SHINOBI ERA ©</h5>
                        <p class="grey-text text-lighten-4">Este projeto foi feito para um TCC da ETEC - Centro Paula Souza(CPS).</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="#!">GitHub</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Twitter</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Facebook</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">LinkedIN</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright black">
                <div class="row center">© 2020 Copyright - Shinobi Era Ltda.</div>
            </div>
        </footer>
    </body>

    <script type="text/javascript" src="materialize/jquery/jquery-3.5.0.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.js"></script>
    <script src="js/main.js"></script>
</html>