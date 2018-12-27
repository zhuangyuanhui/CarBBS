<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\Advert;

class AdvertsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   $params = $request->all();
        $search_uname = $request->input('search_uname','');
        $search_count = $request->input('search_count');
        $data = Advert::where('acustomer','like','%'.$search_uname.'%')->paginate($search_count);
        return view('admin.adverts.index',['title'=>'广告位浏览','data'=>$data,'params'=>$params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adverts.create',['title'=>'广告位添加']);
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
            'acustomer' => 'required',
            'atitle' => 'required',
            'aurl' => 'required'
        ],[
            'acustomer.required'=>'客户信息不得为空',
            'atitle.required'=>'广告标题不得为空',
            'aurl.required'=>'跳转地址不得为空'
        ]);


        $adverts = new Advert;
        $data = $request->except('_token');
         //广告图片上传
        if ($request->file('apic')) {
            $files = $request->file('apic')->store('admin/adverts');          
            $data['apic'] = $files;
            $adverts->apic = $data['apic'];
        }
        $adverts->acustomer = $data['acustomer'];
        $adverts->atitle = $data['atitle'];
        $adverts->aurl = $data['aurl'];
        $adverts->astatus = 0;
        $res = $adverts->save();

        if($res){
            return redirect('admin/adverts')->with('success','广告位添加成功');
        } else {
            return back()->with('error','广告位添加失败');
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
        $advert = Advert::where('id',$id)->first();
        return view('admin/adverts/edit',['advert'=>$advert,'title'=>'广告位修改']);
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
         $this->validate($request, [
            'acustomer' => 'required',
            'atitle' => 'required',
            'aurl' => 'required'
        ],[
            'acustomer.required'=>'客户信息不得为空',
            'atitle.required'=>'广告标题不得为空',
            'aurl.required'=>'跳转地址不得为空'
        ]);


        $adverts = Advert::where('id',$id)->first();
        $data = $request->except('_token');
         //广告图片上传
        if ($request->file('apic')) {
            $files = $request->file('apic')->store('admin/adverts');          
            $data['apic'] = $files;
            $adverts->apic = $data['apic'];
        }
        $adverts->acustomer = $data['acustomer'];
        $adverts->atitle = $data['atitle'];
        $adverts->aurl = $data['aurl'];
        $adverts->astatus = $data['astatus'];
        $res = $adverts->save();

        if($res){
            return redirect('admin/adverts')->with('success','广告位修改成功');
        } else {
            return back()->with('error','广告位修改失败');
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
       $res = Advert::where('id',$id)->delete();
       if($res){
            return redirect('admin/adverts')->with('success','广告位删除成功');
        } else {
            return back()->with('error','广告位删除失败');
        }
    }
}
