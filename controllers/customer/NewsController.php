<?php
class NewsController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("news");
        $this->load->model("cart");
        $this->load->model("notification");
    }

    public function renderAllNews()
    {
        $data["title"] = "News";
        $data["cssFiles"] = [
            "css/customer/commons/breadcum.css",
            "css/customer/shoppage/checkbox-filter.css",
            "css/customer/shoppage/toprate.css",
            "css/customer/shoppage/tagsproduct.css",
            "css/customer/commons/pagination.css",
            "css/customer/news/card.css",
            "css/customer/shoppage/filter.css",
        ];
        $_GET["page"] = isset($_GET["page"]) && $_GET["page"] != "" ? $_GET["page"] : 1;
        $condition = array(
            "pagination" => array(
                "size" => 9,
                "page" => $_GET["page"] - 1
            )
        );
        if (isset($_GET["q"])) {

            $condition["q"] = $_GET["q"];
        }
        if (isset($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];
            $data["notifications"] = $this->notification->getAllNoti($user_id);
        }
        $data["list_news"] = $this->news->getAllNews($condition);
        unset($condition["pagination"]);
        $data["number_news"] = sizeof($this->news->getAllNews($condition));
        $data["cartproducts"] = $this->cart->getAllProducts_cart();
        $this->load->view("layouts/client", "client/news/list_news", $data);
    }

    public function renderNewsDetails($id)
    {
        $data["title"] = "New Detail";

        $data["cssFiles"] = [
            "css/customer/commons/breadcum.css",
            "css/customer/shoppage/checkbox-filter.css",
            "css/customer/shoppage/toprate.css",
            "css/customer/shoppage/tagsproduct.css",
            "css/customer/news/news_content.css",
            "css/customer/news/news_comment.css"
        ];
        $data["jsFiles"] = [
            "js/customer/news/comment.js",
            "js/customer/news/load_more.js"
        ];
        if (isset($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];
            $data["notifications"] = $this->notification->getAllNoti($user_id);
        }
        $data["specialCss"] = '
        <link rel="stylesheet" href="/plugins/ckeditor/sample/styles.css">
        ';
        $data["news"] = $this->news->getNewsById($id);
        $pagination = array(
            "page" => 0,
            "size" => 5
        );
        $data["recentnews"] = $this->news->getRecentNews($id);
        $data["comments"] = $this->news->loadCommentsOfNews($id, $pagination);
        $this->load->model("user");
        if (isset($_SESSION["user_id"])) {
            $data["user"] = $this->user->findUserById($_SESSION["user_id"]);
        }
        $data["cartproducts"] = $this->cart->getAllProducts_cart();
        $this->load->view("layouts/client", "client/news/news_details", $data);
    }

    public function addComment()
    {
        $userId = $_SESSION["user_id"];
        $now = (new DateTime())->format('Y-m-d H:i:s');
        $comment = [
            "user_id" => $userId,
            "news_id" => $_POST["newsId"],
            "content" => $_POST["content"],
            "created_at" => $now
        ];
        $this->news->addComment($comment);
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
        $newsId = $_GET["newsId"];
        $lastCommentId = $_GET["lastCommentId"];
        $response["comments"] = $this->news->loadMoreCommentsOfNews($newsId, $lastCommentId);
        echo json_encode($response);
    }
}
