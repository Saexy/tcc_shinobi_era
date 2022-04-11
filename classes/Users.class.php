<?php
	class User{
		private $id;
		private $nomeuser;
		private $loginuser;
		private $senhauser;
		
		public function login($loginus, $senhaus){
			$this->loginuser = $loginus;
			$this->senhauser = $senhaus;
			if($this->getLoginUser()){
				$id = $this->loginuser;
				session_id($id);
				session_start();
				$_SESSION['nomeuser'] = $this->nomeuser;
				$_SESSION['status'] = 'logado';
				$nomecookie = 'navega';
				$tempo = time() + 1800;

				setcookie($nomecookie, $id);

				header("Location: dashboard.php");
			}else{
				echo '
					<script>

					alert("Usuário ou senha não conferem.");

					</script>';
			}
		}

		public function getLoginUser(){
			include_once('Bancodados.class.php');
			$logauser = new BancoDados();
			$sql = "CALL p_getLoginUser('$this->loginuser', '$this->senhauser')";
			if($retorno = $logauser->get($sql)){
				foreach($retorno as $usuario){
					//echo '<br>ConsultaLogaUser() retorno: '.$usuario[0].' - '.$usuario[1].' - '.$usuario[2].' - '.$usuario[3].' - '.$usuario[4];
					$this->nomeuser = $usuario[3];
				}
				if(trim($usuario[1]) === trim($this->loginuser) && trim($usuario[2]) === trim($this->senhauser)){
					return true;
				}else{
					return false;
				}
			}
		}

		public function iniciaObj($id, $nomeUser, $loginUser, $senhaUser, $setorUser, $nivelUser, $statusUser)
		{
			$this->id				= $id;
			$this->nomeUser		= $nomeUser;
			$this->loginUser	 	= $loginUser;
			$this->senhaUser		= $senhaUser;
		}
		
		public function mostraObj()
		{
			echo $this->id;
			echo '<br/>'.$this->nomeUser;
			echo '<br/>'. $this->loginUser;
			echo '<br/>'. $this->senhaUser;
		}

	}



?>