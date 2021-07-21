<?php
    require_once("../modeloAbstractoDB.php");
    class Tienda extends ModeloAbstractoDB {

		private $id_tienda;
		private $nomCiu;
		private $codiPais;
		private $ultima_actualizacion;

		
		function __construct() {
			//$this->db_name = '';
		}

		public function getid_tienda(){
			return $this->id_tienda;
		}
		public function getNomCiu(){
			return $this->nomCiu;
		}
		public function getCodiPais(){
			return $this->codiPais;
		}
		public function getUltima_actualizacion(){
			return $this->ultima_actualizacion;
		}
		


		public function consultar($id_tienda='') {
			if($id_tienda !=''):
				$this->query = "
				SELECT id_tienda,jefe_personal_id,id_direccion,ultimaactualizacion
				FROM tiendas
				WHERE id_tienda = '$id_tienda' order by id_tienda
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
			SELECT id_tienda,jefe_personal_id,id_direccion,ultimaactualizacion 
			FROM tiendas order by id_tienda
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		public function listatiendas() {
			$this->query = "
			SELECT id_tienda,jefe_personal_id,id_direccion,ultimaactualizacion 
			FROM tiendas order by id_tienda
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
	
		public function nuevo($datos=array()) {
			if(array_key_exists('id_tienda', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$nomCiu= utf8_decode($nomCiu);
				$this->query = "
					INSERT INTO ciudades
					(id_tienda, nomCiu,codiPais,ultima_actualizacion)
					VALUES
					('$id_tienda', '$nomCiu','$codiPais',now())
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$nomCiu= utf8_decode($nomCiu);
			$this->query = "
			UPDATE ciudades
			SET nomCiu = '$nomCiu',
			codiPais='$codiPais',
			ultima_actualizacion=now()
			WHERE id_tienda = '$id_tienda'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($id_tienda='') {
			$this->query = "
			DELETE FROM ciudades
			WHERE id_tienda = '$id_tienda'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>