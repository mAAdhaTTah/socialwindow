<?php
/**
 * Scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/main.css
 *
 * Enqueue scripts in the following order:
 * 2. /theme/assets/js/vendor/modernizr-2.7.0.min.js
 * 3. /theme/assets/js/main.min.js (in footer)
 */
function roots_scripts() {
  wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Unica+One|Vollkorn:400italic,700italic,400,700', false);
  wp_enqueue_style( 'googleFonts');

  wp_enqueue_style('roots_main', get_template_directory_uri() . '/assets/css/main.min.css', false);

  if (!is_admin() && current_theme_supports('jquery-cdn')) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', array(), null, true);
    add_filter('script_loader_src', 'roots_jquery_local_fallback', 10, 2);
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {wp_enqueue_script('comment-reply'); }

  wp_dequeue_style( 'social_comments' );

  wp_enqueue_script('jquery');

  wp_register_script('roots_scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', array('jquery', 'underscore'), '0fc6af96786d8f267c8686338a34cd38', true);
  wp_enqueue_script('roots_scripts');
}
add_action('wp_enqueue_scripts', 'roots_scripts', 11);

// http://wordpress.stackexchange.com/a/12450
function roots_jquery_local_fallback($src, $handle = null) {
  static $add_jquery_fallback = false;
  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/js/jquery.min.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }
  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }
  return $src;
}
add_action('wp_head', 'roots_jquery_local_fallback');

/**
 * Sets the circular header image from the database
 */
function sw_header_image() {?>
  <style type="text/css">
  #logo .container {
    background: url(<?php header_image(); ?>) no-repeat;
  }
  </style>
<?php
}
add_action( 'wp_footer', 'sw_header_image' );

/**
 * Google Analytics snippet from HTML5 Boilerplate
 *
 * Cookie domain is 'auto' configured. See: http://goo.gl/VUCHKM
 */
function roots_google_analytics() { ?>
<script>
  <?php if (WP_ENV === 'production') : ?>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  <?php else : ?>
    function ga() {
      console.log('GoogleAnalytics: ' + [].slice.call(arguments));
    }
  <?php endif; ?>
  ga('create','<?php echo GOOGLE_ANALYTICS_ID; ?>','auto');ga('send','pageview');
</script>

<?php }
if (GOOGLE_ANALYTICS_ID && (WP_ENV !== 'production' || !current_user_can('manage_options'))) {
  add_action('wp_footer', 'roots_google_analytics', 20);
}
