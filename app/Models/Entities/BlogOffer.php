<?php

namespace App\Models\Entities;

use App\Traits\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Translation;
use Illuminate\Database\Eloquent\SoftDeletes;


class BlogOffer extends Model
{
    use HasFactory;
    use Translation, Status;
    use SoftDeletes;


    public $translatedAttributes = [ 'title', 'title2','title3'];
    public function getTitleAttribute()
    {
        return $this->title;
    }
}
