<header>
  <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
</header>

<div class="entry-content">
  <ul class="small-block-grid-2 medium-block-grid-4">
    <?php
      $attachments = get_posts(array(
        'post_type' => 'attachment',
        'numberposts' => 7,
        'post_status' => null,
        'post_parent' => $post->ID,
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
      ));
    ?>
    <?php if ($attachments): ?>
      <?php foreach ( $attachments as $attachment ) : ?>

        <?php $thumb_small = wp_get_attachment_image_src( $attachment->ID, 'gallery-thumb-small' ); ?>
        <?php $thumb_medup = wp_get_attachment_image_src( $attachment->ID, 'gallery-thumb-medup' ); ?>

        <li>
          <a class="gallery-thumb" href="<?php the_permalink(); ?>">
            <img data-interchange="[<?php echo $thumb_small[0]; ?>, (default)], [<?php echo $thumb_medup[0]; ?>, (medium)]">
          </a>
        </li>

      <?php endforeach; ?>
    <?php endif; ?>
    <li class="gallery-last">
      <a class="gallery-thumb" href="<?php the_permalink(); ?>">
        <p><?php _e( 'Click for the full gallery.', 'roots' ); ?></p>
      </a>
    </li>
  </ul>
  <?php get_template_part('templates/entry-meta'); ?>
  <?php the_content(); ?>
</div>
