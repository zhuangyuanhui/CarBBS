<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\home\Users;
use App\models\home\UsersInfo;
use App\models\home\Concern;
use Illuminate\Support\Facades\Hash;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.users.create',['title'=>'前台注册']);
    }

    /**
     * 前台发送手机号验证码
     *
     */
    public function sendTelCode($tel)
    {
        // $tel_code = rand(1000,9999);
        $tel_code = 1122;
        session(['tel_code'=>$tel_code]);
       //  $target = "http://106.ihuyi.com/webservice/sms.php?method=Submit";
       //  $target .= "&account=C27705034&password=b11f588eee93d5a6d5432fcc448df1fb&format=json&mobile=".$tel."&content=".rawurlencode("您的验证码是：".$tel_code."。请不要把验证码泄露给其他人。");
       //  //使用curl(百度)

       //  //初使化init方法
       // $ch = curl_init();

       // //指定URL
       // curl_setopt($ch, CURLOPT_URL, $target);

       // //设定请求后返回结果
       // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

       // //发送请求
       // $res = curl_exec($ch);

       // dump($res);
       // //关闭curl
       // curl_close($ch);
    }
    /**
     * 前台用户注册存入数据库
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $nicheng_tou=array('快乐的','冷静的','醉熏的','潇洒的','糊涂的','积极的','冷酷的','深情的','粗暴的','温柔的','可爱的','愉快的','义气的','认真的','威武的','帅气的','传统的','潇洒的','漂亮的','自然的','专一的','听话的','昏睡的','狂野的','等待的','搞怪的','幽默的','魁梧的','活泼的','开心的','高兴的','超帅的','留胡子的','坦率的','直率的','轻松的','痴情的','完美的','精明的','无聊的','有魅力的','丰富的','繁荣的','饱满的','炙热的','暴躁的','碧蓝的','俊逸的','英勇的','健忘的','故意的','无心的','土豪的','朴实的','兴奋的','幸福的','淡定的','不安的','阔达的','孤独的','独特的','疯狂的','时尚的','落后的','风趣的','忧伤的','大胆的','爱笑的','矮小的','健康的','合适的','玩命的','沉默的','斯文的','香蕉','苹果','鲤鱼','鳗鱼','任性的','细心的','粗心的','大意的','甜甜的','酷酷的','健壮的','英俊的','霸气的','阳光的','默默的','大力的','孝顺的','忧虑的','着急的','紧张的','善良的','凶狠的','害怕的','重要的','危机的','欢喜的','欣慰的','满意的','跳跃的','诚心的','称心的','如意的','怡然的','娇气的','无奈的','无语的','激动的','愤怒的','美好的','感动的','激情的','激昂的','震动的','虚拟的','超级的','寒冷的','精明的','明理的','犹豫的','忧郁的','寂寞的','奋斗的','勤奋的','现代的','过时的','稳重的','热情的','含蓄的','开放的','无辜的','多情的','纯真的','拉长的','热心的','从容的','体贴的','风中的','曾经的','追寻的','儒雅的','优雅的','开朗的','外向的','内向的','清爽的','文艺的','长情的','平常的','单身的','伶俐的','高大的','懦弱的','柔弱的','爱笑的','乐观的','耍酷的','酷炫的','神勇的','年轻的','唠叨的','瘦瘦的','无情的','包容的','顺心的','畅快的','舒适的','靓丽的','负责的','背后的','简单的','谦让的','彩色的','缥缈的','欢呼的','生动的','复杂的','慈祥的','仁爱的','魔幻的','虚幻的','淡然的','受伤的','雪白的','高高的','糟糕的','顺利的','闪闪的','羞涩的','缓慢的','迅速的','优秀的','聪明的','含糊的','俏皮的','淡淡的','坚强的','平淡的','欣喜的','能干的','灵巧的','友好的','机智的','机灵的','正直的','谨慎的','俭朴的','殷勤的','虚心的','辛勤的','自觉的','无私的','无限的','踏实的','老实的','现实的','可靠的','务实的','拼搏的','个性的','粗犷的','活力的','成就的','勤劳的','单纯的','落寞的','朴素的','悲凉的','忧心的','洁净的','清秀的','自由的','小巧的','单薄的','贪玩的','刻苦的','干净的','壮观的','和谐的','文静的','调皮的','害羞的','安详的','自信的','端庄的','坚定的','美满的','舒心的','温暖的','专注的','勤恳的','美丽的','腼腆的','优美的','甜美的','甜蜜的','整齐的','动人的','典雅的','尊敬的','舒服的','妩媚的','秀丽的','喜悦的','甜美的','彪壮的','强健的','大方的','俊秀的','聪慧的','迷人的','陶醉的','悦耳的','动听的','明亮的','结实的','魁梧的','标致的','清脆的','敏感的','光亮的','大气的','老迟到的','知性的','冷傲的','呆萌的','野性的','隐形的','笑点低的','微笑的','笨笨的','难过的','沉静的','火星上的','失眠的','安静的','纯情的','要减肥的','迷路的','烂漫的','哭泣的','贤惠的','苗条的','温婉的','发嗲的','会撒娇的','贪玩的','执着的','眯眯眼的','花痴的','想人陪的','眼睛大的','高贵的','傲娇的','心灵美的','爱撒娇的','细腻的','天真的','怕黑的','感性的','飘逸的','怕孤独的','忐忑的','高挑的','傻傻的','冷艳的','爱听歌的','还单身的','怕孤单的','懵懂的');$nicheng_wei=array('嚓茶','凉面','便当','毛豆','花生','可乐','灯泡','哈密瓜','野狼','背包','眼神','缘分','雪碧','人生','牛排','蚂蚁','飞鸟','灰狼','斑马','汉堡','悟空','巨人','绿茶','自行车','保温杯','大碗','墨镜','魔镜','煎饼','月饼','月亮','星星','芝麻','啤酒','玫瑰','大叔','小伙','哈密瓜，数据线','太阳','树叶','芹菜','黄蜂','蜜粉','蜜蜂','信封','西装','外套','裙子','大象','猫咪','母鸡','路灯','蓝天','白云','星月','彩虹','微笑','摩托','板栗','高山','大地','大树','电灯胆','砖头','楼房','水池','鸡翅','蜻蜓','红牛','咖啡','机器猫','枕头','大船','诺言','钢笔','刺猬','天空','飞机','大炮','冬天','洋葱','春天','夏天','秋天','冬日','航空','毛衣','豌豆','黑米','玉米','眼睛','老鼠','白羊','帅哥','美女','季节','鲜花','服饰','裙子','白开水','秀发','大山','火车','汽车','歌曲','舞蹈','老师','导师','方盒','大米','麦片','水杯','水壶','手套','鞋子','自行车','鼠标','手机','电脑','书本','奇迹','身影','香烟','夕阳','台灯','宝贝','未来','皮带','钥匙','心锁','故事','花瓣','滑板','画笔','画板','学姐','店员','电源','饼干','宝马','过客','大白','时光','石头','钻石','河马','犀牛','西牛','绿草','抽屉','柜子','往事','寒风','路人','橘子','耳机','鸵鸟','朋友','苗条','铅笔','钢笔','硬币','热狗','大侠','御姐','萝莉','毛巾','期待','盼望','白昼','黑夜','大门','黑裤','钢铁侠','哑铃','板凳','枫叶','荷花','乌龟','仙人掌','衬衫','大神','草丛','早晨','心情','茉莉','流沙','蜗牛','战斗机','冥王星','猎豹','棒球','篮球','乐曲','电话','网络','世界','中心','鱼','鸡','狗','老虎','鸭子','雨','羽毛','翅膀','外套','火','丝袜','书包','钢笔','冷风','八宝粥','烤鸡','大雁','音响','招牌','胡萝卜','冰棍','帽子','菠萝','蛋挞','香水','泥猴桃','吐司','溪流','黄豆','樱桃','小鸽子','小蝴蝶','爆米花','花卷','小鸭子','小海豚','日记本','小熊猫','小懒猪','小懒虫','荔枝','镜子','曲奇','金针菇','小松鼠','小虾米','酒窝','紫菜','金鱼','柚子','果汁','百褶裙','项链','帆布鞋','火龙果','奇异果','煎蛋','唇彩','小土豆','高跟鞋','戒指','雪糕','睫毛','铃铛','手链','香氛','红酒','月光','酸奶','银耳汤','咖啡豆','小蜜蜂','小蚂蚁','蜡烛','棉花糖','向日葵','水蜜桃','小蝴蝶','小刺猬','小丸子','指甲油','康乃馨','糖豆','薯片','口红','超短裙','乌冬面','冰淇淋','棒棒糖','长颈鹿','豆芽','发箍','发卡','发夹','发带','铃铛','小馒头','小笼包','小甜瓜','冬瓜','香菇','小兔子','含羞草','短靴','睫毛膏','小蘑菇','跳跳糖','小白菜','草莓','柠檬','月饼','百合','纸鹤','小天鹅','云朵','芒果','面包','海燕','小猫咪','龙猫','唇膏','鞋垫','羊','黑猫','白猫','万宝路','金毛','山水','音响');
        //随机头和尾
        $tou_num=rand(0,331);$wei_num=rand(0,325);
        //生成随机名称
        $nickname=$nicheng_tou[$tou_num].$nicheng_wei[$wei_num];
        //接收表单的内容
        $data = $request->only(['uname','upwd','tel','tel_code']);

        //拿到session的验证码比对
        $code = session('tel_code');
        if($data['tel_code'] != $code){
            return back()->with('error','验证码错误');
        }
        //开启事务
        DB::beginTransaction();
        //将数据存入前台用户表
        $users = new Users;
        $users->uname = $data['uname'];
        $users->upwd = Hash::make($data['upwd']);
        $users->tel = $data['tel'];
        $users->ctime = time();
        $users->status = 1;
        $users->nickname = $nickname;
        $res1 = $users->save();
        
        //将信息存入用户详情表
        $users_info = new UsersInfo;
        $users_info->users_id = $users->id;
        $users_info->sign_number = 5;
        $users_info->sign_time = time();
        $users_info->face = "home/personal/images/users_face.gif";
        $users_info->sign_days = 1;
        $res2 = $users_info->save();

        if($res1 && $res2){
            DB::commit();
            return redirect('home/login/login')->with('success','注册成功');
        }else{
            DB::rollBack();
            return back()->with('error','注册失败');
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
        //
    }

    /**
     * ajax方法判断用户名是否存在
     */
    public function checkname($name)
    {
        $res = Users::where('uname','=',$name)->first();
        if($res){
            echo json_encode(['code'=>'error']);
        }else{
            echo json_encode(['code'=>'success']);
        }
    }
    
    /**
     * ajax方法判断手机号是否存在
     */
    public function checktel($tel)
    {  
       $res = Users::where('tel','=',$tel)->first();
        if($res){
            echo json_encode(['code'=>'error']);
        }else{
            echo json_encode(['code'=>'success']);
        } 
    }

    /**
     * 按照积分排序得出用户排行
     */
    static function number_users()
    {
        $number_users = UsersInfo::orderBy('sign_number','desc')->limit(20)->get();
        return $number_users;
    }

    /**
     * 按照粉丝量排序得出用户排行
     */
    static function fans_users()
    {
        
        $users = Users::orderBy('fans_count','desc')->limit(20)->get();
        return $users;
    }

    /**
     * 按照发帖量排序得出用户排行
     */
    static function article_users()
    {
        $article_users = Users::orderBy('art_count','desc')->limit(20)->get();
        return $article_users;
    }

    /**
     * 按照连续签到排序得出用户排行
     */
    static function sign_users()
    {
        $sign_users = UsersInfo::orderBy('sign_days','desc')->limit(20)->get(); 
        return $sign_users;
    }


    /**
     * 用户签到
     */
    public function sign()
    {
        //获取session用户信息
         $login_users = session('login_users');
         //获取用户详情
         $users_info = UsersInfo::where('users_id',$login_users->id)->first();
         //判断签到时间是否是今天
         if(date('Ymd',$users_info->sign_time) == date('Ymd',time() ) ){
            //返回值
             echo json_encode(['msg'=>'error']);
             exit;
         //判断签到时间是否是昨天
         } elseif( (int)date('Ymd',$users_info->sign_time) == ( (int)date('Ymd',time() ) ) -1 ) {
         //连续签到天数加1
            $users_info->sign_days = $users_info->sign_days+1;
         //判断连续签到天数是否小于10
            if($users_info->sign_days <= 10){
         //积分+5
                $num = $users_info->sign_number+5;
         //返回值       
                echo json_encode(['msg'=>'success','jifen'=>5]);
         //判断连续签到天数是否大于10小于20
            }elseif($users_info->sign_days > 10 && $users_info->sign_days <= 20){
         //积分+10
                 $num = $users_info->sign_number+10;
         //返回值
                 echo json_encode(['msg'=>'success','jifen'=>10]);
         //大于20天的积分加15
             }else{
                 $num = $users_info->sign_number+15;
                 echo json_encode(['msg'=>'success','jifen'=>15]);
             }
         //昨天之前的不算连续签到
         } else {
         //连续签到天数为1
             $users_info->sign_days = 1;
         //积分加5
             $num = $users_info->sign_number+5;
             echo json_encode(['msg'=>'success','jifen'=>5]);
         }
         //保存当前签到时间
         $users_info->sign_time = time();
         //保存签到积分
         $users_info->sign_number = $num;
         $users_info->save();

    }


    /**
     * 用户关注
     */
    public function concern($id)
    {   
        //获取登录用户id
         $login_users = session('login_users');

        //判断当前页主用户与当前登录用户是否为关注
        $concern = Concern::where('users_id','=',$id)->where('fans_id','=',$login_users->id)->first();

        if($concern){
            //标识符,登陆用户已关注该业主
            $ifconcern = true;
            //开启事务
                    DB::beginTransaction();

                    //删除关注表中的相应记录
                    $res1 = $concern->delete();

                    //将被关注人的粉丝量减1
                    $user = Users::find($id);
                    $user->fans_count = $user->fans_count - 1;
                    $res2 = $user->update();

                    if($res1 && $res2){
                         DB::commit();
                         echo json_encode(['code'=>'success','type'=>'quxiao']);
                     }else{
                         DB::rollBack();
                         echo json_encode(['code'=>'error','type'=>'quxiao']);
                     }
        }else{
                //标识符,登陆用户未关注该业主
                $ifconcern = false;

                //开启事务
                    DB::beginTransaction();

                    //往关注表插入关注记录
                    $concern = new Concern;
                    $concern->fans_id = $login_users->id;
                    $concern->users_id = $id;
                    $concern->ctime = time();
                    $res1 = $concern->save();

                    //将被关注人的粉丝量加一
                    $user = Users::find($id);
                    $user->fans_count = $user->fans_count + 1;
                    $res2 = $user->update();

                    if($res1 && $res2){
                         DB::commit();
                         echo json_encode(['code'=>'success','type'=>'guanzhu']);
                     }else{
                         DB::rollBack();
                         echo json_encode(['code'=>'error','type'=>'guanzhu']);
                     }
        }
   
     }


}