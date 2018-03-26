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
        //导航栏
        $array = Type::with('bute.value')->get()->toHierarchy();


        if (session('usersInfo') == NULL) {
            return view('authindex/login');
        }
        $memid = session('usersInfo')['id'];
        //生成订单
        $ordernum = date('YmdHis').rand(100,200);
        //查询订单是否存在
        $ornum = Order::where('order_number',$ordernum)->first();
        if($ornum){
            flash()->overlay('该商品已添加至订单', 1);
            return back();
        }
        $shaddid = $request->shaddress_id;
        $createtime = $request->created_at;
        // dd($memid);
        // dd($request->godid);
        if($request->godid !=null){
            $info['goid'] = $request->godid;
            $info['gonum'] = $request->godnum;
            $totalprices = $request->totalprice; 
            // dd($ordernum);
            // dd($info);
            $goid = explode("@",rtrim($info['goid'],'@'));
            $gonum = explode("@",rtrim($info['gonum'],'@'));
            // count($goid);
            // dd(count($goid));
        
            $shop = Goods_shopcar::with('goods')->whereIn('id',$goid)->get();
            $shopinfo = $shop->toArray();

            // 查询出会员的id是多少，再通过购物车查商品  //存入订单号和会员id，
            for ($i=0; $i <count($goid) ; $i++) { 
               // echo $gonum[$i];
               Order_goods::insert(['order_id'=>$ordernum,
                                'goods_id'=>$shopinfo[$i]['goods_id'],
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
            
           // dd($request->session()->has('usersInfo'));
            // $this->show($memid,$goid);
             $order = Order::with('order_goods')->where('member_id',$memid)
                                                ->get();
                                                // ->where('');
            // dd($order->toArray());
            $shop = Goods_shopcar::with('goods')->whereIn('id',$goid)->get();
            $shopinfo = $shop->toArray();


            // dd($shopinfo);
        }else{
            
            $total = $request->total;
            // dd($total);
            $goid = $request->id;
            $gonum = $request->val;
            $createtime = $request->created_at;
            // dd($ordernum);
            Order_goods::insert(['order_id'=>$ordernum,
                                'goods_id'=>$goid,
                                'goods_num'=>$gonum
                                ]);

            $orderis =   Order::insert(['order_number'=>$ordernum,
                        'member_id'=>$memid,
                        'pay_prices'=>$total,
                        'created_at'=>$createtime,
                        'shaddress_id'=>$shaddid
                        ]);
        }


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
                                            ->orderby('is_pay')
                                            ->orderby('created_at','desc')

                                            ->get();
        // dd($order);                                    
        // dd($order->toArray());
        $orderb = $order->toArray();
        // dd($orderb);
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

        return view('index.person3',['order'=>$orderb,'model'=>$model,'array'=>$array,'memaddress'=>$memaddress]);

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
    //个人收获地址管理
    public function creates(Request $request)
    {
        $memid = session('usersInfo')['id'];
        $shpeople = $request->shpeople;
        // var_dump($shpeople);
        $shphone = $request->shphone;
        $shaddress = $request->shaddress;
        $postcode = $request->postcode;
        if($shaddress === '请选择省份请选择城市请选择地区'){
            return ['code'=>0,'msg'=>'请选择地址','data'=>$shaddress];
        }
        if($shpeople === ''){
            return ['code'=>0,'msg'=>'添加失败','data'=>$shpeople];
        }
        if($shphone === ''){
            return ['code'=>0,'msg'=>'添加失败','data'=>$shphone];
        }
        if($postcode === ''){
            return ['code'=>0,'msg'=>'添加失败','data'=>$postcode];
        }
        $info =   Memaddress::insert(['shpeople'=>$shpeople,
                    'member_id'=>$memid,
                    'shphone'=>$shphone,
                    'shaddress'=>$shaddress,
                    'shpostcode'=>$postcode
                    ]);
       return ['code'=>0,'msg'=>'','data'=>$info];
    }

    public function destroys(Request $request,$id)
    {  
       if(count(Order::where('shaddress_id',$id)->get())){
          return ['code'=>0,'msg'=>'删除失败','data'=>''];
       }else{
         $data = Memaddress::where('id',$id)->delete();
         return ['code'=>0,'msg'=>'','data'=>$data];
       }
       
    }

    public function shop(Request $request){
        $id = $request->id;
        $val = $request->val;
        return ['code'=>0,'msg'=>'','data'=>['id'=>$id,'val'=>$val]];
    }

    public function shops(Request $request,$id,$val){
        if (session('usersInfo') == NULL) {
            return view('authindex/login');
        }
        $memid = session('usersInfo')['id'];
        $array = Type::with('bute.value')->get()->toHierarchy();
        $memadd = Member::with('memaddress')->where('id',$memid)->first();
        $memainfo = $memadd->toArray();   
        // dd($memainfo['memaddress']);
        $memaddress = $memainfo['memaddress'];
        $data = Goods::where('id',$id)->first();
        return view('index.person1',['data'=>$data,'val'=>$val,'array'=>$array,'memaddress'=>$memaddress]);
    }

    public function shopping(Request $request,$id,$val){
        if (session('usersInfo') == NULL) {
            return view('authindex/login');
        }
        $memid = session('usersInfo')['id'];
        $data = Goods_shopcar::create(['member_id'=>$memid,'goods_id'=>$id,'num'=>$val]);
        return redirect('/shopcar');

        
    }
}
