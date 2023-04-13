<?php
class FileManagerController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function renderFileManager()
    {
        $data["title"] = "Files";

        $data["nav"] = "files";
        $this->load->view("layouts/admin", "admin/file_manager/file_manager", $data);
    }
}
