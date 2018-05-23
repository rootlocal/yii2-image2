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

namespace image\components\drivers;

/**
 * Interface DriverInterface
 * @package image\components\drivers
 */
interface DriverInterface
{

    /**
     * Execute a resize.
     *
     * @param   integer $width new width
     * @param   integer $height new height
     * @return  void
     */
    public function _do_resize($width, $height);

    /**
     * Adaptation the image.
     *
     * @param   integer $width image width
     * @param   integer $height image height
     * @param   integer $bg_width background width
     * @param   integer $bg_height background height
     * @param   integer $offset_x offset from the left
     * @param   integer $offset_y offset from the top
     * @return void
     */
    public function _do_adapt($width, $height, $bg_width, $bg_height, $offset_x, $offset_y);

    /**
     * Execute a crop.
     *
     * @param   integer $width new width
     * @param   integer $height new height
     * @param   integer $offset_x offset from the left
     * @param   integer $offset_y offset from the top
     * @return  void
     */
    public function _do_crop($width, $height, $offset_x, $offset_y);

    /**
     * Execute a rotation.
     *
     * @param   integer $degrees degrees to rotate
     * @return  void
     */
    public function _do_rotate($degrees);

    /**
     * Execute a flip.
     *
     * @param   integer $direction direction to flip
     * @return  void
     */
    public function _do_flip($direction);

    /**
     * Execute a sharpen.
     *
     * @param   integer $amount amount to sharpen
     * @return  void
     */
    public function _do_sharpen($amount);

    /**
     * Execute a reflection.
     *
     * @param   integer $height reflection height
     * @param   integer $opacity reflection opacity
     * @param   boolean $fade_in true to fade out, false to fade in
     * @return  void
     */
    public function _do_reflection($height, $opacity, $fade_in);

    /**
     * Execute a watermarking.
     *
     * @param   \image\components\Kohana\Image $image watermarking
     * @param   integer $offset_x offset from the left
     * @param   integer $offset_y offset from the top
     * @param   integer $opacity opacity of watermark
     * @return  void
     */
    public function _do_watermark(\image\components\Kohana\Image $image, $offset_x, $offset_y, $opacity);

    /**
     * Execute a background.
     *
     * @param   integer $r red
     * @param   integer $g green
     * @param   integer $b blue
     * @param   integer $opacity opacity
     * @return void
     */
    public function _do_background($r, $g, $b, $opacity);

    /**
     * Execute a save.
     *
     * @param   string $file new image filename
     * @param   integer $quality quality
     * @return  boolean
     */
    public function _do_save($file, $quality);

    /**
     * Execute a render.
     *
     * @param   string $type image type: png, jpg, gif, etc
     * @param   integer $quality quality
     * @return  string
     */
    public function _do_render($type, $quality);

}