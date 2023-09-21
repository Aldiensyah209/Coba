$(document).ready(function (e) {
  $(window).scroll(function () {
    var scrollTop = $(window).scrollTop();
    if ( scrollTop > 0) { 
      $('header').addClass('fixed-top').addClass('bg-light').addClass('shadow');
    } else {
      $('header').removeClass('fixed-top').removeClass('bg-light').removeClass('shadow');
    }
  })
});