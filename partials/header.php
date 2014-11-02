<header>

  <section class="banner contain-to-grid">
    <div id="logo" class="columns">
      <div class="container"></div>
    </div>
    <div id="blog-info" class="columns">
      <div id="title">
        <h1>James DiGioia</h1>
      </div>

      <div id="social-links">
        <a href="https://www.facebook.com/james.digioia">
          <i class="fa fa-facebook-square"></i>
        </a>
        <a href="https://twitter.com/JamesDiGioia">
          <i class="fa fa-twitter-square"></i>
        </a>
        <a href="https://www.linkedin.com/in/jamesdigioia">
          <i class="fa fa-linkedin-square"></i>
        </a>
        <a href="https://plus.google.com/+JamesDiGioia">
          <i class="fa fa-google-plus-square"></i>
        </a>
        <a href="http://instagram.com/jamesdigioia">
          <i class="fa fa-instagram"></i>
        </a>
        <a href="http://jamesdigioia.tumblr.com/">
          <i class="fa fa-tumblr-square"></i>
        </a>
        <a href="https://github.com/mAAdhaTTah/">
          <i class="fa fa-github-square"></i>
        </a>
        <a href="www.reddit.com/user/maadhattah">
          <i class="fa fa-reddit-square"></i>
        </a>
        <a href="http://stackexchange.com/users/3267217/maadhattah">
          <i class="fa fa-stack-exchange"></i>
        </a>
      </div>

      <div id="subtitle">
        <h2 class="subheader">Social Media and Web Development</h2>
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
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'right top-bar-section'));
        endif; ?>
      </section>
    </nav>
  </section>

</header><!-- contain-to-grid -->
