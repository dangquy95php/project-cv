<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreDocument;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $documents = Document::query()
            ->search($request->all())
            ->sortable()
            ->orderBy('updated_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('admin/document/index', compact('documents', 'request'));
    }

    public function create()
    {
        $document = new Document;
        return view('admin/document/edit', compact('document'));
    }

    public function store(StoreDocument $request)
    {
        $document = new Document;
        if ($document->fill($request->all())->save()) {
            return redirect('admin/product/document')->with('flash_message', '登録しました。');
        }
        return redirect('admin/product/document/create')->with('error_message', '登録に失敗しました。');
    }

    public function edit(Document $document)
    {
        return view('admin/document/edit', compact('document'));
    }

    public function update(StoreDocument $request, Document $document)
    {
        if ($document->fill($request->all())->save()) {
            return redirect('admin/product/document')->with('flash_message', '更新しました。');
        }
        return redirect('admin/product/document/create')->with('error_message', '更新に失敗しました。');
    }

    public function delete(Document $document)
    {
        if ($document->delete()) {
            $document->deleteFiles();
            return redirect('admin/product/document')->with('flash_message', '削除しました');
        }
        return redirect('admin/product/document')->with('error_message', '削除に失敗しました');
    }
}
