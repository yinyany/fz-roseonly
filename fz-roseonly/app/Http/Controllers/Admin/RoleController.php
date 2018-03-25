<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Admin\Role;
use App\Model\Admin\Permission;

class RoleController extends Controller
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
            $roles = Role::where('name','like',"%$keywords%")->orderBy('id','desc')->paginate(env('PAGE_SIZE',10));
            $sum = Role::where('name','like',"%$keywords%")->count();

        }else{
            $roles = Role::orderBy('id','desc')->paginate(env('PAGE_SIZE',10));
            $sum = Role::count();
        }
        
        
        // dd($sum);
        return view('admin.role.role',['roles'=>$roles,'sum'=>$sum,'keywords'=>$keywords]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
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
            'name' => 'required|unique:roles|max:36',
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
        $role = Role::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description,
        ]);
        if($role) {
            flash()->overlay('添加成功', 1);
            return redirect('admin/role');
        }else{
            flash()->overlay('添加失败', 5);
            return back();
        }
    }

    /**
     * 加载修改角色页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function data($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.role.updatedata',['role'=>$role]);
    }

    /**
     * 执行修改角色
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatedata(Request $request,$id)
    {
        $input = $request->except('_token');
        $Role = Role::where('id',$id)->update($input);
        // dd($model);
        if ($Role) {
            flash()->overlay('修改成功', 1);
            return redirect('admin/role');
        }else{
            flash()->overlay('修改失败', 5);
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
        $role = Role::with('perms')->findOrFail($id);
        // dd($role->toArray());
        $pers = Permission::all();
        return view('admin.role.edit',['role'=>$role,'pers'=>$pers]);
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
        // dd($request->all());
        $roleData = $request->description;

        $role = Role::findOrFail($id);
        $role->description = $roleData;
        $role->save();

        $perPid = $request->input('pid',[]);

        $role->perms()->sync($perPid);

        flash()->overlay('分配成功', 1);
        return redirect('admin/role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Role::destroy($id)) {
            flash()->overlay('删除成功', 1);
            return redirect('admin/role');
        }else{
            flash()->overlay('删除失败', 5);
            return back();
        }
    }
}
