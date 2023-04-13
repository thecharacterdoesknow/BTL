<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="/admin/categories">Categories</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit category</li>
    </ol>
</nav>

<div class="card">
    <div class="card-body">
        <div class="wrapper-title">
            <h4 class="title">Edit category</h4>
        </div>
        <div class="subview-content">
            <form action="/admin/categories/editCategory/<?php echo $category["id"]; ?>" method="POST" class="add-category-form">
                <div class="row">
                    <div class="col-3 thumbnails-wrapper">
                        <img src="<?php echo $category["thumbnails"]; ?>" id="thumbnails-img" alt="">
                        <button id="thumbnails-btn">Choose another image</button>
                        <input type="text" name="thumbnails" id="thumbnails-input" value="<?php echo $product["thumbnails"]; ?>">
                    </div>
                    <div class="col-9">
                        <div class="input-flex">
                            <label class="label">Category</label>
                            <div class="cover-input"><input class="input" type="text" placeholder="Enter category title" name="title" value="<?php echo $category["title"]; ?>"></div>
                        </div>
                    </div>
                    <div class="input-flex right">
                        <a role="button" href="/admin/categories" class="error-bg border-radius">Cancel</a>
                        <button class="primary-bg border-radius">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>