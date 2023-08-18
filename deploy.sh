sudo -u www-data php artisan down || true
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
sudo find . -path ./node_modules -prune -o -type f -exec chmod 644 {} \;
sudo find . -path ./node_modules -prune -o -type d -exec chmod 755 {} \;
sudo chmod 770 /var/www/refer-friend/deploy.sh 
sudo chmod 660 /var/www/refer-friend/.env 
sudo -u www-data php artisan up



