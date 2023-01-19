<?php get_header(); ?>

<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="" style="width:100%;height:300px;object-fit:cover">
        <p><?php the_content(); ?></p>
    <?php endwhile ?>

<?php else : ?>
    <h1>Aucun article</h1>
<?php endif; ?>

<?php get_footer(); ?>