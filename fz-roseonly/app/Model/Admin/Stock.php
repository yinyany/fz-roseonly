<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['good_id','bid','price','stock','vid[]'];
}
