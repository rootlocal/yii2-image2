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

use Yii;
use yii\base\BaseObject;
use yii\base\ErrorException;

/**
 * Class Thumb
 * @package image\components
 * @property ThumbConfig $size
 */
class Thumb extends BaseObject
{

    /**
     * @var ThumbConfig
     * @example
     *  'config' => [
     *          'width' => 100,
     *          'height' => 100,
     *          'crop' => false,
     *          'watermark' => true,
     *          'watermarkOpacity' => 25,
     *          'quality' => 100,
     *  ]
     */
    public $config = [];

    /**
     * The File path to the Watermark File
     * @var string
     */
    public $watermarkFile = null;

    /**
     * The File path to the Image
     * @var string
     */
    public $file = null;

    /**
     * Out File path to the Image
     * @var string
     */
    public $outFile = null;

    /**
     * default driver: GD, Imagick
     * @var  string
     */
    public $driver;

    /**
     * @var Thumb
     */
    private static $instance;

    /**
     * @param array $config
     * @return Thumb
     */
    public static function getInstance(array $config = [])
    {
        self::$instance = new self($config);
        return self::$instance;
    }

    /**
     * @inheritdoc
     * @throws ErrorException
     */
    public function init()
    {
        parent::init();

        if (empty($this->file))
            throw new ErrorException(Yii::t('image', 'No path to file specified "file"'));
        if (empty($this->outFile))
            throw new ErrorException('No Out File path to file specified "outFile"');

        if (empty($this->watermarkFile))
            $this->config['watermark'] = false;
    }

    /**
     * @return ThumbConfig
     */
    private function getThumbConfig()
    {
        return new ThumbConfig($this->config);
    }

    /**
     * Creating thumb
     * @return string PATH to tmp file
     * @throws ErrorException
     */
    public function create()
    {
        $ImageDriver = new Image(['driver' => $this->driver]);
        $ImageDriver = $ImageDriver->load($this->file);

        $config = $this->getThumbConfig();
        $thisImageSize = getimagesize($this->file);

        if ($thisImageSize[0] < $config->width) {
            $ImageDriver->sharpen($config->width - $thisImageSize[0]);
        }

        $ImageDriver->resize(null, $config->height);

        if ($config->crop)
            $ImageDriver->crop($config->width, $config->height);

        if ($config->watermark) {
            $watermark = new Image(['driver' => $this->driver]);
            $watermark = $watermark->load($this->watermarkFile);
            $watermark->resize($ImageDriver->width, null);
            $ImageDriver->watermark(
                $watermark, null, null,
                $config->watermarkOpacity
            );

            unset($watermark);
        }

        $ImageDriver->resize($config->width, null);

        if ($config->crop && $ImageDriver->height > $config->height) {
            $ImageDriver->crop($config->width, $config->height);
        }

        if ($ImageDriver->save($this->outFile, $config->quality)) {
            unset($ImageDriver);
            return $this->outFile;
        }
        throw new ErrorException("error saving file: {$this->outFile}");
    }

}