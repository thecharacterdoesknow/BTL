<?php
abstract class BaseModel
{
    protected $conn;
    public function __construct()
    {
        global $database;
        extract($database);
        $this->conn = new PDO('mysql:host=' . $host . ';dbname=' . $databasename, $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
