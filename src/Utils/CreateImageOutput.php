<?php

namespace InstagramFollowers\Utils;

use InstagramFollowers\Internal\Models\IGImageModel;
use phpDocumentor\Reflection\Types\Resource_;

class CreateImageOutput {

    /**
     * @var $image_path string
     */
    protected $image_path;

    /**
     * @var $IGImageModel IGImageModel
     */
    protected $IGImageModel;

    protected $square_resolution_standard = [720, 720];

    /**
     * CreateImageOutput constructor.
     * @param $image_path
     */
    public function __construct($image_path) {
        $this->image_path = $image_path;
        $this->IGImageModel = new IGImageModel();
    }

    public static function createImageOutput($image_path) {
        return new self($image_path);
    }

    /**
     * @return IGImageModel
     */
    public function getIGImageModel() {
        return $this->IGImageModel;
    }

    /**
     * @return array
     */
    public function getSquareResolutionStandard() {
        return $this->square_resolution_standard;
    }

    /**
     * @throws \Exception
     */
    public function checkAndReturn() {
        $image_resource = $this->load_image();

        if ($image_resource !== false) {

            $img_sz_hor = imagesx($image_resource);
            $this->IGImageModel->setSourceWidth($img_sz_hor);
            $img_sz_ver = imagesy($image_resource);
            $this->IGImageModel->setSourceHeight($img_sz_ver);

            if ($img_sz_hor < 320 || $img_sz_hor > 1080 || $img_sz_ver < 320 || $img_sz_ver > 1080) {
                throw  new \Exception("Image size must be between 320 and 1080px");
            }

            $background = imagecreatetruecolor($this->square_resolution_standard[0], $this->square_resolution_standard[1]);

            $fact = max($this->square_resolution_standard[0] / $img_sz_hor, $this->square_resolution_standard[1] / $img_sz_ver);
            $new_width = $img_sz_hor * $fact;
            $new_height = $img_sz_ver * $fact;
            imagecopyresampled($background, $image_resource, -(($new_width - $this->square_resolution_standard[0]) / 2), -(($new_height - $this->square_resolution_standard[1]) / 2), 0, 0, $new_width, $new_height, $img_sz_hor, $img_sz_ver);


            $front = $this->create_blur_image($background, $img_sz_hor, $img_sz_ver, $image_resource);

            imagedestroy($front);

            return $this->saveImage($background);

        } else {
            throw new \Exception("Error loading " . $this->image_path);
        }
    }

    /**
     * Creates an empty temp file with a unique filename.
     *
     * @param string $outputDir
     *
     * @throws \Exception If the file cannot be created.
     *
     * @return string
     */
    public static function createTempFile($outputDir) {
        $finalPrefix = sprintf('insta_pending_media_%s_', rand(0, 10000000));

        $tmpFile = @tempnam($outputDir, $finalPrefix);
        if (!is_string($tmpFile)) {
            throw new \Exception('Unable to create temporary output file ');
        }

        return $tmpFile;
    }

    /**
     * @return bool|resource
     */
    protected function load_image() {
        $info = getimagesize($this->image_path);

        $mime_type = image_type_to_mime_type($info[2]);

        switch ($mime_type) {
            case 'image/jpeg':
                $image = imagecreatefromjpeg($this->image_path);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($this->image_path);
                break;
            case 'image/png':
                $image = imagecreatefrompng($this->image_path);
                break;
            default:
                return false;
        }
        return $image;
    }

    /**
     * @param $background Resource
     * @param $img_sz_hor int
     * @param $img_sz_ver int
     * @param $image_resource Resource
     *
     * @return resource
     */
    protected function create_blur_image($background, $img_sz_hor, $img_sz_ver, $image_resource) {
        for ($x = 1; $x <= 40; $x++) {
            imagefilter($background, IMG_FILTER_GAUSSIAN_BLUR, 999);
        }
        imagefilter($background, IMG_FILTER_SMOOTH, 99);
        imagefilter($background, IMG_FILTER_BRIGHTNESS, 10);

        $fact = min($this->square_resolution_standard[0] / $img_sz_hor, $this->square_resolution_standard[1] / $img_sz_ver);
        $new_width = $img_sz_hor * $fact;
        $new_height = $img_sz_ver * $fact;

        $front = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($front, $image_resource, 0, 0, 0, 0, $new_width, $new_height, $img_sz_hor, $img_sz_ver);

        imagecopymerge($background, $front, -(($new_width - $this->square_resolution_standard[0]) / 2), -(($new_height - $this->square_resolution_standard[1]) / 2), 0, 0, $new_width, $new_height, 100);
        return $front;
    }

    /**
     * @param $image
     * @param $save_destination
     *
     * @return bool true on success or false on failure.
     */
    protected function save_image($image, $save_destination) {
        $imageret = imagejpeg($image, $save_destination, 90);
        imagedestroy($image);
        return $imageret;
    }

    /**
     * @param $background
     * @return bool|string
     * @throws \Exception
     */
    protected function saveImage($background) {
        $tmpFile = $this->createTempFile(__DIR__);
        $result = $this->save_image($background, $tmpFile);

        if ($result === true) {
            $file_cont = file_get_contents($tmpFile);
            $unlink_result = unlink(realpath($tmpFile));
            if ($unlink_result === false) {
                trigger_error("Cannot delete temp file", E_USER_NOTICE);
            }
            return $file_cont;
        }
    }

}
