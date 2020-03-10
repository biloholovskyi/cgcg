$(document).ready(function() {
  $('.head__mobile').on('click', mobileOn);
  $('.more-project').on('click', moreProject);
  $('.more-news').on('click', moreNews);
  $('.inner-nav__link').on('click', aboutNav);
  $('.category__slider .category__arrow').on('click', aboutCategoryArrow);
  $('.project-button').on('click', toAddPorjectForm);
  $('.start-busines').on('click', toBusinesPorjectForm);
  $('.project-investetion-btn').on('click', toSinglePorjectForm);
  $('.head__lang').on('click', lang);
  $('.news__switcher__wrapper input').on('change', chackNewsCat);
  $('.colapse__address').on('click', mapCard);
  $('.footer__subs').on('click', openSubs);
  $('.subs__close').on('click', closeSubs);
  $('.head__mail, .mobile-modal').on('click', openMainModal);
  $('.busines-card__btn').on('click', openMainModal);
  $('.main-modal__close').on('click', closeMainModal);
  $('.to-partner-btn').on('click', toPartner);
  $('.contact__haeder-nav .project-page-wrapper .item').on('click', contactsNav);
  $('.new-form__input').on('input', inputForm);
  $('.busines-inner-nav .item').on('click', businesNav);
  // $('.new-leadership .item .name a').on('click', openLeader);
  // $('.nav-line__back').on('click', leaderBack);
  // $('.about-leader__head--next .name').on('click', leaderNext);
  $('.geography__nav .item').on('click', geoMap);
  $('.modal-alert__close').on('click', closeAlertModal);
  $('.geography__navigation .city_btn').on('click', geographyMateric);

  $(document).on('click', function (e) {
    var div = $(".subs__window");
    var a = $('.footer__subs');
    var mdainModal = $('.main-modal__window');
    var alert = $('.modal-alert__window');
    var mailBtn = $('.head__mail, .busines-card__btn, .mobile-modal');
    if (!a.is(e.target) && a.has(e.target).length === 0) {
      if (!div.is(e.target) && div.has(e.target).length === 0) {
        closeSubs();
        if (!alert.is(e.target) && alert.has(e.target).length === 0) {
          closeAlertModal();
        }
      }
    }
    if (!mailBtn.is(e.target) && mailBtn.has(e.target).length === 0) {
      if (!mdainModal.is(e.target) && mdainModal.has(e.target).length === 0) {
        closeMainModal();
        if (!alert.is(e.target) && alert.has(e.target).length === 0) {
          closeAlertModal();
        }
      }
    }
  });

  if($(window).width() < 1090) {
    if ($(window).width() < 750) {
      sliderTopSmall();
    } else {
      sliderTop();
    }
  } else {
    $('.head__hovercard').removeClass('slider-hovercard');
    $('.head__hovercard__item').removeAttr('style');
  }

  $('.owl-carousel').owlCarousel({
    loop: false,
    margin: 0,
    nav: true,
    items: 4,
    responsive: {
      0: {
        items: 1
      },
      635: {
        items: 2
      },
      890: {
        items: 3
      },
      1105: {
        items: 4
      }
    }
  });
});

$(window).resize(function() {
  if ($(window).width() < 1090) {
    if ($(window).width() < 750) {
      sliderTopSmall();
    } else {
      sliderTop();
    }
  } else {
    $('.head__hovercard').removeClass('slider-hovercard');
    $('.head__hovercard__item').removeAttr('style');
  }
});

function mobileOn() {
  var nav = $('.head__nav');
  var navMain = $('.head__nav--main');
  nav.toggleClass('nav-show');
  if(nav.hasClass('nav-show')) {
    nav.eq(0).css('top', '80px');
    navTop = nav.eq(0).height() + 80;
    navTop = navTop + 'px';
    navMain.css('top', navTop);
  } else {
    nav.css('top', '-500px');
    navMain.css('top', '-500px');
  }
}

function sliderTop() {
  $('.head__hovercard').addClass('slider-hovercard');
  var sliderItem = $('.head__hovercard__item');
  sliderItem.css('min-width', '50%');
}

function sliderTopSmall() {
  $('.head__hovercard').addClass('slider-hovercard');
  var sliderItem = $('.head__hovercard__item');
  sliderItem.css('min-width', '100%');
}

$('.head__hovercard__item').swipe({
  swipeLeft: leftSwipe,
  swipeRight: rightSwipe,
  threshold: 0
});

function leftSwipe() {
  if ($(window).width() < 1090) {
    if ($(window).width() < 750) {
      var count = $(this).attr('data-count');
      if (count != -300) {
        count = +count - 100;
        $('.head__hovercard__item').attr('data-count', count);
        $('.head__hovercard__item').css('transform', 'translateX(' + count + '%)');
      } 
    } else {
      var count = $(this).attr('data-count');
      if (count != -200) {
        count = +count - 100;
        $('.head__hovercard__item').attr('data-count', count);
        $('.head__hovercard__item').css('transform', 'translateX(' + count + '%)');
      } 
    }
  }
}

function rightSwipe() {
  if ($(window).width() < 1090) {
    var count = $(this).attr('data-count');
    if (count != 0) {
      count = +count + 100;
      $('.head__hovercard__item').attr('data-count', count);
      $('.head__hovercard__item').css('transform', 'translateX(' + count + '%)');
    }
  }
}

// more projects
function moreProject() {
  var projects = $('.projects__item');
  var show = $('.project-show');
  if(projects.length > show.length) {
    var count = show.length;
    for(var i = 0; i < 3; i++) {
      projects.eq(count).parent().addClass('project-show');
      +count++;
    }
  }
}

// more news
function moreNews() {
  var news = $('.news-main__item');
  var show = $('.news-show');
  if(news.length > show.length) {
    var count = show.length;
    for(var i = 0; i < 3; i++) {
      news.eq(count).addClass('news-show');
      +count++;
    }
  }
}

// abotu iner navigation
function aboutNav() {
  $('.about-content').css('display', 'none');
  var id = $(this).attr('id');
  id = id.split('link-');
  switch (id[1]) {
    case 'about':
      $('#about-about').css('display', 'block');
      break;
    case 'leadership':
      $('#about-leadership').css('display', 'block');
      break;
    case 'partners':
      $('#about-partners').css('display', 'block');
      break;
  }
}

function toPartner() {
  $('.about-content').css('display', 'none');
  $('#about-partners').css('display', 'block');
  var top = $('#to-bacome-partner-form').offset().top;
  $('body,html').animate({ scrollTop: top }, 500);
}

// about category slider
var aboutCategoryList = [
  {
    name: 'ТЕХНОЛОГИЧЕСКИЕ ПРОЕКТЫ',
    icon: './img/icon/settings-gears.svg',
    text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.'
  },
  {
    name: 'КРИПТОВАЛЮТЫ',
    icon: './img/icon/bitcoin-logo.svg',
    text: 'Crypto Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.'
  },
  {
    name: 'ПЛАТЕЖНЫЕ СИСТЕМЫ',
    icon: './img/icon/credit-card.svg',
    text: 'Pay Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.'
  },
  {
    name: 'ИТ-ПРОЕКТЫ И ВЕБ-ПРОЕКТЫ',
    icon: './img/icon/desktop-monitor.svg',
    text: 'IT Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.'
  },
];

function aboutCategoryArrow() {
  var count = $('.category__slider').attr('data-count');
  var listLength = aboutCategoryList.length;
  listLength = +listLength - 2;
  if($(this).hasClass('prev')) {
    if (count < 1) {
      count = listLength + 1;
    } else {
      count--;
    }
    $('.category__slider').attr('data-count', count);
    $('.category__slider .name').html(aboutCategoryList[count].name);
    $('.category__text').html(aboutCategoryList[count].text);
    $('.category__slider .icon').css('background-image', 'url(' + aboutCategoryList[count].icon + ')');
  } else {
    if(listLength < count) {
      count = 0;
    } else {
      count++;
    }
    $('.category__slider').attr('data-count', count);
    $('.category__slider .name').html(aboutCategoryList[count].name);
    $('.category__text').html(aboutCategoryList[count].text);
    $('.category__slider .icon').css('background-image', 'url(' + aboutCategoryList[count].icon + ')');
  }
}

// scroll to add projects form
function toAddPorjectForm() {
  var top = $('#add-projects-form').offset().top;
  $('body,html').animate({ scrollTop: top }, 500);
}

// scroll to add busines form
function toBusinesPorjectForm() {
  var top = $('#busines-form').offset().top;
  $('body,html').animate({ scrollTop: top }, 500);
}

// scroll to single project form
function toSinglePorjectForm() {
  var top = $('#single-projects-form').offset().top;
  $('body,html').animate({ scrollTop: top }, 500);
}

// head change language
function lang() {
  $(".head__lang").toggleClass('head__lang--show');
}

function chackNewsCat() {
  var id = $(this).attr('id');
  id = id.split('swich-')[1];
  console.log(id);

  if($(this).prop('checked')) {
    if(id == 'all') {
      $('.news__switcher__wrapper input').prop('checked', false);
      $('.news__switcher__wrapper #swich-all').prop('checked', true);
      $('.check-block').removeClass('check-block--active');
      $('.news-main__item').removeClass('news-hidden');
    } else {
      $('#swich-all').prop('checked', false);
      $('#swich-all').next('label').children('div').removeClass(('check-block--active'));
      var checkbox = $('.news__switcher__wrapper input');
      var checkedList = ['all'];
      for(var i = 0; i < checkbox.length; i++) {
        if(checkbox.eq(i).prop('checked')) {
          checkedList.push(checkbox.eq(i).attr('id').split('swich-')[1]);
        }
      }
      $('.news-main__item').addClass('news-hidden');
      for(var j = 0; j < checkedList.length; j++) {
        if(checkedList[j] == 'project') {
          $('.news-cat__project').removeClass(('news-hidden'));
        }
        if(checkedList[j] == 'celabretion') {
          $('.news-cat__celabretion').removeClass(('news-hidden'));
        }
        if(checkedList[j] == 'comunity') {
          $('.news-cat__comunity').removeClass(('news-hidden'));
        }
        if(checkedList[j] == 'event') {
          $('.news-cat__event').removeClass(('news-hidden'));
        }
        if(checkedList[j] == 'other') {
          $('.news-cat__other').removeClass(('news-hidden'));
        }
      }
    }
    $(this).next('label').children('div').addClass('check-block--active');
  } else {
    if(id == 'project') {
      $('.news-cat__project').addClass(('news-hidden'));
    }
    if(id == 'celabretion') {
      $('.news-cat__celabretion').addClass(('news-hidden'));
    }
    if(id == 'comunity') {
      $('.news-cat__comunity').addClass(('news-hidden'));
    }
    if(id == 'event') {
      $('.news-cat__event').addClass(('news-hidden'));
    }
    if(id == 'other') {
      $('.news-cat__other').addClass(('news-hidden'));
    }
    $(this).next('label').children('div').removeClass('check-block--active');
    var cb = $('.news__switcher__wrapper input');
    var cl = ['all'];
    for(var i = 0; i < cb.length; i++) {
      if(cb.eq(i).prop('checked')) {
        cl.push(cb.eq(i).attr('id').split('swich-')[1]);
      }
    }
    if(cl.length < 2) {
      $('.news__switcher__wrapper #swich-all').prop('checked', true);
      $('.news-main__item').removeClass('news-hidden');
      $('.news__switcher__wrapper #swich-all').next('label').children('div').addClass('check-block--active');
    }
  }
}

function mapCard() {
  $(this).toggleClass('colapse__address--hidde');
  $('.bg__address').toggleClass('bg__address--hidde');
}

function openSubs(e) {
  e.preventDefault();
  $('.modal-subs').css('display', 'flex');
  // $('html, body').addClass('modal-open');
}

function closeSubs() {
  $('.modal-subs').css('display', 'none');
  // $('html, body').removeClass('modal-open');
}

function openMainModal(e) {
  e.preventDefault();
  $('.main-modal').css('display', 'flex');
  // $('html, body').addClass('modal-open');
}

function closeMainModal() {
  $('.main-modal').css('display', 'none');
  // $('html, body').removeClass('modal-open');
}

// contacnts map navigation
function contactsNav() {
  $('.contacts__map').removeClass('map-active');
  $('.contact__haeder-nav .project-page-wrapper .item').removeClass('active');
  var id = $(this).attr('id');
  id = id.split('map-btn-');
  id = id[1];
  $('.map-' + id).addClass('map-active');
  $('#map-btn-' + id).addClass('active');
  // switch (id[1]) {
  //   case 'kazan':
  //     $('.map-kazan').addClass('map-active');
  //     $('#map-btn-kazan').addClass('active');
  //     break;
  //   case 'moskow':
  //     $('.map-moskow').addClass('map-active');
  //     $('#map-btn-moskow').addClass('active');
  //     break;
  // }
}

//input new-form
function inputForm() {
  if($(this).val() == '') {
    $(this).parent('.new-form__input__wrapper').removeClass('new-form__input__wrapper--active');
  } else {
    $(this).parent('.new-form__input__wrapper').addClass('new-form__input__wrapper--active');
  }
}

//busines inner nav
function businesNav() {
  $('.busines-inner-nav .item').removeClass('active');
  $(this).addClass('active');
  $('.busines-section').removeClass('busines-section--active');
  if($(this).attr('id') == 'busines-whis-us') {
    $('#whis-us').addClass('busines-section--active');
  } else {
    $('#us-leaders').addClass('busines-section--active');
  }
}

// function openLeader(e) {
//   e.preventDefault();
//   $('.about-content').removeClass('about-content--show');
//   $('.about-content').css('display', 'none');
//   $('#about-leader').addClass('about-content--show');
//   $('#about-leader').css('display', 'block');
//   var text = $(this).parent().parent('.item').attr('data-desc');
//   var name = $(this).parent().children('a').html();
//   var position = $(this).parent().next('.position').html();
//   $('.about-leader__content').html(text);
//   $('.about-leader__head .name').html(name);
//   $('.about-leader__head .position').html(position);
//   var count = $(this).parent().parent('.item').attr('data-count');
//   $('.about-leader__content').attr('data-cur-count', count);
//   var nextName = $('.new-leadership .item').eq(+count++).children('.name').children('a').html();
//   if(nextName == undefined) {
//     nextName = $('.new-leadership .item').eq(0).children('.name').children('a').html();
//     $('.about-leader__head--next .name').html('<a href="#">' + nextName + '<span class="decore"></span></a>');
//   } else {
//     $('.about-leader__head--next .name').html('<a href="#">' + nextName + '<span class="decore"></span></a>');
//   }
// }
//
// function leaderBack() {
//   $('.about-content').removeClass('about-content--show');
//   $('.about-content').css('display', 'none');
//   $('#about-leadership').addClass('about-content--show');
//   $('#about-leadership').css('display', 'block');
// }
//
// function leaderNext(e) {
//   e.preventDefault();
//   var curCount = $('.about-leader__content').attr('data-cur-count');
//   if($('.new-leadership .item').eq(curCount).length < 1) {
//     $('.about-leader__content').html($('.new-leadership .item').eq(0).attr('data-desc'));
//     $('.about-leader__head .name').html($('.new-leadership .item').eq(0).children('.name').children('a').html());
//     $('.about-leader__head .position').html($('.new-leadership .item').eq(0).children('.position').html());
//     var count = $('.new-leadership .item').eq(0).attr('data-count');
//     $('.about-leader__content').attr('data-cur-count', count);
//     var nextName = $('.new-leadership .item').eq(+count++).children('.name').children('a').html();
//     if(nextName == undefined) {
//       nextName = $('.new-leadership .item').eq(0).children('.name').children('a').html();
//       $('.about-leader__head--next .name').html('<a href="#">' + nextName + '<span class="decore"></span></a>');
//     } else {
//       $('.about-leader__head--next .name').html('<a href="#">' + nextName + '<span class="decore"></span></a>');
//     }
//   } else {
//     $('.about-leader__content').html($('.new-leadership .item').eq(curCount).attr('data-desc'));
//     $('.about-leader__head .name').html($('.new-leadership .item').eq(curCount).children('.name').children('a').html());
//     $('.about-leader__head .position').html($('.new-leadership .item').eq(curCount).children('.position').html());
//     var count = $('.new-leadership .item').eq(curCount).attr('data-count');
//     $('.about-leader__content').attr('data-cur-count', count);
//     var nextName = $('.new-leadership .item').eq(+count++).children('.name').children('a').html();
//     if(nextName == undefined) {
//       nextName = $('.new-leadership .item').eq(0).children('.name').children('a').html();
//       $('.about-leader__head--next .name').html('<a href="#">' + nextName + '<span class="decore"></span></a>');
//     } else {
//       $('.about-leader__head--next .name').html('<a href="#">' + nextName + '<span class="decore"></span></a>');
//     }
//   }
// }

function geoMap() {
  $('.geography__nav .item').removeClass('item--active');
  $(this).addClass('item--active');
  var id = $(this).attr('id');
  $('.geography__map').css('background-image', 'url(http://cgcg.world/wp-content/themes/cgcg/img/' + id + '.png)');
}

$('#main-modal-form').on('submit', function(e) {
  e.preventDefault();
  $.ajax({
    url: '/wp-content/themes/cgcg/send.php',
    type: 'POST',
    data: 'name=' + $('#input-name').val() + '&tel=' + $('#input-tel').val() + '&email=' + $('#input-email').val() + '&question=' + $('#input-quest').val() + '&kaptcha=' + $('#input-kaptcha').val(),
    success: function( data ) {
      if(data == 'kapt_error') {
        $('#input-kaptcha').val('');
        $('#input-kaptcha').addClass('kaptch-alert');
      } else {
        $('#input-name').val('');
        $('#input-tel').val('');
        $('#input-email').val('');
        $('#input-quest').val('');
        $('#input-kaptcha').val('');
        $('#input-kaptcha').removeClass('kaptch-alert');
        closeMainModal();
        openAlertModal();
      }
    }
  });
});

$('#main-bussines-form, #main-projects-form').on('submit', function(e) {
  e.preventDefault();
  $.ajax({
    url: '/wp-content/themes/cgcg/send_porject.php',
    type: 'POST',
    data: 'name=' + $('#inp-name').val() + '&tel=' + $('#inp-tel').val() + '&email=' + $('#inp-email').val() + '&proj=' + $('#inp-text').val(),
    success: function( data ) {
      $('#inp-name').val('');
      $('#inp-tel').val('');
      $('#inp-email').val('');
      $('#inp-text').val('');
      closeMainModal();
      openAlertModal();
    }
  });
});

$('#bussines-personal-form').on('submit', function(e) {
  e.preventDefault();
  $.ajax({
    url: '/wp-content/themes/cgcg/send_bussines.php',
    type: 'POST',
    data: 'name=' + $('#inpt-name').val() + '&tel=' + $('#inpt-tel').val() + '&email=' + $('#inpt-email').val() + '&about=' + $('#inpt-text').val(),
    success: function( data ) {
      $('#inpt-name').val('');
      $('#inpt-tel').val('');
      $('#inpt-email').val('');
      $('#inpt-text').val('');
      closeMainModal();
      openAlertModal();
    }
  });
});

$('#contact-form, #single-project-form').on('submit', function(e) {
  e.preventDefault();
  $.ajax({
    url: '/wp-content/themes/cgcg/send_contact.php',
    type: 'POST',
    data: 'name=' + $('#form-name').val() + '&tel=' + $('#form-tel').val() + '&email=' + $('#form-email').val(),
    success: function( data ) {
      $('#form-name').val('');
      $('#form-tel').val('');
      $('#form-email').val('');
      closeMainModal();
      openAlertModal();
    }
  });
});

$('#subs-form').on('submit', function(e) {
  e.preventDefault();
  $.ajax({
    url: '/wp-content/themes/cgcg/subs.php',
    type: 'POST',
    data: 'email-subs=' + $('#email-subs').val() + '&kaptcha-subs=' + $('#kaptcha-subs').val(),
    success: function( data ) {
      if(data == 'kapt_error') {
        $('#kaptcha-subs').val('');
        $('#kaptcha-subs').addClass('kaptch-alert');
      } else {
        $('#email-subs').val('');
        closeSubs();
        openAlertModal();
      }
    }
  });
});

function openAlertModal() {
  $('.modal-alert').css('display', 'flex');
}

function closeAlertModal() {
  $('.modal-alert').css('display', 'none');
}

function geographyMateric() {
  $('.geography__navigation .city_btn').removeClass('city_btn--active');
  $(this).addClass('city_btn--active');
  var teritory = $(this).attr('id').split('btn-')[1];
  $('.geography__nav .item').removeClass('item--show');
  $('.list-' + teritory).addClass('item--show');
}