<?php
    require_once("../modeloAbstractoDB.php");
    class Pais extends ModeloAbstractoDB {

		private $codiPais;
		private $nomPais;
		private $ultima_actualizacion;

		
		function __construct() {
			//$this->db_name = '';
		}

		public function getCodiPais(){
			return $this->codiPais;
		}
		public function getNomPais(){
			return $this->nomPais;
		}
		public function getUltima_actualizacion(){
			return $this->ultima_actualizacion;
		}
		


		public function consultar($codiPais='') {
			if($codiPais !=''):
				$this->query = "
				SELECT codiPais,nomPais,ultima_actualizacion
				FROM paises
				WHERE codiPais = '$codiPais' order by codiPais
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
			SELECT codiPais, nomPais, ultima_actualizacion 
			FROM paises order by codiPais
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
	
		public function nuevo($datos=array()) {
			if(array_key_exists('codiPais', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$nomPais= utf8_decode($nomPais);
				$this->query = "
					INSERT INTO paises
					(codiPais, nomPais,ultima_actualizacion)
					VALUES
					('$codiPais','$nomPais',now())
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
		}
		
		public function editar($datos=array()) {
			foreach ($datos as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$nomPais= utf8_decode($nomPais);
			$this->query = "
			UPDATE paises
			SET nomPais = '$nomPais',
			ultima_actualizacion=now()
			WHERE codiPais = '$codiPais'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($codiPais='') {
			$this->query = "
			DELETE FROM paises
			WHERE codiPais = '$codiPais'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>