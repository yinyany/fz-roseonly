<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Value;
use App\Model\Admin\Bute;
use App\Model\Admin\Type;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ValueController extends Controller
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
            $values = Value::where('name','like',"%$keywords%")->orderBy('id','desc')->paginate(env('PAGE_SIZE',10)); 
            $count = Value::where('name','like',"%$keywords%")->count();

        }else{
            $values = Value::orderBy('id','desc')->paginate(env('PAGE_SIZE',10));
            $count = Value::count();
        }
        $data = Bute::get(['id','name'])->toArray();
        $datas = [];
        foreach ($data as $k => $v) {
            $datas[$v['id']] = $v['name'];
        }
        return view('admin.values.index',['values'=>$values,'count'=>$count,'keywords'=>$keywords,'datas'=>$datas]);
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
        if($request->bute_id==0){
            flash()->overlay('请选择属性名', 5);
            return back();
        }
        //
        $data = Bute::where('id',$request->bute_id)->first();
        $this->validate($request, [
            'name' => 'required|max:16',
        ],[
            'name.required' => '属性值必填',
            'name.max' => '属性值最长16位',
        ]);
        $datas = new Value;
        $datas->imgurl = $request->input("imgurl"); 
        $datas->name = $request->input("name");
        $datas->bute_id = $data->id;
        $datas->save();
        flash()->overlay('添加成功',1);
        return redirect('/admin/values');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        if (!$request->has('imgurl')) {
            flash()->overlay('上传图片错误', 5);
            return back();
        }
        $input['name'] = $request->name;
        $input['imgurl'] = $request->imgurl;
        // dd($input);
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
        if (Value::destroy($id)) {
            flash()->overlay('删除成功', 1);
            return redirect('admin/values');
        }else{
            flash()->overlay('删除失败', 5);
            return back();
        }
    }

    public function value(Request $request){
        $info = Type::where('id',$request->id)->first();
        $value = $info->getImmediateDescendants();
        return ['code'=>0,'msg'=>'','data'=>$value];
    }

    public function values(Request $request){
        $attr = Bute::where('type_id',$request->id)->get();
        return ['code'=>0,'msg'=>'','data'=>$attr];
    }
}
