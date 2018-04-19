<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Order;

class OrderController extends Controller
{
    // ...现存的代码...
	public $layout = false;
	public function init()
	{
        $this->enableCsrfValidation = false;
    }
    //订单展示
    public function actionOrder_list()
    {
        $model = new Order();
        $session = Yii::$app->session;
        $res = $model->find()->asArray()->all();
        // var_dump($res);die;
        return $this->render('order_list', ['res' => $res]);
    }

    //订单删除
    public function actionDel_order()
    {

        $order_id = $_GET['order_id'];
        $where = "order_id = $order_id";
        $res = Yii::$app->db->createCommand()->delete('order', $where)->execute();
        if ($res)
        {
            $this->redirect(array('order/order_list'));
        }
        else
        {
           $this->redirect(array('order/order_list'));
        }
    }
    

  

}
?>