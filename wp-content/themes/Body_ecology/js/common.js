function closePopup() {
  $.magnificPopup.close();
}

//==========================   Мобильное уст-во или нет   ==========================
let deviceCheck = false;
window.isMobileOrTablet = function() {
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) deviceCheck = true;})(navigator.userAgent||navigator.vendor||window.opera);
  return deviceCheck;
};
isMobileOrTablet()
console.log(deviceCheck);
// End ^

function widthDetect() {
  if ($(window).width() <= 1199) {
    var navHeight = $(window).height() - $('.header_top').height();
    $(".nav-bar").css('max-height', navHeight);
  } else { }
}
widthDetect();
$(window).resize(function () {
  widthDetect();
});

//==========================   Шапка при скролле   ==========================
$(window).scroll(function () {
  var $menu = $(".header");
  var windowHeight = $(window).height();
  var percent = 5;
  if ($(window).scrollTop() > (windowHeight / 100 * percent)) {
    $menu.addClass("scroll");
  } else if ($(window).scrollTop() <= (windowHeight / 100 * percent)) {
    $menu.removeClass("scroll");
  }
});

//==========================   Разделитель чисел   ==========================
function prettify(num) {
  var n = num.toString();
  var separator = " ";
  return n.replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g, "$1" + separator);
}
$('.numbers__item-numb span, .price').each(function(){
  $(this).text(prettify($(this).text()))
})

//==========================   Видео YouTube   ==========================
$('.video-block').each(function(){
  var videoVal = $(this).find('.embed-responsive').data('video'),
      videoUrlPoster = $(this).find('.embed-responsive').data('poster'),
      videoYouTubePoster = 'https://img.youtube.com/vi/'+ videoVal +'/hqdefault.jpg';

  $(this).append('<div class="video-block__poster"></div><div class="video-block__play"></div>');
  if (videoUrlPoster !== undefined){
    $(this).find('.video-block__poster').css('background-image','url('+ videoUrlPoster +')').fadeIn(300);
  }
  else{
    $(this).find('.video-block__poster').css('background-image','url('+ videoYouTubePoster +')').fadeIn(300);
  }

  $(this).find('.video-block__play').fadeIn(300);
});
$('.video-block .video-block__play').on('click',function(){
  var videoVal = $(this).parent().find('.embed-responsive').attr('data-video'),
      videoPlayedWrapper = $(this).parent().find('.embed-responsive');
  if (! $(videoPlayedWrapper).is('video-played')){
      $(this).parent().find('.embed-responsive').html('<iframe src="https://www.youtube.com/embed/' + videoVal + '?autoplay=1&amp;rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>');
      $(this).parent().find('.video-block__poster, .video-block__play').fadeOut(300);
      $(videoPlayedWrapper).addClass('video-played');
  }
});


//==========================   Скролл по якорям   ==========================
function scrollNav() {
  $('.nav a, #back-top a').click(function () {
    console.log('click!!!!!!!!')
    var url = $(this).attr('href');
    var type = url.split('#');
    var hash = '';

    if (type.length > 1) hash = type[1];
    if (hash !== '' && $("#" + hash).length){
      var block = $("#" + hash).offset();
      var offset_top = block.top - 0;
      $('html, body').stop().animate({scrollTop: offset_top}, 400);
      if ($("#nav-bar").is('.opened')) {
        $('header #nav-bar').removeClass('opened').hide(300);
      } else {
        $('header #nav-bar').removeClass('opened');
      }
      $('.nav-toggle').removeClass('active');
      // $('body').css('height', 'auto');
      // $('body').css('overflow-x', 'hidden');
      // $('body').css('overflow-y', 'visible');
      return false;
    }
    
  });
}

scrollNav();

//==========================   Маска телефона   ==========================
function maskTel() {
  $("input[name$='tel']").mask("+7 (999) 999-99-99");
}
maskTel();

//==========================   Кнопка вверх   ==========================
$(window).scroll(function () {
  if ($(this).scrollTop() > 100) {
    $('#back-top').fadeIn();
  } else {
    $('#back-top').fadeOut();
  }
});

// $(document).ready(function () {
  // Кнопка Бургер
  $('[data-toggle="nav"]').on('click', function (event) {
    event.preventDefault();
    $(this).toggleClass('active');
    let navTarget = $(this).data('target');
    if ($(navTarget).is(":visible")) {
      $(navTarget).slideUp(300).removeClass('opened');

      // $('body').css('height', 'auto');
      // $('body').css('overflow-x', 'hidden');
      // $('body').css('overflow-y', 'visible');

      $('.navscroll__list-item.open .navscroll__dropdown').slideUp(300)
      $('.navscroll__list-item').removeClass('open')
    } else {
      $(navTarget).slideDown(300).addClass('opened');
      // $('body').css('height', '100vh');
      // $('body').css('overflow-x', 'hidden');
      // $('body').css('overflow-y', 'hidden');
    }
  });
  
  // Специалисты
  $('.specialist').slick({
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: '<div class="slider__arrow_prev slider__arrow"></div>',
    nextArrow: '<div class="slider__arrow_next slider__arrow"></div>',
    fade: false,
    cssEase: 'ease',
    speed: 500,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  })

  // Офисы
  $('.office-slider').on('init beforeChange', function(e, slick, curr, next) {
    const
      count = slick.slideCount,
      show = slick.options.slidesToShow,
      center = slick.options.centerMode,
      index = (next | 0) - center * (count > show ? show / 2 | 0 : 0);
      var selector = 0;
    $('.slick-xxx', this).removeClass('slick-xxx');
    $([ 0, 1, -1 ].map(function (i) {
      return '[data-slick-index="' + (index + i * count) + '"]';
    }).join(', '), this).addClass('slick-xxx');
  }).slick({
    speed: 1000,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: '<div class="slider__arrow_prev slider__arrow"></div>',
    nextArrow: '<div class="slider__arrow_next slider__arrow"></div>',
    fade: false,
    centerMode: true,
    centerPadding: '0',
    focusOnSelect: true,
    adaptiveHeight: false,
    swipe: false,
    responsive: [
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 1,
          swipe: true
        }
      }
    ]
  });
  $('.rent-advantage__slider').on('init beforeChange', function(e, slick, curr, next) {
    const
      count = slick.slideCount,
      show = slick.options.slidesToShow,
      center = slick.options.centerMode,
      index = (next | 0) - center * (count > show ? show / 2 | 0 : 0);
      var selector = 0;
    $('.slick-xxx', this).removeClass('slick-xxx');
    $([ 0, 1, -1 ].map(function (i) {
      return '[data-slick-index="' + (index + i * count) + '"]';
    }).join(', '), this).addClass('slick-xxx');
  }).slick({
    speed: 1000,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: '<div class="slider__arrow_prev slider__arrow"></div>',
    nextArrow: '<div class="slider__arrow_next slider__arrow"></div>',
    fade: false,
    centerMode: true,
    centerPadding: '0',
    focusOnSelect: true,
    adaptiveHeight: false,
    swipe: false,
    responsive: [
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 1,
          swipe: true
        }
      }
    ]
  });

  // Отзывы
  $('.reviews-slider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: '<div class="slider__arrow_prev slider__arrow"></div>',
    nextArrow: '<div class="slider__arrow_next slider__arrow"></div>',
    fade: false,
    cssEase: 'ease',
    speed: 500
  })
  $('.partner-reviews__slider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: '<div class="slider__arrow_prev slider__arrow"></div>',
    nextArrow: '<div class="slider__arrow_next slider__arrow"></div>',
    fade: false,
    cssEase: 'ease',
    speed: 500
  })
  $('.reviews-insta').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: true,
    arrows: false,
    prevArrow: '<div class="slider__arrow_prev slider__arrow"></div>',
    nextArrow: '<div class="slider__arrow_next slider__arrow"></div>',
    fade: false,
    cssEase: 'ease',
    speed: 500,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          centerMode: true
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
  })
  $('.text-reviews__slider').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: true,
    arrows: false,
    prevArrow: '<div class="slider__arrow_prev slider__arrow"></div>',
    nextArrow: '<div class="slider__arrow_next slider__arrow"></div>',
    fade: false,
    cssEase: 'ease',
    speed: 500,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          centerMode: true
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
  })

  $('[data-toggle="modal"]').magnificPopup({
    type: 'inline',
    removalDelay: 300,
    mainClass: 'mfp-fade',
    preloader: false,
    focus: '#name',

    // When elemened is focused, some mobile browsers in some cases zoom in
    // It looks not nice, so we disable it:
    callbacks: {
      beforeOpen: function() {
        if($(window).width() < 700) {
          this.st.focus = false;
        } else {
          this.st.focus = '#name';
        }
      }
    }
  });
  $('[data-toggle="video"]').magnificPopup({
    type: 'iframe',
    removalDelay: 300,
    mainClass: 'mfp-fade'
  });
  $('.specialist__item-certificate').each(function(){
    // $('[data-toggle="gallery"]').magnificPopup({
    $(this).magnificPopup({
      delegate: 'a',
      type: 'image',
      removalDelay: 300,
      mainClass: 'mfp-fade',
      gallery:{
        enabled:true
      }
    });
  })
  
  $('[data-toggle="image"]').magnificPopup({
    type:'image',
    removalDelay: 300,
    mainClass: 'mfp-fade',
    callbacks: {
      elementParse: function(item) {
        // Function will fire for each target element
        // "item.el" is a target DOM element (if present)
        // "item.src" is a source that you may modify
  
        console.log(item); // Do whatever you want with "item" object
      }
    }
  });
// });

$('.tab-nav__item').on('click', function(e){
  e.preventDefault();
  $(this)
    .closest('.tab')
    .find('.tab-nav__item.active')
    .removeClass('active');
  $(this)
    .addClass('active');

  $(this)
    .closest('.tab')
    .find('.tab-content__item.active')
    .removeClass('active')
    .hide();
  $( $(this.hash) ).fadeIn('slow', function(){
    $(this).addClass('active');
  });
});

$(document).ready(function(){
  AOS.init({
    offset: 50,
    delay: 0,
    duration: 1000,
    once: false,
    disable: 'mobile'
  });
  var scroller = $('.contact .baron').baron({
    root: '.baron__root',
    scroller: '.baron__scroller',
    bar: '.baron__bar',
    scrollingCls: '_scrolling',
    draggingCls: '_dragging'
  });
  // Блок "Контакты" все салоны
  $('.contact > .button').on('click', function(){
    $('.contact-wrapper .contact__item.hidden').removeClass('hidden');
    scroller.update();
    var baronHeight = $(this).parents('.contact').find('.baron').outerHeight(),
        buttonHeight = $(this).outerHeight(true),
        calculateHeight = baronHeight + buttonHeight;
    $('.contact').find('.baron').css('height', calculateHeight);
    $(this).remove();
  });
})