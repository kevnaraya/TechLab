# TechLab - Beta 1.0
This project is a production-ready monolithic e-commerce automation platform, developed using PHP (Laravel, Blade), JavaScript, Tailwind CSS, and MySQL as the relational database. It is containerized with Docker for streamlined deployment and scalability. Designed to automate critical sales and operational workflows, it empowers businesses to boost revenue while focusing on growth and customer experience.

# Project Setup Guide

## Prerequisites

Before getting started, ensure your system meets the following requirements:

- **PHP**: Version 8.3.2  
  Download: https://windows.php.net/download#php-8.3  
  Version: VS16 x64 Thread Safe (2025-Apr-08 22:21:18)
- **Composer**: PHP dependency manager - Version 2.8.6  
  Download: https://getcomposer.org/download/
  - **Node.js** & **npm**
- **Git Bash**: Required to clone the repository.
- **Docker** (for container setup)
- **MySQL** (local or Docker container)

---

## Project Setup Steps

### 1. Install Composer

- Download and install Composer: https://getcomposer.org/download/
- During installation, make sure to point the PHP path to your local version (e.g., `C:/XAMPP/PHP/php.exe`)
- Verify installation:
  ```bash
  composer -v

Comprobar que esta instalado, corriéndo el comando. composer —v
### 2. Clone the Repository

Using Git Bash or your terminal, run:

```bash
git clone https://github.com/karaya10824/sc502-1c2025-g1.git
```

---
### 3. Initial Configuration

- Install PHP Dependencies
composer install

- Install Node Dependencies
npm install

-Condigure environment variables
cp .env.example .env

- Locate the `resources.zip` file in the root of the project.
- If you don't know your PHP configuration path, run:
  ```bash
  php --ini
  ```
- Open your `php.ini` file and **uncomment** the following extensions (remove the `;` at the beginning):

  ```ini
  extension=fileinfo
  extension=exif
  extension=sodium
  ```

---


### 3. Run Docker
docker-compose up -d

### 3. Configure Database Connection

- If the `.env` file doesn't exist, create one by copying from the `env` file in the resources.
- Edit the following lines in the `.env` file:

  ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=ReactEcommerce
    DB_USERNAME= 
    DB_PASSWORD= 
  ```

---

### 7. Run Migrations and Seeders

Generate tables for users, permissions, and images by running:

```bash
php artisan migrate
php artisan db:seed
```

---

### 8. Launch the Project

To run the Laravel development server:

```bash
php artisan serve
```

Then, open your browser and go to:  
📍 [http://localhost:8000](http://localhost:8000)

---
