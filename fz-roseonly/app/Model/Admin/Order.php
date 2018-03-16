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
        return $this->belongsTo('App\Model\admin\Member','id','member_id');
    }

    public function order_goods()
    {
        return $this->belongsTo('App\Model\admin\Member','id','order_id');
    }

}
