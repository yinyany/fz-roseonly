<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Bute extends Model
{
    protected $fillable = ['name','type_id'];

    public function type()
    {
        return $this->belongsTo('App\Model\Admin\Type','type_id');
    }

    public function value()
    {
        return $this->hasMany('App\Model\Admin\Value','bute_id','id');
    }
}
