<?php
    include 'Controllers/Session_Controller.php';
    include_once "php/Login/empleadoModelo.php";
    include_once "php/Login/clienteModelo.php";
    include_once "php/Login/mesaModelo.php";
    include_once "php/Login/supervisorModelo.php";

    $session_Controller = new Session_Controller();
    $empleado = new Empleado();
    $cliente = new Cliente();
    $mesa=new Mesa();
    $sup=new Sup();

    $usuarioError = "";
    $contraError = "";
    $rolError = "Seleccione rol";

    if(isset($_SESSION['administrador'])){
        include_once 'Views/administrador.php';
        
   }else if(isset($_SESSION['empleado'])){
        include_once 'Views/empleado.php';
        
    }else if(isset($_SESSION['cliente'])){
        include_once 'Views/cliente.php';

    }else if(isset($_SESSION['mesa'])){
        include_once 'Views/mesa.php';

    }else if(isset($_SESSION['supervisor'])){
        include_once 'Views/supervisor.php';
        
    }
    else if(isset($_POST['usuario']) && isset($_POST['password'])){
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $rol = $_POST['rol'];
        
        
            if($rol == "Administrador"){
                    if($usuario == "admin" && $password == "admin"){
                        include_once 'Views/administrador.php';
                        $session_Controller->setAdministrador($usuario);
                    }else{
                        $ErrorLogin = "Usuario o contrasenas erroneos";
                        $usuarioError = $usuario;
                        $contraError = $password;
                        $rolError = $rol;
                        include_once 'Views/Ingresar.php';
                    }
         }else if($rol == "Empleado"){
                if($empleado->validarLogin($usuario,$password)){
                    $aEmpleado = array(
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
                        'ultima_actualizacion'=>$empleado->getUltima_actualizacion()
                    );
                    $session_Controller->setEmpleado($aEmpleado);
                    include_once 'Views/empleado.php';
                }else{
                    $ErrorLogin = "Usuario o contrasenas erroneos";
                    $usuarioError = $usuario;
                    $contraError = $password;
                    $rolError = $rol;
                    include_once 'Views/Ingresar.php';
                }
                
            }else if($rol == "Cliente"){
                if($cliente->validarLogin($usuario,$password)){
                    $aCliente = array(
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
                    );
                    $session_Controller->setCliente($aCliente);
                    include_once 'Views/cliente.php';
                }else{
                    $ErrorLogin = "Usuario o contrasenas erroneos";
                    $usuarioError = $usuario;
                    $contraError = $password;
                    $rolError = $rol;
                    include_once 'Views/Ingresar.php';
                }

            }else if($rol == "Mesa"){
                if($mesa->validarLogin($usuario,$password)){
                    $aMesa = array(
                        'id_usu' => $mesa->getId_usu(),
                        'nombre' => $mesa->getNombre(),
                        'apellido' => $mesa->getApellido(),
                        'email' => $mesa->getEmail(),
                        'password' => $mesa->getPassword(),
                        'rol' => $mesa->getRol(),
                        'ultima_actualizacion' => $mesa->getUltima_actualizacion(),
                    );
                    $session_Controller->setMesa($aMesa);
                    include_once 'Views/mesa.php';
                }else{
                    $ErrorLogin = "Usuario o contrasenas erroneos";
                    $usuarioError = $usuario;
                    $contraError = $password;
                    $rolError = $rol;
                    include_once 'Views/Ingresar.php';
                }   

            }else if($rol == "Supervisor"){
                if($sup->validarLogin($usuario,$password)){
                    $aSup = array(
                        'id_sup' => $sup->getId_sup(),
                        'nombre' => $sup->getNombre(),
                        'apellido' => $sup->getApellido(),
                        'email' => $sup->getEmail(),
                        'password' => $sup->getPassword(),
                        'rol' => $sup->getRol(),
                    );
                    $session_Controller->setSup($aSup);
                    include_once 'Views/supervisor.php';
                }else{
                    $ErrorLogin = "Usuario o contrasenas erroneos";
                    $usuarioError = $usuario;
                    $contraError = $password;
                    $rolError = $rol;
                    include_once 'Views/Ingresar.php';
                } 
                
            }else{
                    $ErrorLogin = "Seleccione rol";
                    $usuarioError = $usuario;
                    $contraError = $password;
                    $rolError = $rol;
                    include_once 'Views/Ingresar.php';
                include_once 'Views/Ingresar.php';
            }
               
        
    }else{
        include_once 'Views/Ingresar.php';
    }