<?php
namespace backend\controllers;
use Yii;
use yii\web\Controller;
use backend\models\Admin;
use backend\models\Power;
use backend\models\AdminPower;

class PowerController extends Controller
{
    // ...现存的代码...
	public $layout = false;
	public function init()
	{
        $this->enableCsrfValidation = false;
    }
    //后台用户列表
    public function actionPower_admin(){
        $admin=new admin();
        $bb=$admin->find()->all();
    	return $this->render("power_admin",['bb'=>$bb]);
    }
    //后台用户添加
    public function actionPower_admin_add(){
    	return $this->render("power_admin_add");
    }
    //后台用户添加
    public function actionPower_admin_save(){
        $post=Yii::$app->request->post();
        $admin=new admin();
        $admin->admin_name=$post['admin_name'];
        $admin->admin_pwd=$post['admin_pwd'];
        if($admin->save()){
            $this->redirect(array('power/power_admin'));
        }else{
            $this->redirect(array('power/power_admin_add'));
        }
    }
    //后台用户删除
    public function actionPower_admin_del(){
        $ids=Yii::$app->request->get();
        $id=$ids['id'];
        $admin=new admin();
        if($admin->deleteAll("admin_id=".$id)){
            $this->redirect(array('power/power_admin'));
        }
    
    }
    //权限列表
    public function actionPower_tion(){
        $power=new power();
        $bb=$power->find()->all();
        return $this->render("power_tion",['bb'=>$bb]);
    }
    //权限添加
    public function actionPower_tion_add(){
        return $this->render("power_tion_add");
    }
     //权限添加操作
    public function actionPower_tion_save(){
        $post=Yii::$app->request->post();
        $power=new power();
        $power->power_name=$post['power_name'];
        $power->controller=$post['controller'];
        $power->action=$post['action'];
        if($power->save()){
            $this->redirect(array('power/power_tion'));
        }else{
            $this->redirect(array('power/power_tion_add'));
        }
    }
    //修改页面
    public function actionPower_tion_find(){
        $power=new power();
        $post=Yii::$app->request->get();
        $id=$post['id'];
        $bb=$power->find()->where(['power_id'=>$id])->one(); 
        //var_dump($bb); 
        return $this->render("power_tion_find",['bb'=>$bb]);
    }
    //权限修改
    public function actionPower_tion_update(){
        $post=Yii::$app->request->post();
        $id=$post['power_id'];
        $power=new power();
        $bb=$power->find()->where(['power_id'=>$id])->one();       
        $bb->power_name=$post['power_name'];
        $bb->controller=$post['controller'];
        $bb->action=$post['action'];
        if($bb->save()){
            $this->redirect(array('power/power_tion'));
        }else{
            $this->redirect(array('power/power_tion_add'));
        }
    }
    //权限删除
    public function actionPower_tion_del(){
        $ids=Yii::$app->request->get();
        $id=$ids['id'];
        $power=new power();
        if($power->deleteAll("power_id=".$id)){
            $this->redirect(array('power/power_tion'));
        }
    }
    //后台权限列表
    public function actionPower_list(){
        $connection = \Yii::$app->db;    
        $command = $connection->createCommand('select * from admin_power as ap,power as p,admin as a where ap.admin_id=a.admin_id and ap.power_id=p.power_id ');
        $posts = $command->queryAll();
        
        //var_dump($bb); 
        return $this->render("power_list",['posts'=>$posts]);
    }
     //后台权限添加
    public function actionPower_list_add(){
        $power=new power();
        $admin=new admin();
        $aa=$admin->find()->all(); 
        $bb=$power->find()->all();  
        return $this->render("power_list_add",['aa'=>$aa,'bb'=>$bb]);
    }
    //用户权限添加
    public function actionPower_list_save(){
        $post=Yii::$app->request->post();
        $admin_id=$post['admin_id'];
        foreach ($post['power_id'] as $key => $value) {
            $res = YII::$app->db->createCommand("insert into admin_power(admin_id,power_id)values('$admin_id','$value')")->execute();           
        
        }
        if($res){
            $this->redirect(array('power/power_list'));
        }
        
    }
     //用户权限删除
    public function actionPower_list_del(){
        $ids=Yii::$app->request->get();
        $id=$ids['id'];
        $power=new adminpower();
        if($power->deleteAll("id=".$id)){
            $this->redirect(array('power/power_list'));
        }
    }
}
