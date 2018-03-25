<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Model\Index\Home;
use App\Model\Admin\Member;
use App\Model\Admin\Goods;
use App\Model\Admin\Type;
use App\Model\Admin\Bute;
use App\Model\Admin\Carousel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //导航栏
        $array = Type::with('bute.value')->get()->toHierarchy();

        //获取4个顶级类
        $name = Type::where('depth',0)->take(4)->get();
        // dd($name->toArray());
        foreach ($name as $key => $value) {
            //获取每个顶级类的节点
            $node = Type::where('name',$value->name)->first();
            // dd($node->toArray());
            // 获取每个顶级类下的子节点
            $type = $node->getLeaves();
            // dd($type->toArray());
            $tid = [];
            foreach ($type as $key => $v) {
                $tid[] = $v->id;
            }
            // 获取每隔子节点下的8个商品
            $list[$value->name] = Goods::whereIn('type_id',$tid)->take(8)->get();
            // dd($list);
        }
        // dd($list);
        $banner = Carousel::where('state','启用')->get();
        $count  = Carousel::where('state','启用')->count();
        return view('index.index',['array' => $array,'banner'=>$banner,'count'=>$count,'list'=>$list]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function newpass(Request $request,$id)
    {
        $model = Member::findOrFail($id);
        if($model->password != md5($request->oldpass)){
            flash()->overlay('原始密码错误', 5);
            return back();
        }
        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ],[
            'password.required'=>'密码必填',
            'password.confirmed'=>'两次输入密码不同',
            'password.min'=>'密码最小6位',
        ]);

        $flight = Member::where('id',$id)->update(['password' => md5($request->password)]);
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
     * 修改个人信息(上传头像)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function newmember(Request $request)
    {
        //接受图片信息
        $field = $request->file('imgurl');
        $data = $request->id;
        if($field->isValid()){
            $ext = $field->getClientOriginalExtension();
            $newName = md5(time().rand(1,6666)).'.'.$ext;
            Member::where('id',$data)->update(['imgurl'=>$newName]);
            $path = $field->move(public_path().'/uploads/picture',$newName);
            return ['code'=>0,'msg'=>'','data'=>['src'=>$newName,'data'=>$data]];
        }
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function memadress(Request $request)
    {   
        $info['fere'] = $request->fere;
        $info['fere_phone'] = $request->productName;
        $info['name'] = $request->name;
        $info['phone'] = $request->phone1;
        $info['birthday'] = $request->test1;
        $info['affective'] = $request->marriage;
        $info['sex'] = $request->val;
        $info['address'] = $request->det_address;
        $info['email'] = $request->email;
        $info['zfpass'] = md5($request->zfpass);
        $id = $request->id;
        $data = Member::where('id',$id)->update($info);
        // var_dump($meber);
        return ['code'=>0,'msg'=>'','data'=>$data];

    }
}
