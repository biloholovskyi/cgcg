<?php session_start(); ?>
<footer class='footer'>
  <div class='container-fluid'>
    <div class='row'>
      <div class='col-12 col-md-2 col-lg-2'>
        <div class='footer__logo'><a href="<?php echo home_url(); ?>"></a></div>
      </div>
      <div class='col-12 col-sm-4 col-md-4 col-lg-2'>
        <div class='footer__contacts'>
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
            $name_id = $post->post_title;
            if($name_id === 'Контакты') {
              $footer_number = get_field('main-set-number');
              $footer_number_clear = preg_replace('/\s+/', '', $footer_number);
              $footer_email = get_field('main-set-email');
            } elseif ($name_id === 'Реквизиты') {
              $footer_reqiz = get_field('main-set-reqiz');
            }
          }
          wp_reset_postdata();
          $post = $current_post;
          ?>
          <a href='tel:<?php echo $footer_number_clear; ?>' class='footer__number'><?php echo $footer_number; ?></a>
          <a href='mailto:<?php echo $footer_email; ?>' class='footer__mail'><?php echo $footer_email; ?></a>
<!--          <a href='--><?php //echo $footer_reqiz; ?><!--' class='footer__requiz' download="">Реквизиты компании</a>-->
        </div>
      </div>
      <div class='col-12 col-sm-4 col-md-3 col-lg-2'>
        <?php
        wp_nav_menu( [
          'theme_location'  => 'header',
          'menu'            => '',
          'container'       => 'div',
          'container_class' => 'footer__nav',
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
      </div>
      <div class='col-12 col-sm-4 col-md-3 col-lg-2'>
        <?php
        wp_nav_menu( [
          'theme_location'  => 'footer',
          'menu'            => '',
          'container'       => 'div',
          'container_class' => 'footer__nav',
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
      </div>
      <div class='col-12 col-lg-4'>
        <div class='footer__social'>
          <div class='footer__social__links'>
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
                    ?>
                    <div class='item' style="background-image: url(<?php echo $soc_icon; ?>); <?php if($soc['social'] == 'facebook') {echo '-webkit-background-size: 10px;background-size: 10px;';} ?>" ><a href='<?php echo $soc['link']; ?>' target="_blank"></a></div>
                    <?php
                  }
                }
              }
            }
            wp_reset_postdata();
            $post = $current_post;
            ?>
          </div>
        </div>
        <a href='#' class='footer__subs'><span class='decor'></span>Подписаться на рассылку</a>
      </div>
    </div>
  </div>
</footer>
<!-- /.footer -->

<div class="modal-subs">
  <div class="subs__window">
    <div class="subs__close">
      <div class="item"></div>
      <div class="item"></div>
    </div>
    <div class="subs__window__header">
      <div class="title">Подписаться на новости</div>
      <div class="desc">Подпишитесь на наши новости, чтобы всегда быть в курсе событий.</div>
    </div>
    <div class="subs__window__form">
      <form id="subs-form">
        <input type="email" name="email-subs" id="email-subs" class="subs-input" placeholder="E-MAIL*" required>
        <div class="captcha-wrapper">
          <img class="img" src="<?php echo get_template_directory_uri() . '/kapcha_subs.php'; ?>">
          <input type="text" name="kaptcha-subs" id="kaptcha-subs" class="subs-input subs-input--captcha" placeholder="Введите символы">
        </div>
        <div class="form-btn-wrapper main-button">
          <input type="submit" value="ПОДПИСАТЬСЯ" class="subs-input subs-input--submit">
        </div>
      </form>
    </div>
  </div>
</div>

<div class="main-modal">
  <div class="main-modal__window">
    <div class="main-modal__close">
      <div class="item"></div>
      <div class="item"></div>
    </div>
    <div class="main-modal__header">
      <div class="title">Задайте вопрос</div>
      <div class="desc">Мы открыты к любым предложениям и готовы ответить на ваши вопросы</div>
    </div>
    <div class="main-modal__form">
      <form id="main-modal-form">
        <input type="text" name="input-name" id="input-name" class="main-modal-input" placeholder="Ваше имя*">
        <input type="tel" name="input-tel" id="input-tel" class="main-modal-input" placeholder="Ваш телефон*" required>
        <input type="email" name="input-email" id="input-email" class="main-modal-input" placeholder="E-MAIL*" required>
        <textarea name="input-quest" id="input-quest" class="main-modal-input main-modal-input--quest" placeholder="Вопрос"></textarea>
        <div class="captcha-wrapper">
          <img class="img" src="<?php echo get_template_directory_uri() . '/kapcha.php'; ?>">
          <input type="text" name="input-kaptcha" id="input-kaptcha" class="main-modal-input main-modal-input--captcha" placeholder="Введите символы">
        </div>
        <div class="form-btn-wrapper main-button">
          <input type="submit" value="отправить вопрос" class="main-modal-input main-modal-input--submit">
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal-alert">
  <div class="modal-alert__window">
    <p>Спасибо за обращение!</p>
    <div class="modal-alert__close">
      <div class="item"></div>
      <div class="item"></div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<?php wp_footer(); ?>
</body>
</html>