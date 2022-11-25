import Swiper, { Navigation, Pagination } from 'swiper';

export default function initSwiper($wrapper, rawArgs) {
  const args = {
    slideClass: 'wp-block-image',
    slidesPerView: 1,
    spaceBetween: 20,
    pagination: true,
    navigation: true,
    createElements: true,
    modules: [],
    ...rawArgs,
  };

  // Add necessary classes
  $wrapper.classList.add('swiper');

  const $slides = $wrapper.querySelectorAll(`.${args.slideClass}`);
  $slides.forEach(($s) => {
    $s.classList.add('swiper-slide');
  });

  if (args.pagination) {
    // Create pagination element
    const $pagination = document.createElement('div');
    $pagination.classList.add('swiper-pagination');
    $wrapper.appendChild($pagination);

    args.modules.push(Pagination);
    args.pagination = {
      el: '.swiper-pagination',
      clickable: true,
      ...args.pagination,
    };
  }

  if (args.navigation) {
    args.modules.push(Navigation);
  }

  const swiper = new Swiper($wrapper, args);
}
