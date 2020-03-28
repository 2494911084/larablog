<?php
use Illuminate\Support\Facades\Redis;

// 获取缓存
function getSetting($type)
{
    switch ($type) {
        // 网站名称
        case 'name':
            $name = 'name';
            break;
        // 邮箱
        case 'email':
            $name = 'email';
            break;
        // 公告
        case 'notice':
            $name = 'notice';
            break;
        // about
        case 'content':
            $name = 'content';
            break;
        // 博文分类
        case 'category':
            $categories = Redis::get('topic_categories');
            if (!$categories) {
                $categories = DB::table('categories')->orderBy('order', 'desc')->get();
            }
            return $categories;
    }
    return Redis::hGet('admin_side_set', $name);
}

// 将路由名称转为类名
function route_class()
{
    return str_replace('.', '-', Route::currentRouteName()) ;
}
