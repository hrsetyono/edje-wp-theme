import '../sass/app.sass';

// GENERAL LISTENERS
const myApp = {
  init() {
    // do something
  },
};

// HEADER
const myHeader = {
  init() {
    this.stickyRow();

    // toggle offcanvas menu
    const $menuLinks = document.querySelectorAll('[href="#menu"]');
    [...$menuLinks].forEach(($link) => {
      $link.addEventListener('click', this.toggleOffcanvas);
    });

    // close off canvas
    document.addEventListener('click', this.closeOffcanvas);
    const $offcanvas = document.querySelector('.offcanvas');
    if ($offcanvas) {
      $offcanvas.addEventListener('click', this.preventClose);
    }
  },

  /**
   *  Add extra class to Sticky header when it's on sticky state
   */
  stickyRow() {
    if (!(CSS.supports && CSS.supports('position', 'sticky'))) { return; }

    const target = '.header';
    const $elems = [].slice.call(document.querySelectorAll(target));

    // Initial check if already sticky
    $elems.forEach(this.checkStickyState);

    window.addEventListener('scroll', () => {
      $elems.forEach(this.checkStickyState);
    });
  },

  /**
   * Open or close the offcanvas menu
   */
  toggleOffcanvas(e) {
    e.preventDefault();
    e.stopPropagation();
    document.querySelector('body').classList.toggle('has-active-offcanvas');
  },

  /**
   * Close offcanvas when clicking outside it
   */
  closeOffcanvas() {
    document.querySelector('body').classList.remove('has-active-offcanvas');
  },

  preventClose(e) {
    e.stopPropagation();
  },

  /**
   * Check if an element is in Sticky state or not
   * @param {*} $elem
   */
  checkStickyState($elem) {
    const currentOffset = $elem.getBoundingClientRect().top;
    const stickyOffset = parseInt(getComputedStyle($elem).top.replace('px', ''), 10);
    const isStuck = currentOffset <= stickyOffset;

    if (isStuck) {
      $elem.classList.add('is-stuck');
    } else {
      $elem.classList.remove('is-stuck');
    }
  },
};

function onReady() {
  myApp.init();
  myHeader.init();
}

function onLoad() {
  // script that runs when everything is loaded
}

document.addEventListener('DOMContentLoaded', onReady);
window.addEventListener('load', onLoad);
