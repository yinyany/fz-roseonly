<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Model\Index\Home;
use App\Model\Admin\Member;
use App\Model\Admin\Type;
use App\Model\Admin\Bute;
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
        $array = Type::with('bute.value')->get()->toHierarchy();
        // $bute =  Bute::where('state','单选')->get();
        // dd($array->toArray());
        $banner = Carousel::where('state','启用')->get();
        $count  = Carousel::where('state','启用')->count();
        return view('index.index',['array' => $array,'banner'=>$banner,'count'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function member($id)
    {   
         //导航栏
        $array = Type::with('bute.value')->get()->toHierarchy();
        
        // dd($datas);
        $model = Member::findOrFail($id);
        return view('index.person3',['model'=>$model,'array'=>$array]);
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
    public function newmember(Request $request)
    {
        //接受图片信息
        $field = $request->file('imgurl');
        $data = $request->id;
        if($field->isValid()){
            $ext = $field->getClientOriginalExtension();
            $newName = md5(time().rand(1,6666)).'.'.$ext;
            Member::where('id',$data)->update(['imgurl'=>$newName]);
            $path = $field->move(public_path().'/uploads/picture',$newName);
            return ['code'=>0,'msg'=>'','data'=>['src'=>$newName,'data'=>$data]];
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
        $this->validate($request, [
            'fere' => 'max:36',
            'fere_phone' => 'digits:11',
            'phone' => 'required|digits:11',
            'email' => 'required|email',
        ],[
            'fere.max' => '姓名最长36位',
            'fere_phone.digits' => '手机号为11位',
            'phone.required' => '手机号必填',
            'phone.digits' => '手机号为11位',
            'email.required' => '邮箱必填',
            'email.email' => '邮箱格式错误',
        ]);
        $id = $request->id;
        dd($request->name);
        $data = Member::where('id',$id)->update(['name'=>$request->name,'fere'=>$request->fere,'phone'=>$request->phone,'fere_phone'=>$request->fere_phone,'birthday'=>$request->birthday,'sex'=>$request->sex,'address'=>$request->address,'email'=>$request->email,'affective'=>$request->affective]);
        if($data>0){
            flash()->overlay('修改成功', 1);
            return back();
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
        //
    }

    public function picture(Request $request)
    {   
       
    }
}
