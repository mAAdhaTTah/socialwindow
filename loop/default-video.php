<header>
  <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
</header>
<div class="entry-content">
  <div class="entry-video">
    <?php echo wp_oembed_get( get_post_meta( get_the_ID(), '_format_video_embed', true ) ); ?>
  </div>
  <?php get_template_part('partials/entry-meta'); ?>
  <?php the_content(); ?>
</div>
<?php the_thread_notice(); ?>
