<?php
/**
 * @var stdClass[] $categories Danh sách danh mục (inject từ ProductController::add)
 * @var string[]   $errors     Lỗi validate (inject từ ProductController::save nếu có)
 */
?>
<?php include 'app/views/shares/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3"><i class="fas fa-plus-circle mr-2"></i>Thêm sản phẩm mới</h1>
    <a href="/THMNM_NangCao/Product" class="btn btn-secondary">
        <i class="fas fa-arrow-left mr-1"></i>Quay lại danh sách
    </a>
</div>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="card shadow-sm">
    <div class="card-body">
        <form method="POST" action="/THMNM_NangCao/Product/save" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name"><i class="fas fa-tag mr-1"></i>Tên sản phẩm <span class="text-danger">*</span></label>
                <input type="text" id="name" name="name" class="form-control"
                       value="<?php echo htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                       placeholder="Nhập tên sản phẩm..." required>
            </div>
            <div class="form-group">
                <label for="description"><i class="fas fa-align-left mr-1"></i>Mô tả <span class="text-danger">*</span></label>
                <textarea id="description" name="description" class="form-control" rows="4"
                          placeholder="Nhập mô tả sản phẩm..." required><?php echo htmlspecialchars($_POST['description'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="price"><i class="fas fa-dollar-sign mr-1"></i>Giá (VNĐ) <span class="text-danger">*</span></label>
                    <input type="number" id="price" name="price" class="form-control" step="1000" min="0"
                           value="<?php echo htmlspecialchars($_POST['price'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                           placeholder="0" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="category_id"><i class="fas fa-tags mr-1"></i>Danh mục <span class="text-danger">*</span></label>
                    <select id="category_id" name="category_id" class="form-control" required>
                        <option value="">-- Chọn danh mục --</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->id; ?>"
                                <?php echo (isset($_POST['category_id']) && $_POST['category_id'] == $category->id) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="image"><i class="fas fa-image mr-1"></i>Hình ảnh</label>
                <input type="file" id="image" name="image" class="form-control-file" accept="image/*">
                <small class="text-muted">Định dạng: JPG, JPEG, PNG, GIF, WEBP. Tối đa 10MB.</small>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save mr-1"></i>Thêm sản phẩm
            </button>
            <a href="/THMNM_NangCao/Product" class="btn btn-secondary ml-2">Hủy</a>
        </form>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
