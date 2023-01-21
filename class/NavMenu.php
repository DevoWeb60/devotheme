<?php

namespace devotheme;

class NavMenu
{

    public static function register()
    {
        add_filter('nav_menu_css_class', [self::class, 'menu_class']);
        add_filter('nav_menu_link_attributes', [self::class, 'menu_link_attributes']);
    }

    public static function menu_class($classes)
    {
        $classes[] = 'nav-item';
        return $classes;
    }

    public static function menu_link_attributes($attrs)
    {
        $attrs['class'] = 'nav-link';
        return $attrs;
    }
}
