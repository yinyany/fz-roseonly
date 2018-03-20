<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Member;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MemberController extends Controller
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
            $member = Member::where('name','like',"%$keywords%")->orderBy('id','desc')->paginate(env('PAGE_SIZE',10));
            $sum = Member::where('name','like',"%$keywords%")->count();

        }else{
            $member = Member::orderBy('id','desc')->paginate(env('PAGE_SIZE',10));
            $sum = Member::count();
        }
        
        
        // dd($sum);
        return view('admin.member.member',['member'=>$member,'sum'=>$sum,'keywords'=>$keywords]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|unique:member|max:36',
        //     'phone' => 'required|unique:member|digits:11',
        //     'email' => 'required|email',
        //     'sex' => 'required|in:男,女',
        //     'password' => 'required|confirmed|min:6',
        // ],[
        //     'name.required' => '用户名必填',
        //     'name.unique' => '用户名已存在',
        //     'name.max' => '用户名最长36位',

        //     'phone.required' => '手机号必填',
        //     'phone.unique' => '此手机号已注册',
        //     'phone.digits' => '手机号为11位',

        //     'email.required' => '邮箱必填',
        //     'email.email' => '邮箱格式错误',

        //     'sex.required' => '性别必填',
        //     'sex.in' => '性别单选"男"或"女"',

        //     'password.required' => '密码必填',
        //     'password.confirmed' => '两次密码不一样',
        //     'password.min'  => '密码最小6位',
        // ]);
        // dd($request->all());
        // $member = Member::create($request->all());
        if (Member::create($request->all())) {
            flash()->overlay('添加成功', 1);
            return redirect('admin/member');
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
        $model = Member::findOrFail($id);
        return view('admin.member.details',['model'=>$model]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Member::findOrFail($id);
        return view('admin.member.edit',['model'=>$model]);
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
        $model = Member::where('id',$id)->update(['state'=>$request->state]);
        // dd($model);
        if ($model) {
            flash()->overlay('修改成功', 1);
            return redirect('admin/member');
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
        // Member::destroy($id);
        if (Member::destroy($id)) {
            flash()->overlay('删除成功', 1);
            return redirect('admin/member');
        }else{
            flash()->overlay('删除失败', 5);
            return back();
        }
    }
}
