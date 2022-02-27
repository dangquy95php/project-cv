<?php

namespace App\Models;

use App\Traits\S3Handler;
use Illuminate\Database\Eloquent\Model;

class PBuildingFinishSample extends Model
{
    protected $guarded = ['created_at', 'updated_at', 'id'];
    protected $appends = ['img_url'];
    public static $sample_img_path = 'product/building/finish_samples';

    public function getImgUrlAttribute()
    {
        return S3Handler::getFileUrl(self::$sample_img_path . '/' . $this->image);
    }

    public static function getNewEntityArray($params)
    {
        $models = [];
        foreach ($params as $param){
            $models[] = new static($param);
        }
        return $models;
    }

    public function saveImg()
    {
        if($file_name = S3Handler::uploadToS3($this->image, self::$sample_img_path)){
            $this->setAttribute('image', $file_name);
            return $this;
        }else{
            return false;
        }
    }

    public function saveAndDeleteImg()
    {
        if($file_name = S3Handler::uploadToS3($this->image, self::$sample_img_path)){
            if($this->image && $this->image !== $file_name){
                S3Handler::deleteFromS3(self::$sample_img_path.'/'.$this->image);
            }
            $this->setAttribute('image', $file_name);
            return $this;
        }else{
            return false;
        }
    }

    public function delete()
    {
        S3Handler::deleteFromS3(self::$sample_img_path . '/' . $this->image);
        return parent::delete();
    }
}
