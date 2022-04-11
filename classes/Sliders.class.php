<?php
	class Slider{
		private $idSld;
		private $nomeImgSld;
		private $caminhoImgSld;
		private $tituloSld;
				
		public function startSlider($idSld, $nomeImgSld, $caminhoImgSld, $tituloSld)
		{
			$this->idSld				= $idSld;
			$this->nomeImgSld		= $nomeImgSld;
			$this->caminhoImgSld	 	= $caminhoImgSld;
			$this->tituloSld		= $tituloSld;
		}

		public function insertSlider()
		{
			include_once('Bancodados.class.php');
			$novosld = new BancoDados();
			if(!$this->existsSlider($this->idSld)){
				$sql = "CALL p_insertSlider($this->idSld,
				'$this->nomeImgSld',
				'$this->caminhoImgSld',
				'$this->tituloSld')";
				$retorno = $novosld->set($sql);
				if($retorno)
				{
					$msg = 'Slider registrado com sucesso!';
				}else{
					$msg = 'Ops! Algo deu errado ao registrar o seu slider.';
				}
			}else{
				$msg = 'Este slider já existe.';
			}
			return $msg;
		}
	
		public function listSlider(){
			include_once('Bancodados.class.php');
			$listasld = new BancoDados();
			$sql = "CALL p_listSlider()";
			$list = $listasld->get($sql);
			return $list;
		}

		public function getSlider($idSld)
		{
			include_once('Bancodados.class.php');
			$consultasld = new BancoDados();
			$sql = "CALL p_getSlider($idSld)";
			$list = $consultasld->get($sql);
			return $list;		
		}

		public function deleteSlider($idSld){
			include_once('Bancodados.class.php');
			include_once('ImagemFases.class.php');

			$retorno = $this->getSlider($idSld);

			foreach($retorno as $slider){}

			$apagafoto = new Imagem();
			$apagado = $apagafoto->apagaImg($slider[2]);

			if(!$apagado){
				echo "Foto do slider não existe.";
			}else{
				echo "Foto do slider excluida com sucesso!";
			}

			$excluisld = new BancoDados();
			$sql = "CALL p_deleteSlider($idSld)";
			$retorno = $excluisld->set($sql);
			if($retorno)
			{
				return TRUE;
			}else{
				return FALSE;
			}
		}
	
		public function editSlider($idSld, $tituloSld){
			include_once('Bancodados.class.php');
			$editasld = new BancoDados();
			$sql = "CALL p_editSlider($idSld, '$tituloSld')";
			$retorno = $editasld->set($sql);
			if($retorno)
			{
				return TRUE;
			}else{
				return FALSE;
			}
		}

		public function existsSlider($idSld){
			include_once('Bancodados.class.php');
			$existealuno = new BancoDados();
			$result = $this->getSlider($idSld);
			if($result)
			{
				return TRUE;
			}else{
				return FALSE;
			}
		}

	}



?>