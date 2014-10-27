<ul class="entry-meta">
  <li>
    <time class="published" datetime="<?php echo get_the_time('c'); ?>">Posted: <?php echo get_the_date(); ?></time>
  </li>
  <li>
    <span><i class="fa fa-circle"></i></span>
  </li>
  <li>
    <span class="byline author"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></p>
  </li>
  <li>
    <span><i class="fa fa-circle"></i></span>
  </li>
  <li>
    <a href="<?php the_permalink(); ?>"><?php comments_number( 'no comments', 'one coment', '% comments' ); ?></a>
  </li>
</ul>

