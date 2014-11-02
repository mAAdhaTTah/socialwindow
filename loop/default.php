<header>
  <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
</header>
<div class="clearfix"></div>
<?php get_template_part('partials/entry-meta'); ?>
<div class="entry-content">
  <div class="entry-thumbnail">
  <?php $full = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
  <ul class="clearing-thumbs" data-clearing>
    <li>
      <a href="<?php echo $full[0]; ?>">
        <?php the_post_thumbnail(); ?>
      </a>
    </li>
  </ul>
  </div>
  <?php the_content(); ?>
</div>
