Tech Games
========================

Welcome to Avnet Techgames. Built by RockIT Bootcamp and RockIT Labs

1) Deploying
----------------------------------

1. Navigate to /usr/share/nginx/html/techgames
2. get latest code with `git pull`
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

2) Gettings Started
--
You'll need to configure the TechGames project once you clone it into your local development environment.

### Install Composer
* Navigate to project folder /path/to/techgames
* Install Composer

````
curl -sS https://getcomposer.org/installer | php
````
Then run 

````
php composer.phar install
````

This will install of the dependencies needed for the project

Press enter to accept the defaults for the missing parameters

### Set TimeZone 
You'll need to set the timezone setting in your php.ini file. The easist way to know which file is used is to create a info.php file.

````
<?php

phpinfo();

?>
````

Load this file in the browswer. Look for the section *Configuration File (php.ini) File*.

On my computer it is looking in /etc/ for a file called php.ini.

However, you may not have that file there. Instead you may have a php.ini.default

Copy this to php.ini

````
sudo cp /etc/php.ini.default /etc/php.ini
````

Edit the php.ini file

```
sudo vi /etc/php.ini
```

Look for the section for date.timezone

```
date.timezone = "America/Phoenix"
```

Restart apache

````
sudo apachectl restart
````

### Install Assets
Navigate to techgames folder and run:
````
php app/console assets:install
````
### Set permissions on folders
Change ownership on the cache and logs folders

````
sudo chown -R _www:_www app/cache
sudo chown -R _www:_www app/logs
````
### Verify Site
Open a browser and navigate `localhost/techgames/web/app_dev.php`

3) Starting to Code
----------------------------------
Before you start to code. Be sure to create a branch for the work you'll do.

1. First get the latest code

    ````
    git pull
    ````
2. Create a branch to work on

````
git branch <feature>
git checkout <feature>
````
