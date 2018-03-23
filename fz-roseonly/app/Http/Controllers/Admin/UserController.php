<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Admin\Role;

class UserController extends Controller
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
            $user = User::where('name','like',"%$keywords%")->orderBy('id','desc')->paginate(env('PAGE_SIZE',10));
            $sum = User::where('name','like',"%$keywords%")->count();

        }else{
            $user = User::orderBy('id','desc')->paginate(env('PAGE_SIZE',10));
            $sum = User::count();
        }
        
        // dd($sum);
        return view('admin.user.user',['user'=>$user,'sum'=>$sum,'keywords'=>$keywords]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'name' => 'required|unique:users|max:36',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ],[
            'name.required' => '用户名必填',
            'name.unique' => '用户名已存在',
            'name.max' => '用户名最长36位',

            'email.required' => '邮箱必填',
            'email.unique' => '此邮箱已注册',
            'email.email' => '邮箱格式错误',

            'password.required' => '密码必填',
            'password.confirmed' => '两次密码不一样',
            'password.min'  => '密码最小6位',
        ]);
        $User = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'state' => $request->state,
            'password' => bcrypt($request->password),
        ]);
        if ($User) {
            flash()->overlay('添加成功', 1);
            return redirect('admin/user');
        }else{
            flash()->overlay('添加失败', 5);
            return back();
        }
    }

    /**
     * 加载修改状态页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function state($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.updatestate',['user'=>$user]);
    }

    /**
     * 执行修改状态
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatestate(Request $request,$id)
    {
        $user = User::where('id', $id)->update(['state'=>$request->state]);
        if ($user) {
            flash()->overlay('修改成功', 1);
            return redirect('admin/user');
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
        $user = User::with('roles')->findOrFail($id);
        // dd($user->toArray());
        $role = Role::all();
        return view('admin.user.edit',['user'=>$user,'role'=>$role]);
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
        $roleData = $request->name;
 
        $user = User::findOrFail($id);

        $roleId = $request->input('rid',[]);
        // dd($roleData);
        // Role::where('id', $id)->update(['description' => $roleData]);
       
        $user->roles()->sync($roleId);

        flash()->overlay('分配成功', 1);
        return redirect('admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (User::destroy($id)) {
            flash()->overlay('删除成功', 1);
            return redirect('admin/user');
        }else{
            flash()->overlay('删除失败', 5);
            return back();
        }
    }
}
