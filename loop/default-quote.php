<?php
  $threads = wp_get_post_terms( get_the_ID(), 'threads' );
  $notice_html = '';
  if (count($threads) > 0) {
    $thread_links = cfth_thread_links($threads);
    $thread_links = implode(', ', $thread_links);
    if (count($threads) == 1) {
      $notice_single = sprintf(__('This post is part of the thread: %s - an ongoing story on this site. View the thread timeline for more context on this post.', 'threads'), $thread_links);
      $notice = apply_filters('cfth_thread_notice_single', $notice_single);
    }
    else {
      $notice_mult = sprintf(__('This post is part of the following threads: %s - ongoing stories on this site. View the thread timelines for more context on this post.', 'threads'), $thread_links);
      $notice = apply_filters('cfth_thread_notice_mult', $notice_mult);
    }
    $notice_html = "\n\n".'<p class="threads-post-notice">'.$notice.'</p>';
  }
?>
<div class="entry-content">
  <blockquote>
    <?php the_content(); ?>
    <cite>
      <a href="<?php echo get_post_meta( get_the_ID(), '_format_quote_source_url', true ); ?>">
        <?php echo get_post_meta( get_the_ID(), '_format_quote_source_name', true ); ?>
      </a>
    </cite>
  </blockquote>
  <?php echo $notice_html; ?>
  <?php get_template_part('partials/entry-meta'); ?>
</div>
