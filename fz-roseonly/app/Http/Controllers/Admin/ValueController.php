<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Value;
use App\Model\Admin\Goods;
use App\Model\Admin\Bute;
use App\Model\Admin\Type;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ValueController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('role:admin');
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
            $values = Value::where('name','like',"%$keywords%")->orderBy('id','desc')->paginate(env('PAGE_SIZE',10)); 
            $count = Value::where('name','like',"%$keywords%")->count();

        }else{
            $values = Value::orderBy('id','desc')->paginate(env('PAGE_SIZE',10));
            $count = Value::count();
        }
        $data = Bute::get(['id','name','type_id'])->toArray();
        $type = Type::get(['id','name'])->toArray();
        $datas = [];
        $types = [];
        $typeid = [];
        foreach($type as $k => $v){
            $typeid[$v['id']] = $v['name'];
        }
        foreach ($data as $k => $v) {
            $datas[$v['id']] = $v['name'];
            $types[$v['id']] = $v['type_id'];
        }
        return view('admin.values.index',['values'=>$values,'count'=>$count,'keywords'=>$keywords,'datas'=>$datas,'types'=>$types,'typeid'=>$typeid ]);
    }


     public function upload(Request $request)
    {   
        //接受图片信息
        $field = $request->file('imgurl');
        if($field->isValid()){
            //获取文件的后缀
            $ext = $field->getClientOriginalExtension();
            $newName = md5(time().rand(1,6666)).'.'.$ext;
            $path = $field->move(public_path().'/uploads/values',$newName);
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
        $data = Type::where('parent_id',null)->get();
        return view('admin.values.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if($request->type_id==0){
            flash()->overlay('请选择商品类名', 5);
            return back();
        }
        if($request->bute_id==0){
            flash()->overlay('请选择属性名', 5);
            return back();
        }
        $data = Bute::where('id',$request->bute_id)->first();
        $this->validate($request, [
            'name' => 'required|max:16',
        ],[
            'name.required' => '属性值必填',
            'name.max' => '属性值最长16位',
        ]);
        $datas = new Value;
        $datas->name = $request->input("name");
        $datas->bute_id = $data->id;
        $datas->save();
        flash()->overlay('添加成功',1);
        return redirect('/admin/values');        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $values = Value::findOrFail($id);
        $data = Bute::get(['id','name'])->toArray();
        $datas = [];
        foreach ($data as $k => $v) {
            $datas[$v['id']] = $v['name'];
        }
        return view('admin.values.edit',['values'=>$values,'datas'=>$datas]);
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
        $input['name'] = $request->name;
        $values = Value::where('id',$id)->update($input);
        // dd($values);
        if ($values) {
            flash()->overlay('修改成功', 1);
            return redirect('admin/values');
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
        $data = Goods::get();
        // dd($data);
        foreach ($data as  $v) {
            // dd (strpos($v->bid,"$id"));
            if(strpos($v->bid,"$id")  > 0){
               flash()->overlay('删除失败,当前属性值正在出售', 5);
               return back(); 
            }
        }
        // dd();
        if (Value::destroy($id)) {
            flash()->overlay('删除成功', 1);
            return redirect('admin/values');
        }else{
            flash()->overlay('删除失败', 5);
            return back();
        }
    }
    //获取属性名
    public function values(Request $request){
        $attr = Bute::where('type_id',$request->id)->get();
        return ['code'=>0,'msg'=>'','data'=>$attr];
    }
}
