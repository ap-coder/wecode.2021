#!/bin/bash
composer require laravel/sail --dev --ignore-platform-reqs
composer install --ignore-platform-reqs
php artisan sail:install --with="mariadb"
