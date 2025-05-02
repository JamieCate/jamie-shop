jQuery(document).ready(function($) {
    $('.home-carousel').slick({
      dots: true,
      arrows: true,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
    });
  });
  

  jQuery(document).ready(function($) {
    $('.special-offers-carousel').slick({
      dots: true,
      arrows: true,
      infinite: false,
      slidesToScroll: 1,
      autoplay: false,
      slidesToShow: 5,
      slidesToScroll: 1,
      prevArrow: '<i class="fa-solid fa-chevron-left offers-prev-arrow"></i>',
      nextArrow: '<i class="fa-solid fa-chevron-right offers-next-arrow"></i>',
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
      ]
    });
  });
  