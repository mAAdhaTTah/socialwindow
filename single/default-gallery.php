<header>
  <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
</header>
<ul class="gallery-wrap clearing-thumbs" data-clearing>
  <?php
    $attachments = get_posts(array(
      'post_type' => 'attachment',
      'numberposts' => -1,
      'post_status' => null,
      'post_parent' => $post->ID,
      'order' => 'ASC',
      'orderby' => 'menu_order ID',
    ));
  ?>
  <?php if ($attachments): ?>
    <?php foreach ( $attachments as $attachment ) : ?>

      <?php
        $thumb_small = wp_get_attachment_image_src( $attachment->ID, 'gallery-thumb-small' );
        $thumb_medup = wp_get_attachment_image_src( $attachment->ID, 'gallery-thumb-medup' );
        $full = wp_get_attachment_image_src( $attachment->ID, 'large' );
        $metadata = wp_get_attachment_metadata( $attachment->ID );
      ?>

      <li>
        <a class="gallery-thumb" href="<?php echo $full[0]; ?>">
          <img data-caption="<?php echo $metadata['image_meta']['caption'] ?>" data-interchange="[<?php echo $thumb_small[0]; ?>, (default)], [<?php echo $thumb_medup[0]; ?>, (medium)]">
        </a>
      </li>

    <?php endforeach; ?>
  <?php endif; ?>
</ul>
<div class="entry-content">
  <?php get_template_part('partials/entry-meta'); ?>
  <?php the_content(); ?>
</div>
