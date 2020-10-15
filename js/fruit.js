
jQuery(document).ready(function(){
  function jssearch() {
  jQuery('.js-search-destop').on('click', function() {
      jQuery('.js-box-search').addClass('active');
      jQuery('.bg_search_box').addClass('active');
      jQuery('body').addClass('activedestop');
    });
    jQuery('.js-drawer-close').on('click', function() {
      jQuery('.js-box-search').removeClass('active');
      jQuery('.bg_search_box').removeClass('active');
      jQuery('body').removeClass('activedestop');
    });
    jQuery('.bg_search_box').on('click', function() {
      jQuery('.js-box-search').removeClass('active');
      jQuery('.bg_search_box').removeClass('active');
      jQuery('body').removeClass('activedestop');
    });
}

function menumobile() {
    jQuery('.jsmenu').on('click', function() {
      jQuery('.content_menumobile').toggleClass('active');     
      jQuery('.background_content_menumobile').toggleClass('active');     
    });
    jQuery('.background_content_menumobile').on('click', function() {
        jQuery('.content_menumobile').removeClass('active');
        jQuery('.background_content_menumobile').removeClass('active');
    });
    jQuery('.close-menu').on('click', function() {
        jQuery('.content_menumobile').removeClass('active');
        jQuery('.background_content_menumobile').removeClass('active');
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
    var jQuerynav = jQuery(".menu_mobile");
    jQuerynav.removeClass('menu_mobilescroll');

    jQuery(document).scroll(function() {

        jQuerynav.toggleClass('menu_mobilescroll', jQuery(this).scrollTop() > jQuerynav.height());
    });
}


 

jssearch();
menumobile();
mobilescroll();
fixedHeader();


})
