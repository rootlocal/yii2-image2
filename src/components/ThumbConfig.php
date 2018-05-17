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

use yii\base\BaseObject;

/**
 * Class ThumbConfig
 * @package image\components
 */
class ThumbConfig extends BaseObject
{
    /**
     * @var int
     */
    public $width = 100;

    /**
     * @var int
     */
    public $height = 100;

    /**
     * @var bool
     */
    public $crop = false;

    /**
     * @var bool
     */
    public $watermark = false;

    /**
     * @var integer
     */
    public $watermarkOpacity = 25;

    /**
     * @var int
     */
    public $quality = 100;

    /**
     * @var ThumbConfig
     */
    private static $instance;

    /**
     * @param array $config
     * @return ThumbConfig
     */
    public static function getInstance(array $config = [])
    {
        self::$instance = new self($config);
        return self::$instance;
    }

}