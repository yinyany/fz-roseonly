<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Admin\Order;
use App\Model\Admin\Member;


class OrderController extends Controller
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
    public function index()
    {
            $order = Order::where("is_pay","=",1)
                            ->orderBy('is_ship','asc')
                            ->orderBy('id','desc')
                            ->paginate(env('PAGE_SIZE',10));
            $sum = Order::where("is_pay","=",1)
                         ->orderBy('is_ship','asc')
                         ->orderBy('id','desc')
                         ->count();
        return view('admin.order.order',['order'=>$order,'sum'=>$sum]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //订单的id查询数据
         $orderinfo = Order::findOrFail($id);   //对象形式的订单信息
         // dd($orderinfo);
         $aOrderinfo = $orderinfo->toArray(); //数组形式的订单信息
         $memberid = $aOrderinfo['member_id']; 
         
        $member = Member::with('order')->find($memberid);  //对象形式的会员信息
        $memberinfo = $member->toArray();

        return view('admin.order.edit',['orderinfo'=>$orderinfo,'minfo' =>$memberinfo]);
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

         $model = Order::where('id',$id)->update(['ship_time'=>$request->ship_time,
                                                 'ship_number'=>$request->ship_number,
                                                'is_ship'=>$request->is_ship
                                                ]);

         // dd($model);
         if ($model) {
            flash()->overlay('修改成功', 1);
            return redirect('admin/order');
        }else{
            flash()->overlay('修改失败', 5);
            return back();
        }

    }

   
}
