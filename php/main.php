</head>

<body>
        <div class="app">
                <main id="main">
                        <div class="container_video">
                                <video id="video" autoplay="true"></video>
                                <button id="button_capture">Capturar Fotografía</button>
                                <div class="container_answer_status">
                                        <p id="status_fetchApi"></p>
                                </div>
                                <?php
                                include("./save_images/icon_preloader.php");
                                ?>
                                <div class="container_link_images">
                                        <a class="item_link_images" href="<?php echo $link_base_root ?>/images_users/images.php">
                                                Todas las imágenes
                                        </a>
                                </div>
                                <div class="container_canvas">
                                        <canvas id="canvas" style="display: none"></canvas>
                                </div>
                        </div>
                </main>
        </div>