<?php


// CORE
require_once('utils/debug.php');
require_once('walker/CommentWalker.php');
require_once('class/Query.php');
require_once('class/Setup.php');
require_once('class/EnqueueAssets.php');
require_once('class/NavMenu.php');
require_once('class/AfterSwitchTheme.php');
require_once('class/Customize.php');
require_once('cron/cron.php');

// REWRITE
require_once('post-type/article/Article.php');

// FEATURES
require_once('options/agence/Agence.php');
require_once('metaboxes/sponso/Sponso.php');
require_once('post-type/bien/Bien.php');
require_once('taxonomy/sport/SportTaxonomy.php');
require_once('taxonomy/bien/BienTaxonomy.php');

// WIDGETS
require_once('widgets/youtube/YoutubeWidget.php');


// CORE 
devotheme\AfterSwitchTheme::register();
add_action('init', function () {
    // POST TYPES
    devotheme\Bien::register_post_type();

    // TAXONOMIES
    // POST
    devotheme\SportTaxonomy::register_taxonomy();
    // BIENS
    devotheme\BienTaxonomy::register_bien_type();
    devotheme\BienTaxonomy::register_dpe();
});
devotheme\Query::register();
devotheme\Setup::register();
devotheme\EnqueueAssets::register();
devotheme\NavMenu::register();


// REWRITE 
devotheme\Article::register();

// FEATURES
devotheme\SponsoMetaBox::register();
devotheme\Agence::register();

// CUSTOMIZE
devotheme\Customize::register();

// WIDGETS 
devotheme\YoutubeWidgetInit::register();

/**
 * @var wpdb $wpdb
 */
// global $wpdb;

// $results = $wpdb->get_results("SELECT name FROM {$wpdb->terms} WHERE slug='cyclisme'");
// dump($results);


// API REST 
add_action('rest_api_init', function () {
    register_rest_route('devotheme/v1', '/biens/(?P<id>\d+)', [
        'methods' => 'GET',
        'callback' => function (WP_REST_Request $request) {
            $postId = (int)$request->get_param('id');
            $post = get_post($postId);
            if ($post === null) {
                return new WP_Error('no_post', 'Aucun bien trouvé', ['status' => 404]);
            }
            return ["title" => $post->post_title];
        }
    ]);
});

function readData()
{
    $data = wp_cache_get('data', 'devotheme');
    if ($data === false) {
        var_dump("Je lis");
        $data = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'data');
        wp_cache_set('data', $data, 'devotheme', 60);
    }

    return $data;
}
// Extension : W3 Total Cache

if (isset($_GET['cachetest'])) {
    var_dump(readData());
    var_dump(readData());
    var_dump(readData());
    die();
}
