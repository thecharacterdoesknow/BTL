<?php
class ProductController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("product");
        $this->load->model("category");
        $this->load->model("unit");
    }

    public function renderAllProducts()
    {
        $data["title"] = "Products";

        $data["nav"] = "products";

        $data["jsFiles"] = ["js/admin/datatable.js"];

        $data["specialCss"] = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">';

        $data["specialJs"] = '<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>';



        $data["products"] = $this->product->getAllProducts();

        $this->load->view("layouts/admin", "admin/product/list_products", $data);
    }

    public function renderAddPage()
    {
        $data["title"] = "Add Products";

        $data["nav"] = "products";
        $data["cssFiles"] = [
            "css/admin/form.css",
            "css/admin/products/add_product/thumbnails.css",
            "css/admin/products/add_product/product_images_input.css",
            "libs/tags/dist/tokenize2.min.css"
        ];
        $data["specialJs"] = '<script src="/plugins/ckfinder/ckfinder.js"></script>';
        $data["jsFiles"] = [
            "libs/tags/dist/tokenize2.min.js",
            "js/admin/products/add_product/choose_thumbnails.js",
            "js/admin/products/add_product/select_categories.js",
            "js/admin/products/add_product/choose_product_images.js",

        ];

        $data["categories"] = $this->category->getAllCategories();

        $data["units"] = $this->unit->getAllUnits();

        $this->load->view("layouts/admin", "admin/product/add_product", $data);
    }

    public function addNewProduct()
    {
        $product = $_POST;
        $this->product->insertNewProducts($product);
        header("Location: /admin/products");
    }

    public function renderEditPage($id)
    {
        $data["title"] = "Edit Products";

        $data["nav"] = "products";
        $data["cssFiles"] = [
            "css/admin/form.css",
            "css/admin/products/add_product/thumbnails.css",
            "css/admin/products/add_product/product_images_input.css",
            "libs/tags/dist/tokenize2.min.css"
        ];
        $data["specialJs"] = '<script src="/plugins/ckfinder/ckfinder.js"></script>';
        $data["jsFiles"] = [
            "libs/tags/dist/tokenize2.min.js",
            "js/admin/products/add_product/choose_thumbnails.js",
            "js/admin/products/add_product/select_categories.js",
            "js/admin/products/add_product/choose_product_images.js",

        ];

        $data["product"] = $this->product->getProductById($id);

        $data["categories"] = $this->category->getAllCategories();

        $data["units"] = $this->unit->getAllUnits();
        $this->load->view("layouts/admin", "admin/product/edit_product", $data);
    }

    public function editProduct($id)
    {
        $product = $_POST;
        $this->product->updateProducts($id, $product);
        header("Location: /admin/products");
    }

    public function deleteProduct($id)
    {
        $this->product->deleteById($id);
        header("Location: /admin/products");
    }
}
