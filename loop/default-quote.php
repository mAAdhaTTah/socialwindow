<div class="entry-content">
  <blockquote>
    <?php the_content(); ?>
    <cite>
      <a href="<?php echo get_post_meta( get_the_ID(), '_format_quote_source_url', true ); ?>" target="_blank">
        <?php echo get_post_meta( get_the_ID(), '_format_quote_source_name', true ); ?>
      </a>
    </cite>
  </blockquote>
</div>
<?php get_template_part('partials/entry-meta'); ?>
<?php the_thread_notice(); ?>
