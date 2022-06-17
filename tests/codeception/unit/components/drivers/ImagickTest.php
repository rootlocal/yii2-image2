<?php

use Codeception\Util\Fixtures;
use image\components\Thumb;
use Codeception\Test\Unit;


/**
 * Class ImagickTest
 * @package tests\codeception\unit\components\drivers
 */
class ImagickTest extends Unit
{
    /**
     * @inheritdoc
     */
    public function setUp(): void
    {
        parent::setUp();

        if (!extension_loaded('imagick')) {
            $this->markTestSkipped('Imagick is not installed, or the extension is not loaded');
        }
    }

    /**
     * @throws \yii\base\ErrorException
     */
    public function testImagickSaveWithoutExtension()
    {
        $config = Fixtures::get('imagick');
        $image = new Thumb($config);
        $image = $image->create();
        $this->assertTrue(file_exists($image));
        if (file_exists($image))
            unlink($image);
    }

}