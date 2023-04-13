<?php
class NewsModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getAllNews($condition = array())
    {
        $sql = "SELECT * FROM news ";
        if (isset($condition["q"])) {
            $sql .= "WHERE title LIKE '%" . $condition["q"] . "%' ";
        }
        if (isset($condition["pagination"])) {
            $sql .= "LIMIT " . $condition["pagination"]["size"] . " OFFSET " . ($condition["pagination"]["size"] * $condition["pagination"]["page"]);
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function insertNews($news)
    {
        $stmt = $this->conn->prepare('INSERT INTO news(title, thumbnails,description, content) values(:title, :thumbnails, :description, :content)');
        $result = $stmt->execute($news);
        return $result ? $this->conn->lastInsertId() : -1;
    }
    public function getNewsById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM news WHERE id = :id");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array("id" => $id));
        $rows = $stmt->fetchAll();
        if (isset($rows[0])) {
            return $rows[0];
        } else return null;
    }

    public function editNews($id, $news)
    {
        $news["id"] = $id;
        $stmt = $this->conn->prepare('UPDATE news SET title = :title, thumbnails = :thumbnails, description = :description, content = :content WHERE id = :id');
        return $stmt->execute($news);
    }

    public function deleteById($id)
    {
        $stmt = $this->conn->prepare('DELETE FROM news WHERE id = :id');
        return $stmt->execute(array(
            "id" => $id
        ));
    }
    public function addComment($comment)
    {
        $stmt = $this->conn->prepare('INSERT INTO comment_news(user_id, news_id, content, created_at) values(:user_id, :news_id, :content, :created_at)');
        $result = $stmt->execute($comment);
        return $result ? $this->conn->lastInsertId() : -1;
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
    public function loadMoreCommentsOfNews($newsId, $lastCommentId)
    {
        $sql = "SELECT avatar,content,created_at,first_name, last_name,comment_news.id AS id FROM (comment_news JOIN user ON comment_news.user_id = user.id ) WHERE comment_news.news_id = :newsId AND  comment_news.id < :lastCommentId ORDER BY comment_news.created_at DESC ";
        $sql .= "LIMIT 5";
        $stmt = $this->conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array(
            "newsId" => $newsId,
            "lastCommentId" => $lastCommentId
        ));
        return $stmt->fetchAll();
    }
    public function get6News()
    {
        $stmt = $this->conn->prepare("SELECT * FROM news ORDER BY id LIMIT 6");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getRecentNews($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM news WHERE news.id < :id ORDER BY news.id DESC LIMIT 3");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array(
            "id" => $id
        ));
        return $stmt->fetchAll();
    }
}
