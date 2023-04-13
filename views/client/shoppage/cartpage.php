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
                    Your Shopping Cart
                </a>
            </li>
        </ul>
    </div>
</div>


<!--cart-->
<div class="container">
    <div id="cart-section">
        <form>
            <div id="cart-table">
                <table id="table">
                    <thead>
                        <tr>
                            <th class="pro-image">Image</th>
                            <th class="pro-title">Product</th>
                            <th class="pro-price">Price</th>
                            <th class="pro-quantity">Quantity</th>
                            <th class="pro-total">Total</th>
                            <th class="pro-remove">Remove</th>
                        </tr>
                    </thead>

                    <?php
                    $total = 0;
                    foreach ($cartproducts as $cartproduct) {
                        $total += $cartproduct["price"] * $cartproduct["quantity"];
                    ?>
                        <tbody>
                            <tr>
                                <td class="pro-image"><a href="/detail/<?php echo $cartproduct["id"] ?>"><img src="<?php echo $cartproduct["thumbnails"] ?>" /></a></td>
                                <td class="pro-title"><a href="/detail/<?php echo $cartproduct["id"] ?>"><?php echo $cartproduct["name"] ?></a></td>
                                <td class="pro-price"><span class="price"><?php echo $cartproduct["price"] ?></span></td>
                                <td class="pro-quantity">
                                    <div class="product-quantity">
                                        <input type="text" value="<?php echo $cartproduct["quantity"] ?>" name="quantity">
                                        <div><a style="cursor: pointer" class="inc-btn"><span class="inc" data-product-id="<?php echo $cartproduct["id"]; ?>">+</span></a>
                                            <a style="cursor: pointer" class="dec-btn"><span class="dec" data-product-id="<?php echo $cartproduct["id"]; ?>">-</span></a>
                                        </div>
                                    </div>
                                </td>
                                <td class="pro-total"><span class="total"><?php echo $cartproduct["price"] * $cartproduct["quantity"] ?></span></td>
                                <td class="pro-remove"><a href="/cart/productDeleted/<?php echo $cartproduct["id"]; ?>"><span class="material-icons-outlined">
                                            delete_forever
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
                <?php if (count($cartproducts) == 0) { ?>
                    <h5 id="empty" style="text-align: center; margin-top: 20px">Your cart is empty</h5>
                <?php } ?>
            </div>
        </form>
    </div>




    <div style="display: flex; margin-bottom: 50px">
        <div class="part1">
            <h5>Select Your Address:</h5>
            <form>
                <select class="input input1">
                    <?php if (isset($_SESSION["user_id"])) {
                        foreach ($addresses as $address) { ?>
                            <option class="option" value="<?php echo $address["id"] ?>"><?php echo $address["address"] ?></option>
                        <?php } ?>
                    <?php } else { ?>
                        <option class="option" value="Please Login">Please Login</option>
                    <?php } ?>
                </select>
                <a class="linktoaccount" href="/account">
                    <p class="orderlink">Add</p>
                </a>
            </form>
            <br>
            <h5>Phone:</h5>
            <form>
                <input readonly type="text" class="input" value="<?php if (isset($_SESSION["user_id"])) {
                                                                        echo $phonenumber["phone"];
                                                                    } else {
                                                                        echo "Please Login";
                                                                    } ?>">
                <a class="linktoaccount" href="/account">
                    <p class="orderlink">Change</p>
                </a>
            </form>
        </div>

        <div class="part2">
            <div class="border">
                <h5>Cart Total</h5>
                <br>

                <p style="float: left;">Subtotal</p>
                <p class="subtotal" style="float: right;"><?php echo $total . "-VNĐ" ?></p>
                <br>
                <hr style="color: black">
            </div>
            <br>
            <div style="display: flex;justify-content: space-around;">
                <?php if (sizeof($addresses)*strlen($phonenumber["phone"])!=0) { ?>
                <a id="order" style="text-decoration: none;">
                    <p class="khung">Checkout</p>
                </a>
                <?php } else { ?>
                    <a href="/account">Thêm thông tin liên hệ</a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>