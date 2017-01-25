romaricpascal.is
================

## Requirements

Before getting started, you'll need a few tools:

 - [Composer](https://getcomposer.org)

### Composer: Install Wordpress and plugins

Wordpress and 3rd party plugins are not stored in the repo. This has several advantages:

 - keeps the repo focused on the actual code of the project
 - reduces the size of the repo
 - changes of Wordpress version or plugins version can be versioned

Wordpress and other 3rd party dependencies are managed by [Composer](https://getcomposer.org/), which will nicely deploy them in the `wordpress` folder or the `wp-content/plugins` folder as needed.

 > A handy PPA repository, if you're using `apt-get`: `ppa:duggan/composer`
 >
 > ```
 > $ sudo apt-add-repository ppa:duggan/composer
 > $ sudo apt-get update
 > $ sudo apt-get install php5-composer
 > ```

 Once installed, from the `www` folder of the repository, run the following command to install the composer dependencies:
 ```
 $ composer install
 ```
## Starting the server

### Setting up the database connection

The database credentials have been extracted from the `wp-config.php` file. Instead, they're pulled from the `.env.php` file.


```php
<?php
define('DB_NAME', getenv('WORDPRESS_DB_NAME'));

/** MySQL database username */
define('DB_USER', getenv('WORDPRESS_DB_USER'));

/** MySQL database password */
define('DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD'));

/** MySQL hostname */
define('DB_HOST', getenv('WORDPRESS_DB_HOST'));

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
```

### `WORDPRESS_URL` environment variable

Setting up Wordpress to have `wp-content` sit outside the `wordpress` folder requires the setup of a couple of additional constants in `wp-config.php`. These need the URL at which the website will be served. This is passed throught the `WORDPRESS_URL` environment variable.

### Running a server

Deploy into an Apache vhost, use Nginx + php-fpm. Docker containers are an option too. But you can also just run:

```
$ WORDPRESS_URL=your_url:port php -S 0.0.0.0:port
```

## Project structure

### `wp-content` next to Wordpress
