<?php

namespace App\Models\Entities;

use App\Traits\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Translation;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class Blog extends Model
{
    use HasFactory;
    use Translation, Status;
    use SoftDeletes;

    public $translatedAttributes = [ 'title', 'subtitle', 'desc', 'seo_title','seo_desc','tags','seo_keywords'];
    public function getTitleAttribute()
    {
        return $this->title;
    }
    public function getSubtitleAttribute()
    {
        return $this->subtitle;
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $slug = !empty($model->slug) ? Str::slug($model->slug) :(!empty(request()->title['az']) ? Str::slug(request()->title['az']) : (string) Str::uuid());
            $slug = static::makeUniqueSlug($slug);
            $model->slug = $slug;
        });
        static::updating(function ($model) {


            $slug = !empty($model->slug) ? Str::slug($model->slug) :(!empty(request()->title['az']) ? Str::slug(request()->title['az']) : (string) Str::uuid());
            $slug = static::makeUniqueSlug($slug, $model->id);
            $model->slug = $slug;
        });
    }

    protected static function makeUniqueSlug($slug, $except = null)
    {
        $originalSlug = $slug;
        $count = 1;

        if(!is_null($except)){
            while (static::where('slug', $slug)->where('id','<>', $except)->exists()) {
                $slug = "{$originalSlug}-{$count}";
                $count++;
            }
        }
        else{
            while (static::where('slug', $slug)->exists()) {
                $slug = "{$originalSlug}-{$count}";
                $count++;
            }
        }

        return $slug;
    }


}
