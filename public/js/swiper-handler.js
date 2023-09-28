var swiper = new Swiper("#hero .mySwiper", {
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  cssMode: true,
  navigation: {
    nextEl: "#hero .swiper-button-next",
    prevEl: "#hero .swiper-button-prev",
  },
  pagination: {
    el: "#hero .swiper-pagination",
    dynamicBullets: true,
    clickable: true,
  },
  mousewheel: true,
  keyboard: true,
});

var swiper = new Swiper("#galeri .mySwiper", {
  slidesPerView: 1,
  spaceBetween: 10,
  freeMode: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  pagination: {
    el: "#galeri .swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    992: {
      slidesPerView: 4,
      spaceBetween: 20,
    }
  },
});