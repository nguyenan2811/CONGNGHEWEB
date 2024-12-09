<?php
require_once 'config/database.php';

class Product
{
    public $id;
    public $name;
    public $price;

    public static function all()
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM products");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Product');
    }

    public static function find($id)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchObject('Product');
    }

    public function save()
    {
        $db = Database::getConnection();
        if ($this->id) {
            $stmt = $db->prepare("UPDATE products SET name = :name, price = :price WHERE id = :id");
            $stmt->execute([
                'name' => $this->name,
                'price' => $this->price,

                'id' => $this->id
            ]);
        } else {
            $stmt = $db->prepare("INSERT INTO products (name, price) VALUES (:name, :price)");
            $stmt->execute([
                'name' => $this->name,
                'price' => $this->price,
    
            ]);
            $this->id = $db->lastInsertId();
        }
    }

    public function delete()
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM products WHERE id = :id");
        $stmt->execute(['id' => $this->id]);
    }
}
?>
