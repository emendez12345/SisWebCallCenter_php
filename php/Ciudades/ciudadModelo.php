<?php
    require_once("../modeloAbstractoDB.php");
    class Ciudad extends ModeloAbstractoDB {

		private $codiCiu;
		private $nomCiu;
		private $codiPais;
		private $ultima_actualizacion;

		
		function __construct() {
			//$this->db_name = '';
		}

		public function getCodiCiu(){
			return $this->codiCiu;
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
		


		public function consultar($codiCiu='') {
			if($codiCiu !=''):
				$this->query = "
				SELECT codiCiu,nomCiu,codiPais,ultima_actualizacion
				FROM ciudades
				WHERE codiCiu = '$codiCiu' order by codiCiu
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
			SELECT codiCiu,nomCiu, p.nomPais, c.ultima_actualizacion 
			FROM ciudades as c INNER JOIN paises as p 
			ON(c.codiPais=p.codiPais)order by nomCiu
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
		public function listaciudades() {
			$this->query = "
			SELECT codiCiu, nomCiu,codiPais, ultima_actualizacion 
			FROM ciudades order by codiCiu
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
			
		}
	
		public function nuevo($datos=array()) {
			if(array_key_exists('codiCiu', $datos)):
				foreach ($datos as $campo=>$valor):
					$$campo = $valor;
				endforeach;
				$nomCiu= utf8_decode($nomCiu);
				$this->query = "
					INSERT INTO ciudades
					(codiCiu, nomCiu,codiPais,ultima_actualizacion)
					VALUES
					('$codiCiu', '$nomCiu','$codiPais',now())
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
			WHERE codiCiu = '$codiCiu'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		}
		
		public function borrar($codiCiu='') {
			$this->query = "
			DELETE FROM ciudades
			WHERE codiCiu = '$codiCiu'
			";
			$resultado = $this->ejecutar_query_simple();

			return $resultado;
		}
		
		function __destruct() {
			//unset($this);
		}
	}
?>