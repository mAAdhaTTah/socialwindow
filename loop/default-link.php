<div class="entry-content">
  <?php the_content(); ?>
</div>
<div class="link-meta">
  <div class="link-info">
    <h4 class="link-title"><a href="<?php echo get_post_meta( get_the_ID(), '_format_link_url', true ); ?>" target="_blank">
      <i class="fa fa-link"></i> <?php the_title(); ?>
    </a></h4>
    <?php if ( get_post_meta( get_the_ID(), '_url_embedly_retrieved' ) ) : ?>
      <p class="link-provider">
        Source: <a href="<?php echo get_post_meta( get_the_ID(), '_url_embedly_provider_url', true ); ?>" target="_blank"><?php echo get_post_meta( get_the_ID(), '_url_embedly_provider_name', true ); ?></a>
      </p>
      <small class="link-description"><?php echo get_post_meta( get_the_ID(), '_url_embedly_description', true ); ?></small>
    <?php endif; ?>
  </div>
</div>
<?php get_template_part('partials/entry-meta'); ?>
