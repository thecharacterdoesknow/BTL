<?php
class ProductModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllProducts($pagination = null)
    {

        $sql = "SELECT *,product.id as id, unit.title as unit_title FROM (product JOIN unit ON product.unit_id = unit.id)";
        if (isset($pagination)) {
            $sql .= " LIMIT " . $pagination["size"] . " OFFSET " . ($pagination["size"] * $pagination["page"]);
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $products = $stmt->fetchAll();
        for ($i = 0; $i < sizeof($products); $i++) {
            $stmt = $this->conn->prepare("SELECT id, title FROM (product_category JOIN category ON product_category.category_id = category.id) WHERE product_id = :productId");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute(array(
                "productId" => $products[$i]["id"]
            ));
            $products[$i]["categories"] = $stmt->fetchAll();
        }
        return $products;
    }
    public function getAllProductsShopPage($condition)
    {
        $sql = "SELECT * FROM product ";
        if (isset($condition["categoryId"]) && $condition["categoryId"] != "") {
            $sql .= "WHERE id IN (SELECT product_id FROM product_category WHERE category_id = " . $condition["categoryId"] . ") ";
            if (isset($condition["q"]) && $condition["q"] != "") {
                $sql .= "AND (name LIKE '%" . $condition["q"] . "%' OR description LIKE '%" . $condition["q"] . "%') ";
            }
        } else {
            if (isset($condition["q"]) && $condition["q"] != "") {
                $sql .= "WHERE name LIKE '%" . $condition["q"] . "%' OR description LIKE '%" . $condition["q"] . "%' ";
            }
        }
        if (isset($condition["sort"]) && $condition["sort"] != 'none'){
            $sql .= "ORDER BY ". $condition["sort"] ." ". $condition["order"] . " ";
        }
        if (isset($condition["pagination"])) {
            $sql .= "LIMIT " . $condition["pagination"]["size"] . " OFFSET " . ($condition["pagination"]["size"] * $condition["pagination"]["page"]);
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $products = $stmt->fetchAll();
        for ($i = 0; $i < sizeof($products); $i++) {
            $stmt = $this->conn->prepare("SELECT id, title FROM (product_category JOIN category ON product_category.category_id = category.id) WHERE product_id = :productId");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute(array(
                "productId" => $products[$i]["id"]
            ));
            $products[$i]["categories"] = $stmt->fetchAll();
        }
        return $products;
    }
    public function insertNewProducts($product)
    {
        $product_images = $product["product_images"];
        unset($product["product_images"]);
        $categories = $product["categories"];
        unset($product["categories"]);

        $stmt = $this->conn->prepare('INSERT INTO product(name,thumbnails,description,unit_id,price,quantity) values(:name,:thumbnails,:description,:unit_id,:price,:quantity)');
        $result = $stmt->execute($product);
        if (!$result) return false;

        $productId = $this->conn->lastInsertId();
        if ($product_images != "") {
            $imageUrls = explode(":_:_:", $product_images);
            $values = [];
            foreach ($imageUrls as $url) {
                array_push($values, $productId . ",'" . $url . "'");
            }
            $values = "values(" . join("),(", $values) . ")";
            $sqlInsertImage = 'INSERT INTO product_image(product_id,image_url) ' . $values;
            $stmt = $this->conn->prepare($sqlInsertImage);
            $result = $stmt->execute();
        }
        $values = [];
        if (sizeof($categories) > 0) {
            foreach ($categories as $categoryId) {
                array_push($values, $productId . "," . $categoryId);
            }
            $values = "values(" . join("),(", $values) . ")";
            $sqlInsertCategories = 'INSERT INTO product_category(product_id,category_id) ' . $values;
            $stmt = $this->conn->prepare($sqlInsertCategories);
            $result = $stmt->execute();
        }
        return $result;
    }

    // Lay tat ca cac category
    public function getAllCategoryHomeCus()
    {

        // $stmt = $this->conn->prepare("
        // SELECT product.*,product_category.*,category.*
        // FROM product_category
        // INNER JOIN product on  product_category.product_id = product.id
        // LEFT JOIN  category on product_category.category_id = category.id
        // ");

        // $stmt->setFetchMode(PDO::FETCH_ASSOC);
        // $stmt->execute();

        // $products = $stmt->fetchAll();

        // return $products;

        $stmt = $this->conn->prepare("SELECT * FROM product ORDER BY id LIMIT 12");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $products = $stmt->fetchAll();
        for ($i = 0; $i < sizeof($products); $i++) {
            $stmt = $this->conn->prepare("SELECT * FROM (product_category JOIN category ON product_category.category_id = category.id) WHERE product_id = :productId");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute(array(
                "productId" => $products[$i]["id"]
            ));
            $products[$i]["categories"] = $stmt->fetchAll();
        }
        return $products;
    }

    public function getNewCategoryHome()
    {
        $stmt = $this->conn->prepare("SELECT * FROM product ORDER BY id DESC LIMIT 12");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $products = $stmt->fetchAll();
        for ($i = 0; $i < sizeof($products); $i++) {
            $stmt = $this->conn->prepare("SELECT * FROM (product_category JOIN category ON product_category.category_id = category.id) WHERE product_id = :productId");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute(array(
                "productId" => $products[$i]["id"]
            ));
            $products[$i]["categories"] = $stmt->fetchAll();
        }
        return $products;
    }

    public function loadTittleImgCate()
    {
        $stmt = $this->conn->prepare("SELECT * FROM category");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $products = $stmt->fetchAll();
        return $products;
    }

    public function getProductById($id)
    {
        $stmt = $this->conn->prepare("SELECT *,product.id as id, unit.title as unit_title, unit.id as unit_id FROM (product JOIN unit ON product.unit_id = unit.id) WHERE product.id = :id");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array("id" => $id));
        $rows = $stmt->fetchAll();
        if (isset($rows[0])) {
            $product = $rows[0];
            $stmt = $this->conn->prepare("SELECT id, title, thumbnails FROM (product_category JOIN category ON product_category.category_id = category.id) WHERE product_id = :productId");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute(array(
                "productId" => $product["id"]
            ));
            $product["categories"] = $stmt->fetchAll();

            $stmt = $this->conn->prepare("SELECT image_url FROM product_image WHERE product_id = :productId");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute(array(
                "productId" => $product["id"]
            ));
            $product["images"] = $stmt->fetchAll();
            return $product;
        } else return null;
    }

    public function updateProducts($id, $product)
    {
        $unit["id"] = $id;
        $stmt = $this->conn->prepare('UPDATE product SET name = :name,thumbnails = :thumbnails,description = :description,unit_id = :unit_id, price = :price, quantity = :quantity WHERE id = :id');
        $result =  $stmt->execute(array(
            "name" => $product["name"],
            "thumbnails" => $product["thumbnails"],
            "description" => $product["description"],
            "unit_id" => $product["unit_id"],
            "price" => $product["price"],
            "quantity" => $product["quantity"],
            "id" => $id
        ));

        $stmt = $this->conn->prepare('DELETE FROM product_category WHERE product_id = :id');
        $result = $stmt->execute(array(
            "id" => $id
        ));
        $stmt = $this->conn->prepare('DELETE FROM product_image WHERE product_id = :id');
        $result = $stmt->execute(array(
            "id" => $id
        ));

        if ($product["product_images"] != '') {
            $imageUrls = explode(":_:_:", trim($product["product_images"]));
            $values = [];
            foreach ($imageUrls as $url) {
                array_push($values, $id . ",'" . $url . "'");
            }
            $values = "values(" . join("),(", $values) . ")";
            $sqlInsertImage = 'INSERT INTO product_image(product_id,image_url) ' . $values;
            $stmt = $this->conn->prepare($sqlInsertImage);
            $result = $stmt->execute();
        }
        if (sizeof($product["categories"]) > 0) {
            $values = [];
            foreach ($product["categories"] as $categoryId) {
                array_push($values, $id . "," . $categoryId);
            }
            $values = "values(" . join("),(", $values) . ")";
            $sqlInsertCategories = 'INSERT INTO product_category(product_id,category_id) ' . $values;
            $stmt = $this->conn->prepare($sqlInsertCategories);
            $result = $stmt->execute();
        }
        return $result;
    }

    public function deleteById($id)
    {
        $stmt = $this->conn->prepare('DELETE FROM product_image WHERE product_id = :id');
        $stmt->execute(array(
            "id" => $id
        ));
        $stmt = $this->conn->prepare('DELETE FROM product_category WHERE product_id = :id');
        $stmt->execute(array(
            "id" => $id
        ));
        $stmt = $this->conn->prepare('DELETE FROM product WHERE id = :id');
        $stmt->execute(array(
            "id" => $id
        ));
    }
    public function getProductForDetail($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM product WHERE product.id = :id");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array(
            "id" => $id
        ));
        $rows = $stmt->fetchAll();
        if (isset($rows[0])) {
            $product = $rows[0];
            $stmt = $this->conn->prepare("SELECT image_url FROM product_image WHERE product_id = :productId");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute(array(
                "productId" => $product["id"]
            ));
            $product["images"] = $stmt->fetchAll();

            $stmt = $this->conn->prepare("SELECT title FROM unit WHERE unit.id = :unitId");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute(array(
                "unitId" => $product["unit_id"]
            ));
            $rows = $stmt->fetchAll();
            if (isset($rows[0])) {
                $product["unit"] = $rows[0];
            }
            return $product;
        } else return null;
    }
    public function addToCart($user_id, $product_id, $quantity)
    {
        $stmt = $this->conn->prepare("INSERT INTO product_cart(user_id, product_id, quantity) VALUES(:user_id, :product_id, :quantity) ON DUPLICATE KEY UPDATE quantity = :quantity + quantity");
        return $stmt->execute(array(
            "product_id" => $product_id,
            "quantity" => $quantity,
            "user_id" => $user_id
        ));
    }
    public function getCurrentProduct($product_id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM (product JOIN product_cart ON product.id=product_cart.product_id) WHERE product.id = :id");
        $stmt->execute(array(
            "id" => $product_id,
        ));
        return $stmt->fetchAll();
    }
    public function getRelatedProduct($id)
    {
        $stmt = $this->conn->prepare("SELECT *,product.id as re_productId FROM product JOIN unit ON product.unit_id=unit.id WHERE product.id IN (SELECT product_id FROM product_category WHERE category_id IN (SELECT category_id FROM product_category WHERE product_category.product_id = :id) AND product_id!=:proId) LIMIT 6");
        $stmt->execute(array(
            "proId" => $id,
            "id" => $id
        ));
        return $stmt->fetchAll();
    }
    public function getAllProductCategory($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM category WHERE category.id IN (SELECT category_id FROM product_category WHERE product_id =:proId)");
        $stmt->execute(array(
            "proId" => $id,
        ));
        return $stmt->fetchAll();
    }
    public function checkInStock($product_id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM product WHERE product.id = :id");
        $stmt->execute(array(
            "id" => $product_id,
        ));
        $rows = $stmt->fetchAll();
        if (isset($rows[0])) {
            return $rows[0];
        } else return null;
    }
    public function checkQuantityCart($product_id, $user_id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM product_cart WHERE product_cart.product_id = :id AND product_cart.user_id=:userId");
        $stmt->execute(array(
            "id" => $product_id,
            "userId" => $user_id
        ));
        $rows = $stmt->fetchAll();
        if (isset($rows[0])) {
            return $rows[0];
        } else return null;
    }

    public function addComment($comment)
    {
        $stmt = $this->conn->prepare('INSERT INTO comment_product(user_id, product_id, content, created_at) values(:user_id, :product_id, :content, :created_at)');
        $result = $stmt->execute($comment);
        return $result ? $this->conn->lastInsertId() : -1;
    }

    public function loadCommentsOfProduct($productId, $pagination)
    {
        $sql = "SELECT avatar,content,created_at,first_name, last_name,comment_product.id AS id FROM (comment_product JOIN user ON comment_product.user_id = user.id ) WHERE comment_product.product_id = :productId ORDER BY comment_product.created_at DESC ";
        if (isset($pagination)) {
            $sql .= "LIMIT " . $pagination["size"] . " OFFSET " . ($pagination["size"] * $pagination["page"]);
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array("productId" => $productId));
        return $stmt->fetchAll();
    }

    public function loadMoreCommentsOfProduct($productId, $lastCommentId)
    {
        $sql = "SELECT avatar,content,created_at,first_name, last_name,comment_product.id AS id FROM (comment_product JOIN user ON comment_product.user_id = user.id ) WHERE comment_product.product_id = :productId AND  comment_product.id < :lastCommentId ORDER BY comment_product.created_at DESC ";
        $sql .= "LIMIT 5";
        $stmt = $this->conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array(
            "productId" => $productId,
            "lastCommentId" => $lastCommentId
        ));
        return $stmt->fetchAll();
    }

    public function loadRatesOfProduct($productId, $pagination)
    {
        $sql = "SELECT avatar,content,created_at,first_name, last_name,rate,rate_product.id AS id FROM (rate_product JOIN user ON rate_product.user_id = user.id ) WHERE rate_product.product_id = :productId ORDER BY rate_product.created_at DESC ";
        if (isset($pagination)) {
            $sql .= "LIMIT " . $pagination["size"] . " OFFSET " . ($pagination["size"] * $pagination["page"]);
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array("productId" => $productId));
        return $stmt->fetchAll();
    }

    public function addRate($rate)
    {
        $stmt = $this->conn->prepare('INSERT INTO rate_product(user_id, product_id, content,rate, created_at) values(:user_id, :product_id, :content,:rate, :created_at)');
        $result = $stmt->execute($rate);
        if ($result) {
            $stmt = $this->conn->prepare('UPDATE product set rating = (rating * product.num_rate + :rate)/(num_rate+1), num_rate = num_rate + 1 where product.id = :productId');
            $result = $stmt->execute(array(
                "rate" => $rate["rate"],
                "productId" => $rate["product_id"]
            ));
            return $this->conn->lastInsertId();
        } else return -1;
    }

    public function loadMoreRatesOfProduct($productId, $lastRateId)
    {
        $sql = "SELECT avatar,content,created_at,first_name, last_name,rate_product.id AS id, rate FROM (rate_product JOIN user ON rate_product.user_id = user.id ) WHERE rate_product.product_id = :productId AND  rate_product.id < :lastRateId ORDER BY rate_product.created_at DESC ";
        $sql .= "LIMIT 5";
        $stmt = $this->conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array(
            "productId" => $productId,
            "lastRateId" => $lastRateId
        ));
        return $stmt->fetchAll();
    }

    public function getTopRating($condition)
    {
        $sql = "SELECT * FROM product ORDER BY rating DESC ";
        if (isset($condition["pagination"])) {
            $pagination = $condition["pagination"];
            $sql .= "LIMIT " . $pagination["size"] . " OFFSET " . ($pagination["size"] * $pagination["page"]);
        } else {
            $sql .= "LIMIT 3";
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
