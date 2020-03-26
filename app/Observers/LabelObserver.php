<?php

namespace App\Observers;

use App\Models\label;

class LabelObserver
{
    public function deleting(label $label)
    {
        if (count($label->topics) > 0) {
            throw new \Exception("有博文尚未删除");
        }
    }
}
