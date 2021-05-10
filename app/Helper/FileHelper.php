<?php


namespace App\Helper;


use Illuminate\Http\UploadedFile;

class FileHelper
{
    /**
     * @param UploadedFile $file
     * @param string $dir
     * @return bool|string
     */
    public static function FileUpload(UploadedFile $file, string $dir)
    {
        if ($file->store($dir)) {
            $array = explode('/', $file);
            return $fileName = array_pop($array);
        }
        else {
            return false;
        }
    }
}
