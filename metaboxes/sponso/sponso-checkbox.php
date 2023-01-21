        <input type="hidden" name="<?= $args['meta-key'] ?>" value="0">
        <input type="checkbox" name="<?= $args['meta-key'] ?>" id="devothemesponso" value="<?= $args['sponsorized'] ?>" <?php checked($args['value'], '1'); ?>>
        <label for="devothemesponso">Cet article est-il sponsorisé ?</label>