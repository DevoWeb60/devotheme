<?php

namespace devotheme;

class Query
{

    public static function register()
    {
        add_action('pre_get_posts', [self::class, 'pre_get_posts']);
        add_filter('query_vars', [self::class, 'query_vars']);
    }

    public static function pre_get_posts(\WP_Query $query)
    {
        if (!is_admin() || !$query->is_main_query() || !is_home()) {
            return;
        }
        if (get_query_var('sponso') === strval(SponsoMetaBox::IS_SPONSORED)) {
            $meta_query = $query->get('meta_query', []);
            $meta_query[] = [
                'key' => SponsoMetaBox::META_KEY,
                'compare' => 'EXISTS',
            ];
            $query->set('meta_query', $meta_query);
        }
    }

    public static function query_vars($params)
    {
        $params[] = 'sponso';
        return $params;
    }
}
