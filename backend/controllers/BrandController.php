<?php
namespace backend\controllers;

use yii\web\Controller;

class BrandController extends Controller
{
    // ...现存的代码...
	public $layout = 'memeber.php';

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
	public function actionBrand_list()
	{
		return $this->render("brand_list");
	}
}
?>