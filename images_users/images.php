<?php
require_once("../php/head.php");
echo "<link rel='stylesheet' href=" . $link_base_root . "/styles/main.css>";
?>

<body>

    <div class="app">
        <div class="container_title_images">
            <h1 class="title_container_images">
                Imágenes del servidor
            </h1>
        </div>
        <div class="container_images">
            <?php
            require_once("../functions_querys/functions_querys.php");
            view_images();
            ?>
        </div>
    </div>
</body>

</html>