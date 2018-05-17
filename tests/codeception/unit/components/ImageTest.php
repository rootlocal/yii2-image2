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
    /* public function testImageCreateNew()
     {
         $config = Fixtures::get('thumb2');
         $image1 = Yii::$app->image->getThumb($config)->create();
         $this->assertTrue(file_exists($image1));
         if (file_exists($image1))
             unlink($image1);
     }*/

    /**
     * @throws \yii\base\ErrorException
     */
    public function testThumbCreateNew()
    {
        $config = Fixtures::get('thumb1');
        $image2 = Thumb::getInstance($config)->create();
        $this->assertTrue(file_exists($image2));
        if (file_exists($image2))
            unlink($image2);
    }
}
