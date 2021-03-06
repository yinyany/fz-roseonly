<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Admin\Member;
use App\Model\Admin\Order_goods;
use App\Model\Admin\Order;


class OrderhomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       //-------以前的获取session方法---------------- 

        // // dd($request->session()->has('usersInfo'));
        // if(!$request->session()->has('usersInfo')){
        //     return view('authindex.login');
        // }
        // $value = $request->session()->all();
        // // dd($value['usersInfo']['id']);
        // $memid = $value['usersInfo']['id'];


         // ------------优化后的获取session的方法-----------
        if (session('usersInfo') == NULL) {
            return view('authindex/login');
        }

        $memid = session('usersInfo')['id'];
        
        //查询出会员的id是多少，再通过购物车查商品
        $order = Order::where('member_id',$memid)->get();


        dd($order->toArray());

        // $a = $order_goods->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
      
        // $order = Order::where('id',$id)->update(['pay_time'=>$pay_time,'is_pay'=>1]);
    }


    public function querensh($id)
    {

        if (session('usersInfo') == NULL) {
            return view('authindex/login');
        }
        $memid = session('usersInfo')['id'];

        $date = time();

         $order = Order::where('id',$id)->update(['receipt_time'=>$date,'is_receipt'=>1]);

        return  redirect("shopcar/show/$memid");
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


            
        $id = $request->id;

        $ordergoods = Order::with('order_goods')->where('id',$id)->first();
        // dd($ordergoods->toArray());
        $a = $ordergoods->toArray();
        $b =  $a['order_goods'];
        // dd(count($b));
      
        $password = $request->zhifu;

         $passwrds = md5($password);
        // dd($passwrds);
        // dd('123123');
        // dd($id);
        if (session('usersInfo') == NULL) {     
            return view('authindex/login');
        }
        $memid = session('usersInfo')['id'];
        
        $memberinfo = Member::where('id',$memid)->first();

        $mem = $memberinfo->toArray();
        // dd($memberinfo->toArray());
        $zfpass = $mem['zfpass'];
        // dd($mem['zfpass']);
        if($passwrds == $zfpass){
           $pay_time = time();
            $order = Order::where('id',$id)->update(['pay_time'=>$pay_time,'is_pay'=>1]);
            if ($order) {
            flash()->overlay('支付成功', 1);
            // for(){

            // }
            return redirect("shopcar/show/$memid");                                       
            }                                      
        }else{
            flash()->overlay('支付密码错误', 5);
            return  back();
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
        if (Order::destroy($id)) {
            // flash()->overlay('删除成功', 1);
            return back();
        }else{
            // flash()->overlay('删除失败', 5);
            return back();
        }
    }
}
