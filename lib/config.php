<?php
/**
 * Enable theme features
 */

add_theme_support('soil-clean-up');         // Enable clean up from Soil
add_theme_support('soil-relative-urls');    // Enable relative URLs from Soil
add_theme_support('soil-nice-search');      // Enable /?s= to /search/ redirect from Soil
add_theme_support('jquery-cdn');            // Enable to load jQuery from the Google CDN
$defaults = array(
  'default-image'          => '',
  'width'                  => 180,
  'height'                 => 180,
  'uploads'                => true,
);
add_theme_support( 'custom-header', $defaults );

add_theme_support( 'title-tag' );

/**
 * Configuration values
 */
define('GOOGLE_ANALYTICS_ID', 'UA-56114908-1'); // UA-XXXXX-Y (Note: Universal Analytics only, not Classic Analytics)

/**
 * $content_width is a global variable used by WordPress for max image upload sizes
 * and media embeds (in pixels).
 *
 * Example: If the content area is 640px wide, set $content_width = 620; so images and videos will not overflow.
 * Default: 1140px is the default Bootstrap container width.
 */
if (!isset($content_width)) { $content_width = 720; }
