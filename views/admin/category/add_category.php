<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="/admin/categories">Categories</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add new category</li>
    </ol>
</nav>

<div class="card">
    <div class="card-body">
        <div class="wrapper-title">
            <h4 class="title">Add new category</h4>
        </div>
        <div class="subview-content">
            <form action="/admin/categories/addNew" method="POST" class="add-category-form">
                <div class="row">
                    <div class="col-3 thumbnails-wrapper">
                        <img src="/public/images/default_product.png" id="thumbnails-img" alt="">
                        <button id="thumbnails-btn">Choose another image</button>
                        <input type="text" name="thumbnails" id="thumbnails-input" value="/public/images/default_product.png">
                    </div>
                    <div class="col-9">
                        <div class="input-flex">
                            <label class="label">Category title</label>
                            <div class="cover-input"><input class="input" type="text" placeholder="Enter category title" name="title"></div>
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