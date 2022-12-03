<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project
This project all database table name are in english, but front-end is in indonesian language
<br>
How to migrate and run this : 
- fill .env file with your database settings
- delete in routes/web.php
```php
$categories = Category::all();
```
- delete in routes/web.php
```php
['categories' => $categories]
```
- save file
- enter command
    ```sh
    php artisan migrate:fresh --seed
    ```
- undo text from routes/web.php, so that categories syntax will come back
- Storage link for view the images
    ```sh
    php artisan storage:link
    ```
- try the project
    ```sh
    php artisan serve
    ```
