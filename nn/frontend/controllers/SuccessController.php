<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\EntryForm;

class SuccessController extends Controller
{
    public $layout = 'success.php';
    public function init()
    {
        $this->enableCsrfValidation = false;
    }

    //付款成功页面
    public function actionSuccess()
    {
        return $this->render('success');
    }
}
