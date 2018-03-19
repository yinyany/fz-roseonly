<?php

namespace App\Model\Index;

use App\Model\Index\Home;
use App\Model\Admin\Member;
use App\Model\Admin\Type;
use App\Model\Admin\Carousel;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;

class Arrayindex extends Model
{
    public function index()
    {
        //导航栏
        $list = Type::where('depth',0)->get();
        // dd($list->toArray());
        // $data[] = $list[1]->getImmediateDescendants()->toArray();
        $datas = [];
        foreach ($list as $key => $value) {
            $datas[] = $value->getDescendantsAndSelf()->toHierarchy();
        }
        // dd($datas);
        foreach ($datas as $key => $value) {
            foreach ($value as $key => $v) {
                $array[] = $v;
            }
        }
        // dd($array);
        return $array;
    }
}
