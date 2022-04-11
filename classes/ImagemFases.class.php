<?php
	class Imagem{

        private $id;
        private $novonomeImg;
        private $nomeimgOriginal;
        private $tamanhoImg;
        private $tipoImg;
        private $erroImg;
        private $tempImg;
        private $extensaoImg;
        private $larguraImg;
        private $alturaImg;

        private $tamPermitido = 1048576;
        private $largPermitida = 1280;
        private $altPermitida = 720;
        private $erro = array();	

        public function __set($atributo, $valor)
        {
            $this->$atributo = $valor;
        }
            
        public function __get($atributo)
        {
            return $this->$atributo;
        }
            
        public function iniciaObj($id, $arquivo)
        {
            $this->id		= $id;
            $this->nomeimgOriginal		= $arquivo['name'];
            $this->tamanhoImg		= $arquivo['size'];
            $this->tipoImg = $arquivo['type'];
            $this->erroImg 		= $arquivo['error'];
            $this->tempImg 	= $arquivo['tmp_name'];
        }

        public function mostraObj(){

            echo $this->id;
            echo '<br>'.$this->nomeimgOriginal;
            echo '<br>'.$this->tamanhoImg;
            echo '<br>'.$this->tipoImg;
            echo '<br>'.$this->erroImg;
            echo '<br>'.$this->tempImg;
            echo '<br>'.$this->novonomeImg;
            echo '<br>'.$this->larguraImg;
            echo '<br>'.$this->alturaImg;
        }
        
        public function pegaExtensao(){
            $this->extensaoImg = strtolower(strrchr($this->nomeimgOriginal,"."));
        }

        public function renomeiaImagem(){
            $this->pegaExtensao();
            $diretorio = "fotos/";
			$this->novonomeImg = $diretorio.$this->id.$this->extensaoImg; 
        }

        public function validaExtensao(){
            $this->pegaExtensao();
            //$extensao = strtolower(strrchr($this->nomeimgOriginal,"."));
            $tipos = array('.jpg', '.jpeg', '.gif', '.png');
            $achou = false;
            $i=0;
            while(($i < count($tipos)) && ($achou == false))
            {
                if(strcasecmp($this->extensaoImg, $tipos[$i]) == 0){
                    $achou = true;
                }else{
                    $achou = false;
                }		
                $i++;	   
            }
            return $achou;
        }

        public function verTamanhoImg(){
            //comparar tamanho da imagem aqui
            if($this->tamanhoImg <= $this->tamPermitido){
                $achouerro = false;
            }else{
                $achouerro = true;
            }
            return $achouerro;
        }
        
        public function verLarguraImg(){
            if($this->larguraImg <= $this->largPermitida){
                $achouerro = false;
            }else{
                $achouerro = true;
            }
            return $achouerro;
        }

        public function verAlturaImg(){
            if($this->alturaImg <= $this->altPermitida){
                $achouerro = false;
            }else{
                $achouerro = true;
            }
            return $achouerro;
        }

        public function pegaDimensao(){
            $dimensao = getimagesize($this->tempImg);
            $this->larguraImg = $dimensao[0];
            $this->alturaImg = $dimensao[1];
        }

        public function mostraErros(){
            return $this->erro;
        }

        public function preparaImg(){
            $this->pegaExtensao();
            $this->pegaDimensao();

            if(!$this->validaExtensao()){
                $this->erro[] = 'Imagem com extensão inválida!<br /> Você está tentando enviar um arquivo 
                do tipo "'.$this->extensaoImg.'" <br /> Mas aceito somente imagens do tipo jpg,gif e png';
                return false;
            }else if($this->verTamanhoImg()){
                $this->erro[] = 'Esta imagem é muito grande! Tem que ter no máximo '.round($this->tamPermitido/1024, 2).'KBytes
                                <br/>E sua imagem tem '.round($this->tamanhoImg/1024, 2).'KBytes';
                        $arquivo["size"].' bytes  ( '.($arquivo["size"]/1048576).' MB)';
                return false;
            }else if($this->verLarguraImg()){
                $this->erro[] = 'Largura da imagem muito grande, a largura não pode ultrapassar '.
                        $this->largPermitida.' pixels <br/> Sua imagem tem  '.$this->larguraImg.' pixels';
                return false;
            }else if($this->verAlturaImg()){
                $erro[] = 'Altura da imagem muito grande, a altura n�o pode ultrapassar '.$this->altPermitida.' pixels <br /> Sua imagem tem  '.$this->alturaImg.' pixels';
                return false;
            }else{
                $this->renomeiaImagem();
                return true;
            }
            
        }
        
        public function sobeImagem(){
            if($this->preparaImg()){
                if(!file_exists($this->novonomeImg)){
                    if(move_uploaded_file($this->tempImg, $this->novonomeImg))//upload do arquivo
                    {
                        $this->erro[] = 'Imagem Enviada com Sucesso!';	
                        return true;					  
                    }else{
                        $this->erro[] = 'Falha ao Enviar a Imagem!';
                        return false;
                    }
                }else{
                    $this->erro[] = 'A imagem já existe no diretório';
                    return false;
                }
            }else{
                $this->erro[] = 'Ops, Tivemos algum problema ao tratar sua imagem!';
                return false;
            }
        }

        public function apagaImg($foto){
            if(file_exists($foto)){
                unlink($foto);
                if(!file_exists($foto)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }

        }	
	}

?>