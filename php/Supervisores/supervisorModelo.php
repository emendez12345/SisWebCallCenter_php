<?php
    require_once("../modeloAbstractoDB.php");
    class Sup extends ModeloAbstractoDB {

		private $id_sup;
		private $nombre;
		private $apellido;
		private $email;
		private $usuario;
		private $password;
		private $id_rol;
		private $ultima_actualizacion;

		
		function __construct() {
			//$this->db_name = '';
		}

		public function getId_sup(){
			return $this->id_sup;
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
		public function getId_rol(){
			return $this->id_rol;
		}
		public function getUltima_actualizacion(){
			return $this->ultima_actualizacion;
		}
	

		public function consultar($id_sup='') {
			if($id_sup !=''):
				$this->query = "
				SELECT id_sup, nombre,apellido,email,usuario,password,id_rol,ultima_actualizacion
			    FROM supervisores
				WHERE id_sup = '$id_sup' order by id_sup
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
			SELECT id_sup, nombre,apellido,email,usuario, password,r.nomRol,s.ultima_actualizacion 
			FROM supervisores as s INNER JOIN roles as r 
			ON (s.id_rol=r.id_rol)order by nombre
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}

		public function listamesa() {
			$this->query = "
			SELECT id_usu, nombre,apellido,email,usuario,password,id_rol, ultima_actualizacion 
			FROM mesa order by id_usu
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
	
		public function nuevo($datos=array()) {
			if(array_key_exists('id_sup', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$nombre= utf8_decode($nombre);
				$this->query = "
					INSERT INTO supervisores
					(id_sup, nombre,apellido,email,usuario,password,id_rol, ultima_actualizacion )
					VALUES
					('$id_sup','$nombre','$apellido','$email','$usuario','$password','$id_rol',now())
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$nombre= utf8_decode($nombre);
			$this->query = "
			UPDATE supervisores
			SET nombre = '$nombre',
			apellido='$apellido',
			email='$email',
			usuario='$usuario',
			password='$password',
			id_rol='$id_rol',
			ultima_actualizacion=now()
			WHERE id_sup = '$id_sup'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($id_sup='') {
			$this->query = "
			DELETE FROM supervisores
			WHERE id_sup = '$id_sup'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>