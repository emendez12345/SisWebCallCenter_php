<!-- quick email widget -->
<div id="seccion-direccion">
	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Gestión de direccion</i>
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
    
                <form class="form-horizontal" role="form"  id="fdireccion">


 					<div class="form-group">
                        <label class="control-label col-sm-2" for="id_direccion">Codigo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_direccion" name="id_direccion" placeholder="Ingrese Codigo"
                            value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="direccion1">Direccion1:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="direccion1" name="direccion1" placeholder="Ingrese Nombre"
                            value = "">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="direccion2">Direccion2:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="direccion2" name="direccion2" placeholder="Ingrese Apellido"
                            value = "">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-sm-2" for="distrito">Distrito:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="distrito" name="distrito" placeholder="Ingrese Usuario"
                            value = ""  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>
					
					<div class="form-group">
                        <label class="control-label col-sm-2" for="codigopostal">Codigo Postal:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="codigopostal" name="codigopostal" placeholder="Ingrese Contraseña"
                            value = ""  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>
					
					

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="telefono">Telefono:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese Telefono"
                            value = "">
                        </div>
					</div>
					
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="codiCiu">Ciudad: </label>
                        <div class="col-sm-10">
                            <select class="form-control" id="codiCiu" name="codiCiu">
                         
							</select>	
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