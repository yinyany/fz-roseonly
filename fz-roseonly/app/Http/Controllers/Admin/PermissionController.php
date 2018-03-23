<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Admin\Permission;

class PermissionController extends Controller
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
            $permission = Permission::where('name','like',"%$keywords%")->orderBy('id','desc')->paginate(env('PAGE_SIZE',10));
            $sum = Permission::where('name','like',"%$keywords%")->count();

        }else{
            $permission = Permission::orderBy('id','desc')->paginate(env('PAGE_SIZE',10));
            $sum = Permission::count();
        }
        
        
        // dd($sum);
        return view('admin.pers.pers',['permission'=>$permission,'sum'=>$sum,'keywords'=>$keywords]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pers.create');
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
            'name' => 'required|unique:permissions|max:36',
            'display_name' => 'required',
            'description' => 'required',
        ],[
            'name.required' => '角色名必填',
            'name.unique' => '角色名已存在',
            'name.max' => '角色名最长36位',

            'display_name.required' => '权力规则必填',

            'description.required' => '角色描述',
        ]);
        // dd($request->description);
        $Permission = Permission::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description,
        ]);
        if($Permission) {
            flash()->overlay('添加成功', 1);
            return redirect('admin/pers');
        }else{
            flash()->overlay('添加失败', 5);
            return back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Permission = Permission::findOrFail($id);
        // dd($Permission);
        return view('admin.pers.edit',['Permission'=>$Permission]);
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
        // dd($request->state);
        $input = $request->except('_token');
        $Permission = Permission::where('id',$id)->update($input);
        // dd($model);
        if ($Permission) {
            flash()->overlay('修改成功', 1);
            return redirect('admin/pers');
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
        if (Permission::destroy($id)) {
            flash()->overlay('删除成功', 1);
            return redirect('admin/role');
        }else{
            flash()->overlay('删除失败', 5);
            return back();
        }
    }
}
