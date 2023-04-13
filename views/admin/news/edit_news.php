<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="/admin/news">News</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit news</li>
    </ol>
</nav>

<div class="card">
    <div class="card-body">
        <div class="wrapper-title">
            <h4 class="title">Edit news</h4>
        </div>
        <div class="subview-content">
            <form action="/admin/news/editNews/<?php echo $news["id"]; ?>" method="POST" class="add-product-form">
                <div class="row">
                    <div class="col-3">
                        <div class="thumbnails-wrapper">
                            <img src="<?php echo $news["thumbnails"]; ?>" id="thumbnails-img" alt="">
                            <button id="thumbnails-btn">Choose thumbnails</button>
                            <input type="text" name="thumbnails" id="thumbnails-input" value="<?php echo $news["thumbnails"]; ?>">
                        </div>
                    </div>
                    <div class="col-9">
                        <div style="margin-bottom: 20px">
                            <label class="label">Title</label>
                            <input class="input" type="text" placeholder="Enter title" name="title" value="<?php echo $news["title"]; ?>">
                        </div>
                        <div style="margin-bottom: 15px;">
                            <label class="label">Description</label>
                            <div>
                                <textarea class="form-control" placeholder="Description" rows="5" name="description"><?php echo $news["description"]; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="label">Content</label>
                    <textarea name="content" id="editor" placeholder="Enter content">
                        <?php echo $news["content"]; ?>
                    </textarea>
                </div>
                <div class="input-flex right" style="margin-top: 20px;">
                    <a role="button" href="/admin/products" class="error-bg border-radius">Cancel</a>
                    <button class="primary-bg border-radius">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="/plugins/ckfinder/ckfinder.js"></script>
<script src="/plugins/ckeditor/build/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>