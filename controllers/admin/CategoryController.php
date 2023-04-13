<?php
class CategoryController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("category");
    }

    public function renderAllCategories()
    {
        $data["title"] = "Categories";

        $data["nav"] = "categories";

        $data["jsFiles"] = [
            "js/admin/datatable.js"
        ];

        $data["specialCss"] = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">';

        $data["specialJs"] = '<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>';


        $data["categories"] = $this->category->getAllCategories();

        $this->load->view("layouts/admin", "admin/category/list_categories", $data);
    }

    public function renderAddPage()
    {
        $data["title"] = "Add Categories";

        $data["nav"] = "categories";

        $data["cssFiles"] = [
            "css/admin/form.css",
            "css/admin/categories/add_category/form.css",
            "css/admin/products/add_product/thumbnails.css",
        ];
        $data["specialJs"] = '<script src="/plugins/ckfinder/ckfinder.js"></script>';

        $data["jsFiles"] = [
            "js/admin/products/add_product/choose_thumbnails.js",
        ];

        $this->load->view("layouts/admin", "admin/category/add_category", $data);
    }

    public function addNewCategory()
    {
        $category = $_POST;
        $this->category->insertNewCategory($category);
        header("Location: /admin/categories");
    }

    public function renderEditPage($id)
    {
        $data["title"] = "Edit Categories";

        $data["nav"] = "categories";

        $data["cssFiles"] = [
            "css/admin/form.css",
            "css/admin/categories/add_category/form.css",
            "css/admin/products/add_product/thumbnails.css",
        ];
        $data["specialJs"] = '<script src="/plugins/ckfinder/ckfinder.js"></script>';

        $data["jsFiles"] = [
            "js/admin/products/add_product/choose_thumbnails.js",
        ];
        $data["category"] = $this->category->getCategoryById($id);

        $this->load->view("layouts/admin", "admin/category/edit_category", $data);
    }
    public function editCategory($id)
    {
        $category = $_POST;
        $this->category->editCategory($id, $category);
        header("Location: /admin/categories");
    }
    public function deteleCategory($id)
    {
        $this->category->deleteById($id);
        header("Location: /admin/categories");
    }
}
