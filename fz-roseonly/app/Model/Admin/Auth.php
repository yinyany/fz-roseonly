<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'users';

    protected $primaryKey = 'id';

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['name','state','email','password'];
}
