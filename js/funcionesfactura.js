var dt;

function Factura(){

    

    $("#contenido").on("click","a.editar",function(){
        $("#titulo").html("Editar Factura");
        //Recupera datos del fromulario
        var codigo = $(this).data("codigo");
         $("#nuevo-editar").load("./php/Factura/editarFactura.php");
         $("#nuevo-editar").removeClass("hide");
         $("#nuevo-editar").addClass("show");
         $("#Factura").removeClass("show");
         $("#Factura").addClass("hide");
        $.ajax({
            type:"get",
            url:"./php/Factura/FacturaControlador.php",
            data: {codiFactura: codigo, accion:'consultar'},
            dataType:"json"
            }).done(function(Factura) {        
                 if(Factura.respuesta === "no existe"){
                     swal({
                       type: 'error',
                       title: 'Oops...',
                       text: 'Pais no existe!!!!!'                         
                     })
                 } else {$('#codiFac').val(Factura.codiFac);
                        $('#ciuFac').val(Factura.ciuFac);
                        $('#paisFac').val(Factura.paisFac);
                        $('#codiPro').val(Factura.codiPro);
                        $('#cantFac').val(Factura.cantFac);
                        $('#precioFac').val(Factura.precioFac);
                        $('#totalFac').val(Factura.totalFac);
                        }
            });   
               
        })

        $("#contenido").on("click","button#actualizar",function(){
            var datos=$("#fFactura").serialize();
            $.ajax({
               type:"get",
               url:"./php/Factura/FacturaControlador.php",
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
                   $("#titulo").html("Listado Factura");
                   $("#nuevo-editar").html("");
                   $("#nuevo-editar").removeClass("show");
                   $("#nuevo-editar").addClass("hide");
                   $("#Factura").removeClass("hide");
                   $("#Factura").addClass("show")
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
            text: "¿Realmente desea borrar la el Factura con codigo : " + codigo + " ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "./php/Factura/FacturaControlador.php",
                        data: {codiFactura: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'El Factura con codigo : ' + codigo + ' fue borrado',
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
        $("#titulo").html("Nuevo Factura");
        $("#nuevo-editar" ).load("./php/Factura/nuevoFactura.php"); 
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#Factura").removeClass("show");
        $("#Factura").addClass("hide");
        document.getElementById("codiPro").addEventListener("keyup", valorAmortizacion);
        
    })

    $("#contenido").on("click","button.btncerrar2",function(){
        $("#titulo").html("Listado Factura");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#Factura").removeClass("hide");
        $("#Factura").addClass("show");

    })

    $("#contenido").on("click","button.btncerrar",function(){
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })

    $("#contenido").on("click","button#grabar",function(){
      
      var datos=$("#fFactura").serialize();
       $.ajax({
            type:"get",
            url:"./php/Factura/FacturaControlador.php",
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
                $("#titulo").html("Listado Factura");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#Factura").removeClass("hide");
                $("#Factura").addClass("show")
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
function valorAmortizacion(){
    $('#totalFac').val("Hola");
    }
$(document).ready(() => {
  $("#contenido").off("click", "a.editar");
  $("#contenido").off("click", "button#actualizar");
  $("#contenido").off("click","a.borrar");
  $("#contenido").off("click","button#nuevo");
  $("#contenido").off("click","button#grabar");
  $("#titulo").html("Listado de Factura");
  dt = $("#tabla").DataTable({
        "ajax": "php/Factura/FacturaControlador.php?accion=listar",
        "columns": [{ "data": "codiFac"},
                { "data": "ciuFac"},
                { "data": "paisFac"},
                { "data": "codiPro"},
                { "data": "cantFac"},
                { "data": "precioFac"},
                { "data": "totalFac"},
                { "data": "codiFac" ,render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },

            { "data": "codiFac",

                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
  });
  Factura();
});
