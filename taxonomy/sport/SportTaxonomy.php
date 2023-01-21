<?php

namespace devotheme;

class SportTaxonomy
{

    public static function register_taxonomy()
    {
        register_taxonomy('sport', 'post', [
            'labels' => [
                'name' => 'Sport',
                'singular_name' => 'Sport',
                'plural_name' => 'Sports',
                'search_items' => 'Rechercher des sports',
                'all_items' => 'Tous les sports',
                'edit_item' => 'Editer le sport',
                'update_item' => 'Mettre à jour le sport',
                'add_new_item' => 'Ajouter un nouveau sport',
                'new_item_name' => 'Ajouter un nouveau sport',
                'menu_name' => 'Sports',
                'not_found' => 'Aucun sport trouvé',
            ],
            'show_in_rest' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
        ]);
    }
}
