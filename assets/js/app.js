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

    this.toggleOffcanvas();
    this.closeOffcanvas();
    this.preventCloseOffcanvas();

    this.megaMenuOffcanvas();
    this.submenuDepth2Offcanvas();
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
  toggleOffcanvas() {
    const $menuLinks = document.querySelectorAll('[href="#menu"]');
    $menuLinks.forEach(($link) => {
      $link.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        document.querySelector('body').classList.toggle('has-active-offcanvas');
      });
    });
  },

  /**
   * Close offcanvas when clicking outside it
   */
  closeOffcanvas() {
    document.addEventListener('click', () => {
      document.querySelector('body').classList.remove('has-active-offcanvas');
    });
  },

  preventCloseOffcanvas() {
    const $offcanvas = document.querySelector('.offcanvas');

    if ($offcanvas) {
      $offcanvas.addEventListener('click', (e) => {
        e.stopPropagation();
      });
    }
  },

  /**
   * Toggle listener for mega menu in offcanvas
   */
  megaMenuOffcanvas() {
    const $itemLinks = document.querySelectorAll('.offcanvas .mega-menu.menu-item-has-children a');
    $itemLinks.forEach(($link) => {
      $link.addEventListener('click', (e) => {
        e.preventDefault();

        const $wrapper = e.currentTarget.closest('.mega-menu');
        $wrapper.classList.toggle('mega-menu-is-active');
      });
    });
  },

  /**
   * Toggle listener for 2nd level submenu
   */
  submenuDepth2Offcanvas() {
    const $itemLinks = document.querySelectorAll('.offcanvas .menu-item:not(.mega-menu) .submenu-item.menu-item-has-children > a');
    $itemLinks.forEach(($link) => {
      $link.addEventListener('click', (e) => {
        e.preventDefault();

        const $wrapper = e.currentTarget.closest('.submenu-item');
        $wrapper.classList.toggle('submenu-item-is-active');
      });
    });
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
