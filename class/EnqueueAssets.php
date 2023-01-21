<?php

namespace devotheme;

class EnqueueAssets
{

    public static function register()
    {
        add_action('wp_enqueue_scripts', [self::class, 'global']);
        add_action('admin_enqueue_scripts', [self::class, 'admin']);
    }

    public static function global()
    {
        wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css');
        wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js', [], false, true);
    }

    public static function admin()
    {
        wp_enqueue_style('admin', get_template_directory_uri() . '/assets/css/admin.css');
    }
}
