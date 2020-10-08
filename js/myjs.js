function jssearch() {
  $('.js-search-destop').on('click', function() {
      $('.js-box-search').addClass('active');
      $('.bg_search_box').addClass('active');
      $('body').addClass('activedestop');
    });
    $('.js-drawer-close').on('click', function() {
      $('.js-box-search').removeClass('active');
      $('.bg_search_box').removeClass('active');
      $('body').removeClass('activedestop');
    });
    $('.bg_search_box').on('click', function() {
      $('.js-box-search').removeClass('active');
      $('.bg_search_box').removeClass('active');
      $('body').removeClass('activedestop');
    });
}

function menumobile() {
    $('.jsmenu').on('click', function() {
      $('.content_menumobile').toggleClass('active');     
      $('.background_content_menumobile').toggleClass('active');     
    });
    $('.background_content_menumobile').on('click', function() {
        $('.content_menumobile').removeClass('active');
        $('.background_content_menumobile').removeClass('active');
    });
    $('.close-menu').on('click', function() {
        $('.content_menumobile').removeClass('active');
        $('.background_content_menumobile').removeClass('active');
    });
}

function fixedHeader() {
    var $nav = $(".menu_destop");
    $nav.removeClass('menu_destopscroll');
    $(document).scroll(function() {
        $nav.toggleClass('menu_destopscroll', $(this).scrollTop() > $nav.height());
    });
}

function mobilescroll() {
    var $nav = $(".menu_mobile");
    $nav.removeClass('menu_mobilescroll');

    $(document).scroll(function() {

        $nav.toggleClass('menu_mobilescroll', $(this).scrollTop() > $nav.height());
    });
}

function minicartsideright() {
    $('.jscartmini_side_right').on('click', function() {
        $('.sidecart_left_mini').addClass('active');
        $('.bg_sidecart_left_mini').addClass('active');
    });
    $('.closebtn').on('click', function() {
        $('.sidecart_left_mini').removeClass('active');
        $('.bg_sidecart_left_mini').removeClass('active');
    });
    $('.bg_sidecart_left_mini').on('click', function() {
        $('.sidecart_left_mini').removeClass('active');
        $('.bg_sidecart_left_mini').removeClass('active');
    });
}

 

jssearch();
menumobile();
mobilescroll();
fixedHeader();
minicartsideright();
