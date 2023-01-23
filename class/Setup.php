<?php

namespace devotheme;

class Setup
{

    public static function register()
    {
        add_action('after_setup_theme', [self::class, 'setup']);
        add_filter('rest_authentication_errors', [self::class, 'devotheme_API'], 9);
        add_filter('rest_authentication_errors', [self::class, 'privateAPI']);
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
        load_theme_textdomain('devotheme', get_template_directory() . '/languages');
    }

    public static function privateAPI($result)
    {
        if (true === $result || is_wp_error($result)) {
            return $result;
        }

        if (!is_user_logged_in()) {
            return new \WP_Error(
                'rest_not_logged_in',
                __('You are not currently logged in.'),
                array('status' => 401)
            );
        }
        return $result;
    }

    /**
     * @var WP $wp
     */
    public static function devotheme_API($result)
    {
        global $wp;
        if (strpos($wp->query_vars['rest_route'], 'devotheme/v1') !== false) {
            return true;
        }
        return $result;
    }
}
