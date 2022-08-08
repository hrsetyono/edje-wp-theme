import Swiper, { Navigation, Pagination } from 'swiper';
import 'swiper/swiper.min.css';
import 'swiper/modules/navigation/navigation.min.css';
import 'swiper/modules/pagination/pagination.min.css';

export default {
  init() {
    const $sliders = document.querySelectorAll('.wc-block-grid.is-style-my-slider');
    $sliders.forEach(($slider) => {
      // abort if Related Product section and on desktop
      if ($slider.closest('.product-related') && window.innerWidth >= 768) {
        return;
      }

      this.setupClasses($slider);
      this.setupSlider($slider);
    });
  },

  /**
   * Add all the Swiper related classes
   */
  setupClasses($slider) {
    $slider.classList.add('swiper');
    $slider.querySelector('.wc-block-grid__products').classList.add('swiper-wrapper');

    const $slides = $slider.querySelectorAll('.wc-block-grid__product');
    $slides.forEach(($s) => {
      $s.classList.add('swiper-slide');
    });

    // add extra elements
    const $pagination = document.createElement('div');
    const $next = document.createElement('div');
    const $prev = document.createElement('div');

    $pagination.classList.add('swiper-pagination');
    $next.classList.add('swiper-button-next');
    $prev.classList.add('swiper-button-prev');

    $slider.appendChild($pagination);
    $slider.appendChild($next);
    $slider.appendChild($prev);
  },

  /**
   * Setup the arguments for Swiper
   */
  setupSlider($slider) {
    const hasColumns = $slider.getAttribute('class').match(/has-(\d)-columns/);
    const columns = hasColumns[1] ? parseInt(hasColumns[1], 10) : 3;

    const swiper = new Swiper($slider, {
      modules: [Navigation, Pagination],
      loop: true,
      slidesPerView: 2,
      slidesPerGroup: 2,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        // when window width is >= 768px
        768: {
          slidesPerView: columns,
          slidesPerGroup: columns,
        },
      },
    });
  },
};
