<?php

// Fetch latest 6 products
$query = "SELECT id, name, new_price, old_price, image_front FROM items ORDER BY id DESC LIMIT 6";
$result = mysqli_query($conn, $query);


include_once('includes/header.php'); ?>

<main>
    <!-- Banner area start here -->
    <section class="banner-area pb-130">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="banner__item">
                        <div class="image">
                            <img src="assets/images/banner/banner-image1.png" alt="image">
                        </div>
                        <div class="banner__content">
                            <h5 class="wow fadeInUp" data-wow-delay=".1s"><img src="assets/images/icon/fire.svg"
                                    alt="icon"> GET <span class="primary-color">25% OFF</span> NOW
                            </h5>
                            <h1 class="wow fadeInUp" data-wow-delay=".2s">Find everything <br>
                                for <span class="primary-color">vaping</span></h1>
                            <a class="btn-one wow fadeInUp mt-65" data-wow-delay=".3s" href="?page=shop"><span>Shop
                                    Now</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="swiper product__slider">
                        <div class="swiper-wrapper">

                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <div class="swiper-slide">
                                    <div class="product__slider-item bor">
                                        <a href="#" class="wishlist"><i class="fa-regular fa-heart"></i></a>

                                        <a href="?page=shop-single&id=<?php echo $row['id']; ?>" class="product__image pt-20 d-block">
                                            <img src="assets/images/product/<?php echo htmlspecialchars($row['image_front']); ?>"
                                                alt="<?php echo htmlspecialchars($row['name']); ?>">
                                        </a>

                                        <div class="product__content">
                                            <h4 class="mb-15">
                                                <a class="primary-hover" href="shop-single.php?id=<?php echo $row['id']; ?>">
                                                    <?php echo htmlspecialchars($row['name']); ?>
                                                </a>
                                            </h4>

                                            <?php if (!empty($row['old_price'])): ?>
                                                <del>$<?php echo number_format($row['old_price'], 2); ?></del>
                                            <?php endif; ?>

                                            <span class="primary-color ml-10">$<?php echo number_format($row['new_price'], 2); ?></span>

                                            <div class="star mt-20">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>

                        </div>
                        <div class="dot product__dot mt-40"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner area end here -->

    <!-- Category area start here -->
    <section class="category-area pb-130">
        <div class="container">
            <div class="sub-title wow fadeInUp text-center mb-65" data-wow-delay=".1s">
                <h3><span class="title-icon"></span> our top categories <span class="title-icon"></span>
                </h3>
            </div>
            <div class="swiper category__slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="category__item text-center">
                            <a href="shop.php" class="category__image d-block">
                                <img src="assets/images/category/category-image1.png" alt="image">
                                <div class="category-icon">
                                    <img src="assets/images/category/category-icon1.png" alt="icon">
                                </div>
                            </a>
                            <h4 class="mt-30"><a href="shop.php">best e- juice</a></h4>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category__item text-center">
                            <a href="shop.php" class="category__image d-block">
                                <img src="assets/images/category/category-image2.png" alt="image">
                                <div class="category-icon">
                                    <img src="assets/images/category/category-icon2.png" alt="icon">
                                </div>
                            </a>
                            <h4 class="mt-30"><a href="shop.php">best mod</a></h4>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category__item text-center">
                            <a href="shop.php" class="category__image d-block">
                                <img src="assets/images/category/category-image3.png" alt="image">
                                <div class="category-icon">
                                    <img src="assets/images/category/category-icon3.png" alt="icon">
                                </div>
                            </a>
                            <h4 class="mt-30"><a href="shop.php">best pan</a></h4>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category__item text-center">
                            <a href="shop.php" class="category__image d-block">
                                <img src="assets/images/category/category-image4.png" alt="image">
                                <div class="category-icon">
                                    <img src="assets/images/category/category-icon4.png" alt="icon">
                                </div>
                            </a>
                            <h4 class="mt-30"><a href="shop.php">best pod</a></h4>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category__item text-center">
                            <a href="shop.php" class="category__image d-block">
                                <img src="assets/images/category/category-image5.png" alt="image">
                                <div class="category-icon">
                                    <img src="assets/images/category/category-icon5.png" alt="icon">
                                </div>
                            </a>
                            <h4 class="mt-30"><a href="shop.php">best tank</a></h4>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="category__item text-center">
                            <a href="shop.php" class="category__image d-block">
                                <img src="assets/images/category/category-image6.png" alt="image">
                                <div class="category-icon">
                                    <img src="assets/images/category/category-icon6.png" alt="icon">
                                </div>
                            </a>
                            <h4 class="mt-30"><a href="shop.php">Best vaps</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category area end here -->

    <!-- Ad banner area start here -->
    <section class="ad-banner-area">
        <div class="container-fluid p-0">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="ad-banner__item">
                        <div class="bg-image" data-background="assets/images/banner/ad-banner1.jpg"></div>
                        <div class="ad-banner__content left pt-130 pb-130">
                            <h2 class="mb-20 wow fadeInUp" data-wow-delay=".1s">E-Liquids</h2>
                            <p class="wow fadeInUp" data-wow-delay=".2s">Over 500+ flavour in our store</p>
                            <a data-wow-delay=".3s" class="btn-one wow fadeInUp mt-50" href="shop.php"><span>Shop
                                    Now</span></a>
                            <a data-wow-delay=".4s" class="btn-one-light wow fadeInUp ml-10 mt-50"
                                href="shop.php"><span>View
                                    Store</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ad-banner__item">
                        <div class="bg-image" data-background="assets/images/banner/ad-banner2.jpg"></div>
                        <div class="ad-banner__content pt-130 pb-130 pl-65">
                            <h2 class="mb-20 wow fadeInDown" data-wow-delay=".1s">E-Liquids</h2>
                            <p class="wow fadeInDown" data-wow-delay=".2s">Over 500+ flavour in our store</p>
                            <a class="btn-one mt-50 wow fadeInDown" data-wow-delay=".3s" href="shop.php"><span>Shop
                                    Now</span></a>
                            <a class="btn-one-light wow fadeInDown ml-10 mt-50" data-wow-delay=".4s"
                                href="shop.php"><span>View
                                    Store</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Ad banner area end here -->

    <!-- Product area start here -->
    <section class="product-area pt-130 pb-130">
  <div class="container">
    <div class="product__wrp pb-30 mb-65 bor-bottom d-flex flex-wrap align-items-center justify-content-xl-between justify-content-center">
      <div class="section-header wow fadeInUp d-flex align-items-center" data-wow-delay=".1s">
        <span class="title-icon mr-10"></span>
        <h2>latest arrival products</h2>
      </div>
      <ul class="nav nav-pills mt-4 mt-xl-0">
        <li class="nav-item">
          <a href="#latest-item" data-bs-toggle="tab" class="nav-link wow fadeInUp px-4 active" data-wow-delay=".1s">
            latest item
          </a>
        </li>
        <li class="nav-item">
          <a href="#top-ratting" data-bs-toggle="tab" class="nav-link wow fadeInUp px-4 bor-left bor-right" data-wow-delay=".2s">
            top ratting
          </a>
        </li>
        <li class="nav-item">
          <a href="#featured-products" data-bs-toggle="tab" class="nav-link wow fadeInUp ps-4" data-wow-delay=".3s">
            featured products
          </a>
        </li>
      </ul>
    </div>

    <div class="row g-4">
      <!-- Sidebar -->
      <div class="col-xl-3 col-lg-4">
        <div class="product__left-item sub-bg">
          <h4 class="mb-30 left-title">Special Offer</h4>
          <div class="image mb-30">
            <img src="assets/images/coundown/coundown-image1.png" alt="image">
          </div>
          <div class="product__content p-0">
            <h4 class="mb-15"><a class="primary-hover" href="#">Mango Nic Salt E-Liquid</a></h4>
            <del>$74.50</del><span class="primary-color ml-10">$49.50</span>
            <div class="star mt-15">
              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
          </div>
          <div class="image pt-40 mb-30 bor-top mt-40">
            <img src="assets/images/coundown/coundown-image2.png" alt="image">
          </div>
          <div class="product__content p-0">
            <h4 class="mb-15"><a class="primary-hover" href="#">Watermelon Nic Salt</a></h4>
            <del>$74.50</del><span class="primary-color ml-10">$49.50</span>
            <div class="star mt-15">
              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
          </div>
        </div>
      </div>

      <!-- Product Tabs -->
      <div class="col-xl-9 col-lg-8">
        <div class="tab-content">

          <!-- 🆕 Latest Items -->
          <div id="latest-item" class="tab-pane fade show active">
            <div class="row g-4">
              <?php
              include('./dbcon.php');
              $latest = mysqli_query($conn, "SELECT * FROM items ORDER BY id DESC LIMIT 6");
              if (mysqli_num_rows($latest) > 0):
                while ($row = mysqli_fetch_assoc($latest)): ?>
                  <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="product__item bor">
                      <a href="#" class="wishlist"><i class="fa-regular fa-heart"></i></a>
                      <a href="shop-single.php?id=<?php echo $row['id']; ?>" class="product__image pt-20 d-block">
                        <img class="font-image" src="assets/images/product/<?php echo htmlspecialchars($row['image_front']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
                        <img class="back-image" src="assets/images/product/<?php echo htmlspecialchars($row['image_back']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
                      </a>
                      <div class="product__content">
                        <h4 class="mb-15">
                          <a class="primary-hover" href="shop-single.php?id=<?php echo $row['id']; ?>">
                            <?php echo htmlspecialchars($row['name']); ?>
                          </a>
                        </h4>
                        <?php if (!empty($row['old_price'])): ?>
                          <del>$<?php echo number_format($row['old_price'], 2); ?></del>
                        <?php endif; ?>
                        <span class="primary-color ml-10">$<?php echo number_format($row['new_price'], 2); ?></span>
                        <div class="star mt-20">
                          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </div>
                      </div>
                      <a href="javascript:void(0)" onclick="addToCart(<?php echo $row['id']; ?>)" 
   class="product__cart d-block bor-top">
  <i class="fa-regular fa-cart-shopping primary-color me-1"></i>
  <span>Add to cart</span>
</a>
                    </div>
                  </div>
              <?php endwhile; else: ?>
                <p class="text-center text-white py-5">No products found.</p>
              <?php endif; ?>
            </div>
          </div>

          <!-- ⭐ Top Rated -->
          <div id="top-ratting" class="tab-pane fade">
            <div class="row g-4">
              <?php
              $topRated = mysqli_query($conn, "SELECT * FROM items WHERE tags LIKE '%Top Rated%' OR tags LIKE '%Best%' LIMIT 6");
              if (mysqli_num_rows($topRated) > 0):
                while ($row = mysqli_fetch_assoc($topRated)): ?>
                  <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="product__item bor">
                      <a href="#" class="wishlist"><i class="fa-regular fa-heart"></i></a>
                      <a href="shop-single.php?id=<?php echo $row['id']; ?>" class="product__image pt-20 d-block">
                        <img class="font-image" src="assets/images/product/<?php echo htmlspecialchars($row['image_front']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
                        <img class="back-image" src="assets/images/product/<?php echo htmlspecialchars($row['image_back']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
                      </a>
                      <div class="product__content">
                        <h4 class="mb-15"><a class="primary-hover" href="shop-single.php?id=<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['name']); ?></a></h4>
                        <?php if (!empty($row['old_price'])): ?>
                          <del>$<?php echo number_format($row['old_price'], 2); ?></del>
                        <?php endif; ?>
                        <span class="primary-color ml-10">$<?php echo number_format($row['new_price'], 2); ?></span>
                        <div class="star mt-20">
                          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </div>
                      </div>
                      <a href="javascript:void(0)" onclick="addToCart(<?php echo $row['id']; ?>)" 
   class="product__cart d-block bor-top">
  <i class="fa-regular fa-cart-shopping primary-color me-1"></i>
  <span>Add to cart</span>
</a>
                    </div>
                  </div>
              <?php endwhile; else: ?>
                <p class="text-center text-white py-5">No top rated products.</p>
              <?php endif; ?>
            </div>
          </div>

          <!-- 💎 Featured -->
          <div id="featured-products" class="tab-pane fade">
            <div class="row g-4">
              <?php
              $featured = mysqli_query($conn, "SELECT * FROM items WHERE tags LIKE '%Featured%' OR category LIKE '%Special%' LIMIT 6");
              if (mysqli_num_rows($featured) > 0):
                while ($row = mysqli_fetch_assoc($featured)): ?>
                  <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="product__item bor">
                      <a href="#" class="wishlist"><i class="fa-regular fa-heart"></i></a>
                      <a href="shop-single.php?id=<?php echo $row['id']; ?>" class="product__image pt-20 d-block">
                        <img class="font-image" src="assets/images/product/<?php echo htmlspecialchars($row['image_front']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
                        <img class="back-image" src="assets/images/product/<?php echo htmlspecialchars($row['image_back']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
                      </a>
                      <div class="product__content">
                        <h4 class="mb-15"><a class="primary-hover" href="shop-single.php?id=<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['name']); ?></a></h4>
                        <?php if (!empty($row['old_price'])): ?>
                          <del>$<?php echo number_format($row['old_price'], 2); ?></del>
                        <?php endif; ?>
                        <span class="primary-color ml-10">$<?php echo number_format($row['new_price'], 2); ?></span>
                        <div class="star mt-20">
                          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </div>
                      </div>
                      <a href="javascript:void(0)" onclick="addToCart(<?php echo $row['id']; ?>)" 
   class="product__cart d-block bor-top">
  <i class="fa-regular fa-cart-shopping primary-color me-1"></i>
  <span>Add to cart</span>
</a>
                    </div>
                  </div>
              <?php endwhile; else: ?>
                <p class="text-center text-white py-5">No featured products.</p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    <!-- Product area end here -->

    <!-- Discount area start here -->
    <section class="discount-area bg-image pt-130" data-background="assets/images/bg/discount-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image mb-5 mb-lg-0"><img src="assets/images/discount/01.png" alt="image"></div>
                </div>
                <div class="col-lg-6">
                    <div class="discount__item">
                        <div class="section-header">
                            <div class="section-title-icon wow fadeInUp" data-wow-delay=".1s">
                                <span class="title-icon mr-10"></span>
                                <h2>find your best favourite <br>
                                    flavour vapes</h2>
                            </div>
                            <p class="mt-30 wow fadeInUp mb-55" data-wow-delay=".2s">Sell globally in minutes with
                                localized currencies languages, and
                                <br>
                                experie in every
                                market. only a variety of vaping
                                products
                            </p>
                            <a class="btn-one wow fadeInUp me-0 me-sm-4" data-wow-delay=".3s"
                                href="shop.php"><span>Shop Now</span></a>
                            <a class="off-btn wow fadeInUp" data-wow-delay=".4s" href="#0"><img class="mr-10"
                                    src="assets/images/icon/fire.svg" alt="icon"> GET <span
                                    class="primary-color">25%
                                    OFF</span> NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Discount area end here -->

    <!-- Testimonial area start here -->
        <section class="testimonial pt-130 pb-130">
            <div class="container">
                <div class="testimonial__wrp bor radius-10">
                    <div class="testimonial__head-wrp bor-bottom pb-65 pt-65 pl-65 pr-65">
                        <div class="section-header d-flex align-items-center wow fadeInUp" data-wow-delay=".1s">
                            <span class="title-icon mr-10"></span>
                            <h2>customers speak for us</h2>
                        </div>
                        <div class="arry-btn my-4 my-lg-0">
                            <button class="arry-prev testimonial__arry-prev wow fadeInUp" data-wow-delay=".2s"><i
                                    class="fa-light fa-chevron-left"></i></button>
                            <button class="ms-3 active arry-next testimonial__arry-next wow fadeInUp"
                                data-wow-delay=".3s"><i class="fa-light fa-chevron-right"></i></button>
                        </div>
                    </div>
                    <div class="pt-45 pb-45 pr-55">
                        <div class="row g-4 align-items-center justify-content-between">
                            <div class="col-lg-7">
                                <div class="swiper testimonial__slider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="testimonial__item pl-65">
                                                <div class="testi-header mb-30">
                                                    <div class="testi-content">
                                                        <h3>Kenneth S. Fisher</h3>
                                                        <span>marketing manager</span>
                                                    </div>
                                                    <i class="fa-solid fa-quote-right"></i>
                                                </div>
                                                <p>posuere luctus orci. Donec vitae mattis quam, vitae tempor arcu.
                                                    Aenean non odio porttitor, convallis erat sit amet, facilisis velit.
                                                    Nulla ornare convallis malesuada. Phasellus molestie, ipsum ac
                                                    fringilla.</p>
                                                <div class="star mt-30">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="testimonial__item pl-65">
                                                <div class="testi-header mb-30">
                                                    <div class="testi-content">
                                                        <h3>Francis A. Cote</h3>
                                                        <span>Garden Maker</span>
                                                    </div>
                                                    <i class="fa-solid fa-quote-right"></i>
                                                </div>
                                                <p>posuere luctus orci. Donec vitae mattis quam, vitae tempor arcu.
                                                    Aenean non odio porttitor, convallis erat sit amet, facilisis velit.
                                                    Nulla ornare convallis malesuada. Phasellus molestie, ipsum ac
                                                    fringilla.</p>
                                                <div class="star mt-30">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="testimonial__image">
                                    <div class="swiper testimonial__slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img src="assets/images/testimonial/testimonial1.png" alt="image">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="assets/images/testimonial/testimonial2.png" alt="image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!-- Testimonial area end here -->

    <!-- Gallery area start here -->
    <section class="gallery-area">
        <div class="swiper gallery__slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="gallery__item">
                        <div class="off-tag">50% <br>
                            off</div>
                        <div class="gallery__image image">
                            <img src="assets/images/gallery/gallery-image1.jpg" alt="image">
                        </div>
                        <div class="gallery__content">
                            <h3 class="mb-10"><a href="shop.php">best e-lequid</a></h3>
                            <p>Best E liquids from our huge collection</p>
                            <a href="shop.php" class="btn-two mt-25"><span>Shop Now</span></a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="gallery__item">
                        <div class="off-tag">50% <br>
                            off</div>
                        <div class="gallery__image image">
                            <img src="assets/images/gallery/gallery-image2.jpg" alt="image">
                        </div>
                        <div class="gallery__content">
                            <h3 class="mb-10"><a href="shop.php">best vape flavours</a></h3>
                            <p>Best E liquids from our huge collection</p>
                            <a href="shop.php" class="btn-two mt-25"><span>Shop Now</span></a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="gallery__item">
                        <div class="off-tag">50% <br>
                            off</div>
                        <div class="gallery__image image">
                            <img src="assets/images/gallery/gallery-image3.jpg" alt="image">
                        </div>
                        <div class="gallery__content">
                            <h3 class="mb-10"><a href="shop.php">Battery And Charger Kit</a></h3>
                            <p>Best E liquids from our huge collection</p>
                            <a href="shop.php" class="btn-two mt-25"><span>Shop Now</span></a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="gallery__item">
                        <div class="off-tag">50% <br>
                            off</div>
                        <div class="gallery__image image">
                            <img src="assets/images/gallery/gallery-image4.jpg" alt="image">
                        </div>
                        <div class="gallery__content">
                            <h3 class="mb-10"><a href="shop.php">best vape tanks</a></h3>
                            <p>Best E liquids from our huge collection</p>
                            <a href="shop.php" class="btn-two mt-25"><span>Shop Now</span></a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="gallery__item">
                        <div class="off-tag">50% <br>
                            off</div>
                        <div class="gallery__image image">
                            <img src="assets/images/gallery/gallery-image5.jpg" alt="image">
                        </div>
                        <div class="gallery__content">
                            <h3 class="mb-10"><a href="shop.php">POP Extra Strawberry</a></h3>
                            <p>Best E liquids from our huge collection</p>
                            <a href="shop.php" class="btn-two mt-25"><span>Shop Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery area end here -->



    <!-- Brand area start here -->

        <section class="brand-area pt-130 pb-130">
            <div class="container">
                <div class="sub-title text-center mb-65">
                    <h3><span class="title-icon"></span> our top brands <span class="title-icon"></span>
                    </h3>
                </div>
                <div class="swiper brand__slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="brand__item bor radius-10 text-center p-4">
                                <img src="assets/images/brand/brand1.png" alt="icon">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand__item bor radius-10 text-center p-4">
                                <img src="assets/images/brand/brand2.png" alt="icon">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand__item bor radius-10 text-center p-4">
                                <img src="assets/images/brand/brand3.png" alt="icon">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand__item bor radius-10 text-center p-4">
                                <img src="assets/images/brand/brand4.png" alt="icon">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand__item bor radius-10 text-center p-4">
                                <img src="assets/images/brand/brand5.png" alt="icon">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand__item bor radius-10 text-center p-4">
                                <img src="assets/images/brand/brand6.png" alt="icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!-- Brand area end here -->
</main>


<!-- Back to top area start here -->
<div class="scroll-up">
    <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<!-- Back to top area end here -->

<!-- AJAX -->
<script>
    function addToCart(itemId) {
        const button = event.currentTarget;
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Adding...';

        fetch('routes/add-to-cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `item_id=${itemId}&quantity=1`
            })
            .then(res => res.json())
            .then(data => {
                button.innerHTML = originalText;

                if (data.status === 'success') {
                    showToast('✅ ' + data.message, 'success');
                    refreshCartTotal(); // 🔥 updates the cart total in header live
                } else if (data.status === 'error' && data.message.includes('log in')) {
                    showToast('⚠️ Please log in first!', 'warning');
                    setTimeout(() => window.location.href = 'login.php', 1500);
                } else {
                    showToast('❌ ' + data.message, 'danger');
                }
            })
            .catch(() => {
                button.innerHTML = originalText;
                showToast('⚠️ Something went wrong. Try again.', 'danger');
            });
    }




    // ✅ Toast Notification System
    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.textContent = message;
        toast.className = `toast-message bg-${type}`;
        document.body.appendChild(toast);

        setTimeout(() => toast.remove(), 2500);
    }


    // ✅ Prevent duplicate <style> injection
    if (!document.getElementById('toast-style')) {
        const style = document.createElement('style');
        style.id = 'toast-style';
        style.textContent = `
.toast-message {
  position: fixed;
  top: 20px;
  right: 20px;
  color: #fff;
  padding: 12px 20px;
  border-radius: 6px;
  font-weight: 500;
  z-index: 9999;
  box-shadow: 0 0 10px rgba(0,0,0,0.3);
  animation: fadeInOut 2.5s ease;
}
.bg-success { background: #28a745; }
.bg-danger { background: #dc3545; }
.bg-warning { background: #ffc107; color: #111; }
@keyframes fadeInOut {
  0% { opacity: 0; transform: translateY(-10px); }
  10% { opacity: 1; transform: translateY(0); }
  90% { opacity: 1; }
  100% { opacity: 0; transform: translateY(-10px); }
}`;
        document.head.appendChild(style);
    }
</script>


<!-- Jquery 3. 7. 1 Min Js -->
<script src="assets/js/jquery-3.7.1.min.js"></script>
<!-- Bootstrap min Js -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Swiper bundle min Js -->
<script src="assets/js/swiper-bundle.min.js"></script>
<!-- Counterup min Js -->
<script src="assets/js/jquery.counterup.min.js"></script>
<!-- Wow min Js -->
<script src="assets/js/wow.min.js"></script>
<!-- Magnific popup min Js -->
<script src="assets/js/magnific-popup.min.js"></script>
<!-- Nice select min Js -->
<script src="assets/js/nice-select.min.js"></script>
<!-- Pace min Js -->
<script src="assets/js/pace.min.js"></script>
<!-- Isotope pkgd min Js -->
<script src="assets/js/isotope.pkgd.min.js"></script>
<!-- Waypoints Js -->
<script src="assets/js/jquery.waypoints.js"></script>
<!-- Script Js -->
<script src="assets/js/script.js"></script>
</body>


<!-- ./index-2.html -19:00 GMT -->

</html>