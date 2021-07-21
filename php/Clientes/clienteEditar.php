   <div id="seccion-cliente">
    <div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Gestion de Cliente</i>
        
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
    
                <form class="form-horizontal" role="form"  id="fcliente">


                <div class="form-group">
                        <label class="control-label col-sm-2" for="codiCli">Codigo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="codiCli" name="codiCli" placeholder="Ingrese Codigo"
                            value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>
					
					<div class="form-group">
                        <label class="control-label col-sm-2" for="nomCli">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nomCli" name="nomCli" placeholder="Ingrese Usuario"
                            value = ""  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>
					
					<div class="form-group">
                        <label class="control-label col-sm-2" for="apeCli">Apellido:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="apeCli" name="apeCli" placeholder="Ingrese Contraseña"
                            value = ""  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>
					
					<div class="form-group">
                        <label class="control-label col-sm-2" for="email">email:</label>
                        <div class="col-sm-10">
                         <input type="text" class="form-control" id="email" name="email" placeholder="Ingrese Usuario"
                            value = ""  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>
					
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="activo">Activo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="activo" name="activo" placeholder="Ingrese Email"
                            value = "">
                        </div>
                    </div>
                    	
					<div class="form-group">
                        <label class="control-label col-sm-2" for="fecha_creacion">Fecha creacion:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fecha_creacion" name="fecha_creacion" placeholder="Ingrese Email"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="usuario">Usuario:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese Nombre"
                            value = "">
                        </div>
                    </div>
					
					
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="password">Contraseña:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="password" name="password" placeholder="Ingrese Telefono"
                            value = "">
                        </div>
					</div>
								
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id_tienda">Tienda:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="id_tienda" name="id_tienda">
                         
							</select>	
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id_direccion">Direccion:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="id_direccion" name="id_direccion">
                         
							</select>	
                        </div>
                    </div>

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="actualizar" data-toggle="tooltip" title="Actualizar Cliente" class="btn btn-primary">Actualizar</button>
                            <button type="button" id="cancelar" data-toggle="tooltip" title="Cancelar Edición" class="btn btn-success btncerrar2"> Cancelar </button>
                        </div>

                    </div>                    

					<input type="hidden" id="editar" value="editar" name="accion"/>
			</fieldset>

		</form>
	</div>
    <input type="hidden" id="pagina" value="editar" name="editar"/>
</div>