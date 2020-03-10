<?php get_header('page'); ?>
<script type="text/javascript" src="https://vk.com/js/api/share.js?95" charset="windows-1251"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v3.2"></script>
<section class='main-block-project main-block-project--news'>
  <div class='project-page-wrapper'>
    <div class='breadcrumb'>
      <a href='<?php echo home_url(); ?>'>Главная</a>
      <a href='./новости'>Новости</a>
      <span><?php the_title(); ?></span>
    </div>
    <h1>Новости</h1>
    <div class='line-decor'></div>
  </div>
</section>

<section class="article">
  <div class="container">
    <div class="article__title"><?php the_title(); ?></div>
    <div class="article__date"><?php the_time('d.m.Y'); ?></div>
    <div class="article__text"><?php the_post(); $cont = get_the_content(); echo $cont; ?></div>
    <div class="article__social">
      <div class="article__social__title">Поделиться новостью:</div>
      <div class="article__social__wrapper">
        <div class="social-item" style="background-image: url(<?php echo get_template_directory_uri() . '/img/icon/vk.svg'; ?>);">
          <script type="text/javascript"><!--
            document.write(VK.Share.button(false,{type: "custom", text: "<img src=\"https://vk.com/images/share_32.png\" width=\"32\" height=\"32\" />"}));
            --></script>
        </div>
        <div class="social-item" style="background-image: url(<?php echo get_template_directory_uri() . '/img/icon/twitter.svg'; ?>);">
          <a href="http://twitter.com/share?text=<?php the_title(); ?>&url=<?php echo get_page_link(); ?>" class="twitter-share-button" data-size="large" data-show-count="false" target="_blank"></a>
        </div>
        <div class="social-item" style="background-image: url(<?php echo get_template_directory_uri() . '/img/icon/facebook.svg'; ?>); -webkit-background-size: 15px;background-size: 15px;">
          <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_page_link(); ?>%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore" target="_blank"></a>
        </div>
      </div>
    </div>
    <button class='main-button all-news'>
      <a href='./новости'>ВЕРНУТЬСЯ В РАЗДЕЛ НОВОСТЕЙ</a>
      <div class='hover-decor'></div>
    </button>
  </div>
</section>

<section class='news'>
  <div class='container-fluid'>
    <div class='row'>
      <h3>Другие новости</h3>
    </div>
    <div class='row news__row'>
      <div class="owl-carousel owl-theme">
        <?php
        $art_id = get_the_ID();
        $args = array(
          'numberposts' => -1,
          'orderby'     => 'date',
          'order'       => 'DESC',
          'post_type'   => 'post',
          'suppress_filters' => true,
        );

        $posts = get_posts( $args );

        foreach($posts as $post){ setup_postdata($post);
          $news_cat = get_field('news_cat');
          if($news_cat == '') {
            $news_cat = 'news-cat__other';
          }
          if($news_cat == 'news-cat__other') {
            $news_icon = get_template_directory_uri() . '/img/icon/newspaper.svg';
          } else if ($news_cat == 'news-cat__project') {
            $news_icon = get_template_directory_uri() . '/img/icon/projects.svg';
          } else if ($news_cat == 'news-cat__celabretion') {
            $news_icon = get_template_directory_uri() . '/img/icon/giftbox.svg';
          } else if ($news_cat == 'news-cat__comunity') {
            $news_icon = get_template_directory_uri() . '/img/icon/conversation.svg';
          } else if ($news_cat == 'news-cat__event') {
            $news_icon = get_template_directory_uri() . '/img/icon/calendar.svg';
          }
          $per_link = get_the_permalink();
          $small_art_link = get_the_ID();
          if($small_art_link != $art_id) {
            ?>
            <div class='item news__item'>
              <div class='news__item__head'>
                <div class='date'>
                  <?php
                  $month = get_the_time('n');
                  $current_month = array('Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря');
                  ?>
                  <div class='date__number'><?php the_time('d'); ?></div>
                  <div class='date__month'><?php echo $current_month[$month - 1]; ?></div>
                </div>
                <div class='icon' style="background-image: url('<?php echo $news_icon; ?>');"></div>
              </div>
              <div class='news__item__title'><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></div>
              <div class='news__item__text'><?php the_post(); the_excerpt(); ?><span class='news__item__more'><a
                    href="<?php echo $per_link; ?>"></a></span>
              </div>
            </div>
            <?php
          }
        }
        wp_reset_postdata(); // сброс
        ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>