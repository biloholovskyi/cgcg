<?php
/*
Template Name: News
*/
?>
<?php get_header('page'); ?>

<section class='main-block-project main-block-project--news'>
  <div class='project-page-wrapper'>
    <div class='breadcrumb'>
      <a href='<?php echo home_url(); ?>'>Главная</a>
      <span><?php the_title(); ?></span>
    </div>
    <h1>Новости</h1>
    <div class='line-decor'></div>
    <div class="news__switcher">
      <div class="news__switcher__wrapper">
        <input type="checkbox" checked class="swich-input" name="swich-all" id="swich-all">
        <label for="swich-all"><div class="check-block check-block--active" id="check-all"></div>Все новости</label>
      </div>
      <div class="news__switcher__wrapper">
        <input type="checkbox" class="swich-input" name="swich-all" id="swich-project">
        <label for="swich-project"><div class="check-block" id="check-project"></div>Новости проектов</label>
      </div>
      <div class="news__switcher__wrapper">
        <input type="checkbox" class="swich-input" name="swich-all" id="swich-celabretion">
        <label for="swich-celabretion"><div class="check-block" id="check-celabretion"></div>Акции</label>
      </div>
      <div class="news__switcher__wrapper">
        <input type="checkbox" class="swich-input" name="swich-all" id="swich-comunity">
        <label for="swich-comunity"><div class="check-block" id="check-comunity"></div>Новости сообщества</label>
      </div>
      <div class="news__switcher__wrapper">
        <input type="checkbox" class="swich-input" name="swich-all" id="swich-event">
        <label for="swich-event"><div class="check-block" id="check-event"></div>Мероприятия</label>
      </div>
      <div class="news__switcher__wrapper">
        <input type="checkbox" class="swich-input" name="swich-all" id="swich-other">
        <label for="swich-other"><div class="check-block" id="check-other"></div>Другие новости</label>
        </dother
      </div>
    </div>
</section>

<section class="news-main-wrapper">
  <?php
  $args = array(
    'numberposts' => -1,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'post_type'   => 'post',
    'suppress_filters' => true,
  );

  $posts = get_posts( $args );
  $news_count = 0;
  foreach($posts as $post){ setup_postdata($post);
    $news_count++;
    $news_cat = get_field('news_cat');
    if($news_cat == '') {
      $news_cat = 'news-cat__other';
    }
    if($news_cat == 'news-cat__other') {
      $news_icon = get_template_directory_uri() . '/img/icon/newspaper-gold.svg';
    } else if ($news_cat == 'news-cat__project') {
      $news_icon = get_template_directory_uri() . '/img/icon/projects-gold.svg';
    } else if ($news_cat == 'news-cat__celabretion') {
      $news_icon = get_template_directory_uri() . '/img/icon/giftbox-color.svg';
    } else if ($news_cat == 'news-cat__comunity') {
      $news_icon = get_template_directory_uri() . '/img/icon/conversation-gold.svg';
    } else if ($news_cat == 'news-cat__event') {
      $news_icon = get_template_directory_uri() . '/img/icon/calendar-gold.svg';
    }
    if($news_count > 12) {
      ?>
      <div class="news-main__item <?php echo $news_cat; ?>">
        <div class="container">
          <div class="news-main__item__wrapp">
            <div class="left-block">
              <div class="icon"><div class="icon__img" style="background-image: url('<?php echo $news_icon; ?>'); "></div></div>
              <div class="date"><?php the_time('d.m.Y'); ?></div>
            </div>
            <div class="right-block">
              <div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
              <div class="desc"><?php $ex = get_the_excerpt(); print_r($ex); ?>
                <span class="decor"><a href="<?php the_permalink(); ?>"></a></span></div>
            </div>
          </div>
        </div>
      </div>
      <?php
    } else {
      ?>
      <div class="news-main__item <?php echo $news_cat; ?> news-show">
        <div class="container">
          <div class="news-main__item__wrapp">
            <div class="left-block">
              <div class="icon"><div class="icon__img" style="background-image: url('<?php echo $news_icon; ?>'); "></div></div>
              <div class="date"><?php the_time('d.m.Y'); ?></div>
            </div>
            <div class="right-block">
              <div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
              <div class="desc"><?php $ex = get_the_excerpt(); print_r($ex); ?>
                <span class="decor"><a href="<?php the_permalink(); ?>"></a></span></div>
            </div>
          </div>
        </div>
      </div>
      <?php
    }
    ?>

    <?php
  }
  wp_reset_postdata(); // сброс
  ?>
  <?php
  if($news_count > 12) {
    ?>
    <button class='main-button more-news'>
      <span>Еще новости</span>
      <div class='hover-decor'></div>
    </button>
    <?php
  }
  ?>
</section>

<?php get_footer(); ?>
