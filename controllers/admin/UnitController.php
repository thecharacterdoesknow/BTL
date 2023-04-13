<?php
class UnitController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("unit");
    }

    public function renderAllUnits()
    {
        $data["title"] = "Units";

        $data["nav"] = "units";

        $data["jsFiles"] = [
            "js/admin/datatable.js"
        ];

        $data["specialCss"] = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">';

        $data["specialJs"] = '<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>';


        $data["units"] = $this->unit->getAllUnits();

        $this->load->view("layouts/admin", "admin/unit/list_units", $data);
    }

    public function renderAddPage()
    {
        $data["title"] = "Add Units";

        $data["nav"] = "units";

        $data["cssFiles"] = [
            "css/admin/form.css",
            "css/admin/units/add_unit/form.css"
        ];

        $this->load->view("layouts/admin", "admin/unit/add_unit", $data);
    }

    public function addNewUnit()
    {
        $unit["title"] = $_POST["title"];
        $this->unit->insertNewUnit($unit);
        header("Location: /admin/units");
    }

    public function renderEditPage($id)
    {
        $data["title"] = "Edit Units";

        $data["nav"] = "units";

        $data["cssFiles"] = [
            "css/admin/form.css",
            "css/admin/units/add_unit/form.css"
        ];

        $data["unit"] = $this->unit->getUnitById($id);

        $this->load->view("layouts/admin", "admin/unit/edit_unit", $data);
    }
    public function editUnit($id)
    {
        $unit = $_POST;
        $this->unit->editUnit($id, $unit);
        header("Location: /admin/units");
    }
    public function deteleUnit($id)
    {
        $this->unit->deleteById($id);
        header("Location: /admin/units");
    }
}
