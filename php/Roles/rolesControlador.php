<?php
 
require_once 'rolesModelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $roles = new Roles();
        $resultado = $roles->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $roles = new Roles();
		$resultado = $roles->nuevo($datos);
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
        $roles = new Roles();
		$resultado = $roles->borrar($datos['id_rol']);
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
        $roles = new Roles();
        $roles->consultar($datos['id_rol']);

        if($roles->getId_rol() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'id_rol' => $roles->getId_rol(),
                'nomRol' => $roles->getNomRol(),
                'ultima_actualizacion' => $roles->getUltima_actualizacion(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $roles = new Roles();
        $listado = $roles->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}
?>
