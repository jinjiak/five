<?php
namespace backend\controllers;

use yii\web\Controller;

class IndexController extends Controller
{
    // ...现存的代码...
	public $layout = false;
	public function init()
	{
        $this->enableCsrfValidation = false;
    }

    /**
	 *
	 *主页面
	 * @param 
	 * @return array
	 */
	public function actionIndex()
	{

		return $this->render("index");
	}

	/**
	 *
	 *
	 * @param 
	 * @return array
	 */
	public function actionMain()
	{
		return $this->render("main");
	}
}
?>