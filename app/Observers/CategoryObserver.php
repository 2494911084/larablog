<?php

namespace App\Observers;

use App\Models\category;

class CategoryObserver
{
    public function deleting(category $category)
    {
        if (count($category->topics) > 0) {
            throw new \Exception("有博文尚未删除");
        }
    }
}
