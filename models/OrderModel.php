<?php
class OrderModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getOrderInfo($user_id, $id)
    {
        $stmt = $this->conn->prepare("SELECT `order`.id, address.address, user.first_name, user.last_name, user.phone, created_at, status, note 
        FROM (`order` JOIN address ON `order`.user_id = address.user_id AND `order`.address_id=address.id JOIN user ON `order`.user_id=user.id) 
        WHERE `order`.user_id = :id AND `order`.id=:orderId ORDER BY created_at DESC");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array(
            "id" => $user_id,
            "orderId" => $id
        ));
        return $stmt->fetchAll();
    }
    public function getAllOrderInfo($user_id)
    {
        $stmt = $this->conn->prepare("SELECT `order`.id, address.address, user.first_name, user.last_name, user.phone, created_at, status 
        FROM (`order` JOIN address ON `order`.user_id = address.user_id AND `order`.address_id=address.id JOIN user ON `order`.user_id=user.id) 
        WHERE `order`.user_id = :id ORDER BY created_at DESC");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array(
            "id" => $user_id,
        ));
        return $stmt->fetchAll();
    }
    public function orderCancelled($id, $status)
    {
        $stmt = $this->conn->prepare('UPDATE `order` SET `order`.status = :status WHERE `order`.id = :id');
        return $stmt->execute(array(
            "id" => $id,
            "status" => $status
        ));
    }
    public function addOrder($id, $user_id, $status)
    {
        $stmt = $this->conn->prepare("INSERT INTO `order`(user_id, address_id, status) VALUES(:user_id, :address_id, :status) ON DUPLICATE KEY UPDATE address_id = :address_id");
        $result = $stmt->execute(array(
            "user_id" => $user_id,
            "address_id" => $id,
            "status" => $status
        ));
        return $result ? $this->conn->lastInsertId() : -1;
    }
    public function decProductQuantity($cartproduct)
    {
        $stmt = $this->conn->prepare("UPDATE product SET quantity= quantity - :quantity WHERE product.id=:id");
        $stmt->execute(array(
            "quantity" => $cartproduct["quantity"],
            "id" => $cartproduct["id"]
        ));
    }
    public function incProductQuantity($orderproduct)
    {
        $stmt = $this->conn->prepare("UPDATE product SET quantity= quantity + :quantity WHERE product.id=:id");
        $stmt->execute(array(
            "quantity" => $orderproduct["quantity"],
            "id" => $orderproduct["id"]
        ));
    }
    public function orderUpdated($address_id, $order_id)
    {
        $stmt = $this->conn->prepare("UPDATE `order` SET `address_id`=:address_id WHERE `order`.id=:order_id");
        return $stmt->execute(array(
            "order_id" => $order_id,
            "address_id" => $address_id
        ));
    }
    public function  moveToPro_Order($cartproduct, $orderId)
    {
        $stmt = $this->conn->prepare('INSERT INTO product_order (order_id, product_id,quantity, unit_id, price) VALUES(:orderId,:productId,:quantity,:unitId,:price)');
        $stmt->execute(array(
            "orderId" => $orderId,
            "productId" => $cartproduct["id"],
            "quantity" => $cartproduct["quantity"],
            "unitId" => $cartproduct["unit_id"],
            "price" => $cartproduct["price"]

        ));
    }
    public function getAllProducts_order($id)
    {
        $stmt = $this->conn->prepare("SELECT product.id, product.name, product.thumbnails, product.price, product_order.quantity FROM (product JOIN product_order ON product.id = product_order.product_id) WHERE product_order.order_id=:id");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array(
            "id" => $id
        ));
        return $stmt->fetchAll();
    }

    public function getAllOrder()
    {
        $stmt = $this->conn->prepare("SELECT *, order.id as id FROM ((`order` JOIN user ON user_id = user.id) JOIN address ON address_id = address.id) ORDER BY created_at DESC");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getOrderDetail($id)
    {
        $stmt = $this->conn->prepare("SELECT *, order.id as id FROM ((`order` JOIN user ON user_id = user.id) JOIN address ON address_id = address.id) WHERE order.id = :id");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array("id" => $id));
        $rows = $stmt->fetchAll();
        if (isset($rows[0])) {
            $order = $rows[0];
            $stmt = $this->conn->prepare("SELECT *, product.id as id, product_order.quantity as quantity FROM product_order JOIN product ON product_id = product.id WHERE order_id = :id");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute(array("id" => $id));
            $order["products"] = $stmt->fetchAll();
            return $order;
        } else return null;
    }

    public function updateStatus($id, $status, $note)
    {
        $stmt = $this->conn->prepare('UPDATE `order` SET status = :status, note = :note, created_at = created_at WHERE id = :id');
        return $stmt->execute(array(
            "id" => $id,
            "status" => $status,
            "note" => $note
        ));
    }
}
