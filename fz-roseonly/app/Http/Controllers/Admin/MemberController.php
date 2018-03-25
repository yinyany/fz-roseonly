<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Member;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('role:admin|member');
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
        if (Member::destroy($id)) {
            flash()->overlay('删除成功', 1);
            return redirect('admin/member');
        }else{
            flash()->overlay('删除失败', 5);
            return back();
        }
    }
}
