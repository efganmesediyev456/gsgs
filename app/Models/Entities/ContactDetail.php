<?php

namespace App\Models\Entities;

use App\Traits\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Translation;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class ContactDetail extends Model
{
    use HasFactory;
    use Translation, Status;

    public $translatedAttributes = ['address', 'title'];
    public function getAddressAttribute()
    {
        return $this->address;
    }

    public $guarded=[];
}
