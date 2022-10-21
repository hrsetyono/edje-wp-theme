/**
 * Animation
 */
export default {
  init() {
    const $elems = document.querySelectorAll('.my-elem');
    this.fadeIn($elems);
  },

  fadeIn($elements, target = 'middle-bottom') {
    const args = {
      from: target,
      to: target,
      '--hOpacity': '0 to 1',
      '--hY': '10px to 0',
      direct: true,
    };

    if (!$elements) { return; }

    // if single element
    if ($elements instanceof Element) {
      window.hScroll($elements, args);
    } else if ($elements.length > 0) { // if multiple elements
      $elements.forEach(($el) => {
        window.hScroll($el, args);
      });
    }
  },
};
