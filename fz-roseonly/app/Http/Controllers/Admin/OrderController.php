<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\admin\Order;
use App\Model\admin\Member;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $where=[];
        // if ($keywords != '') {
            $order = Order::where("is_pay","=",1)
                            ->orderBy('is_ship','asc')
                            ->orderBy('id','desc')
                            ->paginate(env('PAGE_SIZE',10));
            $sum = Order::where("is_pay","=",1)
                         ->orderBy('is_ship','asc')
                         ->orderBy('id','desc')
                         ->count();

        // return "123123";
        // dd($sum);
        return view('admin.order.order',['order'=>$order,'sum'=>$sum]);
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
        // dd($member);
        // dd($member->toArray());
        $memberinfo = $member->toArray();

        // dd($memberinfo);


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

    // /**
    //  * 查询已发货订单
    //  * @return [type] [description]
    //  */
    //  public function shipped()
    // {
    //     // $where=[];
    //     // if ($keywords != '') {
    //         $shipped = Order::where('is_ship',"=",1)->orderBy('id','desc')->paginate(env('PAGE_SIZE',10));
    //         $sum = Order::where('is_ship',"=",1)->count();

    //     // return "123123";
    //     // dd($sum);
    //     return view('admin.order.shipped',['shipped'=>$shipped,'sum'=>$sum]);
    // }
    
    // public function hasmany()
    // {
    //      $member = Member::with('order')->find(1);

    //     dd($member->toArray());
    // }


     
     
    
}
