   <div id="seccion-mesa">
    <div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Gestion de Analistas</i>
        
        <!-- tools box -->
        <div class="pull-right box-tools">
        	<button class="btn btn-info btn-sm btncerrar2" data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
    </div>
    <div class="box-body">

		<div align ="center">
				<div id="actual"> 
				</div>
		</div>

        <div class="panel-group"><div class="panel panel-primary">
            <div class="panel-heading">Datos</div>
            <div class="panel-body">
    
                <form class="form-horizontal" role="form"  id="fMesa">


                <div class="form-group">
                        <label class="control-label col-sm-2" for="id_usu">Codigo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_usu" name="id_usu" placeholder="Ingrese Codigo"
                            value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>
					
					<div class="form-group">
                        <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Nombre"
                            value = ""  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="apellido">Apellido:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese apellido"
                            value = ""  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="usuario">Usuario:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese usuario"
                            value = ""  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="password">Password:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="password" name="password" placeholder="Ingrese password"
                            value = ""  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Ingrese email"
                            value = ""  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id_rol">Rol: </label>
                        <div class="col-sm-10">
                            <select class="form-control" id="id_rol" name="id_rol">
                         
							</select>	
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-2" for="ultima_actualizacion">Ultima_actualizacion:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ultima_actualizacion" name="ultima_actualizacion" placeholder="Ingrese ultima_actualizacion"
                            value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="actualizar" data-toggle="tooltip" title="Actualizar Analista" class="btn btn-primary">Actualizar</button>
                            <button type="button" id="cancelar" data-toggle="tooltip" title="Cancelar Edición" class="btn btn-success btncerrar2"> Cancelar </button>
                        </div>

                    </div>                    

					<input type="hidden" id="editar" value="editar" name="accion"/>
			</fieldset>

		</form>
	</div>
    <input type="hidden" id="pagina" value="editar" name="editar"/>
</div>