<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Stock;
use App\Model\Admin\Value;
use App\Model\Admin\Goods;
use App\Model\Admin\Bute;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $where=[];
        $keywords = $request->good_id;
        if ($keywords != '') {
            $info = Goods::where('name','like',"%$keywords%")->get()->toArray();
            // dd($info);
            $infos = [];
            foreach ($info as $k => $v) {
                $infos[$v['id']] = $v['name'];
            }
            $po = array_keys($infos);
            $stock = Stock::whereIn('good_id',$po)->orderBy('id','desc')->paginate(env('PAGE_SIZE',10)); 
            $count = Stock::whereIn('good_id',$po)->count();

        }else{
            $stock = Stock::orderBy('id','desc')->paginate(env('PAGE_SIZE',10));
            $count = Stock::count();
        }
        //显示商品的名字
        $data = Goods::get(['id','name'])->toArray();
        $datas = [];
        foreach ($data as $k => $v) {
            $datas[$v['id']] = $v['name'];
        }
        //显示属性名
        $attr = Bute::get(['id','name'])->toArray();
        $attrs = [];
        foreach ($attr as $k => $v) {
            $attrs[$v['id']] = $v['name'];
        }
        //显示属性值
        $vv = Value::get(['id','name'])->toArray();
        $vvs = [];
        foreach ($vv as $k => $v) {
            $vvs[$v['id']] = $v['name'];
        }
        return view('admin.stock.index',['stock'=>$stock,'count'=>$count,'keywords'=>$keywords,'datas'=>$datas,'attrs'=>$attrs,'vvs'=>$vvs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $goods = Goods::get();
        $bute = Bute::get();
        return view('admin.stock.create',['goods'=>$goods,'bute'=>$bute]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
        $bb = $request->input('vid');
        // dd($bb);
        $this->validate($request, [
            'price' => 'required|numeric',
            'stock'=>'required|integer',
        ],[
            'price.required' => '价格必填',
            'price.numeric' => '价格格式不正确',
            'stock.required' => '库存必填',
            'stock.integer' => '库存格式不正确',
        ]);
        foreach ($bb as $k=>$v) {
            $stock = new Stock;
            $stock->good_id =$request->good_id;
            $stock->price =$request->price;
            $stock->stock =$request->stock;
            $stock->bid =$request->bid;
            $stock->vid =$v;
            $stock->save();
            
        }
        flash()->overlay('添加成功', 1);
        return redirect('admin/stock');
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
        //所有的商品
        $goods = Goods::get();
        //库存
        $stock = Stock::findOrFail($id);
        //查找库存商品的id与商品的id
        $data = Goods::where('id',$stock->good_id)->first();
        //所有的属性名
        $bute = Bute::get();
        $datas = Bute::where('id',$stock->bid)->first();
        $value = Value::where('bute_id',$datas->id)->get();
        $values = Value::where('id',$stock->vid)->first();
        return view('admin.stock.edit',['goods'=>$goods,'bute'=>$bute,'data'=>$data,'stock'=>$stock,'datas'=>$datas,'value'=>$value,'values'=>$values]);
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
        // dd($bb);
        $this->validate($request, [
            'price' => 'required|numeric',
            'stock'=>'required|integer',
        ],[
            'price.required' => '价格必填',
            'price.numeric' => '价格格式不正确',
            'stock.required' => '库存必填',
            'stock.integer' => '库存格式不正确',
        ]);
        $input['good_id'] = $request->good_id;
        $input['bid'] = $request->bid;
        $input['vid'] = $request->vid;
        $input['price'] = $request->price;
        $input['stock'] = $request->stock;
        $values = Stock::where('id',$id)->update($input);
        // dd($values);
        if ($values) {
            flash()->overlay('修改成功', 1);
            return redirect('admin/stock');
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
        if (Stock::destroy($id)) {
            flash()->overlay('删除成功', 1);
            return redirect('admin/stock');
        }else{
            flash()->overlay('删除失败', 5);
            return back();
        }
    }

    public function good(Request $request){
        //根据ajax传过来id查值
        $info = Value::where('bute_id',$request->id)->get();
        return ['code'=>0,'msg'=>'','data'=>$info];
    }
}
