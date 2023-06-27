<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/675d4b23c2.js" crossorigin="anonymous"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand fw-bold" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#header-nav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="header-nav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main_menu',
                        'menu_class' => 'navbar-nav ms-auto text-center text-grey gap-3 mt-1 fw-bold',
                        'container' => false,
                    ));
                    ?>
                    <ul class="navbar-nav ms-auto text-center mt-1 lg:mt-0">
                        <button class="btn btn-primary border-0 p-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Start Applying</button>
                    </ul>
                </div>
            </div>
        </nav>
    </header>