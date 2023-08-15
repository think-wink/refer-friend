php artisan down || true
sudo chown -R ubuntu:ubuntu /var/www/refer-friend
git pull origin main
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev
npm i
npm run build
php artisan migrate
php artisan view:clear
php artisan cache:clear
php artisan auth:clear-resets
php artisan route:cache
php artisan config:cache
php artisan view:cache
sudo chown -R www-data:www-data /var/www/refer-friend/
sudo find /var/www/refer-friend/ -type f -exec chmod 644 {} \;    
sudo find /var/www/refer-friend/ -type d -exec chmod 755 {} \;
sudo find /var/www/refer-friend/storage -type d -exec chmod 775 {} \;
php artisan up

