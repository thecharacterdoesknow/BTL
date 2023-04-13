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
            <h3>Login</h3>
            <p>Please login using account detail bellow</p>
        </div>
        <div class="login-form">
            <form action="/user/login" method="POST">
                <div class="form-group">
                    <input type="email" name="email" id="email" placeholder="Email" value="<?php echo  isset($email) ? $email : ""; ?>">
                    <?php if (isset($error["email"])) { ?>
                        <small style="color:red; margin-left:15px"><?php echo $error["email"]; ?></small>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Password">
                    <?php if (isset($error["password"])) { ?>
                        <small style="color:red; margin-left:15px"><?php echo $error["password"]; ?></small>
                    <?php } ?>
                </div>
                <div class="_row">
                    <button type="submit">
                        Sign in
                    </button>
                    <a href="#">
                        <p>Forgot your password?</p>
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