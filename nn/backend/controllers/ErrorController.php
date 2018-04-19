<?php
namespace backend\controllers;

use yii\web\Controller;

class ErrorController extends Controller
{
 	public $layout = false;
	  public function init()
	{
        $this->enableCsrfValidation = false;
    }

    /**
	 *
	 *报错页面
	 * @param 
	 * @return array
	 */
	public function actionError()
	{
		return $this->render('error');
	}

}