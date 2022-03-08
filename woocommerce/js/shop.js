import '../sass/shop.sass';

const myCart = {
  init() {
    this.closeOffcanvasCart();
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
};

function onReady() {
  myCart.init();
}

function onLoad() {
  // script that runs when everything is loaded
}

document.addEventListener('DOMContentLoaded', onReady);
window.addEventListener('load', onLoad);
