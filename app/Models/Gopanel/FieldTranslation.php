<?php

namespace App\Models\Gopanel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldTranslation extends Model
{
    use HasFactory;

    public $guarded=[];
    public function model()
    {
        return $this->morphTo();
    }
}
