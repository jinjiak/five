<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\EntryForm;

class IntroductionController extends Controller
{
    public $layout = 'introduction.php';
    public function init()
    {
        $this->enableCsrfValidation = false;
    }

    //商品详情
    public function actionIntroduction()
    {
        return $this->render('introduction');
    }
}
