<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# TeamBuilder
Realize for PRW2
## Requirements

| Tools                                         | Version |
|-----------------------------------------------|---------|
| [Composer](https://getcomposer.org/download/) | 2.2.4   |
| [Php](https://www.php.net/downloads.php)      | 8.0.9   |
| [Mysql](https://hub.docker.com/_/mysql)       | 8.0     |
| [Npm](https://www.npmjs.com/)                 | 8.1.2   |

## Installation

1. Clone the repo
   ```sh
   git clone https://github.com/antbou/priki.git
   ```

2. Install php packages
   ```sh
   cd priki
   composer install
   ```

3. Generate application key and add it in `.env``
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```

3. Install npm dependencies
    ```sh
    npm install
    ```

4. Build assets
    ```sh
    npm run dev
    npm run watch
    ```

5. Setup database connection
   ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=<DATABASE_NAME>
    DB_USERNAME=<USERNAME>
    DB_PASSWORD=<PASSWORD>
   ```

6. Populate the database
   ```sh
   php artisan migrate:fresh --seed
   ```