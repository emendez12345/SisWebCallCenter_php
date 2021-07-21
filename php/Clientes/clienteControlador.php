<?php
 
require_once 'clienteModelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $cliente = new Cliente();
        $resultado = $cliente->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $cliente = new Cliente();
		$resultado = $cliente->nuevo($datos);
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
        $cliente = new Cliente();
		$resultado = $cliente->borrar($datos['codiCli']);
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
        $cliente = new Cliente();
        $cliente->consultar($datos['codiCli']);

        if($cliente->getCodiCli() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codiCli' => $cliente->getCodiCli(),
                'nomCli' => $cliente->getNomCli(),
                'apeCli' =>$cliente->getApeCli(),
                'email' => $cliente->getEmail(),
                'activo' => $cliente->getActivo(),
                'fecha_creacion' =>$cliente->getFecha_creacion(),
                'usuario' => $cliente->getUsuario(),
                'password' => $cliente->getPassword(),
                'ultima_actualizacion' =>$cliente->getUltima_actualizacion(),
                'id_tienda' =>$cliente->getId_tienda(),
                'id_direccion' =>$cliente->getId_direccion(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $cliente = new Cliente();
        $listado = $cliente->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}
?>
