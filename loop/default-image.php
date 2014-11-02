<div class="entry-content">
  <?php $thumb_small = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'image-main-small' ); ?>
  <?php $thumb_medup = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'image-main-medup' ); ?>
  <?php $full = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>

  <ul class="clearing-thumbs" data-clearing>
    <li>
      <a href="<?php echo $full[0]; ?>">
        <img data-interchange="[<?php echo $thumb_small[0]; ?>, (default)], [<?php echo $thumb_medup[0]; ?>, (medium)]">
      </a>
    </li>
  </ul>
</div>
<footer>
  <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
  <?php the_content(); ?>
  <?php get_template_part('partials/entry-meta'); ?>
</footer>
