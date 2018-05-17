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

use \yii\image\drivers\Kohana_Image;
use yii\base\ErrorException;

/**
 * Interface DriverInterface
 * @package image\components\drivers
 */
interface DriverInterface
{
    /**
     * Resize the image to the given size. Either the width or the height can
     * be omitted and the image will be resized proportionally.
     *
     *     // Resize to 200 pixels on the shortest side
     *     $image->resize(200, 200);
     *
     *     // Resize to 200x200 pixels, keeping aspect ratio
     *     $image->resize(200, 200, Image::INVERSE);
     *
     *     // Resize to 500 pixel width, keeping aspect ratio
     *     $image->resize(500, NULL);
     *
     *     // Resize to 500 pixel height, keeping aspect ratio
     *     $image->resize(NULL, 500);
     *
     *     // Resize to 200x500 pixels, ignoring aspect ratio
     *     $image->resize(200, 500, Image::NONE);
     *
     *     // Resize to 400 pixels on the shortest side, puts it in the center
     *     // of the image with the transparent edges, keeping aspect ratio,
     *     // output size will be 400x400 pixels
     *     $image->resize(400, 400, Image::ADAPT);
     *
     * @param   integer $width new width
     * @param   integer $height new height
     * @param   integer $master master dimension
     * @return  $this
     * @uses    Image::_do_resize
     */
    public function resize($width = NULL, $height = NULL, $master = NULL);

    /**
     * Crop an image to the given size. Either the width or the height can be
     * omitted and the current width or height will be used.
     *
     * If no offset is specified, the center of the axis will be used.
     * If an offset of TRUE is specified, the bottom of the axis will be used.
     *
     *     // Crop the image to 200x200 pixels, from the center
     *     $image->crop(200, 200);
     *
     * @param   integer $width new width
     * @param   integer $height new height
     * @param   mixed $offset_x offset from the left
     * @param   mixed $offset_y offset from the top
     * @return  $this
     * @uses    Image::_do_crop
     */
    public function crop($width, $height, $offset_x = NULL, $offset_y = NULL);

    /**
     * Rotate the image by a given amount.
     *
     *     // Rotate 45 degrees clockwise
     *     $image->rotate(45);
     *
     *     // Rotate 90% counter-clockwise
     *     $image->rotate(-90);
     *
     * @param   integer $degrees degrees to rotate: -360-360
     * @return  $this
     * @uses    Image::_do_rotate
     */
    public function rotate($degrees);

    /**
     * Flip the image along the horizontal or vertical axis.
     *
     *     // Flip the image from top to bottom
     *     $image->flip(Image::HORIZONTAL);
     *
     *     // Flip the image from left to right
     *     $image->flip(Image::VERTICAL);
     *
     * @param   integer $direction direction: Image::HORIZONTAL, Image::VERTICAL
     * @return  $this
     * @uses    Image::_do_flip
     */
    public function flip($direction);

    /**
     * Sharpen the image by a given amount.
     *
     *     // Sharpen the image by 20%
     *     $image->sharpen(20);
     *
     * @param   integer $amount amount to sharpen: 1-100
     * @return  $this
     * @uses    Image::_do_sharpen
     */
    public function sharpen($amount);

    /**
     * Add a reflection to an image. The most opaque part of the reflection
     * will be equal to the opacity setting and fade out to full transparent.
     * Alpha transparency is preserved.
     *
     *     // Create a 50 pixel reflection that fades from 0-100% opacity
     *     $image->reflection(50);
     *
     *     // Create a 50 pixel reflection that fades from 100-0% opacity
     *     $image->reflection(50, 100, TRUE);
     *
     *     // Create a 50 pixel reflection that fades from 0-60% opacity
     *     $image->reflection(50, 60, TRUE);
     *
     * [!!] By default, the reflection will be go from transparent at the top
     * to opaque at the bottom.
     *
     * @param   integer $height reflection height
     * @param   integer $opacity reflection opacity: 0-100
     * @param   boolean $fade_in TRUE to fade in, FALSE to fade out
     * @return  $this
     * @uses    Image::_do_reflection
     */
    public function reflection($height = NULL, $opacity = 100, $fade_in = FALSE);

    /**
     * Add a watermark to an image with a specified opacity. Alpha transparency
     * will be preserved.
     *
     * If no offset is specified, the center of the axis will be used.
     * If an offset of TRUE is specified, the bottom of the axis will be used.
     *
     *     // Add a watermark to the bottom right of the image
     *     $mark = Image::factory('upload/watermark.png');
     *     $image->watermark($mark, TRUE, TRUE);
     *
     * @param   Kohana_Image $watermark watermark Image instance
     * @param   integer $offset_x offset from the left
     * @param   integer $offset_y offset from the top
     * @param   integer $opacity opacity of watermark: 1-100
     * @return  $this
     * @uses    Image::_do_watermark
     */
    public function watermark(Kohana_Image $watermark, $offset_x = NULL, $offset_y = NULL, $opacity = 100);

    /**
     * Set the background color of an image. This is only useful for images
     * with alpha transparency.
     *
     *     // Make the image background black
     *     $image->background('#000');
     *
     *     // Make the image background black with 50% opacity
     *     $image->background('#000', 50);
     *
     * @param   string $color hexadecimal color value
     * @param   integer $opacity background opacity: 0-100
     * @return  $this
     * @uses    Image::_do_background
     */
    public function background($color, $opacity = 100);

    /**
     * Save the image. If the filename is omitted, the original image will
     * be overwritten.
     *
     *     // Save the image as a PNG
     *     $image->save('saved/cool.png');
     *
     *     // Overwrite the original image
     *     $image->save();
     *
     * [!!] If the file exists, but is not writable, an exception will be thrown.
     *
     * [!!] If the file does not exist, and the directory is not writable, an
     * exception will be thrown.
     *
     * @param   string $file new image path
     * @param   integer $quality quality of image: 1-100
     * @return  boolean
     * @uses    Image::_save
     * @throws  ErrorException
     */
    public function save($file = NULL, $quality = 100);

    /**
     * Render the image and return the binary string.
     *
     *     // Render the image at 50% quality
     *     $data = $image->render(NULL, 50);
     *
     *     // Render the image as a PNG
     *     $data = $image->render('png');
     *
     * @param   string $type image type to return: png, jpg, gif, etc
     * @param   integer $quality quality of image: 1-100
     * @return  string
     * @uses    Image::_do_render
     */
    public function render($type = NULL, $quality = 100);

}