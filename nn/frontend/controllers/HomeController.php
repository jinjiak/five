<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\EntryForm;

class HomeController extends Controller
{
    public $layout = 'home.php';
    public function init()
    {
        $this->enableCsrfValidation = false;
    }

    //前台模板
    public function actionHome()
    {
        return $this->render('home');
    }
}
