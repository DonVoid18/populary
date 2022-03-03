<?php
function insert_name_images($name_image,$date_image)
{
    include("../conexion_bd/conexion.php");
    try {
        // se insertó correctamente la imagen
        // importante a la hora de subir al 000webhost tenemos que quitar el id_image
        $sql = "INSERT INTO images (url_image,date_image)
            VALUES ('$name_image','$date_image')";
        $conn->exec($sql);
    } catch (PDOException $error) {
        echo "No se pudo insertar la imagen " . $error;
    }
    $conn = null; //cerramos la conexión a la base de datos
}
function view_images()
{
    include("../conexion_bd/conexion.php");
    try {
        $obtenerImages = "SELECT * FROM images";
        $stmt = $conn->prepare($obtenerImages);
        $stmt->execute();
        $a = $stmt->fetchAll(PDO::FETCH_OBJ);
        if ($stmt->rowCount() > 0) {
            $name_file = "/populary";
            $link = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $name_file;
            foreach ($a as $result) {
                echo "<div class='container_image'>
                        <div class='container_item_image'>
                            <img class='item_image' src='$link/images/$result->url_image' alt='Imagen Server' loading='lazy'>
                        </div>
                        <div class='container_description_image'>
                            <p class='text_date_image'>
                                $result->date_image
                            </p>
                        </div>
                    </div>";
            }
        } else {
            echo "No hay fotos en el servidor";
        }
    } catch (PDOException $error) {
        echo $error;
    }
    $conn = null;
}
?>