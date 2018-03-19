<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Comment;
use App\Model\Admin\Goods;
use App\Model\Admin\Member;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keywords = $request->name;

        if ($keywords != '') {
            $sid = [];
            $goods = Goods::where('name','like',"%$keywords%")->get(['id'])->toArray();
            // dd($goods);
            foreach ($goods as $key => $value) {
                $sid[] .= $value['id'];
            }
            // dd($sid);
            $comment = Comment::whereIn('sid',$sid)->orderBy('sid','asc')->paginate(env('PAGE_SIZE',10));
            $sum = Comment::whereIn('sid',$sid)->count();

        }else{
            $comment = Comment::orderBy('sid','asc')->paginate(env('PAGE_SIZE',10));
            // dd($comment->toArray());
            $sum = Comment::count();
        }
        // $comment = Comment::all();
        return view('admin.comment.comment',['comment'=>$comment,'sum'=>$sum,'keywords'=>$keywords]);
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
        //  $root = Comment::create(['mid'=>'1','sid'=>'2','content'=>'的风格的','reply'=>'过分的风格的的事']);
        // $child1 = $root->children()->create(['mid'=>'1','sid'=>'2','content'=>'公司撒打算 发的','reply'=>'过分收到贵司的事']);
        // $child2 = $child1->children()->create(['mid'=>'1','sid'=>'2','content'=>'收到发顺丰','reply'=>'是个分公司 ']);
        // $child3 = $child2->children()->create(['mid'=>'1','sid'=>'2','content'=>'公司或多或少的发发的','reply'=>' 实打实打算']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $node  =  Comment::where('id',$id)->first();
        return $node;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $node = $this->show($id);
        // dd($node->toArray());
        $parent = $node->getAncestors();
        // dd($parent->toArray());
        return view('admin.comment.edit',['node'=>$node,'parent'=>$parent]);
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
        $model = Comment::where('id',$id)->update(['reply'=>$request->reply]);
        // dd($model);
        if ($model) {
            flash()->overlay('回复成功', 1);
            return redirect('admin/comment');
        }else{
            flash()->overlay('回复失败', 5);
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
