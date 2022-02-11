import '../sass/shop.sass';

const myCart = {
  init() {
    this.closeOffcanvasCart();
  },

  /**
   * Set listener to close the offcanvas cart
   */
  closeOffcanvasCart() {
    const $title = document.querySelector('.h-cart.is-style-offcanvas .widgettitle');

    if (!$title) { return; }

    $title.addEventListener('click', (e) => {
      e.currentTarget.closest('.h-cart').classList.remove('is-active');
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
