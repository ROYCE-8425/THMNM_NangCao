<?php
/**
 * @var \ProductModel[] $products
 */
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <!-- Thêm Bootstrap 5 từ CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/THMNM_NangCao/public/css/style.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container-fluid px-5 mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Danh sách sản phẩm</h1>
        <a href="/THMNM_NangCao/Product/add" class="btn btn-success">Thêm sản phẩm mới</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th width="5%">ID</th>
                        <th width="15%">Hình ảnh</th>
                        <th width="20%">Tên sản phẩm</th>
                        <th width="30%">Mô tả</th>
                        <th width="15%">Giá</th>
                        <th width="15%" class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($products)): ?>
                        <tr>
                            <td colspan="6" class="text-center py-4">Chưa có sản phẩm nào.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo $product->getID(); ?></td>
                            <td>
                                <?php if ($product->getImage()): ?>
                                    <img src="/THMNM_NangCao/public/images/<?php echo htmlspecialchars($product->getImage(), ENT_QUOTES, 'UTF-8'); ?>" alt="Ảnh" width="80" class="img-thumbnail">
                                <?php else: ?>
                                    <span class="text-muted">Chưa có ảnh</span>
                                <?php endif; ?>
                            </td>
                            <td class="fw-bold"><?php echo htmlspecialchars($product->getName(), ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($product->getDescription(), ENT_QUOTES, 'UTF-8'); ?></td>
                            <td class="text-danger fw-bold"><?php echo number_format($product->getPrice(), 0, ',', '.'); ?> đ</td>
                            <td class="text-center">
                                <a href="/THMNM_NangCao/Product/edit/<?php echo $product->getID();?>" class="btn btn-sm btn-primary">Sửa</a>
                                <a href="/THMNM_NangCao/Product/delete/<?php echo $product->getID(); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Thêm Bootstrap Javascript (Tuỳ chọn) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script src="/THMNM_NangCao/public/js/main.js"></script>
</body>
</html>
