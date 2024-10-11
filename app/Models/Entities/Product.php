<?php

namespace App\Models\Entities;

use App\Models\Gopanel\Media;
use App\Traits\Status;
use App\Traits\Translation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class Product extends Model
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



    public function media()
    {
        return $this->morphMany(Media::class, 'imageable');
    }
    public function getGalleryAttribute()
    {
        return '<a class="btn btn-success btn-sm" href="'.route('gopanel.medias.index',['imageable_type'=>static::class,'imageable_id'=>$this->id]).'">Upload Media</a>';
    }

    public function getDiscountVieWAttribute()
    {
        return  status_btn($this->id,get_class($this),$this->attributes['discount_view'], ['row'=>'discount_view']);
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

        if($except !== null){
            while (static::where('slug', $slug)->whereNot('id', $except)->exists()) {
                $slug = "{$originalSlug}-{$count}";
                $count++;
            }
        }else{
            while (static::where('slug', $slug)->exists()) {
                $slug = "{$originalSlug}-{$count}";
                $count++;
            }
        }



        return $slug;
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }
    public function parameters()
    {
        return $this->belongsToMany(Parameter::class, 'parameter_product');
    }

    public function getImageViewAttribute()
    {
        return '<a target="_blank" href="'.get_image($this->image).'"><img width="100px" src="'.get_image($this->image).'"/></a>';
    }

    public function brend()
    {
        return $this->belongsTo(Brend::class, 'brend_id');
    }

}
