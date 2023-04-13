<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

class UserController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user");
    }

    public function renderLoginForm()
    {
        $data["title"] = "Login";
        $data["cssFiles"] = [
            "css/customer/commons/breadcum.css",
            "css/customer/login/login-form.css",
        ];
        $this->load->view("layouts/client", "account/login", $data);
    }

    public function redirectLogin()
    {
        $_SESSION["location"] = $_GET["location"];
        header("Location: /login");
    }

    public function renderRegisterForm()
    {
        $data["title"] = "Register";
        $data["cssFiles"] = [
            "css/customer/commons/breadcum.css",
            "css/customer/register/register-form.css",
        ];
        $this->load->view("layouts/client", "account/register", $data);
    }
    public function register()
    {
        if ($_POST["password"] == $_POST['rePassword']) {
            unset($_POST["rePassword"]);
            $_POST["avatar"] = "/public/images/default_avt.png";
            $verifyCode = random_int(100000, 999999);
            $_POST["code"] = $verifyCode;
            $_SESSION = $_POST;
            $this->sendVerifyMail($verifyCode);
            header("Location: /verify");
        }
    }

    public function renderVerifyForm()
    {
        $data["title"] = "Verify";
        $data["cssFiles"] = [
            "css/customer/commons/breadcum.css",
            "css/customer/login/login-form.css",
        ];
        $this->load->view("layouts/client", "account/verify", $data);
    }

    public function verify()
    {
        if (isset($_POST["code"]) && $_POST["code"] == $_SESSION["code"]) {
            unset($_SESSION["code"]);
            $this->user->register($_SESSION);
            header("Location: /login");
        } else {
            $data["title"] = "Verify";
            $data["cssFiles"] = [
                "css/customer/commons/breadcum.css",
                "css/customer/login/login-form.css",
            ];
            $data["error"] = array(
                "code" => "Code is invalid!"
            );
            $this->load->view("layouts/client", "account/verify", $data);
        }
    }
    public function login()
    {
        $data["title"] = "Login";
        $data["cssFiles"] = [
            "css/customer/commons/breadcum.css",
            "css/customer/login/login-form.css",
        ];
        $user = $this->user->findUserByEmail($_POST["email"]);
        $data["email"] = $_POST["email"];
        if ($user) {
            if (password_verify($_POST["password"], $user["password"])) {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["role"] = $user["role"];
                $location = isset($_SESSION["location"]) ? $_SESSION["location"] : "/";
                unset($_SESSION["location"]);
                header("Location: " . $location);
            } else {
                $data["error"] = [
                    "password" => "Mật khẩu không đúng"
                ];
                $this->load->view("layouts/client", "account/login", $data);
            }
        } else {
            $data["error"] = [
                "email" => "Email chưa đăng ký"
            ];
            $this->load->view("layouts/client", "account/login", $data);
        }
    }
    public function logout()
    {
        session_destroy();
        header("Location: /");
        echo "trong";
    }

    private function sendVerifyMail($verifyCode)
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_CLIENT;                      //Enable verbose debug output
            $mail->isSMTP();
            $mail->Mailer = "smtp";                                    //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'aa9945997@gmail.com';                     //SMTP username
            $mail->Password   = 'Xyz.123456';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('aa9945997@gmail.com', 'Food shop');
            $mail->addAddress($_SESSION["email"], $_SESSION["firstName"] . " " . $_SESSION["lastName"]);

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Verify email';
            $mail->Body    = 'Your verify code is <b>' . $verifyCode . '</b>.';
            $mail->AltBody = 'Your verify code is ' . $verifyCode . '.';

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
