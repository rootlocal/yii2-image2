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

use \image\components\Kohana\Image as KohanaImage;
use yii\base\ErrorException;
use yii\base\BaseObject;

/**
 * Class Image
 * @package image\components
 */
class Image extends BaseObject
{

    /**
     * @var  string  default driver: GD, Imagick
     */
    public $driver;

    /**
     * @var Image
     */
    private static $instance;

    /**
     * Loads the image to Image object
     * @param string $file the file path to the image
     * @param string $driver the image driver to use: GD or ImageMagick
     * @throws ErrorException if filename is empty or file doesn't exist
     * @return \image\components\Kohana\Image
     */
    public function load($file = null, $driver = null)
    {
        if (empty($driver))
            $driver = $this->driver;

        if (empty($file)) {
            throw new ErrorException('File name can not be empty');
        }

        if (!realpath($file)) {
            throw new ErrorException(sprintf('The file does\'t exist: %s', $file));
        }

        return KohanaImage::factory($file, $driver ? $driver : $this->driver);
    }

    /**
     * @param $file string
     * @param array $config
     * @return \image\components\Kohana\Image
     * @throws \yii\base\ErrorException
     */
    public static function getInstance($file, array $config = [])
    {
        self::$instance = new self($config);
        return self::$instance->load($file);
    }

}