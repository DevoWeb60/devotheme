<div class="card" style="width: 18rem;">
    <?php the_post_thumbnail('card-image', ['class' => 'card-img-top', 'alt' => '', 'style' => 'height: auto;']); ?>
    <div class="card-body">
        <h5 class="card-title"><?php the_title(); ?></h5>
        <?php if (get_post_meta(get_the_ID(), devotheme\SponsoMetaBox::META_KEY, true)) : ?>
            <h6 style="color:#555" class="badge text-bg-warning">Sponsorisé</h6>
        <?php endif; ?>
        <h6 class="card-subtitle mb-2 text-muted"><?php the_terms(get_the_ID(), 'sport'); ?></h6>
        <p class="card-text"><?php the_content(); ?></p>
        <a href="<?php the_permalink(); ?>" class="card-link">Lire l'article</a>
    </div>
</div>