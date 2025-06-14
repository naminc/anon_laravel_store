# 📦 My Laravel App

[![Laravel](https://img.shields.io/badge/Laravel-9.x-red.svg?logo=laravel)](https://laravel.com/)
[![License](https://img.shields.io/github/license/naminc/my_laravel_app)](LICENSE)
[![PHP](https://img.shields.io/badge/PHP-8.0+-8892be.svg?logo=php)](https://www.php.net/)

Dự án Shop Thời Trang Laravel cấu trúc chuẩn theo mô hình **Repository – Service – Interface**.

---

## 🚀 Cài đặt nhanh

### 1. Clone dự án từ GitHub

```bash
git clone https://github.com/naminc/my_laravel_app.git
cd my_laravel_app
```

### 2. (Tuỳ chọn) Di chuyển code ra ngoài nếu bị nằm trong thư mục con:

```bash
mv my_laravel_app/* my_laravel_app/.* . 2>/dev/null
rm -rf my_laravel_app
```

### 3. Tạo file `.env` từ mẫu và cấu hình DB

```bash
cp .env.example .env
```

Chỉnh trong `.env`:

```env
DB_DATABASE=your_database
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 4. Cài đặt Composer

```bash
composer install
```

### 5. Tạo key và migrate + seed

```bash
php artisan key:generate
php artisan migrate
php artisan db:seed
```

### 6. Chạy server

```bash
php artisan serve
```

Truy cập tại [http://localhost:8000](http://localhost:8000)

---

## 📁 Cấu trúc thư mục (RSI)

```
app/
├── Http/Controllers/
├── Repositories/
├── Services/
└── Models/
```

---

## 🛠 Yêu cầu

- PHP >= 8.0
- Composer
- Laravel >= 9.x
