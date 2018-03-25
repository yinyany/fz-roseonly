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

    protected $fillable = ['member_id','goods_id','num'];

    public function goods()
    {
        return $this->belongsTo('App\Model\Admin\Goods','goods_id','id');
    }

}
