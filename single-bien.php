<?php get_header(); ?>

<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>
        <h1>
            Bien : <?php the_title(); ?>
            <?php the_terms(get_the_ID(), 'sport', '<small>(', ')</small><small>(', ')</small>') ?>
        </h1>
        <?php if (get_post_meta(get_the_ID(), devotheme\SponsoMetaBox::META_KEY, true)) : ?>
            <small><strong>Cet article est sponsorisé</strong></small>
        <?php endif; ?>
        <p>Par <?php the_author(); ?>, le <?php the_date(); ?></p>
        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="" style="width:100%;height:300px;object-fit:cover">
        <p><?php the_content(); ?></p>
    <?php endwhile ?>
<?php endif; ?>
<?php get_footer(); ?>