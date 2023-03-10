<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <style>
        .custom_header_bg {
            background-color: <?= get_theme_mod('devotheme_header_background_color') ?>;
        }

        .custom_color_text {
            color: <?= get_theme_mod('devotheme_header_text_color') ?> !important;
        }

        .custom_footer_bg {
            background-color: <?= get_theme_mod('devotheme_footer_background_color') ?>;
        }
    </style>
</head>

<body>
    <nav class="navbar custom_header_bg navbar-expand-lg" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand custom_color_text" href="#"><?php bloginfo('name'); ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php wp_nav_menu([
                'theme_location' => 'header',
                'container' => false,
                'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
            ]) ?>
        </div>
        <!--
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    -->
    </nav>
    <div class="container py-5">