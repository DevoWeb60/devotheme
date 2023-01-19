 </div> <!-- CONTAINER -->
 <footer>
     <?php wp_nav_menu([
            'theme_location' => 'footer',
            'container' => false,
            'menu_class' => 'd-flex justify-content-between',
        ]) ?>
     <?php wp_footer(); ?>
 </footer>
 </body>

 </html>