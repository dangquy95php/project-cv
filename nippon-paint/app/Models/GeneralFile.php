<?php

namespace App\Models;

use App\Traits\S3Handler;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class GeneralFile extends Model
{
    protected $guarded = [];
    public $dir = 'files';
    use S3Handler;

    public function getFiles()
    {
        $files = self::getAllFiles($this->dir);
        $entities = [];
        foreach ($files as $file){
            $entities[] = new self([
                'name' => substr($file, mb_strlen($this->dir) + 1),
                'path' => $file,
                'full_path' => self::getFileUrl($file),
                'modified' =>  Carbon::createFromTimestamp(self::lastModified($file))->format('Y-m-d H:i:s')
            ]);
        }
        return collect($entities);
    }


}
