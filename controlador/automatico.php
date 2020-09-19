<?php 


?>
<html>
    <h1 id="msj_ok"></h1>
    <div class="text">
  <hr />
  <h2>Texto:</h2>
</div>
   
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript"> 
    function Enviar(dni) { 
        var parametros = {
                "dni" : dni,
        };
        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'marcador.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                beforeSend: function () {
                       console.log("Marcando asistencia.., espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        var jsonData = JSON.parse(response);
                        console.log(jsonData);
                },
                error: function(response){
                    console.log('hubo error',response);
                }
        });
    }
    function Cargar(){
        $.ajax({
                    url : "bd.txt",
                    dataType: "text",
                    success : function (data) 
                    {
                        var lineas = data.split('\n');
                        // for(var dni of lineas) {
                        //     setTimeout(() => {
                        //         Enviar(dni.trim());
                        //     }, 20000);
                        // }
                        lineas.forEach(function (el) {
                            
                            setTimeout(function(){
                                console.log(el);
                                Enviar(el.trim());
                                }, 4000);
                            });
                    }
        });
    } 
    Cargar();
</script>

