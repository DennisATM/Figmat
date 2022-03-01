<?php  

// Llamando a los campos
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$region = $_POST['region'];
$comuna = $_POST['comuna'];
$mensaje = $_POST['mensaje'];

// Archivo adjunto
if($_FILES["archivo"]){
    $nombre_base = basename($_FILES["archivo"]["name"]);
    $nombre_final = date("m-d-y"). "-". date("h-i-s"). "-". $nombre_base;
    $ruta="archivos/" . $nombre_final;
    $subirarchivo = move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta);   
    $adjunto="Este correo tiene adjunto el archivo ". $ruta. " ,revisar en la carpeta archivos del servidor"; 
}
else{
    $adjunto="";
}


// Datos para el correo
$destinatario = "administracion@figmat.cl";
$asunto = "Contacto desde nuestra web";

$carta = "De: $nombre \n";
$carta .= "Correo: $correo \n";
$carta .= "Telefono: $telefono \n";
$carta .= "Region: $region \n";
$carta .= "Comuna: $comuna \n";
$carta .= "Mensaje: $mensaje";
$carta .= $adjunto;


// Enviando Mensaje
mail($destinatario, $asunto, $carta);
header('Location:index.html');

?>