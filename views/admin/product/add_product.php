<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="/admin/products">Products</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add new product</li>
    </ol>
</nav>

<div class="card">
    <div class="card-body">
        <div class="wrapper-title">
            <h4 class="title">Add new product</h4>
        </div>
        <div class="subview-content">
            <form action="/admin/products/addNew" method="POST" class="add-product-form">
                <div class="row">
                    <div class="col-3 thumbnails-wrapper">
                        <img src="/public/images/default_product.png" id="thumbnails-img" alt="">
                        <button id="thumbnails-btn">Choose another image</button>
                        <input type="text" name="thumbnails" id="thumbnails-input" value="/public/images/default_product.png">
                    </div>
                    <div class="col-9">
                        <div class="input-flex">
                            <label class="label">Product name</label>
                            <div class="cover-input"><input class="input" type="text" placeholder="Enter product name" name="name"></div>
                        </div>
                        <div style="display: flex; margin-bottom: 15px;">
                            <label class="label">Description</label>
                            <div class="cover-input">
                                <textarea class="form-control" placeholder="Description" rows="5" name="description"></textarea>
                            </div>
                        </div>
                        <div class="input-flex">
                            <label class="label">Quantity</label>
                            <div class="cover-input"><input class="input" type="number" placeholder="Enter quantity" name="quantity"></div>
                        </div>
                        <div class="input-flex">
                            <label class="label">Price</label>
                            <div class="cover-input" style="display: flex; gap:15px">
                                <input class="input" type="number" placeholder="Enter price" name="price">
                                <select class="form-select" id="inlineFormSelect" name="unit_id">
                                    <option selected="">Unit</option>
                                    <?php foreach ($units as $unit) { ?>
                                        <option value="<?php echo $unit["id"]; ?>"><?php echo $unit["title"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div style="display: flex; margin-bottom: 15px;">
                            <label class="label">Categories</label>
                            <div class="cover-input">
                                <select name="categories[]" id="categories-sel" multiple="true">
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?php echo $category["id"]; ?>"><?php echo $category["title"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-images-wrapper">
                    <h6>Product's images</h6>
                    <div class="images">
                        <button type="button" id="add-image-btn">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <textarea type="text" name="product_images" id="product_images_input"></textarea>
                </div>
                <div class="input-flex right">
                    <a role="button" href="/admin/products" class="error-bg border-radius">Cancel</a>
                    <button class="primary-bg border-radius">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<template id="template-image">
    <div class="image">
        <button class="delete-btn error-bg" data-image-url=""><i class="fas fa-times"></i></button>
        <img src="" alt="">
    </div>
</template>