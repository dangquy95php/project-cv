<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\GeneralFile;
use App\Traits\S3Handler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends ApiController
{
    public function upload(Request $request, $dir)
    {
        if($request->hasFile('upload')) {
            $image = $request->file('upload');
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $dir = 'imgs/'.str_replace('|', '/', $dir);
            $path = Storage::disk('s3')->putFile($dir, $image, 'public');
            $img_url = Storage::disk('s3')->url($path);
            $msg = '画像アップロードが完了しました。';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$img_url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    public function uploadFile(Request $request)
    {
        $res = [];
        $res['result'] = 'fail';
        $res['message'] = 'アップロードに失敗しました';
        if($request->hasFile('upload')) {
            $image = $request->file('upload');
            if(!in_array($image->extension(), ['jpg', 'jpeg', 'png', 'gif'])){
                $res['message'] = 'jpg, jpeg, png, gifのいずれかの形式のファイルを選択してください。';
            }else{
                $dir = str_replace('|', '/', $request->input('dir'));
                $path = S3Handler::uploadToS3($image, $dir);
                if($request->has('delete_path')){
                    S3Handler::deleteFromS3(str_replace('|', '/', $request->input('delete_path')));
                }
                if($path){
                    $res['result'] = 'success';
                    $res['message'] = 'アップロードに成功しました';
                    $res['url'] = $path;
                    $res['full_path'] = S3Handler::getFileUrl($dir.'/'.$path);
                }
            }
        }
        return collect($res);
    }

    public function deleteFile(Request $request)
    {
        $res['result'] = 'success';
        if($request->input('path')) {
            $path = str_replace('|', '/', $request->input('path'));
            $deleted = S3Handler::deleteFromS3($path);
            if(!$deleted){
                $res['result'] = 'fail';
                $res['debug'] = $path;
            }
        }
        return collect($res);
    }

    public function uploadDocument(Request $request)
    {
        $res = [];
        $res['result'] = 'fail';
        $res['message'] = 'アップロードに失敗しました';

        if($request->hasFile('upload')) {
            $image = $request->file('upload');
            if($image->extension() !== 'pdf'){
                $res['message'] = 'PDFファイルを選択してください。';
            }else{
                $dir = str_replace('|', '/', $request->input('dir'));
                $path = S3Handler::uploadToS3AsOrgName($image, $dir);

                if($path){
                    $res['result'] = 'success';
                    $res['message'] = 'アップロードに成功しました';
                    $res['url'] = $path;
                    $res['full_path'] = S3Handler::getFileUrl($dir.'/'.$path);
                }
            }
        }

        return collect($res);
    }

    public function generalUpload(Request $request)
    {
        $res = [];
        $res['result'] = 'fail';
        $res['message'] = 'アップロードに失敗しました';

        if($request->hasFile('upload')) {
            $image = $request->file('upload');
            $dir = str_replace('|', '/', $request->input('dir'));
            $path = S3Handler::uploadToS3AsOrgName($image, $dir);

            if($path){
                $res['result'] = 'success';
                $res['message'] = 'アップロードに成功しました';
                $res['files'] = (new GeneralFile())->getFiles();
            }
        }

        return collect($res);
    }
}
