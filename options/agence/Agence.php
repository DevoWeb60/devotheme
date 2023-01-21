<?php

namespace devotheme;

class Agence
{
    const GROUP = "agence_options";
    const TIME_SECTION = "agence_options_section_time";

    public static function register()
    {
        add_action('admin_menu', [self::class, 'addMenuPage']);
        add_action('admin_init', [self::class, 'registerSettings']);
        add_action('admin_enqueue_scripts', [self::class, 'registerScripts']);
    }

    public static function registerScripts($suffix)
    {
        if ($suffix === 'toplevel_page_agence') {
            wp_register_style('flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css', [], false);
            wp_register_script('flatpickr', 'https://cdn.jsdelivr.net/npm/flatpickr', [], false, true);
            wp_enqueue_script('devotheme_admin', get_template_directory_uri() . '/assets/js/agence.js', ['flatpickr'], false, true);
            wp_enqueue_style('flatpickr');
        }
    }

    public static function addMenuPage()
    {
        add_menu_page(
            'Gestion de l\'agence',
            'Agence',
            'manage_options',
            'agence',
            [self::class, 'render']
        );
    }

    public static function registerSettings()
    {
        register_setting(self::GROUP, 'agence_horaire', [
            'default' => '9h-18h du lundi au vendredi',
        ]);
        register_setting(self::GROUP, 'agence_date');

        add_settings_section(self::TIME_SECTION, 'Horaires', function () {
            echo 'Gérez les horaires de votre agence';
        }, self::GROUP);

        add_settings_field('agence_options_horaire', 'Horaires d\'ouverture', function () { ?>
            <textarea name="agence_horaire" cols="30" rows="10" style="width:100%" ;><?= esc_html(get_option('agence_horaire')) ?></textarea>
        <?php }, self::GROUP, self::TIME_SECTION);

        add_settings_field('agence_options_date', 'Date d\'ouverture', function () { ?>
            <input type="text" name="agence_date" value="<?= esc_attr(get_option('agence_date')) ?>" class="devotheme_datepicker" />
<?php }, self::GROUP, self::TIME_SECTION);
    }

    public static function render()
    {
        get_template_part('options/agence/agence', 'layout', [
            'group' => self::GROUP
        ]);
    }
}
