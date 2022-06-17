<?php

use image\components\Kohana\Image;
use Codeception\Test\Unit;

/**
 * Class KohanaImageTest
 * @package tests\codeception\unit\components\Kohana
 */
class KohanaImageTest extends Unit
{
    /**
     * @inheritdoc
     */
    public function setUp(): void
    {
        parent::setUp();

        if (!extension_loaded('gd')) {
            $this->markTestSkipped('The GD extension is not available.');
        }
    }

    /**
     * @throws \yii\base\ErrorException
     */
    public function testSaveWithoutExtension()
    {
        $to = Yii::getAlias('@runtime/test_' . uniqid() . '.jpg');
        $file = Yii::getAlias('@img/default.jpg');
        $image = Image::factory($file);
        $this->assertTrue($image->save($to));
        unlink($to);
    }
}