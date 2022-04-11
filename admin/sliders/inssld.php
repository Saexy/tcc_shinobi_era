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
										<p>Inserir slider</p>
										<div class="input-field col s12">
											<input type="text" name="id" id="idid"/>
											<label for="idid" class="black-text">ID</label>
										</div>
										<div class="input-field col s12 m12 l12">
											<div class="file-field input-field">
												<div class="btn red darken-3 z-depth-">
													<span>Carregar foto</span>
													<input  type="file" name="imagem"  id="arquivo"  />
												</div>
												<div class="file-path-wrapper">
													<input class="file-path validate" type="text">
												</div>
											</div>
										</div>
										<div class="input-field col s12">
											<input type="text" name="titulo" id="idtitulo"/>
											<label for="idtitulo" class="black-text">Título</label>
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
				if(isset($_POST['enviar'])){

					$id			= filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
					$titulo		= filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
					$arquivo = isset($_FILES['imagem']) ? $_FILES['imagem'] : FALSE;
					
					include_once('../../classes/Sliders.class.php');
					include_once('../../classes/ImagemSliders.class.php');

					$imagem = new Imagem();
					$imagem->iniciaObj($id, $arquivo);
					$errodaimagem = $imagem->sobeImagem();

					if($errodaimagem){
						$fotoatual = $imagem->novonomeImg;
						$fotoorigin = $imagem->nomeimgOriginal;

						$slider = new Slider();
						$slider->startSlider($id, $fotoorigin, $fotoatual, $titulo);
						$mensagem[] = $slider->insertSlider();
					}else{
						$mensagem[] = 'Slider não foi incluido na base de dados';
					}
					
					foreach($mensagem as $msgs){
						echo '
						<script type="text/javascript">
					
						var mensagem = "'.$msgs.'";
						

						alert(mensagem);

						</script>';
					}
					header( "refresh:1;url=../dashboard.php" );		
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