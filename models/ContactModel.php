<?php
class ContactModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertNewContact($contact)
    {
        $stmt = $this->conn->prepare('INSERT INTO contact(name,email,title,message) values(:name,:email,:title,:message)');
        $result = $stmt->execute($contact);
        return $result ? $this->conn->lastInsertId() : -1;
    }


    public function getAllContact()
    {
        $stmt = $this->conn->prepare("SELECT * FROM contact");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function deleteContactById($id)
    {
        $stmt = $this->conn->prepare('DELETE FROM contact WHERE id = :id');
        return $stmt->execute(array(
            "id" => $id
        ));
    }

    public function getContactDetail($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM contact WHERE id = :id");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array("id" => $id));
        $rows = $stmt->fetchAll();
        if (isset($rows[0])) {
            return $rows[0];
        } else return null;
    }
}