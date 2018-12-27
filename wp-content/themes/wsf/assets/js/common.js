$(function() {

  // flats cut for mobile version

  let flat_nav = $('.flats .flat_nav li a').toArray();

  if ($(window).width() < 570) {
    $('.adv_descr').find('br').detach();
    flat_nav.forEach(function(elem) {
      let el = $(elem).text();
      if (el.substring(0 ,1) != 'В' && el.substring(0 ,1) != 'S') {
        $(elem).text(el.substring(0 ,1) + '-к.');       
      }
    });
  }

  // change text on forms(tablet + mobile)

  if ($(window).width() < 1024) {
    $('.s_help').find('h2').text('Возникли трудности?').addClass('line');
    $('.help_descr').text('Мы будем рады вам помочь в определении с выбором вашей будущей квартиры!');
    $('.type2').text('Заполните форму просчета и мы свяжемся с вами в удобное для вас время.');
    $('#del').detach();
  }

  // mobile mnu

  $('.burger').click(function() {
    if($(this).hasClass('active')) {
      $('.mobile_cont').fadeOut();
      $(this).removeClass('active');
      $('header').css('right', '-1000px');  
    } else {
      $('.mobile_cont').fadeIn();
      $(this).addClass('active');
      $('header').css('right', '0px'); 
    }
  });

  $('.mobile_cont').click(function() {
    $(this).fadeOut();
    $('.burger').removeClass('active');
    $('header').css('right', '-1000px');  
  });

  // problem with one page scroll plugin

  let slideImg = $('#main_slide').html();

  if ($(window).width() < 1024) {
    $('#main_slide').remove();
    $('.onepage-pagination').remove();
  }

	$('.main').css('position', 'absolute');


  // check active li tag in menu

  $('.main_nav li').click(function() {
    $('.head_nav li').removeClass('current-menu-item');
    $(this).addClass('current-menu-item');
  });

  // flats page - navigation check connected with MIXIT - UP pligin

  $('.flat_nav li a').click(function() {
    $('.flat_nav li a').removeClass('act_fl');
    $(this).addClass('act_fl');
  });

  // SLIDERS INIT


  $('.buy_slide_plan').slick({
    slidesToShow: 3,
    slidesToScroll: 3,
    prevArrow: '.buy_plan_nav .fa-caret-left',
    nextArrow: '.buy_plan_nav .fa-caret-right',
    infinite: false,
     responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
   	]

  });

  // SLICK MAIN MOBILE

  $('.slider_mobile').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    rows: 0,
    dots: true,
    prevArrow: false,
    fade: true,
    cssEase: 'linear',
    speed: 500,
    autoplay: true,
    autoplaySpeed: 5000
  }); 

  // SLICK CONCEPT PAGE TOP

  $('.conc_slider').slick({
    infinite: false,
    rows: 0,
    dots: false,
    prevArrow: '.fa-caret-left',
    nextArrow: '.fa-caret-right',
    fade: true,
    cssEase: 'linear'
  }); 

  // SLIDER GALLERY ABOUT

  $('.slides_gal .slider').slick({
    slidesToShow: 1,
    infinite: false,
    cssEase: 'linear',
    prevArrow: '.gal_nav .fa-caret-left',
    nextArrow: '.gal_nav .fa-caret-right',
    dots: false
  }); 

  $('.slider_view').slick({
    slidesToShow: 2,
	  slidesToScroll: 2,
	  infinite: false,
	  cssEase: 'linear',
	  prevArrow: '.view_nav .fa-caret-left',
    nextArrow: '.view_nav .fa-caret-right',
	  dots: false,
    responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    ]
  }); 

  $('.all_same_slide').slick({
    slidesToShow: 2,
    slidesToScroll: 2,
    infinite: false,
    cssEase: 'linear',
    prevArrow: '.news_nav .fa-caret-left',
    nextArrow: '.news_nav .fa-caret-right',
    dots: false,
    responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    ]
  });


  // INIT COUNT SLIDES ITERATION

  $('.buy_slide_plan, .all_same_slide').on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
    var i = (currentSlide ? currentSlide : 0) + 1;
    if (i == 1) {
      $('.buy_plan_nav .fa-caret-left').css('color', 'rgba(12,20,41,.4)');
      $('.news_nav .fa-caret-left').css('color', 'rgba(12,20,41,.4)');
    } else {
      $('.buy_plan_nav .fa-caret-left').css('color', '#0C1429');
      $('.news_nav .fa-caret-left').css('color', '#0C1429');
    }
    if (i == (slick.slideCount /* - 1*/)) {
      $('.buy_plan_nav .fa-caret-right').css('color', 'rgba(12,20,41,.4)');
      $('.news_nav .fa-caret-right').css('color', 'rgba(12,20,41,.4)');
    } else {
      $('.buy_plan_nav .fa-caret-right').css('color', '#0C1429');
      $('.news_nav .fa-caret-right').css('color', '#0C1429');
    }
  }); 

  $('.conc_slider, .slider_view').on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
    var i = (currentSlide ? currentSlide : 0) + 1;
    if (i == 1) {
      $('.conc_nav .fa-caret-left').css('color', 'rgba(12,20,41,.4)');
      $('.view_nav .fa-caret-left').css('color', 'rgba(12,20,41,.4)');
    } else {
      $('.conc_nav .fa-caret-left').css('color', '#0C1429');
      $('.view_nav .fa-caret-left').css('color', '#0C1429');
    }
    if (i == slick.slideCount) {
      $('.conc_nav .fa-caret-right').css('color', 'rgba(12,20,41,.4)');
      $('.view_nav .fa-caret-right').css('color', 'rgba(12,20,41,.4)');
    } else {
      $('.conc_nav .fa-caret-right').css('color', '#0C1429');
      $('.view_nav .fa-caret-right').css('color', '#0C1429');
    }
  }); 


  $('.slides_gal .slider').on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
    var i = (currentSlide ? currentSlide : 0) + 1;
    if (i == 1) {
      $('.gal_nav .fa-caret-left').css('color', 'rgba(12,20,41,.4)');
    } else {
      $('.gal_nav .fa-caret-left').css('color', '#0C1429');
    }
    if (i == slick.slideCount) {
      $('.gal_nav .fa-caret-right').css('color', 'rgba(12,20,41,.4)');
    } else {
      $('.gal_nav .fa-caret-right').css('color', '#0C1429');
    }
  }); 



  // FORMS VALIDATE

   $('form :submit').on('click', function () {
      $('input:required').each(function () {
          if (!$(this).val()) $(this).addClass('incomplete');
      });
  });

  $('input:required').on('input', function () {
      $('input:required').each(function () {
        $(this).removeClass('incomplete');      
      });
  });

  $('input[name=phone]').mask("+38 (999) 999-9999", {
      completed: function () {
          $(this).removeClass('incomplete');
      }
  });

  $('input[name=name]').on('input', function () {
      $(this).val($(this).val().replace(/[0-9\\/^$.|?*+\-_()]/g, ""));
  });


  // init select for calculate form

  $('.inst_sel, .room_sel').niceSelect();

  // flat open page - change 2d and 3d img

  $('.view li').click(function() {
    $('.view li').removeClass('cur_view');
    if ($(this).hasClass('d2')) {
      $(this).addClass('cur_view');
      $('#d2').fadeIn();
      $('#d3').fadeOut();
    } else {
      $(this).addClass('cur_view');
      $('#d2').fadeOut();
      $('#d3').fadeIn();
    }

  });

  // POPUP 

  $('.popup-with-zoom-anim').magnificPopup({
    type: 'inline',

    fixedContentPos: false,
    fixedBgPos: true,

    overflowY: 'auto',

    closeBtnInside: true,
    preloader: false,
    
    midClick: true,
    removalDelay: 300,
    mainClass: 'my-mfp-zoom-in'
  });


  //Chrome Smooth Scroll
  try {
    $.browserSelector();
    if($("html").hasClass("chrome")) {
      $.smoothScroll();
    }
  } catch(err) {

  }

  // change lang

  $('.change_lang a').click(function() {
    $('.change_lang a').removeClass('cur_leng');
    if (!$(this).hasClass('cur_leng')) {
      $(this).addClass('cur_leng');
    } else {
      $(this).removeClass('cur_leng');
    }
  });


  // send email + database connection (Ajax operation)

  var subject = '';
  var times;
  var times2;
  var social;

  $('.form_pop_soc').find('button').click(function() {
    social = $(this).data('soc');
  });

  $('.radio_wrap input').click(function() {
    times = $(this).val();
  });

  $('.form_help .radio_wrap input').click(function() {
    times2 = $(this).val();
  });

  // CALL BACK FORMS


  $('.form_pop_soc').on('submit', function (e) {

    e.preventDefault();

    var soc_val = $(this).find('button').click(function() {return $(this).data('soc')});

    $this = $(this);
    var name = $this.find('input[name="name"]').val() ? $this.find('input[name="name"]').val() : null;
    var phone = $this.find('input[name="phone"]').val() ? $this.find('input[name="phone"]').val() : null;
    var frst_installment = $('.frst_inst').find('input').val() ? $('.frst_inst').find('input').val() : null;
    var currency = $('.frst_inst').find('select').val() ? $('.frst_inst').find('select').val() : null;
    var square_from = $('.square').find('input[name="from"]').val() ? $('.square').find('input[name="from"]').val() : null;
    var square_to = $('.square').find('input[name="to"]').val() ? $('.square').find('input[name="to"]').val() : null;
    var soc = social ? social : null;

    $.ajax({
      type: "POST",
      url: '/wp-admin/admin-ajax.php',
      data: {
        action: 'do_something_2',
        name: name,
        phone: phone,
        frst_installment: frst_installment,
        currency: currency,
        square_from: square_from,
        square_to: square_to,
        subject: subject,
        soc: soc,
        url: location.href
      },
      beforeSend: function () {
        // $this.find('.btn_w_line').remove();
      },
      success: function () {
        $this.find('.succes_white').fadeIn();
        setTimeout(function () {
          $.magnificPopup.close();
        }, 5000);
      }
    });
  });




  $('.form_pop_call').on('submit', function (e) {

    e.preventDefault();

    $this = $(this);
    var name = $this.find('input[name="name"]').val() ? $this.find('input[name="name"]').val() : null;
    var phone = $this.find('input[name="phone"]').val() ? $this.find('input[name="phone"]').val() : null;
    var mail = $this.find('.email').val() ? $this.find('.email').val() : null;
    var question = $this.find('.question').val() ? $this.find('.question').val() : null;
    var time = times ? times : null;

    $.ajax({
      type: "POST",
      url: '/wp-admin/admin-ajax.php',
      data: {
        action: 'do_something',
        name: name,
        phone: phone,
        mail: mail,
        question: question,
        subject: subject,
        time: time,
        url: location.href
      },
      beforeSend: function () {
        // $this.find('.btn_w_line').remove();
      },
      success: function () {
        $this.find('.succes').fadeIn();
        setTimeout(function() {
          $.magnificPopup.close();
        }, 5000);
        $('.wrap').fadeOut();
        $('.message').delay(500).fadeIn();
      }
    });
  });


  $('.form_help, .form_call_b').on('submit', function (e) {

    e.preventDefault();

    $this = $(this);
    var name = $this.find('input[name="name"]').val() ? $this.find('input[name="name"]').val() : null;
    var phone = $this.find('input[name="phone"]').val() ? $this.find('input[name="phone"]').val() : null;
    var mail = $this.find('input[name="email"]').val() ? $this.find('input[name="email"]').val() : null;
    var question = $this.find('.question').val() ? $this.find('.question').val() : null;
    var time = times2 ? times2 : null;

    $.ajax({
      type: "POST",
      url: '/wp-admin/admin-ajax.php',
      data: {
        action: 'do_something',
        name: name,
        phone: phone,
        mail: mail,
        question: question,
        subject: subject,
        time: time,
        url: location.href
      },
      beforeSend: function () {
        // $this.find('.btn_w_line').remove();
      },
      success: function () {
        $this.find('.succes_help').fadeIn();
      }
    });
  });


  $('.form_call').on('submit', function (e) {

    e.preventDefault();

    $this = $(this);
    var name = $this.find('input[name="name"]').val() ? $this.find('input[name="name"]').val() : null;
    var phone = $this.find('input[name="phone"]').val() ? $this.find('input[name="phone"]').val() : null;
    var mail = $this.find('input[name="email"]').val() ? $this.find('input[name="email"]').val() : null;
    var question = $this.find('.question').val() ? $this.find('.question').val() : null;
    var time = times2 ? times2 : null;

    $.ajax({
      type: "POST",
      url: '/wp-admin/admin-ajax.php',
      data: {
        action: 'do_something',
        name: name,
        phone: phone,
        mail: mail,
        question: question,
        subject: subject,
        time: time,
        url: location.href
      },
      beforeSend: function () {
        // $this.find('.btn_w_line').remove();
      },
      success: function () {
        $this.find('.succes_foot').fadeIn();
      }
    });
  });









  // init mixit up plugin

  var mixer = mixitup('.flat_mixer');
  mixer.filter('all');

});


// preloader

$(window).on('load', function() {
  $('#loaderSvgWrapper').fadeOut();
});

