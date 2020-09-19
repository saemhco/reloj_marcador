function realizaProceso(){
        dni=$("#dni").val();
        if(dni==null || dni ==''){
            return false;
        }
        
        var parametros = {
                "dni" : dni,
        };
        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'controlador/marcador.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                beforeSend: function () {
                        $("#msj_ok").html("Marcando asistencia.., espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        var jsonData = JSON.parse(response);
                        $("#dni").val('');
                        $("#dni").focus();
                        if(jsonData.state){
                            $(".resultado").html("");
                            $("#usuario").html(jsonData.cas);
                            $("#msj_ok").html(jsonData.message);
                            if(jsonData.hora_ingreso){
                                $("#ingreso").html("Entrada: " + jsonData.hora_ingreso);
                            }
                            if(jsonData.hora_salida){
                                $("#salida").html("Salida: " + jsonData.hora_salida); 
                            }
                        }else{
                            $("#msj_bad").html(jsonData.message);
                        }
                        alert(jsonData.message);
                        console.log(jsonData);
                                
                       
                },
                error: function(response){
                    console.log('hubo error',response);
                }
        });
}