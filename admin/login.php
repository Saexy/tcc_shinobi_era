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
                <a href="../index.html" class="brand-logo"><img class="logo-imagem" src="../images/Logo.png" alt=""></a>
                <a href="../index.html" data-target="mobile-demo" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
					<li><a class="black-text" href="../../index.php"><i class="material-icons">home</i></a></li>
                </ul>
                </div>
            </nav>
        
            <ul class="sidenav" id="mobile-demo">
                <li><a class="black-text" href="../index.html">PÁGINA INICIAL</a></li>
            </ul>
		</header>

		<div class="section" id="home" style="background-color: black;">
			<br>
			<br>
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
										<p>Área administrativa</p>
										<div class="input-field col s12">
											<input type="text" name="usuario" id="idusuario"/>
											<label for="idusuario" class="black-text">Usuário</label>
										</div>
										<div class="input-field col s12">
											<input type="password" name="senha" id="idsenha"/>
											<label for="idsenha" class="black-text">Senha</label>
										</div>
										<div class="col s4 offset-s3 white-text">
											<input type="submit" name="entrar" value="Entrar"  class="btn red darken-3 z-depth-2" />
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<br>
			<br>
			<br>
			<br>
		</div>

		<?php
		if(isset($_POST['entrar'])){

			include_once('../classes/Users.class.php');

			$loginuser = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_SPECIAL_CHARS);
			$senhauser = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

			$user = new User();
			$user->login($loginuser, $senhauser);
		}
		
		
		?>

		<footer id="rodape">
			<div class="footer-copyright white">
				<br>
                <div class="row center">© 2020 Copyright - Shinobi Era Ltda.</div>
            </div>
		</footer>

		<!-- JQUERY -->
	   <script type="text/javascript" src="../materialize/jquery/jquery-3.5.0.js"></script>
	   <!-- MATERIALIZE JS -->
	   <script type="text/javascript" src="../materialize/js/materialize.js"></script>
	</body>
</html>