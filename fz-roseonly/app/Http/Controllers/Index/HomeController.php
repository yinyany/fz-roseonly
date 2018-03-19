<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Model\Index\Home;
use App\Model\Admin\Member;
use App\Model\Admin\Type;
use App\Model\Admin\Carousel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        $array = Type::get()->toHierarchy();

        $banner = Carousel::where('state','启用')->get();
        $count  = Carousel::where('state','启用')->count();
        return view('index.index',['array' => $array,'banner'=>$banner,'count'=>$count]);
    }

    /**
     * 点击用户名跳转个人中心
     *
     * @return \Illuminate\Http\Response
     */
    public function member($id)
    {   
         //导航栏
        $array = Type::get()->toHierarchy();
        // dd($datas);
        $model = Member::findOrFail($id);
        return view('index.person3',['model'=>$model,'array'=>$array]);
    }

    /**
     * 个人中心修改用户密码
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
     * 执行修改个人信息
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 首页banner图
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function banner()
    {
        $banner = Carousel::all();
        $count  = Carousel::count();
        return view();
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
        // if($field->isValid()){
        //     //获取文件的后缀
        //     $ext = $field->getClientOriginalExtension();
        //     $newName = md5(time().rand(1,6666)).'.'.$ext;
        //     $path = $field->move(public_path().'/uploads/member',$newName);
        //     return ['code'=>0,'msg'=>'','data'=>['src'=>$newName]];
        // }
    }
}
