<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
  <?php get_template_part('partials/head'); ?>

  <body <?php body_class(); ?>>

    <!--[if lt IE 8]>
      <div class="alert-box warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
      </div>
    <![endif]-->

    <?php
      do_action('get_header');
      get_template_part('partials/header');
    ?>

    <div class="wrap" role="document">
      <main class="main" role="main">
        <?php include roots_template_path(); ?>
      </main><!-- /.main -->
    </div><!-- /.content -->

    <?php wp_footer(); ?>

  </body>
</html>
