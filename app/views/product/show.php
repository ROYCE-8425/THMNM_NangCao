<?php include 'app/views/shares/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3"><i class="fas fa-box-open mr-2"></i><?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?></h1>
    <a href="/THMNM_NangCao/Product" class="btn btn-secondary">
        <i class="fas fa-arrow-left mr-1"></i>Quay lại danh sách
    </a>
</div>

<div class="card shadow-sm">
    <div class="row no-gutters">
        <?php if (!empty($product->image)): ?>
        <div class="col-md-4">
            <img src="/THMNM_NangCao/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>"
                 alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>"
                 class="img-fluid rounded-left" style="max-height:300px; width:100%; object-fit:cover;">
        </div>
        <div class="col-md-8">
        <?php else: ?>
        <div class="col-md-12">
        <?php endif; ?>
            <div class="card-body">
                <p class="text-muted small mb-1">ID: #<?php echo $product->id; ?></p>
                <h2 class="card-title"><?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?></h2>
                <p class="card-text"><?php echo nl2br(htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8')); ?></p>
                <p class="h4 text-danger font-weight-bold">
                    <?php echo number_format($product->price, 0, ',', '.'); ?> ₫
                </p>
                <hr>
                <div class="mt-3">
                    <a href="/THMNM_NangCao/Product/edit/<?php echo $product->id; ?>" class="btn btn-warning mr-2">
                        <i class="fas fa-edit mr-1"></i>Sửa sản phẩm
                    </a>
                    <a href="/THMNM_NangCao/Product/delete/<?php echo $product->id; ?>" class="btn btn-danger"
                       onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                        <i class="fas fa-trash mr-1"></i>Xóa sản phẩm
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
