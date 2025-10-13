document.addEventListener("DOMContentLoaded", function () {
  // Count slides to decide features
  var slidesCount = document.querySelectorAll("#productGallery .swiper-slide").length;

  // Thumbs only if there are multiple images
  var thumbSwiper = null;
  if (slidesCount > 1 && document.querySelector("#productThumbs")) {
    thumbSwiper = new Swiper("#productThumbs", {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
    });
  }

  // Main gallery
  var mainSwiper = new Swiper("#productGallery", {
    spaceBetween: 10,
    // You can turn loop on iff you want it when multiple slides exist
    loop: slidesCount > 1,
    navigation: slidesCount > 1 ? {
      nextEl: "#productGallery .shop-single-next",
      prevEl: "#productGallery .shop-single-prev",
    } : {}, // no nav when single slide
    thumbs: thumbSwiper ? { swiper: thumbSwiper } : undefined,
  });
});

