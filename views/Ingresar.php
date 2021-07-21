<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>

    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="Public/Css/Login.css">
  
    </head>
<body>
    <div id="pagina" class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                 <div class="col-12 user-img">
                    <img src="Public/Imagenes/Avatar.png">
                 </div>
                 <div id="mensaje">

                 </div>
                 <form id="formulario_ingresar" class="col-12"  method="POST">
                    <div class="form-group">
                        <select id="rol" name="rol" class="form-control">
                            <option selected value="<?php echo $rolError ?>"><?php echo $rolError ?></option>
                            <option value="Administrador">Administrador</option>
                            <option value="Supervisor">Supervisor</option>
                            <option value="Cliente">Cliente</option>
                            <option value="Mesa">Mesa</option>
                        </select>  
                    </div>
                    <div class="form-group">
                         <input class="form-control" name="usuario" id="usuario" placeholder="Ingrese Usuario" value="<?php echo $usuarioError ?>" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="password" id="password" placeholder="Ingrese Contrasena" value="<?php echo $contraError ?>" required>
                    </div>
                    <div id='MensajeError'><?php
                        if(isset($ErrorLogin)){
                            echo $ErrorLogin;
                        }
                    ?></div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Ingresar</button><br>
                        <a href="portafolio/portafolio.html">Consultar Productos</a>                                 
                 </form>
             </div>
        </div>
    </div>

    
</body>
</html>