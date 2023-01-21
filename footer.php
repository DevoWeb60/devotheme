 </div> <!-- CONTAINER -->
 <footer class="d-flex align-items-center justify-content-between custom_footer_bg">
     <?php wp_nav_menu([
            'theme_location' => 'footer',
            'container' => false,
            'menu_class' => 'd-flex justify-content-between',
        ]) ?>
     <div>
         <p><?= get_option('agence_horaire') ?></p>
     </div>
     <div>
         <p>© 2020 - <?= date('Y') ?> - Tous droits réservés</p>
         <p>Créé par <a href="https://www.devoweb.fr">DevoWeb</a></p>
     </div>
 </footer>
 <?php wp_footer(); ?>
 </body>

 </html>