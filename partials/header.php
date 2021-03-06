<header id="splash"
  data-socwin-header-container
  <?php if(is_front_page()) : ?>
    data-bg-image-default="<?php echo get_template_directory_uri(); ?>/assets/img_min/header.jpg"
    data-bg-image-small="<?php echo get_template_directory_uri(); ?>/assets/img_min/header-small.jpg"
    data-bg-image-medium="<?php echo get_template_directory_uri(); ?>/assets/img_min/header-medium.jpg"
    data-bg-image-large="<?php echo get_template_directory_uri(); ?>/assets/img_min/header-large.jpg"
  <?php else: ?>
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img_min/header-top.jpg')"
  <?php endif; ?>
>

  <section class="banner" data-socwin-header-banner>
    <div id="logo" class="columns">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><div class="container"></div></a>
    </div>
    <div id="blog-info" class="columns">
      <div id="title">
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></h1>
      </div>

      <div id="social-links">
        <a href="https://www.facebook.com/james.digioia" target="_blank">
          <i class="fa fa-facebook-square" data-socwin-icon></i>
        </a>
        <a href="https://twitter.com/JamesDiGioia" target="_blank">
          <i class="fa fa-twitter-square" data-socwin-icon></i>
        </a>
        <a href="https://www.linkedin.com/in/jamesdigioia" target="_blank">
          <i class="fa fa-linkedin-square" data-socwin-icon></i>
        </a>
        <a href="https://plus.google.com/+JamesDiGioia" target="_blank">
          <i class="fa fa-google-plus-square" data-socwin-icon></i>
        </a>
        <a href="http://instagram.com/jamesdigioia" target="_blank">
          <i class="fa fa-instagram" data-socwin-icon></i>
        </a>
        <a href="http://jamesdigioia.tumblr.com/" target="_blank">
          <i class="fa fa-tumblr-square" data-socwin-icon></i>
        </a>
        <a href="https://github.com/mAAdhaTTah/" target="_blank">
          <i class="fa fa-github-square" data-socwin-icon></i>
        </a>
        <a href="https://www.reddit.com/user/maadhattah" target="_blank">
          <i class="fa fa-reddit-square" data-socwin-icon></i>
        </a>
        <a href="http://stackexchange.com/users/3267217/maadhattah" target="_blank">
          <i class="fa fa-stack-exchange" data-socwin-icon></i>
        </a>
      </div>

      <div id="subtitle">
        <h2 class="subheader"><?php bloginfo('description'); ?></h2>
      </div>
    </div>
  </section>

  <section class="contain-to-grid nav-container">
    <nav role="navigation" class="top-bar" id="main-navigation" data-topbar>
      <ul class="title-area">
        <li class="name"></li>
        <li class="toggle-topbar menu-icon"><a href="#"><i class="fa fa-angle-double-down"></i></a></li>
      </ul>

      <section class="top-bar-section">
        <?php if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'right'));
        endif; ?>
      </section>
    </nav>
  </section>

</header><!-- contain-to-grid -->
