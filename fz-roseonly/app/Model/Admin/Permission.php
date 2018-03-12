<?php 
namespace App\Model\Admin;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
	 /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'Permissions';

    protected $primaryKey = 'id';

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
     protected $fillable = ['name','display_name','description'];
}