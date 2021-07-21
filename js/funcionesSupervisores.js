var dt;

function sup(){

    $("#contenido").on("click","a.editar",function(){
        $("#titulo").html("Editar Supervisor");
        //Recupera datos del fromulario
        var codigo = $(this).data("codigo");
        var roles;
         $("#nuevo-editar").load("./php/Supervisores/supervisorEditar.php");
         $("#nuevo-editar").removeClass("hide");
         $("#nuevo-editar").addClass("show");
         $("#sup").removeClass("show");
         $("#sup").addClass("hide");
        
         $.ajax({
            type:"get",
            url:"./php/Supervisores/supervisorControlador.php",
            data: {id_sup: codigo, accion:'consultar'},
            dataType:"json"
            }).done(function(sup) {        
                 if(sup.respuesta === "no existe"){
                     swal({
                       type: 'error',
                       title: 'Oops...',
                       text: 'sup no existe!!!!!'                         
                     })
                 } else {
                        $('#id_sup').val(sup.id_sup);
                        $('#nombre').val(sup.nombre);
                        $('#apellido').val(sup.apellido);
                        $('#email').val(sup.email);
                        $('#usuario').val(sup.usuario);
                        $('#password').val(sup.password);
                        $('#ultima_actualizacion').val(sup.ultima_actualizacion);
                         roles=sup.id_rol;
                 }
            }); 
            $.ajax({
                type:"get",
                url:"./php/Roles/rolesControlador.php",
                data: {accion:'listar'},
                dataType:"json"
              }).done(function( resultado ) {                     
                 $("#id_rol option").remove();
                 $.each(resultado.data, function (index, value) { 
                   
                   if(roles === value.id_rol){
                     $("#id_rol").append("<option selected value='" + value.id_rol + "'>" + value.nomRol + "</option>")
                   }else {
                     $("#id_rol").append("<option value='" + value.id_rol + "'>" + value.nomRol + "</option>")
                   }
                 });
              });   
        })

        $("#contenido").on("click","button#actualizar",function(){
            var datos=$("#fSup").serialize();
            $.ajax({
               type:"get",
               url:"./php/Supervisores/supervisorControlador.php",
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
                   $("#titulo").html("Listado supervisores");
                   $("#nuevo-editar").html("");
                   $("#nuevo-editar").removeClass("show");
                   $("#nuevo-editar").addClass("hide");
                   $("#sup").removeClass("hide");
                   $("#sup").addClass("show")
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
                        url: "./php/Supervisores/supervisorControlador.php",
                        data: {id_sup: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'El pais con codigo : ' + codigo + ' fue borrado',
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
        $("#titulo").html("Nuevo Supervisor");
        $("#nuevo-editar" ).load("./php/Supervisores/nuevoSupervisor.php"); 
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#sup").removeClass("show");
        $("#sup").addClass("hide");

        $.ajax({
            type:"get",
            url:"./php/Roles/rolesControlador.php",
            data: {accion:'listar'},
            dataType:"json"
          }).done(function( resultado ) {   
             //console.log(resultado.data)           
             $("#id_rol option").remove()       
             $("#id_rol").append("<option selecte value=''>Seleccione un Rol</option>")
             $.each(resultado.data, function (index, value) { 
               $("#id_rol").append("<option value='" + value.id_rol + "'>" + value.nomRol + "</option>")
             });
          });
        
    })

    $("#contenido").on("click","button.btncerrar2",function(){
        $("#titulo").html("Supervisores");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#sup").removeClass("hide");
        $("#sup").addClass("show");

    })

    $("#contenido").on("click","button.btncerrar",function(){
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })

    $("#contenido").on("click","button#grabar",function(){
      
      var datos=$("#fSup").serialize();
       $.ajax({
            type:"get",
            url:"./php/Supervisores/supervisorControlador.php",
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
                $("#titulo").html("Listado Supervisores");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#sup").removeClass("hide");
                $("#sup").addClass("show")
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
  $("#titulo").html("Supervisores");
  dt = $("#tabla").DataTable({
        "ajax": "php/Supervisores/supervisorControlador.php?accion=listar",
        "columns": [
            { "data": "id_sup"},
            { "data": "nombre"},
            { "data": "apellido"}, 
            { "data": "email"}, 
            { "data": "usuario"}, 
            { "data": "password"},
            { "data": "nomRol"},
            { "data": "ultima_actualizacion"},  
            { "data": "id_sup",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "id_sup",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
  });
  sup();
});