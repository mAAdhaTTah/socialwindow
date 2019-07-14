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

  register_post_meta('post', '_format_audio_embed', [
    'type' => 'string',
    'description' => 'Audio URL for audio formats',
    'single' => true,
    'show_in_rest' => true,
  ]);

  register_post_meta('post', '_format_link_url', [
    'type' => 'string',
    'description' => 'Link URL for link formats',
    'single' => true,
    'show_in_rest' => true,
  ]);

  register_post_meta('post', '_url_embedly_retrieved', [
    'type' => 'boolean',
    'description' => 'Whether the URL has been retrieved from Embedly',
    'single' => true,
    'show_in_rest' => true,
  ]);

  register_post_meta('post', '_url_embedly_provider_url', [
    'type' => 'string',
    'description' => 'Provider URL for link formats',
    'single' => true,
    'show_in_rest' => true,
  ]);

  register_post_meta('post', '_url_embedly_provider_name', [
    'type' => 'string',
    'description' => 'Provider name for link formats',
    'single' => true,
    'show_in_rest' => true,
  ]);

  register_post_meta('post', '_url_embedly_description', [
    'type' => 'string',
    'description' => 'Link description for link formats',
    'single' => true,
    'show_in_rest' => true,
  ]);

  register_post_meta('post', '_format_quote_source_url', [
    'type' => 'string',
    'description' => 'Quote source url for quote formats',
    'single' => true,
    'show_in_rest' => true,
  ]);

  register_post_meta('post', '_format_quote_source_name', [
    'type' => 'string',
    'description' => 'Quote source name for quote formats',
    'single' => true,
    'show_in_rest' => true,
  ]);

  register_post_meta('post', '_format_video_embed', [
    'type' => 'string',
    'description' => 'Video URL for video formats',
    'single' => true,
    'show_in_rest' => true,
  ]);
}
add_action('after_setup_theme', 'roots_setup');
