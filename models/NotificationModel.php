<?php
class NotificationModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addNotification($userId, $notification)
    {
        $stmt = $this->conn->prepare('INSERT INTO notification(user_id,content,url) values(:user_id,:content,:url)');
        $notification["user_id"] = $userId;
        $result = $stmt->execute($notification);
        return $result ? $this->conn->lastInsertId() : -1;
    }
    public function getAllNoti($user_id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM notification WHERE notification.user_id= :id ORDER BY notification.id DESC LIMIT 4");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array(
            "id" => $user_id,
        ));
        return $stmt->fetchAll();
    }

    public function getNotiById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM notification WHERE id = :id");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array("id" => $id));
        $rows = $stmt->fetchAll();
        if (isset($rows[0])) {
            return $rows[0];
        } else return null;
    }

    public function markView($id)
    {
        $stmt = $this->conn->prepare('UPDATE notification SET is_read = 1 WHERE id = :id');
        return $stmt->execute(array("id"=>$id));
    }

    public function markViewAll($userId)
    {
        $stmt = $this->conn->prepare('UPDATE notification SET is_read = 1 WHERE user_id = :userId');
        return $stmt->execute(array("userId"=>$userId));
    }

    public function countUnread($userId)
    {
        $stmt = $this->conn->prepare("select count(*) as numberUnread from notification where is_read = 0 and user_id = :userId");
        $stmt->execute(array("userId"=>$userId));
        $rows = $stmt->fetchAll();
        return $rows[0]["numberUnread"];
    }

    public function getAllNoti_($user_id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM notification WHERE notification.user_id= :id ORDER BY notification.id DESC");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array(
            "id" => $user_id,
        ));
        return $stmt->fetchAll();
    }
}
