<?php

namespace App\Models\Entities;

use App\Traits\Status;
use App\Traits\Translation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Parameter extends Model
{
    use HasFactory;
    use Translation, Status;
    use SoftDeletes;
    public $translatedAttributes = ['title'];
    public function getTitleAttribute()
    {
        return $this->title;
    }

    public function getChildrendviewAttribute()
    {
        if(is_null($this->parent_id))
        return '<a class="btn btn-outline-success waves-effect waves-light" href="'.route('gopanel.parameters.index',['parent_id'=>$this->id]).'">
                <i class="fas fa-list-ol mr-2"></i>
                Dəyərlər [ '.$this->children()->count().' ]
            </a>';
    }

    public function children()
    {
        return $this->hasMany(Parameter::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Parameter::class, 'parent_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($parameter) {
           $parameter->children()->delete();
        });
    }

}
