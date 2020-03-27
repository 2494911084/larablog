<?php

namespace App\Admin\Forms;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class Setting extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = '网站设置';

    public $hash_name = 'admin_side_set';

    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {
        $data = $request->all();
        Redis::hSet($this->hash_name, 'name', $data['name']);
        Redis::hSet($this->hash_name, 'email', $data['email']);
        Redis::hSet($this->hash_name, 'notice', $data['notice']);
        Redis::hSet($this->hash_name, 'content', $data['content']);

        admin_success('数据更新成功');

        return back();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->text('name', '网站名称')->rules('required');
        $this->email('email', '邮箱')->rules('email|required');
        $this->textarea('notice', '网站公告')->rules('required');
        $this->simditor('content', 'abort');
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        $name = Redis::hGet($this->hash_name, 'name')? : '请输入网站名称';
        $email = Redis::hGet($this->hash_name, 'email')? : '请输入email';
        $notice = Redis::hGet($this->hash_name, 'notice')? : '请输入网站公告';
        $content = Redis::hGet($this->hash_name, 'content')? : '请输入网站介绍';
        // dd($data);
        // if ($data != null) {
            // $name = $data['name']? : '123';
            // $email = $data['email'];
            // $content = $data['content'];
        // }
        return [
            'name'       => $name,
            'email'      => $email,
            'notice'      => $notice,
            'content'      => $content,
        ];
    }
}
