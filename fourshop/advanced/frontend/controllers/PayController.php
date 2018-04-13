<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\EntryForm;

class PayController extends Controller
{
    public $layout = 'pay.php';
    public function init()
    {
        $this->enableCsrfValidation = false;
    }

    //支付页面
    public function actionPay()
    {
        return $this->render('pay');
    }
}
