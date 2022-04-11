<?php
	class BancoDados{
	  private $servidor;
	  private $usuario;
	  private $senha;
	  private $banco;
	  public $con;
	  public $comando;
	  
	  public function connect()
	  {
			$this->servidor = 'localhost';
			$this->banco    = 'bd_shinobiera';
			$this->usuario  = 'root';
			$this->senha    = '';
			$this->con = @mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->banco);
			if(!$this->con)
			{
				die ("Problemas com a conexão. Contate o administrador");
			}else{
				mysqli_query($this->con,"SET NAMES 'utf8'");
				mysqli_query($this->con,'SET character_set_connection=utf8');
				mysqli_query($this->con,'SET character_set_client=utf8');
				mysqli_query($this->con,'SET character_set_results=utf8');
			}
		}
	
		public function close()
		{
			mysqli_close($this->con);
			return;
		}
		
		public function get($sqlconsulta)
		{
			$this->comando = $sqlconsulta;
			
			$this->connect();
			$result = mysqli_query($this->con, $this->comando);
			
			try{
				$list = mysqli_fetch_all($result);
				return $list;
				
			}catch(Exception $e){
				echo 'Erro: ',  $e->getMessage(), "\n";
			}

			$this->close();
		}
		
		public function set($sqlinsere)
		{
			$this->comando = $sqlinsere;
			$this->connect();

			try{
				$result = mysqli_query($this->con, $this->comando);
				return TRUE; 
			}catch(Exception $e){
				return FALSE;
			}
			
			$this->close();
		}
		
		
	}

?>