<?php

namespace App\Models\Entities;

use App\Traits\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Translation;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class Contact extends Model
{
    use HasFactory;
    use Translation, Status;

    public $translatedAttributes = ['address', 'title','desc'];
    public function getTitleAttribute()
    {
        return $this->title;
    }
    public function getSubtitleAttribute()
    {
        return $this->subtitle;
    }

    public $guarded=[];
}
