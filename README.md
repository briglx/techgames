Tech Games
========================

Welcome to Avnet Techgames. Built by RockIT Bootcamp and RockIT Labs

1) Deploying
----------------------------------
You can run the script release.sh

or

1. Navigate to /usr/share/nginx/html/techgames
2. get latest code with 

    ````bash
    $ sudo chown -R ubuntu:www-data .
    git pull
    ````
3. Clear Cache

    ```bash
    $ php app/console cache:clear --env=prod --no-debug
    ```
4. Update resources

    ```bash
    $ php app/console assets:install
    ```
    
5. Change ownership

    ```bash
    $ sudo chown -R www-data:www-data .
    ```