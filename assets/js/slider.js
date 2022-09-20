import $ from 'jquery';

document.addEventListener('DOMContentLoaded', () => {
  const sliders = document.querySelectorAll('.product-slider');
  if (sliders) {
    sliders.forEach((slider) => {
      const wrapper = slider.querySelector('.wc-block-grid__products, .products-loop__list');
      const slides = slider.querySelectorAll('.wc-block-grid__product, .product');

      if (slides.length > 6) {
        const divWrapper = document.createElement('div');
        divWrapper.innerHTML = wrapper.innerHTML;
        divWrapper.classList = wrapper.classList;
        wrapper.replaceWith(divWrapper);

        for (let i = 0; i < slides.length; i += 1) {
          const divSlide = document.createElement('div');
          divSlide.innerHTML = slides[i].innerHTML;
          divSlide.classList = slides[i].classList;
          slides[i].replaceWith(divSlide);
        }

        $(divWrapper).slick({
          slidesToShow: 6,
          slidesToScroll: 1,
          prevArrow: '<div class="slick-prev"></div>',
          nextArrow: '<div class="slick-next"></div>',
          responsive: [
            {
              breakpoint: 1280,
              settings: {
                slidesToShow: 5,
              },
            },
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: 4,
              },
            },
            {
              breakpoint: 991,
              settings: {
                slidesToShow: 3,
              },
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 2,
              },
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
              },
            },
          ],
        });
      }
    });
  }
});
