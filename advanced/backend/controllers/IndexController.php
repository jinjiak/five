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
		$admin_id=7;
		$connection = \Yii::$app->db;    
        $command = $connection->createCommand('select * from admin_power inner join power on admin_power.power_id=power.power_id where admin_id='.$admin_id);
        $posts = $command->queryAll();
		return $this->render("menu",['posts'=>$posts]);
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