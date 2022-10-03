<?php
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);
function enqueue_child_theme_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );



  add_action('init', 'custom_startSession', 1);
  function custom_startSession()
  {
    if (!session_id()) {
      session_start();
    }
  }
  add_action('init', 'custom_login');
  function custom_login()
  {
    if (!isset($_REQUEST['custom_login']))
      return;

    $username = (isset($_POST['log']) ? $_POST['log'] : "");
    $username = sanitize_user($username);
    $password = (isset($_POST['pwd']) ? $_POST['pwd'] : "");
    $password = sanitize_text_field($password);

    $redirect_to = (isset($_REQUEST["redirect_to"]) ? $_REQUEST["redirect_to"] : "");

    // Kiểm tra token login
    if (isset($_POST['custom_login'])) {
      if (!isset($_POST['custom_token_login']) || !wp_verify_nonce($_POST['custom_token_login'], 'custom_nonce')) {
        wp_safe_redirect(home_url() . "/custom-login?login=token_error&redirect_to=" . urlencode($redirect_to));
        exit;
      }
    }

    $exits_user = custom_get_exist_user($user_name);
    if ($exits_user) {
      wp_signon(array(), true);
    } else {
      wp_safe_redirect(home_url() . "/custom-login?login=failed&redirect_to=" . urlencode($redirect_to));
    }
  }
  function custom_get_exist_user($user_name)
  {
    global $wpdb;
    $count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $wpdb->users WHERE user_login = %s", $user_name));
    if ($count == 1) {
      return true;
    } else {
      return false;
    }
  }
  add_action("wp_logout", "custom_logout");
  function custom_logout()
  {
    wp_clear_auth_cookie();
    session_start();
    session_destroy();
    wp_safe_redirect(home_url('/custom-login?login=notyet&redirect_to=' . urlencode(home_url())));
  }
  add_filter('wp_nav_menu_items', function ($items, $args) {

    // Only used on main menu
    if ('primary' != $args->theme_location) {
      return $items;
    }
    // Add custom item
    $items .= '<li class="custom-login-logout-link menu-button menu-item last">';
    // Log-out link
    if (is_user_logged_in()) {
      $text            = 'Logout';
      $logout_redirect = home_url('/'); // Change logout redirect URl here
      $items .= '<a href="' . wp_logout_url($logout_redirect) . '" title="' . esc_attr($text) . '" class="wpex-logout"><span class="link-inner">' . strip_tags($text) . '</span></a>';
    }
    // Log-in link
    else {
      $text      = 'Login';
      $login_url = home_url() . "/custom-login";
      $items .= '<a href="' . esc_url($login_url) . '" title="' . esc_attr($text) . '"><span class="link-inner">' . strip_tags($text) . '</span></a>';
    }
    $items .= '</li>';

    // Return nav $items
    return $items;
  }, 20, 2);
  add_filter('nonce_life', 'custom_nonce_time');
  function custom_nonce_time()
  {
    return 900; // 15 phút
  }







}
