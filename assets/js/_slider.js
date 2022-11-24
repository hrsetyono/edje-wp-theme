import Swiper, { Navigation, Pagination } from 'swiper';
import 'swiper/swiper.min.css';
import 'swiper/modules/navigation/navigation.min.css';
import 'swiper/modules/pagination/pagination.min.css';

export default function initSwiper($wrapper, rawArgs) {
  const args = {
    createElements: true,
    slideClass: 'wp-block-image',
    slidesPerView: 1,
    spaceBetween: 20,
    pagination: true,
    navigation: true,
    modules: [],
    ...rawArgs,
  };

  // Add necessary classes
  $wrapper.classList.add('swiper');

  const $slides = $wrapper.querySelectorAll(`.${args.slideClass}`);
  $slides.forEach(($s) => {
    $s.classList.add('swiper-slide');
  });

  // Check for modules
  if (args.pagination) {
    args.modules.push(Pagination);
  }

  if (args.navigation) {
    args.modules.push(Navigation);
  }

  const swiper = new Swiper($wrapper, args);
}
