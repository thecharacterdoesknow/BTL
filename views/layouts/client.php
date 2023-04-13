<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <!-- Css file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/customer/setup.css">
    <link rel="stylesheet" href="/public/css/customer/footer/footer.css">
    <link rel="stylesheet" href="/public/css/customer/header/header.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">

    <?php if (isset($specialCss)) {
        echo $specialCss;
    } ?>

    <?php
    if (isset($cssFiles)) {
        foreach ($cssFiles as $file) {
    ?>
            <link rel="stylesheet" href=<?php echo "/public/" . $file; ?>>
    <?php
        }
    }
    ?>

</head>

<body>
    <?php include SITE_PATH . "views/blocks/customer/header.php" ?>

    <?php include $subview ?>

    <?php include SITE_PATH . "views/blocks/customer/footer.php" ?>


    <div class="toast position-fixed top-0 end-0" style="z-index: 11; margin: 10px; opacity:1" id="toast-noti" role="alert" aria-live="assertive" aria-atomic="true">
        <a href="" style="text-decoration: none;">
            <div style="background-color: #70b100;height:52px" class="toast-header">
                <strong style="color: white; font-size:14px" class="me-auto">Notification</strong>
                <small class="text-muted">
                    <p style="color: white; font-size: 12.25px">now</p>
                </small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" style="font-size:14px;min-height:45px">
                message
            </div>
        </a>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/28dc87ed53.js" crossorigin="anonymous"></script>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="/public/js/customer/header/header.js"></script>

    <?php if (isset($specialJs)) {
        echo $specialJs;
    } ?>
    <?php
    if (isset($jsFiles)) {
        foreach ($jsFiles as $file) {
    ?>
            <script src=<?php echo "/public/" . $file; ?>></script>
    <?php
        }
    }
    ?>


    <script src="/public/js/customer/notification/notification.js"></script>
</body>


</html>