<?php

namespace devotheme;

class Bien
{
    public static function register()
    {
        add_filter('manage_bien_posts_columns', [self::class, 'manage_columns']);
        add_filter('manage_bien_posts_custom_column', [self::class, 'manage_columns_content'], 10, 2);
    }

    public static function manage_columns_content($column, $postId)
    {
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
            'date' => $columns['date'],
        ];
    }

    public static function register_post_type()
    {
        register_post_type('bien', [
            'label' => 'Biens',
            'labels' => [
                'name' => 'Biens',
                'singular_name' => 'Bien',
                'all_items' => 'Tous les biens',
                'add_new_item' => 'Ajouter un nouveau bien',
                'edit_item' => 'Editer le bien',
                'new_item' => 'Nouveau bien',
                'view_item' => 'Voir le bien',
                'view_items' => 'Voir les biens',
                'search_items' => 'Rechercher parmi les biens',
                'not_found' => 'Aucun bien trouvé',
                'not_found_in_trash' => 'Aucun bien dans la corbeille',
                'parent_item_colon' => 'Bien parent',
                'featured_image' => 'Image du bien',
                'set_featured_image' => 'Définir l\'image de mise en avant',
                'remove_featured_image' => 'Supprimer l\'image de mise en avant',
                'use_featured_image' => 'Utiliser comme image de mise en avant',
                'insert_into_item' => 'Insérer dans le bien',
                'uploaded_to_this_item' => 'Téléverser dans le bien',
                'filter_items_list' => 'Filtrer la liste des biens',
                'items_list_navigation' => 'Navigation de la liste des biens',
                'items_list' => 'Liste des biens',
                'attributes' => 'Attributs des biens',
                'name_admin_bar' => 'Biens',
            ],
            'description' => 'Tous sur les biens immobiliers',
            'public' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-building',
            'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
            'show_in_rest' => true,
            'has_archive' => true,
        ]);
    }
}
