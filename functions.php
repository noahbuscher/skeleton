<?php

/**
 * Custom logo
 */
add_theme_support('custom-logo');

/**
 * Custom backgrounds
 */
add_theme_support('custom-background');

/**
 * Post thumbnails
 */
add_theme_support('post-thumbnails');

/**
 * Theme title
 */
add_theme_support('title-tag');

/**
 * Automatic feed links
 */
add_theme_support('automatic-feed-links');

/**
 * Limit post excerpt length
 */
function custom_excerpt_length($length) {
	return 20;
}

add_filter('excerpt_length', 'custom_excerpt_length', 999);

/**
 * Custom menu support
 */
function register_skeleton_menus() {
	register_nav_menus(
    array(
      'header-menu' => __('Header Menu'),
      'footer-menu' => __('Footer Menu')
    )
  );
}

add_action('init', 'register_skeleton_menus');

/**
 * WordPress custom header
 */
function skeleton_custom_header_setup() {

	/**
	 * Filter Skeleton custom-header support arguments
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-image   Default image of the header.
	 * }
	 */
	add_theme_support('custom-header', apply_filters('twentyseventeen_custom_header_args', array(
		'default-image' => get_parent_theme_file_uri('/images/header.jpg'),
	)));

	register_default_headers( array(
		'default-image' => array(
			'url' => '%s/images/header.jpg',
			'thumbnail_url' => '%s/images/header.jpg',
			'description' => __('Default Header Image', 'skeleton'),
		),
	));
}

add_action('after_setup_theme', 'skeleton_custom_header_setup');

/**
 * Theme options
 */
function skeleton_theme_menu() {
	add_theme_page(
  	'Skeleton Theme',
  	'Skeleton Theme',
  	'administrator',
  	'skeleton_theme_options',
  	'skeleton_theme_display'
	);
}

add_action('admin_menu', 'skeleton_theme_menu');

function skeleton_theme_display() {
	?>
		<div class="wrap">
    	<div id="icon-themes" class="icon32"></div>
    	<h2>Skeleton Theme Options</h2>
     	<?php settings_errors(); ?>
     	<form method="post" action="options.php">
      	<?php settings_fields('skeleton_theme_contact_options'); ?>
      	<?php do_settings_sections('skeleton_theme_contact_options'); ?>
      	<?php submit_button(); ?>
    	</form>
		</div>
	<?php
}

function skeleton_initialize_theme_options() {
	if (false == get_option('skeleton_theme_contact_options')) {
		add_option('skeleton_theme_contact_options');
  }

	add_settings_section(
    'contact_settings_section',
    'Contact Options',
    'skeleton_contact_options_callback',
    'skeleton_theme_contact_options'
	);

	add_settings_field(
		'phone',
	 	'Phone Number',
	 	'skeleton_theme_phone_callback',
	 	'skeleton_theme_contact_options',
	 	'contact_settings_section'
	);

	add_settings_field(
		'address',
	 	'Address',
	 	'skeleton_theme_address_callback',
	 	'skeleton_theme_contact_options',
	 	'contact_settings_section'
	);

	register_setting(
		'skeleton_theme_contact_options',
    'skeleton_theme_contact_options',
    'skeleton_theme_sanatize_contact_options'
	);
}

add_action('admin_init', 'skeleton_initialize_theme_options');


function skeleton_contact_options_callback() {
	echo '<p>Add your contact options here:</p>';
}

function skeleton_theme_phone_callback($args) {
	$options = get_option('skeleton_theme_contact_options');

  $phone = '';
  if (isset($options['phone'])) {
		$phone = $options['phone'];
  }

	$html = '<input type="text" id="phone" name="skeleton_theme_contact_options[phone]" value="' . $phone . '" />';
  echo $html;
}

function skeleton_theme_address_callback($args) {
	$options = get_option('skeleton_theme_contact_options');

  $address = '';
  if (isset($options['address'])) {
		$address = $options['address'];
  }

	$html = '<input type="text" id="address" name="skeleton_theme_contact_options[address]" value="' . $address . '" />';
  echo $html;
}

?>
