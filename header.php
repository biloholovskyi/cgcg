<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <meta http-equiv='X-UA-Compatible' content='ie=edge'>
  <?php wp_head(); ?>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap-grid.css'>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&amp;subset=latin-ext" rel="stylesheet">
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
  <title>CGCG</title>
</head>
<body>
<?php $mainBanner = get_field('mainP-banner-1'); ?>
<?php $mainBanner_2 = get_field('mainP-banner-2'); ?>
<?php $mainBanner_3 = get_field('mainP-banner-3'); ?>

<header class='head head--main' style="background-image: url(<?php echo $mainBanner['mainP-banner-img-1']; ?>);">
  <div class='container-fluid' style="min-height: 100vh; height: auto;">
    <div class='row'>
      <div class='head__wrapper'>
        <div class='head__wrapper--inner'>
          <div class='head__logo'><a href="<?php echo home_url(); ?>"></a></div>
          <div class='head__lang'>
            <span class="lang">RU</span>
            <span class="hidde-lang"><a href="http://eng.cgcg.world/">ENG</a></span>
          </div>
          <?php
          wp_nav_menu( [
            'theme_location'  => 'header',
            'menu'            => '',
            'container'       => 'nav',
            'container_class' => 'head__nav',
            'container_id'    => '',
            'menu_class'      => '',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 0,
            'walker'          => '',
          ] );
          ?>
          <nav class="head__nav head__nav--main">
            <ul style="width: 100%;">
              <div class="mobile-nav-btn-wrapp">
                <div class="mobile-modal"></div>
                <a href="https://cosmosgng.com/do.vshow#login?where=%23dashboard" target="_blank" class='mobile-enter'></a>
              </div>
            </ul>
          </nav>
        </div>
        <div class='head__wrapper--innertwo'>
          <div class='head__mail'></div>
          <a href="https://cosmosgng.com/do.vshow#login?where=%23dashboard" target="_blank" class='head__enter'></a>
          <div class='head__mobile'>
            <div class='item'></div>
            <div class='item'></div>
            <div class='item'></div>
          </div>
        </div>
      </div>
    </div>
    <div class='row' style="min-height: 100vh; height: auto;">
      <div class='head__content'>
        <div class='head__content__text'>
          <p><?php echo $mainBanner['mainP-banner-text']; ?></p>
        </div>
      </div>
    </div>
  </div>
  <div class='head__hovercard'>
    <?php $hoverBlocks = get_field('mainP-4blocks-1'); ?>
    <?php $hoverBlocks_2 = get_field('mainP-4blocks-2'); ?>
    <?php $hoverBlocks_3 = get_field('mainP-4blocks-3'); ?>
    <?php $hoverBlocks_4 = get_field('mainP-4blocks-4'); ?>
    <div class='head__hovercard__item' data-count="0">
      <div class='name'><?php echo $hoverBlocks['name']; ?></div>
      <div class='desc'><?php echo $hoverBlocks['text']; ?></div>
      <div class='decor'>
        <div class='item'></div>
        <div class='item'></div>
      </div>
    </div>
    <div class='head__hovercard__item' data-count="0">
      <div class='name'><?php echo $hoverBlocks_2['name']; ?></div>
      <div class='desc'><?php echo $hoverBlocks_2['text']; ?></div>
      <div class='decor'>
        <div class='item'></div>
        <div class='item'></div>
      </div>
    </div>
    <div class='head__hovercard__item' data-count="0">
      <div class='name'><?php echo $hoverBlocks_3['name']; ?></div>
      <div class='desc'><?php echo $hoverBlocks_3['text']; ?></div>
      <div class='decor'>
        <div class='item'></div>
        <div class='item'></div>
      </div>
    </div>
    <div class='head__hovercard__item' data-count="0">
      <div class='name'><?php echo $hoverBlocks_4['name']; ?></div>
      <div class='desc'><?php echo $hoverBlocks_4['text']; ?></div>
      <div class='decor'>
        <div class='item'></div>
        <div class='item'></div>
      </div>
    </div>
  </div>
  <!-- /.head__hovercard -->
</header>
<!-- /.head -->