<?php
/**
 * @var stdClass[] $products Danh sách sản phẩm (inject từ ProductController::index)
 */
?>
<?php include 'app/views/shares/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3"><i class="fas fa-box mr-2"></i>Danh sách sản phẩm</h1>
    <a href="/THMNM_NangCao/Product/add" class="btn btn-success">
        <i class="fas fa-plus-circle mr-1"></i>Thêm sản phẩm mới
    </a>
</div>

<?php if (empty($products)): ?>
    <div class="alert alert-info">Chưa có sản phẩm nào. <a href="/THMNM_NangCao/Product/add">Thêm ngay!</a></div>
<?php else: ?>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Mô tả</th>
                <th>Giá (VNĐ)</th>
                <th>Danh mục</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product->id; ?></td>
                <td>
                    <?php if (!empty($product->image)): ?>
                        <img src="/THMNM_NangCao/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>"
                             alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>"
                             style="width:80px; height:60px; object-fit:cover; border-radius:4px;">
                    <?php else: ?>
                        <span class="text-muted small"><i class="fas fa-image"></i> Chưa có ảnh</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="/THMNM_NangCao/Product/show/<?php echo $product->id; ?>" class="font-weight-bold">
                        <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                    </a>
                </td>
                <td><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></td>
                <td class="text-right font-weight-bold text-danger">
                    <?php echo number_format($product->price, 0, ',', '.'); ?> ₫
                </td>
                <td>
                    <span class="badge badge-primary">
                        <?php echo htmlspecialchars($product->category_name ?? 'Chưa phân loại', ENT_QUOTES, 'UTF-8'); ?>
                    </span>
                </td>
                <td nowrap>
                    <a href="/THMNM_NangCao/Product/edit/<?php echo $product->id; ?>" class="btn btn-sm btn-warning mr-1">
                        <i class="fas fa-edit"></i> Sửa
                    </a>
                    <a href="/THMNM_NangCao/Product/delete/<?php echo $product->id; ?>" class="btn btn-sm btn-danger"
                       onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
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
