<?php 

namespace App;

use App\Image;

class Helper
{
    public static function shout(string $string)
    {
        echo strtoupper($string);
    }
    
    public static function resize($filename, $width, $height) {
    $image_dir = base_path() . '/uploads/files/';    

    if (!is_file($image_dir . $filename)) {
        return 'No img';
    }

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $old_image = $filename;
    $new_image = 'cache/' . substr($filename, 0, strrpos($filename, '.')) . '-' . $width . 'x' . $height . '.' . $extension;

    if (!is_file($image_dir . $new_image) || (filectime($image_dir . $old_image) > filectime($image_dir . $new_image))) {
        $path = '';

        $directories = explode('/', dirname(str_replace('../', '', $new_image)));

        foreach ($directories as $directory) {
            $path = $path . '/' . $directory;

            if (!is_dir($image_dir . $path)) {
                @mkdir($image_dir . $path, 0777);
            }
        }

        list($width_orig, $height_orig) = getimagesize($image_dir . $old_image);

        if ($width_orig != $width || $height_orig != $height) {
            $image = new Image($image_dir . $old_image);
            $image->resize($width, $height);
            $image->save($image_dir . $new_image);
        } else {
            copy($image_dir . $old_image, $image_dir . $new_image);
        }
    }

    
    return url('/') . '/uploads/files/' . $new_image;
    
}
}