APanel CMS
================================

APanel is a CMS based on Yii 2 framework.


REQUIREMENTS
------------

The minimum requirement by this application that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install Yii 2 library via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

**NOTE:** If you are using Composer to upgrade Yii, you should run the following command first (once for all) to install
  the composer-asset-plugin, *before* you update your project:

  ```
  composer global require "fxp/composer-asset-plugin:1.0.0-beta2"
  ```

You can install all dependencies using the following command:

```
$ composer install
```

or if composer installed not global

```
$ php composer.phar install
```

**NOTE:** You also need set rights on folders:

  ```
  $ chmod 777 assets/
  ```
  
  ```
  $ chmod 777 runtime/
  ```
  
  ```
  $ chmod 777 web/assets/
  ```

### Install bower dependencies

Bower is a command line utility. [Install it with npm](http://bower.io/#install-bower). 
Bower requires [Node and npm](http://nodejs.org) and [Git](http://git-scm.com/).

```
$ bower install
```

### DATABASE

Create new mysql db named yiicms2. Dump script locates in migrations/yiicms2.sql

