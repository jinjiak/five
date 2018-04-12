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
}
