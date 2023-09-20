$(document).ready(function (e) {
  $(window).scroll(function () {
    var scrollTop = $(window).scrollTop();
    if ( scrollTop > 0) { 
      $('header').addClass('fixed-top');
      $('nav').addClass('shadow');
    } else {
      $('header').removeClass('fixed-top');
      $('nav').removeClass('shadow');
    }
  })
});