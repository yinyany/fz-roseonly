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
    protected $table = 'Order_goods';

    protected $primaryKey = 'id';

}
