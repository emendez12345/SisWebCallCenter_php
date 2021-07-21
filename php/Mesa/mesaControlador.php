<?php
 
require_once 'mesaModelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $mesa = new Mesa();
        $resultado = $mesa->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $mesa = new Mesa();
		$resultado = $mesa->nuevo($datos);
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
        $mesa = new Mesa();
		$resultado = $mesa->borrar($datos['id_usu']);
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
        $mesa = new Mesa();
        $mesa->consultar($datos['id_usu']);

        if($mesa->getId_usu() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'id_usu' => $mesa->getId_usu(),
                'nombre' => $mesa->getNombre(),
                'apellido' => $mesa->getApellido(),
                'usuario' => $mesa->getUsuario(),
                'password' => $mesa->getPassword(),
                'email' => $mesa->getEmail(),
                'id_rol' => $mesa->getId_rol(),
                'ultima_actualizacion' => $mesa->getUltima_actualizacion(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $mesa = new Mesa();
        $listado = $mesa->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}
?>
