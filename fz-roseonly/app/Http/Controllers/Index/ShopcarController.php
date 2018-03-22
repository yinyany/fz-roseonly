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
use App\Model\Admin\Type;


class ShopcarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

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
        return view('index.shopcar',['shop'=>$shopgoods]);
        


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (session('usersInfo') == NULL) {
            return view('authindex/login');
        }
        $memid = session('usersInfo')['id'];

        // dd($memid);  

        $shpeople = $request->shpeople;
        $shphone = $request->shphone;
        $shaddress = $request->shaddress;
        $postcode = $request->postcode;

       $orderis =   Memaddress::insert(['shpeople'=>$shpeople,
                    'member_id'=>$memid,
                    'shphone'=>$shphone,
                    'shaddress'=>$shaddress,
                    'shpostcode'=>$postcode
                    ]);
       return redirect("shopcar/show/$memid");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       if (session('usersInfo') == NULL) {
            return view('authindex/login');
        }
        $memid = session('usersInfo')['id'];
        // dd($memid);

        $info['goid'] = $request->godid;
        $info['gonum'] = $request->godnum;
        $totalprices = $request->totalprice;
        $ordernum = $request->ordernum;

        $ornum = Order::where('order_number',$ordernum)->first();

        if($ornum){
            flash()->overlay('该商品已添加至订单', 1);
            return back();
        }

        $createtime = $request->created_at;
        $shaddid = $request->shaddress_id;
        // dd($info);
        $goid = explode("@",rtrim($info['goid'],'@'));
        $gonum = explode("@",rtrim($info['gonum'],'@'));
        count($goid);
        // dd(count($goid));
   
        // 查询出会员的id是多少，再通过购物车查商品  //存入订单号和会员id，
       for ($i=0; $i <count($goid) ; $i++) { 
           // echo $gonum[$i];
           Order_goods::insert(['order_id'=>$ordernum,
                            'goods_id'=>$goid[$i],
                            'goods_num'=>$gonum[$i]
                            ]);
           Goods_shopcar::destroy($goid[$i]);

       }
     $orderis =   Order::insert(['order_number'=>$ordernum,
                    'member_id'=>$memid,
                    'pay_prices'=>$totalprices,
                    'created_at'=>$createtime,
                    'shaddress_id'=>$shaddid
                    ]);
        
       if($orderis){
            return redirect("shopcar/show/$memid");
       }else{
            return back();
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

       // dd($request->session()->has('usersInfo'));
        // $this->show($memid,$goid);
         $order = Order::with('order_goods.goods')->with('memaddress')->where('member_id',$id)
                                            ->orderby('created_at','desc')
                                            ->get();
        // dd($order);                                    
        // dd($order->toArray());
        

        $orderb = $order->toArray();
        $ordernum = count($orderb);
        // dd( $ordernum );

  //导航栏
        $array = Type::get()->toHierarchy();
        // dd($datas);
        $model = Member::findOrFail($id);
        // dd($shopinfo);
        // dd($shopinfo);
         $memadd = Member::with('memaddress')->where('id',$id)->first();

        $memainfo = $memadd->toArray();   
        // dd($memainfo['memaddress']);
        $memaddress = $memainfo['memaddress'];

        return view('index.person3',['order'=>$orderb,'model'=>$model,'array'=>$array,'memaddress'=>$memaddress,'ordernum'=>$ordernum]);

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


    /**
     * [购物车页面点击结算后跳转至收货地址选择页面]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function jiesuan(Request $request){
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
                                     'gonum'=>$infogonum
                                    ]);


    }
}
