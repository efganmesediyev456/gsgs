<?php

namespace App\Traits;

use App\Models\Gopanel\FieldTranslation;
use Illuminate\Database\Eloquent\Builder;

trait Translation
{



    public function translations()
    {
        return $this->morphMany(FieldTranslation::class, 'model');
    }

    public function getTranslation($attribute, $locale = null)
    {
        $locale = $locale ?: app()->getLocale();
        $translation = $this->translations()?->where('key', $attribute)?->where('locale', $locale)?->first();
        return $translation ? $translation?->value : null;
    }

    public function __get($key)
    {
        if (in_array($key, $this->translatedAttributes)) {
            return $this->getTranslation($key);
        }

        return parent::__get($key);
    }

    public function scopeStatus(Builder $builder):void
    {
        $builder->whereStatus(1);
    }
    public function scopeHeaderShow(Builder $builder):void
    {
        $builder->whereHeaderShow(1);
    }
    public function scopeFooterShow(Builder $builder):void
    {
        $builder->whereFooterShow(1);
    }


    public function scopeOrder(Builder $builder):void
    {
        $builder->orderBy('id', 'desc');
    }
    public function scopeMain(Builder $builder):void
    {
         $builder->where('main_show',1);
    }

}
