<!-- quick email widget -->
<div id="seccion-roles">
	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Gestión de Roles</i>
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
    
                <form class="form-horizontal" role="form"  id="fRol">


 					<div class="form-group">
                        <label class="control-label col-sm-2" for="id_rol">Codigo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_rol" name="id_rol" placeholder="Ingrese Codigo"
                            value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>
					
					<div class="form-group">
                        <label class="control-label col-sm-2" for="nomRol">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nomRol" name="nomRol" placeholder="Ingrese Nombre"
                            value = ""  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="ultima_actualizacion">Ultima_actualizacion:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ultima_actualizacion" name="ultima_actualizacion" placeholder="Ingrese ultima_actualizacion"
                            value = "" readonly="true" data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
					</div>
					

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip" title="Grabar Pais">Grabar Rol</button>
                            <button type="button" id="cerrar" class="btn btn-success btncerrar2" data-toggle="tooltip" title="Cancelar">Cancelar</button>
                        </div>
                    </div>

					<input type="hidden" id="nuevo" value="nuevo" name="accion"/>
			</fieldset>

		</form>
	</div>
</div>