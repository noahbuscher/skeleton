<!DOCTYPE html>

<html>
  <head>
    <!-- Meta -->
    <meta charset="utf-8">
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>" />
    <meta name="keywords" content="marketing,agency,insurance,websites,design,quote" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png" />

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-ID');</script>
    <!-- End Google Tag Manager -->

    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/main.js" charset="utf-8"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&Sanchez:400" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class($class); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-ID"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <?php $contact_options = get_option('skeleton_theme_contact_options'); ?>

    <header id="nav">
        <div class="header-inner row row-block">
          <div class="shadow"></div>
          <div class="col-1 logo">
            <div class="logo-border">
              <a href="/">
                <?php
                  $custom_logo_id = get_theme_mod('custom_logo');
                  $logo = wp_get_attachment_image_src($custom_logo_id , 'full');
                  if (has_custom_logo()) {
                    echo '<div class="logo-img" style="background-image: url('. esc_url($logo[0]) .')" alt="'. get_bloginfo('name') .' logo"></div>';
                  } else {
                    echo '<h1>'. get_bloginfo('name') .'</h1>';
                  }
                ?>
              </a>
            </div>
          </div>
          <div class="menu-open">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/menu.png" />
          </div>
          <div class="menu-close">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/close.png" />
          </div>
          <nav class="col-3">
            <div class="nav-inner">
              <?php wp_nav_menu(array('theme_location' => 'header-menu')); ?>
            </div>
          </nav>
          <div class="col-1 phone">
            <a class="btn btn-navy" href="#">
              Take an Action
            </a>
           </div>
        </div>

    </header>
