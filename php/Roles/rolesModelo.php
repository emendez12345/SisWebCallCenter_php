<?php
    require_once("../modeloAbstractoDB.php");
    class Roles extends ModeloAbstractoDB {

	
		private $id_rol;
		private $nomRol;
		private $ultima_actualizacion;

		
		function __construct() {
			//$this->db_name = '';
		}

		public function getId_rol(){
			return $this->id_rol;
		}
		public function getNomRol(){
			return $this->nomRol;
		}
		
		public function getUltima_actualizacion(){
			return $this->ultima_actualizacion;
		}
		


		public function consultar($id_rol='') {
			if($id_rol !=''):
				$this->query = "
				SELECT id_rol, nomRol,ultima_actualizacion 
			    FROM roles
				WHERE id_rol = '$id_rol' order by id_rol
				";
				$this->obtener_resultados_query();
			endif;
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $propiedad=>$valor):
					$this->$propiedad = $valor;
				endforeach;
			endif;
		}

		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$nomRol= utf8_decode($nomRol);
			$this->query = "
			UPDATE roles
			SET nomRol = '$nomRol',
			ultima_actualizacion=now()
			WHERE id_rol = '$id_rol'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function lista() {
			$this->query = "
			SELECT id_rol, nomRol,ultima_actualizacion 
		    FROM roles order by nomRol
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
			if(array_key_exists('id_rol', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$nomRol= utf8_decode($nomRol);
				$this->query = "
					INSERT INTO roles
					(id_rol, nomRol,ultima_actualizacion )
					VALUES
					('$id_rol','$nomRol',now())
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}

		public function borrar($id_rol='') {
			$this->query = "
			DELETE FROM roles
			WHERE id_rol = '$id_rol'
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