import '../css/app.sass';

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

    this.offcanvasMegaMenu();
    this.offcanvasDepth2();
    this.footerDepth1();
  },

  /**
   *  Add extra class to Sticky header when it's on sticky state
   */
  stickyRow() {
    if (!(CSS.supports && CSS.supports('position', 'sticky'))) { return; }

    const target = '.header, .header-mobile';
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
  offcanvasMegaMenu() {
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
  offcanvasDepth2() {
    const $itemLinks = document.querySelectorAll('.offcanvas .menu-item:not(.mega-menu) .submenu-item.menu-item-has-children > a');
    $itemLinks.forEach(($link) => {
      $link.addEventListener('click', (e) => {
        e.preventDefault();

        const $wrapper = e.currentTarget.closest('.submenu-item');
        $wrapper.classList.toggle('submenu-item-is-active');
      });
    });
  },

  footerDepth1() {
    const $itemLinks = document.querySelectorAll('.footer-widgets .menu-item-has-children > a');
    $itemLinks.forEach(($link) => {
      $link.addEventListener('click', (e) => {
        e.preventDefault();
        if (window.width > 480) { return; }

        const $wrapper = e.currentTarget.closest('.menu-item');
        $wrapper.classList.toggle('menu-item-is-active');
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

// DARK TOGGLE
const myDarkMode = {
  init() {
    this.clickListener();
    this.tabindexListener();
  },

  /**
   * Click listener for dark mode toggle
   */
  clickListener() {
    const $darkToggles = document.querySelectorAll('.h-dark-toggle input[type="checkbox"]');
    if ($darkToggles.length <= 0) { return; }

    $darkToggles.forEach(($t) => {
      $t.addEventListener('change', (e) => {
        this.toggle(e.currentTarget.checked);
      });
    });
  },

  /**
   * Keyboard listener for dark mode toggle
   */
  tabindexListener() {
    const $darkSwitches = document.querySelectorAll('.h-dark-toggle__switch');

    $darkSwitches.forEach(($s) => {
      $s.addEventListener('keyup', (e) => {
        if (e.key === 'Enter' || e.keyCode === 13) {
          const $checkbox = e.currentTarget.closest('.h-dark-toggle').querySelector('input[type="checkbox"]');
          $checkbox.checked = !$checkbox.checked;
          this.toggle($checkbox.checked);
        }
      });
    });
  },

  /**
   * Toggle the body class and cache the variable
   */
  toggle(isChecked) {
    document.querySelector('body').classList.toggle('h-is-dark', isChecked);

    // the checker for this is outputed into wp_body_open() by Edje WP Library
    localStorage.setItem('hDarkMode', isChecked);
  },
};

function onReady() {
  myApp.init();
  myHeader.init();
  myDarkMode.init();
}

function onLoad() {
  // script that runs when everything is loaded
}

document.addEventListener('DOMContentLoaded', onReady);
window.addEventListener('load', onLoad);
