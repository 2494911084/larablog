<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Support\Facades\Redis;
use App\Models\Label;
use App\Models\Link;

class TopicsController extends Controller
{
    public function index(Request $request, Topic $topic)
    {
        if ($name = $request->topic_name) {
            $query = $topic->query()->where('title', 'like', "%$name%");
        } else {
            $query = $topic->query();
        }
        // Topics 列表
        $topics = $query->orderBy('order', 'desc')->orderBy('updated_at', 'desc')->get();
        // 标签
        $labels = Label::with('topics')->get();
        // 友链
        $links = Link::all();
        return view('topics.index', compact('topics', 'labels', 'links'));
    }

    public function show(Topic $topic)
    {
        // 标签
        $labels = Label::with('topics')->get();
        // 友链
        $links = Link::all();
        return view('topics.show', compact('topic', 'labels', 'links'));
    }
}
