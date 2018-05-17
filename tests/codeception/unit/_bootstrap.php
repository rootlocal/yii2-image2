<?php

use \Codeception\Util\Fixtures;

Fixtures::add('thumb1', [
    'driver' => 'GD',
    'file' => Yii::getAlias('@img/default.jpg'),
    'outFile' => Yii::getAlias('@assets/test_' . uniqid() . '.jpg'),
    'config' => [
        'width' => 400,
        'height' => 400,
        'crop' => true,
        'watermark' => true,
        'watermarkOpacity' => 90,
        'quality' => 70,
    ]]);

Fixtures::add('thumb2', [
    'driver' => 'GD',
    'file' => Yii::getAlias('@img/default.jpg'),
    'outFile' => Yii::getAlias('@assets/test_' . uniqid() . '.jpg'),
    'config' => [
        'width' => 337,
        'height' => 251,
        'crop' => true,
    ]]);

Fixtures::add('thumb3', [
    'driver' => 'GD',
    'file' => Yii::getAlias('@img/default.jpg'),
    'outFile' => Yii::getAlias('@assets/test_' . uniqid() . '.jpg'),
    'config' => [
        'width' => 234,
        'height' => 552,
        'crop' => false,
    ]]);