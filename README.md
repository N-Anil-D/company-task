<p align="center">
    <img src="https://extratik.com/wp-content/uploads/2023/01/logo.png" style="width: 300px;">
    <br>
    This project is created for example
    This project is created by Nuri Anıl Demirbaş
    <br>
</p>

# After Download Required Installation
>Clone this this repository and
```
composer install
```
> create .env file from .env.example
```
php artisan key:generate
```
```
php artisan app:database-builder
```
> OR simply copy paste this to your command screen *if your environment variables includes mysql*

```
git clone https://github.com/N-Anil-D/company-task.git
cd company-task
composer install
cp .env.example .env
php artisan key:generate
mysql -u root -p

CREATE DATABASE IF NOT EXISTS extratik;
exit

php artisan app:database-builder

start chrome http://127.0.0.1:8000
php artisan serve
```
## Installation INFO
> This Project is 
> php: "^8.2"
> laravel/framework: "^11.0"
> livewire: "^3.4"
> carbon: "^3.2"
