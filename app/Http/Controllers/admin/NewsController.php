<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\News;
use App\models\admin\Cates;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $res = $request->input('search_title','');
        $pag = $request->input('search_count',5);
        $news = News::where('title','like','%'.$res.'%')->paginate($pag);
        $pic = [];
        foreach ($news as $key => $value) {
            $pic = explode(',',rtrim($value->news_pic,','));
        }
        return view('admin.news.index',['news'=>$news,'title'=>'新闻列表','params'=>$params,'pic'=>$pic]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=0)
    {
        //从数据哭拿取数据分类
         //$data = DB::table('cates')->select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
        $data = Cates::all();
        //加载新闻添加视图
        return view('admin.news.create',['id'=>$id,'title'=>'新闻添加','data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->except(['_token']);
        
        //验证
        $this->validate($request, [
            'title' => 'required|max:50',
            'content' => 'required|min:10',
            'news_pic' => 'required',
          

        ],[
            'title.required' => '标题不能为空',
            
            'title.max' => '标题长度过大,最大为50',
            'content.required' => '内容不能为空',
            'content.min' => '文章内容最低不得少于10字',
            'news_pic.required' => '请选择图片上传',
         
        ]);
   
        //判断文件上传 
      
        if ($request->file('news_pic')) {
            $file = $request->file('news_pic');
           
              $data['news_pic'] =   $file->store('/admin/news/images');
          
        }

        $news = new News;
        $news->cates_id=$data['cates_id'];
        $news->title =$data['title'];
        $news->content =$data['content']; 
        $news->news_pic =$data['news_pic'];
        // 追加时间戳 和 点击量
        $news->ctime = time();
        $news->clicks = 0;
        //cunshu time
        $res = $news->save();
        if ($res) {
            return redirect('admin/news')->with('success','新闻添加成功');
        } else {
            return back()->with('error','新闻添加失败');
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取要修改的数据
        $data= News::find($id);
        //获取所有值
        $datas = Cates::all();


        //加载视图
        return view('admin.news.edit',['data'=>$data,'datas'=>$datas,'title'=>'新闻信息修改','id'=>$id]);
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
        $new = $request->except(['_token','_method']);
         //验证
        $this->validate($request, [
            'title' => 'required|max:50',
            'content' => 'required|min:10',
        ],[
            'title.required' => '标题不能为空',
            'title.max' => '标题长度过大,最大为50',
            'content.required' => '内容不能为空',
            'content.min' => '文章内容最低不得少于10字',
        ]);
   
        

        $news =News::find($id);

        $news->cates_id=$new['cates_id'];
        $news->title =$new['title'];
        $news->clicks =$new['clicks'];
        $news->content =$new['content'];
        //判断文件上传 
        if ($request->file('news_pic')) {
            $file = $request->file('news_pic');
              $new['news_pic']  =$file->store('/admin/news/images');
                $news->news_pic =$new['news_pic'];
        }
        //cunshu time
        $res = $news->save();
        if ($res) {
            return redirect('admin/news')->with('success','新闻修改成功');
        } else {
            return back()->with('error','新闻修改失败');
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
        //获取要删除的数据
        $data = News::find($id);
        $res = $data->delete();
        if($res){
            return redirect('admin/news')->with('success', '删除成功');
        }else{
            return back()->with('error', '删除失败');
        }
    }

    public function show($id)
    {
        $data = News::find($id);
        if($data){
            echo json_encode($data);
        }else{
            echo json_encode(['code'=>'error']);
        }
    }
}
