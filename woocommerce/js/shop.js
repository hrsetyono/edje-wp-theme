import swiper from '../../assets/js/_swiper';
import '../css/shop.sass';

const myCart = {
  init() {
    this.closeOffcanvasCart();
    this.bottomBar();
  },

  /**
   * Set listener to close the offcanvas cart
   */
  closeOffcanvasCart() {
    const $titles = document.querySelectorAll('.h-cart.is-style-offcanvas .widgettitle');

    [...$titles].forEach(($t) => {
      $t.addEventListener('click', (e) => {
        e.currentTarget.closest('.h-cart').classList.remove('is-active');
      });
    });
  },

  /**
   * Listeners for the Bottom Bar in mobile
   */
  bottomBar() {
    const $toggles = document.querySelectorAll('.product-bar [href="#add-product"]');

    $toggles.forEach(($t) => {
      $t.addEventListener('click', toggle);
    });

    function toggle() {
      const $form = document.querySelector('.product-bar__form');
      const $buttons = document.querySelector('.product-bar__buttons');

      $form.classList.toggle('is-hidden');
      $buttons.classList.toggle('is-hidden');
    }
  },
};

const mySlider = {
  init() {
    const $sliders = document.querySelectorAll('.wc-block-grid.is-style-my-slider');

    $sliders.forEach(($slider) => {
      // abort if Related Product section and on desktop
      if ($slider.closest('.product-related') && window.innerWidth >= 768) {
        return;
      }

      const hasColumns = $slider.getAttribute('class').match(/has-(\d)-columns/);
      const columns = hasColumns[1] ? parseInt(hasColumns[1], 10) : 3;

      swiper($slider, {
        slideClass: 'wc-block-grid__product',
        loop: true,
        slidesPerView: 2,
        slidesPerGroup: 2,
        pagination: true,
        navigation: true,
        breakpoints: {
          // when window width is >= 768px
          768: {
            slidesPerView: columns,
            slidesPerGroup: columns,
          },
        },
      });
    });
  },
};

function onReady() {
  myCart.init();
  mySlider.init();
}

function onLoad() {
  // script that runs when everything is loaded
}

document.addEventListener('DOMContentLoaded', onReady);
window.addEventListener('load', onLoad);
