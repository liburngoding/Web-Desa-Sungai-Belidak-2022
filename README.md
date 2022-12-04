<p align="center"><a><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## About Project
This project all database table name are in english, but front-end is in indonesian language
<br>
How to migrate and run this : 
- fill .env file with your database settings
- delete this in routes/web.php
```php
$categories = Category::all();
```
- delete this in routes/web.php
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
