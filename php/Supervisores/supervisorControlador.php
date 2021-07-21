<?php
 
require_once 'supervisorModelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $sup = new Sup();
        $resultado = $sup->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $sup = new Sup();
		$resultado = $sup->nuevo($datos);
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
        $sup = new Sup();
		$resultado = $sup->borrar($datos['id_sup']);
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
        $sup = new Sup();
        $sup->consultar($datos['id_sup']);

        if($sup->getId_sup() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'id_sup' => $sup->getId_sup(),
                'nombre' => $sup->getNombre(),
                'apellido' => $sup->getApellido(),
                'usuario' => $sup->getUsuario(),
                'password' => $sup->getPassword(),
                'email' => $sup->getEmail(),
                'id_rol' => $sup->getId_rol(),
                'ultima_actualizacion'=>$sup->getUltima_actualizacion(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $sup = new Sup();
        $listado = $sup->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}
?>
