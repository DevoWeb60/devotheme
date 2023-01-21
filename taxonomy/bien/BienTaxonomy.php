<?php

namespace devotheme;

class BienTaxonomy
{
    public static function register_bien_type()
    {
        register_taxonomy('bien_type', 'bien', [
            'labels' => [
                'name' => 'Type de bien',
                'singular_name' => 'Type de bien',
                'plural_name' => 'Types de bien',
                'search_items' => 'Rechercher des types de bien',
                'all_items' => 'Tous les types de bien',
                'edit_item' => 'Editer le type de bien',
                'update_item' => 'Mettre à jour le type de bien',
                'add_new_item' => 'Ajouter un nouveau type de bien',
                'new_item_name' => 'Ajouter un nouveau type de bien',
                'menu_name' => 'Types de bien',
                'not_found' => 'Aucun type de bien trouvé',
            ],
            'show_in_rest' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
        ]);
    }

    public static function register_dpe()
    {
        register_taxonomy('dpe', 'bien', [
            'labels' => [
                'name' => 'DPE',
                'singular_name' => 'DPE',
                'plural_name' => 'DPE',
                'search_items' => 'Rechercher des DPE',
                'all_items' => 'Tous les DPE',
                'edit_item' => 'Editer le DPE',
                'update_item' => 'Mettre à jour le DPE',
                'add_new_item' => 'Ajouter un nouveau DPE',
                'new_item_name' => 'Ajouter un nouveau DPE',
                'menu_name' => 'DPE',
                'not_found' => 'Aucun DPE trouvé',
            ],
            'show_in_rest' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
        ]);
    }
}
