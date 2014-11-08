<header>
  <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
</header>
<div class="entry-audio">
  <?php echo wp_oembed_get( get_post_meta( get_the_ID(), '_format_audio_embed', true ) ); ?>
</div>
<?php get_template_part('partials/entry-meta'); ?>
<div class="entry-content">
  <?php the_content(); ?>
</div>
