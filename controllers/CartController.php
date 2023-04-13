<?php
class CartController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("cart");
        $this->load->model("notification");
    }
    public function renderShoppingCart()
    {
        $data["title"] = "Your Shopping Cart";
        $data["cssFiles"] = [
            "css/customer/commons/breadcum.css",
            "css/customer/cart/cart.css",
        ];
        if (isset($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];
            $data["addresses"] = $this->cart->getAddresses($user_id);
            $data["phonenumber"] = $this->cart->getPhoneNumber($user_id);
        }
        if (isset($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];
            $data["notifications"] = $this->notification->getAllNoti($user_id);
        }
        $data["jsFiles"] = ["js/customer/cart/cart.js"];
        $data["cartproducts"] = $this->cart->getAllProducts_cart();
        $this->load->view("layouts/client", "client/shoppage/cartpage", $data);
    }

    public function  ProductDeleted($id)
    {
        $this->cart->productDeleted($id);
        header("Location: /cart");
    }
    public function setQuantity()
    {
        $data = $_POST;
        $quantity = $data["quantity"];
        $product_id = $data["product_id"];
        $success = $this->cart->setQuantity($quantity, $product_id);
        $response = [
            "success" => $success,

        ];
        echo json_encode($response);
    }
}
