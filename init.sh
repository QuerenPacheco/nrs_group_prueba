until php artisan migrate --force; do
    echo "Waiting for database to be available..."
    sleep 5
done

php artisan db:seed --class=ProveedoresSeeder
php artisan db:seed --class=CalidadesSeeder

php-fpm
