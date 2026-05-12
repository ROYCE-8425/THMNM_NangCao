<?php
/**
 * @var \ProductModel $product
 */
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/THMNM_NangCao/public/css/style.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm">
                <div class="card-header bg-warning">
                    <h4 class="mb-0 text-dark">Sửa sản phẩm #<?php echo $product->getID(); ?></h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="/THMNM_NangCao/Product/edit/<?php echo $product->getID();?>" onsubmit="return validateForm();" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Tên sản phẩm:</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($product->getName(), ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">Mô tả:</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required><?php echo htmlspecialchars($product->getDescription(), ENT_QUOTES, 'UTF-8'); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label fw-bold">Giá:</label>
                            <input type="number" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($product->getPrice(), ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label fw-bold">Hình ảnh sản phẩm:</label>
                            <?php if ($product->getImage()): ?>
                                <div class="mb-2">
                                    <img src="/THMNM_NangCao/public/images/<?php echo htmlspecialchars($product->getImage(), ENT_QUOTES, 'UTF-8'); ?>" alt="Ảnh hiện tại" width="120" class="img-thumbnail">
                                </div>
                            <?php endif; ?>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            <small class="text-muted">Chỉ chọn ảnh nếu bạn muốn thay đổi ảnh hiện tại.</small>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-warning px-4 fw-bold text-dark">Lưu thay đổi</button>
                        <a href="/THMNM_NangCao/Product/list" class="btn btn-secondary ms-2">Quay lại danh sách</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap & Custom JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/THMNM_NangCao/public/js/main.js"></script>
</body>
</html>
