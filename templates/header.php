<div class="contain-to-grid">
  <header>

    <section class="banner">
      <div id="logo" class="columns">
        <div class="container"></div>
      </div>
      <div id="blog-info" class="columns">
        <div id="title">
          <h1>James DiGioia</h1>
        </div>

        <div id="social">
          <i class="fa fa-github"></i>
          <i class="fa fa-facebook"></i>
          <i class="fa fa-twitter"></i>
          <i class="fa fa-youtube"></i>
        </div>

        <div id="subtitle">
          <h2 class="subheader">Social Media and Web Development</h2>
        </div>
      </div>
    </section>

    <nav role="navigation" class="top-bar" id="main-navigation" data-topbar>
      <section class="top-bar-section">
        <?php if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'left'));
        endif; ?>
      </section>
    </nav>
  </header>
</div> <!-- contain-to-grid -->
