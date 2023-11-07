let tag = document.createElement("script");
tag.src = "https://www.youtube.com/iframe_api";

let firstScriptTag = document.getElementsByTagName("script")[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

let players = [];
let VIDEO_PLAYING_STATE = {
    PLAYING: "PLAYING",
    PAUSE: "PAUSE",
};
let videoPlayStatus = VIDEO_PLAYING_STATE.PAUSE;
let timeout = null;
let waiting = 3000;

function onYouTubeIframeAPIReady() {
    const w = "100%";
    const h = "100%";

    if ($(".yt-player").length) {
        $(".yt-player").each(function (index, element) {
            const videoID = $(this).attr("data-id");

            let player = new YT.Player(element, {
                height: w,
                width: h,
                videoId: videoID,
                events: {
                    onReady: index == 0 ? onPlayerReady : "",
                },
            });

            players.push(player);
        });
    }
}

function onPlayerReady(event) {
    event.target.playVideo();
}

let swiperHero = new Swiper("#hero .mySwiper", {
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
    on: {
        init: function () {
            const firstSlideType = $("#hero .swiper-slide-active").attr(
                "data-slide-type"
            );

            if (firstSlideType == "img") {
                runNext();
            }
        },
        slideChange: function () {
            const currentIndex = this.activeIndex;
            const currentSlide = $(swiperHero.slides[currentIndex]);
            const currentSlideType = currentSlide.data("slide-type");

            const previousIndex = this.previousIndex;
            const previousSlide = $(swiperHero.slides[previousIndex]);
            const previousSlideType = previousSlide.data("slide-type");

            clearTimeout(timeout);

            switch (currentSlideType) {
                case "img":
                    runNext();

                    if (previousSlideType == "vdo") {
                        players[players.length - 1].pauseVideo();
                    }
                    break;
                case "vdo":
                    // incase user click next before video ended
                    if (
                        videoPlayStatus === VIDEO_PLAYING_STATE.PLAYING &&
                        previousSlideType == "vdo"
                    ) {
                        players[previousIndex].pauseVideo();
                    }

                    players[currentIndex].playVideo();
                    videoPlayStatus = VIDEO_PLAYING_STATE.PLAYING;
                    break;
                default:
                    throw new Error("invalid slide type");
            }
        },
    },
});

function next() {
    swiperHero.slideNext();
}

function runNext() {
    timeout = setTimeout(function () {
        next();
    }, waiting);
}

let swiperGaleri = new Swiper("#galeri .mySwiper", {
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
        },
    },
});
