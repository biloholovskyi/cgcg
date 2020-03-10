<?php
add_action('wp_enqueue_scripts', 'style_them');
add_action('wp_footer', 'script_them');
add_action('after_setup_theme', 'menu');

add_filter( 'excerpt_length', function(){
  return 13;
} );

remove_filter( 'the_excerpt', 'wpautop' );

function menu() {
  register_nav_menu('header', 'Главное меню в шапке');
  register_nav_menu('footer', 'Дополнительное меню');
  add_theme_support( 'post-thumbnails', array('post', 'projects', 'project_people', 'leaders', 'main_leaders') );
  add_filter('excerpt_more', function($more) {
    return '';
  });
}

function style_them() {
  wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css');
  wp_enqueue_style('owl', get_template_directory_uri() . '/css/owl.carousel.min.css');
}

function script_them() {
  wp_enqueue_script('touchSwipe', get_template_directory_uri() . '/js/jquery.touchSwipe.min.js');
  wp_enqueue_script('carousel', get_template_directory_uri() . '/js/owl.carousel.min.js');
  wp_enqueue_script('script', get_template_directory_uri() . '/js/index.js');
  wp_enqueue_script('leaders', get_template_directory_uri() . '/js/leaders.js');
  $args = array(
    'numberposts' => -1,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'post_type'   => 'leaders',
    'suppress_filters' => true,
  );
  $obg = get_posts( $args );
  $case = array();
  foreach ($obg as $value) {
    array_push($case, array('text' => $value->post_content));
  }
  unset($value);
  wp_localize_script( 'leaders', 'obg', $case );
  add_filter('script_loader_tag', 'codeless_remove_type_attr', 10, 2);
  function codeless_remove_type_attr($tag, $handle) {
    return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
  }
}

add_action( 'init', 'register_post_types' );
function register_post_types(){
  register_post_type('projects', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'Проекты', // основное название для типа записи
      'singular_name'      => 'Проект', // название для одной записи этого типа
      'add_new'            => 'Добавить проект', // для добавления новой записи
      'add_new_item'       => 'Добавление проетка', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование проекта', // для редактирования типа записи
      'new_item'           => 'Новый проект', // текст новой записи
      'view_item'          => 'Смотреть проект', // для просмотра записи этого типа.
      'search_items'       => 'Искать проект', // для поиска по этим типам записи
      'not_found'          => 'Не найден проект', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найден проект в корзине', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'проекты', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => true, // зависит от public
    'exclude_from_search' => true, // зависит от public
    'show_ui'             => true, // зависит от public
    'show_in_menu'        => true, // показывать ли в меню адмнки
    'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => true, // зависит от public
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       => 2,
    'menu_icon'           => 'dashicons-portfolio',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => false,
    'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => array('category'),
    'has_archive'         => false,
    'rewrite'             => true,
    'query_var'           => true,
  ) );
  register_post_type('project_people', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'Участник проекта', // основное название для типа записи
      'singular_name'      => 'Участник проекта', // название для одной записи этого типа
      'add_new'            => 'Добавить участника проекта', // для добавления новой записи
      'add_new_item'       => 'Добавление участника проекта', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование участника проекта', // для редактирования типа записи
      'new_item'           => 'Новый участник проекта', // текст новой записи
      'view_item'          => 'Смотреть участника проекта', // для просмотра записи этого типа.
      'search_items'       => 'Искать участника проекта', // для поиска по этим типам записи
      'not_found'          => 'Не найден участник проекта', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найден участник проекта в корзине', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'участники проекта', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => true, // зависит от public
    'exclude_from_search' => true, // зависит от public
    'show_ui'             => true, // зависит от public
    'show_in_menu'        => true, // показывать ли в меню адмнки
    'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => true, // зависит от public
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       => 2,
    'menu_icon'           => 'dashicons-businessman',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => false,
    'supports'            => array('title', 'thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => array(),
    'has_archive'         => false,
    'rewrite'             => true,
    'query_var'           => true,
  ) );
  register_post_type('leaders', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'Руководство', // основное название для типа записи
      'singular_name'      => 'Руководитель', // название для одной записи этого типа
      'add_new'            => 'Добавить руководителя', // для добавления новой записи
      'add_new_item'       => 'Добавление руководителя', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование руководителя', // для редактирования типа записи
      'new_item'           => 'Новый руководитель', // текст новой записи
      'view_item'          => 'Смотреть руководителя', // для просмотра записи этого типа.
      'search_items'       => 'Искать руководителя', // для поиска по этим типам записи
      'not_found'          => 'Руководитель не найден', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найден руководитель в корзине', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'Руководители', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => true, // зависит от public
    'exclude_from_search' => true, // зависит от public
    'show_ui'             => true, // зависит от public
    'show_in_menu'        => true, // показывать ли в меню адмнки
    'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => true, // зависит от public
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       => 2,
    'menu_icon'           => 'dashicons-id-alt',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => false,
    'supports'            => array('title', 'editor', 'thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => array(),
    'has_archive'         => false,
    'rewrite'             => true,
    'query_var'           => true,
  ) );
  register_post_type('docs', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'Документы', // основное название для типа записи
      'singular_name'      => 'Документ', // название для одной записи этого типа
      'add_new'            => 'Добавить документ', // для добавления новой записи
      'add_new_item'       => 'Добавление документа', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование документа', // для редактирования типа записи
      'new_item'           => 'Новый документ', // текст новой записи
      'view_item'          => 'Смотреть документ', // для просмотра записи этого типа.
      'search_items'       => 'Искать документ', // для поиска по этим типам записи
      'not_found'          => 'Не найден документ', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найден документ в корзине', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'документ', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => true, // зависит от public
    'exclude_from_search' => true, // зависит от public
    'show_ui'             => true, // зависит от public
    'show_in_menu'        => true, // показывать ли в меню адмнки
    'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => true, // зависит от public
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       => 2,
    'menu_icon'           => 'dashicons-media-document',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => false,
    'supports'            => array('title'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => array(),
    'has_archive'         => false,
    'rewrite'             => true,
    'query_var'           => true,
  ) );
  register_post_type('main_settings', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'Данные сайта', // основное название для типа записи
      'singular_name'      => 'Данные', // название для одной записи этого типа
      'add_new'            => 'Добавить данные', // для добавления новой записи
      'add_new_item'       => 'Добавление данных', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование данных', // для редактирования типа записи
      'new_item'           => 'Новые данные', // текст новой записи
      'view_item'          => 'Смотреть данные', // для просмотра записи этого типа.
      'search_items'       => 'Искать данные', // для поиска по этим типам записи
      'not_found'          => 'Не найдены данные', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найдены данные в корзине', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'данные', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => true, // зависит от public
    'exclude_from_search' => true, // зависит от public
    'show_ui'             => true, // зависит от public
    'show_in_menu'        => true, // показывать ли в меню адмнки
    'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => true, // зависит от public
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       => 2,
    'menu_icon'           => 'dashicons-admin-settings',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => false,
    'supports'            => array('title'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => array(),
    'has_archive'         => false,
    'rewrite'             => true,
    'query_var'           => true,
  ) );
  register_post_type('main_leaders', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'Лидеры', // основное название для типа записи
      'singular_name'      => 'Лидер', // название для одной записи этого типа
      'add_new'            => 'Добавить лидера', // для добавления новой записи
      'add_new_item'       => 'Добавление лидера', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование лидера', // для редактирования типа записи
      'new_item'           => 'Новый лидер', // текст новой записи
      'view_item'          => 'Смотреть лидера', // для просмотра записи этого типа.
      'search_items'       => 'Искать лидера', // для поиска по этим типам записи
      'not_found'          => 'Не найден лидер', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найден лидер в корзине', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'Лидеры', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => true, // зависит от public
    'exclude_from_search' => true, // зависит от public
    'show_ui'             => true, // зависит от public
    'show_in_menu'        => true, // показывать ли в меню адмнки
    'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => true, // зависит от public
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       => 2,
    'menu_icon'           => 'dashicons-universal-access',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => false,
    'supports'            => array('title', 'thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => array(),
    'has_archive'         => false,
    'rewrite'             => true,
    'query_var'           => true,
  ) );
  register_post_type('maps', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'Карты', // основное название для типа записи
      'singular_name'      => 'Карта', // название для одной записи этого типа
      'add_new'            => 'Добавить карту', // для добавления новой записи
      'add_new_item'       => 'Добавление карты', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование карты', // для редактирования типа записи
      'new_item'           => 'Новая карта', // текст новой записи
      'view_item'          => 'Смотреть карту', // для просмотра записи этого типа.
      'search_items'       => 'Искать карту', // для поиска по этим типам записи
      'not_found'          => 'Не найдена карта', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найдена карта в корзине', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'карты', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => true, // зависит от public
    'exclude_from_search' => true, // зависит от public
    'show_ui'             => true, // зависит от public
    'show_in_menu'        => true, // показывать ли в меню адмнки
    'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => true, // зависит от public
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       => 2,
    'menu_icon'           => 'dashicons-admin-site',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => false,
    'supports'            => array('title'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => array(),
    'has_archive'         => false,
    'rewrite'             => true,
    'query_var'           => true,
  ) );
}


function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

add_action( 'save_post_post', 'my_project_updated_send_email', false );
function my_project_updated_send_email( $post_id ) {
  if ( wp_is_post_revision( $post_id ) || get_post($post_id)->post_status != 'publish' )
    return;
//  if( get_post( $post_id ) != null ) {
//    return;
//  }

  $post_title = get_the_title( $post_id );
  $post_url = get_permalink( $post_id );
  $subject = 'Новая статья в блоге';

  $attachments = array(WP_CONTENT_DIR . '/uploads/attach.zip');
  $headers = 'From: CGCG <cgcg@cgcg.world>' . "\r\n";

  $message = "На сайте cgcg.world опубликована новая статья в блоге:\n\n";
  $message .= $post_title . ": " . $post_url;

  global $wpdb;
  $email_list = $wpdb->get_results( "SELECT email FROM subscribe" );

  foreach ($email_list as $email) {
    $address = $email->email;
    // Отправляем письмо.
    wp_mail( $address, $subject, $message, $headers, $attachments );
  }
}

