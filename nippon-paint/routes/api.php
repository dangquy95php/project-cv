<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Admin\Api'], function () {
    Route::post('ckeditor-upload/{dir}', 'UploadController@upload');
    Route::post('file-upload', 'UploadController@uploadFile');
    Route::post('file-delete', 'UploadController@deleteFile');
    Route::post('document-upload', 'UploadController@uploadDocument');
    Route::post('general-upload', 'UploadController@generalUpload');
    Route::get('fetch-product', 'PLargeSpecController@fetchProducts');
});

Route::get('/news/get', 'Front\Api\TopicController@index');
Route::get('/news/get/{parent_category}/', 'Front\Api\TopicController@index');

Route::get('/count/building', 'Front\Api\CountController@building');
Route::get('/count/building-catalog', 'Front\Api\CountController@buildingCatalog');
Route::get('/count/automotive', 'Front\Api\CountController@automotive');
Route::get('/count/large-spec-bridge', 'Front\Api\CountController@largeSpecBridge');
Route::get('/count/large-spec-steel', 'Front\Api\CountController@largeSpecSteel');
