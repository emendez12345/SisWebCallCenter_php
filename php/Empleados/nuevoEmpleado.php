<!-- quick email widget -->
<div id="seccion-empleado">
	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Gestión de empleado</i>
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
                        <label class="control-label col-sm-2" for="CodiEmple">Codigo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="CodiEmple" name="CodiEmple" placeholder="Ingrese Codigo"
                            value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
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
                        <label class="control-label col-sm-2" for="apellEmple">Apellido:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="apellEmple" name="apellEmple" placeholder="Ingrese Apellido"
                            value = "">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-sm-2" for="usuario">Usuario:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese Usuario"
                            value = ""  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>
					
					<div class="form-group">
                        <label class="control-label col-sm-2" for="password">Contraseña:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="password" name="password" placeholder="Ingrese Contraseña"
                            value = ""  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>
					
					

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="jefe_personal_id">Jefe Personal:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jefe_personal_id" name="jefe_personal_id" placeholder="Ingrese Telefono"
                            value = "">
                        </div>
					</div>
					
					<div class="form-group">
                        <label class="control-label col-sm-2" for="id_direccion">Direccion:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_direccion" name="id_direccion" placeholder="Ingrese Direccion"
                            value = "">
                        </div>
					</div>
					
					<div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Ingrese Email"
                            value = "">
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
                        <label class="control-label col-sm-2" for="ultima_actualizacion">Ultima actualizacion:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ultima_actualizacion" name="ultima_actualizacion" placeholder="Ingrese Email"
                            value = "">
                        </div>
                    </div>

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip" title="Grabar Empleado">Grabar Empleado</button>
                            <button type="button" id="cerrar" class="btn btn-success btncerrar2" data-toggle="tooltip" title="Cancelar">Cancelar</button>
                        </div>
                    </div>

					<input type="hidden" id="nuevo" value="nuevo" name="accion"/>
			</fieldset>

		</form>
	</div>
</div>