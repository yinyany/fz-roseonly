<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'goods';

    protected $primaryKey = 'id';

    // /**
    //  * 可以被批量赋值的属性。
    //  *
    //  * @var array
    //  */
    // protected $fillable = ['name','display_name','description']; 
    
    public function getConnentAttribute()
    {
        
    }


    //购物车关联商品
    public function goods_shopcars()
    {
        return $this->belongsTo('App\Model\Admin\Goods_shopcars','id','goods_id');
    }

    // 订单关联商品
    public function order_goods()
    {
        return $this->belongsTo('App\Model\Admin\Order_goods','id','goods_id');
    }


}
