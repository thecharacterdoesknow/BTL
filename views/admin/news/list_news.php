<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">News</li>
    </ol>
</nav>


<div class="card">
    <div class="card-body">
        <div class="wrapper-title">
            <h4 class="title">News</h4>
            <a class="btn" role="button" href="/admin/news/add"><i class="fas fa-plus"></i> New</a>
        </div>
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th style="width: 100px;">Thumbnails</th>
                    <th>Title</th>
                    <th style="text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list_news as $news) { ?>
                    <tr>
                        <td><?php echo $news["id"]; ?></td>
                        <td><img style="width: 100px; height:100px" src="<?php echo $news["thumbnails"]; ?>" alt="" srcset=""></td>
                        <td><?php echo $news["title"]; ?></td>
                        <td style="text-align: center;">
                            <div class="btn-group" style="border: 1px solid #1b2c3f; border-radius: .26rem">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="/admin/news/edit/<?php echo $news["id"]; ?>">Edit</a></li>
                                    <li><a class="dropdown-item" href="/admin/news/delete/<?php echo $news["id"]; ?>">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>