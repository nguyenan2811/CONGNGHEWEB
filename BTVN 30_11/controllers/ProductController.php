<?php
require_once 'models/Product.php';

class ProductController
{
    public function index()
    {
        $products = Product::all();
        include 'views/products/index.php';
    }

    public function create()
    {
        include 'views/products/create.php';
    }

    public function store()
    {
        $product = new Product();
        $product->name = $_POST['name'];
        $product->price = $_POST['price'];

        $product->save();
        header('Location: index.php');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        include 'views/products/edit.php';
    }

    public function update($data)
    {
        $product = Product::find($data['id']);
        $product->name = $data['name'];
        $product->price = $data['price'];
       
        $product->save();
        header('Location: index.php');
    }

    public function delete($id)
    {
        // Xóa sản phẩm
        $product = Product::find($id);
        $product->delete();
    
        // Đặt lại AUTO_INCREMENT sau khi xóa
        $db = Database::getConnection();
        $stmt = $db->prepare("ALTER TABLE products AUTO_INCREMENT = 1");
        $stmt->execute();
    
        // Chuyển hướng về trang danh sách sản phẩm
        header('Location: index.php');
    }
    
}
?>
