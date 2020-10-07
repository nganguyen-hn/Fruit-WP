new WOW().init();
jQuery(function() {
    jQuery('.height').matchHeight();
  });


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
function buttonclickmnmb(){
    
     $('.js_mna').on('click', function() {
      $(this).toggleClass('active');
     
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

  function totop(){
     var back_to_top = $('#back-to-top');
    if (back_to_top.length) {
        var scrollTrigger = 100, // px
            backToTop = function() {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    back_to_top.addClass('show');
                } else {
                    back_to_top.removeClass('show');
                }
            };
        $(window).on('scroll', function() {
            backToTop();
        });
        back_to_top.on('click', function(e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    }
  }

  function jspopuptd(){
    $('.jscall-popuput').on( 'click', function() {
      $('.js-popuput').addClass('active');
      $('.js-bg-popuput').addClass('active');
    });
    $('.js-close-popuput').on( 'click', function() {
      $('.js-popuput').removeClass('active');
      $('.js-bg-popuput').removeClass('active');
    });
    $('.js-bg-popuput').on( 'click', function() {
      $('.js-popuput').removeClass('active');
      $('.js-bg-popuput').removeClass('active');
    });
  }
jspopuptd(); 
totop(); 
jssearch();
menumobile();
buttonclickmnmb();
mobilescroll();
fixedHeader();
minicartsideright();
