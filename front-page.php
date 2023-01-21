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

<!-- <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 380px;">
        <a href="/" class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
                <svg class="bi pe-none me-2" width="30" height="24">
                        <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-5 fw-semibold">List group</span>
        </a>
        <div class="list-group list-group-flush border-bottom scrollarea">
                <a href="#" class="list-group-item list-group-item-action active py-3 lh-sm" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                                <strong class="mb-1">List group item heading</strong>
                                <small>Wed</small>
                        </div>
                        <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.</div>
                </a>
        </div>
</div> -->
<?php get_footer(); ?>