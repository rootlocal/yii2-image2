<?php

namespace tests\codeception\unit\components;

use Yii;
use tests\codeception\unit\TestCase;
use image\components\Thumb;
use Codeception\Util\Fixtures;

/**
 * Class ImageTest
 * @package tests\codeception\unit\models
 */
class ImageTest extends TestCase
{
    /**
     * @throws \yii\base\ErrorException
     */
    public function testImageCreateNew()
    {
        $config = Fixtures::get('thumb1');
        $image = new Thumb($config);
        $image = $image->create();
        $this->assertTrue(file_exists($image));
        if (file_exists($image))
            unlink($image);
    }

    /**
     * @throws \yii\base\ErrorException
     */
    public function testThumbCreateNew()
    {
        $config = Fixtures::get('thumb2');
        $image = new Thumb($config);
        $image = $image->create();
        $this->assertTrue(file_exists($image));
        if (file_exists($image))
            unlink($image);
    }

    /**
     * @throws \yii\base\ErrorException
     */
    public function testCreateNewCropTrue()
    {
        $config = Fixtures::get('thumb3');
        $image = new Thumb($config);
        $image = $image->create();
        $size = getimagesize($image);
        $this->assertTrue($size[0] === $config['config']['width']);
        $this->assertTrue($size[1] === $config['config']['height']);
        if (file_exists($image))
            unlink($image);
    }

    /**
     * @throws \yii\base\ErrorException
     */
    public function testCreateNewCropFalse()
    {
        $config = Fixtures::get('thumb4');
        $image = new Thumb($config);
        $image = $image->create();
        $this->assertTrue(file_exists($image));
        $size = getimagesize($image);
        $this->assertTrue($size[0] === $config['config']['width']);
        $this->assertFalse($size[1] === $config['config']['height']);
        if (file_exists($image))
            unlink($image);
    }
}
