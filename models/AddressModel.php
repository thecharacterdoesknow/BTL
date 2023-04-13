<?php
class AddressModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAllAddressOfUser($userId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM address WHERE user_id = :userId");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array("userId" => $userId));
        return $stmt->fetchAll();
    }

    public function addNewAddress($userId, $address)
    {
        $stmt = $this->conn->prepare('INSERT INTO address(user_id,address) values(:userId,:address)');
        $result = $stmt->execute(array(
            "userId" => $userId,
            "address" => $address
        ));
        return $result ? $this->conn->lastInsertId() : -1;
    }

    public function deleteAddress($addressId)
    {
        $stmt = $this->conn->prepare('DELETE FROM address WHERE id = :id');
        return $stmt->execute(array(
            "id" => $addressId
        ));
    }

    public function updateAddress($addressId, $address)
    {
        $stmt = $this->conn->prepare('UPDATE address SET address = :address WHERE id = :id');
        return $stmt->execute(array(
            "id" => $addressId,
            'address' => $address
        ));
    }
}
