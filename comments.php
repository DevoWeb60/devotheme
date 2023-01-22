<?php

use devotheme\CommentWalker;

$count = absint(get_comments_number());
?>

<?php if ($count > 0) : ?>
    <h2><?= sprintf(_n('%s Commentaire', '%s Commentaires', $count, 'devotheme'), $count); ?></h2>
<?php else :  ?>
    <h2>Aucun commentaire</h2>
<?php endif; ?>

<?php if (comments_open()) : ?>
    <?php comment_form(['title_reply' => '']); ?>
<?php endif; ?>
<?php wp_list_comments(['style' => 'div', 'walker' => new CommentWalker(), 'avatar_size' => 72]); ?>
<?php paginate_comments_links(); ?>