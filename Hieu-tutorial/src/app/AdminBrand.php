<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminBrand extends Model
{
    protected $table = 'tbl_brand';
    protected $primaryKey = 'brand_id';
    protected $fillable = [
        'brand_name', 'brand_desc', 'brand_status'
    ];
}
