<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="UTF-8">
  <title>Level1</title>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="global-header">

  <div class="wrap">

    <div class="global-header__left">

      <a href="<?php echo get_home_url(); ?>" class="global-header__logo">
        <img src="<?php echo get_template_directory_uri(); ?>/images/level1-logo.svg" alt="Level1">
      </a>

    </div>
    <!-- /.global-header__left -->

    <div class="global-header__center">
      <div>

        <div class="global-header__caption">
          <p>VIRTUAALSUS ╱ VIDEOMÄNGUD ╱ KULTUUR</p>
        </div>

        <?php
        wp_nav_menu( array(
          'theme_location'  => 'header_menu',
          'container'       => 'nav',
          'container_class' => 'global-header__nav',
          'menu_class'      => '',
          'depth'           => 1
        ) );
        ?>

      </div>

    </div>
    <!-- /.global-header__center -->

    <div class="global-header__right">

      <div class="global-header__alt-menu">
        <ul>
          <li>
            <a href="#">
              <svg class="icon">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/images/icons/dist/icons.svg#instagram-icon"/>
              </svg>
            </a>
          </li>
          <li>
            <a href="#">
              <svg class="icon">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/images/icons/dist/icons.svg#youtube-icon"/>
              </svg>
            </a>
          </li>
          <li>
            <a href="#">
              <svg class="icon">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/images/icons/dist/icons.svg#facebook-icon"/>
              </svg>
            </a>
          </li>
          <li>
            <a href="#">
              <svg class="icon">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/images/icons/dist/icons.svg#twitter-icon"/>
              </svg>
            </a>
          </li>
          <li>
            <a href="#">
              <svg class="icon">
                <use xlink:href="<?php echo get_template_directory_uri(); ?>/images/icons/dist/icons.svg#search-icon"/>
              </svg>
            </a>
          </li>
        </ul>
      </div>
      <!-- /.global-header__additional-menu -->

    </div>
    <!-- /.global-header__right -->

  </div>
  <!-- /.wrap -->

  <div class="progressbar">
    <div class="wrap">
      <div class="global-header__progress-left"></div>
      <div class="global-header__progress-center">
        <div class="global-header__progress-container">
          <div class="global-header__progress-bar"></div>
        </div>
      </div>
      <div class="global-header__progress-right"></div>
    </div>
  </div>

</header>
