<?php
 
require_once 'empleadoModelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $empleado = new Empleado();
        $resultado = $empleado->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $empleado = new Empleado();
		$resultado = $empleado->nuevo($datos);
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
        $empleado = new Empleado();
		$resultado = $empleado->borrar($datos['CodiEmple']);
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
        $empleado = new Empleado();
        $empleado->consultar($datos['CodiEmple']);

        if($empleado->getCodiEmple() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'CodiEmple' => $empleado->getCodiEmple(),
                'nomEmple'=>$nomEmple->getNomEmple(),
                'apellEmple' => $empleado->getApellEmple(),
                'usuario' => $empleado->getUsuario(),
                'password' =>$empleado->getPassword(),
                'id_tienda' => $empleado->getId_tienda(),
                'jefe_personal_id'=>$empleado->getJefe_personal_id(),
                'id_direccion' =>$empleado->getId_direccion(),
                'email' =>$empleado->getEmail(),
                'activo'=>$empleado->getActivo(),
                'ultima_actualizacion'=>$empleado->getUltima_actualizacion(),
                'respuesta' =>'existe'
            );
        }

        echo json_encode($respuesta);
        break;

    case 'listar':
        $empleado = new Empleado();
        $listado = $empleado->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}
?>
