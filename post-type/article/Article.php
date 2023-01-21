<?php

namespace devotheme;

class Article
{

    public static function register()
    {
        add_filter('manage_posts_columns', [self::class, 'manage_columns']);
        add_filter('manage_posts_custom_column', [self::class, 'manage_columns_content'], 10, 2);
    }

    public static function manage_columns_content($column, $postId)
    {
        if ($column === 'sponso') {
            $sponso = get_post_meta($postId, SponsoMetaBox::META_KEY, true);
            if ($sponso === strval(SponsoMetaBox::IS_SPONSORED)) {
                echo 'Oui';
            } else {
                echo 'Non';
            }
        }
        if ($column === 'thumbnail') {
            the_post_thumbnail('thumbnail', $postId);
        }
    }

    public static function manage_columns($columns)
    {
        return [
            'cb' => $columns['cb'],
            'thumbnail' => 'Miniature',
            'title' => $columns['title'],
            'sponso' => 'Sponsorisé',
            'taxonomy-sport' => $columns['taxonomy-sport'],
            'date' => $columns['date'],
        ];
    }
}
