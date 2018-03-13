<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Type;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TypeController extends Controller
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
                $type = Type::where('name','like',"%$keywords%")->orderBy('id','desc')->paginate(env('PAGE_SIZE',10));
                $count = Type::where('name','like',"%$keywords%")->count();

            }else{
                $type = Type::orderBy('name','desc')->paginate(env('PAGE_SIZE',10));
                $count = Type::count();
            }
            return view('admin.type.index',['type'=>$type,'count'=>$count,'keywords'=>$keywords]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $id = $_GET['id']?$_GET['id']:null;

        $type = Type::findOrFail($id);
        dd($type);
        return view('admin.type.create',['id'=>$id]);
    }


    public function upload(Request $request)
    {   
        //接受图片信息
        $field = $request->file('imgurl');
        //判读图片是否为正常图片
        if($field->isValid()){
            //获取文件的后缀
            $ext = $field->getClientOriginalExtension();
            //给文件重新起个名字
            $newName = md5(time().rand(1,6666)).'.'.$ext;
            //移动文件
            $path = $field->move(public_path().'/uploads',$newName);
            return ['code'=>0,'msg'=>'','data'=>['src'=>$newName]];
        }
        
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
            'name' => 'required|unique:types|max:16',
        ],[
            'name.required' => '类名必填',
            'name.unique' => '类名已存在',
            'name.max' => '类名最长16位',
        ]);
        if (!$request->has('imgurl')) {
            flash()->overlay('上传图片错误', 5);
            return back();
        }
        $type = new Type;
        $type->imgurl = $request->input("imgurl"); 
        $type->name = $request->input("name");
        $type->save();
        flash()->overlay('添加成功',1);
        return redirect('/admin/type');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {   
        $type = Type::where('parent_id',null)->paginate(env('PAGE_SIZE',10));
        $types = Type::where('parent_id',!null)->paginate(env('PAGE_SIZE',10));
        
        
        return view('admin.type.show',['type'=>$type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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


    public function type()
    {
        
    }

}
