import myDarkMode from './_dark-mode';
import myMegaMenu from './_mega-menu';
import { stickyHeader, offcanvas } from './_header';
import swiper from './_swiper';

// import myAnimation from './_animation';
import '../css/app.sass';

// GENERAL LISTENERS
const myApp = {
  init() {
    this.gallerySlider();
  },

  gallerySlider() {
    const $sliders = document.querySelectorAll('.wp-block-gallery.is-style-h-slider');

    $sliders.forEach(($slider) => {
      const matchColumns = $slider.getAttribute('class').match(/columns-(\d)/);
      const columns = matchColumns ? parseInt(matchColumns[1], 10) : 1;

      swiper($slider, {
        slideClass: 'wp-block-image',
        slidesPerView: columns,
        slidesPerGroup: columns,
        loop: true,
        pagination: true,
        navigation: true,
      });
    });
  },
};

function onReady() {
  myApp.init();
  myMegaMenu.init();
  myDarkMode.init();
  // myAnimation.init();

  stickyHeader.init();
  offcanvas.init();
}

function onLoad() {
  // script that runs when everything is loaded
}

document.addEventListener('DOMContentLoaded', onReady);
window.addEventListener('load', onLoad);
