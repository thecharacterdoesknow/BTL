<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Orders</li>
    </ol>
</nav>

<div class="card">
    <div class="card-body">
        <div class="wrapper-title">
            <h4 class="title">Orders</h4>
        </div>
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>User</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Order at</th>
                    <th>Status</th>
                    <th style="text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) { ?>
                    <tr>
                        <td><?php echo $order["id"]; ?></td>
                        <td><?php echo $order["first_name"] . ' ' . $order["last_name"]; ?></td>
                        <td><?php echo $order["phone"]; ?></td>
                        <td><?php echo $order["address"]; ?></td>
                        <td><?php echo $order["created_at"]; ?></td>
                        <th><span class="status <?php echo strtolower($order["status"]); ?>"><?php echo $order["status"]; ?></span></th>
                        <td style="text-align: center;">
                            <div class="btn-group" style="border: 1px solid #1b2c3f; border-radius: .26rem">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="/admin/orders/<?php echo $order["id"]; ?>">Detail</a></li>
                                    <?php if ($order["status"] == "Processing") { ?>
                                        <li><a class="dropdown-item btn-update" data-bs-toggle="modal" href="#exampleModalToggle" data-id="<?php echo $order["id"]; ?>" data-type="deliver">Delivered</a></li>
                                        <li><a class="dropdown-item btn-update" data-bs-toggle="modal" href="#exampleModalToggle" data-id="<?php echo $order["id"]; ?>" data-type="cancel">Cancel</a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </td>
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
