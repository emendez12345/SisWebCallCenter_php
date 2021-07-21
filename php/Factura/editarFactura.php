   <div id="seccion-Factura">
<div class="box-header">
    <i class="fa fa-building" aria-hidden="true">Gestion de Factura</i>
    
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

            <form class="form-horizontal" role="form"  id="fFactura"><div class="form-group">
                    <label class="control-label col-sm-2" for="codiFac">codiFac:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="codiFac" name="codiFac" placeholder="Ingrese codiFac"
                        value = "" data-validation="length alphanumeric" data-validation-length="3-12">
                    </div>
                </div><div class="form-group">
                    <label class="control-label col-sm-2" for="ciuFac">ciuFac:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ciuFac" name="ciuFac" placeholder="Ingrese ciuFac"
                        value = "" data-validation="length alphanumeric" data-validation-length="3-12">
                    </div>
                </div><div class="form-group">
                    <label class="control-label col-sm-2" for="paisFac">paisFac:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="paisFac" name="paisFac" placeholder="Ingrese paisFac"
                        value = "" data-validation="length alphanumeric" data-validation-length="3-12">
                    </div>
                </div><div class="form-group">
                    <label class="control-label col-sm-2" for="codiPro">codiPro:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="codiPro" name="codiPro" placeholder="Ingrese codiPro"
                        value = "" data-validation="length alphanumeric" data-validation-length="3-12">
                    </div>
                </div><div class="form-group">
                    <label class="control-label col-sm-2" for="cantFac">cantFac:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="cantFac" name="cantFac" placeholder="Ingrese cantFac"
                        value = "" data-validation="length alphanumeric" data-validation-length="3-12">
                    </div>
                </div><div class="form-group">
                    <label class="control-label col-sm-2" for="precioFac">precioFac:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="precioFac" name="precioFac" placeholder="Ingrese precioFac"
                        value = "" data-validation="length alphanumeric" data-validation-length="3-12">
                    </div>
                </div><div class="form-group">
                    <label class="control-label col-sm-2" for="totalFac">totalFac:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="totalFac" name="totalFac" placeholder="Ingrese totalFac"
                        value = "" data-validation="length alphanumeric" data-validation-length="3-12">
                    </div>
                </div><div class="form-group">        
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
