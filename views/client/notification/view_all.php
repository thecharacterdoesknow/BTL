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
                    Notifications
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="container">
    <h3 class="top_menu">Notification</h3>
    <ul id="notifications">
        <li class="allread" id="title-notification">
            <p style="color: white; font-weight: bolder">Mark all as read</p>
            <span class="material-icons-outlined mark-view-all-btn">done</span>
        </li>
        <?php foreach ($notis as $notification) { ?>
            <li class="link-notice <?php echo $notification["is_read"] ? "" : "unread"; ?>">
                <a style="height: 80px" href="/viewNoti/<?php echo $notification["id"]; ?>">
                    <p><span style="font-weight: bolder">Note: </span><?php echo $notification["content"] ?></p>
                    <p><span style="font-weight: bolder">Date: </span><?php echo substr($notification["created_at"], 0, 11); ?></p>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>