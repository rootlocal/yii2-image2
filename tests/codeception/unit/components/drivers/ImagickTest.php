<?php
/**
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @author Alexander Zakharov <sys@eml.ru>
 * @link http://rootlocal.ru
 * @copyright Copyright © 2018 rootlocal.ru
 */

namespace tests\codeception\unit\components\drivers;

use tests\codeception\unit\TestCase;
use Codeception\Util\Fixtures;
use image\components\Thumb;

/**
 * Class ImagickTest
 * @package tests\codeception\unit\components\drivers
 */
class ImagickTest extends TestCase
{
    /**
     * @inheritdoc
     */
    public function setUp()
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