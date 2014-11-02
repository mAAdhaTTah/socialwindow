<?php
require_once 'Embedly/Embedly.php';
require_once 'cf-post-formats/cf-post-formats.php';
require_once 'social-native-broadcasts/social-native-broadcasts.php';

/**
 * Configure the directory for Post Formats UI
 */
function sw_cfpf_base_url($url) {
  return get_template_directory_uri() . '/plugins/cf-post-formats/';
}
add_filter('cfpf_base_url', 'sw_cfpf_base_url');

/**
 * Fix Social's paths
 */
function cfcp_load_social() {
  if (get_option('cfcp_social_enabled') != 'no') {
    // load filters for Social
    add_filter('social_plugins_url', 'cfcp_social_plugins_url');
    add_filter('social_plugins_path', 'cfcp_social_plugins_path');
    add_filter('social_items_comment_avatar_size', 'cfcp_social_items_comment_avatar_size');
    add_action('set_current_user', array('Social', 'social_loaded_by_theme'));
    define('SOCIAL_COMMENTS_FILE', 'comments/main.php');
    if (!class_exists('Social')) {
      // load Social if not already loaded
      include_once('social/social.php');
    }
  }
}
add_action('after_setup_theme', 'cfcp_load_social', 9);

function cfcp_social_plugins_url($url) {
  $url = trailingslashit(get_template_directory_uri());
  return trailingslashit($url.'plugins/social');
}

function cfcp_social_plugins_path($path) {
  $path = trailingslashit(get_template_directory());
  return trailingslashit($path.'plugins/social');
}

function cfcp_social_items_comment_avatar_size($avatar_size) {
  $avatar_size['height'] = $avatar_size['width'] = 24;
  return $avatar_size;
}
