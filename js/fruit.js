jQuery(document).ready(function($) {
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
    var jQuerynav = jQuery(".menu_destop");
    jQuerynav.removeClass('menu_destopscroll');
    jQuery(document).scroll(function() {
        jQuerynav.toggleClass('menu_destopscroll', jQuery(this).scrollTop() > jQuerynav.height());
    });
}

function mobilescroll() {
    var jQuerynav = $(".menu_mobile");
    jQuerynav.removeClass('menu_mobilescroll');

    jQuery(document).scroll(function() {

        jQuerynav.toggleClass('menu_mobilescroll', jQuery(this).scrollTop() > jQuerynav.height());
    });
}

  function popupquikviewpd() {
  $('.js_call_popup').on('click', function() {
       $(this).closest('.js-inno-wrapper-popup').find('.js-popup-product-quikview').addClass('active');
       $(this).closest('.js-inno-wrapper-popup').find('.js-bg-popup-product-quikview').addClass('active');
    });
  $('.js-bg-popup-product-quikview').on('click',function(){
      $(this).closest('.js-inno-wrapper-popup').find('.js-popup-product-quikview').removeClass('active');
      $(this).closest('.js-inno-wrapper-popup').find('.js-bg-popup-product-quikview').removeClass('active');
    });
  $('.js_close_popup-product').on('click',function(){
      $(this).closest('.js-inno-wrapper-popup').find('.js-popup-product-quikview').removeClass('active');
      $(this).closest('.js-inno-wrapper-popup').find('.js-bg-popup-product-quikview').removeClass('active');
    });
}
function sliderproduct(){
   $('.slider-imagebig').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  fade: true,
  asNavFor: '.slider-imagesmall',
  prevArrow:'<button type="button" class="prev-slide"><i class="fa fa-angle-left"></i> </button>',
  nextArrow:'<button type="button" class="next-slide"> <i class="fa fa-angle-right"></i></button>',
});
$('.slider-imagesmall').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.slider-imagebig',
  dots: false,
  arrows: false,
  infinite: false,
  focusOnSelect: true
});
}


sliderproduct();
popupquikviewpd();
jssearch();
menumobile();
mobilescroll();
fixedHeader();


});
