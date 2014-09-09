Tech Games
========================

Welcome to Avnet Techgames. Built by RockIT Bootcamp and RockIT Labs

General
---
Images to tech games. [http://avnetcorpphotos.smugmug.com/ATG/ATG-2014](http://avnetcorpphotos.smugmug.com/ATG/ATG-2014)


Database
----
Production MySQL
Username/password found on server in app/config/parameters.yml

1. Create Symfony database

	```
	php app/console doctrine:database:create
	
	or 
	
	mysql> create database symfony;
	```
2. Create Getter and Setter on Entity Classes

	```
	php app/console doctrine:generate:entities RockIT/TechgamesBundle/Entity
	```
3. Generate Update SQL

	```
	php app/console doctrine:schema:update --dump-sql
	```
4. Add default data

	```
	mysql> INSERT INTO techgames_users (username, password, email, is_active) VALUES ('brig', '$2a$12$Q7lPC0afZtiy7fBiXOFXveIRHQ8I99JRlCseOsR4mj/aKsWS6M', 'brig@apollo.edu', 1);
	
	mysql> INSERT INTO techgames_role (name, role) VALUES ('admin', 'ROLE_ADMIN');
INSERT INTO techgames_role (name, role) VALUES ('user', 'ROLE_USER');

	mysql> INSERT INTO user_role (user_id, role_id) VALUES (1,1);
	```





1) Deploying
----------------------------------

1. Navigate to /usr/share/nginx/html/techgames
2. get latest code with `git pull`
3. Clear Cache

    ``` 
    $ php app/console cache:clear --env=prod --no-debug
    ```
4. Update resources

    ```
    $ php app/console assets:install
    ```
    
5. Change ownership

    ```
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
4) Configure GIt
