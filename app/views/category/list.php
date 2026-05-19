<?php
/**
 * @var stdClass[] $categories Danh sách danh mục (inject từ CategoryController::index)
 */
?>
<?php include 'app/views/shares/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3"><i class="fas fa-tags mr-2"></i>Danh sách danh mục</h1>
    <a href="/THMNM_NangCao/Category/add" class="btn btn-success">
        <i class="fas fa-folder-plus mr-1"></i>Thêm danh mục mới
    </a>
</div>

<?php if (empty($categories)): ?>
    <div class="alert alert-info">Chưa có danh mục nào. <a href="/THMNM_NangCao/Category/add">Thêm ngay!</a></div>
<?php else: ?>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Tên danh mục</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
            <tr>
                <td><?php echo $category->id; ?></td>
                <td class="font-weight-bold">
                    <i class="fas fa-tag mr-1 text-primary"></i>
                    <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                </td>
                <td><?php echo htmlspecialchars($category->description ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                <td nowrap>
                    <a href="/THMNM_NangCao/Category/edit/<?php echo $category->id; ?>" class="btn btn-sm btn-warning mr-1">
                        <i class="fas fa-edit"></i> Sửa
                    </a>
                    <a href="/THMNM_NangCao/Category/delete/<?php echo $category->id; ?>" class="btn btn-sm btn-danger"
                       onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này? Tất cả sản phẩm thuộc danh mục cũng sẽ bị xóa!');">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>

<?php include 'app/views/shares/footer.php'; ?>
