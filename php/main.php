</head>

<body>
        <div id="root">
                <main id="main">
                        <section class="container_section_principal">
                                <div class="container_logo_page">
                                        <img id="logo" src="<?php echo $link_base_root ?>/logo/logo_populary.png" alt="Logo Populary" title="Populary">
                                </div>

                                <div class="container_video">
                                        <video id="video" autoplay="true"></video>
                                        <button id="button_capture">Capturar Fotografía</button>
                                        <div class="container_answer_status">
                                                <p id="status_fetchApi"></p>
                                        </div>

                                        <?php
                                        include("./save_images/icon_preloader.php");
                                        ?>

                                        <div class="container_canvas">
                                                <canvas id="canvas" style="display: none"></canvas>
                                        </div>
                                </div>

                                <div class="container_link_images">
                                        <a class="item_link_images" href="<?php echo $link_base_root ?>/images_users/images.php">
                                                Todas las imágenes
                                        </a>
                                </div>
                        </section>
                </main>
        </div>