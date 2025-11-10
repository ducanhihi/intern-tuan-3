<?php
class Product
{
    private $conn;
    private $table = 'products';

    public $id;
    public $name;
    public $description;
    public $price;
    public $stock;
    public $category_id;
    public $image;
    public $created_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }


    public function getAll()
    {
        $query = "SELECT p.*, c.name as category_name 
                  FROM " . $this->table . " p
                  JOIN categories c ON p.category_id = c.id
                  ORDER BY p.create_at DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = "SELECT p.*, c.name as category_name 
                  FROM " . $this->table . " p
                  JOIN categories c ON p.category_id = c.id
                  WHERE p.id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function create($data, $image)
    {
        $query = "INSERT INTO " . $this->table . "
                  (name, description, price, stock, category_id, image)
                  VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            $data['name'],
            $data['description'],
            $data['price'],
            $data['stock'],
            $data['category_id'],
            $image
        ]);
    }

    public function update($id, $data, $image)
    {
        $imageField = "";
        $params = [
            $data['name'],
            $data['description'],
            $data['price'],
            $data['stock'],
            $data['category_id']
        ];

        if ($image) {
            $imageField = ", image = ?";
            $params[] = $image;
        }

        $query = "UPDATE " . $this->table . "
                  SET name = ?, description = ?, price = ?, stock = ?, category_id = ?" . $imageField . "
                  WHERE id = ?";

        $params[] = $id;
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($params);
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }

    public function getCategories()
    {
        $query = "SELECT * FROM categories ORDER BY name ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>