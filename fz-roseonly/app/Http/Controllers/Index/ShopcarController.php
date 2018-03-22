<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Admin\Goods_shopcar;
use App\Model\Admin\Goods;
use App\Model\Admin\Member;
use App\Model\Admin\Order;
use App\Model\Admin\Order_goods;
use App\Model\Index\Memaddress;


class ShopcarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //导航栏
        $array = Type::with('bute.value')->get()->toHierarchy();

        // // dd($request->session()->has('usersInfo'));
        // if(!$request->session()->has('usersInfo')){
        //     return view('authindex.login');
        // }

        // $value = $request->session()->all();

        // // dd($value['usersInfo']['id']);
        // $memid = $value['usersInfo']['id'];

        if (session('usersInfo') == NULL) {
            return view('authindex/login');
        }
        $memid = session('usersInfo')['id'];
      
       // dd($memid);

        //查询出会员的id是多少，再通过购物车查商品
        $shopcar = Goods_shopcar::with('goods')->where('member_id',$memid)->get();

        // dd($shopcar->toArray());

        $shopgoods = $shopcar->toArray();

        // $request->session()->put('usersInfo.shopnum',count($shopgoods));
        // dd(session('usersInfo.shopnum'));
        return view('index.shopcar',['shop'=>$shopgoods,'array'=>$array]);
        


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
        //导航栏
        $array = Type::with('bute.value')->get()->toHierarchy();


       if (session('usersInfo') == NULL) {
            return view('authindex/login');
        }
        $memid = session('usersInfo')['id'];
        // dd($memid);

        $info['goid'] = $request->godid;
        $info['gonum'] = $request->godnum;
        $totalprices = $request->totalprice;
        $ordernum = $request->ordernum;
        $createtime = $request->created_at;
        $shaddid = $request->shaddress_id;
        // dd($info);
        $goid = explode("@",rtrim($info['goid'],'@'));
        $gonum = explode("@",rtrim($info['gonum'],'@'));
        // count($goid);
        // dd(count($goid));
   
        //查询出会员的id是多少，再通过购物车查商品  //存入订单号和会员id，
       for ($i=0; $i <count($goid) ; $i++) { 
           // echo $gonum[$i];
           Order_goods::insert(['order_id'=>$ordernum,
                            'goods_id'=>$goid[$i],
                            'goods_num'=>$gonum[$i]
                            ]);

       }
       Order::insert(['order_number'=>$ordernum,
                    'member_id'=>$memid,
                    'pay_prices'=>$totalprices,
                    'created_at'=>$createtime,
                    'shaddress_id'=>$shaddid
                    ]);
        
       // dd($request->session()->has('usersInfo'));
        // $this->show($memid,$goid);
         $order = Order::with('order_goods')->where('member_id',$memid)
                                            ->get();
                                            // ->where('');
        // dd($order->toArray());
        $shop = Goods_shopcar::with('goods')->whereIn('id',$goid)->get();
        $shopinfo = $shop->toArray();


        // dd($shopinfo);
        return view('index.person3',['array'=>$array]);

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
        // dd($request->reply);
        $model = Goods_shopcar::where('id',$id)->update(['num'=>$request->num]);
        // dd($model);
        // 
        return back();
        // // if ($model) {
        // //     flash()->overlay('修改成功', 1);
        // //     return redirect('shopcar/index');
        // // }else{
        // //     flash()->overlay('修改失败', 5);
        // //     return back();
        // // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Goods_shopcar::destroy($id)) {
            // flash()->overlay('删除成功', 1);
            return back();
        }else{
            // flash()->overlay('删除失败', 5);
            return back();
        }
    }





    public function jiesuan(Request $request){
        //导航栏
        $array = Type::with('bute.value')->get()->toHierarchy();

        if (session('usersInfo') == NULL) {
            return view('authindex/login');
        }
        $memid = session('usersInfo')['id'];

        $infogoid = $request->goid;
        $infogonum = $request->gonum;
        $totalprices = $request->totalprices;
        // $info['ordernum'] = $request->ordernum;
        // dd($info);
        $goid = explode("@",rtrim($infogoid,'@'));
        $gonum = explode("@",rtrim($infogonum,'@'));

        // dd($goid);
        
        $shop = Goods_shopcar::with('goods')->whereIn('id',$goid)->get();

        // dd($shop);
        
        $shopinfo = $shop->toArray();

        // dd($shopinfo);

        $memadd = Member::with('memaddress')->where('id',$memid)->first();

        $memainfo = $memadd->toArray();   
        // dd($memainfo['memaddress']);
        $memaddress = $memainfo['memaddress'];
        // dd($memaddress);

        return view('index.person1',['shopinfo'=>$shopinfo,
                                     'totalprices'=>$totalprices,
                                     'memaddress'=>$memaddress,
                                     'goid'=>$infogoid,
                                     'gonum'=>$infogonum,
                                     'array'=>$array
                                    ]);


    }
}
