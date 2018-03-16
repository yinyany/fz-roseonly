<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Goods_shopcar extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'Goods_shopcars';

    protected $primaryKey = 'id';

    public function goods()
    {
        return $this->belongsTo('App\Model\admin\Goods','goods_id');
    }

}
