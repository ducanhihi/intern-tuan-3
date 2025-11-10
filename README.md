# Intern Tuan 3 Project

Đây là dự án thực hành PHP + MySQL cho khoá thực tập tuần 3.

## Mô tả

Dự án này bao gồm:

- Quản lý sản phẩm (thêm, sửa, xoá, hiển thị danh sách)
- Giao diện web cơ bản với HTML, CSS, JS
- Kết nối database MySQL

## Yêu cầu

- PHP >= 7.4
- MySQL
- Trình duyệt web hiện đại (Chrome, Firefox, Edge...)

## Cài đặt

1. **Clone repository**

```bash
git clone https://github.com/ducanhihi/intern-tuan-3.git
cd intern-tuan-3
Tạo database

Mở MySQL, chạy file SQL có sẵn trong thư mục database (ví dụ database.sql) để tạo database và bảng:
-- Mở MySQL và chạy:
source path/to/database.sql;
Cấu hình kết nối database

Mở file config/database.php và chỉnh sửa thông tin kết nối:
<?php
class Database {
    private $host = "localhost";
    private $db_name = "ten_database";
    private $username = "root";
    private $password = "";

    public function connect() {
        // ...
    }
}
Chạy dự án

Mở trình duyệt, truy cập vào đường dẫn dự án (ví dụ http://localhost/intern-tuan-3/index.php)

Cấu trúc thư mục
intern-tuan-3/
│
├─ config/          # File cấu hình database
├─ models/          # Các model PHP
├─ controllers/     # Các controller PHP
├─ views/           # Giao diện HTML
├─ database/        # File SQL tạo database
└─ index.php        # Entry point
Sử dụng
Thêm, sửa, xoá sản phẩm
Xem danh sách sản phẩm
Tìm kiếm sản phẩm theo yêu cầu

Lưu ý
Đảm bảo MySQL đang chạy
Chỉnh sửa config/database.php nếu tên database hoặc thông tin đăng nhập khác
