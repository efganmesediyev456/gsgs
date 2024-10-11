<?php

namespace App\Models\Entities;

use App\Traits\Status;
use App\Traits\Translation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Brend extends Model
{
    use HasFactory;
    use Translation, Status;
    use SoftDeletes;
    public $translatedAttributes = ['title'];
    public function getTitleAttribute()
    {
        return $this->title;
    }
}
