<?php
 
require_once 'FacturaModelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    
     case 'editar':
    $Factura = new Factura();
    $resultado = $Factura->editar($datos);
    $respuesta = array(
        'respuesta' => $resultado
    );
echo json_encode($respuesta);
break;
case 'nuevo':
    $Factura = new Factura();
    $resultado = $Factura->nuevo($datos);
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
    $Factura = new Factura();
    $resultado = $Factura->borrar($datos['codiFactura']);
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
        $Factura = new Factura();
        $Factura->consultar($datos['codiFactura']);
    
        if($Factura->getcodiFac() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codiFac' => $Factura->getCodiFac(),
                'ciuFac' => $Factura->getCiuFac(),
                'paisFac' => $Factura->getPaisFac(),
                'codiPro' => $Factura->getCodiPro(),
                'cantFac' => $Factura->getCantFac(),
                'precioFac' => $Factura->getPrecioFac(),
                'totalFac' => $Factura->getTotalFac(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;
        
    case 'listar':
    $Factura = new Factura();
    $listado = $Factura->lista();
    echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
    break;
    }
    ?>
