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

namespace tests\codeception\unit\components\Kohana;

use Yii;
use tests\codeception\unit\TestCase;
use \image\components\Kohana\Image;

/**
 * Class KohanaImageTest
 * @package tests\codeception\unit\components\Kohana
 */
class KohanaImageTest extends TestCase
{
    /**
     * @inheritdoc
     */
    public function setUp()
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