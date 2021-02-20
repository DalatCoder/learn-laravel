<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name',
        'display_name',
        'parent_id',
        'key_code'
    ];

    public function children()
    {
        return $this->hasMany(Permission::class, 'parent_id');
    }
}
