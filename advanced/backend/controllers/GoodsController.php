<?php
namespace backend\controllers;

use yii\web\Controller;

class GoodsController extends Controller
{
    // ...现存的代码...
	public $layout = false;

	public function init()
	{
        $this->enableCsrfValidation = false;
    }
    /**
	 *
	 *商品分类列表
	 * @param 
	 * @return array
	 */
	//商品列表
    public function actionProduct_list(){
    	return $this->render("product_list");
    }
    //商品添加
    public function actionEdit_product(){
    	return $this->render("edit_product");
    }
}
?>