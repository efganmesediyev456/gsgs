<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function scopeStatus($query, $status = true)
    {
        return $query->where('status', $status);
    }
}
