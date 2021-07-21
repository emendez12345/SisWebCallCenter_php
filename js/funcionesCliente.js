var dt;

function clientes(){

    $("#contenido").on("click","a.editar",function(){
        $("#titulo").html("Editar Cliente");
        //Recupera datos del fromulario
        var codigo = $(this).data("codigo");
        var tiendas;
        var direcciones;
         $("#nuevo-editar").load("./php/Clientes/clienteEditar.php");
         $("#nuevo-editar").removeClass("hide");
         $("#nuevo-editar").addClass("show");
         $("#clientes").removeClass("show");
         $("#clientes").addClass("hide");
        $.ajax({
            type:"get",
            url:"./php/Clientes/clienteControlador.php",
            data: {codiCli: codigo, accion:'consultar'},
            dataType:"json"
            }).done(function(cliente) {        
                 if(cliente.respuesta === "no existe"){
                     swal({
                       type: 'error',
                       title: 'Oops...',
                       text: 'Cliente no existe!!!!!'                         
                     })
                 } else {
                        $('#codiCli').val(cliente.codiCli);
                        $('#nomCli').val(cliente.nomCli);
                        $('#apeCli').val(cliente.apeCli);
                        $('#email').val(cliente.email);
                        $('#activo').val(cliente.activo);
                        $('#fecha_creacion').val(cliente.fecha_creacion);
                        $('#usuario').val(cliente.usuario);
                        $('#password').val(cliente.password);
                        $('#ultima_actualizacion').val(cliente.ultima_actualizacion);
                        tienda=cliente.tienda;
                        direccion=cliente.direccion;         
                 }
            }); 
            $.ajax({
              type:"get",
              url:"./php/Tiendas/tiendaControlador.php",
              data: {accion:'listar'},
              dataType:"json"
            }).done(function( resultado ) {                     
               $("#id_tienda option").remove();
               $.each(resultado.data, function (index, value) { 
                 
                 if(tiendas === value.id_tienda){
                   $("#id_tienda").append("<option selected value='" + value.id_tienda + "'>" + value.nomTiend + "</option>")
                 }else {
                   $("#id_tienda").append("<option value='" + value.id_tienda + "'>" + value.nomTiend + "</option>")
                 }
               });
            }); 

            $.ajax({
                type:"get",
                url:"./php/Direcciones/direccionControlador.php",
                data: {accion:'listar'},
                dataType:"json"
              }).done(function( resultado ) {                     
                 $("#id_direccion option").remove();
                 $.each(resultado.data, function (index, value) { 
                   
                   if(direcciones === value.id_direccion){
                     $("#id_direccion").append("<option selected value='" + value.id_direccion + "'>" + value.direccion1 + "</option>")
                   }else {
                     $("#id_direccion").append("<option value='" + value.id_direccion + "'>" + value.direccion1 + "</option>")
                   }
                 });
              }); 

        })

        $("#contenido").on("click","button#actualizar",function(){
            var datos=$("#fcliente").serialize();
            $.ajax({
               type:"get",
               url:"./php/Clientes/clienteControlador.php",
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
                   $("#titulo").html("Listado clientes");
                   $("#nuevo-editar").html("");
                   $("#nuevo-editar").removeClass("show");
                   $("#nuevo-editar").addClass("hide");
                   $("#clientes").removeClass("hide");
                   $("#clientes").addClass("show")
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
            text: "¿Realmente desea borrar la el cliente con codigo : " + codigo + " ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "./php/Clientes/clienteControlador.php",
                        data: {codiCli: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'El cliente con codigo : ' + codigo + ' fue borrado',
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
        $("#titulo").html("Nuevo Cliente");
        $("#nuevo-editar" ).load("./php/Clientes/nuevoCliente.php"); 
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#clientes").removeClass("show");
        $("#clientes").addClass("hide");
        
        $.ajax({
          type:"get",
          url:"./php/Tiendas/tiendaControlador.php",
          data: {accion:'listar'},
          dataType:"json"
        }).done(function( resultado ) {   
           //console.log(resultado.data)           
           $("#id_tienda option").remove()       
           $("#id_tienda").append("<option selecte value=''>Seleccione una Tienda</option>")
           $.each(resultado.data, function (index, value) { 
             $("#id_tienda").append("<option value='" + value.id_tienda + "'>" + value.nomTiend + "</option>")
           });
        });

        $.ajax({
            type:"get",
            url:"./php/Direcciones/direccionControlador.php",
            data: {accion:'listar'},
            dataType:"json"
          }).done(function( resultado ) {   
             //console.log(resultado.data)           
             $("#id_direccion option").remove()       
             $("#id_direccion").append("<option selecte value=''>Seleccione una direccion</option>")
             $.each(resultado.data, function (index, value) { 
               $("#id_direccion").append("<option value='" + value.id_direccion + "'>" + value.direccion1 + "</option>")
             });
          });      
        
    })

    $("#contenido").on("click","button.btncerrar2",function(){
        $("#titulo").html("Listado clientes");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#clientes").removeClass("hide");
        $("#clientes").addClass("show");

    })

    $("#contenido").on("click","button.btncerrar",function(){
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })

    $("#contenido").on("click","button#grabar",function(){
      
      var datos=$("#fcliente").serialize();
       $.ajax({
            type:"get",
            url:"./php/Clientes/clienteControlador.php",
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
                $("#titulo").html("Listado clientes");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#clientes").removeClass("hide");
                $("#clientes").addClass("show")
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
  $("#titulo").html("Listado de Clientes");
  dt = $("#tabla").DataTable({
        "ajax": "php/Clientes/clienteControlador.php?accion=listar",
        "columns": [
            { "data": "codiCli"} ,
            { "data": "nomCli"} ,
            { "data": "apeCli"} ,
            { "data": "email"} ,
            { "data": "activo"} ,
            { "data": "fecha_creacion"} ,
            { "data": "usuario" },
            { "data": "password" },
            { "data": "ultima_actualizacion" },
            { "data": "nomTiend" },
            { "data": "direccion1" },
            { "data": "codiCli",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "codiCli",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
  });
  clientes();
});