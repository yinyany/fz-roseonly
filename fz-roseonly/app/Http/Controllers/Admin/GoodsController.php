<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Goods;
use App\Model\Admin\Type;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $where=[];
        $keywords = $request->name;
        if ($keywords != '') {
            $goods = Goods::where('name','like',"%$keywords%")->orderBy('id','desc')->paginate(env('PAGE_SIZE',10)); 
            $count = Goods::where('name','like',"%$keywords%")->count();

        }else{
            $goods = Goods::orderBy('id','desc')->paginate(env('PAGE_SIZE',10));
            $count = Goods::count();
        }
        $data = Type::get(['id','name'])->toArray();
        $datas = [];
        foreach ($data as $k => $v) {
            $datas[$v['id']] = $v['name'];
        }
        return view('admin.goods.index',['goods'=>$goods,'count'=>$count,'keywords'=>$keywords,
            'datas'=>$datas]);
    }


    public function upload(Request $request)
    {   
        //接受图片信息
        $field = $request->file('imgurl');

        if($field->isValid()){
            //获取文件的后缀
            $ext = $field->getClientOriginalExtension();
            $newName = md5(time().rand(1,6666)).'.'.$ext;
            $path = $field->move(public_path().'/uploads',$newName);
            return ['code'=>0,'msg'=>'','data'=>['src'=>$newName]];
        }
        
    }



    /**
     * Show the form for creating a new resource.   
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $list = Type::where('parent_id',null)->get();
        return view('admin.goods.create',['list'=>$list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:16',
        ],[
            'name.required' => '商品名必填',
            'name.max' => '商品名最长16位',
        ]);
        if (!$request->has('imgurl')) {
            flash()->overlay('上传图片错误', 5);
            return back();
        }
        $goods = new Goods;
        $goods->imgurl = $request->input("imgurl"); 
        $goods->name = $request->input("name");
        $goods->state = $request->input('state');
        $goods->type_id = $request->input('type_id');
        $goods->save();
        flash()->overlay('添加成功',1);
        return redirect('/admin/goods'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {   

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        //获取要修改的数据
        $goods = Goods::findOrFail($id);
        // dd($goods);
        //获取商品的3级类
        $info = Type::where('id',$goods->type_id)->first();
        // $data = $info->getRoot();
        dd($info);
        // dd($info->parent_id);
        //查询商品的2级类
        // $datas = Type::where('id',$info->parent_id)->first();
        // $child = Type::where('parent_id',$datas->id)->get();
        //查询商品的1级类
        // $parent = $info->getRoot();
        //查询父类为根类的所有子类
        // $data = Type::where('parent_id',$info->id)->get();
        //查询1级类
        $list = Type::where('parent_id',null)->get();
        return view('admin.goods.edit',['goods'=>$goods,'list'=>$list,'info'=>$info]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         if (!$request->has('imgurl')) {
            flash()->overlay('上传图片错误', 5);
            return back();
        }
        // dd($request->input('type_id'));
        $goods = Goods::where('id',$id)->update(['state'=>$request->state,'imgurl'=>$request->imgurl,'name'=>$request->name,'type_id'=>$request->input('type_id')]);
        if ($goods) {
            flash()->overlay('修改成功', 1);
            return redirect('admin/goods');
        }else{
            flash()->overlay('修改失败', 5);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function good(Request $request){
        $info = Type::where('id',$request->id)->first();
        $value = $info->getImmediateDescendants();
        return ['code'=>0,'msg'=>'','data'=>$value];
    }
}
