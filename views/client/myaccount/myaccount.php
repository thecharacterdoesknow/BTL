<div class="container">
    <div class="breadcum">
        <ul>
            <li>
                <a href="#">
                    <i class="fas fa-home"></i>
                    Home
                </a>
            </li>
            <li class="active">
                <a href="#">
                    My account
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="myaccount">
        <div class="row">
            <div class="col-lg-4 col-12">
                <div class="avatar-wrapper">
                    <div class="avatar">
                        <form id="form-avatar">
                            <label for="avatar-input">
                                <img src="<?php echo $user["avatar"] != "" ?  $user["avatar"] : "/public/images/default_avt.png" ?>" id="avatar-img">
                            </label>
                            <input style="visibility: hidden;" type="file" name="avatar-input" id="avatar-input">
                        </form>
                    </div>
                    <div class="name"><?php echo $user["first_name"] . " " . $user["last_name"] ?></div>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="info-wrapper">
                    <div class="row">
                        <div class="col-4">
                            <span>
                                Email
                            </span>
                        </div>
                        <div class="col-7">
                            <span id="email"><?php echo $user["email"] ?></span>
                        </div>
                        <div class="col-1">
                            <button id="edit-email" class="edit-btn"><i class="far fa-edit"></i></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <span>
                                Phone
                            </span>
                        </div>
                        <div class="col-7">
                            <span id="phone"><?php echo $user["phone"] ?></span>
                        </div>
                        <div class="col-1">
                            <button id="edit-phone" class="edit-btn"><i class="far fa-edit"></i></button>
                        </div>
                    </div>
                </div>
                <div class="address-wrapper">
                    <div class="title">
                        <h3>Địa chỉ</h3>
                    </div>
                    <div id="addresses">
                        <?php foreach ($user["addresses"] as $address_row) { ?>
                            <div class="address">
                                <p><?php echo $address_row["address"] ?></p>
                                <div class="action">
                                    <button class="edit" data-address-id="<?php echo $address_row["id"] ?>"><i class="far fa-edit"></i></button>
                                    <button class="delete" data-address-id="<?php echo $address_row["id"] ?>"><i class="far fa-trash-alt"></i></button>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="add-address">
                        <button id="add-address-btn">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<template id="address-template">
    <div class="address">
        <p></p>
        <div class="action">
            <button class="edit"><i class="far fa-edit"></i></button>
            <button class="delete"><i class="far fa-trash-alt"></i></button>
        </div>
    </div>
</template>

<div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="color: white; background-color: red;">
            <strong class="me-auto" style="color: white;">Error</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Hello, world! This is a toast message.
        </div>
    </div>
</div>