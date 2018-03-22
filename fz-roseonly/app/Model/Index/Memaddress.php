<?php

namespace App\Model\Index;

use Illuminate\Database\Eloquent\Model;

class Memaddress extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'memaddresses';

    protected $primaryKey = 'id';



    public function member()
    {
        return $this->belongsTo('App\Model\Admin\Member','id','member_id');
    }

   public function orderaddress()
    {
        return $this->hasMany('App\Model\Admin\Order','shaddress_id','id');
    }

}
