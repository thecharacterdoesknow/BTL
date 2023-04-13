<?php
class OrderController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("order");
        $this->load->model("cart");
        $this->load->model("notification");
    }

    public function renderOrderPage()
    {
        $data["title"] = "Your Orders";
        $data["cssFiles"] = [
            "css/customer/commons/breadcum.css",
            "css/customer/order/order.css",
        ];
        if (isset($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];
            $data["orders"] = $this->order->getAllOrderInfo($user_id);
        }
        if (isset($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];
            $data["notifications"] = $this->notification->getAllNoti($user_id);
        }
        $data["cartproducts"] = $this->cart->getAllProducts_cart();
        $this->load->view("layouts/client", "client/shoppage/orderpage", $data);
    }

    public function renderOrderProductPage($id)
    {
        $data["title"] = "Your Order Products";
        $data["cssFiles"] = [
            "css/customer/commons/breadcum.css",
            "css/customer/order/orderproduct.css",
            "css/customer/order/status.css",
        ];
        if (isset($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];
            $data["notifications"] = $this->notification->getAllNoti($user_id);
        }
        $user_id = $_SESSION["user_id"];
        $data["orders"] = $this->order->getOrderInfo($user_id, $id);
        $data["orderproducts"] = $this->order->getAllProducts_order($id);
        $data["cartproducts"] = $this->cart->getAllProducts_cart();
        $this->load->view("layouts/client", "client/shoppage/orderproductpage", $data);
    }
    public function orderCancelled($id)
    {
        $status = "Canceled";
        $this->order->orderCancelled($id, $status);
        $orderproducts = $this->order->getAllProducts_order($id);
        foreach ($orderproducts as $orderproduct) {
            $this->order->incProductQuantity($orderproduct);
        }
        header("Location: /order");
    }
    public function addOrder($id)
    {
        $user_id = $_SESSION["user_id"];
        $status = "Processing";
        $orderId = $this->order->addOrder($id,  $user_id, $status);
        $cartproducts = $this->cart->getAllProducts_cart();
        foreach ($cartproducts as $cartproduct) {
            $this->order->moveToPro_Order($cartproduct, $orderId);
            $this->order->decProductQuantity($cartproduct);
        }
        $this->cart->deleteAllCart($user_id);
        header("Location: /order");
    }
    public function orderUpdated($address_id, $order_id)
    {
        $this->order->orderUpdated($address_id, $order_id);
        header("Location: /order");
    }
}
