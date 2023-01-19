<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <p><?php the_content(); ?></p>
        <a href="<?= get_post_type_archive_link('post') ?>">Archives</a>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>