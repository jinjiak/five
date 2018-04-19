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
	//主页头部
	public function actionTop()
	{
		return $this->render("top");
	}
	//左侧导航
	public function actionMenu()
	{
		return $this->render("menu");
	}

	public function actionBar()
	{
		return $this->render("bar");
	}
	public function actionMain()
	{
		return $this->render("main");
	}


}
?>