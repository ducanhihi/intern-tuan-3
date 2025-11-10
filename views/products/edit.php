<?php $title = 'Chỉnh sửa sản phẩm'; ?>

<div class="form-header">
    <h1>Chỉnh sửa sản phẩm</h1>
    <a href="index.php" class="btn btn-secondary">← Quay lại</a>
</div>

<?php if (!$product): ?>
    <div class="alert alert-error">Sản phẩm không tồn tại</div>
<?php else: ?>
    <form method="POST" action="index.php?action=update&id=<?php echo $product['id']; ?>" enctype="multipart/form-data"
        class="form">
        <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>">
        </div>

        <div class="form-group">
            <label for="category_id">Danh mục</label>
            <select id="category_id" name="category_id">
                <?php foreach ($categories as $cat): ?>
                    <option value="<?php echo $cat['id']; ?>" <?php echo ($cat['id'] == $product['category_id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($cat['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea id="description" name="description"
                rows="4"><?php echo htmlspecialchars($product['description']); ?></textarea>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="price">Giá *</label>
                <input type="number" id="price" name="price" value="<?php echo $product['price']; ?>">
            </div>

            <div class="form-group">
                <label for="stock">Số lượng *</label>
                <input type="number" id="stock" name="stock" min="0" value="<?php echo $product['stock']; ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="image">Ảnh sản phẩm</label>
            <?php if ($product['image']): ?>
                <div class="current-image">
                    <img src="public/uploads/<?php echo htmlspecialchars($product['image']); ?>" alt="Ảnh hiện tại">
                    <small>Ảnh hiện tại</small>
                </div>
            <?php endif; ?>
            <input type="file" id="image" name="image" accept="image/*">
            <small>Để trống nếu không muốn thay đổi ảnh</small>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
    </form>
<?php endif; ?>