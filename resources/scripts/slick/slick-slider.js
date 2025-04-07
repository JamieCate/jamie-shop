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
      prevArrow: '<i class="fa-solid fa-chevron-left"></i>',
      nextArrow: '<button type="button" class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40" height="40" focusable="false"><path d="m24.5 0.932 4.3 4.38-14.5 14.6 14.5 14.5-4.3 4.4-14.6-14.6-4.4-4.3 4.4-4.4 14.6-14.6z"></path></svg></button>',
    });
  });
  