<?php
/*
Template Name: Projects
*/
?>
<?php get_header('page'); ?>
<section class='main-block-project'>
  <div class='project-page-wrapper'>
    <div class='breadcrumb'>
      <a href='<?php echo home_url(); ?>'>Главная</a>
      <span><?php the_title(); ?></span>
    </div>
    <h1>Проекты</h1>
    <div class='line-decor'></div>
    <div class='desc'>Наши аналитики ищут новые перспективные проекты, которые мы затем помогаем продвигать. Если у Вас есть проект,
      расскажите нам о нем!</div>
    <button class='main-button project-button'><span>ДОБАВИТЬ ПРОЕКТ</span><div class='hover-decor'></div></button>
  </div>
</section>

<section class='projects projects--page'>
  <div class='container-fluid'>
    <div class='row'>
      <?php
      $args = array(
        'numberposts' => -1,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'post_type'   => 'projects',
        'suppress_filters' => true,
      );

      $posts = get_posts( $args );
      $countProject = 0;
      foreach($posts as $post){ setup_postdata($post);
        $countProject++;
        if($countProject < 10) {
          ?>
          <div class='col-12 col-md-4 no-padding project-show'>
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
        } else {
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
      }
      wp_reset_postdata(); // сброс
      ?>
    </div>
    <?php
      if($countProject > 9) {
        ?>
        <button class='main-button more-project'>
          <span>Еще проекты</span>
          <div class='hover-decor'></div>
        </button>
        <?php
      }
    ?>
  </div>
</section>
<!-- /.projects -->

  <section class="new-form" id='add-projects-form'>
    <div class="container-fluid">
      <div class="row">
        <h3 class="new-form__title">Добавить проект</h3>
        <form id="main-projects-form">
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

<?php get_footer(); ?>