<div class="entry-content">
  <?php the_post_thumbnail( 'full' ); ?>
</div>
<footer>
  <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <?php the_content(); ?>
  <?php // get_template_part('templates/entry-meta'); ?>
</footer>
