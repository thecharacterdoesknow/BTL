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
                    Product Detail
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="content" style="display: flex;">
        <div class="column1">
            <div class="image-cover">
                <img id="main-image" src="<?php echo $product["thumbnails"] ?>" alt="vegetable" width="100%" height="500px">
            </div>
            <?php if (sizeof($product["images"]) != 0) { ?>
                <div class="slide-cover">
                    <div class="turn-left"><i class="fa fa-angle-left" style="display: block;width:100%; height:160px;line-height:160px"></i></div>
                    <div class="cover-image-content">
                        <div class="image-content">
                            <?php foreach ($product["images"] as $image) { ?>
                                <div class="each-image">
                                    <img class="sub-image" alt="" src="<?php echo $image["image_url"] ?>">
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="turn-right"><i class="fa fa-angle-right" style="display: block;width:100%; height:160px;line-height:160px"></i></div>


                </div>
            <?php } ?>

        </div>

        <div class="column2">
            <h1 id="product_name_detailpage"><?php echo $product["name"] ?></h1>
            <div>
                <div class="rateit" data-rateit-ispreset="true" data-rateit-readonly="true" data-rateit-resetable="false" data-rateit-value="<?php echo $product["rating"]; ?>"></div>
                <span>
                    <?php echo $product["rating"]; ?>
                </span>
                <span>
                    (<?php echo $product["num_rate"]; ?>)
                </span>
            </div>
            <p style="color:rgb(112,177,0);font-size:200%"><?php echo $product["price"] ?>VNĐ</p>
            <p><?php echo $product["description"] ?></p>

            <br>
            <div class="quantity-instock">
                <p style="font-size: 120%"><span style="font-weight: bolder">In Stock: </span><?php echo $product["quantity"] . " " . "item(s)" ?></p>
            </div>
            <!--  <div style="width:200px;display: flex; justify-content: space-around;">

                <p>Size:</p>
                <p id="m">m</p>
                <p id="l">l</p>
                <p id="xl">xl</p>
                <p id="xxl">xxl</p>

            </div>
            <script>
                document.getElementById("m").onclick = changeText;
                document.getElementById("l").onclick = cchangeText;
                document.getElementById("xl").onclick = ccchangeText;
                document.getElementById("xxl").onclick = cccchangeText;

                function changeText() {
                    document.getElementById("m").style.color = "rgb(112,177,0)";
                    document.getElementById("l").style.color = "black";
                    document.getElementById("xl").style.color = "black";
                    document.getElementById("xxl").style.color = "black";
                }

                function cchangeText() {
                    document.getElementById("l").style.color = "rgb(112,177,0)";
                    document.getElementById("m").style.color = "black";
                    document.getElementById("xl").style.color = "black";
                    document.getElementById("xxl").style.color = "black";
                }

                function ccchangeText() {
                    document.getElementById("xl").style.color = "rgb(112,177,0)";
                    document.getElementById("l").style.color = "black";
                    document.getElementById("m").style.color = "black";
                    document.getElementById("xxl").style.color = "black";
                }

                function cccchangeText() {
                    document.getElementById("xxl").style.color = "rgb(112,177,0)";
                    document.getElementById("l").style.color = "black";
                    document.getElementById("xl").style.color = "black";
                    document.getElementById("m").style.color = "black";
                }
            </script>

            <br><br>

            <div style="display: flex; width: 320px; justify-content: space-around;">
                <p>Color:</p>
                <div id="vang">
                    <p class="yellow"></p>
                </div>
                <div id="xam">
                    <p class="gray"></p>
                </div>
                <div id="xanh">
                    <p class="aqua"></p>
                </div>
                <div id="nau">
                    <p class="brown"></p>
                </div>
                <div id="tim">
                    <p class="purple"></p>
                </div>

            </div>

            <script>
                document.getElementById("vang").onclick = changColor;
                document.getElementById("xam").onclick = cchangColor;
                document.getElementById("xanh").onclick = ccchangColor;
                document.getElementById("nau").onclick = cccchangColor;
                document.getElementById("tim").onclick = ccccchangColor;

                function changColor() {
                    document.getElementById("vang").style.border = "1px solid black";
                    document.getElementById("van";

                    document.getElementById("xam").style.border = "none";
                    document.getElementById("xanh").style.border = "none";
                    document.getElementById("nau").style.border = "none";
                    document.getElementById("tim").style.border = "none";
                }

                function cchangColor() {
                    document.getElementById("xam").style.border = "1px solid black";
                    document.getElementById("xa";

                    document.getElementById("vang").style.border = "none";
                    document.getElementById("xanh").style.border = "none";
                    document.getElementById("nau").style.border = "none";
                    document.getElementById("tim").style.border = "none";
                }

                function ccchangColor() {
                    document.getElementById("xanh").style.border = "1px solid black";
                    document.getElementById("xan";

                    document.getElementById("xam").style.border = "none";
                    document.getElementById("vang").style.border = "none";
                    document.getElementById("nau").style.border = "none";
                    document.getElementById("tim").style.border = "none";
                }

                function cccchangColor() {
                    document.getElementById("nau").style.border = "1px solid black";
                    document.getElementById("na";

                    document.getElementById("xam").style.border = "none";
                    document.getElementById("xanh").style.border = "none";
                    document.getElementById("vang").style.border = "none";
                    document.getElementById("tim").style.border = "none";
                }

                function ccccchangColor() {
                    document.getElementById("tim").style.border = "1px solid black";
                    document.getElementById("ti";

                    document.getElementById("xam").style.border = "none";
                    document.getElementById("xanh").style.border = "none";
                    document.getElementById("nau").style.border = "none";
                    document.getElementById("vang").style.border = "none";
                }
            </script> -->




            <form id="qt">
                <input type="number" id="quantity" name="quantity" min="1" max="100" value="1">
                <?php if (isset($_SESSION["user_id"])) { ?>
                    <button class="addbutton" data-product-id="<?php echo $product["id"]; ?>">
                        <span><i style="color: white" class="fa fa-shopping-cart mr-10"></i></span><span style="color: white">ADD TO CART</span>

                    </button>
                <?php } else { ?>
                    <a style="text-decoration: none" href="/redirectLogin?location=/detail/<?php echo $product["id"]; ?>"> <span><i style="color: red;margin:0" class="fa fa-shopping-cart mr-10"></i></span><span style="color: red">LOGIN FIRST</span></a>
                <?php } ?>
            </form>

            <!--  <a href="" class="category">
                <i class="far fa-heart">Add to wishlist</i>
            </a> 
            <br><br> -->

            <!-- <a href="" style="text-decoration: none;">
                <p class="buy">Buy it now</p>
            </a>-->
            <hr>
            <p>CATEGORIES:
                <?php for ($cgcount = 0; $cgcount < sizeof($categories); $cgcount++) {
                    if ($cgcount == sizeof($categories) - 1) { ?>
                        <a class="category" href=""><?php echo $categories[$cgcount]["title"] ?></a>
                    <?php } else { ?>
                        <a class="category" href=""><?php echo $categories[$cgcount]["title"] ?></a>,
                <?php }
                } ?>
            </p>
            <hr>
            <p>SHARE:</p>
            <a href="https://www.facebook.com/sharer.php?u=https://greenfarm-demo.myshopify.com/products/11-product-with-video"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAbFBMVEU8Wpn///8jSpHx8/c5WJhQaaLX3OgoTZLu8PUwUpU0VJahrMiGlLp8jLU2VpceR5Da3umxutFIY567w9eQnsBacaXl6PBne6tzhbH3+PpRaqGbp8UAO4umsMvg4+yLmr1uga7M0uFedKevuNDnQpi/AAAEN0lEQVR4nO3d7XaiMBSFYcAIBpVUxa86itr7v8dp62itteZIOIST2e//ruZZgCiEEMWhF/keAHv/n7AnvwfCtJqaJICm5ctdYdpPchWFkNLJfPdTWJrC98gaTJntrXCc+R5UwyXVd2EZGvCduL0Wpsb3eBgyiythP6Rj8Fyx/BKmie/RsHTaiJ/CKvc9GJb08CKchnEevE0tL8IQP2eijzP/WdgL8zB8P2FAKD4I5Qeh/CCUH4Tyg1B+EMoPQvlBKD8IO1BR5KeKvChUoaLnLgp2WahynSUmmu/Ho6qqRqPxeLVfzqdRZkySZFmmdV7YtZ0V6sy8VpN0EN9r3VvsDrPJsFq9WomdFCqdROVhfRd3m/VSfQeFKsu+3aF+3EicUGXTGZknUPjuOzzjEycssslzPmnCZE/7dJEqVOapA1CesFCLGkBBwvz1+T1UlFAfa/nkCPN5TaAUoZrWBUoR6tvZkqEJTVobKEOoN/WBIoQOB6EQodlZENKF+cgFKEGY1PsuI0eYl05AAUJT/1QoQ+h4FAoQJvRrTjKFbudCCUK9tQDEC5Nav+sFCd130q4LtePJsPvC7OAs7Ph9i+SJ0306G5aj8Y+sN588H4dE3frtaDL9cb8wv63bd9eKFQ24SXT9h0G8Cmk/7ntT7fJPvAozymX8nnZ74syvkHIF6tXxkTqvQso3monrY59+hYSf90/OLbnzT7wK7UD3pyJ9ClVuF26cn4r0ug0J37uPzk9Fet2GBKH7qLwK+1bgOnjhInjhzn0RhI4LX4IXphDag5AzCCGkBSFnEEJIC0LOIISQFoScQQghLQg5C0Sof18I19hXaE7/WBbT9f+UrN70Br9nFa4f/PFH6773+/inhRn5su/FwoWEUQsXEq4YCxceghe+2SeiCBeW9lvEwoV7+1QU4ULC0sDChYRByxYOghdSvpjLFs6CFw4J8zJlC63T2MULl4QZU7KFlClhsoWUMYsWkmZMiRYSfjsJF84ok/hFCzfBC8eUafyihfPghaRnhSQLaROIJQtpE4glC0mnQ9HCCemZNslCwqVE4cJV8EL7nbU2hDmjkHZ/WPI9YNoAcB+fMwghpAUhZxBCSAtCziCEkBaEnEEIIS0IOYMQQloQcgYhhLQg5AxCCGlByBmEENKCkDMIIaQFIWcQQkgLQs4ghJAWhJxBCCEtCDmDEEJaEHIGIYS0IOQMQghpQcgZhBDSgpAzCCGkBSFnEEJI6yJs4I2fz9aK8PTC2k8hbZWJJmtFWCwvwtLpDeZ1akWotxfhS+u7aStCM7gI43nbu2kbwmIVfwl3ppFx02tDeNqE/4TxtuX9tAWhmcXXwrhql8gvNOf1fy4r4WwNZZ2+puIWFucteCWMF0ujVVufOJxCVWiz+nrLy/VqRovh8cHCR43WxJt0fitfbq/fYmP/T9KDUH7hC/8CYjpgljRwcJIAAAAASUVORK5CYII=" alt="facebook" width="30" height="30"></a>
            <a href="https://twitter.com/intent/tweet?text=11.%20Product%20with%20video&url=https%3A%2F%2Fgreenfarm-demo.myshopify.com%2Fproducts%2F11-product-with-video%3Bsource%3Dwebclient"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADgCAMAAADCMfHtAAAAYFBMVEUAxP////8Awv8Av/9s0//8///d9P+Q3f8Avv/l9/+c4P/u+v8qx/992P/O7/9IzP+05//C6//X8v+H2v+m4/+q5P9Yz//1/P85yv/s+f+36P/T8P+/6v9x1f9d0f+N3P+mc00XAAAFCklEQVR4nO3c6XaiQBAFYKgCVERw1wSX93/LASWJKAhUQzXOud+vGU8SuDbQO44DAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAL0iYjomF+/uHDHZPqN+sXNdHdxHs/B/CsmXtVsh2FBNRo50T9AQJ7OqfDfLiCt+4bg6VHw8WryszZdbReVyJPayAt9+0gVcX4CF8KG82JnM88/Uzo6uc9Mvc94U0HXTImJWfKv7J3pFyL5rFpFaBHTdb87rEu/bL/4/V7sLaZMd7mDwBzhoE9D1vcny8SeT3hI0nuDtHjpE0mLkbauAzzZ6j5ljcci98JB7UcCTXk1Bk5+DeqKI/CUJGChWhbT6PexVcNi/L6iLL82akB+qsu/uEcmvz1GreK4RR4ue01SZPp7iuut3KyvCvEGa1RyL1E0VCpNLx54fux2SDzUh3vCz/gZHmzj/90Chyuf4dPxzpyvVE5RguNnGxRdz0bgfnxO6yw4RORYk/KNTJ74kdGcdKn+jgKFOlfGa0HUXLQ99a/CJ7ZTqxKqE7qquX15GJhdpl7vBSGVC12/1wKn+3Xa0SrD+LGOnuRgv8oBbvWZbfbty0nQSJOtVtPrbPXpzL33t358HVw6utdH2UdaLtwWRHt+dCkvapDlZL0bsff/uVDUSWCBhQGlPVKqpabmqLUdhwkR7ELH5eZF61UPzsoS+hXHg5rM6hE5FyI9JSO/HqwvrzUvIj0nYuv0chAnzQ3vucxJ26aivt4uEp1nOjKzRZqUMuXHaoWwexMvtNhSNYNhJ6ESic5Wxk5DO/3tCh3dqCdXnRYtHo+GISwdf2gkXdK/muj5txNbKCbM6Lb7X5e1mAc2ttNvdt6MGk2NWxYnmWDrbaSf8nZJdTkKVhIoTh/eEOgX3YK8b0GxAUEQ5oEM6l+Yff6odUTZJLacxn1YmHk4S0n6Utu3/9mehv9Qr0U1oYUEip5oBrfQsVAsxtrEekb8VE4ZWVlySYLmBlHaLpqB4nVpaNEsLrYCaq71KWKvtZm/hs1bEi62AWUTZ4GdXNteus2R5U1d2V+dTNHxn2Pb2g4ZNE+bsVPeliPtB637fekBn4GfqZAwJHXIGa6Xa3+b0M74fbYZp4pytF+GVz7dtLUdvkEvVWoPtF7snN1img43t6+2RqWOwSq0NxS0k9REHHXWznS43aB9Ke7ai2oBTiLMRXKO54RYsHG1HK8h2wLRgv0H6Y6CxU/Wp+zeGGXYbyzV6M8StOI4W9w/qf2RRe/FFk94j+rYTvaCo33tRe1V3GyTeZVBBaftWR2y0Y6skHmXAHnv6xu+jGA5Fuz66GqN+BQ2xtzRtiqtvregqH9K4nOVjGsq7f4RYvgXPwrILAeF7PXKaO/DEKGr3ZpYq46wIn5iMgH9CCbJnMLK4GX1A4ov8Au36ZgYLiBdGVeEYW9sPiBOziUT5G5kUEPNlZziwr7+CtB0imjre1rzjNK5aIiuyHDmJd12mffR8Dw073LUF6TqYzXucr9DeLtLk4S1YvTh44ypAJ+/p9rlnbTfKt7EShT0NPMWjrSOIzyatl8J6ZE+YMuKj4bBMnIw53w3RQlwT+pVv0R0f4iiUtEXTRbs3Lo1CFnLSrSTj1xctjB0xnduNsPlpuOcPKr5HxM5lcgpqWzrz4BSeI/60wntCxFOKkr1XctknR4f5U4sOAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAYIT+AS4APQ+iGrZmAAAAAElFTkSuQmCC" alt="Twitter" width="30" height="30"></a>
            <a href="https://plus.google.com/up/?continue=https://plus.google.com/share?url%3Dhttps://greenfarm-demo.myshopify.com/products/11-product-with-video"><img src="data:image/jpeg;base64,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" alt="Google+" width="30" height="30"></a>
            <a href="https://www.pinterest.com/pin-builder/?url=https%3A%2F%2Fgreenfarm-demo.myshopify.com%2Fproducts%2F11-product-with-video&media=http%3A%2F%2Fcdn.shopify.com%2Fs%2Ffiles%2F1%2F0049%2F8407%2F8400%2Fproducts%2F01_1024x1024.png%3Fv%3D1543646110&description=11.%20Product%20with%20video&method=button"><img src="data:image/png;base64,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" alt="Printest" width="30" height="30"></a>

        </div>
    </div>


    <!-- san pham lien quan-->
    <div class="relative">
        <div style="background-color: #ddd;height: 40px;"></div>
        <div class="absolute">
            <p style="color:white">RELATED PRODUCT</p>
        </div>
        <br>
        <div class="box">
            <?php for ($count = 0; $count < 3 && $count < sizeof($relatedproducts); $count++) { ?>
                <div class="img">
                    <a href="/detail/<?php echo $relatedproducts[$count]["re_productId"]  ?>" style="float: left;"><img width="160px" height="160px" src="<?php echo $relatedproducts[$count]["thumbnails"] ?>" alt="product">
                    </a>
                    <div class="info">
                        <p style="text-align:center"><?php echo $relatedproducts[$count]["name"] ?></p>
                        <p style="color: rgb(112,177,0);font-size:18px"><?php echo $relatedproducts[$count]["price"] . "VNĐ/" . $relatedproducts[$count]["title"] ?></p>
                        <a href="/detail/<?php echo $relatedproducts[$count]["re_productId"]  ?>" style="text-decoration: none;">
                            <p class="re-view">View Detail</p>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <br>
        <?php if (sizeof($relatedproducts) > 3) { ?>
            <div class="box">
                <?php
                for ($count = 3; $count < sizeof($relatedproducts); $count++) { ?>
                    <div class="img">
                        <a href="/detail/<?php echo $relatedproducts[$count]["re_productId"]  ?>" style="float: left;"><img width="160px" height="160px" src="<?php echo $relatedproducts[$count]["thumbnails"] ?>" alt="product">
                        </a>
                        <div class="info">
                            <p style="text-align:center"><?php echo $relatedproducts[$count]["name"] ?></p>
                            <p style="color: rgb(112,177,0);font-size:18px"><?php echo $relatedproducts[$count]["price"] . "VNĐ/" . $relatedproducts[$count]["title"] ?></p>
                            <a href="/detail/<?php echo $relatedproducts[$count]["re_productId"]  ?>" style="text-decoration: none;">
                                <p class="re-view">View Detail</p>
                            </a>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <br>
        <?php } ?>

        <!-- san pham lien quan -->


    </div>
</div>

<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Comment</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Rating</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="comments-wrapper">
                <?php
                $comments = array_reverse($comments);
                ?>
                <?php if (sizeof($comments) >= 5) { ?>
                    <button class="load-more-btn" id="load-more-comment-btn">Load more</button>
                <?php } ?>
                <div id="comments" data-page="0" data-product-id="<?php echo $product["id"]; ?>" data-last-comment="<?php echo sizeof($comments) > 0 ? $comments[0]["id"] : -1; ?>">
                    <?php
                    foreach ($comments as $comment) {
                    ?>
                        <div class="comment">
                            <div class="avatar">
                                <img src="<?php echo $comment["avatar"]; ?>" alt="">
                            </div>
                            <div class="body-comment">
                                <h5><b><?php echo $comment["first_name"] . " " . $comment["last_name"]; ?></b></h5>
                                <small><?php echo $comment["created_at"]; ?></small>
                                <p class="content" style="padding: 0px;"><?php echo $comment["content"]; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <?php if (isset($_SESSION["user_id"])) { ?>
                    <div class="comment">
                        <div class="avatar">
                            <img src="<?php echo $user["avatar"]; ?>" alt="">
                        </div>
                        <div class="body-comment">
                            <h5><b><?php echo $user["first_name"] . " " . $user["last_name"]; ?></b></h5>
                            <form id="form-comment" class="form-comment" data-product-id="<?php echo $product["id"]; ?>">
                                <textarea name="content" id="input-comment" rows="2"></textarea>
                                <button>Submit</button>
                            </form>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="comment">
                        <a href="/redirectLogin?location=/detail/<?php echo $product["id"]; ?>">Login to comment</a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="comments-wrapper">
                <?php
                $rates = array_reverse($rates);
                ?>
                <?php if (sizeof($rates) >= 5) { ?>
                    <button class="load-more-btn" id="load-more-rate-btn">Load more</button>
                <?php } ?>
                <div id="rates" data-page="0" data-product-id="<?php echo $product["id"]; ?>" data-last-rate="<?php echo sizeof($rates) > 0 ? $rates[0]["id"] : -1; ?>">
                    <?php
                    foreach ($rates as $rate) {
                    ?>
                        <div class="comment">
                            <div class="avatar">
                                <img src="<?php echo $rate["avatar"]; ?>" alt="">
                            </div>
                            <div class="body-comment">
                                <h5><b><?php echo $rate["first_name"] . " " . $rate["last_name"]; ?></b></h5>
                                <div class="rateit" data-rateit-ispreset="true" data-rateit-resetable="false" data-rateit-readonly="true" data-rateit-value="<?php echo $rate["rate"]; ?>"></div>
                                <small><?php echo $rate["created_at"]; ?></small>
                                <p class="content" style="padding: 0px;"><?php echo $rate["content"]; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <?php if (isset($_SESSION["user_id"])) { ?>
                    <div class="comment">
                        <div class="avatar">
                            <img src="<?php echo $user["avatar"]; ?>" alt="">
                        </div>
                        <div class="body-comment">
                            <h5><b><?php echo $user["first_name"] . " " . $user["last_name"]; ?></b></h5>
                            <form id="form-rate" class="form-comment" data-product-id="<?php echo $product["id"]; ?>">
                                <div style="width:100%">
                                    <div class="rateit" id="rate-input" data-rateit-ispreset="false" data-rateit-resetable="false" data-rateit-value="5"></div>
                                </div>
                                <textarea name="content" id="input-rate" rows="2"></textarea>
                                <button>Submit</button>
                            </form>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="comment">
                        <a href="/redirectLogin?location=/detail/<?php echo $product["id"]; ?>">Login to rate</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<template id="template-comment">
    <div class="comment">
        <div class="avatar">
            <img src="/upload/images/shin.jpg" alt="">
        </div>
        <div class="body-comment">
            <h5><b>Username</b></h5>
            <small>20:38 20/10/2021</small>
            <p class="content">Nội dung comment</p>
        </div>
    </div>
</template>

<template id="template-rate">
    <div class="comment">
        <div class="avatar">
            <img src="/upload/images/shin.jpg" alt="">
        </div>
        <div class="body-comment">
            <h5><b>Username</b></h5>
            <div class="rateit" data-rateit-ispreset="false" data-rateit-readonly="true"></div>
            <small>20:38 20/10/2021</small>
            <p class="content">Nội dung comment</p>
        </div>
    </div>
</template>
<div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="color: white; background-color: red;">
            <strong class="me-auto" style="color: white;">Error</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Hello, world! This is a toast message.
        </div>
    </div>
</div>