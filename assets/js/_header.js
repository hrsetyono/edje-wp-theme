const stickyHeader = {
  hasTransparentHeader: false,
  init() {
    // Abort if browser doesn't support sticky position
    if (!(CSS.supports && CSS.supports('position', 'sticky'))) { return; }

    const $elems = document.querySelectorAll('.header, .header-mobile');
    let $visibleElems = $elems;

    // If has transparent header, filter only visible elements
    if (document.body.classList.contains('h-has-transparent-header')) {
      this.hasTransparentHeader = true;
      $visibleElems = this.getVisibleElems($elems);

      window.addEventListener('resize', () => {
        $visibleElems = this.getVisibleElems($elems);
      });
    }

    // Initial check if already sticky
    $visibleElems.forEach(this.checkPosition.bind(this));

    window.addEventListener('scroll', () => {
      $visibleElems.forEach(this.checkPosition.bind(this));
    });
  },

  //

  /**
   * Check which elements are currently visible
   */
  getVisibleElems($elems) {
    return [...$elems].filter(($e) => $e.offsetWidth > 0 || $e.offsetHeight > 0 || $e.getClientRects().length > 0);
  },

  /**
   * Check whether the element has reached the top of the screen
   */
  checkPosition($elem) {
    const currentOffset = $elem.getBoundingClientRect().top;
    const stickyOffset = parseInt(getComputedStyle($elem).top.replace('px', ''), 10);
    const isStuck = currentOffset <= stickyOffset;

    $elem.classList.toggle('is-stuck', isStuck);

    if (this.hasTransparentHeader) {
      document.body.classList.toggle('h-has-transparent-header', !isStuck);
    }
  },
};

const offcanvas = {
  init() {
    this.toggleOffcanvas();
    this.closeOffcanvas();
    this.preventCloseOffcanvas();

    this.offcanvasSubmenu();
    // this.offcanvasDepth2();
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

  /**
   * Prevent closing the offcanvas when clicking inside it
   */
  preventCloseOffcanvas() {
    const $offcanvas = document.querySelector('.offcanvas');

    if ($offcanvas) {
      $offcanvas.addEventListener('click', (e) => {
        e.stopPropagation();
      });
    }
  },

  /**
   * Toggle offcanvas submenu
   */
  offcanvasSubmenu() {
    const $itemLinks = document.querySelectorAll('.offcanvas .menu-item.menu-item-has-children > a, .offcanvas .submenu-item.menu-item-has-children > a');
    $itemLinks.forEach(($link) => {
      $link.addEventListener('click', (e) => {
        e.preventDefault();

        const $wrapper = e.currentTarget.parentElement;
        $wrapper.classList.toggle('has-open-submenu');
      });
    });
  },
};

export {
  stickyHeader,
  offcanvas,
};

export default {
  init() {
    stickyHeader.init();
    offcanvas.init();
  },
};
