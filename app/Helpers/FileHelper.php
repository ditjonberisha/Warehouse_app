<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Storage;

class FileHelper
{
    public static function createFile($file, $dir, $filename)
    {
        $path = Storage::putFileAs($dir, $file, $filename.'.'.$file->getClientOriginalExtension());
        return $path;
    }
    public static function deleteFile($filename)
    {
        Storage::delete($filename);
    }
}
?>