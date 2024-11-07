<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable=[
        'name',
        'guard_name',
        'created_at',
        'updated_at',
        'user_id',
    ];
}
