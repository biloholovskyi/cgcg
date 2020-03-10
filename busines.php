<?php
/*
Template Name: Busines
*/
?>
<?php get_header('page'); ?>

<section class="busines-main-banner">
  <div class="container-fluid">
    <h1><?php the_field('busines-banner-text'); ?></h1>
    <button class='main-button start-busines'>
      <span>Хочу начать бизнес</span>
      <div class='hover-decor'></div>
    </button>
    <div class="row">
      <div class="busines-inner-nav">
        <div class="item active" id="busines-whis-us">Бизнес с нами</div>
        <div class="item" id="busines-us-leaders">Наша команда</div>
      </div>
    </div>
  </div>
</section>

<section class="busines-section busines-section--active" id="whis-us">
  <section class="busines-partner">
    <div class="container-fluid">
      <h3 class="busines-partner__title">Мы приглашаем Вас стать нашим независимым Партнером!</h3>
      <div class="busines-partner__content">
        <div class="item">
          <div class="icon" style="background-image:url('<?php echo get_field('bussines-1-1')['icon-1']; ?>');"></div>
          <div class="text"><?php echo get_field('bussines-1-1')['desc']; ?></div>
        </div>
        <div class="item">
          <div class="icon" style="background-image:url('<?php echo get_field('bussines-1-2')['icon-2']; ?>');"></div>
          <div class="text"><?php echo get_field('bussines-1-2')['desc']; ?></div>
        </div>
        <div class="item">
          <div class="icon" style="background-image:url('<?php echo get_field('bussines-1-3')['icon-3']; ?>');"></div>
          <div class="text"><?php echo get_field('bussines-1-3')['desc']; ?></div>
        </div>
      </div>
      <div class="quote-wrapp">
        <div class="busines-partner__quote">
          <div class="text">Великие возможности видят не глазами, их видят умом!</div>
          <div class="author">Роберт Кийосаки</div>
        </div>
      </div>
    </div>
  </section>

  <section class="busines-text">
    <div class="text"><?php the_field('bussines-block-text'); ?></div>
  </section>
  <section class="busines-invest">
    <div class="invest-box invest-box--img"></div>
    <div class="invest-box invest-box--text">
      <div class="text-title"><?php the_field('bussines-invest-title'); ?></div>
      <div class="text-desc"><?php the_field('bussines-invest-text'); ?></div>
    </div>
  </section>
  <section class='projects projects--page busines-income'>
    <h3 class="busines-income__title">Решите какой доход Вы хотите для себя</h3>
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-12 col-md-4 no-padding project-show'>
          <div class='projects__item' style="background-image: url(<?php echo get_template_directory_uri() . '/img/income-1.jpg'; ?>);">
            <div class='about'>
              <?php
              $income_1 = get_field('income-first');
              $income_2 = get_field('income-second');
              $income_3 = get_field('income-third');
              ?>
              <div class='name'><?php echo $income_1['income-name']; ?></div>
              <div class='project__desc'><?php echo $income_1['income-text']; ?></div>
              <div class='about__plus'>
                <div class='about__plus__item'></div>
                <div class='about__plus__item'></div>
              </div>
            </div>
          </div>
        </div>
        <div class='col-12 col-md-4 no-padding project-show'>
          <div class='projects__item' style="background-image: url(<?php echo get_template_directory_uri() . '/img/income-2.jpg'; ?>);">
            <div class='about'>
              <div class='name'><?php echo $income_2['income-name']; ?></div>
              <div class='project__desc'><?php echo $income_2['income-text']; ?></div>
              <div class='about__plus'>
                <div class='about__plus__item'></div>
                <div class='about__plus__item'></div>
              </div>
            </div>
          </div>
        </div>
        <div class='col-12 col-md-4 no-padding project-show'>
          <div class='projects__item' style="background-image: url(<?php echo get_template_directory_uri() . '/img/invome-3.jpg'; ?>);">
            <div class='about'>
              <div class='name'><?php echo $income_3['income-name']; ?></div>
              <div class='project__desc'><?php echo $income_3['income-text']; ?></div>
              <div class='about__plus'>
                <div class='about__plus__item'></div>
                <div class='about__plus__item'></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="busines-text-img">
    <div class="busines-text-img__box busines-text-img__box--desc">
      <?php the_field('bussines-text-photo-text'); ?>
    </div>
    <div class="busines-text-img__box busines-text-img__box--img"></div>
  </section>
  <section class="busines-card">
    <div class="container-fluid">
      <div class="row">
        <h3 class="busines-card__title"><?php the_field('bussines-photo-card-title'); ?></h3>
      </div>
      <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
          <div class="busines-card__item" style="background-image: url('<?php echo get_field('bussines-photo-card-1')['photo-1']; ?>');">
            <div class="line"></div>
            <div class="name"><?php echo get_field('bussines-photo-card-1')['name']; ?></div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
          <div class="busines-card__item" style="background-image: url('<?php echo get_field('bussines-photo-card-2')['photo-2']; ?>');">
            <div class="line"></div>
            <div class="name"><?php echo get_field('bussines-photo-card-2')['name']; ?></div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
          <div class="busines-card__item" style="background-image: url('<?php echo get_field('bussines-photo-card-3')['photo-3']; ?>');">
            <div class="line"></div>
            <div class="name"><?php echo get_field('bussines-photo-card-3')['name']; ?></div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
          <div class="busines-card__item" style="background-image: url('<?php echo get_field('bussines-photo-card-4')['photo-4']; ?>');">
            <div class="line"></div>
            <div class="name"><?php echo get_field('bussines-photo-card-4')['name']; ?></div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
          <div class="busines-card__item" style="background-image: url('<?php echo get_field('bussines-photo-card-5')['photo-5']; ?>');">
            <div class="line"></div>
            <div class="name"><?php echo get_field('bussines-photo-card-5')['name']; ?></div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
          <div class="busines-card__item" style="background-image: url('<?php echo get_field('bussines-photo-card-6')['photo-6']; ?>');">
            <div class="line"></div>
            <div class="name"><?php echo get_field('bussines-photo-card-6')['name']; ?></div>
          </div>
        </div>
      </div>
      <div class="row">
        <button class='main-button busines-card__btn'>
          <span>Хочу начать бизнес</span>
          <div class='hover-decor'></div>
        </button>
      </div>
    </div>
  </section>
  <section class="new-form" id='busines-form'>
    <div class="container-fluid">
      <div class="row">
        <h3 class="new-form__title">Связаться с нами</h3>
        <form id="main-bussines-form">
          <span class="new-form__input__wrapper new-form__input__wrapper--name">
            <input type="text" name="inp-name" id="inp-name" class="new-form__input">
          </span>
          <div class="new-form__input__double">
            <span class="new-form__input__wrapper new-form__input__wrapper--email">
              <input type="email" name="inp-email" id="inp-email" class="new-form__input" required>
            </span>
            <span class="new-form__input__wrapper new-form__input__wrapper--phone">
              <input type="tel" name="inp-tel" id="inp-tel" class="new-form__input" required>
            </span>
          </div>
          <span class="new-form__input__wrapper new-form__input__wrapper--about-project">
            <input type="text" name="inp-text" id="inp-text" class="new-form__input">
          </span>
          <span class="new-form__input__wrapper new-form__input__wrapper--submit">
            <input type="submit" class="new-form__input" value="Отправить">
            <span class="hover-decor"></span>
          </span>
        </form>
      </div>
    </div>
  </section>
</section>
<section class="busines-section" id="us-leaders">
  <section class='about-content about-content--show'>
    <div class='about-leader'>
      <div class='container'>
        <!-- <h3 class='leader__title'>Руководство</h3> -->
        <div class='row'>
          <?php
          $args = array(
            'numberposts' => -3,
            'orderby'     => 'date',
            'order'       => 'DESC',
            'post_type'   => 'main_leaders',
            'suppress_filters' => true,
          );

          $posts = get_posts( $args );

          foreach($posts as $post){ setup_postdata($post);
            ?>
            <div class="col-12 col-sm-6 col-md-6 no-padding">
              <div class="new-leader" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">
                <div class="new-leader-hower" style="background-image: url('<?php echo get_field('main-lead-photo'); ?>');"></div>
                <div class="name"><?php the_title(); ?></div>
                <div class="city"><?php the_field('main-lead-city'); ?></div>
                <a href='mailto:<?php the_field("main-lead-mail"); ?>' class="icon"></a>
              </div>
            </div>
            <?php
          }
          wp_reset_postdata(); // сброс
          ?>
        </div>
      </div>
    </div>
    <section class="new-form" id="to-bacome-partner-form">
      <div class="container-fluid">
        <div class="row">
          <h3 class="new-form__title">Станьте нашим партнером?</h3>
          <form id="bussines-personal-form">
          <span class="new-form__input__wrapper new-form__input__wrapper--name">
            <input type="text" name="inpt-name" id="inpt-name" class="new-form__input">
          </span>
            <div class="new-form__input__double">
            <span class="new-form__input__wrapper new-form__input__wrapper--email">
              <input type="email" name="inpt-email" id="inpt-email" class="new-form__input" required>
            </span>
              <span class="new-form__input__wrapper new-form__input__wrapper--phone">
              <input type="tel" name="inpt-tel" id="inpt-tel" class="new-form__input" required>
            </span>
            </div>
            <span class="new-form__input__wrapper new-form__input__wrapper--about">
            <input type="text" name="inpt-text" id="inpt-text" class="new-form__input">
          </span>
            <span class="new-form__input__wrapper new-form__input__wrapper--submit">
            <input type="submit" class="new-form__input" value="Отправить">
            <span class="hover-decor"></span>
          </span>
          </form>
        </div>
      </div>
    </section>
  </section>
</section>

<?php get_footer(); ?>
