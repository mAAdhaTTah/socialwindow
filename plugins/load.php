<?php
require_once 'Embedly/Embedly.php';
require_once 'cf-post-formats/cf-post-formats.php';

/**
 * Configure the directory for Post Formats UI
 */
function sw_cfpf_base_url($url) {
  return get_template_directory_uri() . '/plugins/cf-post-formats/';
}
add_filter('cfpf_base_url', 'sw_cfpf_base_url');
