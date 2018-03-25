<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Bute;
use App\Model\Admin\Value;
use App\Model\Admin\Type;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ButeController extends Controller
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
            $bute = Bute::where('name','like',"%$keywords%")->orderBy('id','desc')->paginate(env('PAGE_SIZE',10));
            $count = Bute::where('name','like',"%$keywords%")->count();

        }else{
            $bute = Bute::orderBy('id','desc')->paginate(env('PAGE_SIZE',10));
            $count = Bute::count();
        }
        $data = Type::get(['id','name'])->toArray();
        $datas = [];
        foreach ($data as $k => $v) {
            $datas[$v['id']] = $v['name'];
        }
        // dd($datas);
        return view('admin.bute.index',['bute'=>$bute,'count'=>$count,'keywords'=>$keywords,'datas'=>$datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $list = Type::where('parent_id',null)->get();
        return view('admin.bute.create',['list'=>$list]);
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
        if($request->type_id==0){
            flash()->overlay('请选择类别', 5);
            return back();
        }
        $this->validate($request, [
            'name' => 'required|max:16',
        ],[
            'name.required' => '属性名必填',
            'name.max' => '属性名最长16位',
        ]);
        $data = Bute::create(['name' =>$request->name,'type_id'=>$request->input('type_id'),'state'=>$request->state]);
        if($data) {
            flash()->overlay('添加成功', 1);
            return redirect('admin/bute');
        }else{
            flash()->overlay('添加失败', 5);
            return back();
        }
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
        //查询该属性名
        $bute = Bute::findOrFail($id);
        // 查询所有的1级类
        $list = Type::where('parent_id',null)->get();
        $info = Type::where('id',$bute->type_id)->first()->getRoot();
        $value = $info->getLeaves();
        //所有的2级类
        $data = Type::where('parent_id',$info->id)->get();
        $bbb = Type::where('id',$bute->type_id)->first();
        // 找出这个商品的2级类
        $ccc = Type::where('id',$bbb->parent_id)->first();
        return view('admin.bute.edit',['bute'=>$bute,'list'=>$list,'info'=>$info,'value'=>$value,'data'=>$data,'ccc'=>$ccc,'bbb'=>$bbb]);
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
        $input = $request->except('_token');
        $this->validate($request, [
            'name' => 'required|max:16',
        ],[
            'name.required' => '属性名必填',
            'name.max' => '属性名最长16位',
        ]);
        $bute = Bute::where('id',$id)->update($input);
        // dd($bute);
        if ($bute) {
            flash()->overlay('修改成功', 1);
            return redirect('admin/bute');
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
        $info = Value::where('bute_id',$id)->get();
        if(count($info)){
            flash()->overlay('删除失败,当前属性下面有值', 5);
            return back(); 
        }
        if (Bute::destroy($id)) {
            Value::where('bute_id',$id)->delete();
            flash()->overlay('删除成功', 1);
            return redirect('admin/bute');
        }else{
            flash()->overlay('删除失败', 5);
            return back();
        }
    }


}
