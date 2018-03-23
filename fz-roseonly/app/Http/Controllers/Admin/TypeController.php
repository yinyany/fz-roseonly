<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Type;
use App\Model\Admin\Goods;
use App\Model\Admin\Value;
use App\Model\Admin\Bute;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TypeController extends Controller
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
    public function index(Request $request)
    {
        $where=[];
        $keywords = $request->name;
        if ($keywords != '') {
                $type = Type::where('name','like',"%$keywords%")->orderBy('lft','asc')->paginate(env('PAGE_SIZE',10));
                $count = Type::where('name','like',"%$keywords%")->count();

            }else{
                $type = Type::orderBy('lft','asc')->paginate(env('PAGE_SIZE',10));
                $count = Type::count();
            }

            $datas = [null=>'顶级分类'];
            $data = Type::get(['id','name','depth'])->toArray();
            foreach ($data as  $v) {
              $path = '';
              for($i=0;$i<=$v['depth'];$i++){
                $path .= '|---';
              }
                $datas[$v['id']] = $path.$v['name'];  
            }
            return view('admin.type.index',['type'=>$type,'count'=>$count,'keywords'=>$keywords,'datas'=>$datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $id = isset($_GET['id'])?$_GET['id']:null;

        if($id===null){
            return view('admin.type.create');
        }else{
            $type = Type::where('id',$id)->first();
            if($type->depth === 1 ){
                flash()->overlay('不能添加3级分类', 5);
                return back();
            }
            $info = Type::findOrFail($id)->ancestorsAndSelf()->get()->toArray();
            return view('admin.type.creates',['id'=>$id,'info'=>$info]);
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
        $this->validate($request, [
            'name' => 'required|max:16',
        ],[
            'name.required' => '类名必填',
            'name.max' => '类名最长16位',
        ]);
            
        if(!$request->input('id')){
            $type = new Type;
            $type->name = $request->input("name");
            $type->save(); 
        }else{
            // dd($request->name);
            $role = Type::findOrFail($request->input('id'));
            // dd($role);
            $role->children()->create(['name' => $request->input("name")]); 
        }

        flash()->overlay('添加成功',1);
        return redirect('/admin/type');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
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
        $list = Type::findOrFail($id);
        if($list->parent_id === null){
            return view('admin.type.edit',['list'=>$list]);
        }else{
            $info = Type::findOrFail($id)->ancestors()->get()->toArray();
            return view('admin.type.edits',['info'=>$info,'id'=>$id,'list'=>$list]);
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
        $list = Type::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|max:16',
        ],[
            'name.required' => '属性值必填',
            'name.max' => '属性值最长16位',
        ]);
        if($list->parent_id === null){
            $model = Type::where('id',$id)->update(['name'=>$request->name,'imgurl'=>$request->imgurl]);
            if ($model) {
                flash()->overlay('修改成功', 1);
                return redirect('admin/type');
            }else{
                flash()->overlay('修改失败', 5);
                return back();
            }
        }else{
            $model = Type::where('id',$id)->update(['name'=>$request->name]);
            if ($model) {
                flash()->overlay('修改成功', 1);
                return redirect('admin/type');
            }else{
                flash()->overlay('修改失败', 5);
                return back();
            }
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
        $list = count(Type::findOrFail($id)->getImmediateDescendants());
        $data = Goods::where('type_id',$id)->first();
        if($data){
            flash()->overlay('删除失败:这个子类下面有商品', 5);
            return back();
        }
        if($list){
            flash()->overlay('删除失败,原因：这个分类有子类', 5);
            return back();
        }else{
            if (Type::destroy($id)) {
                $attr = Bute::where('type_id',$id)->get();
                foreach ($attr as $v) {
                    Value::where('bute_id',$v->id)->delete();
                }
                Bute::where('type_id',$id)->delete();
                flash()->overlay('删除成功', 1);
                return redirect('/admin/type');
            }else{
                flash()->overlay('删除失败', 5);
                return back();
            }
        }
    }
}
