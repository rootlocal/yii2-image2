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

namespace image;

use image\components\Thumb;
use yii\base\Component;
use yii\helpers\ArrayHelper;

/**
 * Class Image
 * @package image
 * @property Thumb $thumb
 */
class Image extends Component
{
    /**
     * @var Thumb
     */
    private $_thumb;

    /**
     * default driver: GD, Imagick
     * @var  string
     */
    public $driver;

    /**
     * The File path to the Watermark File
     * @var string
     */
    public $watermarkFile;

    /**
     * @param array $config
     * @return Thumb
     */
    public function getThumb($config)
    {
        $componentConfig = [
            'driver' => $this->driver,
            'watermarkFile' => $this->watermarkFile,
        ];

        if (empty($this->_thumb)) {
            $config = ArrayHelper::merge($componentConfig, $config);
            $this->_thumb = Thumb::getInstance($config);
        }

        return $this->_thumb;
    }

}