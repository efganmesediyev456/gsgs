<?php

namespace App\Models\Entities;

use App\Traits\ImageView;
use App\Traits\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Translation;
use Illuminate\Database\Eloquent\SoftDeletes;
class Partner extends Model
{
    use HasFactory;
    use Status;
    use SoftDeletes;
    use ImageView;
}
