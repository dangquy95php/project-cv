<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreTopic;
use App\Models\Topic;

class TopicController extends Controller
{
    public function index(Request $request)
    {
        $topics = Topic::query()
            ->search($request->all())
            ->sortable()
            ->orderBy('updated_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('admin/topic/index', compact('topics', 'request'));
    }

    public function create()
    {
        $topic = new Topic;
        return view('admin/topic/edit', compact('topic'));
    }

    public function store(StoreTopic $request)
    {
        $topic = new Topic;
        if ($topic->fill($request->all())->save()) {
            return redirect('admin/news')->with('flash_message', '登録しました。');
        }
        return redirect('admin/news/create')->with('error_message', '登録に失敗しました。');
    }

    public function edit(Topic $topic)
    {
        return view('admin/topic/edit', compact('topic'));
    }

    public function update(StoreTopic $request, Topic $topic)
    {
        if ($topic->fill($request->all())->save()) {
            return redirect('admin/news')->with('flash_message', '登録しました。');
        }
        return redirect('admin/news/create')->with('error_message', '登録に失敗しました。');
    }

    public function delete(Topic $topic)
    {
        if ($topic->delete()) {
            return redirect('admin/news')->with('flash_message', '削除しました');
        }
        return redirect('admin/news')->with('error_message', '削除に失敗しました');
    }

    public function preview(Topic $topic)
    {
        $topic_categories = Topic::getFlattenCategoryListFront()->toArray();

        return view('front/topic/show', compact('topic', 'topic_categories'));
    }
}
