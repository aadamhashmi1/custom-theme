<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
  <div class="container">

    <div class="site-branding">
      <?php
      if (has_custom_logo()) {
        the_custom_logo();
      } else {
        echo '<h1 class="site-title"><a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a></h1>';
      }
      ?>
    </div>


    <nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'custom-theme'); ?>">
      <?php
      wp_nav_menu([
        'theme_location' => 'primary',
        'container' => false,
        'menu_class' => 'nav-menu',
        'fallback_cb' => false
      ]);
      ?>
    </nav>

  </div>
</header>
