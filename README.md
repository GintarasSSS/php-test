<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Launching

- Clone repository
- `cd php-test` - go to project directory
- `cp .env.example .env` - copy environment files
- `./install.sh` or `./start.sh` - run docker containers for project: PHP and MySQL
- `docker ps` - find running PHP container name, f.e.: `php-test-php-1`
- `docker exec -it php-test-php-1 bash` - go inside of container
- run `composer install`
- run `npm install`
- run `php artisan migrate:fresh`
- `./stop.sh` - to stop containers, if it needs

## Testing
- Inside of PHP container: `XDEBUG_MODE=coverage php artisan test --coverage`
![img.png](img.png)

## UI examples
- Use url `http://127.0.0.1/`
- Character image isn't available

![img_1.png](img_1.png)

![img_2.png](img_2.png)

![img_3.png](img_3.png)
