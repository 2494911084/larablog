<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Handlers\ImageUploadHandler;

class PagesController extends Controller
{
    public function root()
    {
        return view('pages.root');
    }

    // laravel-admin 富文本图片上传
    public function apiImageUpload(Request $reqeust, ImageUploadHandler $upload)
    {
        $result = $upload->save($reqeust->upload_file, 'admin_topic', 208*3);

        return [
            "success" => true,
            "msg" => "上传成功",
            "file_path" => $result['path']
        ];
    }
}
