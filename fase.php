<?php

	include_once('classes/Fases.class.php');
	$fase = new Fase();

    if(isset($_GET['cod']) && $fase->existsFase($_GET['cod'])){
        $id = filter_input(INPUT_GET, 'cod', FILTER_SANITIZE_SPECIAL_CHARS);

        $retorno = $fase->getFase($id);
    
        foreach($retorno as $fase){}
?>
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
            <?php

                echo '
                
                <div class="section" style="background-image: url(admin/fases/'.$fase[2].'); background-size: cover; background-repeat: no-repeat;">
                    <br>
                    <br>
                    <br>
                    <div class="row center">
                        <div class="col s12 m10 offset-m1">
                            <div class="row">
                                <h1 class="white-text">'.$fase[3].'</h1>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>

                <div class="section" id="descricao">
                    <div class="row center">
                        <div class="container">
                            <div class="col s10 m10 offset-m1">
                                <h3 class="black-text">DESCRIÇÃO</h3>
                                <h5 class="black-text">'.$fase[4].'</h5>
                            </div>
                        </div>
                    </div>
                </div>

                ';

            ?>
            
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
<?php
    }else{
        header('Location: index.php');
    }

?>