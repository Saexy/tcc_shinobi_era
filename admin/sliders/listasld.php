			
<?php
	session_start();

	if(isset($_SESSION['status']) && isset($_SESSION['nomeuser'])){
		if($_SESSION['status'] == 'logado' && trim(session_id()) === trim($_COOKIE['navega'])){
			$nomeuser = $_SESSION['nomeuser'];
		}else{
			header('Location: ../login.php');
		}
	}else{
		header('Location: ../login.php');
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ShinobiEra - Setor administrativo</title>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../../materialize/css/materialize.css" />
		<link rel="stylesheet" href="../css/style.css">

        <link rel="icon" href="../../icon/icon.ico">
    </head>
	<body style="">
		<header>
            <nav id="navbar">
                <div class="nav-wrapper">
                <a href="../../index.php" class="brand-logo"><img class="logo-imagem" src="../../images/Logo.png" alt=""></a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a class="black-text" href="../../index.php"><i class="material-icons">home</i></a></li>
					<li><a class="black-text" href="../dashboard.php"><i class="material-icons">dashboard</i></a></li>
					<li class="black-text"><i class="material-icons">account_box</i></li>
                    <li class="black-text"><?php echo $nomeuser;?></li>
                    <li><a href="logout.php"><i class="material-icons black-text">power_settings_new</i></a></li>
                </ul>
                </div>
            </nav>
        
            <ul class="sidenav" id="mobile-demo">
				<li><a class="black-text" href="../../index.php">PÁGINA INICIAL</a></li>
				<li><a class="black-text" href="../dashboard.php">DASHBOARD</a></li>
				<li><a class="black-text" href="../logout.php">DESCONECTAR</a></li>
            </ul>
		</header>

		<div class="section" id="home" style="background-color: black; min-height: 495px;">
			<?php

				include_once('../../classes/Sliders.class.php');

				$slider = new Slider();
				$retorno = $slider->listSlider();
				if($retorno) {
					foreach($retorno as $slider)
					{
						echo '
						<div class="row">
							<div class="listslider col s6 offset-s3 white lighten-5 z-depth-1">
								<div class="valign-hrapper">
									<div class="containerslider">
										<div class="col s2">
											<img style="width: 70%;" src="'.$slider[2].'" />
										</div>
										<div class="col s8 card-content black-text">'.$slider[0].' | '.$slider[3].'</div>
										<div class="col s2">
											<a href="editasld.php?cod='.$slider[0].'"><i class="material-icons black-text">edit</i></a>
											<a href="excluisld.php?cod='.$slider[0].'"> <i class="material-icons black-text">delete</i></a></div>
										</div>
									</div>		
								</div>
							</div>
						
						';
					}
				}else{
					echo '
					<div style="height: 200px;">
					</div>
					<div class="row center">
						<div class="white-text">Não existe lista de sliders no momento.</div>
					</div>
					<div style="height: 200px;">
					</div>

					';
				}
			?>
			</div>
		</div>
		
		<footer id="rodape">
			<div class="footer-copyright">
                <div class="row center"><br>© 2020 Copyright - Shinobi Era Ltda.</div>
            </div>
		</footer>

	    <script type="text/javascript" src="../../materialize/jquery/jquery-3.5.0.js"></script>
	    <script type="text/javascript" src="../../materialize/js/materialize.js"></script>
		<script src="../../js/main.js"></script>
	</body>
</html>