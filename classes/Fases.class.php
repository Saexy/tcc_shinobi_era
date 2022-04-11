<?php
	class Fase{
		private $idFase;
		private $nomeImgFase;
		private $caminhoImgFase;
		private $tituloFase;
		private $sloganFase;
				
		public function startFase($idFase, $nomeImgFase, $caminhoImgFase, $tituloFase, $sloganFase)
		{
			$this->idFase				= $idFase;
			$this->nomeImgFase		= $nomeImgFase;
			$this->caminhoImgFase	 	= $caminhoImgFase;
			$this->tituloFase		= $tituloFase;
			$this->sloganFase		= $sloganFase;
		}

		public function insertFase()
		{
			include_once('Bancodados.class.php');
			$newfase = new BancoDados();
			if(!$this->existsFase($this->idFase)){
				$sql = "CALL p_insertFase($this->idFase,
				'$this->nomeImgFase',
				'$this->caminhoImgFase',
				'$this->tituloFase',
				'$this->sloganFase')";
				$retorno = $newfase->set($sql);
				if($retorno)
				{
					$msg = 'Fase registrada com sucesso!';
				}else{
					$msg = 'Ops! Algo deu errado ao registrar a sua fase.';
				}
			}else{
				$msg = 'Esta fase já existe.';
			}
			return $msg;
		}
	
		public function listFase(){
			include_once('Bancodados.class.php');
			$listfase = new BancoDados();
			$sql = "CALL p_listFase()";
			$list = $listfase->get($sql);
			return $list;
		}

		public function getFase($idfase)
		{
			include_once('Bancodados.class.php');
			$getfase = new BancoDados();
			$sql = "CALL p_getFase($idfase)";
			$list = $getfase->get($sql);
			return $list;		
		}

		public function deleteFase($idfase){
			include_once('Bancodados.class.php');
			include_once('ImagemFases.class.php');

			$retorno = $this->getFase($idfase);

			foreach($retorno as $fase){}

			$apagafoto = new Imagem();
			$apagado = $apagafoto->apagaImg($fase[2]);

			if(!$apagado){
				echo "Foto da fase não existe.";
			}else{
				echo "Foto da fase excluida com sucesso!";
			}
			
			$deletefase = new BancoDados();
			$sql = "CALL p_deleteFase($idfase)";
			$retorno = $deletefase->set($sql);
			if($retorno)
			{
				return TRUE;
			}else{
				return FALSE;
			}
		}
	
		public function editFase($idfase, $titulofase, $sloganfase){
			include_once('Bancodados.class.php');
			$editfase = new BancoDados();
			$sql = "CALL p_editFase($idfase, '$titulofase', '$sloganfase')";
			$retorno = $editfase->set($sql);
			if($retorno)
			{
				return TRUE;
			}else{
				return FALSE;
			}
		}

		public function existsFase($idfase){
			include_once('Bancodados.class.php');
			$result = $this->getFase($idfase);
			if($result)
			{
				return TRUE;
			}else{
				return FALSE;
			}
		}

	}



?>