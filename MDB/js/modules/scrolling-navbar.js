"use strict";

(function ($) {
  var SCROLLING_NAVBAR_OFFSET_TOP = 70;
  $( "#home_page" ).on('scroll', function () {
    var $navbar = $('.navbar');
    

    if ($navbar.length) {
      if ($navbar.offset().$("#home_page").top > SCROLLING_NAVBAR_OFFSET_TOP) {
        $('.scrolling-navbar').addClass('top-nav-collapse');
        
      } else {
        $('.scrolling-navbar').removeClass('top-nav-collapse');
      }
    }
  });
})(jQuery);