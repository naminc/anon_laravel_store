<pre lang="markdown">
# 📦 My Laravel App

[![Laravel](https://img.shields.io/badge/Laravel-10.x-red.svg?logo=laravel)](https://laravel.com/)
[![License](https://img.shields.io/github/license/naminc/my_laravel_app)](LICENSE)
[![PHP](https://img.shields.io/badge/PHP-8.1+-8892be.svg?logo=php)](https://www.php.net/)
[![Build Status](https://img.shields.io/badge/build-passing-brightgreen)]()

Dự án Laravel cấu trúc chuẩn theo mô hình **Repository – Service – Interface**, hỗ trợ quản lý admin panel.

---

## 🚀 Cài đặt nhanh

### 1. Clone dự án từ GitHub

```bash
git clone https://github.com/naminc/my_laravel_app.git
cd my_laravel_app
```

### 2. (Tùy chọn) Nếu code nằm trong thư mục con, di chuyển toàn bộ ra ngoài:

```bash
mv my_laravel_app/* my_laravel_app/.* . 2>/dev/null
rm -rf my_laravel_app
```

### 3. Tạo file `.env` từ mẫu và cấu hình database

```bash
cp .env.example .env
```

Mở file `.env` và sửa phần kết nối cơ sở dữ liệu:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 4. Cài đặt các package bằng Composer

```bash
composer install
```

### 5. Generate application key

```bash
php artisan key:generate
```

### 6. Tạo và seed database

```bash
php artisan migrate
php artisan db:seed
```

### 7. Khởi chạy ứng dụng

```bash
php artisan serve
```

Truy cập tại: [http://localhost:8000](http://localhost:8000)

---

## 🗂 Cấu trúc thư mục theo mô hình RSI

```plaintext
app/
├── Http/
│   └── Controllers/
├── Interfaces/
│   └── CategoryInterface.php
├── Repositories/
│   └── CategoryRepository.php
├── Services/
│   └── CategoryService.php
└── Models/
    └── Category.php
```

---

## ✅ Yêu cầu hệ thống

- PHP >= 8.0
- Composer
- MySQL hoặc MariaDB
- Laravel >= 9.x

---

## 📄 Giấy phép

Phát hành theo giấy phép [MIT](LICENSE)  
© 2025 [naminc](https://github.com/naminc)
</pre>
