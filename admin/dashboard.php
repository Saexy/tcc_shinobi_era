<?php
	session_start();

	if(isset($_SESSION['status']) && isset($_SESSION['nomeuser'])){
		if($_SESSION['status'] == 'logado' && trim(session_id()) === trim($_COOKIE['navega'])){
			$nomeuser = $_SESSION['nomeuser'];
		}else{
			header('Location: login.php');
		}
	}else{
		header('Location: login.php');
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ShinobiEra - Setor administrativo</title>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../materialize/css/materialize.css" />
		<link rel="stylesheet" href="css/style.css">

        <link rel="icon" href="../icon/icon.ico">
    </head>
	<body>
		<header>
            <nav id="navbar">
                <div class="nav-wrapper">
                    <a href="../index.php" class="brand-logo"><img class="logo-imagem" src="../images/Logo.png" alt=""></a>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a class="black-text" href="../index.php"><i class="material-icons">home</i></a></li>
                        <li class="black-text"><i class="material-icons">account_box</i></li>
                        <li class="black-text"><?php echo $nomeuser;?></li>
                        <li><a href="logout.php"><i class="material-icons black-text">power_settings_new</i></a></li>
                    </ul>
                </div>
            </nav>
        
            <ul class="sidenav" id="mobile-demo">
                <li><a class="black-text" href="../index.php">PÁGINA INICIAL</a></li>
                <li><a class="black-text" href="logout.php">DESCONECTAR</a></li>
            </ul>
		</header>

		<div class="section" id="home" style="background-color: black;">
			<br>
			<br>
			<br>
			<br>
			<br>
            <br>
			<div class="row center">
				<div class="col s6 offset-s3 white">
                    <br>
                    <h5 class="black-text">Área administrativa</h5>
                    <br>
                    <div class="center" id="dropdown" style="padding-bottom: 1rem;">
                        <a class="dropdown-trigger btn red darken-3 z-depth-2" href="#" data-target="dropdown1">Sliders</a>
                        <ul id="dropdown1" class="dropdown-content">
                            <li><a href="sliders/inssld.php" style="color: #039be5;"><i style="color: rgb(255, 49, 49);" class="material-icons">add</i><span style="color: rgb(255, 49, 49);">Inserir</a></span></li>
                            <li class="divider" tabindex="-1"></li>
                            <li><a href="sliders/listasld.php" style="color: #039be5;"><i style="color: rgb(255, 49, 49);" class="material-icons">menu</i><span style="color: rgb(255, 49, 49);">Listar</a></span></li>
                        </ul>
                    </div>
                    <div class="center" id="dropdown" style="padding-bottom: 1rem;">
                        <a class="dropdown-trigger btn red darken-3 z-depth-2" href="#" data-target="dropdown2">Fases</a>
                        <ul id="dropdown2" class="dropdown-content">
                            <li><a href="fases/insfase.php" style="color: #039be5;"><i style="color: rgb(255, 49, 49);" class="material-icons">add</i><span style="color: rgb(255, 49, 49);">Inserir</a></span></li>
                            <li class="divider" tabindex="-1"></li>
                            <li><a href="fases/listafase.php" style="color: #039be5;"><i style="color: rgb(255, 49, 49);" class="material-icons">menu</i><span style="color: rgb(255, 49, 49);">Listar</a></span></li>
                        </ul>
				    </div>
                </div>
            </div>
            <br>
            <br>
			<br>
            <br>
            <br>
			<br>
		</div>

		<footer id="rodape">
			<div class="footer-copyright white">
				<br>
                <div class="row center">© 2020 Copyright - Shinobi Era Ltda.</div>
            </div>
		</footer>

		<script type="text/javascript" src="../materialize/jquery/jquery-3.5.0.js"></script>
        <script type="text/javascript" src="../materialize/js/materialize.js"></script>
        <script src="../js/main.js"></script>
        <script type="text/javascript">

            $('.dropdown-trigger').dropdown();

        </script>
    </body>
</html>