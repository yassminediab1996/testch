<?php 
namespace App\AdminModel;

if (!class_exists('Image')) {

    class Image {
        private $file;
        private $image;
        private $info;

        public function __construct($file) {
            if (file_exists($file)) {
                $this->file = $file;

                $info = getimagesize($file);

                $this->info = array(
                    'width'  => $info[0],
                    'height' => $info[1],
                    'bits'   => isset($info['bits']) ? $info['bits'] : '',
                    'mime'   => isset($info['mime']) ? $info['mime'] : ''
                );

                $this->image = $this->create($file);
            } else {
                exit('Error: Could not load image ' . $file . '!');
            }
        }

        private function create($image) {
            $mime = $this->info['mime'];

            if ($mime == 'image/gif') {
                return imagecreatefromgif ($image);
            } elseif ($mime == 'image/png') {
                return imagecreatefrompng($image);
            } elseif ($mime == 'image/jpeg') {
                return imagecreatefromjpeg($image);
            }
        }

        public function save($file, $quality = 90) {
            $info = pathinfo($file);

            $extension = strtolower($info['extension']);

            if (is_resource($this->image)) {
                if ($extension == 'jpeg' || $extension == 'jpg') {
                    imagejpeg($this->image, $file, $quality);
                } elseif ($extension == 'png') {
                    imagepng($this->image, $file);
                } elseif ($extension == 'gif') {
                    imagegif ($this->image, $file);
                }

                imagedestroy($this->image);
            }
        }

        public function resize($width = 0, $height = 0, $default = '') {
            if (!$this->info['width'] || !$this->info['height']) {
                return;
            }

            $xpos = 0;
            $ypos = 0;
            $scale = 1;

            $scale_w = $width / $this->info['width'];
            $scale_h = $height / $this->info['height'];

            if ($default == 'w') {
                $scale = $scale_w;
            } elseif ($default == 'h') {
                $scale = $scale_h;
            } else {
                $scale = min($scale_w, $scale_h);
            }

            if ($scale == 1 && $scale_h == $scale_w && $this->info['mime'] != 'image/png') {
                return;
            }

            $new_width = (int)($this->info['width'] * $scale);
            $new_height = (int)($this->info['height'] * $scale);
            $xpos = (int)(($width - $new_width) / 2);
            $ypos = (int)(($height - $new_height) / 2);

            $image_old = $this->image;
            $this->image = imagecreatetruecolor($width, $height);

            if (isset($this->info['mime']) && $this->info['mime'] == 'image/png') {
                imagealphablending($this->image, false);
                imagesavealpha($this->image, true);
                $background = imagecolorallocatealpha($this->image, 255, 255, 255, 127);
                imagecolortransparent($this->image, $background);
            } else {
                $background = imagecolorallocate($this->image, 255, 255, 255);
            }

            imagefilledrectangle($this->image, 0, 0, $width, $height, $background);

            imagecopyresampled($this->image, $image_old, $xpos, $ypos, 0, 0, $new_width, $new_height, $this->info['width'], $this->info['height']);
            imagedestroy($image_old);

            $this->info['width']  = $width;
            $this->info['height'] = $height;
        }
    }
}