<?php
/*
Template Name: Contacts
*/
?>
<?php get_header('page'); ?>
<section class='main-block-project main-block-project--contacts'>
  <div class='project-page-wrapper'>
    <div class='breadcrumb'>
      <a href='<?php echo home_url(); ?>'>Главная</a>
      <span><?php the_title(); ?></span>
    </div>
    <h1>Контакты</h1>
    <div class='line-decor'></div>
  </div>
  <div class="contact__haeder-nav">
    <div class="project-page-wrapper">
      <?php
      $current_post = $post;
      $map_count = 0;
      $args = array(
        'numberposts' => -1,
        'orderby'     => 'date',
        'order'       => 'ASC',
        'post_type'   => 'maps',
        'suppress_filters' => true,
      );

      $posts = get_posts( $args );
      foreach($posts as $post){ setup_postdata($post);
        $map_count++;
        ?>
        <div class="item<?php if($map_count < 2) {echo ' active';} ?>" id="map-btn-<?php echo $map_count; ?>"><?php the_title(); ?></div>
        <?php
      }
      wp_reset_postdata();
      $post = $current_post;
      ?>
    </div>
  </div>
</section>

<?php
$current_post = $post;
$args = array(
  'numberposts' => -1,
  'orderby'     => 'date',
  'order'       => 'DESC',
  'post_type'   => 'main_settings',
  'suppress_filters' => true,
);

$posts = get_posts( $args );
$social_arr = array();

foreach($posts as $post){ setup_postdata($post);
  $name_id = $post->post_title;
  if ($name_id === 'Соц сети') {
    $footer_socials = get_field('main-set-socials');
    foreach($footer_socials as $soc) {
      if($soc['link'] != '') {
        if($soc['social'] == 'twitter') {
          $soc_icon = get_template_directory_uri() . '/img/icon/twitter.svg;';
        } else if($soc['social'] == 'vk') {
          $soc_icon = get_template_directory_uri() . '/img/icon/vk.svg;';
        } else if($soc['social'] == 'facebook') {
          $soc_icon = get_template_directory_uri() . '/img/icon/facebook.svg;';
        } else if($soc['social'] == 'instagram') {
          $soc_icon = get_template_directory_uri() . '/img/icon/instagram.svg;';
        } else if($soc['social'] == 'Youtube') {
          $soc_icon = get_template_directory_uri() . '/img/icon/youtube.svg;';
        } else if($soc['social'] == 'telegram') {
          $soc_icon = get_template_directory_uri() . '/img/icon/telegram.svg;';
        }

        if($soc['social'] == 'facebook') {
          array_push($social_arr, '<div class="item" style="background-image: url('.$soc_icon.');-webkit-background-size: 10px;background-size: 10px;"><a href='.$soc['link'].' target="_blank"></a></div>');
        } else {
          array_push($social_arr, '<div class="item" style="background-image: url('.$soc_icon.');"><a href='.$soc['link'].' target="_blank"></a></div>');
        }
      }
    }
  }
}
wp_reset_postdata();
$post = $current_post;
?>

<?php
$current_post = $post;
$map_block_count = 0;
$args = array(
  'numberposts' => -1,
  'orderby'     => 'date',
  'order'       => 'ASC',
  'post_type'   => 'maps',
  'suppress_filters' => true,
);

$posts = get_posts( $args );
foreach($posts as $post){ setup_postdata($post);
  $map_block_count++;
  ?>
  <section class="contacts__map map-<?php echo $map_block_count; ?><?php if($map_block_count < 2) {echo ' map-active';} ?>" id="map-<?php echo $map_block_count; ?>">
    <div class="contacts__map__address">
      <div class="colapse__address">
        Свернуть адрес
        <div class="decore">
          <div class="item"></div>
          <div class="item"></div>
        </div>
      </div>
      <div class="bg__address">
        <div class="title"><?php the_field('map-title'); ?></div>
        <div class="address-title">Адрес</div>
        <div class="address-text"><?php the_field('map-address'); ?></div>
        <div class="address-title">Телефон и факс</div>
        <div class="address-text"><a href="tel:<?php echo preg_replace('/\s+/', '', get_field('map-tel')); ?> "><?php the_field('map-tel'); ?></a></div>
        <div class="address-mail"><a href="mailto:<?php the_field('map-email'); ?>"><?php the_field('map-email'); ?></a></div>
        <div class="address__social">
          <?php
          foreach ($social_arr as $sa) {
            echo $sa;
          }
          ?>
        </div>
      </div>
    </div>
  </section>
  <?php
}
wp_reset_postdata();
$post = $current_post;
?>

<section class='project-contacts project-contacts--contacts'>
  <div class='container-fluid'>
    <div class='row'>
      <div class='col-12 col-md-4'>
        <div class='project-contacts__block'>
          <?php
          $current_post = $post;
          $args = array(
            'numberposts' => -1,
            'orderby'     => 'date',
            'order'       => 'DESC',
            'post_type'   => 'main_settings',
            'suppress_filters' => true,
          );

          $posts = get_posts( $args );
          foreach($posts as $post){ setup_postdata($post);
            $contacts_name_id = $post->post_title;
            if($contacts_name_id === 'Контакты') {
              $contacts_number = get_field('main-set-number');
              $contacts_number_clear = preg_replace('/\s+/', '', $contacts_number);
              $contacts_email = get_field('main-set-email');
            } elseif ($contacts_name_id === 'Реквизиты') {
              $contacts_reqiz = get_field('main-set-reqiz');
            }
          }
          wp_reset_postdata();
          $post = $current_post;
          ?>
          <div class='link-title'>Телефон</div>
          <a href='tel:<?php echo $contacts_number_clear; ?>' class='link'><?php echo $contacts_number; ?></a>
          <div class='link-title'>E-mail</div>
          <a href='mailto:<?php echo $contacts_email; ?>' class='link'><?php echo $contacts_email; ?></a>
        </div>
      </div>
      <div class='col-12 col-md-8 no-padding-767'>
        <section class="new-form" id='single-projects-form'>
          <div class="container-fluid">
            <div class="row">
              <h3 class="new-form__title">Остались вопросы? Напишите нам!</h3>
              <form id="contact-form">
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

<!--documents-->

<?php get_footer(); ?>
<script src="https://api-maps.yandex.ru/2.1/?apikey=<ваш API-ключ>&lang=ru_RU" type="text/javascript">
</script>
<script>
  ymaps.ready(init);
  function init(){
    <?php
    $current_post = $post;
    $map_code_count = 0;
    $args = array(
      'numberposts' => -1,
      'orderby'     => 'date',
      'order'       => 'ASC',
      'post_type'   => 'maps',
      'suppress_filters' => true,
    );

    $posts = get_posts( $args );
    foreach($posts as $post){ setup_postdata($post);
    $map_code_count++;
    ?>
    var myMap<?php echo $map_code_count; ?> = new ymaps.Map("map-<?php echo $map_code_count; ?>", {
      center: <?php the_field('map-coordinates'); ?>,
      zoom: 16
    });


    myMap<?php echo $map_code_count; ?>.behaviors.disable(['drag', 'scrollZoom', 'dblClickZoom']);

    myMap<?php echo $map_code_count; ?>.controls
      .remove('trafficControl')
      .remove('fullscreenControl')
      .remove('rulerControl')
      .remove('typeSelector');

    var myPin<?php echo $map_code_count; ?> = new ymaps.Placemark(<?php the_field('map-coordinates'); ?>,
      {
        balloonContentHeader: 'CGCG',
        balloonContentBody: 'COSMOS GLOBAL COMMUNITY GROUP',
        balloonContentFooter: '',
        hintContent: 'CGCG'
      },
      {
        iconLayout: 'default#image',
        iconImageHref: 'https://amitil-studio.ru/works/cgcg-wp/wp-content/themes/cgcg/img/icon/map-pin.png',
        iconImageSize: [70, 74],
        iconImageOffset: [-3, -3]
      });

    myMap<?php echo $map_code_count; ?>.geoObjects.add(myPin<?php echo $map_code_count; ?>);
    <?php
    }
    wp_reset_postdata();
    $post = $current_post;
    ?>
  }
</script>
