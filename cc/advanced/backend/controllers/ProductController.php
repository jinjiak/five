<?php
namespace backend\controllers;

use yii\web\Controller;

class ProductController extends Controller
{
    // ...现存的代码...
	public $layout = false;
	public function init()
	{
        $this->enableCsrfValidation = false;
    }
    
    public function actionProduct_category()
    {
        return $this->render("product_category");
    }
    public function actionAdd_category()
    {
        return $this->render("add_category");
    }

  

}
?>