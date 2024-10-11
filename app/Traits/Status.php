<?php

namespace App\Traits;

use App\Models\FieldTranslation;
use App\Models\Product;

trait Status
{

    public function getStatusViewAttribute()
    {
        return  status_btn($this->id,get_class($this),$this->status);
    }
}
