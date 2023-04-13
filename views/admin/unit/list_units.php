<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Units</li>
    </ol>
</nav>

<div class="card">
    <div class="card-body">
        <div class="wrapper-title">
            <h4 class="title">Units</h4>
            <a class="btn" role="button" href="/admin/units/add"><i class="fas fa-plus"></i> New</a>
        </div>
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Unit title</th>
                    <th style="text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($units as $unit) { ?>
                    <tr>
                        <td><?php echo $unit["id"]; ?></td>
                        <td><?php echo $unit["title"]; ?></td>
                        <td style="text-align: center;">
                            <div class="btn-group" style="border: 1px solid #1b2c3f; border-radius: .26rem">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="/admin/units/edit/<?php echo $unit["id"]; ?>">Edit</a></li>
                                    <li><a class="dropdown-item" href="/admin/units/delete/<?php echo $unit["id"]; ?>">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>