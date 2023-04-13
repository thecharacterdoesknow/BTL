<div id="header">
    <div id="header-top">
        <div class="container">
            <div id="header-row">
                <div id="currency">
                    <?php if (isset($_SESSION["user_id"])) { ?>
                        Welcome!
                    <?php } else { ?>
                        Please sign in!
                    <?php } ?>
                </div>


                <div id="header-top-menu">
                    <ul class="user-menu">
                        <?php if (isset($_SESSION["user_id"])) { ?>
                            <li id="noti-item" data-user-id="<?php echo $_SESSION["user_id"]; ?>" class="position-relative">
                                <span id="badge-unread" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px;padding: 2px; border-radius: 20px; width: 14px"></span>
                                <a class="top_menu">Notification</a>
                                <ul class="notices" id="notifications">
                                    <li class="allread" id="title-notification">
                                        <p style="color: white; font-weight: bolder">Mark all as read</p>
                                        <span class="material-icons-outlined mark-view-all-btn">done</span>
                                    </li>
                                    <?php foreach ($notifications as $notification) { ?>
                                        <li class="link-notice <?php echo $notification["is_read"] ? "" : "unread"; ?>">
                                            <a style="height: 80px" href="/viewNoti/<?php echo $notification["id"]; ?>">
                                                <p><span style="font-weight: bolder">Note: </span><?php echo $notification["content"] ?></p>
                                                <p><span style="font-weight: bolder">Date: </span><?php echo substr($notification["created_at"], 0, 11); ?></p>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <li class="view-all" id="title-notification">
                                        <a style="text-decoration: none;" href="/notification/viewAll">
                                            <p>View all</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="position-relative"><a class="top_menu" href="/account">My Account</a></li>
                            <li class="position-relative"><a class="top_menu" href="/logout">Logout</a></li>
                        <?php } else { ?>
                            <li class="position-relative"><a class="top_menu" href="/login">Sign in</a></li>
                            <li class="position-relative"><a class="top_menu" href="/register">Register</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--header-bottom-->
    <div id="header-bottom">
        <div class="container">
            <div class="header-bottom-content">
                <!--logo-->
                <div id="cover-logo">
                    <div id="logo">
                        <a href="/"><img alt="logo" src="/public/images/goodfdlogo.png" /></a>
                    </div>
                </div>
                <!--right bar-->
                <div id="cover-right">
                    <div id="cover-right-top">
                        <!--phone-->
                        <div id="phone">
                            <img style="width: 40px; height: 35px; margin:auto 0px" src="https://cdn.shopify.com/s/files/1/0049/8407/8400/files/icon-phone_small.png?v=1543293717">
                            <p style="margin-left: 5px">Phone:<br />+84 282 828 289</p>
                        </div>
                        <!--search-->
                        <div id="search">
                            <form action="/search" method="GET">
                                <input id="input" name="keyword" type="text" placeholder="Search..." value="<?php echo isset($_GET["keyword"]) ? $_GET["keyword"] : ""; ?>">
                                <button type="submit">
                                    <span style="transform: rotate(90deg); color: white; font-size: 25px" class="material-icons-outlined">
                                        search
                                    </span>
                                </button>
                            </form>
                        </div>
                        <!--cart-->
                        <div id="cart">
                            <div id="hover-objects">
                                <a href="/cart" id="icon"><span>Shopping Cart</span><span class="material-icons-outlined" style="padding: 0 10px; width: 60px; height: 60px; font-size: 50px; margin: auto">
                                        shopping_bag</span></a>
                                <ul id="cart-items">
                                    <?php if (!isset($cartproducts) || count($cartproducts) == 0 || !isset($_SESSION["user_id"])) { ?>
                                        <p id="empty" style="font-size:20px;text-align: center; margin-top: 20px">Your cart is empty</p>
                                    <?php } ?>
                                    <?php
                                    $total = 0;
                                    if (isset($cartproducts) && isset($_SESSION["user_id"])) {
                                        foreach ($cartproducts as $cartproduct) {
                                            $total += $cartproduct["price"] * $cartproduct["quantity"];
                                    ?>
                                            <li class="product-detail">
                                                <div style="height: 70px; width: 70px" class="pro-image">
                                                    <a href="/detail/<?php echo $cartproduct["id"] ?>"><img src="<?php echo $cartproduct["thumbnails"] ?>" width="70px" height="70px" style="border: 0.1pt solid #dddddd" /> </a>
                                                </div>
                                                <div style="height: 70px; width: 80%" class="title-price">
                                                    <p class="pro title"><?php echo $cartproduct["name"] ?></p>
                                                    <div style="display: flex;  justify-content: space-between; height: 35px">
                                                        <p class="pro price"><span class="count"><?php echo $cartproduct["quantity"] ?></span>
                                                            <span class="xsign">x </span><span class="eachprice"><?php echo $cartproduct["price"] ?></span><span class="currency-unit">-VNĐ</span>
                                                        </p>
                                                        <p class="remove">
                                                            <a href="/cart/productDeleted/<?php echo $cartproduct["id"]; ?>"><span class="material-icons-outlined">
                                                                    clear
                                                                </span></a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                    <?php }
                                    } ?>
                                    <br>
                                    <div class="total" style="font-size: 20px">
                                        <p>Total: </p>
                                        <p><span id="price-total"><?php echo $total; ?></span><span style="font-size: 16px" class="currency-unit">-VNĐ</span></p>
                                    </div>
                                    <hr style="width: 100%; height:0.5px; margin:0">
                                    <div id="cart-button">
                                        <p><a href="/order"><span>View orders</span></a></p>
                                        <p><a href="/cart"><span>View cart</span></a></p>
                                    </div>
                                </ul>
                                <br>
                            </div>
                        </div>


                    </div>

                    <div id="cover-right-bottom">
                        <ul>
                            <li><a href="/">HOME
                                </a>
                                <!--<ul class="direction">
                                    <li><a href="#">Home 1</a></li>
                                    <li><a href="#">Home 2</a></li>
                                </ul>-->
                            </li>
                            <li><a href="/shop">SHOP
                                </a>
                                <!--<ul class="direction">
                                    <li><a href="/shop">Shop 1</a></li>
                                    <li><a href="/shop">Shop 2</a></li>
                                </ul>-->
                            </li>
                            <!--<li><a href="#">PAGES
                                    <i class="fa fa-chevron-down"></i>
                                </a>
                                <ul class="direction">
                                    <li><a href="#">Col 1</a></li>
                                    <li><a href="#">Account</a></li>
                                </ul>-->
                            </li>
                            <li><a href="/news">BLOG</a></li>
                            <li><a href="/contact">CONTACT</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<template id="cart-item-template">
    <li class="product-detail">
        <div style="height: 70px; width: 70px">
            <a href="" width="70px" height="70px" style="border: 0.1pt solid #dddddd"><img class="pro-image" alt=""></a>
        </div>
        <div style="height: 70px; width: 80%" class="title-price">
            <p class="pro title">Title</p>
            <div style="display: flex;  justify-content: space-between; height: 35px">
                <p class="pro price"><span class="count"></span>
                    <span class="xsign">x </span><span class="eachprice"></span><span class="currency-unit">-VNĐ</span>
                </p>
                <p class="remove">
                    <a><span class="material-icons-outlined">
                            clear
                        </span></a>
                </p>
            </div>
        </div>
    </li>
</template>