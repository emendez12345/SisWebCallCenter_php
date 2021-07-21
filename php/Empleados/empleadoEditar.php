   <div id="seccion-empleado">
    <div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Gestion de Empleado</i>
        
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
    
                <form class="form-horizontal" role="form"  id="fempleado">


                <div class="form-group">
                        <label class="control-label col-sm-2" for="codiEmple">Codigo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="codiEmple" name="codiEmple" placeholder="Ingrese Codigo"
                            value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>
					
					<div class="form-group">
                        <label class="control-label col-sm-2" for="usuEmple">Usuario:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="usuEmple" name="usuEmple" placeholder="Ingrese Usuario"
                            value = ""  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>
					
					<div class="form-group">
                        <label class="control-label col-sm-2" for="contraEmple">Contraseña:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="contraEmple" name="contraEmple" placeholder="Ingrese Contraseña"
                            value = ""  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>
					
					<div class="form-group">
                        <label class="control-label col-sm-2" for="codiFarm">Tienda:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="codiFarm" name="codiFarm" placeholder="Ingrese Empresa"
                            value = ""  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>
					
					<div class="form-group">
                        <label class="control-label col-sm-2" for="codiPais">Pais:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="codiPais" name="codiPais" placeholder="Ingrese Pais"
                            value = ""  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>
					
					<div class="form-group">
                        <label class="control-label col-sm-2" for="codiCiudad">Ciudad:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="codiCiudad" name="codiCiudad" placeholder="Ingrese Pais"
                            value = ""  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nomEmple">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nomEmple" name="nomEmple" placeholder="Ingrese Nombre"
                            value = "">
                        </div>
                    </div>
					
					
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="telEmple">Telefono:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telEmple" name="telEmple" placeholder="Ingrese Telefono"
                            value = "">
                        </div>
					</div>
					
					<div class="form-group">
                        <label class="control-label col-sm-2" for="dirEmple">Direccion:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="dirEmple" name="dirEmple" placeholder="Ingrese Direccion"
                            value = "">
                        </div>
					</div>
					
					<div class="form-group">
                        <label class="control-label col-sm-2" for="emailEmple">Email:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="emailEmple" name="emailEmple" placeholder="Ingrese Email"
                            value = "">
                        </div>
                    </div>

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="actualizar" data-toggle="tooltip" title="Actualizar Empleado" class="btn btn-primary">Actualizar</button>
                            <button type="button" id="cancelar" data-toggle="tooltip" title="Cancelar Edición" class="btn btn-success btncerrar2"> Cancelar </button>
                        </div>

                    </div>                    

					<input type="hidden" id="editar" value="editar" name="accion"/>
			</fieldset>

		</form>
	</div>
    <input type="hidden" id="pagina" value="editar" name="editar"/>
</div>