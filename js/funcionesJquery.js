function Inicio(){
	$("#opciones a").click(function(e){
     	e.preventDefault();
        var url = $(this).attr("href");
        $.post( url,function(resultado) {
			if(url=="Controllers/Logout.php"){
				window.location.href = url;
			}else{
				if(url!="#")
        			$("#contenedor").removeClass("hide");
        			$("#contenedor").addClass("show");
                	$("#contenido").html(resultado);
			}
        		
        });
     });
}
