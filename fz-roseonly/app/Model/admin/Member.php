<?php

namespace App\Model\admin;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'member';

    protected $primaryKey = 'id';

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['name','phone','password','sex','birthday','affective','address','email','fere','fere-phone'];
}
