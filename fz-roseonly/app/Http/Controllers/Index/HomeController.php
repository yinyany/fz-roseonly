<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Model\Index\Home;
use App\Model\Admin\Member;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Admin\Type;
use App\Model\Admin\Carousel;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //导航栏
        $list = Type::where('depth',0)->get();
        // dd($list->toArray());
        // $data[] = $list[1]->getImmediateDescendants()->toArray();
        $datas = [];
        foreach ($list as $key => $value) {
            $datas[] = $value->getDescendantsAndSelf()->toHierarchy();
        }
        // dd($datas);
        foreach ($datas as $key => $value) {
            foreach ($value as $key => $v) {
                $array[] = $v;
            }
        }
        // dd($array);
        //banner
        $banner = Carousel::where('state','启用')->get();
        $count  = Carousel::where('state','启用')->count();
        return view('index.index',['banner'=>$banner,'count'=>$count,'array'=>$array]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function member($id)
    {
        $model = Member::findOrFail($id);
        return view('index.person3',['model'=>$model]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function newpass(Request $request,$id)
    {
        $model = Member::findOrFail($id);
        if($model->password != md5($request->oldpass)){
            flash()->overlay('原始密码错误', 5);
            return back();
        }

        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ],[
            'password.required'=>'密码必填',
            'password.confirmed'=>'两次输入密码不同',
            'password.min'=>'密码最小6位',
        ]);

        $flight = Member::where('id',$id)->update(['password' => md5($request->password)]);
        // dd($flight);
        if($flight) {
            flash()->overlay('修改成功,请登陆', 1);
            return redirect('authindex/login');
        }else{
            flash()->overlay('修改失败,请重试', 5);
            return back();
        }
    }

    /**
     * 修改个人信息(上传头像)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function newmember($id)
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

    public function mmm(Request $request)
    {
        //接受图片信息
        $field = $request->all();
        var_dump($field);
        $array=explode('.', $field);
        var_dump($array);
            // //获取文件的后缀
            // $ext = $field->getClientOriginalExtension();
            // $newName = md5(time().rand(1,6666)).'.'.$ext;
            // $path = $field->move(public_path().'/uploads/member',$newName);
            // return ['code'=>0,'msg'=>'','data'=>['src'=>$newName]];
    }
}
