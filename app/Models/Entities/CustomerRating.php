<?php

namespace App\Models\Entities;

use App\Traits\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Translation;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class CustomerRating extends Model
{
    use HasFactory;
    use Translation, Status;

    public $translatedAttributes = ['name', 'position','message'];
    public function getNameAttribute()
    {
        return $this->name;
    }

    public function getPositionAttribute()
    {
        return $this->position;
    }

    public function getMessageAttribute()
    {
        return $this->message;
    }

    public $guarded=[];
}
