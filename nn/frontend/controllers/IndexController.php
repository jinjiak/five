<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\EntryForm;
use frontend\models\UploadForm;
use frontend\models\Model;    
use frontend\models\User; 
use frontend\models\Userinfo;
use frontend\models\Favorite;  
use frontend\models\Address;   
use frontend\models\Region;
class IndexController extends Controller
{
    public $layout = false;
    public $session;
    public $cookiex;
    public $cookied;
    public function init(){
        $this->enableCsrfValidation = false;
        $this->session = Yii::$app->session;
        $this->cookiex = Yii::$app->response->cookies;
        $this->cookied = Yii::$app->request->cookies;


    }
    //个人中心页面
    public function actionIndex()
    {
        return $this->render('index');
    }

    //修改密码
    public function actionPassword()
    {
        return $this->render('password');
    }

    //安全设置
    public function actionSafety()
    {
        return $this->render('safety');
    }

    //安全问题
    public function actionQuestion()
    {
        return $this->render('question');
    }

    //订单详情
    public function actionOrderinfo()
    {
        return $this->render('orderinfo');
    }

    //订单管理
    public function actionOrder()
    {
        return $this->render('order');
    }

    //个人资料
    public function actionInformation()
    {
        $User= new User;
        $Userinfo= new Userinfo;
        $id=1;
        //$id=Yii::$app->session->set('user_id',$id);
        $content = User::find()->where(['user.user_id'=>$id,'user_status'=>1])->innerjoinWith('userinfo')->asarray()->one();
        return $this->render('information',['content'=>$content]);
    }
    //个人信息的修改
    public function actionInformation_save(){
        $post=Yii::$app->request->post();
        $id=1;
        //$id=Yii::$app->session->set('user_id',$id);
        $User= new User;
        $Userinfo= new Userinfo;
        $bb=$User->find()->where(['user_id'=>$id])->one();
        $bb->user_name=$post['user_name'];
        $bb->user_tel=$post['user_tel'];
        $bb->user_email=$post['user_email'];
        // var_dump($post['user_tel']);
        // var_dump($post['user_email']);die;
        if ($_FILES['head_ico']['error']==0) 
        {
            $tmp_name=$_FILES['head_ico']['tmp_name'];
            $p_name=$_FILES['head_ico']['name'];
            $face = 'uploads/'.date('YmdHis').rand(111,999);
            $s_name=substr($p_name,-4);
            $path = $face.$s_name;
            $res = move_uploaded_file($tmp_name,$path);
            // $content = Yii::$app->db;
            // $data = $content->createCommand()->update('lg_resume',['face' => $path],"id = $id")->execute();
             $bb->head_ico=$path;
            //return $path;        
         }
        
        
        if($bb->save()){
            //echo 1;die;
            $cc=$Userinfo->find()->where(['user_id'=>$id])->one(); 
            $cc->info_name=$post['info_name'];
            $cc->info_sex=$post['info_sex'];
            $cc->info_year=$post['info_year'];
            $cc->info_month=$post['info_month'];
            $cc->info_day=$post['info_day'];
           
            if($cc->save()){
                $this->redirect(array('index/information'));
            }
        }

    }
    //实名认证
    public function actionIdcard()
    {
        return $this->render('idcard');
    }

    //邮箱验证s
    public function actionEmail()
    {
        return $this->render('email');
    }

    //收藏
    public function actionCollection()
    {
        $connection = \Yii::$app->db;    
        $command = $connection->createCommand('select * from favorite as a,goods as b,user as c where a.goods_id = b.goods_id and a.user_id = c.user_id and c.user_id = 1');
        $posts = $command->queryAll();
        //var_dump($posts);
        return $this->render('collection',["posts"=>$posts]);
    }
    //取消收藏
    public function actionCollection_del(){
        $paots=Yii::$app->request->post();
        $id=$paots['favorite_id'];
        $fa = new favorite();
        if($fa->deleteAll("favorite_id=".$id)){
            echo 1;
        }else{
            echo 0;
        }

    }

    //绑定手机
    public function actionBindphone()
    {
        return $this->render('bindphone');
    }

    //地址管理
    public function actionAddress()
    {
        $model= new Address();
        //$id=Yii::$app->session->set('user_id',$id);
        $id=1;
        $addressdata=$model->find()->where(['user_id'=>$id])->all();
        //var_dump($posts);

        foreach ($addressdata as $key => $value) {
            $addressdata[$key]['province'] = Region::find()->where(['region_id'=> $value['province']])->asArray()->one();
            $addressdata[$key]['city'] = Region::find()->where(['region_id'=> $value['city']])->asArray()->one();
            $addressdata[$key]['area'] = Region::find()->where(['region_id'=> $value['area']])->asArray()->one();
        }

        //渲染页面
        return $this->render('address',['addressdata'=>$addressdata]);
    }
    //地址修改
    public function actionAddress_del(){
        $paots=Yii::$app->request->get();
        //var_dump($paots);die;
        $id=$paots['id'];
        //echo $id;die;
        $fa = new Address();
        if($fa->deleteAll("address_id=".$id)){
           $this->redirect(array('index/address'));
        }

    }
      //地址添加
    public function actionAddress_add(){
        $pao=Yii::$app->request->post();

        //$id=Yii::$app->session->set('user_id',$id);
        $user_id=1;
        $bb = new Address();
        //var_dump($bb);die;
        $bb->accept_name=$pao['accept_name'];
        $bb->tel=$pao['tel'];
        $bb->address_name=$pao['address_name'];
        $bb->province=$pao['province'];
        $bb->city=$pao['city'];
        $bb->area=$pao['area'];
        $bb->user_id=$user_id;
        if($bb->save()){
            echo 1;
        }else{
            echo 0;
        }
    }
    //地址修改展示页面
    public function actionAddress_find(){
        $paots=Yii::$app->request->get();
        //var_dump($paots);die;
        $id=$paots['id'];
        $model = new Address();
        $posts=$model->findone($id);
        //var_dump($posts);die;
        return $this->render('address_find',['posts'=>$posts]);
    }
    //地址修改展示操作
    public function actionAddress_save(){
        $pao=Yii::$app->request->post();
        //print_r($pao);die;
        $id=$pao['address_id'];
        $model = new Address();
        $bb=$model->find()->where(['address_id'=>$id])->one();
        //var_dump($bb);die;
        $bb->accept_name=$pao['accept_name'];
        $bb->tel=$pao['tel'];
        $bb->address_name=$pao['address_name'];
        $bb->province=$pao['province'];
        $bb->city=$pao['city'];
        $bb->area=$pao['area'];
        if($bb->save()){
            echo 1;
        }else{
            echo 0;
        }
    }
    //地区
    public function actionRegion_do(){
        $type = isset($_GET["type"]) ? $_GET["type"] : "";  
        $parent_id = isset($_GET["parent_id"]) ? $_GET["parent_id"] : "";  
        if ($type == "" || $parent_id == "") {  
            exit(json_encode(array("flag" => false, "msg" => "查询类型错误")));  
        } else {    
            // 链接数据库  
            $connection = \Yii::$app->db;
            $command = $connection->createCommand("SELECT * FROM region WHERE parent_id=$parent_id and region_type=$type");
            $post = $command->queryAll();
            $provinces_json = json_encode($post);  
            exit($provinces_json);  
        }  
    }
}
