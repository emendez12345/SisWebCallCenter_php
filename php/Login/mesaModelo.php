<?php
	require_once("php/modeloAbstractoDB.php");
    class Mesa extends ModeloAbstractoDB {

		private $id_usu;
		private $nombre;
		private $apellido;
		private $email;
		private $usuario;
		private $password;
		private $rol;
		private $ultima_actualizacion;
		
		function __construct() {
			//$this->db_name = '';
		}

		public function getId_usu(){
			return $this->id_usu;
		}
		public function getNombre(){
			return $this->nombre;
		}
		public function getApellido(){
			return $this->apellido;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getUsuario(){
			return $this->usuario;
		}
		public function getPassword(){
			return $this->password;
		}
		public function getRol(){
			return $this->rol;
		}
		public function getUltima_actualizacion(){
			return $this->ultima_actualizacion;
		}

		public function consultar($CodiEmple='') {
			if($CodiEmple !=''):
				$this->query = "
				SELECT * FROM empleados
				WHERE CodiEmple = '$CodiEmple' order by CodiEmple
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
			SELECT id_usu, nombre,apellido,email,usuario,password,rol, ultima_actualizacion 
			FROM mesa order by id_usu
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('CodiEmple', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$nomEmple= utf8_decode($nomEmple);
				$this->query = "
					INSERT INTO empleados
					(CodiEmple, nomEmple, apellEmple, usuario, password, id_tienda,jefe_personal_id, id_direccion, email,activo,ultima_actualizacion)
					VALUES
					(NULL, '$nomEmple', '$apellEmple', '$usuario','$password', '$id_tienda','$jefe_personal_id','$id_direccion','$email','$activo','$ultima_actualizacion')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$nomEmple= utf8_decode($nomEmple);
			$this->query = "
			UPDATE empleados
			SET nomEmple = '$nomEmple',
			apellEmple='$apellemple',
			usuario='$usuario', 
			password = '$password', 
			id_tienda = '$id_tienda',
			jefe_personal_id='$jefe_personal_id', 
			id_direccion='$id_direccion', 
			email = '$email',
			activo='$activo',
            ultima_actualizacion='$ultima_actualizacion' 
			WHERE CodiEmple = '$CodiEmple'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($CodiEmple='') {
			$this->query = "
			DELETE FROM empleados
			WHERE CodiEmple = '$CodiEmple'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

		public function validarLogin($usuario = '', $password = '') {
				if($usuario !=''):
					$this->query = "
					SELECT * FROM mesa
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