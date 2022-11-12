$(document).ready(function () {
  $(".slider").slick({
    infinite: true,
    slidesToShow: 6,
    slidesToScroll: 2,
    prevArrow:
      "<button type='button' class='slick-prev slick-arrow'><i class='fa-solid fa-circle-left ' aria-hidden='true'></i></i></button>",
    nextArrow:
      "<button type='button' class='slick-next slick-arrow'><i class='fa-solid fa-circle-right ' aria-hidden='true'></i></button>",
    dots: true,
    responsive: [
      {
        breakpoint: 900,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
        },
      },
    ],
  });
});
