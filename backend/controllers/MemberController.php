<?php
namespace backend\controllers;

use yii\web\Controller;

class MemberController extends Controller
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
	public function actionMember_list()
	{
		return $this->render("member_list");
	}
}
?>