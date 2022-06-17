<?php

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');
defined('YII_APP_BASE_PATH') or define('YII_APP_BASE_PATH',
    dirname(__DIR__, 2)
);

defined('YII_TEST_ENTRY_URL') or define('YII_TEST_ENTRY_URL',
    dirname(__DIR__) . '/app/web/index-test.php'
);
defined('YII_TEST_ENTRY_FILE') or define('YII_TEST_ENTRY_FILE',
    dirname(__DIR__) . '/app/web/index-test.php'
);

require_once(YII_APP_BASE_PATH . '/vendor/autoload.php');
require_once(YII_APP_BASE_PATH . '/vendor/yiisoft/yii2/Yii.php');

$_SERVER['SCRIPT_FILENAME'] = YII_TEST_ENTRY_FILE;
$_SERVER['SCRIPT_NAME'] = YII_TEST_ENTRY_URL;
//$_SERVER['SERVER_NAME'] = 'localhost';
