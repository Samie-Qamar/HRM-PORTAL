<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    protected $fillable=[
        'name',
        'guard_name',
        'created_at',
        'updated_at',
    ];



   
    // public function permissions()
    // {
    //     return $this->belongsToMany(Permission::class, 'role_has_permissions', 'role_id', 'permission_id');
    // }
}
