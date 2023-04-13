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
                    Your Order Products
                </a>
            </li>
        </ul>
    </div>
</div>

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
                        </tr>
                    </thead>
                    <?php
                    $ordertotal = 0;
                    foreach ($orderproducts as $orderproduct) {
                        $ordertotal += $orderproduct["price"] * $orderproduct["quantity"];
                    ?>


                        <tbody>
                            <tr>
                                <td class="pro-image"><a href="/detail/<?php echo $orderproduct["id"] ?>"><img src="<?php echo $orderproduct["thumbnails"] ?>" /></a></td>
                                <td class="pro-title"><a href="#"><?php echo $orderproduct["name"] ?></a></td>
                                <td class="pro-price"><span class="price"><?php echo $orderproduct["price"] ?></span></td>
                                <td class="pro-quantity">
                                    <div class="product-quantity">
                                        <input readonly type="text" value="x<?php echo $orderproduct["quantity"] ?>" name="quantity">
                                    </div>
                                </td>
                                <td class="pro-total"><span class="total"><?php echo $orderproduct["price"] * $orderproduct["quantity"] ?></span></td>

                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
                <?php if (count($orderproducts) == 0) { ?>
                    <h5 id="empty" style="text-align: center; margin-top: 20px">Empty</h5>
                <?php } ?>

            </div>
        </form>
    </div>
    <div style="display: flex;justify-content: space-between; width: 100%;margin-bottom: 50px; padding: 10px">
        <div style="background-color: #dedede;width: 60%;padding: 10px 30px; border-right: 1pt solid #fff">
            <?php foreach ($orders as $order) { ?>
                <p class="info" style="font-weight: bolder">Full name:&nbsp;&nbsp;&nbsp;<span><?php echo ($order["first_name"] . " " . $order["last_name"]) ?></span></p>
                <p class="info" style="font-weight: bolder">Address:&nbsp;&nbsp;&nbsp;<span><?php echo $order["address"] ?></span></p>
                <p class="info" style="font-weight: bolder">Phone:&nbsp;&nbsp;&nbsp;<span><?php echo $order["phone"] ?></span></p>
                <p class="info" style="font-weight: bolder">Status:&nbsp;&nbsp;&nbsp;<span class="status <?php echo strtolower($order["status"]); ?>"><?php echo $order["status"] ?></span></p>
                <?php if ($order["note"] != "") { ?>
                    <p class="info" style="font-weight: bolder">Note:&nbsp;&nbsp;&nbsp;<span><?php echo $order["note"] ?></span></p>
                <?php } ?>
                <p class="info" style="font-weight: bolder">Date:&nbsp;&nbsp;&nbsp;<span><?php echo $order["created_at"] ?></span></p>
            <?php  } ?>
        </div>
        <div style="background-color: #dedede;padding: 30px; width: 40%">
            <h5>Order Total</h5>
            <br>

            <div style="height: 30px;display: flex; justify-content: space-between">
                <p>Subtotal</p>
                <p><?php echo $ordertotal . "-VNĐ" ?></p>

            </div>
            <hr style="color: black">
        </div>
    </div>

</div>