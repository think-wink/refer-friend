php artisan down || true
sudo chown -R ubuntu:ubuntu /var/www/html
git pull origin main
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev
npm i
npm run build
php artisan migrate
php artisan cache:clear
php artisan auth:clear-resets
php artisan route:cache
php artisan config:cache
php artisan view:cache
sudo chown -R www-data:www-data ./
sudo find ./ -type f -exec chmod 644 {} \;    
sudo find ./ -type d -exec chmod 755 {} \;
php artisan up

