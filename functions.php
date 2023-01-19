<?php

function devotheme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'Menu principal');
    register_nav_menu('footer', 'Pied de page');
    add_image_size('card-image', 350, 215, true);
}

function devotheme_init()
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

function devotheme_register_assets()
{
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css');
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js', [], false, true);
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
}

function devotheme_menu_class($classes)
{
    $classes[] = 'nav-item';
    return $classes;
}

function devotheme_menu_link_attributes($attrs)
{
    $attrs['class'] = 'nav-link';
    return $attrs;
}

function devotheme_document_title_parts($title)
{
    unset($title['tagline']);
    return $title;
}

function devotheme_title_separator()
{
    return '|';
}


add_action('after_setup_theme', 'devotheme_setup');
add_action('init', 'devotheme_init');
add_action('wp_enqueue_scripts', 'devotheme_register_assets');

add_filter('document_title_separator', 'devotheme_title_separator');
add_filter('document_title_parts', 'devotheme_document_title_parts');
add_filter('nav_menu_css_class', 'devotheme_menu_class');
add_filter('nav_menu_link_attributes', 'devotheme_menu_link_attributes');

require_once('metaboxes/sponso.php');
SponsoMetaBox::register();
