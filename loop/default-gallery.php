<header>
  <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <?php // get_template_part('templates/entry-meta'); ?>
</header>

<div class="entry-content">
  <ul class="small-block-grid-4">
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

        <?php $thumbnail = wp_get_attachment_image_src( $attachment->ID, 'thumbnail' ); ?>

        <li>
          <a class="gallery-thumb" href="<?php the_permalink(); ?>">
            <img src="<?php echo $thumbnail[0]; ?>">
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
  <?php the_content(); ?>
</div>
