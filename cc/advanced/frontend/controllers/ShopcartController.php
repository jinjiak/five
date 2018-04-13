<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\EntryForm;

class ShopcartController extends Controller
{
    public $layout = 'shopcart.php';
    public function init()
    {
        $this->enableCsrfValidation = false;
    }

    //购物车页面
    public function actionShopcart()
    {
        return $this->render('shopcart');
    }
}