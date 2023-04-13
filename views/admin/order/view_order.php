<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="#">Orders</a></li>
        <li class="breadcrumb-item active" aria-current="page">Order #<?php echo $order["id"]; ?></li>
    </ol>
</nav>

<div class="card">
    <div class="card-body">
        <div class="wrapper-title">
            <h4 class="title">Order #<?php echo $order["id"]; ?></h4>

            <div class="actions">
                <?php if ($order["status"] == "Processing") { ?>
                    <a class="btn bg-error btn-update" role="button" data-bs-toggle="modal" href="#exampleModalToggle" data-id="<?php echo $order["id"]; ?>" data-type="cancel">Cancel</a>
                    <a class="btn btn-update" role="button" data-bs-toggle="modal" href="#exampleModalToggle" data-id="<?php echo $order["id"]; ?>" data-type="deliver">Delivered</a>
                <?php } else { ?>
                    <a class="btn" role="button" href="/admin/orders">Back</a>
                <?php } ?>
            </div>
        </div>
        <h5 class="title">Informations</h5>
        <div class="order-info">
            <p><span class="property-name">User: </span><span><?php echo $order["first_name"] . ' ' . $order["last_name"]; ?></span></p>
            <p><span class="property-name">Phone: </span><span><?php echo $order["phone"]; ?></span></p>
            <p><span class="property-name">Email: </span><span><?php echo $order["email"]; ?></span></p>
            <p><span class="property-name">Address: </span><span><?php echo $order["address"]; ?></span></p>
            <p><span class="property-name">Status: </span><span class="status <?php echo strtolower($order["status"]); ?>"><?php echo $order["status"]; ?></span></p>
            <p><span class="property-name">Note: </span><span><?php echo $order["note"]; ?></span></p>
        </div>
        <h5 class="title">Products</h5>
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th style="width: 100px;">Image</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order["products"] as $product) { ?>
                    <tr>
                        <td><?php echo $product["id"]; ?></td>
                        <td><img src="<?php echo $product["thumbnails"]; ?>" width="100" height="100" alt=""></td>
                        <td><?php echo $product["name"]; ?></td>
                        <td><?php echo $product["quantity"]; ?></td>
                        <td><?php echo $product["price"]; ?></td>
                        <th><?php echo $product["price"] * $product["quantity"]; ?></th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="#" method="POST" id="form-update-status">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Content:</label>
                        <textarea class="form-control" name="note" id="message-text"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>