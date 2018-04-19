<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\EntryForm;

class LoginController extends Controller
{
    public $layout = 'login.php';
    public function init()
    {
        $this->enableCsrfValidation = false;
    }

    //登陆模板
    public function actionLogin()
    {
        return $this->render('login');
    }
}
