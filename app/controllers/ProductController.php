<?php
require_once 'app/models/ProductModel.php';
class ProductController
{
private $products = [];
public function __construct()
{
// Giả sử chúng ta lưu trữ sản phẩm trong session để giữ lại khi làm mới trang
session_start();
if (isset($_SESSION['products'])) {
$this->products = $_SESSION['products'];
} else {
// Thêm sẵn 2 sản phẩm mặc định nếu danh sách trống
$this->products = [
new ProductModel(1, 'Sản phẩm 1', 'Mô tả sản phẩm 1 rất hay', 150000, 'default1.jpg'),
new ProductModel(2, 'Sản phẩm 2', 'Mô tả sản phẩm 2 tuyệt vời', 250000, 'default2.jpg')
];
$_SESSION['products'] = $this->products;
}
}
public function index()
{
$this->list();
}
public function list()
{
// Hiển thị danh sách sản phẩm
$products = $this->products;
include 'app/views/product/list.php';
}
public function add()
{
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
// Kiểm tra tên sản phẩm
if (empty($name)) {
$errors[] = 'Tên sản phẩm là bắt buộc.';
} elseif (strlen($name) < 10 || strlen($name) > 100) {
$errors[] = 'Tên sản phẩm phải có từ 10 đến 100 ký tự.';
}
// Kiểm tra giá
if (!is_numeric($price) || $price <= 0) {
$errors[] = 'Giá phải là một số dương lớn hơn 0.';
}
if (empty($errors)) {
$imageName = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $imageName = time() . '_' . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], 'public/images/' . $imageName);
}

$id = count($this->products) + 1;
$product = new ProductModel($id, $name, $description, $price, $imageName);
$this->products[] = $product;
$_SESSION['products'] = $this->products;
header('Location: /THMNM_NangCao/Product/list');
exit();
}
}
include 'app/views/product/add.php';
}
public function edit($id)
{
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
foreach ($this->products as $key => $product) {
if ($product->getID() == $id) {
$this->products[$key]->setName($_POST['name']);
$this->products[$key]->setDescription($_POST['description']);
$this->products[$key]->setPrice($_POST['price']);

// Cập nhật ảnh nếu có upload phân mới
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $imageName = time() . '_' . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], 'public/images/' . $imageName);
    // Có thể code thêm logic xóa file ảnh cũ ở server nếu cần
    $this->products[$key]->setImage($imageName);
}

break;
}
}
$_SESSION['products'] = $this->products;
header('Location: /THMNM_NangCao/Product/list');
exit();
}
foreach ($this->products as $product) {
if ($product->getID() == $id) {
// Provide the matched product to the view.
$currentProduct = $product;
$product = $currentProduct;
include 'app/views/product/edit.php';
return;
}
}
die('Product not found');
}
public function delete($id)
{
foreach ($this->products as $key => $product) {
if ($product->getID() == $id) {
unset($this->products[$key]);
break;
}
}
$this->products = array_values($this->products);
$_SESSION['products'] = $this->products;
header('Location: /THMNM_NangCao/Product/list');
exit();
}
}
?>
