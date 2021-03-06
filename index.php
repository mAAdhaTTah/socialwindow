<?php if (!have_posts()) : ?>
  <p><?php _e('Sorry, no results were found.', 'roots'); ?> </p>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <?php get_template_part( 'loop/default', get_post_format() ); ?>
  </article>
<?php endwhile; ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <?php echo roots_numbered_pagination(); ?>
<?php endif; ?>
