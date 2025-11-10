<?php $title = 'Danh sách sản phẩm'; ?>

<div class="page-header">
    <h1>Danh sách sản phẩm</h1>
    <a href="index.php?action=create" class="btn btn-primary">+ Thêm sản phẩm</a>
</div>

<?php if (empty($products)): ?>
    <div class="empty-state">
        <p>Chưa có sản phẩm nào</p>
    </div>
<?php else: ?>
    <div class="products-grid">
        <?php foreach ($products as $product): ?>
            <div class="product-card">
                <div class="product-image">
                    <?php if ($product['image']): ?>
                        <img src="public/uploads/<?php echo htmlspecialchars($product['image']); ?>"
                            alt="<?php echo htmlspecialchars($product['name']); ?>">
                    <?php else: ?>
                        <div class="placeholder">Không có ảnh</div>
                    <?php endif; ?>
                </div>
                <div class="product-content">
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p class="category"><?php echo htmlspecialchars($product['category_name']); ?></p>
                    <p class="description"><?php echo htmlspecialchars(substr($product['description'], 0, 80)); ?>...</p>
                    <div class="product-meta">
                        <span class="price"><?php echo number_format($product['price'], 0, ',', '.'); ?> VNĐ</span>
                        <span class="stock">Kho: <?php echo $product['stock']; ?></span>
                    </div>
                    <div class="product-actions">
                        <a href="index.php?action=edit&id=<?php echo $product['id']; ?>" class="btn btn-sm btn-warning">Sửa</a>
                        <a href="index.php?action=delete&id=<?php echo $product['id']; ?>" class="btn btn-sm btn-danger"
                            onclick="return confirm('Xóa sản phẩm này?')">Xóa</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>