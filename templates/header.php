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
          <i class="fa fa-facebook-square"></i>
          <i class="fa fa-twitter-square"></i>
          <i class="fa fa-linkedin-square"></i>
          <i class="fa fa-google-plus-square"></i>
          <i class="fa fa-instagram"></i>
          <i class="fa fa-tumblr-square"></i>
          <i class="fa fa-github-square"></i>
          <i class="fa fa-reddit-square"></i>
          <i class="fa fa-stack-exchange"></i>
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
