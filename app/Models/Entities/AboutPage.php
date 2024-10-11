<?php

namespace App\Models\Entities;

use App\Traits\Translation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    use HasFactory;
    use Translation;
    public $fillable=['image1','image2'];
    public $translatedAttributes = [ 'title1', 'title2', 'desc', 'customer_title1', 'customer_title2', 'customer_title3', 'customer_title4'];

}
