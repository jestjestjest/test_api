Для запуска перейти в папку laradok и запустить docker-compose up -d --build nginx php-fpm postgres workspace

Пролить миграции php artisan migrate

и запустить сидер

php artisan db:seed
