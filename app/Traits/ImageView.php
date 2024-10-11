<?php

namespace App\Traits;

use App\Models\FieldTranslation;
use App\Models\Product;

trait ImageView
{

    public function getImageViewAttribute()
    {
        return '<a target="_blank" href="'.url(get_image($this->image)).'"><img width="100" src="'.url(get_image($this->image)).'"> </a>';
    }
}
