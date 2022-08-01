export default {
  init() {
    this.offcanvasMegaMenu();
  },

  /**
   * Toggle listener for mega menu in offcanvas
   */
  offcanvasMegaMenu() {
    const $itemLinks = document.querySelectorAll('.offcanvas .h-mega-menu.menu-item-has-children a');
    $itemLinks.forEach(($link) => {
      $link.addEventListener('click', (e) => {
        e.preventDefault();

        const $wrapper = e.currentTarget.closest('.h-mega-menu');
        $wrapper.classList.toggle('h-mega-menu-is-active');
      });
    });
  },
};
