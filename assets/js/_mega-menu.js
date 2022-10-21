export default {
  init() {
    this.offcanvasMegaMenu();
  },

  /**
   * Toggle listener for mega menu in offcanvas
   */
  offcanvasMegaMenu() {
    const $itemLinks = document.querySelectorAll('.offcanvas .menu-item-has-mega-menu > a');
    $itemLinks.forEach(($link) => {
      $link.addEventListener('click', (e) => {
        e.preventDefault();

        const $wrapper = e.currentTarget.closest('.menu-item');
        $wrapper.classList.toggle('is-open');
      });
    });
  },
};
