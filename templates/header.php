<div class="contain-to-grid">
  <header>

    <section class="banner">
      <div id="logo" class="columns">

      </div>
      <div id="blog-info" class="columns">
        <div id="title">
          <h1>James DiGioia</h1>
        </div>
        <div id="social">

        </div>
        <div id="subtitle">
          <h3> Social Media Marketing and Web Development</h3>
        </div>
      </div>
    </section>

    <nav class="top-bar" data-topbar>
      <ul class="title-area">
        <li class="name"> <h1><a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a></h1> </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
        <?php if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'right'));
        endif; ?>
      </section>
    </nav>
  </header>
</div> <!-- contain-to-grid -->
