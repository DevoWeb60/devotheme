<?php [
    'this' => $_this,
    'title' => $title,
    'url' => $url,
] = $args; ?>

<p>
    <label for="<?= $_this->get_field_id('title') ?>">Titre</label>
    <input type="text" class="widefat" value="<?= esc_attr($title) ?>" name="<?= $_this->get_field_name('title') ?>" id="<?= $_this->get_field_id('title') ?>">
</p>
<p>
    <label for="<?= $_this->get_field_id('url') ?>">Identifiant de la vidéo Youtube</label>
    <input type="text" class="widefat" value="<?= esc_attr($url) ?>" name="<?= $_this->get_field_name('url') ?>" id="<?= $_this->get_field_id('url') ?>">
</p>