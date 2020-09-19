<html>
<head>
	<meta charset="utf-8">
	<title>CRUD BD</title>
	<link rel="shortcut icon" type="image/x-icon" href="../img/pajarito.jpg" />
</head>
<body>
    <img src="../img/pajarito.jpg" width="100px;"><br>
</body>
</html>


<?php
    $dni=imprimir_bd();
   function imprimir_bd (){
        $dni=[];
        if (file_exists("bd.txt")){
            $fp = fopen("bd.txt", "r");
            while (!feof($fp)){
                $linea = trim(fgets($fp));
                if($linea==null || $linea==""){
                    continue;
                }
                $dni[]=$linea;
                echo $linea."<br>";
            }
            print_r(['type'=>'0,1','data'=>'dni']);
            fclose($fp);
        }
        echo "<br> ...> ";
        return $dni;
    }
   

if(isset($_GET["type"]) && isset($_GET["data"]) ){
    echo "type = ".$_GET["type"]." && "."data = ".$_GET["data"]."<br><br>";
    switch($_GET["type"]){
        case "0": 
            if (in_array($_GET["data"], $dni)) {
                $file = fopen("bd.txt", "w");
                foreach($dni as $value){
                    if($value==null || $value=="" || $value==$_GET["data"]){
                        continue;
                    }
                    fwrite($file,$value.PHP_EOL);
                }
                fclose($file);
            }
            break;
        case "1": 
            if (!in_array($_GET["data"],$dni)) {
                $file = fopen("bd.txt", "a");
                $escribir=$_GET["data"];
                fwrite($file,$escribir.PHP_EOL);
                fclose($file);
            }
            break;
        default : break;   
    }
    imprimir_bd();
}
?>