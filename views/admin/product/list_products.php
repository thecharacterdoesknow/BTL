<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Products</li>
    </ol>
</nav>

<div class="card">
    <div class="card-body">
        <div class="wrapper-title">
            <h4 class="title">Products</h4>
            <a class="btn" role="button" href="/admin/products/add"><i class="fas fa-plus"></i> New</a>
        </div>
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th style="width: 100px;">Thumbnails</th>
                    <th>Name</th>
                    <th>Categories</th>
                    <th>Price</th>
                    <th>Unit</th>
                    <th>Quantity</th>
                    <th style="text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) { ?>
                    <tr>
                        <td><?php echo $product["id"]; ?></td>
                        <td><img style="width: 100px; height:100px" src="<?php echo $product["thumbnails"]; ?>" alt=""></td>
                        <td><?php echo $product["name"]; ?></td>
                        <?php
                        $categories = [];
                        foreach ($product["categories"] as $c) {
                            array_push($categories, $c["title"]);
                        }
                        $categories = join(", ", $categories);
                        ?>
                        <td><?php echo $categories; ?></td>
                        <td><?php echo $product["price"]; ?></td>
                        <td><?php echo $product["unit_title"]; ?></td>
                        <td><?php echo $product["quantity"]; ?></td>
                        <td style="text-align: center;">
                            <div class="btn-group" style="border: 1px solid #1b2c3f; border-radius: .26rem">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="/admin/products/edit/<?php echo $product["id"]; ?>">Edit</a></li>
                                    <li><a class="dropdown-item" href="/admin/products/delete/<?php echo $product["id"]; ?>">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>