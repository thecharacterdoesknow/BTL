<?php
class CartModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllProducts_cart()
    {
        $stmt = $this->conn->prepare("SELECT product.id, product.name, product.thumbnails, product.price, product_cart.quantity,unit_id FROM (product JOIN product_cart ON product.id = product_cart.product_id) ORDER BY product.id DESC");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function productDeleted($id)
    {
        $stmt = $this->conn->prepare('DELETE FROM product_cart WHERE product_id = :id');
        return $stmt->execute(array(
            "id" => $id
        ));
    }
    public function setQuantity($quantity, $product_id)
    {
        $stmt = $this->conn->prepare('UPDATE product_cart SET quantity = :quantity WHERE product_id = :id');
        return $stmt->execute(array(
            "quantity" => $quantity,
            "id" => $product_id,
        ));
    }

    public function  getAddresses($user_id)
    {
        $stmt = $this->conn->prepare('SELECT address, id FROM address WHERE address.user_id = :id');
        $stmt->execute(array(
            "id" => $user_id,
        ));
        return $stmt->fetchAll();
    }
    public function  getPhoneNumber($user_id)
    {
        $stmt = $this->conn->prepare('SELECT phone FROM user WHERE user.id = :id');
        $stmt->execute(array(
            "id" => $user_id,
        ));
        $rows = $stmt->fetchAll();
        if (isset($rows[0])) {
            return $rows[0];
        } else return null;
    }
    public function  deleteAllCart($user_id)
    {
        $stmt = $this->conn->prepare('DELETE FROM product_cart WHERE product_cart.user_id = :id');
        $stmt->execute(array(
            "id" => $user_id,
        ));
    }
}
