# 🎓 Laravel Student ID Generation System

A web-based system built with Laravel that allows students to register, log in, and generate their ID cards. Admins can create, view, delete, and print student ID cards from a centralized dashboard.

---

## 🚀 Features

- Student Registration & Login
- Admin Dashboard
- Create, View, Delete ID Cards
- Print ID Cards
- Authentication & Session Management

---

## 🛠️ Tech Stack

- **Laravel**: 10.x (Laravel Installer 5.15.0)
- **Composer**: v2.8.9
- **Node.js**: v22.16.0
- **Blade Templates** + **Bootstrap** for frontend

---

## 📦 Requirements

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL or other supported DB
- Laravel Installer (`laravel new`)

---

## ⚙️ Installation

```bash
# 1. Clone the repository
git clone https://github.com/zearkushal/LarastudentId.git

# 2. Install PHP dependencies
composer install

# 3. Install Node.js dependencies (if applicable)
npm install && npm run dev

# 4. Copy .env and configure
cp .env.example .env

# 5. Generate application key
php artisan key:generate

# 6. Set your DB credentials in the .env file
# DB_DATABASE=your_db
# DB_USERNAME=your_user
# DB_PASSWORD=your_password

# 7. Run migrations
php artisan migrate

# 8. Start the development server
php artisan serve
