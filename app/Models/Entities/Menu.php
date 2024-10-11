<?php

namespace App\Models\Entities;

use App\Traits\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Translation;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;



class Menu extends Model
{
    use HasFactory;
    use Translation, Status;
    use SoftDeletes;

    public $translatedAttributes = ['title', 'seo_title', 'seo_keywords', 'seo_desc'];
    public function getTitleAttribute()
    {
        return $this->title;
    }

    public function getStaticViewAttribute()
    {
        return status_btn($this->id,get_class($this),$this->static, ['row'=>'static']);
    }


    public function getHeaderTopViewAttribute()
    {
        return  status_btn($this->id,get_class($this),$this->header_top, ['row'=>'header_top']);
    }

    public function getHeaderViewAttribute()
    {
        return  status_btn($this->id,get_class($this),$this->header, ['row'=>'header']);
    }

    public function getFooterViewAttribute()
    {
        return  status_btn($this->id,get_class($this),$this->footer, ['row'=>'footer']);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $slug = !empty($model->slug) ? Str::slug($model->slug) :(!empty(request()->title['az']) ? Str::slug(request()->title['az']) : (string) Str::uuid());
            $slug = static::makeUniqueSlug($slug);
            $model->slug = $slug;
        });


//        static::updating(function ($model) {
//            $slug = !empty($model->slug) ? Str::slug($model->slug) :(!empty(request()->title['az']) ? Str::slug(request()->title['az']) : (string) Str::uuid());
//            $slug = static::makeUniqueSlug($slug, $model->id);
//            $model->slug = $slug;
//        });
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

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function getChildeLinkAttribute()
    {

        if($this->parent_id){
            return '';
        }
        return '
            <a class="btn btn-outline-success waves-effect waves-light" href="' . route("gopanel.menus.index", ['parent_id' => $this->id]) . '">
                <i class="fas fa-list-ol mr-2"></i>
                Alt Menyuları [ ' . $this->children()->count() . ' ]
            </a>
        ';
    }

}
