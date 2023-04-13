<?php
class FormController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function renderForm()
    {
        $data["cssFiles"] = array("css/admin/form.css");
        $data["title"] = "Admin Form";
        $this->load->view("layouts/admin", "admin/form/form", $data);
    }
}
