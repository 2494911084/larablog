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
        if ($name = $request->input('topic_name')) {
            $query = $topic->query()->where('title', 'like', "%$name%");
        } else {
            $query = $topic->query();
        }

        $topics = $query->orderBy('order', 'desc')->orderBy('updated_at', 'desc')->get();

        // 标签
        $labels = $this->getLabels();
        // 友链
        $links = $this->getLinks();

        return view('topics.index', compact('topics', 'labels', 'links'));
    }

    public function show(Topic $topic)
    {
        // 标签
        $labels = $this->getLabels();
        // 友链
        $links = $this->getLinks();

        return view('topics.show', compact('topic', 'labels', 'links'));
    }

    // 获取标签
    public function getLabels()
    {
        return Label::with('topics')->get();
    }

    // 获取友链
    public function getLinks()
    {
        return Link::all();
    }
}
