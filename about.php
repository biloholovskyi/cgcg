<?php
/*
Template Name: About
*/
?>
<?php get_header('page'); ?>

<section class='main-block-project main-block-project--company' style="background-image:url(<?php echo get_field('about-banner'); ?>);">
  <div class='inner-menu'>
    <div class='project-page-wrapper'>
      <nav class='inner-nav'>
        <ul>
          <li><span class='inner-nav__link' id='link-about'>О нас</span></li>
          <li><span class='inner-nav__link' id='link-leadership'>Руководство</span></li>
        </ul>
      </nav>
    </div>
  </div>
  <div class='project-page-wrapper'>
    <div class='breadcrumb'>
      <a href='<?php echo home_url(); ?>'>Главная</a>
      <span><?php the_title(); ?></span>
    </div>
    <h1>О компании</h1>
    <div class='line-decor'></div>
  </div>
</section>

<section class='about-content about-content--show' id='about-about'>
  <div class='container-fluid'>
    <h3 class='about-title'>География нашей работы</h3>
    <div class='geography'>
      <div class="geography__navigation">
        <div class="city_btn city_btn--active" id="btn-euro">Европа</div>
        <div class="city_btn" id="btn-asia">Азия</div>
        <div class="city_btn" id="btn-africa">Африка</div>
        <div class="city_btn" id="btn-na">Северная Америка</div>
        <div class="city_btn" id="btn-sa">Южная Америка</div>
      </div>
      <div class='row'>
        <div class='col-12 col-md-3 no-padding'>
          <div class="geography__nav__wrapper">
            <div class='geography__nav'>
              <div class='item item--show list-asia list-euro' id="map-rus">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/russia.svg"; ?>);'></div>
                <div class='contry'>Россия</div>
              </div>
              <div class='item item--show list-asia list-euro' id="map-kz">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/kazakhstan.svg"; ?>);'></div>
                <div class='contry'>Казахстан</div>
              </div>
              <div class='item list-asia' id="map-azer">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/azerbaijan.svg"; ?>);'></div>
                <div class='contry'>Азейбарджан</div>
              </div>
              <div class='item item--show list-euro' id="map-ukr">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/ukraine.svg"; ?>);'></div>
                <div class='contry'>Украина</div>
              </div>
              <div class='item list-asia' id="map-uz">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/uzbekistn.svg"; ?>);'></div>
                <div class='contry'>Узбекистан</div>
              </div>
              <div class='item list-euro item--show' id="map-md">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/moldova.svg"; ?>);'></div>
                <div class='contry'>Молдова</div>
              </div>
              <div class='item list-asia' id="map-am">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/armenia.svg"; ?>);'></div>
                <div class='contry'>Армения</div>
              </div>
              <div class='item list-asia' id="map-mn">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/mongolia.svg"; ?>);'></div>
                <div class='contry'>Монголия</div>
              </div>
              <div class='item list-asia list-euro item--show' id="map-geor">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/georgia.svg"; ?>);'></div>
                <div class='contry'>Грузия</div>
              </div>
              <div class='item list-euro item--show' id="map-ee">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/estonia.svg"; ?>);'></div>
                <div class='contry'>Эстония</div>
              </div>
              <div class='item list-euro item--show' id="map-lv">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/latvia.svg"; ?>);'></div>
                <div class='contry'>Латвия</div>
              </div>
              <div class='item list-euro item--show' id="map-de">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/germany.svg"; ?>);'></div>
                <div class='contry'>Германия</div>
              </div>
              <div class='item list-euro item--show' id="map-es">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/spain.svg"; ?>);'></div>
                <div class='contry'>Испания</div>
              </div>
              <div class='item list-euro item--show' id="map-pt">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/portugal.svg"; ?>);'></div>
                <div class='contry'>Португалия</div>
              </div>
              <div class='item list-euro item--show' id="map-nl">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/netherlands.svg"; ?>);'></div>
                <div class='contry'>Нидерланды</div>
              </div>
              <div class='item list-euro item--show' id="map-fr">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/france.svg"; ?>);'></div>
                <div class='contry'>Франция</div>
              </div>
              <div class='item list-euro item--show' id="map-cz">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/czech-republic.svg"; ?>);'></div>
                <div class='contry'>Чехия</div>
              </div>
              <div class='item list-euro item--show' id="map-bg">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/bulgaria.svg"; ?>);'></div>
                <div class='contry'>Болгария</div>
              </div>
              <div class='item list-asia' id="map-il">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/israel.svg"; ?>);'></div>
                <div class='contry'>Израиль</div>
              </div>
              <div class='item list-na' id="map-ca">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/canada.svg"; ?>);'></div>
                <div class='contry'>Канада</div>
              </div>
              <div class='item list-asia' id="map-au">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/australia.svg"; ?>);'></div>
                <div class='contry'>Австралия</div>
              </div>
              <div class='item list-asia' id="map-lb">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/lebanon.svg"; ?>);'></div>
                <div class='contry'>Ливан</div>
              </div>
              <div class='item list-asia' id="map-ae">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/united-arab-emirates.svg"; ?>);'></div>
                <div class='contry'>ОАЭ</div>
              </div>
              <div class='item list-sa' id="map-br">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/brazil.svg"; ?>);'></div>
                <div class='contry'>Бразилия</div>
              </div>
              <div class='item list-euro item--show' id="map-bl">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/belarus.svg"; ?>);'></div>
                <div class='contry'>Белоруссия</div>
              </div>
              <div class='item list-africa' id="map-moro">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/morocco.svg"; ?>);'></div>
                <div class='contry'>Марокко</div>
              </div>
              <div class='item list-euro item--show' id="map-pl">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/poland.svg"; ?>);'></div>
                <div class='contry'>Польша</div>
              </div>
              <div class='item list-africa' id="map-eg">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/egypt.svg"; ?>);'></div>
                <div class='contry'>Египет</div>
              </div>
              <div class='item list-asia' id="map-cn">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/china.svg"; ?>);'></div>
                <div class='contry'>Китай</div>
              </div>
              <div class='item list-asia' id="map-hk">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/hong-kong.svg"; ?>);'></div>
                <div class='contry'>Гонконг</div>
              </div>
              <div class='item list-asia' id="map-my">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/malaysia.svg"; ?>);'></div>
                <div class='contry'>Малайзия</div>
              </div>
              <div class='item list-asia' id="map-th">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/thailand.svg"; ?>);'></div>
                <div class='contry'>Тайланд</div>
              </div>
              <div class='item list-asia' id="map-vn">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/vietnam.svg"; ?>);'></div>
                <div class='contry'>Вьетнам</div>
              </div>
              <div class='item list-asia' id="map-id">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/indonesia.svg"; ?>);'></div>
                <div class='contry'>Индонезия</div>
              </div>
              <div class='item list-asia' id="map-kr">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/south-korea.svg"; ?>);'></div>
                <div class='contry'>Южная Корея</div>
              </div>
              <div class='item list-euro item--show' id="map-be">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/belgium.svg"; ?>);'></div>
                <div class='contry'>Бельгия</div>
              </div>
              <div class='item list-asia' id="map-in">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/india.svg"; ?>);'></div>
                <div class='contry'>Индия</div>
              </div>
              <div class='item list-africa' id="map-mz">
                <div class='flag' style='background-image: url(<?php echo get_template_directory_uri() . "/img/icon/mozambique.svg"; ?>);'></div>
                <div class='contry'>Мозамбик</div>
              </div>
            </div>
          </div>
        </div>
        <div class='col-12 col-md-9'>
          <div class='geography__map'></div>
        </div>
      </div>
    </div>
  </div>
  <div class="scope">
    <h3 class="scope__title">Cферы наших проектов</h3>
    <div class="scope__body">
      <div class="item">
        <div class="icon" style="background-image:url(<?php echo get_template_directory_uri() . '/img/icon/company.svg'; ?>);"></div>
        <div class="name"><?php echo get_field('scope-1')['name']; ?></div>
        <div class="desc"><?php echo get_field('scope-1')['desc']; ?></div>
      </div>
      <div class="item">
        <div class="icon" style="background-image:url(<?php echo get_template_directory_uri() . '/img/icon/bitcoins.svg'; ?>);"></div>
        <div class="name"><?php echo get_field('scope-2')['name']; ?></div>
        <div class="desc"><?php echo get_field('scope-2')['desc']; ?></div>
      </div>
      <div class="item">
        <div class="icon" style="background-image:url(<?php echo get_template_directory_uri() . '/img/icon/notebook.svg'; ?>);"></div>
        <div class="name"><?php echo get_field('scope-3')['name']; ?></div>
        <div class="desc"><?php echo get_field('scope-3')['desc']; ?></div>
      </div>
      <div class="item">
        <div class="icon" style="background-image:url(<?php echo get_template_directory_uri() . '/img/icon/web-design.svg'; ?>);"></div>
        <div class="name"><?php echo get_field('scope-4')['name']; ?></div>
        <div class="desc"><?php echo get_field('scope-4')['desc']; ?></div>
      </div>
    </div>
  </div>
</section>
<section class='about-content' id='about-leadership'>
    <div class="new-leadership">
      <?php
      $args = array(
        'numberposts' => -1,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'post_type'   => 'leaders',
        'suppress_filters' => true,
      );

      $posts = get_posts( $args );
      $leader_count = 0;

      foreach($posts as $post){ setup_postdata($post);
        $leader_count++;
        ?>
        <div class="item" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');" data-desc="<?php the_post(); the_content(); ?>" data-count="<?php echo $leader_count; ?>">
          <div class="new-leadership__data">
            <div class="name"><a href="#"><?php the_title(); ?></a></div>
            <div class="position"><?php the_field('leader-position'); ?></div>
          </div>
        </div>
        <?php
      }
      wp_reset_postdata(); // сброс
      ?>
    </div>
  </section>
  <section class="about-content" id="about-leader">
    <div class="about-leader__head">
      <div class="nav-line">
        <button class="nav-line__back"><div class="decor"></div>Назад</button>
      </div>
      <div class="name"></div>
      <div class="position"></div>
    </div>
    <div class="about-leader__content"></div>
    <div class="about-leader__head about-leader__head--next">
      <div class="next">Читать далее</div>
      <div class="name"><a href="#"></a></div>
    </div>
  </section>
<?php get_footer(); ?>
<script>
  function openLeader(e) {
    e.preventDefault();
    $('.about-content').removeClass('about-content--show');
    $('.about-content').css('display', 'none');
    $('#about-leader').addClass('about-content--show');
    $('#about-leader').css('display', 'block');
    console.log($(this));
    var count = $(this).parent().parent().parent('.item').attr('data-count');
    var text = $(this).parent().parent().parent('.item').attr('data-desc');
    var name = $(this).parent().children('a').html();
    var position = $(this).parent().next('.position').html();
    $('.about-leader__content').html(text);
    $('.about-leader__head .name').html(name);
    $('.about-leader__head .position').html(position);
    $('.about-leader__content').attr('data-cur-count', count);
    var nextName = $('.new-leadership .item').eq(+count++).children().children('.name').children('a').html();
    if(nextName == undefined) {
      nextName = $('.new-leadership .item').eq(0).children().children('.name').children('a').html();
      $('.about-leader__head--next .name').html('<a href="#">' + nextName + '<span class="decore"></span></a>');
    } else {
      $('.about-leader__head--next .name').html('<a href="#">' + nextName + '<span class="decore"></span></a>');
    }
  }
  function leaderBack() {
    $('.about-content').removeClass('about-content--show');
    $('.about-content').css('display', 'none');
    $('#about-leadership').addClass('about-content--show');
    $('#about-leadership').css('display', 'block');
  }
  function leaderNext(e) {
    e.preventDefault();
    var curCount = $('.about-leader__content').attr('data-cur-count');
    if($('.new-leadership .item').eq(curCount).length < 1) {
      $('.about-leader__content').html($('.new-leadership .item').eq(0).attr('data-desc'));
      $('.about-leader__head .name').html($('.new-leadership .item').eq(0).children().children('.name').children('a').html());
      $('.about-leader__head .position').html($('.new-leadership .item').eq(0).children().children('.position').html());
      var count = $('.new-leadership .item').eq(0).attr('data-count');
      $('.about-leader__content').attr('data-cur-count', count);
      var nextName = $('.new-leadership .item').eq(+count++).children().children('.name').children('a').html();
      if(nextName == undefined) {
        nextName = $('.new-leadership .item').eq(0).children().children('.name').children('a').html();
        $('.about-leader__head--next .name').html('<a href="#">' + nextName + '<span class="decore"></span></a>');
      } else {
        $('.about-leader__head--next .name').html('<a href="#">' + nextName + '<span class="decore"></span></a>');
      }
    } else {
      $('.about-leader__content').html($('.new-leadership .item').eq(curCount).attr('data-desc'));
      $('.about-leader__head .name').html($('.new-leadership .item').eq(curCount).children().children('.name').children('a').html());
      $('.about-leader__head .position').html($('.new-leadership .item').eq(curCount).children().children('.position').html());
      var count = $('.new-leadership .item').eq(curCount).attr('data-count');
      $('.about-leader__content').attr('data-cur-count', count);
      var nextName = $('.new-leadership .item').eq(+count++).children().children('.name').children('a').html();
      if(nextName == undefined) {
        nextName = $('.new-leadership .item').eq(0).children().children('.name').children('a').html();
        $('.about-leader__head--next .name').html('<a href="#">' + nextName + '<span class="decore"></span></a>');
      } else {
        $('.about-leader__head--next .name').html('<a href="#">' + nextName + '<span class="decore"></span></a>');
      }
    }
  }
  $('.new-leadership .item .name a').on('click', openLeader);
  $('.nav-line__back').on('click', leaderBack);
  $('.about-leader__head--next .name').on('click', leaderNext);
</script>
