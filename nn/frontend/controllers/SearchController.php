<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\EntryForm;

class SearchController extends Controller
{
    public $layout = 'search.php';
    public function init()
    {
        $this->enableCsrfValidation = false;
    }

    //主页搜索
    public function actionSearch()
    {
        return $this->render('search');
    }
}