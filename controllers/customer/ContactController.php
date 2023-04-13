<?php
class ContactController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("contact");
        $this->load->model("notification");
    }
    public function renderPageContact()
    {
        $data["title"] = "Contact";
        $data["cssFiles"] = [
            "css/customer/contact/contact.css"
        ];
        if (isset($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];
            $data["notifications"] = $this->notification->getAllNoti($user_id);
        }
        $this->load->view("layouts/client", "client/contactpage/contactpage", $data);
    }

    public function Addnewcontact()
    {
        $data["title"] = "Success Contact";
        $data["cssFiles"] = [
            "css/customer/contact/successcontact.css"
        ];
        $contact = $_POST;
        $this->contact->insertNewContact($contact);
        $this->load->view("layouts/client", "client/contactpage/successcontact", $data);
    }
}

