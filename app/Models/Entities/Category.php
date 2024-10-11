<?php

namespace App\Models\Entities;

use App\Models\Auction\Auction;
use App\Models\BaseModel;
use App\Traits\Translation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use SoftDeletes, HasFactory;
    use Translation;

    protected $fillable = [
        'parent_id',
        'uid',
        'name',
        'key',
        'slug',
        'status',
        'icon',
    ];


    protected $casts = [
        'uid' => 'string',
        'status' => "boolean"
    ];

    protected $appends = ['childe_link', 'slug_link', 'footer_show'];
    public $translatedAttributes = ['title', 'seo_title','seo_keywords','seo_desc'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            $slug = Str::slug(request()->title['az']);

            if (!is_null($model->parent_id)) {
                $slug = self::where("id", $model->parent_id)->first()->slug . "-" . $slug;
            }

            $model->slug    = $slug;
            $model->key     = $slug;
        });
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // İlişki tanımı: Category'nin birden fazla CategoryParameter'ı olabilir
    public function categoryParameters()
    {
        return $this->hasMany(CategoryParameter::class, 'category_id');
    }

    // İlişki tanımı: Category'nin birden fazla Parameter'ı olabilir
    public function parameters()
    {
        return $this->hasManyThrough(
            Parameter::class,
            CategoryParameter::class,
            'category_id', // CategoryParameter'daki foreign key
            'id',          // Parameter'daki local key
            'id',          // Category'deki local key
            'parameter_id' // CategoryParameter'daki local key
        );
    }

    public function auctions()
    {
        return $this->hasMany(Auction::class, 'category_id');
    }

    public function getChildeLinkAttribute()
    {
        return '
            <a class="btn btn-outline-success waves-effect waves-light" href="' . route("gopanel.category.index", ['parent_id' => $this->id]) . '">
                <i class="fas fa-list-ol mr-2"></i>
                Alt Kateqoriyaları [ ' . $this->children()->count() . ' ]
            </a>
        ';
    }


    public function getSlugLinkAttribute()
    {
        return 'bunu-qosun-her-yerde';
    }

    public function getFootershowAttribute()
    {
        return 'efgan';
    }
}
