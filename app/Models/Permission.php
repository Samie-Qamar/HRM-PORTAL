<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Permission extends Model
{
    public $guard_name = 'web';
    protected $fillable=[
        'name',
        'guard_name',
        'created_at',
        'updated_at',
        'user_id',
    ];


    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_has_permissions', 'permission_id', 'role_id');
    }

}
