    <footer>
      <?php $contact_options = get_option('skeleton_theme_contact_options'); ?>

      <div class="container container-dark">
        <div class="row row-foot">
          <div class="col-1">
            <span class="footer-details text-white">
              &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?>
            </span>
          </div>
          <div class="col-2 text-right text-left-mobile">
            <span class="footer-details text-white">
              <?php wp_nav_menu(array('theme_location' => 'footer-menu')); ?>
            </span>
          </div>
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
