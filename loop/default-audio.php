<header>
  <div class="flex-video">
    <?php echo wp_oembed_get( get_post_meta( get_the_ID(), '_format_audio_embed', true ) ); ?>
  </div>
  <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
</header>
<div class="clearfix"></div>
<?php get_template_part('partials/entry-meta'); ?>
<div class="entry-content">
  <?php the_content(); ?>
</div>
