<?php
class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("product");
        $this->load->model("cart");
        $this->load->model("news");
        $this->load->model("notification");
    }

    public function renderHomePage()
    {
        $data["title"] = "Home";
        $data["cssFiles"] = [
            "css/customer/homepage/homepage.css",
        ];
        $data["jsFiles"] = [
            "libs/rateit.js-master/scripts/jquery.rateit.js"
        ];

        $data["categoryhomeCus"] = $this->product->getAllCategoryHomeCus();
        $data["newCategoryHome"] = $this->product->getNewCategoryHome();
        $data["loadTittleImgCate"] = $this->product->loadTittleImgCate();
        $data["loadNewsHomePage"] = $this->news->get6News();
        $data["specialCss"] = '
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.7.5/swiper-bundle.min.css"/>';
        if (isset($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];
            $data["notifications"] = $this->notification->getAllNoti($user_id);
        }
        $data["specialJs"] = '
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.7.5/swiper-bundle.min.js"></script>
        ';
        $data["jsFiles"] = [
            "js/customer/homepage/homepage.js",
        ];
        $data["cartproducts"] = $this->cart->getAllProducts_cart();
        $this->load->view("layouts/client", "client/homepage/homepage", $data);
    }
}
