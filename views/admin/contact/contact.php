<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Contact</li>
    </ol>
</nav>


<div class="card">
    <div class="card-body">
        <div class="wrapper-title">
            <h4 class="title">Contact</h4>
        </div>
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Title</th>
                    <th>Message</th>
                    <th style="text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact) { ?>
                    <tr class="contactTable">
                        <td style=" width:5% ;"><?php echo $contact["id"]; ?></td>
                        <td class="pName"><p><?php echo $contact["name"]; ?></p></td>
                        <td class="pEmail"><p><?php echo $contact["email"]; ?></p></td>
                        <td class="titleJust1line" ><p><?php echo $contact["title"]; ?></p></td>
                        <td class="messageJust1line" ><p><?php echo $contact["message"]; ?></p></td>
                        <td style="text-align: center;">
                            <div class="btn-group" style="border: 1px solid #1b2c3f; border-radius: .26rem">
                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="/admin/contact/detail/<?php echo $contact["id"]; ?>">Detail</a></li>
                                    <li><a class="dropdown-item" href="/admin/contact/delete/<?php echo $contact["id"]; ?>">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>