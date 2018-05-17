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

namespace image\components;

use \image\components\drivers\Driver as Image;

/**
 * Class ImageDriver
 * @package image\components
 */
class ImageDriver extends \yii\image\ImageDriver
{
    // Resizing constraints
    const NONE = Image::NONE;
    const WIDTH = Image::WIDTH;
    const HEIGHT = Image::HEIGHT;
    const AUTO = IMAGE::AUTO;
    const INVERSE = IMAGE::INVERSE;
    const PRECISE = IMAGE::PRECISE;
    const ADAPT = IMAGE::ADAPT;
    const CROP = IMAGE::CROP;

    // Flipping directions
    const HORIZONTAL = IMAGE::HORIZONTAL;
    const VERTICAL = IMAGE::VERTICAL;

    /**
     * @var  string  default driver: GD, Imagick
     */
    public $driver = 'GD';

    /**
     * @var ImageDriver
     */
    private static $instance;

    /**
     * @param $file null|string
     * @param $driver null|string
     * @return \image\components\drivers\Driver
     * @throws \yii\base\ErrorException
     */
    public function load($file = null, $driver = null)
    {
        return parent::load($file, $driver);
    }

    /**
     * @param $file string
     * @param array $config
     * @return \image\components\drivers\Driver
     * @throws \yii\base\ErrorException
     */
    public static function getInstance($file, array $config = [])
    {
        self::$instance = new self($config);
        return self::$instance->load($file);
    }

}