<?php

namespace devotheme;

use WP_Customize_Color_Control;
use WP_Customize_Manager;

class Customize
{

    public static function register()
    {
        add_action('customize_register', [self::class, 'customize_register']);
        add_action('customize_preview_init', [self::class, 'customize_script']);
    }

    public static function customize_script()
    {
        wp_enqueue_script('devotheme-customize', get_template_directory_uri() . '/assets/js/customize.js', ['jquery', 'customize-preview'], false, true);
    }

    public static function customize_register(WP_Customize_Manager $manager)
    {
        $manager->add_section('devotheme_apparence', [
            'title' => 'Apparence DevoTheme',
            'description' => 'Personnaliser l\'apparence du site',
        ]);

        self::colorControl($manager, 'header_background_color', [
            'label' => 'Couleur de fond du header',
            'section' => 'devotheme_apparence',
        ]);

        self::colorControl($manager, 'header_text_color', [
            'label' => 'Couleur du texte du header',
            'section' => 'devotheme_apparence',
        ]);

        self::colorControl($manager, 'footer_background_color', [
            'label' => 'Couleur de fond du footer',
            'section' => 'devotheme_apparence',
        ]);
    }

    private static function colorControl($manager, $id, $options)
    {
        $id = 'devotheme_' . $id;
        $manager->add_setting($id, [
            'default' => $options['default'] ?? '#000',
            'sanitize_callback' => $options['sanitize'] ?? 'sanitize_hex_color'
        ]);
        $manager->add_control(new WP_Customize_Color_Control($manager, $id, [
            'label' => $options['label'] ?? $id,
            'section' => $options['section'],
            'setting' => $id,
            'transport' => 'postMessage',
        ]));
    }
}
