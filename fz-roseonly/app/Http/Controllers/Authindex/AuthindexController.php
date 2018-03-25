<?php

namespace App\Http\Controllers\Authindex;

use Illuminate\Http\Request;
use App\Model\Admin\Member;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\Model\Admin\Goods_shopcar;
use App\Model\Admin\Goods;


class AuthindexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('authindex.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dologin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha',
        ],[
            "name.required"=>'用户名必填',
            
            'password.required'=>'密码必填',
        ]);
        // dd($request->password);

        $info = ['name'=>$request->name,'password'=>$request->password];
        // dd($info['name']);
        //验证账号是否存在
        $user = Member::where('name',$info['name'])->first();

        // dd($userId);
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
        // dd($user->password,bcrypt($request->password));
        //验证密码是否正确 bcrypt($data['password'])
        if ($user->password !== md5($request->password)) {
            flash()->overlay('密码错误', 5);
            return back();
        }

        $userInfo = $user->toArray();
        // dd($userInfo);
        $userId = $userInfo['id'];
        // //登陆成功
        //放置登陆信息,位置登陆状态
        $request->session()->put('usersInfo', $user->toArray());
        // session(['usersInfo' => $user->toArray()]);

         //查询出会员的id是多少，再通过购物车查商品
        $shopcar = Goods_shopcar::with('goods')->where('member_id',$userId)->get();

        // dd($shopcar->toArray());
        $shopgoods = $shopcar->toArray();
        $request->session()->put('usersInfo.shopnum',count($shopgoods));

        // session(['usersInfo'=>$user->toArray()]);
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        //清空session
        session()->forget('usersInfo');
        // session('usersInfo',null);
        //跳到登陆页
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reset()
    {
        return view('authindex.register');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postreset(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:32|unique:member',
            'email' => 'required|email|max:255|unique:member',
            'password' => 'required|confirmed|min:6',
            'captcha' => 'required|captcha',
        ],[
            'name.required'=>'用户名必填',
            'name.max'=>'用户名过长,最大32位',
            'name.unique'=>'此用户名已存在',

            'email.required'=>'邮箱必填',
            'email.email'=>'邮箱格式错误',
            'email.max'=>'email最长255位',
            'email.unique'=>'此邮箱已注册',

            'password.required'=>'密码必填',
            'password.confirmed'=>'两次输入密码不同',
            'password.min'=>'密码最小6位',
        ]);

        // dd($request); bcrypt($data['password'])
        // $input = $request->except('_token');
        $flight = Member::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => md5($request->password),
        ]);
        // dd($flight);
        if($flight) {
            flash()->overlay('注册成功', 1);
            return redirect('authindex/login');
        }else{
            flash()->overlay('注册失败', 5);
            return back();
        }
    }


}
