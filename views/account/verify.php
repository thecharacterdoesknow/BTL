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
                    Account
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="wrapper-login-form">
        <div class="title-form">
            <h3>Verify</h3>
            <p>Verify your email</p>
        </div>
        <div class="login-form">
            <form action="/user/verify" method="POST">
                <div class="form-group">
                    <input type="number" name="code" id="code" placeholder="Verify code">
                    <?php if (isset($error["code"])) { ?>
                        <small style="color:red; margin-left:15px"><?php echo $error["code"]; ?></small>
                    <?php } ?>
                </div>
                <div class="_row">
                    <button type="submit">
                        Verify
                    </button>
                </div>
                <div class="form-group">
                    <a href="/login">
                        <p>
                            Sign in
                        </p>
                    </a>
                </div>
                <div class="form-group">
                    <a href="/register">
                        <p>
                            Create account
                        </p>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>