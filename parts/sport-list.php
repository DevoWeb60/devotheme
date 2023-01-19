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