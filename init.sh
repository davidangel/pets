cp -n .env.example .env
composer install && npm install
php artisan storage:link