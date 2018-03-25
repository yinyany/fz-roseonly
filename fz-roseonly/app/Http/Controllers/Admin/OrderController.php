<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Admin\Order;
use App\Model\Admin\Member;
use App\Model\Admin\Goods_shopcar;
use App\Model\Admin\Goods;
use App\Model\Admin\Order_goods;
use App\Model\Index\Memaddress;
use App\Model\Admin\Type;


class OrderController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('role:admin');
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
         // $orderinfo = Order::findOrFail($id);   //对象形式的订单信息
         // dd($orderinfo->toArray());
         // $aOrderinfo = $orderinfo->toArray(); //数组形式的订单信息
         // $orderid = $aOrderinfo['id']; 
         
        $order = Order::with('order_goods.goods')->with('memaddress')->where('id',$id)
                                            ->orderby('is_pay')
                                            ->orderby('created_at','desc')
                                            ->first();
        // $memberinfo = $member->toArray();

        // dd($order->toArray());
        // $orderinfo = $order->toArray();
        // dd($order);


        return view('admin.order.edit',['orderinfo'=>$order]);
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
