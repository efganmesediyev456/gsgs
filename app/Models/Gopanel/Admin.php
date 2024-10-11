<?php

namespace App\Models\Gopanel;

use App\Traits\AddUuid;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class Admin
 *
 * @property int id
 * @property string uid
 * @property string name
 * @property string surname
 * @property string email
 * @property string password
 * @property string phone
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property Carbon deleted_at
 *
 * @package App\Models
 */
class Admin extends Authenticatable
{
    use HasApiTokens,  Notifiable, HasRoles, SoftDeletes, HasPermissions;

    protected $guard_name = [ 'admin'];

    protected function getDefaultGuardName(): string { return 'admin'; }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uid',
        'name',
        'surname',
        'email',
        'password',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];


    public function rolesSelected()
    {
       return $this->roles->map(function($i){ return ['id'=>$i->id,'name'=>$i->name];});
    }


}
