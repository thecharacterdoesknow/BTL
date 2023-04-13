<?php
class ProductController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("cart");
        $this->load->model("product");
        $this->load->model("notification");
    }

    public function renderHomeShop()
    {
        $data["title"] = "Shop";
        $data["cssFiles"] = [
            "css/customer/commons/breadcum.css",
            "css/customer/shoppage/checkbox-filter.css",
            "css/customer/shoppage/toprate.css",
            "css/customer/shoppage/tagsproduct.css",
            "css/customer/shoppage/banner.css",
            "css/customer/shoppage/card-product.css",
            "css/customer/shoppage/grid-products.css",
            "css/customer/commons/pagination.css",
            "css/customer/shoppage/filter.css",
            "libs/rateit.js-master/scripts/rateit.css",

        ];
        $data["jsFiles"] = [
            "libs/rateit.js-master/scripts/jquery.rateit.js",
            "js/customer/shoppage/filter.js"
        ];
        $_GET["page"] = isset($_GET["page"]) && $_GET["page"] != "" ? $_GET["page"] : 1;
        $condition = array(
            "pagination" => array(
                "size" => 9,
                "page" => $_GET["page"] - 1
            )
        );

        if (isset($_GET["category"])) {
            $condition["categoryId"] = $_GET["category"];
        }
        if (isset($_GET["q"])) {
            $condition["q"] = $_GET["q"];
        }
        if (isset($_GET["sort"])) {
            $condition["sort"] = $_GET["sort"];
        }
        if (isset($_GET["order"])) {
            $condition["order"] = $_GET["order"];
        }
        $data["products"] = $this->product->getAllProductsShopPage($condition);
        unset($condition["pagination"]);
        $data["number_products"] = sizeof($this->product->getAllProductsShopPage($condition));
        $data["top_ratings"] = $this->product->getTopRating(array());
        $this->load->model("category");
        $data["categories"] = $this->category->getAllCategories();
        if (isset($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];
            $data["notifications"] = $this->notification->getAllNoti($user_id);
        }
        $data["cartproducts"] = $this->cart->getAllProducts_cart();
        $this->load->view("layouts/client", "client/shoppage/shoppage", $data);
    }
    public function renderDetailPage($id)
    {
        $data["title"] = "Product Detail";
        $data["cssFiles"] = [
            "css/customer/commons/breadcum.css",
            "css/customer/detailpage/detailpage.css",
            "css/customer/news/news_comment.css",
            "libs/rateit.js-master/scripts/rateit.css",
        ];
        $data["jsFiles"] = [
            "libs/rateit.js-master/scripts/jquery.rateit.js",
            "js/customer/detailpage/detailpage.js",
            "js/customer/product/comment.js",
            "js/customer/product/rate.js",
        ];
        $data["relatedproducts"] = $this->product->getRelatedProduct($id);
        $data["product"] = $this->product->getProductForDetail($id);
        $data["categories"] = $this->product->getAllProductCategory($id);
        $data["cartproducts"] = $this->cart->getAllProducts_cart();
        $pagination = array(
            "page" => 0,
            "size" => 5
        );
        if (isset($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];
            $data["notifications"] = $this->notification->getAllNoti($user_id);
        }
        $data["comments"] = $this->product->loadCommentsOfProduct($id, $pagination);
        $data["rates"] = $this->product->loadRatesOfProduct($id, $pagination);
        $this->load->model("user");
        if (isset($_SESSION["user_id"])) {
            $data["user"] = $this->user->findUserById($_SESSION["user_id"]);
        }
        $this->load->view("layouts/client", "client/shoppage/detailpage", $data);
    }
    public function addToCart()
    {
        $data = $_POST;
        $quantity = $data["quantity"];
        $product_id = $data["product_id"];
        $user_id = $_SESSION["user_id"];
        $quantity_in_stock = $this->product->checkInStock($product_id);
        $quantity_in_cart = $this->product->checkQuantityCart($product_id, $user_id);
        if ($quantity_in_cart == null) {
            $quantity_in_cart["quantity"] = 0;
        }
        if (($quantity + $quantity_in_cart["quantity"]) <= $quantity_in_stock["quantity"]) {


            $success = $this->product->addToCart($user_id, $product_id, $quantity);
            $current_product = $this->product->getCurrentProduct($product_id);
            $response = [
                "success" => $success,
                "productinfo" => $current_product
            ];
            echo json_encode($response);
        } else {
            $response = [
                "success" => false,
                "error" => "Sorry, we do not have enough item in stock"
            ];
            echo json_encode($response);
        }
    }

    public function addComment()
    {
        $userId = $_SESSION["user_id"];
        $now = (new DateTime())->format('Y-m-d H:i:s');
        $comment = [
            "user_id" => $userId,
            "product_id" => $_POST["productId"],
            "content" => $_POST["content"],
            "created_at" => $now
        ];
        $this->product->addComment($comment);
        $this->load->model("user");
        $user = $this->user->findUserById($userId);

        $comment["avatar"] = $user["avatar"];
        $comment["username"] = $user["first_name"] . " " . $user["last_name"];
        $comment["created_at"] = $now;

        $response = [
            "success" => true,
            "comment" => $comment
        ];
        echo json_encode($response);
    }

    public function loadComments()
    {
        $productId = $_GET["productId"];
        $lastCommentId = $_GET["lastCommentId"];
        $response["comments"] = $this->product->loadMoreCommentsOfProduct($productId, $lastCommentId);
        echo json_encode($response);
    }

    public function addRate()
    {
        $userId = $_SESSION["user_id"];
        $now = (new DateTime())->format('Y-m-d H:i:s');
        $rate = [
            "user_id" => $userId,
            "product_id" => $_POST["productId"],
            "rate" => $_POST["rate"],
            "content" => $_POST["content"],
            "created_at" => $now
        ];
        $this->product->addRate($rate);
        $this->load->model("user");
        $user = $this->user->findUserById($userId);

        $rate["avatar"] = $user["avatar"];
        $rate["username"] = $user["first_name"] . " " . $user["last_name"];
        $rate["created_at"] = $now;

        $response = [
            "success" => true,
            "rate" => $rate
        ];
        echo json_encode($response);
    }

    public function loadRates()
    {
        $productId = $_GET["productId"];
        $lastRateId = $_GET["lastRateId"];
        $response["rates"] = $this->product->loadMoreRatesOfProduct($productId, $lastRateId);
        echo json_encode($response);
    }
}
