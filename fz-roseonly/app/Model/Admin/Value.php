<?php

namespace App\Model\Admin;
use App\Model\Admin\Bute;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    protected $fillable = ['name','bute_id'];

  //   public function getButeIdAttribute($value){
		// $datas = [];
  //       $data = Bute::get(['id','name'])->toArray();
  //       foreach ($data as  $v) {
  //           $datas[$v['id']] = $v['name'];  
  //       }
  //       return $datas[$value];
  //   }
}
