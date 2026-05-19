<?php
/**
 * @var stdClass  $category Danh mục cần sửa (inject từ CategoryController::edit)
 * @var string[]  $errors   Lỗi validate (inject nếu có)
 */
?>
<?php include 'app/views/shares/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3"><i class="fas fa-edit mr-2"></i>Sửa danh mục</h1>
    <a href="/THMNM_NangCao/Category" class="btn btn-secondary">
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
        <form method="POST" action="/THMNM_NangCao/Category/update">
            <input type="hidden" name="id" value="<?php echo $category->id; ?>">
            <div class="form-group">
                <label for="name"><i class="fas fa-tag mr-1"></i>Tên danh mục <span class="text-danger">*</span></label>
                <input type="text" id="name" name="name" class="form-control"
                       value="<?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            <div class="form-group">
                <label for="description"><i class="fas fa-align-left mr-1"></i>Mô tả</label>
                <textarea id="description" name="description" class="form-control" rows="3"><?php
                    echo htmlspecialchars($category->description ?? '', ENT_QUOTES, 'UTF-8');
                ?></textarea>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save mr-1"></i>Lưu thay đổi
            </button>
            <a href="/THMNM_NangCao/Category" class="btn btn-secondary ml-2">Hủy</a>
        </form>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
