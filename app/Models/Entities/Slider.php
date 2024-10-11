<?php

namespace App\Models\Entities;

use App\Traits\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Translation;
use Illuminate\Database\Eloquent\SoftDeletes;


class Slider extends Model
{
    use HasFactory;
    use Translation, Status;
    use SoftDeletes;


    public $translatedAttributes = [ 'title', 'title2','title3', 'title4'];


    public function getTitleAttribute()
    {
        return $this->title;
    }

    public function getStaticViewAttribute()
    {
        return status_btn($this->id,get_class($this),$this->static, ['row'=>'static']);
    }

}
