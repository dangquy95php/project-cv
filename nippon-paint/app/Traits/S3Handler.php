<?php
namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait S3Handler
{
    public static function uploadToS3($image, $dir)
    {
        $path = Storage::disk('s3')->putFile($dir, $image, 'public');
        return str_replace($dir.'/', '', $path);
    }

    public static function uploadToS3AsOrgName(UploadedFile $image, $dir)
    {
        $name = $image->getClientOriginalName();
        $path = Storage::disk('s3')->putFileAs($dir, $image, $name);
        return str_replace($dir.'/', '', $path);
    }

    public static function deleteFromS3($path)
    {
        return Storage::disk('s3')->delete($path);
    }

    /**
     * S3のファイルの絶対パスを返す
     * @param $path
     * @return string
     */
    public static function getFileUrl($path)
    {
        return Storage::disk('s3')->url($path);
    }

    public static function getAllFiles($dir)
    {
        return Storage::disk('s3')->allFiles($dir);
    }

    public static function lastModified($path)
    {
        return Storage::disk('s3')->lastModified($path);
    }

}
