var dt;

function roles(){

    $("#contenido").on("click","a.editar",function(){
        $("#titulo").html("Editar Rol");
        //Recupera datos del fromulario
        var codigo = $(this).data("codigo");
        var roles;
         $("#nuevo-editar").load("./php/Roles/rolesEditar.php");
         $("#nuevo-editar").removeClass("hide");
         $("#nuevo-editar").addClass("show");
         $("#roles").removeClass("show");
         $("#roles").addClass("hide");
        
         $.ajax({
            type:"get",
            url:"./php/Roles/rolesControlador.php",
            data: {id_rol: codigo, accion:'consultar'},
            dataType:"json"
            }).done(function(roles) {        
                 if(roles.respuesta === "no existe"){
                     swal({
                       type: 'error',
                       title: 'Oops...',
                       text: 'roles no existe!!!!!'                         
                     })
                 } else {
                        $('#id_rol').val(roles.id_rol);
                        $('#nomRol').val(roles.nomRol);
                        $('#ultima_actualizacion').val(roles.ultima_actualizacion);
                      
                 }
            });   
        })

        $("#contenido").on("click","button#actualizar",function(){
            var datos=$("#fMesa").serialize();
            $.ajax({
               type:"get",
               url:"./php/Roles/rolesControlador.php",
               data: datos,
               dataType:"json"
             }).done(function( resultado ) {
                 if(resultado.respuesta){
                   swal(
                       'Actualizado!',
                       'Se actualizaron los datos correctamente',
                       'success'
                   )     
                   dt.ajax.reload();
                   $("#titulo").html("Listado de roles");
                   $("#nuevo-editar").html("");
                   $("#nuevo-editar").removeClass("show");
                   $("#nuevo-editar").addClass("hide");
                   $("#roles").removeClass("hide");
                   $("#roles").addClass("show")
                } else {
                   swal({
                     type: 'error',
                     title: 'Oops...',
                     text: 'No se pudo realizar la edicion!'                         
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
                        url: "./php/Roles/rolesControlador.php",
                        data: {id_rol: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'El Rol con codigo : ' + codigo + ' fue borrado',
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
        $("#titulo").html("Nuevo Rol");
        $("#nuevo-editar" ).load("./php/Roles/nuevoRol.php"); 
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#roles").removeClass("show");
        $("#roles").addClass("hide");
        
    })

    $("#contenido").on("click","button.btncerrar2",function(){
        $("#titulo").html("Roles");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#roles").removeClass("hide");
        $("#roles").addClass("show");

    })

    $("#contenido").on("click","button.btncerrar",function(){
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })

    $("#contenido").on("click","button#grabar",function(){
      
      var datos=$("#fRol").serialize();
       $.ajax({
            type:"get",
            url:"./php/Roles/rolesControlador.php",
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
                $("#titulo").html("Listado Roles");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#roles").removeClass("hide");
                $("#roles").addClass("show")
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
  $("#titulo").html("Roles");
  dt = $("#tabla").DataTable({
        "ajax": "php/Roles/rolesControlador.php?accion=listar",
        "columns": [
            { "data": "id_rol"},
            { "data": "nomRol"}, 
            { "data": "ultima_actualizacion"}, 
            { "data": "id_rol",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "id_rol",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
  });
  roles();
});