<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Carousel\Carousel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $where=[];
        $keywords = $request->id;
        if ($keywords != '') {
            $carousel = Carousel::where('id','like',"%$keywords%")->orderBy('id','desc')->paginate(env('PAGE_SIZE',10));
            $count = Carousel::where('id','like',"%$keywords%")->count();

        }else{
            $carousel = Carousel::orderBy('id','desc')->paginate(env('PAGE_SIZE',10));
            $count = Carousel::count();
        }
        return view('admin.carousel.index',['carousel'=>$carousel,'count'=>$count,'keywords'=>$keywords]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        return view('admin.carousel.create');
    }

    public function upload(Request $request)
    {   
        //接受图片信息
        $field = $request->file('imgurl');

        if($field->isValid()){
            //获取文件的后缀
            $ext = $field->getClientOriginalExtension();
            $newName = md5(time().rand(1,6666)).'.'.$ext;
            $path = $field->move(public_path().'/uploads',$newName);
            return ['code'=>0,'msg'=>'','data'=>['src'=>$newName]];
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // dd($request->input("imgurl"));
        if ($request->hasFile('imgurl')) {
            flash()->overlay('上传图片错误', 5);
            return back();
        }
        $carousel = new Carousel;
        $carousel->imgurl = $request->input("imgurl"); 
        $carousel->state = $request->input("state");
        $carousel->save();
        flash()->overlay('添加成功',1);
        return redirect('/admin/carousel');
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
        $model = Carousel::findOrFail($id);
        return view('admin.carousel.edit',['model'=>$model]);
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
        $model = Carousel::where('id',$id)->update(['state'=>$request->state,'imgurl'=>$request->imgurl]);
        // dd($model);
        if ($model) {
            flash()->overlay('修改成功', 1);
            return redirect('admin/carousel');
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
}
