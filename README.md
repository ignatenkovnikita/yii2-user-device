User Device Manager
===================
User Device Manager

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist ignatenkovnikita/yii2-user-device "*"
```

or add

```
"ignatenkovnikita/yii2-user-device": "*"
```

to the require section of your `composer.json` file.


Run migration
```bash
./console/yii migrate --migrationPath=vendor/ignatenkovnikita/yii2-user-device/migrations/
```

Add in config section module
```php
'modules' => [
    ...
    'user-device' => [
        'class' => \ignatenkovnikita\device\UserDevice::class
    ],
    ...
],
```

Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \ignatenkovnikita\device\AutoloadExample::widget(); ?>```