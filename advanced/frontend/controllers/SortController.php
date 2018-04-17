<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\EntryForm;

class SortController extends Controller
{
    public $layout = 'sort.php';
    public function init()
    {
        $this->enableCsrfValidation = false;
    }

    //全部分类
    public function actionSort()
    {
        return $this->render('sort');
    }
}
