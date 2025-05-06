<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

## 🧰 Requirements

Make sure your environment has the following installed:

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL or compatible database
- Laravel CLI (optional)

---

## ⚙️ Installation Guide

### 1. Clone the Repository

```bash
git clone --branch your-branch-name https://bitbucket.org/your-repository-name.git
cd your-project-folder
```

### 2. Install PHP Dependencies
2. Install PHP Dependencies
```bash
composer install
# Or if needed:
composer update
```

### 3. Install JavaScript Dependencies
```bash
npm install
npm run build

# Or for development:

npm run dev
```

### 4. Configure Environment
Copy the example environment file:
```bash
cp .env.example .env
```

Edit .env and set your app and database credentials:

```bash
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5. Generate Application Key
```bash
php artisan key:generate
```

### 6. Create Storage Symlink
```bash
php artisan storage:link
```

### 7. Run Database Migrations
```bash
php artisan migrate
```

🚀 Run the Application
```bash
php artisan serve
```
Visit your app at http://127.0.0.1:8000
