<?php
class CommentNewsModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }
    public function loadCommentsOfNews($newsId, $pagination)
    {
        $sql = "SELECT avatar,content,created_at,first_name, last_name,comment_news.id AS id FROM (comment_news JOIN user ON comment_news.user_id = user.id ) WHERE comment_news.news_id = :newsId ORDER BY comment_news.created_at DESC ";
        if (isset($pagination)) {
            $sql .= "LIMIT " . $pagination["size"] . " OFFSET " . ($pagination["size"] * $pagination["page"]);
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array("newsId" => $newsId));
        return $stmt->fetchAll();
    }
}
