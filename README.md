# Intern Tuần 3

> Dự án tuần 3 của khoá internship – phần frontend & backend nhỏ được triển khai bằng PHP, CSS, JavaScript.

## Mô tả
Repository này chứa mã nguồn của bài thực hành tuần 3, gồm:
- Thư mục `config/`: cấu hình kết nối, môi trường.
- Thư mục `controllers/`: các class/controller xử lý logic chính.
- Thư mục `models/`: các class/model DB hoặc business logic.
- Thư mục `public/`: tài nguyên công khai như CSS, JavaScript, hình ảnh.
- Thư mục `views/`: các file giao diện (templates, pages).
- File `index.php`: điểm vào (entry point) của ứng dụng.

## Công nghệ sử dụng
- PHP (chủ đạo)  
- CSS để tạo giao diện cơ bản  
- JavaScript để thêm tương tác trên frontend  

## Cài đặt & chạy
1. Clone repository:
   ```bash
   git clone https://github.com/ducanhihi/intern-tuan-3.git
Cấu hình môi trường:

Sao chép thư mục config/ hoặc file mẫu (nếu có) và sửa thông số DB, host, user, pass.

Thiết lập database: (nếu có script/migration)

Import file SQL hoặc tạo các bảng theo models/.

Trỏ server Web (Apache/Nginx) về thư mục public/ hoặc cấu hình index.php là entry.

Mở trình duyệt và truy cập http://localhost/… (tuỳ cấu hình) để xem ứng dụng.

Cấu trúc thư mục
csharp
Sao chép mã
intern-tuan-3/
│
├── config/       # Cấu hình ứng dụng
├── controllers/  # Xử lý logic chính
├── models/       # Đối tượng business, mô hình dữ liệu
├── public/       # CSS, JS, hình ảnh, tài nguyên công khai
├── views/        # Giao diện người dùng
└── index.php     # Entry point
Hướng dẫn đóng góp
