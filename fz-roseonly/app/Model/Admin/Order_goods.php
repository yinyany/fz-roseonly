<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Order_goods extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'order_goods';

    protected $primaryKey = 'id';

    public function goods()
    {
        return $this->belongsTo('App\Model\Admin\Goods','goods_id','id');
    }

    public function order()
    {
        return $this->belongsTo('App\Model\Admin\Order','order_id','order_number');
    }
}
