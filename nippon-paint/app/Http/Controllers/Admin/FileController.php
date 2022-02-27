<?php

namespace App\Http\Controllers\Admin;

use App\Models\GeneralFile;

class FileController extends Controller
{
    public function index()
    {
        $files = (new GeneralFile())->getFiles();
        return view('admin/file/index', compact('files'));
    }
}
