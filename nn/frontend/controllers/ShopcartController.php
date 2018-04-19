<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\EntryForm;
use frontend\models\Favorite; 

class ShopcartController extends Controller
{
    public $layout = 'shopcart.php';
    public $session;
    public $cookiex;
    public $cookied;
    public function init(){
        $this->enableCsrfValidation = false;
        $this->session = Yii::$app->session;
        $this->cookiex = Yii::$app->response->cookies;
        $this->cookied = Yii::$app->request->cookies;


    }

    //购物车页面
    public function actionShopcart()
    {
        return $this->render('shopcart');
    }
    //加入收藏夹
    public function actionShopcart_add()
    {
        //echo 123;die;
        $post=Yii::$app->request->post();
        $user_id=1;
         //user_$id=Yii::$app->session->set('user_id',$id);
        $fa = new favorite();
        $fa->user_id=$user_id;
        $fa->goods_id=$post['goods_id'];
        $fa->time=date("Y-m-d H:i:s");
        if($fa->save()){
            echo 1;
        }else{
            echo 0;
        }
    }
}