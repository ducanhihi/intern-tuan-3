<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'DUCANHIHI'; ?></title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <a href="index.php">DUCANHIHI</a>
                </div>
                <nav class="nav">
                    <ul class="nav-list">
                        <li><a href="index.php" class="nav-link">Danh sách sản phẩm</a></li>
                        <li><a href="index.php?action=create" class="nav-link">Thêm sản phẩm</a></li>
                        <li><a href="#" onclick="toggleTheme(event)" class="nav-link">Chế độ</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main class="main">
        <div class="container">
            <?php if (isset($_GET['msg'])): ?>
                <div class="alert alert-success">
                    <?php echo htmlspecialchars($_GET['msg']); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($error)): ?>
                <div class="alert alert-error">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <?php include $view; ?>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Dao Duc Anh</p>
        </div>
    </footer>

    <script src="public/js/script.js"></script>
</body>

</html>