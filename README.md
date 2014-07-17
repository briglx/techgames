Tech Games
========================

Welcome to Avnet Techgames. Built by RockIT Bootcamp

1) Deploying
----------------------------------

# Navigate to /usr/share/nginx/html/techgames
# get latest code with git pull
# Clear Cache
php app/console cache:clear --env=prod --no-debug
# Change ownership
sudo chown -R www-data:www-data .
