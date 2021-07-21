<?php
     require_once('../modeloAbstractoDB.php');
     class Factura extends ModeloAbstractoDB {
        
         private $codiFac;
         private $ciuFac;
         private $paisFac;
         private $codiPro;
         private $cantFac;
         private $precioFac;
         private $totalFac;
         
         function __construct() {
            //$this->db_name = '';
            }
            
         public function getcodiFac(){
                return $this->codiFac;
            }
            
         public function getciuFac(){
                return $this->ciuFac;
            }
            
         public function getpaisFac(){
                return $this->paisFac;
            }
            
         public function getcodiPro(){
                return $this->codiPro;
            }
            
         public function getcantFac(){
                return $this->cantFac;
            }
            
         public function getprecioFac(){
                return $this->precioFac;
            }
            
         public function gettotalFac(){
                return $this->totalFac;
            }
            
         public function consultar($codiFac='') {
                if($codiFac !=''):
                    $this->query = "
                    SELECT * FROM Factura
                    WHERE codiFac = '$codiFac' order by codiFac
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
        SELECT codiFac, ciuFac, paisFac, codiPro, cantFac, precioFac, totalFac
        FROM Factura order by codiFac
        ";
        
        $this->obtener_resultados_query();
        return $this->rows;
        
    }
public function nuevo($datos=array()) {
        if(array_key_exists('codiFac', $datos)):
            foreach ($datos as $campo=>$valor):
                $$campo = $valor;
            endforeach;
            $this->query = "
                INSERT INTO Factura
                (codiFac, ciuFac, paisFac, codiPro, cantFac, precioFac, totalFac)
                VALUES
                ('$codiFac', '$ciuFac', '$paisFac', '$codiPro', '$cantFac', '$precioFac', '$totalFac')
                ";
                $resultado = $this->ejecutar_query_simple();
            return $resultado;
        endif;
    }
public function editar($datos=array()) {
        foreach ($datos as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        $this->query = "
        UPDATE Factura
        SET codiFac = '$codiFac', 
            ciuFac = '$ciuFac', 
            paisFac = '$paisFac', 
            codiPro = '$codiPro', 
            cantFac = '$cantFac', 
            precioFac = '$precioFac', 
            totalFac = '$totalFac'
        WHERE codiFac = '$codiFac'
        ";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;
    }
public function borrar($codiFac='') {
        $this->query = "
        DELETE FROM Factura
        WHERE codiFac = '$codiFac'
        ";
        $resultado = $this->ejecutar_query_simple();

        return $resultado;
    }
        function __destruct() {
                            //unset($this);
    }
}
?>
