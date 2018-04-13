<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\EntryForm;

class IndexController extends Controller
{
    public $layout = false;
    public function init()
    {
        $this->enableCsrfValidation = false;
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
    public function actionInfomation()
    {
        return $this->render('infomation');
    }

    //实名认证
    public function actionIdcard()
    {
        return $this->render('idcard');
    }

    //邮箱验证
    public function actionEmail()
    {
        return $this->render('email');
    }

    //收藏
    public function actionCollection()
    {
        return $this->render('collection');
    }

    //绑定手机
    public function actionBindphone()
    {
        return $this->render('bindphone');
    }

    //地址管理
    public function actionAddress()
    {
        return $this->render('address');
    }
}
