<?php
	require_once("../modeloAbstractoDB.php");
    class Direccion extends ModeloAbstractoDB {

		private $id_direccion;
		private $direccion1;
		private $direccion2;
		private $distrito;
		private $codigopostal;
		private $telefono;
		private $codiCiu;
		private $ultimaactualizacion;


		
		function __construct() {
			//$this->db_name = '';
		}

		public function getId_direccion(){
			return $this->id_direccion;
		}
		public function getDireccion1(){
			return $this->direccion1;
		}
		public function getDireccion2(){
			return $this->direccion2;
		}
		public function getDistrito(){
			return $this->distrito;
		}
		public function getCodigopostal(){
			return $this->codigopostal;
		}		
		public function getTelefono(){
			return $this->telefono;
		}
		public function getCodiCiu(){
			return $this->codiCiu;
		}
		public function getUltimaactualizacion(){
			return $this->ultimaactualizacion;
		}

		public function consultar($id_direccion='') {
			if($id_direccion !=''):
				$this->query = "
				SELECT * FROM direcciones
				WHERE id_direccion = '$id_direccion' order by id_direccion
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
			SELECT id_direccion, direccion1, 
			direccion2, distrito, codigopostal, 
			telefono, c.nomCiu, d.ultimaactualizacion 
			FROM direcciones as d INNER JOIN ciudades as c
			ON (d.codiCiu=c.codiCiu) order by direccion1
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		public function listadireccion() {
			$this->query = "
			SELECT id_direccion, direccion1, direccion2, distrito, codigopostal, telefono, codiCiu, ultimaactualizacion 
			FROM direcciones order by id_direccion
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		
		public function nuevo($datos=array()) {
			if(array_key_exists('id_direccion', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$direccion1= utf8_decode($direccion1);
				$this->query = "
					INSERT INTO direcciones
					(id_direccion, direccion1, direccion2, distrito, codigopostal, telefono,codiCiu,ultimaactualizacion)
					VALUES
					(NULL, '$direccion1', '$direccion2', '$distrito','$codigopostal', '$telefono','$codiCiu',now())
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$direccion1= utf8_decode($direccion1);
			$this->query = "
			UPDATE direcciones
			SET direccion1 = '$direccion1',
			direccion2='$direccion2',
			distrito='$distrito', 
			codigopostal = '$codigopostal', 
			telefono = '$telefono',
			codiCiu='$codiCiu',
            ultimaactualizacion=now() 
			WHERE id_direccion = '$id_direccion'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($id_direccion='') {
			$this->query = "
			DELETE FROM direcciones
			WHERE id_direccion = '$id_direccion'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}

		function __destruct() {
			//unset($this);
		}

	}
?>