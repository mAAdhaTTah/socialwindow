<?php
/**
 * Roots initial setup and constants
 */
function roots_setup() {
  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/roots-translations
  load_theme_textdomain('roots', get_template_directory() . '/lang');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'roots')
  ));

  // Add post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 180, 180, true );
  add_image_size( 'gallery-thumb-medup', 160, 160, true );
  add_image_size( 'gallery-thumb-small', 90, 90, true );
  add_image_size( 'image-main-small', 640, 0, false );
  add_image_size( 'image-main-medup', 720, 0, false );

  // Add post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support(
    'post-formats',
    array(
      'status',
      'link',
      'image',
      'gallery',
      'video',
      'audio',
      'quote',
    )
  );
  // Adds support for formats UI
  add_theme_support(
    'structured-post-formats',
    array(
      'status',
      'link',
      'image',
      'gallery',
      'video',
      'audio',
      'quote',
    )
  );

  // Add HTML5 markup for captions
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support( 'html5', array( 'caption' ) );

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'roots_setup');
