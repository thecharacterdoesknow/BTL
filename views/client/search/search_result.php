<div class="container">
    <div class="container">
        <div class="breadcum">
            <ul>
                <li>
                    <a href="#">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                </li>
                <li class="active">
                    <a href="#">
                        Search
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div style="display: flex; justify-content: space-between">
        <h4 style="color: #80bb01; font-weight:bolder;">Products</h4>
        <a href="/shop?q=<?php echo $_GET["keyword"] ?>">Show all</a>
    </div>
    <div class="grid-products row grid" style="margin: 0px;">
        <?php foreach ($products as $product) { ?>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 p-0">
                <div class="card-product">
                    <div class="image">
                        <a href="/detail/<?php echo $product["id"] ?>">
                            <?php if ($product["quantity"] == 0) { ?>
                                <span class="badge">Soldout</span>
                            <?php } ?>
                            <img class="mini_img" src="<?php echo $product["thumbnails"]; ?>" alt="11. Product with video">
                        </a>
                        <!-- <div class="product-hover-icons">
                                        <a class="cart-disable cart_btn" data-tooltip="Add to cart">
                                            <span class="icon">
                                                <svg id="i-cart" xmlns="http://www.w3.org/2000/svg" viewBox="-21 -22 75 75" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                    <path d="M6 6 L30 6 27 19 9 19 M27 23 L10 23 5 2 2 2" />
                                                    <circle cx="25" cy="27" r="2" />
                                                    <circle cx="12" cy="27" r="2" />
                                                </svg>
                                            </span>
                                        </a>
                                        <a class="action-plus" data-tooltip="Quickview" data-toggle="modal" data-target="#quickViewModal" href="javascript:void(0);" onclick="quiqview('11-product-with-video')">
                                            <span class="icon" style="transform: rotateY(180deg);">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="-71 -80 290 290" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129" stroke="#fff" fill="#fff">
                                                    <g>
                                                        <path d="M51.6,96.7c11,0,21-3.9,28.8-10.5l35,35c0.8,0.8,1.8,1.2,2.9,1.2s2.1-0.4,2.9-1.2c1.6-1.6,1.6-4.2,0-5.8l-35-35   c6.5-7.8,10.5-17.9,10.5-28.8c0-24.9-20.2-45.1-45.1-45.1C26.8,6.5,6.5,26.8,6.5,51.6C6.5,76.5,26.8,96.7,51.6,96.7z M51.6,14.7   c20.4,0,36.9,16.6,36.9,36.9C88.5,72,72,88.5,51.6,88.5c-20.4,0-36.9-16.6-36.9-36.9C14.7,31.3,31.3,14.7,51.6,14.7z" />
                                                    </g>
                                                </svg>
                                            </span>
                                        </a><a class="same-action" href="/account/login" data-tooltip="Add to wishlist">
                                            <span class="icon">
                                                <svg id="i-heart" xmlns="http://www.w3.org/2000/svg" viewBox="-18 -17 65 65" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                    <path d="M4 16 C1 12 2 6 7 4 12 2 15 6 16 8 17 6 21 2 26 4 31 6 31 12 28 16 25 20 16 28 16 28 16 28 7 20 4 16 Z" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div> -->
                    </div>
                    <div class="product-content">
                        <div class="product-categories">
                            <?php echo join(", ", array_map(function ($category) {
                                return '<a href="/">' . $category["title"] . '</a>';
                            }, $product["categories"])); ?>
                        </div>
                        <h3 class="product-title"><a href="#"><?php echo $product["name"] ?></a></h3>
                        <div class="price-box">
                            <span class="price" data-currency-usd="$39.00"><?php echo $product["price"] ?>đ</span>
                            <span class="main-price" data-currency-usd="$39.00">$39.00</span>
                        </div>
                    </div>
                </div>

            </div>
        <?php } ?>
    </div>
</div>
<div class="container" style="margin-top: 40px;">
    <div style="display: flex; justify-content: space-between">
        <h4 style="color: #80bb01; font-weight:bolder;">News</h4>
        <a href="/news?q=<?php echo $_GET["keyword"] ?>">Show all</a>
    </div>
    <div class="row" style="margin: 0px;">
        <?php foreach ($list_news as $news) { ?>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 p-0">
                <div class="card">
                    <img src="<?php echo $news["thumbnails"]; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $news["title"]; ?></h4>
                        <small><b>Posted on: </b><?php echo $news["created_at"]; ?></small>
                        <hr>
                        <p class="card-text"><?php echo $news["description"]; ?></p>
                        <a href="/news/<?php echo $news["id"] ?>" class="btn">Continue</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>