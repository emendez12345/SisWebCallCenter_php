var dt;

function empleados(){

    $("#contenido").on("click","a.editar",function(){
        $("#titulo").html("Editar Empleado");
        //Recupera datos del fromulario
        var codigo = $(this).data("codigo");
        var pais;
        var ciudad;
         $("#nuevo-editar").load("./php/Empleados/empleadoEditar.php");
         $("#nuevo-editar").removeClass("hide");
         $("#nuevo-editar").addClass("show");
         $("#empleados").removeClass("show");
         $("#empleados").addClass("hide");
        $.ajax({
            type:"get",
            url:"./php/Empleados/empleadoControlador.php",
            data: {CodiEmple: codigo, accion:'consultar'},
            dataType:"json"
            }).done(function(empleado) {        
                 if(empleado.respuesta === "no existe"){
                     swal({
                       type: 'error',
                       title: 'Oops...',
                       text: 'Comuna no existe!!!!!'                         
                     })
                 } else {
                        $('#CodiEmple').val(empleado.CodiEmple);
                        $('#nomEmple').val(empleado.nomEmple);
                        $('#apellEmple').val(empleado.apellEmple);
                        $('#usuario').val(empleado.usuario);
                        $('#password').val(empleado.password);
                    //    $('#id_tienda').val(empleado.id_tienda);
                        $('#jefe_personal_id').val(empleado.jefe_personal_id);
                   //     $('#codiPais').val(empleado.codiPais);
                    //    $('#codiCiudad').val(empleado.codiCiudad);
                        $('#id_direccion').val(empleado.id_direccion);
                        $('#email').val(empleado.email);
                        $('#activo').val(empleado.activo);
                        $('#ultimaactualizacion').val(empleado.ultimaactualizacion);
                        
                 }
            });   
     /*       $.ajax({
                type:"get",
                url:"./php/Tienda/TiendaControlador.php",
                data: {accion:'listar'},
                dataType:"json"
              }).done(function( resultado ) {                     
                 $("#id_tienda option").remove();
                 $.each(resultado.data, function (index, value) { 
                   
                   if(tienda === value.id_tienda){
                     $("#id_tienda").append("<option selected value='" + value.id_tienda + "'>" + value.nomTiend + "</option>")
                   }else {
                     $("#id_tienda").append("<option value='" + value.id_tienda + "'>" + value.nomTiend + "</option>")
                   }
                 });
              });   */
        })

        $("#contenido").on("click","button#actualizar",function(){
            var datos=$("#fempleado").serialize();
            $.ajax({
               type:"get",
               url:"./php/Empleados/empleadoControlador.php",
               data: datos,
               dataType:"json"
             }).done(function( resultado ) {
                 if(resultado.respuesta){
                   swal(
                       'Actualizado!',
                       'Se actaulizaron los datos correctamente',
                       'success'
                   )     
                   dt.ajax.reload();
                   $("#titulo").html("Listado Empleados");
                   $("#nuevo-editar").html("");
                   $("#nuevo-editar").removeClass("show");
                   $("#nuevo-editar").addClass("hide");
                   $("#empleados").removeClass("hide");
                   $("#empleados").addClass("show")
                } else {
                   swal({
                     type: 'error',
                     title: 'Oops...',
                     text: 'Something went wrong!'                         
                   })
               }
           });
       })

    $("#contenido").on("click","a.borrar",function(){
        //Recupera datos del formulario
        var codigo = $(this).data("codigo");

        swal({
            title: '¿Está seguro?',
            text: "¿Realmente desea borrar la el empleado con codigo : " + codigo + " ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "./php/Empleados/empleadoControlador.php",
                        data: {CodiEmple: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'El empleado con codigo : ' + codigo + ' fue borrado',
                                'success'
                            )     
                            dt.ajax.reload();                            
                        } else {
                            swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'                        
                            })
                        }
                    });
                    
                    request.fail(function( jqXHR, textStatus ) {
                        swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!' + textStatus                          
                        })
                    });
                }
        })

    });

    $("#contenido").on("click","button#nuevo",function(){
        $("#titulo").html("Nuevo Empleado");
        $("#nuevo-editar" ).load("./php/Empleados/nuevoEmpleado.php"); 
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#empleados").removeClass("show");
        $("#empleados").addClass("hide");

  /*    $.ajax({
            type:"get",
            url:"./php/Tienda/TiendaControlador.php",
            data: {accion:'listar'},
            dataType:"json"
          }).done(function( resultado ) {   
             //console.log(resultado.data)           
             $("#id_tienda option").remove()       
             $("#id_tienda").append("<option selecte value=''>Seleccione una Tienda</option>")
             $.each(resultado.data, function (index, value) { 
               $("#id_tienda").append("<option value='" + value.id_tienda + "'>" + value.nomTiend + "</option>")
             });
          });*/
    })

    $("#contenido").on("click","button.btncerrar2",function(){
        $("#titulo").html("Listado Empleados");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#empleados").removeClass("hide");
        $("#empleados").addClass("show");

    })

    $("#contenido").on("click","button.btncerrar",function(){
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })

    $("#contenido").on("click","button#grabar",function(){
      
      var datos=$("#fempleado").serialize();
       $.ajax({
            type:"get",
            url:"./php/Empleados/empleadoControlador.php",
            data: datos,
            dataType:"json"
          }).done(function(resultado) {
              if(resultado.respuesta){
                swal(
                    'Grabado!!',
                    'El registro se grabó correctamente',
                    'success'
                )     
                dt.ajax.reload();
                $("#titulo").html("Listado Empleados");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#empleados").removeClass("hide");
                $("#empleados").addClass("show")
             } else {
                swal({
                  type: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong!'                         
                })
            }
        });
    });
}

$(document).ready(() => {
  $("#contenido").off("click", "a.editar");
  $("#contenido").off("click", "button#actualizar");
  $("#contenido").off("click","a.borrar");
  $("#contenido").off("click","button#nuevo");
  $("#contenido").off("click","button#grabar");
  $("#titulo").html("Listado de Empleados");
  dt = $("#tabla").DataTable({
        "ajax": "php/Empleados/empleadoControlador.php?accion=listar",
        "columns": [
            { "data": "CodiEmple"} ,
            { "data": "nomEmple" },
            { "data": "apellEmple" },
            { "data": "usuario"} ,
            { "data": "password"} ,
            { "data": "jefe_personal_id"} ,
            { "data": "direccion1"} ,
            { "data": "email" },
            { "data": "activo"},
            { "data": "id_tienda"},  
            { "data": "ultima_actualizacion"} ,
            { "data": "CodiEmple",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "CodiEmple",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
  });
  empleados();
});