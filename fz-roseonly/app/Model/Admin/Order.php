<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'Orders';

    protected $primaryKey = 'id';



    public function member()
    {
        return $this->belongsTo('App\Model\Admin\Member','id','member_id');
    }

    public function order_goods()
    {
        return $this->hasMany('App\Model\Admin\Order_goods','order_id','order_number');
    }
    
    public function memaddress()
    {
        return $this->belongsTo('App\Model\Index\Memaddress','shaddress_id','id');
    }

}
