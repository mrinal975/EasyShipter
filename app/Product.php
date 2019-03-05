<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'productCode','name', 'shortDescriptoin', 'longDescriptoin','quantity','image','type','ownerId','fullDayRent','halfDayRent'
    ];
}
