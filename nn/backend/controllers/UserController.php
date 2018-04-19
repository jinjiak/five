<?php
namespace backend\controllers;

use yii;
use yii\web\Controller;
use yii\data\Pagination;
use backend\models\User;
use backend\models\Userinfo;
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
        $User = new User;
        $Userinfo = new Userinfo; 
        $Companydetails_res = User::find()->where(['user_status' => 1])->innerjoinWith('userinfo')->all();
         //var_dump($Companydetails_res);die;

        return $this->render('user_list',["alias"=>$Companydetails_res]);

    }
    //删除
    public function actionDel(){
        $get=Yii::$app->request->get();
        $user_id=$get['user_id'];
        //var_dump($user_id);
        $model= new User();
        $update = $model->find()->where(['user_id' => $user_id])->one();
        $update->user_status = 0;
        $yes = $update->save();
        if ($yes) {
            return $this->redirect(['user/user_list']);
        } else {
            return $this->render('user_list');
        }
    }


      
 
}
