<?php
if($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == 'www.admin.com' ){
    //表示本地测试
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV_LOCAL') or define('YII_ENV_LOCAL', 'local');
}

// comment out the following two lines when deployed to production
//通过域名的方式来判断生产环境和开发环境
if(count(explode('-1.wx.jaeapp.com', $_SERVER['SERVER_NAME'])) == 2 || $_SERVER['SERVER_NAME'] == 'gmadmindev.ipicopico.com' ){
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'dev');
}
//defined('YII_DEBUG') or define('YII_DEBUG', true);
//defined('YII_DEBUG') or define('YII_DEBUG', true);
require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();
