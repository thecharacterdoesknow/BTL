<?php
class UnitModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertNewUnit($unit)
    {
        $stmt = $this->conn->prepare('INSERT INTO unit(title) values(:title)');
        $result = $stmt->execute($unit);
        return $result ? $this->conn->lastInsertId() : -1;
    }

    public function getAllUnits()
    {
        $stmt = $this->conn->prepare("SELECT * FROM unit");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getUnitById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM unit WHERE id = :id");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array("id" => $id));
        $rows = $stmt->fetchAll();
        if (isset($rows[0])) {
            return $rows[0];
        } else return null;
    }

    public function editUnit($id, $unit)
    {
        $unit["id"] = $id;
        $stmt = $this->conn->prepare('UPDATE unit SET title = :title WHERE id = :id');
        return $stmt->execute($unit);
    }
    public function deleteById($id)
    {
        $stmt = $this->conn->prepare('DELETE FROM unit WHERE id = :id');
        return $stmt->execute(array(
            "id" => $id
        ));
    }
}
