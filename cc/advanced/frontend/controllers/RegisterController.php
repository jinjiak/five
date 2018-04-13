<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\EntryForm;

class RegisterController extends Controller
{
    public $layout = 'register.php';
    public function init()
    {
        $this->enableCsrfValidation = false;
    }

    //注册模板
    public function actionRegister()
    {
        return $this->render('register');
    }
}
