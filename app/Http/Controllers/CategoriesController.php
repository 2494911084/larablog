<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Link;
use App\Models\Label;
use Illuminate\Support\Facades\Redis;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        $topics = $category->topics()->orderBy('order', 'desc')->orderBy('updated_at', 'desc')->get();
        // 标签
        $labels = Label::with('topics')->get();
        // 友链
        $links = Link::all();
        return view('topics.index', compact('topics', 'labels', 'links'));
    }
}
