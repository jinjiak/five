<?php
namespace backend\controllers;

use yii\web\Controller;

class OrderController extends Controller
{
    // ...现存的代码...
	public $layout = false;
	public function init()
	{
        $this->enableCsrfValidation = false;
    }
    //订单展示
    public function actionOrder_list(){
    	return $this->render("order_list");
    }
    

  

}
?>