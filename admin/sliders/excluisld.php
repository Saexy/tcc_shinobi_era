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
<?php

	include_once('../../classes/Sliders.class.php');
	$excluislider = new Slider();

	$id = filter_input(INPUT_GET, 'cod', FILTER_SANITIZE_SPECIAL_CHARS);

	$retorno = $excluislider->getSlider($id);

	foreach($retorno as $slider){}

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
	<body>
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

		<div class="section" id="home" style="background-color: black;">
			<br>
			<br>
			<div class="row">
				<div class="col s12 m10 offset-m1">
					<div class="section">
						<div class="col s6 offset-s3 white z-depth-4">
							<form name="frmlogin" method="post"  enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF'];?>" class ="col s12 m10 offset-m1 l10 offset-l1">
								<div class="row center">
									<div class="container">
										<br>
										<p>Excluir slider</p>
										<div class="input-field col s12">
											<input type="text" name="id" readonly id="idid" value="<?php echo $slider[0];?>"/>
											<label for="idid" class="black-text">ID</label>
										</div>
										<div class="input-field col s12">
											<img src="<?php echo $slider[2];?>" alt="" style="width: 80%;">
										</div>
										<div class="input-field col s12">
											<input type="text" name="titulo" readonly id="idtitulo" value="<?php echo $slider[3];?>"/>
											<label for="idtitulo" class="black-text">Título</label>
										</div>
										<div class="input-field col s12 m12 l6 offset-l3">
											<p>Você realmente quer excluir este slider?
												<label>
													<input type="radio" name="confirma" id="idconfirma" value="sim"/><span class="black-text">Sim</span>
												</label>
												<label>
													<input type="radio" name="confirma" id="idconfirma" value="não" checked/><span class="black-text">Não</span>
												</label>
											</p>
										</div>
										<div class="col s4 offset-s3 white-text">
											<input type="submit" name="enviar" value="Enviar"  class="btn red darken-3 z-depth-2" />
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>
			
		<?php
				if(isset($_POST['enviar']))
				{
					$id	= filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
					$confirma = filter_input(INPUT_POST, 'confirma', FILTER_SANITIZE_SPECIAL_CHARS);
					
					if($confirma == 'sim'){
						$rtn = $excluislider->deleteSlider($id);
						
						if($rtn == 1){
							header("Location:listasld.php");
						}else{
							header("Location:listasld.php");
						}
					}else{
						header("Location:listasld.php");			
					}
				}
			?>	

		<footer id="rodape">
			<div class="footer-copyright white">
				<div class="row center"><br>© 2020 Copyright - Shinobi Era Ltda.</div>
			</div>
		</footer>
	
		<!-- JQUERY -->
		<script type="text/javascript" src="../../materialize/jquery/jquery-3.5.0.js"></script>
		<!-- MATERIALIZE JS -->
		<script type="text/javascript" src="../../materialize/js/materialize.js"></script>
		<script src="../../js/main.js"></script>
	</body>
</html>