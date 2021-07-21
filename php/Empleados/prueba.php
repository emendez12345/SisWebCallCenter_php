<?php
    include_once "empleadoModelo.php";

    $empleado = new Empleado();

    echo $respuesta = $empleado->validarLogin("kevin","kevin1234");
