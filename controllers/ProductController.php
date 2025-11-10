<?php
require_once 'models/Product.php';
require_once 'config/database.php';

class ProductController
{
    private $db;
    private $product;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
        $this->product = new Product($this->db);
    }

    // xem list san pham
    public function index()
    {
        global $products;
        $products = $this->product->getAll();
    }

    // them san pham moi
    public function create()
    {
        global $categories;
        $categories = $this->product->getCategories();
    }

    // luu san phaam moi
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name'] ?? '',
                'description' => $_POST['description'] ?? '',
                'price' => $_POST['price'] ?? 0,
                'stock' => $_POST['stock'] ?? 0,
                'category_id' => $_POST['category_id'] ?? 1
            ];

            $image = $this->uploadImage();

            if ($this->product->create($data, $image)) {
                header('Location: index.php?action=index&msg=Thêm sản phẩm thành công');
            } else {
                global $categories, $error;
                $categories = $this->product->getCategories();
                $error = "Lỗi khi thêm sản phẩm";
            }
        }
    }

    // edit form
    public function edit($id)
    {
        global $product, $categories;
        $product = $this->product->getById($id);
        $categories = $this->product->getCategories();
    }

    // Update product
    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name'] ?? '',
                'description' => $_POST['description'] ?? '',
                'price' => $_POST['price'] ?? 0,
                'stock' => $_POST['stock'] ?? 0,
                'category_id' => $_POST['category_id'] ?? 1
            ];

            $image = $this->uploadImage();

            if ($this->product->update($id, $data, image: $image)) {
                header("Location: index.php?action=edit&id=$id&msg=Cập nhật thành công");
            } else {
                global $product, $categories, $error;
                $product = $this->product->getById($id);
                $categories = $this->product->getCategories();
                $error = "Lỗi khi cập nhật sản phẩm";
            }
        }
    }

    // xoa san pham
    public function delete($id)
    {
        if ($this->product->delete($id)) {
            header('Location: index.php?action=index&msg=Xóa sản phẩm thành công');
        } else {
            header('Location: index.php?action=index&msg=Lỗi khi xóa sản phẩm');
        }
    }

    // Upload image
    private function uploadImage()
    {
        if (!isset($_FILES['image']) || $_FILES['image']['error'] != 0) {
            return null;
        }
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $file = $_FILES['image'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed)) {
            return null;
        }

        if ($file['size'] > 5 * 1024 * 1024) {
            return null;
        }

        $filename = uniqid() . '.' . $ext;
        $upload_dir = 'public/uploads/';

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        if (move_uploaded_file($file['tmp_name'], $upload_dir . $filename)) {
            return $filename;
        }
        return null;
    }
}
?>