<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminCategory extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_category';
    protected $primaryKey = 'category_id';
    protected $fillable = [
        'category_name', 'category_desc', 'category_status'
    ];
}
