<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <?php get_template_part( 'single/default', get_post_format() ); ?>
  </article>
  <footer>
    <?php comments_template('/comments/main.php'); ?>
  </footer>
<?php endwhile; ?>
