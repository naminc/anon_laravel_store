# 📦 My Laravel App

[![Laravel](https://img.shields.io/badge/Laravel-9.x-red.svg?logo=laravel)](https://laravel.com/)
[![License](https://img.shields.io/github/license/naminc/my_laravel_app)](LICENSE)
[![PHP](https://img.shields.io/badge/PHP-8.0+-8892be.svg?logo=php)](https://www.php.net/)

A Fashion Shop project built with Laravel, structured following the **Repository – Service – Interface** pattern.

---

## 🚀 Quick Installation

### 1. Clone the project from GitHub

```bash
git clone https://github.com/naminc/my_laravel_app.git
```

### 2. (Optional) Move code out if it's inside a subfolder:

```bash
mv my_laravel_app/* my_laravel_app/.* . 2>/dev/null
rm -rf my_laravel_app
```

### 3. Create the `.env` file from the example and configure DB

```bash
cp .env.example .env
```

Edit the `.env` file:

```env
DB_DATABASE=your_database
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 4. Install dependencies via Composer

```bash
composer install
```

### 5. Generate the app key and run migrations + seeders

```bash
php artisan key:generate
php artisan migrate
php artisan db:seed
```

### 6. Start the development server

```bash
php artisan serve
```

Visit the app at [http://localhost:8000](http://localhost:8000)

---

## 📁 Project Structure (RSI)

```
app/
├── Http/Controllers/
├── Repositories/
├── Services/
└── Models/
```

---

## 🔐 Data Test Account

- **Email**: `admin@naminc.dev`  
- **Password**: `123456`

## 🛠 Requirements

- PHP >= 8.0
- Composer
- MySQL or MariaDB
- Laravel >= 9.x

## 📄 License

Released under the [MIT License](LICENSE)  
© 2025 [naminc](https://github.com/naminc)

