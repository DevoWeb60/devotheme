<?php

namespace devotheme;

class YoutubeWidget extends \WP_Widget
{
    public function __construct()
    {
        parent::__construct('youtube_widget', 'Youtube Widget', [
            'description' => 'Widget pour afficher une vidéo youtube'
        ]);
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        if (isset($instance['title'])) {
            $title = apply_filters('widget_title', $instance['title']);
            echo $args['before_title'] . $title . $args['after_title'];
        }
        if (isset($instance['url'])) {
            $url = $instance['url'];
            echo '<iframe width="100%" height="auto" src="https://www.youtube.com/embed/' . esc_attr($url) . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
        }
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $title = $instance['title'] ?? '';
        $url = $instance['url'] ?? '';
        get_template_part('widgets/youtube/youtubewidget', 'form', [
            'this' => $this,
            'title' => $title,
            'url' => $url,
        ]);
    }

    public function update($newInstance, $oldInstance)
    {
        return [
            'title' => $newInstance['title'],
            'url' => $newInstance['url'],
        ];
    }
}

class YoutubeWidgetInit
{
    public static function register()
    {
        add_action('widgets_init', [self::class, 'widgets_init']);
    }

    public static function widgets_init()
    {
        register_widget(YoutubeWidget::class);
        register_sidebar([
            'id' => 'sidebar-homepage',
            'name' => __('Sidebar Accueil', 'devotheme'),
            'before_sidebar' =>
            '<div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 380px;">
        <a href="/" class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
                <span class="fs-5 fw-semibold">' . __('SideBar Accueil', 'devotheme') . '</span>
        </a>
        <div class="list-group list-group-flush border-bottom scrollarea">',
            'after_sidebar' => '</div></div>',
            'before_widget' => '<div class="list-group-item list-group-item-action py-3 lh-sm">',
            'after_widget' => '</div>',
            'class' => 'd-flex w-100 align-items-center justify-content-between'
        ]);
    }
}
