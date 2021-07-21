<?php

    class Session_Controller{
        public function __construct(){
            session_start();
        }

       public function setAdministrador($User){
            $_SESSION['administrador']['Usuario']=$User;
        }

        public function setEmpleado($aEmpleado){
            $_SESSION['empleado']=$aEmpleado;
        }

        public function setCliente($aCliente){
            $_SESSION['cliente']=$aCliente;
        }

        public function setMesa($aMesa){
            $_SESSION['mesa']=$aMesa;
        }

        public function setSup($aSup){
            $_SESSION['supervisor']=$aSup;
        }

        public function CloseSession(){
            session_unset();
            session_destroy();
        }

        public function __destruct(){
            $Session_Controller=null;
        }
    }