<?php
namespace backend\controllers;

use yii\web\Controller;

class LoginController extends Controller
{
    // ...现存的代码...
	public $layout = false;

	public function init()
	{
        $this->enableCsrfValidation = false;
    }

    /**
	 *
	 *登陆
	 * @param 
	 * @return array
	 */
	public function actionLogin()
	{
		return $this->render("login");
	}
}
?>