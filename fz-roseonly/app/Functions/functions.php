<?php

function shopStr2Arr($st=null)
{
	$arr= '';
	$array = [];
	$aid = [];

	$array = explode(',', $st);

	foreach ($array as $key => $value) {
	   
	      $aid[$key] =  explode(':', $value);
	 
	}
	foreach ($aid as $key => $value) {
		// var_dump($value);
		$type = DB::table('butes')->where('id',(int)$value['0'])->first();
		$value = DB::table('values')->where('id',(int)$value['1'])->first();
		
		$arr .= '<div class="layui-btn layui-btn-sm layui-btn-radius layui-btn-danger" style="margin-bottom:2px;height:20px;line-height:20px">'.$type->name.'</div>:'.$value->name.'</br>';
		
	}
	return ($arr);
}