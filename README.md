Content management system based on Yii2
============================

This project is based on the development of Basic Yii2, the internal integration of the
- based on the role of the RBAC Yii2 based content management system, the management process is fully prepared
- integrated RBAC permissions menu management system, support for custom tags
- user data modification module
- Integrated app on-line version of the module, support iOS and Android two versions were on the line


Third party SDK integration
-------------------

- Ali rivers Taobao server SDK
- Ali cloud OSS file upload SDK, and integrated into the module, the need to modify the configuration file to enable
- Friends of the union push
- Baidu Ueditor
- validation, JS verification form plugin



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install from an Archive File


Download the current project to your server directory

Set cookie validation key in `config/web.php` file to some random secret string:

```php
'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
    'cookieValidationKey' => '<secret random string goes here>',
],
```

You can then access the application through the following URL:

~~~
http://localhost/project/web/
~~~


CONFIGURATION
-------------

### Database


``` config/data_admin.php ```
``` config/data_app.php ```

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```
LOGIN
-------------

username ```admin```
password ```admin```