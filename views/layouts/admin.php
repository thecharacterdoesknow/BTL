<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <!-- Css file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="/public/css/admin/setup.css">
    <link rel="stylesheet" href="/public/css/admin/layout.css">
    <link rel="stylesheet" href="/public/css/admin/navbar.css">
    <link rel="stylesheet" href="/public/css/admin/commons.css">
    <link rel="stylesheet" href="/public/css/admin/commons/breadcumd.css">

    <?php
    if (isset($specialCss)) {
        echo $specialCss;
    }
    ?>

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
    <?php if (isset($_SESSION["error"])) { ?>
        <div class="toast align-items-center text-white bg-danger border-0 position-fixed top-0 end-0 p-3 m-3" style="z-index: 1000;" role="alert" aria-live="assertive" aria-atomic="true" id="liveToast" data-show="<?php echo isset($_SESSION["error"]); ?>">
            <div class="d-flex">
                <div class="toast-body text-white">
                    <?php echo $_SESSION["error"]; ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    <?php unset($_SESSION["error"]);
    } ?>
    <div class="app-wrapper">
        <div class="nav-bar-wrapper">
            <?php include SITE_PATH . "views/blocks/admin/nav_bar.php" ?>
        </div>
        <div class="content-wrapper">
            <header class="header-wrapper">
                <?php include SITE_PATH . "views/blocks/admin/header.php" ?>
            </header>
            <div class="subview-wrapper">
                <?php include  $subview ?>
            </div>
            <footer>
                <?php include SITE_PATH . "views/blocks/admin/footer.php" ?>
            </footer>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/28dc87ed53.js" crossorigin="anonymous"></script>
    <script src="/public/js/admin/commons.js"></script>

    <?php
    if (isset($specialJs)) {
        echo $specialJs;
    }
    ?>
    <?php
    if (isset($jsFiles)) {
        foreach ($jsFiles as $file) {
    ?>
            <script src=<?php echo "/public/" . $file; ?>></script>
    <?php
        }
    }
    ?>
    <script>
        var toastLiveExample = document.getElementById("liveToast");
        var toast = new bootstrap.Toast(toastLiveExample);
        if (toastLiveExample.dataset.show) {
            toast.show();
        }
    </script>
</body>


</html>