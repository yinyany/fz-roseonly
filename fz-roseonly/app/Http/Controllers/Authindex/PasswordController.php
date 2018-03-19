<?php

namespace App\Http\Controllers\Authindex;

use Illuminate\Http\Request;
use App\Model\Admin\Member;
use Mail;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEmail()
    {
        return view('authindex.login_edit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
        ],[
            "email.required"=>'邮件必填',
        ]);
        // dd($request->password);
        // dd($info['name']);
        //验证账号是否存在
        $user = Member::where('email',$request->email)->first();
        if (!$user) {
            flash()->overlay('账号不存在', 5);
            return back();
        }
        // dd($user->toArray());

        //验证账号是否被禁用
        if ($user->state === '禁用') {
            flash()->overlay('账号被禁用', 5);
            return back();
        }

        $email = $user->email;
        $data = rand(100000,999999);
        session(['data' => $data]);
        session(['email' => $email]);

        $flag = Mail::send('emails.test',['data'=>$data],function($message) use ($email){
            $message ->to($email)->subject('找回密码');
        });
        if($flag){
            flash()->overlay('发送邮件成功,请查收', 1);
            return redirect('authindex/reset');
        }else{
            flash()->overlay('发送邮件失败,请重试', 5);
            return back();
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getReset()
    {
        return view('authindex.login_register');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postReset(Request $request)
    {
        //验证验证码是否正确
        // dd(session('data'),$request->key);
        if ($request->key != session('data')) {
            flash()->overlay('验证码错误', 5);
            return back();
        }

        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ],[
            'password.required'=>'密码必填',
            'password.confirmed'=>'两次输入密码不同',
            'password.min'=>'密码最小6位',
        ]);

        // dd($request->key);
        $flight = Member::where('email', session('email'))->update(['password' => md5($request->password)]);
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
}
