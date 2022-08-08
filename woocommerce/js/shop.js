import '../sass/shop.sass';
import myProductSlider from './_shop-slider';

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

function onReady() {
  myCart.init();
  myProductSlider.init();
}

function onLoad() {
  // script that runs when everything is loaded
}

document.addEventListener('DOMContentLoaded', onReady);
window.addEventListener('load', onLoad);
