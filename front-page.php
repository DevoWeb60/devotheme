<?php get_header(); ?>
<div class="row">
        <div class="col-md-8">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <h1><?php the_title(); ?></h1>
                                <p><?php the_content(); ?></p>
                                <a href="<?= get_post_type_archive_link('post') ?>">Archives</a>
                <?php endwhile;
                endif; ?>
        </div>
        <div class="col-md-4">
                <?= get_sidebar('homepage') ?>
        </div>
</div>
<?php get_footer(); ?>