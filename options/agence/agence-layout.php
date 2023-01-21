<h2>Gestion de l'agence</h2>
<p>Bienvenue sur l'administration de votre agence immobilière</p>
<form action="options.php" method="post">
    <?php
    settings_fields($args['group']);
    do_settings_sections($args['group']);
    submit_button()
    ?>
</form>