composer install
npm install

npm run build

chmod -R 777 storage
chown -R www-data:www-data storage

php artisan migrate 

# php artisan db:seed --class=ProveedoresSeeder
# php artisan db:seed --class=CalidadesSeeder

php-fpm
