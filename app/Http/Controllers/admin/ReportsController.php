<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\InformUsers;
use App\models\home\Users;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $params = $request->all();
        $search_name = $request->input('search_name','');
        $search_count = $request->input('search_count',5);
        //获取举报信息
        $reports = InformUsers::where('content','like','%'.$search_name.'%')->paginate($search_count);

         return view('admin.reports.index',['title'=>'用户举报管理','reports'=>$reports,'params'=>$params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = InformUsers::find($id);
        return view('admin.reports.edit',['title'=>'用户举报审核','data'=>$data]);
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
        $data = $request->only('status','type','users_status','seal_time','users_id','inform_user','inform_name');



        $reports = InformUsers::find($id);
        $reports->status = $data['status'];
        $reports->type = $data['type'];
        $res1 = $reports->update();

        //将被举报用户信息修改
        $users = Users::where('id','=',$reports->inform_user)->first();

        //提交状态为待审核
         if($data['status'] == 1 ){
            return redirect('admin/reports')->with('success','审核完成');
        }
        //提交状态为驳回举报
        if($data['status'] == 3){
            //凭借语句发送私信给举报人
                $str1 = '经官方核实,确认您举报的'.$users->uname.'用户未涉及违规,请勿随意举报他人,感谢您的支持!';
                $res4 = HUsersController::send($data['users_id'],$str1);

                if($res4){
                    return redirect('admin/reports')->with('success','审核完成');
                }else{
                    return back()->with('error','审核失败');
                }
        }

        if(isset($data['type'])){
                switch($data['type']){
                    case(1) : $type_name = '其他类型'; break;
                    case(2) : $type_name = '个人资料违规'; break;
                    case(3) : $type_name = '文章违规'; break;
                    case(4) : $type_name = '评论违规'; break;
                    case(5) : $type_name = '私信违规'; break;
            }
        }
        $users->status = $data['users_status'];
        //如果选择临时封号,则生成封号到期时间
        if(isset($data['seal_time'])){
            //获取当前时间戳
            $times = time();
            switch($data['seal_time']){
                case(1) : $users->seal_time = $times+(86400 * 3); break;
                case(2) : $users->seal_time = $times+(86400 * 7); break;
                case(3) : $users->seal_time = $times+(86400 * 30); break;
                case(4) : $users->seal_time = $times+(86400 * 180); break;
                case(5) : $users->seal_time = $times+(86400 * 365); break;
            }
        }
        $res2 = $users->update();

        if($data['users_status'] == '2'){
                 //拼接发送语句给被举报人
                $str = '经官方核实,您近期行为涉嫌'.$type_name.',被举报过多.官方处理已将您的账号永久冻结,如需申诉请致电1008611';
                 //调用发送私信方法给被举报人发送私信
                $res3 = HUsersController::send($data['inform_user'],$str);

                //凭借语句发送私信给举报人
                $str1 = '经官方核实,确认您举报的'.$users->uname.'用户涉及违规,官方已对其进行封号处理,您的举报维护了爱车网的和谐有爱的氛围,感谢您的支持!';
                 $res4 = HUsersController::send($data['users_id'],$str1);


        }else if($data['users_status'] == '3'){
            //拼接发送语句给被举报人
             $str = '经官方核实,您近期存在涉及'.$type_name.',被举报过多.官方处理已将您的账号冻结,到期时间为'.date('Y-m-d H:i:s',$users->seal_time).'.如需申诉请致电1008611';
            //调用发送私信方法给被举报人发送私信
              $res3 = HUsersController::send($data['inform_user'],$str);

               //凭借语句发送私信给举报人
                $str1 = '经官方核实,确认您举报的'.$users->uname.'用户涉及违规,官方已对其进行封号处理,您的举报维护了爱车网的和谐有爱的氛围,感谢您的支持!';
                 $res4 = HUsersController::send($data['users_id'],$str1);
        }


        if($res1 && $res2){
            return redirect('admin/reports')->with('success','审核完成');
        }else{
            return back()->with('error','审核失败');
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
        $reports = InformUsers::find($id);
        $res = $reports->delete();

        if($res){
            return redirect('admin/reports')->with('success','删除完成');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
