<?php
/**
 * Application configuration shared by all test types
 */

use yii\swiftmailer\Mailer;

return [
    'id' => 'image-test',
    'basePath' => dirname(dirname(__DIR__)), // @tests
    'vendorPath' => dirname(dirname(dirname(__DIR__))) . '/vendor',
    'language' => 'en-US',

    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@app' => dirname(__DIR__),
        '@web' => dirname(__DIR__) . '/web',
        '@runtime' => dirname(__DIR__) . '/runtime',
        '@tests' => dirname(__DIR__, 2) . '/codeception',
        '@assets' => dirname(__DIR__) . '/web/assets',
        '@img' => dirname(__DIR__) . '/web/img',
    ],

    'modules' => [
    ],

    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'tests\codeception\fixtures',
        ],
    ],

    'components' => [

        'db' => require(__DIR__ . '/db.php'),

        'mailer' => [
            'class' => Mailer::class,
            'viewPath' => '@app/mail',
            'useFileTransport' => true,
        ],

        'urlManager' => [
            'showScriptName' => true,
        ],

        'cache' => [
            'class' => 'yii\caching\DummyCache',
        ],

        'image' => [
            'class' => '\image\Image',
            'driver' => 'GD',  //GD or Imagick
            'watermarkFile' => dirname(__DIR__) . '/web/img/watermark1.png',
        ],
    ],
];
