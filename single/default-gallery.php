<header>
  <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <?php // get_template_part('templates/entry-meta'); ?>
</header>
<div class="entry-content">
  <ul class="clearing-thumbs small-block-grid-4" data-clearing>
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
          $thumbnail = wp_get_attachment_image_src( $attachment->ID, 'thumbnail' );
          $full = wp_get_attachment_image_src( $attachment->ID, 'full' );
          $metadata = wp_get_attachment_metadata( $attachment->ID );
        ?>

        <li>
          <a class="th" href="<?php echo $full[0]; ?>">
            <img data-caption="<?php echo $metadata['image_meta']['caption'] ?>" src="<?php echo $thumbnail[0]; ?>">
          </a>
        </li>

      <?php endforeach; ?>
    <?php endif; ?>
  </ul>
  <?php the_content(); ?>
</div>
