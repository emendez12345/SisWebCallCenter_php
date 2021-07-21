<?php
 
require_once 'tiendaModelo.php';

$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $ciudad = new Ciudad();
        $resultado = $ciudad->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $ciudad = new Ciudad();
		$resultado = $ciudad->nuevo($datos);
        if($resultado > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        echo json_encode($respuesta);
        break;
    case 'borrar':
        $ciudad = new Ciudad();
		$resultado = $ciudad->borrar($datos['codiCiu']);
        if($resultado > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'consultar':
        $ciudad = new ciudad();
        $ciudad->consultar($datos['codiCiu']);

        if($ciudad->getCodiCiu() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codiCiu' => $ciudad->getCodiCiu(),
                'nomCiu' => $ciudad->getNomCiu(),
                'codiPais' => $ciudad->getCodiPais(),
                'ultima_actualizacion' => $ciudad->getUltima_actualizacion(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $tienda = new Tienda();
        $listado = $tienda->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}
?>
