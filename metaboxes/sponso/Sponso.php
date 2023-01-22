<?php

namespace devotheme;

class SponsoMetaBox
{
    const META_KEY = 'devotheme_sponsoring';
    const NONCE = '_devotheme_sponsoring_nonce';
    const IS_SPONSORED = 1;

    public static function register()
    {
        add_action('add_meta_boxes', [self::class, 'add'], 10, 2);
        add_action('save_post', [self::class, 'save']);
    }

    public static function add($postType, $post)
    {
        if ($postType === 'post' && current_user_can('publish_posts', $post)) {
            add_meta_box(
                self::META_KEY,
                'Sponsorisé',
                [self::class, 'render'],
                'post',
                "side"
            );
        }
    }

    public static function save($post_id)
    {
        if (
            array_key_exists(self::META_KEY, $_POST)
            && current_user_can('publish_posts', $post_id)
            && wp_verify_nonce($_POST[self::NONCE], self::NONCE)
        ) {
            if ($_POST[self::META_KEY] == 0) {
                delete_post_meta($post_id, self::META_KEY);
            } else {
                update_post_meta($post_id, self::META_KEY, self::IS_SPONSORED);
            }
        }
    }

    public static function render($post)
    {
        $value = get_post_meta($post->ID, self::META_KEY, true);
        wp_nonce_field(self::NONCE, self::NONCE);
        get_template_part('metaboxes/sponso/sponso', 'checkbox', [
            'value' => $value,
            'meta-key' => self::META_KEY,
            'sponsorized' => self::IS_SPONSORED,
        ]);
    }
}
