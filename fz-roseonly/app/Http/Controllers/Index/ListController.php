<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Model\Admin\Goods;//引入商品模型
use App\Model\Admin\Type;//引入商品分类模型
use App\Model\Admin\Stock;//引入属性名模型
use App\Model\Admin\Carousel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    public function selected($id,$order=null,$by=null){
        //根据商品类别ID搜索商品
        $node = Type::where('id',$id)->first();
        // dd($node);
        if($order !== null){
            if($node->isRoot()){
                $type = $node->getLeaves();
                // dd($tid->toArray());
                foreach ($type as $key => $value) {
                    $tid[] = $value->id;
                }
                return $list = Goods::whereIn('type_id',$tid)->orderby($order,$by)->paginate(env('PAGE_SIZE',10));
                // dd($list);
            }elseif($node->isLeaf()){
                // $list[] = $node;
                 return $list = Goods::where('type_id',$id)->orderby($order,$by)->paginate(env('PAGE_SIZE',10));
            }
           
        }else{
             if($node->isRoot()){
                $type = $node->getLeaves();
                // dd($tid->toArray());
                foreach ($type as $key => $value) {
                    $tid[] = $value->id;
                }
                return $list = Goods::whereIn('type_id',$tid)->paginate(env('PAGE_SIZE',10));
                // dd($list);
            }elseif($node->isLeaf()){
                // $list[] = $node;
                 return $list = Goods::where('type_id',$id)->paginate(env('PAGE_SIZE',10));
            }
        }
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //导航栏
        $array = Type::get()->toHierarchy();

        $list = $this->selected($id);
        // dd($list->toArray());
        return view('index.list',['array'=>$array,'list'=>$list,'id'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function votes($id)
    {
        //导航栏
        $array = Type::get()->toHierarchy();

        $list = $this->selected($id,'votes','desc');
        // dd($list->toArray());
        return view('index.list',['array'=>$array,'list'=>$list,'id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //导航栏
        $array = Type::get()->toHierarchy();

        $list = $this->selected($id,'created_at','desc');
        // dd($list->toArray());
        return view('index.list',['array'=>$array,'list'=>$list,'id'=>$id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function price($id)
    {
         //导航栏
        $array = Type::get()->toHierarchy();

        $list = $this->selected($id,'price','asc');
        // dd($list->toArray());
        return view('index.list',['array'=>$array,'list'=>$list,'id'=>$id]);
    }

    
}
