var dt;

function ciudades(){

    $("#contenido").on("click","a.editar",function(){
        $("#titulo").html("Editar ciudad");
        //Recupera datos del fromulario
        var codigo = $(this).data("codigo");
        var paises;

         $("#nuevo-editar").load("./php/Ciudades/ciudadEditar.php");
         $("#nuevo-editar").removeClass("hide");
         $("#nuevo-editar").addClass("show");
         $("#ciudades").removeClass("show");
         $("#ciudades").addClass("hide");
        
         $.ajax({
            type:"get",
            url:"./php/Ciudades/ciudadControlador.php",
            data: {codiCiu: codigo, accion:'consultar'},
            dataType:"json"
            }).done(function(ciudad) {        
                 if(ciudad.respuesta === "no existe"){
                     swal({
                       type: 'error',
                       title: 'Oops...',
                       text: 'ciudad no existe!!!!!'                         
                     })
                 } else {
                        $('#codiCiu').val(ciudad.codiCiu);
                        $('#nomCiu').val(ciudad.nomCiu);
                        $('#ultima_actualizacion').val(ciudad.ultima_actualizacion);
                        paises=ciudad.codiPais
                 }
            });     
            $.ajax({
                type:"get",
                url:"./php/Paises/paisControlador.php",
                data: {accion:'listar'},
                dataType:"json"
              }).done(function( resultado ) {                     
                 $("#codiPais option").remove();
                 $.each(resultado.data, function (index, value) { 
                   
                   if(paises === value.codiPais){
                     $("#codiPais").append("<option selected value='" + value.codiPais + "'>" + value.nomPais + "</option>")
                   }else {
                     $("#codiPais").append("<option value='" + value.codiPais + "'>" + value.nomPais + "</option>")
                   }
                 });
              });
        })
    
        $("#contenido").on("click","button#actualizar",function(){
            var datos=$("#fCiudad").serialize();
            $.ajax({
               type:"get",
               url:"./php/Ciudades/ciudadControlador.php",
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
                   $("#titulo").html("Listado ciudades");
                   $("#nuevo-editar").html("");
                   $("#nuevo-editar").removeClass("show");
                   $("#nuevo-editar").addClass("hide");
                   $("#ciudades").removeClass("hide");
                   $("#ciudades").addClass("show")
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
                        url: "./php/Ciudades/ciudadControlador.php",
                        data: {codiCiu: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'El ciudad con codigo : ' + codigo + ' fue borrado',
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
        $("#titulo").html("Nuevo ciudad");
        $("#nuevo-editar" ).load("./php/Ciudades/nuevociudad.php"); 
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#ciudades").removeClass("show");
        $("#ciudades").addClass("hide");
        $.ajax({
            type:"get",
            url:"./php/Paises/paisControlador.php",
            data: {accion:'listar'},
            dataType:"json"
          }).done(function( resultado ) {   
             //console.log(resultado.data)           
             $("#codiPais option").remove()       
             $("#codiPais").append("<option selecte value=''>Seleccione un Pais</option>")
             $.each(resultado.data, function (index, value) { 
               $("#codiPais").append("<option value='" + value.codiPais + "'>" + value.nomPais + "</option>")
             });
          });
    })

    $("#contenido").on("click","button.btncerrar2",function(){
        $("#titulo").html("Listado ciudades");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#ciudades").removeClass("hide");
        $("#ciudades").addClass("show");

    })

    $("#contenido").on("click","button.btncerrar",function(){
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })

    $("#contenido").on("click","button#grabar",function(){
      
      var datos=$("#fCiudad").serialize();
       $.ajax({
            type:"get",
            url:"./php/Ciudades/ciudadControlador.php",
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
                $("#titulo").html("Listado ciudades");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#ciudades").removeClass("hide");
                $("#ciudades").addClass("show")
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
  $("#titulo").html("Listado de ciudades");
  dt = $("#tabla").DataTable({
        "ajax": "php/Ciudades/ciudadControlador.php?accion=listar",
        "columns": [
            { "data": "codiCiu"},
            { "data": "nomCiu"},
            { "data": "nomPais"},
            { "data": "ultima_actualizacion"}, 
            { "data": "codiCiu",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "codiCiu",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
  });
  ciudades();
});