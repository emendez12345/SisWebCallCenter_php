<?php
 
require_once 'direccionModelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $direccion = new Direccion();
        $resultado = $direccion->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $direccion = new Direccion();
		$resultado = $direccion->nuevo($datos);
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
        $direccion = new Direccion();
		$resultado = $direccion->borrar($datos['id_direccion']);
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
        $direccion = new Direccion();
        $direccion->consultar($datos['id_direccion']);

        if($direccion->getid_direccion() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'id_direccion' => $direccion->getId_direccion(),
                'direccion1'=>$direccion->getDireccion1(),
                'direccion2' => $direccion->getDireccion2(),
                'distrito' => $direccion->getDistrito(),
                'codigopostal' =>$direccion->getCodigopostal(),
                'telefono'=>$direccion->getTelefono(),
                'codiCiu' =>$direccion->getCodiCiu(),
                'ultimaactualizacion' =>$direccion->getUltimaactualizacion(),
                'respuesta' =>'existe'
            );
        }

        echo json_encode($respuesta);
        break;

    case 'listar':
        $direccion = new Direccion();
        $listado = $direccion->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}
?>
