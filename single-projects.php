<?php get_header('page'); ?>

  <section class='main-block-project main-block-project--single' style="background-image: url(<?php echo get_field('proj-banner'); ?>);">
    <div class='project-page-wrapper'>
      <div class='project-page__inner-wrapper'>
        <div class='breadcrumb'>
          <a href='<?php echo home_url(); ?>'>Главная</a>
          <a href='/проекты'>Проекты</a>
          <span><?php the_title(); ?></span>
        </div>
        <h1><?php the_title(); ?></h1>
        <div class='line-decor'></div>
        <div class='desc'><?php $categroy_project = get_the_category(); echo $categroy_project[0]->name; ?></div>
      </div>
      <div class='button-wrapper'>
        <button class='main-button project-presintation-btn'><span><a href="<?php echo get_field('proj-doc'); ?>" download="">ПРЕЗЕНТАЦИЯ</a></span>
          <div class='hover-decor'></div>
        </button>
        <button class='main-button project-investetion-btn'><span>ИНВЕСТИРОВАТЬ</span>
          <div class='hover-decor'></div>
        </button>
      </div>
    </div>
  </section>

  <section class='description-project'>
    <h3>Описание проекта</h3>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-12 col-md-6'>
          <div class='description-project__text'><?php the_post(); the_content(); ?></div>
        </div>
        <div class='col-12 col-md-6 description-project__img__wrapper'>
          <div class='description-project__img' style="background-image: url(<?php echo get_field('proj-img'); ?>);"></div>
        </div>
      </div>
    </div>
  </section>

  <?php
    $project_video = get_field('proj-video');
    if($project_video != '') {
      ?>
      <section class='project-video'>
        <div class='container-fluid'>
          <div class='row'>
            <div class='project-video__block'>
              <video preload="none" controls="controls" loop="" playsinline="true"
                     src="<?php echo $project_video; ?>" class=""></video>
            </div>
          </div>
        </div>
      </section>
      <?php
    }
  ?>

  <section class='about-content about-content--show'>
    <div class='about-leader'>
      <div class='container'>
        <h3 class='leader__title'>Команда</h3>
        <div class='row'>
          <?php
          $args = array(
            'numberposts' => -1,
            'orderby'     => 'date',
            'order'       => 'DESC',
            'post_type'   => 'project_people',
            'suppress_filters' => true,
          );
          $current_project = get_the_title();

          $posts = get_posts( $args );
          foreach($posts as $post){ setup_postdata($post);
            $peop_proj = get_field('peop-project');
            $project_title = $peop_proj->post_title;
            if($current_project === $project_title) {
              ?>
              <div class='col-12 col-sm-6 col-md-4'>
                <div class='leader__item'>
                  <div class='leader__item__head'>
                    <div class='icon' style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');"></div>
                    <div class='data'>
                      <div class='name'><?php the_title(); ?></div>
                      <div class='position'><?php the_field('peop-roll'); ?></div>
                      <div class='links'>
                        <div class='mail'><a href='mailto:<?php the_field("peop-mail"); ?>'></a></div>
                      </div>
                    </div>
                  </div>
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

  <!--partners-->
  <?php
    $pl = get_field('partners_list');
    if($pl['partner-1'] != '' or $pl['partner-2'] != ''  or $pl['partner-3'] != ''  or $pl['partner-4'] != ''  or $pl['partner-5'] != ''  or $pl['partner-6'] != '') {
      ?>
      <section class='partners'>
        <div class='container-fluid'>
          <div class='row'>
            <h3>Партнеры</h3>
          </div>
          <div class='partners__row'>
            <?php if($pl['partner-1'] != '') {?> <div class='partners__item' style="background-image: url(<?php echo $pl['partner-1']; ?>);"></div> <?php;} ?>
            <?php if($pl['partner-2'] != '') {?> <div class='partners__item' style="background-image: url(<?php echo $pl['partner-2']; ?>);"></div> <?php;} ?>
            <?php if($pl['partner-3'] != '') {?> <div class='partners__item' style="background-image: url(<?php echo $pl['partner-3']; ?>);"></div> <?php;} ?>
            <?php if($pl['partner-4'] != '') {?> <div class='partners__item' style="background-image: url(<?php echo $pl['partner-4']; ?>);"></div> <?php;} ?>
            <?php if($pl['partner-5'] != '') {?> <div class='partners__item' style="background-image: url(<?php echo $pl['partner-5']; ?>);"></div> <?php;} ?>
            <?php if($pl['partner-6'] != '') {?> <div class='partners__item' style="background-image: url(<?php echo $pl['partner-6']; ?>);"></div> <?php;} ?>
          </div>
        </div>
      </section>
      <?php
    }
  ?>

  <section class='news'>
    <div class='container-fluid'>
      <div class='row'>
        <h3>Новости проекта</h3>
      </div>
      <div class='row'>
        <div class='projects__allprojects'><a href='./новости'>Все новости</a></div>
      </div>
      <div class='row news__row'>
        <div class="owl-carousel owl-theme">
          <?php
          $current_post = $post;
          $args = array(
            'numberposts' => -1,
            'orderby'     => 'date',
            'order'       => 'DESC',
            'post_type'   => 'post',
            'suppress_filters' => true,
          );

          $posts = get_posts( $args );
          $news_icon = get_template_directory_uri() . '/img/icon/projects.svg';
          foreach($posts as $post){ setup_postdata($post);
            $news_project = get_field('news_project');
            $news_project = $news_project->post_title;
            if($current_project == $news_project) {
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
          }
          wp_reset_postdata();
          $post = $current_post;
          ?>
        </div>
      </div>
    </div>
  </section>

  <section class='project-contacts'>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-12 col-md-4'>
          <div class='project-contacts__block'>
            <div class='link-title'>Сайт</div>
            <a href='http://<?php the_field('proj-site'); ?>' target="_blank" class='link'><?php the_field('proj-site'); ?></a>
            <div class='link-title'>E-mail</div>
            <a href='mailto:<?php the_field("proj-email"); ?>' class='link'><?php the_field('proj-email'); ?></a>
            <div class='project-contacts__social'>
              <div class='social-title'>Социальные сети</div>
              <div class='project__social-links'>
                <?php
                $socials = get_field('proj-socials');
                foreach($socials as $soc) {
                  if($soc['link'] != '') {
                    if($soc['type'] == 'twitter') {
                      $soc_icon = get_template_directory_uri() . '/img/icon/twitter.svg;';
                    } else if($soc['type'] == 'vk') {
                      $soc_icon = get_template_directory_uri() . '/img/icon/vk.svg;';
                    } else if($soc['type'] == 'facebook') {
                      $soc_icon = get_template_directory_uri() . '/img/icon/facebook.svg;';
                    } else if($soc['type'] == 'instagram') {
                      $soc_icon = get_template_directory_uri() . '/img/icon/instagram.svg;';
                    } else if($soc['type'] == 'youtube') {
                      $soc_icon = get_template_directory_uri() . '/img/icon/youtube.svg;';
                    } else if($soc['type'] == 'telegram') {
                      $soc_icon = get_template_directory_uri() . '/img/icon/telegram.svg;';
                    }
                    ?>
                    <div class='item' style="background-image: url(<?php echo $soc_icon; ?>); <?php if($soc['type'] == 'facebook') {echo '-webkit-background-size: 15px;background-size: 15px;';} ?>" ><a href='<?php echo $soc['link']; ?>' target="_blank"></a></div>
                    <?php
                  }
                }
                ?>
              </div>
            </div>
          </div>
        </div>
        <div class='col-12 col-md-8 no-padding-767'>
          <section class="new-form" id='single-projects-form'>
            <div class="container-fluid">
              <div class="row">
                <h3 class="new-form__title">Остались вопросы? Напишите нам!</h3>
                <form id="single-project-form">
                <span class="new-form__input__wrapper new-form__input__wrapper--name">
                  <input type="text" name="form-name" id="form-name" class="new-form__input">
                </span>
                  <div class="new-form__input__double">
                  <span class="new-form__input__wrapper new-form__input__wrapper--email">
                    <input type="email" name="form-email" id="form-email" class="new-form__input" required>
                  </span>
                    <span class="new-form__input__wrapper new-form__input__wrapper--phone">
                    <input type="tel" id="form-tel" name="form-tel" class="new-form__input" required>
                  </span>
                  </div>
                  <span class="new-form__input__wrapper new-form__input__wrapper--submit">
                  <input type="submit" class="new-form__input" value="Отправить">
                  <span class="hover-decor"></span>
                </span>
                </form>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>