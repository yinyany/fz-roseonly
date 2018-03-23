<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Goods;
use App\Model\Admin\Type;
use App\Model\Admin\Stock;
use App\Model\Admin\Bute;
use App\Model\Admin\Value;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['role:admin']);
    // }
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
        //显示商品类别名
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
            $path = $field->move(public_path().'/uploads/good',$newName);
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
        // dd($request->all());
        if($request->type_id == 0){
            flash()->overlay('请选择类名', 5);
            return back();
        }
        $this->validate($request, [
            'name' => 'required|max:50',
            'content' => 'required',
            'price' => 'required|numeric',
        ],[
            'name.required' => '商品名必填',
            'content.required' => '内容必填',
            'name.max' => '商品名最长50位',
            'price.required' => '价格必填',
            'price.numeric' => '价格格式不正确',
        ]);
        if (!$request->has('imgurl')) {
            flash()->overlay('上传图片错误', 5);
            return back();
        }

        //属性值id集合
        $vid =$request->vid;
        //定义空的属性集合
        $vidStr = '';
        //多选属性名id
        $arrtId = '';
        //多选属性值
        $colorArr = [];
        // dd($vid);
        //商品属性
        foreach($vid as $k => $v){
            if(!is_array($v)){
                $vidStr.=$k.":".$v.",";
            }else{
                $arrtId = $k;
                $colorArr=$v;
            }
        }

        foreach($colorArr as $value) {
            $dd = $vidStr;
            $dd .= $arrtId.":".$value;
            $goods = new Goods;
            $goods->imgurl = $request->input("imgurl"); 
            $goods->name = $request->input("name");
            $goods->state = $request->input('state');
            $goods->type_id = $request->input('type_id');
            $goods->content = $request->input('content');
            $goods->price =$request->price;
            $goods->stock =$request->stock;
            $goods->bid =$dd;
            // dd($goods->bid);
            $goods->save();
        }
        
        flash()->overlay('添加成功',1);
        return redirect('/admin/goods');
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
        // 查询所有的1级类
        $info = Type::where('id',$goods->type_id)->first()->getRoot();
        // dd($info);
        $value = Type::where('id',$goods->type_id)->first();
        // dd($goods);
        return view('admin.goods.edit',['goods'=>$goods,'info'=>$info,'value'=>$value]);
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
        if($request->type_id==0){
            flash()->overlay('请选择类名', 5);
            return back();
        }
         if (!$request->has('imgurl')) {
            flash()->overlay('上传图片错误', 5);
            return back();
        }
        // dd($request->input('type_id'));
        $input['state'] = $request->state;
        $input['imgurl'] = $request->imgurl;
        $input['name'] = $request->name;
        $input['type_id'] = $request->type_id;
        $input['content'] = $request->content;
        $input['price'] = $request->price;
        $input['stock'] = $request->stock;
        $goods = Goods::where('id',$id)->update($input);
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
       if (Goods::destroy($id)) {
            flash()->overlay('删除成功', 1);
            return redirect('admin/goods');
        }else{
            flash()->overlay('删除失败', 5);
            return back();
        } 
    }
   
    //获取属性名的方法
    public function attr(Request $request){
        $attr = Bute::where('type_id',$request->id)->get();
        $info = Type::where('id',$request->id)->first();
        $value = $info->getImmediateDescendants();
        return ['code'=>0,'msg'=>'','data'=>['attr'=>$attr,'value'=>$value]];
    }
    //获取属性值得方法
    public function value(Request $request){
        //根据ajax传过来id查值
        $info = Value::where('bute_id',$request->id)->get();
        $bute = Bute::where('id',$request->id)->first();
        return ['code'=>0,'msg'=>'','data'=>['data'=>$info,'bute'=>$bute]];
    }
    //获取多选后的单选
    public function color(Request $request){
        $data = $request->id;
        return ['code'=>0,'msg'=>'','data'=>$data];
    }
}
