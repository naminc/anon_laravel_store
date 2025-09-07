# 📦 Anon Laravel Store

[![Laravel](https://img.shields.io/badge/Laravel-9.x-red.svg?logo=laravel)](https://laravel.com/)
[![License](https://img.shields.io/github/license/naminc/anon_laravel_store)](LICENSE)
[![PHP](https://img.shields.io/badge/PHP-8.0+-8892be.svg?logo=php)](https://www.php.net/)

A Fashion Shop project built with Laravel, structured following the **Repository – Service – Interface** pattern.

---

## 🚀 Quick Installation

### 1. Clone the project from GitHub

```bash
git clone https://github.com/naminc/anon_laravel_store.git
```

### 2. (Optional) Move code out if it's inside a subfolder:

```bash
mv anon_laravel_store/* anon_laravel_store/.* . 2>/dev/null
rm -rf anon_laravel_store
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

### 5. Generate the app key, run migrations + seeders, and create storage link

```bash
php artisan key:generate
php artisan migrate:fresh --seed
php artisan storage:link
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
- **Role**: `Admin`

## 🛠 Requirements

- PHP >= 8.0
- Composer
- MySQL or MariaDB
- Laravel >= 9.x

## 📄 License

Released under the [MIT License](LICENSE)  
© 2025 [naminc](https://github.com/naminc)

