<?php get_header('page'); ?>

<section class='main-block-project main-block-project--company main-block-page' style="background-image:url(<?php echo get_field('page-banner'); ?>);">
  <div class='project-page-wrapper'>
    <div class='breadcrumb'>
      <a href='<?php echo home_url(); ?>'>Главная</a>
      <span><?php the_title(); ?></span>
    </div>
    <h1><?php the_title(); ?></h1>
    <div class='line-decor'></div>
  </div>
</section>

<section class="page-content">
  <?php the_post(); the_content(); ?>
</section>

<?php get_footer(); ?>

