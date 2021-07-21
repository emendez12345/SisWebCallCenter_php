var dt;

function direccion(){

    $("#contenido").on("click","a.editar",function(){
        $("#titulo").html("Editar direccion");
        //Recupera datos del fromulario
        var codigo = $(this).data("codigo");
        var ciudades;
         $("#nuevo-editar").load("./php/Direcciones/direccionEditar.php");
         $("#nuevo-editar").removeClass("hide");
         $("#nuevo-editar").addClass("show");
         $("#direccion").removeClass("show");
         $("#direccion").addClass("hide");
        $.ajax({
            type:"get",
            url:"./php/Direcciones/direccionControlador.php",
            data: {id_direccion: codigo, accion:'consultar'},
            dataType:"json"
            }).done(function(direccion) {        
                 if(direccion.respuesta === "no existe"){
                     swal({
                       type: 'error',
                       title: 'Oops...',
                       text: 'Pais no existe!!!!!'                         
                     })
                 } else {$('#id_direccion').val(direccion.id_direccion);
                        $('#direccion1').val(direccion.direccion1);
                        $('#direccion2').val(direccion.direccion2);
                        $('#distrito').val(direccion.distrito);
                        $('#codigopostal').val(direccion.codigopostal);
                        $('#telefono').val(direccion.telefono);
                        $('#ultimaactualizacion').val(direccion.ultimaactualizacion);
                        ciudades=direccion.codiCiu;
                        }
            }); 

            $.ajax({
                type:"get",
                url:"./php/Ciudades/ciudadControlador.php",
                data: {accion:'listar'},
                dataType:"json"
              }).done(function( resultado ) {                     
                 $("#codiCiu option").remove();
                 $.each(resultado.data, function (index, value) { 
                   
                   if(ciudades === value.codiCiu){
                     $("#codiCiu").append("<option selected value='" + value.codiCiu + "'>" + value.nomCiu + "</option>")
                   }else {
                     $("#codiCiu").append("<option value='" + value.codiCiu + "'>" + value.nomCiu + "</option>")
                   }
                 });
              });     
        })

        $("#contenido").on("click","button#actualizar",function(){
            var datos=$("#fdireccion").serialize();
            $.ajax({
               type:"get",
               url:"./php/Direcciones/direccionControlador.php",
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
                   $("#titulo").html("Listado direccion");
                   $("#nuevo-editar").html("");
                   $("#nuevo-editar").removeClass("show");
                   $("#nuevo-editar").addClass("hide");
                   $("#direccion").removeClass("hide");
                   $("#direccion").addClass("show")
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
            text: "¿Realmente desea borrar la el direccion con codigo : " + codigo + " ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "./php/Direcciones/direccionControlador.php",
                        data: {id_direccion: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'El direccion con codigo : ' + codigo + ' fue borrado',
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
        $("#titulo").html("Nuevo direccion");
        $("#nuevo-editar" ).load("./php/Direcciones/nuevoDireccion.php"); 
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#direccion").removeClass("show");
        $("#direccion").addClass("hide");
        $.ajax({
            type:"get",
            url:"./php/Ciudades/CiudadControlador.php",
            data: {accion:'listar'},
            dataType:"json"
          }).done(function( resultado ) {   
             //console.log(resultado.data)           
             $("#codiCiu option").remove()       
             $("#codiCiu").append("<option selecte value=''>Seleccione una Ciudad</option>")
             $.each(resultado.data, function (index, value) { 
               $("#codiCiu").append("<option value='" + value.codiCiu + "'>" + value.nomCiu + "</option>")
             });
          });
    })

    $("#contenido").on("click","button.btncerrar2",function(){
        $("#titulo").html("Listado direccion");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#direccion").removeClass("hide");
        $("#direccion").addClass("show");

    })

    $("#contenido").on("click","button.btncerrar",function(){
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })

    $("#contenido").on("click","button#grabar",function(){
      
      var datos=$("#fdireccion").serialize();
       $.ajax({
            type:"get",
            url:"./php/Direcciones/direccionControlador.php",
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
                $("#titulo").html("Listado direccion");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#direccion").removeClass("hide");
                $("#direccion").addClass("show")
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
  $("#titulo").html("Listado de direccion");
  dt = $("#tabla").DataTable({
        "ajax": "php/Direcciones/direccionControlador.php?accion=listar",
        "columns": [
                { "data": "id_direccion"},
                { "data": "direccion1"},
                { "data": "direccion2"},
                { "data": "distrito"},
                { "data": "codigopostal"},
                { "data": "telefono"},
                { "data": "nomCiu"},
                { "data": "ultimaactualizacion"},
                { "data": "id_direccion" ,render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },

            { "data": "id_direccion",

                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
  });
  direccion();
});
