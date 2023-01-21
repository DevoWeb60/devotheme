<?php get_header(); ?>

<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>
        <h1>
            <?php the_title(); ?>
            <?php the_terms(get_the_ID(), 'sport', '<small>(', ')</small><small>(', ')</small>') ?>
        </h1>
        <?php if (get_post_meta(get_the_ID(), devotheme\SponsoMetaBox::META_KEY, true)) : ?>
            <small><strong>Cet article est sponsorisé</strong></small>
        <?php endif; ?>
        <p>Par <?php the_author(); ?>, le <?php the_date(); ?></p>
        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="" style="width:100%;height:300px;object-fit:cover">
        <p><?php the_content(); ?></p>
    <?php endwhile ?>

<?php else : ?>
    <h1>Aucun article</h1>
<?php endif; ?>


<?php
if (comments_open() || get_comments_number()) :
    comments_template();
endif;
?>


<?php
$sports = array_map(function ($term) {
    return $term->term_id;
}, get_the_terms(get_post(), 'sport'));
$query = new WP_Query([
    'post__not_in' => [get_the_ID()],
    'post_type' => 'post',
    'posts_per_page' => 3,
    'orderby' => 'rand',
    'tax_query' => [
        [
            'taxonomy' => 'sport',
            'field' => 'terms_id',
            'terms' => $sports
        ]
    ],
    'meta_query' => [
        [
            'key' => devotheme\SponsoMetaBox::META_KEY,
            'compare' => 'EXISTS'
        ]
    ]
]);
?>

<h2>Articles relatif</h2>
<div class="row">
    <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
            <div class="col-sm-4">
                <?php get_template_part('parts/card', 'post'); ?>
            </div>
    <?php endwhile;
        wp_reset_postdata();
    endif; ?>
</div>
<?php get_footer(); ?>