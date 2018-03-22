<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Model\Admin\Goods;//引入商品模型
use App\Model\Admin\Type;//引入商品分类模型
use App\Model\Admin\Bute;//引入属性名模型
use App\Model\Admin\Value;//引入属性值模型
use App\Model\Admin\Member;//引入用户模型
use App\Model\Admin\Comment;//引入评论模型
use App\Model\Admin\Carousel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    public function selected($id,$type='null',$order=null,$by=null){
        //根据商品类别ID搜索商品
        // dd($type);
        if($type === 'null'){
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
        }elseif($type === 'type'){
             $string = '';
            //查看当前属性值
            $value = Value::where('id',$id)->first();
            $string = $value->bute_id.':'.$id;
            // dd($string);
            // dd($value->bute_id);
            //获取属性名
            $bute = Bute::where('id',$value->bute_id)->first();
            // dd($bute->type_id);
            // 获取顶级分类
            $node = Type::where('id',$bute->type_id)->first();
            //获取顶级分类下的所有子分类
            $type = $node->getLeaves();
            foreach ($type as $key => $value) {
                        $tid[] = $value->id;
                    }
            if($order !== null){
                //获取子分类下的所有商品
                return $list = Goods::whereIn('type_id',$tid)->where('bid','like',"%$string%")->orderby($order,$by)->paginate(env('PAGE_SIZE',10));      
            }else{
                //获取子分类下的所有商品
                return $list = Goods::whereIn('type_id',$tid)->where('bid','like',"%$string%")->paginate(env('PAGE_SIZE',10));      
            }
            
        }
        
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,$type='null',$order=null)
    {
        // dd($type,$order);
        //导航栏
        $array = Type::with('bute.value')->get()->toHierarchy();
        $list = $this->selected($id,$type,$order);
        // dd($list->toArray());
        return view('index.list',['array'=>$array,'list'=>$list,'id'=>$id,'type'=>$type,'order'=>$order]);
    }
    

    public function detail($id)
    {
        //导航栏
        $array = Type::with('bute.value')->get()->toHierarchy();
        $comment = Comment::with('member')->where('sid',$id)->paginate(env('PAGE_SIZE',10));
        // dd($comment->toArray());
        $list = Goods::where('id',$id)->first();
        return view('index.detail',['array'=>$array,'list'=>$list,'comment'=>$comment]);
    }
}
