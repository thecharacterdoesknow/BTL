<?php
class DashboardController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function renderDashboard()
    {
        $data["title"] = "Admin dashboard";
        $this->load->view("layouts/admin", "admin/dashboard/dashboard", $data);
    }
}
