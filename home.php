<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>

  <section class='count'>
    <div class='container-fluid'>
      <div class='row'>
        <script>
          <?php $mainBanner = get_field('mainP-banner-1'); ?>
          <?php $mainBanner_2 = get_field('mainP-banner-2'); ?>
          <?php $mainBanner_3 = get_field('mainP-banner-3'); ?>
          var mainBannerList = [
            {
              img: "<?php echo $mainBanner['mainP-banner-img-1']; ?>",
              text: "<?php echo $mainBanner['mainP-banner-text']; ?>"
            },
            {
              img: "<?php echo $mainBanner_2['mainP-banner-img-2']; ?>",
              text: "<?php echo $mainBanner_2['mainP-banner-text']; ?>"
            },
            {
              img: "<?php echo $mainBanner_3['mainP-banner-img-3']; ?>",
              text: "<?php echo $mainBanner_3['mainP-banner-text']; ?>"
            }
          ];
          var mainSliderCount = 0;
          setInterval(function () {
            mainSliderCount++;
            if(mainSliderCount > 2) {
              mainSliderCount = 0;
            }
            console.log(mainBannerList);
            $('.head').css('background-image', 'url(' + mainBannerList[mainSliderCount].img + ')');
            $('.head__content__text p').html(mainBannerList[mainSliderCount].text);
          }, 5000);
        </script>
        <h3>CGCG в цифрах</h3>
      </div>
    </div>
    <?php $count_1 = get_field('mainP-count-1'); ?>
    <?php $count_2 = get_field('mainP-count-2'); ?>
    <?php $count_3 = get_field('mainP-count-3'); ?>
    <?php $count_4 = get_field('mainP-count-4'); ?>
    <?php $count_5 = get_field('mainP-count-5'); ?>
    <?php $partner_1 = get_field('partner-1'); ?>
    <?php $partner_2 = get_field('partner-2'); ?>
    <?php $partner_3 = get_field('partner-3'); ?>
    <?php $partner_4 = get_field('partner-4'); ?>
    <?php $partner_5 = get_field('partner-5'); ?>
    <?php $partner_6 = get_field('partner-6'); ?>
    <div class='count__dotted'>
      <div class='container-fluid'>
        <div class='count__slider'>
          <div class='count__slider__item'>
            <div class='icon' style="background-image:url(<?php echo $count_1['icon-1']; ?>.);"></div>
            <div class='number'><?php echo $count_1['count']; ?></div>
            <div class='text'><?php echo $count_1['name']; ?></div>
          </div>
          <div class='count__slider__item'>
            <div class='icon' style="background-image:url(<?php echo $count_2['icon-2']; ?>.);"></div>
            <div class='number'><?php echo $count_2['count']; ?></div>
            <div class='text'><?php echo $count_2['name']; ?></div>
          </div>
          <div class='count__slider__item'>
            <div class='icon' style="background-image:url(<?php echo $count_3['icon-3']; ?>.);"></div>
            <div class='number'><?php echo $count_3['count']; ?></div>
            <div class='text'><?php echo $count_3['name']; ?></div>
          </div>
          <div class='count__slider__item'>
            <div class='icon' style="background-image:url(<?php echo $count_4['icon-4']; ?>.);"></div>
            <div class='number'><?php echo $count_4['count']; ?></div>
            <div class='text'><?php echo $count_4['name']; ?></div>
          </div>
          <div class='count__slider__item'>
            <div class='icon' style="background-image:url(<?php echo $count_5['icon-5']; ?>.);"></div>
            <div class='number'><?php echo $count_5['count']; ?></div>
            <div class='text'><?php echo $count_5['name']; ?></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.count -->

  <section class='projects'>
    <h3>Проекты</h3>
    <div class='container-fluid'>
      <div class='row'>
        <div class='projects__allprojects'><a href="/проекты">Все проекты</a></div>
      </div>
      <div class='row'>
        <?php
        $args = array(
          'numberposts' => 3,
          'orderby'     => 'date',
          'order'       => 'DESC',
          'post_type'   => 'projects',
          'suppress_filters' => true,
        );

        $posts = get_posts( $args );

        foreach($posts as $post){ setup_postdata($post);
          ?>
          <div class='col-12 col-md-4 no-padding'>
            <a href="<?php the_permalink(); ?>">
              <div class='projects__item' style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">
                <div class='about'>
                  <div class='name'><?php the_title(); ?></div>
                  <div class='desc'><?php $categroy_project = get_the_category(); echo $categroy_project[0]->name; ?></div>
                  <div class='project__desc'><?php $ex = get_the_excerpt(); print_r($ex); ?></div>
                  <div class='about__plus'>
                    <div class='about__plus__item'></div>
                    <div class='about__plus__item'></div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <?php
        }
        wp_reset_postdata(); // сброс
        ?>
      </div>
      <div class='row'>
        <div class='projects__desc'>
          Данное предложение распространяется на жителей - России, Грузии, Казахстана, Эстонии, Латвии, Республики Беларусь,
          Турции, Объединенных Арабских Эмиратов, Азербайджана, Узбекистана, Армении. И не рекомендуется для покупки и продажи в
          США и иных странах, где регулирование криптоактивов не предусмотрено законодательством этих стран.
        </div>
      </div>
    </div>
  </section>

  <section class='news'>
    <div class='container-fluid'>
      <div class='row'>
        <h3>Новости</h3>
      </div>
      <div class='row'>
        <div class='projects__allprojects'><a href='/новости'>Все новости</a></div>
      </div>
      <div class='row news__row'>
        <div class="owl-carousel owl-theme">
          <?php
          $cur_post = $posts;
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
          wp_reset_postdata(); // сброс
          $posts = $cur_post;
          ?>
        </div>
      </div>
    </div>
  </section>
  <!-- /.news -->

<!--partners-->
<?php
if($partner_1 != '' or $partner_2 != ''  or $partner_3 != ''  or $partner_4 != ''  or $partner_5 != ''  or $partner_6 != '') {
  ?>
  <section class='partners'>
    <div class='container-fluid'>
      <div class='row'>
        <h3>Партнеры</h3>
      </div>
      <div class='partners__row'>
        <?php if($partner_1 != '') {?> <div class='partners__item' style="background-image: url(<?php echo $partner_1; ?>);"></div> <?php;} ?>
        <?php if($partner_2 != '') {?> <div class='partners__item' style="background-image: url(<?php echo $partner_2; ?>);"></div> <?php;} ?>
        <?php if($partner_3 != '') {?> <div class='partners__item' style="background-image: url(<?php echo $partner_3; ?>);"></div> <?php;} ?>
        <?php if($partner_4 != '') {?> <div class='partners__item' style="background-image: url(<?php echo $partner_4; ?>);"></div> <?php;} ?>
        <?php if($partner_5 != '') {?> <div class='partners__item' style="background-image: url(<?php echo $partner_5; ?>);"></div> <?php;} ?>
        <?php if($partner_6 != '') {?> <div class='partners__item' style="background-image: url(<?php echo $partner_6; ?>);"></div> <?php;} ?>
      </div>
    </div>
  </section>
  <?php
}
?>
<!-- /.partners -->

<?php get_footer(); ?>

