<?php
class NotificationController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("notification");
    }

    public function viewNoti($id)
    {
        $notification = $this->notification->getNotiById($id);
        $this->notification->markView($id);
        header("Location: " . $notification["url"]);
    }
    public function markViewAll()
    {
        $result = $this->notification->markViewAll($_SESSION["user_id"]);
        echo json_encode(array("success" => $result));
    }
    public function getNumberUnread()
    {
        $numberUnread = $this->notification->countUnread($_SESSION["user_id"]);
        echo json_encode(array("numberUnread" => $numberUnread));
    }
    public function viewAll()
    {
        $data["title"] = "Notification";

        $data["cssFiles"] = [
            "css/customer/commons/breadcum.css",
        ];

        $data["notis"] = $this->notification->getAllNoti_($_SESSION["user_id"]);
        $data["notifications"] = $this->notification->getAllNoti($_SESSION["user_id"]);


        $this->load->view("layouts/client", "client/notification/view_all", $data);
    }
}
