<?php

namespace devotheme;

class AfterSwitchTheme
{
    public static function register()
    {
        add_action('after_switch_theme', [self::class, 'afterSwitchTheme']);
    }

    public static function afterSwitchTheme()
    {
        // add sport taxonomies
        $terms = ['Football', 'Basket Ball', 'Tennis', 'Rugby', 'Handball', 'Volley Ball', 'Cyclisme', 'Natation', 'Athlétisme', 'Golf'];
        foreach ($terms as $term) {
            wp_insert_term($term, 'sport');
        }

        // add biens post type
        wp_insert_post([
            'post_title' => 'Maison de 100m2',
            'post_content' => 'Une maison de 100m2 avec 3 chambres',
            'post_status' => 'publish',
            'post_type' => 'bien',
        ]);
        wp_insert_post([
            'post_title' => 'Appartement de 50m2',
            'post_content' => 'Un appartement de 50m2 avec 2 chambres',
            'post_status' => 'publish',
            'post_type' => 'bien',
        ]);

        // add posts 
        wp_insert_post([
            'post_title' => 'Mon premier article',
            'post_content' => 'Mon premier contenu',
            'post_status' => 'publish',
            'post_type' => 'post',
        ]);

        flush_rewrite_rules();
    }
}
