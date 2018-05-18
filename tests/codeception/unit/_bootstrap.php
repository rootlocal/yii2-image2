<?php

use \Codeception\Util\Fixtures;

Fixtures::add('thumb1', [
    'driver' => 'GD',
    'file' => Yii::getAlias('@img/default.jpg'),
    'outFile' => Yii::getAlias('@assets/test_' . uniqid() . '.jpg'),
    'watermarkFile' => Yii::getAlias('@img/watermark1.png'),
    'config' => [
        'width' => 200,
        'height' => 200,
        'crop' => false,
        'watermark' => true,
        'watermarkOpacity' => 60,
        'quality' => 50,
    ]]);

Fixtures::add('thumb2', [
    'driver' => 'GD',
    'file' => Yii::getAlias('@img/watermark2.png'),
    'outFile' => Yii::getAlias('@assets/test_' . uniqid() . '.jpg'),
    'config' => [
        'width' => 800,
        'height' => 700,
        'crop' => true,
        'watermark' => false,
        'watermarkOpacity' => 60,
        'quality' => 50,
    ]]);

Fixtures::add('thumb3', [
    'driver' => 'GD',
    'file' => Yii::getAlias('@img/default.jpg'),
    'outFile' => Yii::getAlias('@assets/test_' . uniqid() . '.jpg'),
    'config' => [
        'width' => 237,
        'height' => 251,
        'crop' => true,
        'quality' => 40,
    ]]);

Fixtures::add('thumb4', [
    'driver' => 'GD',
    'file' => Yii::getAlias('@img/default.jpg'),
    'outFile' => Yii::getAlias('@assets/test_' . uniqid() . '.jpg'),
    'config' => [
        'width' => 234,
        'height' => 552,
        'crop' => false,
        'quality' => 30,
    ]]);

Fixtures::add('imagick', [
    'driver' => 'Imagick',
    'file' => Yii::getAlias('@img/default.jpg'),
    'outFile' => Yii::getAlias('@assets/test_' . uniqid() . '.jpg'),
    'config' => [
        'width' => 234,
        'height' => 552,
        'crop' => true,
        'quality' => 30,
    ]]);