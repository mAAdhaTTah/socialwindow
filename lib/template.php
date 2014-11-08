<?php

function the_thread_notice() {
  $threads = wp_get_post_terms( get_the_ID(), 'threads' );
  $notice_html = '';
  if (count($threads) > 0) {
    $thread_links = cfth_thread_links($threads);
    $thread_links = implode(', ', $thread_links);
    if (count($threads) == 1) {
      $notice = sprintf(__('This post is part of the thread: %s - an ongoing story on this site. View the thread timeline for more context on this post.', 'threads'), $thread_links);
    }
    else {
      $notice = sprintf(__('This post is part of the following threads: %s - ongoing stories on this site. View the thread timelines for more context on this post.', 'threads'), $thread_links);
    }
    $notice_html = "\n\n".'<p class="threads-post-notice">'.$notice.'</p>';
  }
  echo $notice_html;
}

