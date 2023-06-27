<div class="py-4 container">
  <footer class="footer d-flex flex-column flex-md-row p-3 bg-dark text-dark justify-content-between align-md-center">
   
    <div>
      <p>
        <?php echo bloginfo('name') ?>
        <br />
        <span class="text-xs">
          <?php echo get_theme_mod('job_mingle_content'); ?>
        </span>
      </p>
      <?php
      $social_links = get_theme_mod('job_mingle_social_links', '');
      if ($social_links) {
        $links = explode(',', $social_links);
        foreach ($links as $link) {
          $trimmed_link = trim($link);
          // Get the social media platform name from the URL
          $platform = get_social_media_platform($trimmed_link);
          echo '<a class="p-2" href="' . $trimmed_link . '" target="_blank"><i class="fab ' . get_social_icon($platform) . '"></i></a>';
        }
      }
      ?>
    </div>

    <?php if (has_nav_menu('footer_menu_1')) : ?>
      <div class="d-flex flex-column">
        <span class=" d-block text-grey text-center">Services</span>
        <?php
        wp_nav_menu(array(
          'theme_location' => 'footer_menu_1',
          'menu_class' => 'footer-link',
        ));
        ?>
      </div>
    <?php endif; ?>

    <?php if (has_nav_menu('footer_menu_2')) : ?>
      <div class="d-flex flex-column">
        <span class="d-block text-grey text-center">Company</span>
        <?php
        wp_nav_menu(array(
          'theme_location' => 'footer_menu_2',
          'menu_class' => 'footer-link',
        ));
        ?>
      </div>
    <?php endif; ?>

    <?php if (has_nav_menu('footer_menu_3')) : ?>
      <div class="d-flex flex-column">
        <span class="d-block text-grey text-center">Support</span>
        <?php
        wp_nav_menu(array(
          'theme_location' => 'footer_menu_3',
          'menu_class' => 'footer-link',
        ));
        ?>
      </div>
    <?php endif; ?>

    <?php if (has_nav_menu('footer_menu_4')) : ?>
      <div class="d-flex flex-column">
        <span class="d-block text-grey text-center">Legal</span>
        <?php
        wp_nav_menu(array(
          'theme_location' => 'footer_menu_4',
          'menu_class' => 'footer-link',
        ));
        ?>
      </div>
    <?php endif; ?>
  </footer>

  <div class="d-flex flex-column flex-md-row justify-content-between bg-dark text-dark px-3 pt-3 border-top">
    <div>
      <p class="text-xs text-white">&copy; <?php echo date('Y'); ?> Job Mingle. All Rights Reserved</p>
    </div>
    <div>
      <p class="text-xs text-white">Powered by Job Mingle</p>
    </div>
  </div>
</div>

<?php wp_footer(); ?>
</body>

</html>