<?php

namespace App\Models\Entities;

use App\Traits\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Translation;
use Illuminate\Database\Eloquent\SoftDeletes;


class Feature extends Model
{
    use HasFactory;
    use Translation, Status;
    use SoftDeletes;


    public $translatedAttributes = [ 'title'];
    public function getTitleAttribute()
    {
        return $this->title;
    }
}
