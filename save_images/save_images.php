<?php
    include("../functions_querys/functions_querys.php");

    $imagenCodificada = file_get_contents("php://input"); //Obtener la imagen
    if(strlen($imagenCodificada) <= 0) {
        exit("No se recibió ninguna imagen");
    }

    //La imagen traerá al inicio data:image/png;base64, cosa que debemos remover
    $imagenCodificadaLimpia = str_replace("data:image/png;base64,", "", urldecode($imagenCodificada));

    //Venía en base64 pero sólo la codificamos así para que viajara por la red, ahora la decodificamos y
    //todo el contenido lo guardamos en un archivo
    $imagenDecodificada = base64_decode($imagenCodificadaLimpia);

    // nombre de la carpeta de la imagenes
    $name_file_images = "../images/";

    //Calcular un nombre único
    $name_archive = "foto_".uniqid().".png";

    // nombre de la carpeta + nombre del archivo unico  
    $nombreImagenGuardada = $name_file_images.$name_archive;

    $value = file_put_contents($nombreImagenGuardada, $imagenDecodificada);
    if(!$value){
        exit("no se pudo subir");
    }else{
        // capturar la fecha y hora del navegador

        date_default_timezone_set('America/Lima');
        $DateAndTime = date('m-d-Y h:i:s a', time());  

        insert_name_images($name_archive,$DateAndTime);
        exit("si se puso subir");
    }
?>
