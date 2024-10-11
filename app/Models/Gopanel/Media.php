<?php

namespace App\Models\Gopanel;

use App\Traits\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    use Status;


    protected $table = 'media';
    public function imageable()
    {
        return $this->morphTo();
    }

    public function getFileViewAttribute()
    {
        return '<a target="_blank" href="'.get_image($this->file).'"><img width="100px" src="'.get_image($this->file).'"/></a>';
    }
}
