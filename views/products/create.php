<?php $title = 'Thêm sản phẩm'; ?>

<div class="form-header">
    <h1>Thêm sản phẩm mới</h1>
    <a href="index.php" class="btn btn-secondary">← Quay lại</a>
</div>

<form method="POST" action="index.php?action=store" enctype="multipart/form-data" class="form">
    <div class="form-group">
        <label for="name">Tên sản phẩm *</label>
        <input type="text" id="name" name="name">
    </div>

    <div class="form-group">
        <label for="category_id">Danh mục *</label>
        <select id="category_id" name="category_id">
            <option value="">Chọn danh mục</option>
            <?php foreach ($categories as $cat): ?>
                <option value="<?php echo $cat['id']; ?>"><?php echo htmlspecialchars($cat['name']); ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea id="description" name="description" rows="4"></textarea>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="price">Giá *</label>
            <input type="number" id="price" name="price">
        </div>

        <div class="form-group">
            <label for="stock">Số lượng *</label>
            <input type="number" id="stock" name="stock" min="0">
        </div>
    </div>

    <div class="form-group">
        <label for="image">Ảnh sản phẩm</label>
        <input type="file" id="image" name="image" accept="image/*">
        <small>Chỉ chấp nhận: JPG, PNG, GIF. Dung lượng tối đa: 5MB</small>
    </div>

    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
</form>