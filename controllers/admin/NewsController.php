<?php
class NewsController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("news");
    }
    public function renderAllNews()
    {
        $data["title"] = "News";

        $data["nav"] = "news";

        $data["jsFiles"] = ["js/admin/datatable.js"];

        $data["specialCss"] = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">';

        $data["specialJs"] = '<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>';

        $data["list_news"] = $this->news->getAllNews();
        $this->load->view("layouts/admin", "admin/news/list_news", $data);
    }
    public function renderAddPage()
    {
        $data["title"] = "Add News";
        $data["nav"] = "news";

        $data["cssFiles"] = [
            "css/admin/form.css",
            "css/admin/news/editor.css",
            "css/admin/products/add_product/thumbnails.css",

        ];
        $data["jsFiles"] = [
            "js/admin/products/add_product/choose_thumbnails.js",
        ];

        $this->load->view("layouts/admin", "admin/news/add_news", $data);
    }

    public function addNews()
    {
        $news = $_POST;
        $this->news->insertNews($news);
        header("Location: /admin/news");
    }
    public function renderEditPage($id)
    {
        $data["title"] = "Edit News";
        $data["nav"] = "news";

        $data["cssFiles"] = [
            "css/admin/form.css",
            "css/admin/news/editor.css",
            "css/admin/products/add_product/thumbnails.css",

        ];
        $data["jsFiles"] = [
            "js/admin/products/add_product/choose_thumbnails.js",
        ];

        $data["news"] = $this->news->getNewsById($id);

        $this->load->view("layouts/admin", "admin/news/edit_news", $data);
    }
    public function editNews($id)
    {
        $news = $_POST;
        $this->news->editNews($id, $news);
        header("Location: /admin/news");
    }
    public function deleteNews($id)
    {
        $this->news->deleteById($id);
        header("Location: /admin/news");
    }
}
