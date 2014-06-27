## Laravel 4 Bootstrap Starter Site


This application is facilitated user to sing up, login and then can manage customers from his control panel.


##Requirements

	PHP >= 5.4.0
	MCrypt PHP Extension

##How to install
### Step 1: Get the code
#### Option 1: Git Clone

	git clone git://github.com/tanveerhussainnxb/laravel-app.git laravel

#### Option 2: Download the repository

    https://github.com/tanveerhussainnxb/laravel-app/archive/master.zip

### Step 2: Use Composer to install dependencies
#### Option 1: Composer is not installed globally

    cd laravel
	curl -s http://getcomposer.org/installer | php
	php composer.phar install --dev
#### Option 2: Composer is installed globally

    cd laravel
	composer install --dev

If you haven't already, you might want to make [composer be installed globally](http://andrewelkins.com/programming/php/setting-up-composer-globally-for-laravel-4/) for future ease of use.

Please note the use of the `--dev` flag.

Some packages used to preprocess and minify assests are required on the development environment.

When you deploy your project on a production environment you will want to upload the ***composer.lock*** file used on the development environment and only run `php composer.phar install` on the production server.

This will skip the development packages and ensure the version of the packages installed on the production server match those you developped on.

NEVER run `php composer.phar update` on your production server.

### Step 3: Configure Environments

Open ***bootstrap/start.php*** and edit the following lines to match your settings. You want to be using your machine name in Windows and your hostname in OS X and Linux (type `hostname` in terminal). Using the machine name will allow the `php artisan` command to use the right configuration files as well.

    $env = $app->detectEnvironment(array(

        'local' => array('your-local-machine-name'),
        'staging' => array('your-staging-machine-name'),
        'production' => array('your-production-machine-name'),

    ));
	
### Step 4: Configure Database

Now that you have the environment configured, you need to create a database configuration for it. Please open the file ***app/config/database.php*** or ***app/config/local*** and edit it to match your local database settings.	
