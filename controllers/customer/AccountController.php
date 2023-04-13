<?php
class AccountController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user");
        $this->load->model("address");
        $this->load->model("cart");
        $this->load->model("notification");
    }

    public function renderAccountPage()
    {
        $data["cssFiles"] = [
            "css/customer/commons/breadcum.css",
            "css/customer/myaccount/avatar.css",
            "css/customer/myaccount/information.css",
            "css/customer/myaccount/address.css"
        ];

        $data["jsFiles"] = [
            "js/customer/commons/editfield.js",
            "js/customer/myaccount/address.js",
            "js/customer/myaccount/information.js",
            "js/customer/myaccount/avatar.js"
        ];
        $data["title"] = "My Account";
        if (isset($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];
            $data["notifications"] = $this->notification->getAllNoti($user_id);
        }
        $data["cartproducts"] = $this->cart->getAllProducts_cart();
        $user = $this->user->findUserById($_SESSION["user_id"]);
        $user["addresses"] = $this->address->findAllAddressOfUser($_SESSION["user_id"]);
        $data["user"] = $user;

        $this->load->view("layouts/client", "client/myaccount/myaccount", $data);
    }

    public function addNewAddress()
    {
        $address = $_POST["address"];
        $userId = $_SESSION["user_id"];
        $result = $this->address->addNewAddress($userId, $address);
        if ($result != -1) {
            echo json_encode(array(
                "success" => true,
                "id" => $result,
                "address" => $address
            ));
        } else {
            echo json_encode(array(
                "success" => false,
            ));
        }
    }

    public function deleteAddress()
    {
        $addressId = $_POST["addressId"];
        $result = $this->address->deleteAddress($addressId);
        echo json_encode(array(
            "success" => $result,
        ));
    }

    public function updateAddress()
    {
        $addressId = $_POST["id"];
        $address = $_POST["address"];
        $result = $this->address->updateAddress($addressId, $address);
        echo json_encode(array(
            "success" => $result,
        ));
    }

    public function uploadAvatar()
    {
        $avatar_dir = "avatar/";
        $image = $_FILES["avatar-input"];
        $imageFileType = strtolower(pathinfo($image["name"], PATHINFO_EXTENSION));
        $avatar_path =  $avatar_dir . "avatar_" . $_SESSION["user_id"] . "_" . $image["name"];

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo json_encode(array(
                "success" => false,
                "error" => "Only JPG, JPEG, PNG & GIF files are allowed."
            ));
            return;
        }
        $user = $this->user->findUserById($_SESSION["user_id"]);
        $old_avatar = $user["avatar"];
        if (move_uploaded_file($image["tmp_name"], SITE_PATH . $avatar_path)) {
            unlink(SITE_PATH . $old_avatar);
            $this->user->updateAvatar($_SESSION["user_id"], "/" . $avatar_path);
            echo json_encode(array(
                "success" => true,
                "avatar_path" => "/" . $avatar_path
            ));
        } else {
            echo json_encode(array(
                "success" => false,
                "error" => "Error upload file, try later."
            ));
        }
    }

    public function updateEmail()
    {
        $email = $_POST["email"];
        $userId = $_SESSION["user_id"];
        $result = $this->user->updateEmail($userId, $email);
        echo json_encode(array(
            "success" => $result,
        ));
    }
    public function updatePhone()
    {
        $phone = $_POST["phone"];
        $userId = $_SESSION["user_id"];
        $result = $this->user->updatePhone($userId, $phone);
        echo json_encode(array(
            "success" => $result,
        ));
    }
}
