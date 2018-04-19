<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Admin;

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
		$model = new Admin();
		if ($_POST)
		{
			$data = Yii::$app->request->post();
			//var_dump($data);die;
			$admin_name = $data['admin_name'];
			//var_dump($admin_name);die;
			$res = $model->find()->where(['admin_name'=>$data['admin_name'], 'admin_pwd'=>$data['admin_pwd']])->one();
			//print_r($res);die;
			$admin_id = $res['admin_id'];
			//var_dump($admin_id);die;
			if ($res)
			{
				$session = Yii::$app->session;
				$result = [
					'admin_id'=>$admin_id,
					'admin_name'=>$admin_name,
				];
				//print_r($result);die;
				$session->set('admin', $result);
				return $this->redirect(array('index/index'));
			}
			else
			{
				return $this->render('login');
			}

		}
		else
		{
			return $this->render('login');
		}
		
	}

	//退出登录
	public function actionGoout()
	{
		
		$session = Yii::$app->session;
        $session->remove('admin');

        echo 1;die;
       // return $this->redirect(['login/login']);
	}

	//修改密码
	public function actionUplogin()
	{
		if ($_POST) {
			$Admin = new Admin;
			$data = Yii::$app->request->post();

			$admin_pwd = $data['admin_uppwd'];
			$admin_id = $data['admin_id'];
			
			$admin_res = $Admin->find()->where(['admin_id' => $admin_id])->one();
			$admin_res->admin_pwd = $admin_pwd;
			//var_dump($admin_res->admin_pwd);die;
			$res = $admin_res->save();
			if ($res) {
				return $this->redirect(['login/login']);
			} else {
				return $this->render(['login/login']);
			}
		} else {

			$model = new Admin(	);
			$session = Yii::$app->session;
			$admin = $session->get('admin');
			$admin_id = $admin['admin_id'];

			$res_list = $model->find()->where(['admin_id' => $admin_id])->asArray()->one();
			//var_dump($select);die;
			return $this->render('uplogin',array('res_list'=>$res_list));

		}

	}
}


?>