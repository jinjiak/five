<?php
namespace backend\controllers;

use yii\web\Controller;

class LoginController extends Controller
{
    // ...现存的代码...
	public $layout = 'login.php';

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
	public function actionLogin()
	{
		return $this->render("login");
	}
}
?>