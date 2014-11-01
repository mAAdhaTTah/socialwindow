<header>
  <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
</header>
<div class="clearfix"></div>
<?php get_template_part('templates/entry-meta'); ?>
<div class="entry-content">
  <div class="entry-thumbnail">
    <?php the_post_thumbnail(); ?>
  </div>
  <?php the_content(); ?>
</div>
