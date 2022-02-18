<?php
namespace Cakes\Kernel;

class FileHandler
{
    private static $image;

    public static function loadImageFile() {
        self::$image = $_FILES['image'];
        if (self::$image['error'] !== 0) {
            return false;
        }
        return self::moveFile();
    }

    private static function moveFile() {
        $tmp_name = self::$image['tmp_name'];
        $file_name = microtime() . self::$image['name'];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $file_name = md5(microtime() . $file_name) . ".$ext";
        if (move_uploaded_file($tmp_name, '../images/' . $file_name)) return $file_name;
        else return false;
    }
}