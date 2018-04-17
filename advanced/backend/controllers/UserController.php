<?php
namespace backend\controllers;

use yii\web\Controller;

class UserController extends Controller
{
    // ...现存的代码...
	public $layout = false;
	public function init()
	{
        $this->enableCsrfValidation = false;
    }
    //用户
    public function actionUser_list(){
    	return $this->render("user_list");
    }
    public function actionAdd_user(){
        return $this->render("add_user");
    }
    

  

}
?>