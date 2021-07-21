<?php
    require_once("../modeloAbstractoDB.php");
    class Cliente extends ModeloAbstractoDB {

		private $codiCli;
		private $nomCli;
		private $apeCli;
		private $email;
		private $activo;
		private $fecha_creacion;
		private $usuario;
		private $password;
		private $ultima_actualizacion;
		private $id_tienda;
		private $id_direccion;
		
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getCodiCli(){
			return $this->codiCli;
		}

		public function getNomCli(){
			return $this->nomCli;
			
		}
		public function getApeCli(){
			return $this->apeCli;
		}
		public function getEmail(){
			return $this->email;
		}
		
		public function getActivo(){
			return $this->activo;
		}
		public function getFecha_creacion(){
			return $this->fecha_creacion;
		}
		public function getUsuario(){
			return $this->usuario;
		}
		public function getPassword(){
			return $this->password;
		}
		public function getid_tienda(){
			return $this->id_tienda;
		}
		public function getid_direccion(){
			return $this->id_direccion;
		}
		public function getUltima_actualizacion(){
			return $this->ultima_actualizacion;
		}

		public function consultar($codiCli='') {
			if($codiCli !=''):
				$this->query = "
				SELECT * FROM clientes
				WHERE codiCli = '$codiCli' order by codiCli
				";
				$this->obtener_resultados_query();
			endif;
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $propiedad=>$valor):
					
					$this->$propiedad = $valor;
				endforeach;
			endif;
		}
		
	
		public function lista() {
			$this->query = "
			SELECT codiCli, nomCli ,apeCli ,email ,activo ,fecha_creacion ,usuario,
			password ,c.ultima_actualizacion ,d.direccion1,t.nomTiend 
			FROM clientes as c INNER JOIN direcciones as d 
			ON(c.id_direccion=d.id_direccion)
			INNER JOIN tiendas as t 
			ON(c.id_tienda=t.id_tienda)
			order by c.codiCli
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}


		public function listacliente() {
			$this->query = "
			SELECT codiCli, nomCli ,apeCli ,email ,activo ,fecha_creacion ,usuario ,password ,ultima_actualizacion , id_tienda,id_direccion 
			FROM clientes order by codiCli
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		public function nuevo($datos=array()) {
			
			if(array_key_exists('codiCli', $datos)):
				foreach ($datos as $campo=>$valor):
					
					$$campo = $valor;
				endforeach;
				$nomCli= utf8_decode($nomCli);
				$this->query = "
					INSERT INTO clientes
					(codiCli, nomCli ,apeCli ,email ,activo ,fecha_creacion ,usuario ,password ,ultima_actualizacion , id_tienda ,id_direccion)
					VALUES
					(NULL, '$nomCli' ,'$apeCli' ,'$email' ,'$activo' , '$fecha_creacion' ,'$usuario' ,'$password' ,now() , '$id_tienda' ,'$id_direccion')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
		    $$campo = $valor;
			endforeach;
			$nomCli= utf8_decode($nomCli);
			$this->query = "
			UPDATE clientes
			SET nomCli = '$nomCli', 
			apeCli = '$apeCli', 
			email = '$email', 
			activo = '$activo', 
			fecha_creacion = '$fecha_creacion', 
			usuario = '$usuario', 
			password = '$password', 
			id_tienda = '$id_tienda',
			ultima_actualizacion = now(),
			id_direccion='$id_direccion' 
			WHERE codiCli = '$codiCli'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($codiCli='') {
			$this->query = "
			DELETE FROM clientes
			WHERE codiCli = '$codiCli'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

		public function validarLogin($usuario = '', $password = '') {
			if($usuario !=''):
				$this->query = "
				SELECT * FROM clientes
				WHERE usuario = '$usuario' && password = '$password' 
				";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>