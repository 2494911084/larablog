<?php
namespace App\Admin\Controllers;

use App\Admin\Forms\Setting;
use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function setting(Content $content)
    {
        return $content
            ->title('网站设置')
            ->body(new Setting());
    }
}
