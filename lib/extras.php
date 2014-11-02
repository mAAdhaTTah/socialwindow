<?php
/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more($more) {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'roots') . '</a>';
}
add_filter('excerpt_more', 'roots_excerpt_more');

/**
 * Manage output of wp_title()
 */
function roots_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'roots_wp_title', 10);

function sw_thread_notice( $notice_html, $post ) {

  if ( 'quote' === get_post_format( $post->ID ) ) {
    return '';
  }

  return $notice_html;
}
add_filter('cfth_thread_notice', 'sw_thread_notice', 10, 2);

/**
 * Custom functions, all this is optional
 * Mosly cleaning up the admin interface.
 * Comment out what you don't need, and uncomment what you want.
 */

//
//		Fixes overlapping adminbar for Foundations top-bar
//
//////////////////////////////////////////////////////////////////////

add_action('wp_head', 'admin_bar_fix', 5);
function admin_bar_fix() {
  if( is_admin_bar_showing() ) {
    $output  = '<style type="text/css">'."\n\t";
    $output .= '@media screen and (max-width: 600px) {#wpadminbar { position: fixed !important; } }'."\n";
    $output .= '</style>'."\n";
    echo $output;
  }
}

//
//		Adds Foundation classes to next/prev buttons
//
//////////////////////////////////////////////////////////////////////

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="button tiny"';
}

//
//    Adds the livereload script. Primarily for testing other devices on same network as web server
//    Change the IP address to the IP of the computer thats running the "gulp" command (likely your dev computer)
//
//////////////////////////////////////////////////////////////////////

function livereload() {
  wp_register_script('livereload', 'http://localhost:35729/livereload.js?snipver=1', array(), null, true);
  wp_enqueue_script('livereload');
}

// Runs the livereload function if domain contains .dev — edit to fit your own need
if( isset( $_SERVER['HTTP_HOST'] ) ) {
  $host = $_SERVER['HTTP_HOST'];
  if (strpos($host,'.dev') !== false) {
      add_action('wp_enqueue_scripts', 'livereload');
  }
}
