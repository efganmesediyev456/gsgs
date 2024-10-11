<?php

namespace App\Models\Entities;

use App\Traits\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Translation;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class MainSetting extends Model
{
    use HasFactory;
    use Translation, Status;
    use SoftDeletes;

    public $translatedAttributes = [ 'title', 'seo_title',
        'seo_desc','tags','seo_tags', 'footer_title','footer_desc',
         'copyright', 'created_by', 'footer_deal_title','footer_deal_desc', 'footer_address', 'footer_hours', 'header_desc'
    ];

    public $guarded=[];

}
