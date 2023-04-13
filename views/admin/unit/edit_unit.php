<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="/admin/units">Units</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit unit</li>
    </ol>
</nav>

<div class="card">
    <div class="card-body">
        <div class="wrapper-title">
            <h4 class="title">Edit unit</h4>
        </div>
        <div class="subview-content">
            <form action="/admin/units/editUnit/<?php echo $unit["id"]; ?>" method="POST" class="add-unit-form">
                <div class="input-flex">
                    <label class="label">Unit</label>
                    <div class="cover-input"><input class="input" type="text" placeholder="Enter unit title" name="title" value="<?php echo $unit["title"]; ?>"></div>
                </div>
                <div class="input-flex right">
                    <a role="button" href="/admin/units" class="error-bg border-radius">Cancel</a>
                    <button class="primary-bg border-radius">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>