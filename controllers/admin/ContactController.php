<?php
class ContactController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("contact");
    }
    public function renderContact()
    {
        $data["title"] = "Contact";
        $data["nav"] = "contact";
        $data["jsFiles"] = ["js/admin/contact/contact.js"];
        $data["cssFiles"] = array("css/admin/contact/contact.css");
        $data["specialCss"] = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">';

        $data["specialJs"] = '<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>';

        $data["contacts"] = $this->contact->getAllContact();
        $this->load->view("layouts/admin", "admin/contact/contact", $data);
    }
    public function deleteContact($id)
    { 
        $this->contact->deleteContactById($id);
        header("Location: /admin/contact");
    }
    public function LoadDetailPage($id)
    { 


        $data["title"] = "Contact detail";
        $data["nav"] = "contact";
        $data["cssFiles"] = [
            "css/admin/contact/detail.css"
        ];
        $data["contact"] = $this->contact->getContactDetail($id);
        
        $this->load->view("layouts/admin", "admin/contact/contact_detail", $data);
    }
}
