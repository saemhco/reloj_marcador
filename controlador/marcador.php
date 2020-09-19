<?php 

if(isset($_POST['dni'])){

// abrimos la sesión cURL
$ch = curl_init();
date_default_timezone_set('America/Lima');

$dni= $_POST['dni'];

// abrimos la sesión cURL
$ch = curl_init();
 
// definimos la URL a la que hacemos la petición
curl_setopt($ch, CURLOPT_URL,"https://asistenciasunheval.javaheros.com/apicel/agregar_asistencia");
// indicamos el tipo de petición: POST
curl_setopt($ch, CURLOPT_POST, TRUE);

// definimos cada uno de los parámetros
$array= array('dni' =>$dni,'hora'=>date("H:i:s"));

//curl_setopt($ch, CURLOPT_POSTFIELDS, "dni=22416611&hora=13:13:13");
curl_setopt($ch, CURLOPT_POSTFIELDS, $array);
 
// recibimos la respuesta y la guardamos en una variable
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$remote_server_output = curl_exec ($ch);
 
// cerramos la sesión cURL
curl_close ($ch);
 
// por ejemplo, los mostramos
print_r($remote_server_output);

$nombre=date("Y-m-d")."txt";
$file = fopen("log/".$nombre, "a");
//fwrite($file, "Añadimos línea 1" . PHP_EOL);
fwrite($file, $remote_server_output.PHP_EOL);
fclose($file);

}
else {
   echo '<img src="../img/pajarito.gif" style="	width: 100%;
   object-fit: none;
   border: 3px solid rgba(255, 255, 255, 0);">';
}
?>