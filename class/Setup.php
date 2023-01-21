<?php

namespace devotheme;

class Setup
{

    public static function register()
    {
        add_action('after_setup_theme', [self::class, 'setup']);
    }

    public static function setup()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('html5');
        add_theme_support('menus');
        register_nav_menu('header', 'Menu principal');
        register_nav_menu('footer', 'Pied de page');
        add_image_size('card-image', 350, 215, true);
    }
}
