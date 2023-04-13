<?php
class CategoryModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertNewCategory($category)
    {
        $stmt = $this->conn->prepare('INSERT INTO category(thumbnails,title) values(:thumbnails,:title)');
        $result = $stmt->execute($category);
        return $result ? $this->conn->lastInsertId() : -1;
    }

    public function getAllCategories()
    {
        $stmt = $this->conn->prepare("SELECT * FROM category");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getCategoryById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM category WHERE id = :id");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array("id" => $id));
        $rows = $stmt->fetchAll();
        if (isset($rows[0])) {
            return $rows[0];
        } else return null;
    }

    public function editCategory($id, $category)
    {
        $category["id"] = $id;
        $stmt = $this->conn->prepare('UPDATE category SET title = :title, thumbnails = :thumbnails WHERE id = :id');
        return $stmt->execute($category);
    }
    public function deleteById($id)
    {
        $stmt = $this->conn->prepare('DELETE FROM category WHERE id = :id');
        return $stmt->execute(array(
            "id" => $id
        ));
    }
}
