<?php get_header();
$currentSport = get_queried_object();
?>
<h1><?= $currentSport->name ?></h1>
<p><?= $currentSport->description ?></p>

<?php
$sports = get_terms([
    'taxonomy' => 'sport',
    'hide_empty' => false,
]); ?>
<ul class="nav nav-pills">
    <?php foreach ($sports as $sport) : ?>
        <li class="nav-item">
            <a class="nav-link badge <?= is_tax('sport', $sport->term_id) ? "text-bg-primary" : "text-bg-dark" ?> mx-1 my-5" href="<?php echo get_term_link($sport); ?>">
                <?php echo $sport->name; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<?php if (have_posts()) : ?>
    <div class="row">
        <?php while (have_posts()) : the_post(); ?>
            <div class="col-sm-4">
                <?php get_template_part('parts/card', 'post'); ?>
            </div>
        <?php endwhile ?>
    </div>
<?php else : ?>
    <h1>Aucun article</h1>
<?php endif; ?>

<?php get_footer(); ?>