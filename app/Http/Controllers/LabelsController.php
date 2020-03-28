<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Label;
use Illuminate\Support\Facades\Redis;
use App\Models\Link;

class LabelsController extends Controller
{
    public function show(Label $label)
    {
        $topics = $label->topics()->orderBy('order', 'desc')->orderBy('updated_at', 'desc')->get();
        // 公告
        $notice = Redis::hGet('admin_side_set', 'notice');
        // 标签
        $labels = Label::with('topics')->get();
        // 友链
        $links = Link::all();
        return view('topics.index', compact('topics', 'notice', 'labels', 'links'));
    }
}
