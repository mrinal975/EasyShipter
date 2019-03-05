<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['Address', 'rentType', 'phone','productId','date','time','cutomerId'];
}
