<?php
function theme_register_menus() {
    register_nav_menus(
      array(
        'footer_menu_1' => 'Footer Menu 1',
        'footer_menu_2' => 'Footer Menu 2',
        'footer_menu_3' => 'Footer Menu 3',
        'footer_menu_4' => 'Footer Menu 4',
      )
    );
  }
  add_action('init', 'theme_register_menus');



  //Social Media Of Footer
  function get_social_media_platform($url) {
    $host = parse_url($url, PHP_URL_HOST);
    $host = str_replace('www.', '', $host);
    $platforms = array(
      'facebook' => 'facebook.com',
      'twitter' => 'twitter.com',
      'linkedin' => 'linkedin.com',
      // Add more platforms as needed
    );
  
    foreach ($platforms as $platform => $domain) {
      if (strpos($host, $domain) !== false) {
        return $platform;
      }
    }
  
    return 'other';
  }
  function get_social_icon($platform) {
    // Add your custom logic here to return the appropriate class for each social media platform
    // For example:
    switch ($platform) {
      case 'facebook':
        return 'fab fa-facebook';
      case 'twitter':
        return 'fab fa-twitter';
      case 'linkedin':
        return 'fab fa-linkedin';
      // Add more cases for other social media platforms if needed
      default:
        return '';
    }
  }