<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Category;

class ProductController extends Controller
{
    // ...现存的代码...
	public $layout = false;
	public function init()
	{
        $this->enableCsrfValidation = false;
    }
    
    //分类展示
    public function actionProduct_category()
    {
        $model = new Category();
        $session = Yii::$app->session;
        $res = $model->find()->asArray()->all();
        // var_dump($res);die;
        $res = $this->tree($res);
        //echo $res;die;
        return $this->render('product_category', ['res' => $res]);
    }

    //递归方法
    public function tree(&$list,$pid=0,$level=0,$html='--')
    {
        static $tree = array();
        foreach ($list as $key => $v)
        {
            if ($v['parent_id'] == $pid)
            {
               $v['sort'] = $level;
               $v['html'] = str_repeat($html, $level);
               $tree[] = $v;
               $this->tree($list,$v['category_id'],$level+1);
            }
        }
        return $tree;
    }

    //分类添加
    public function actionAdd_category()
    {   
        if ($_POST) {
            $db = new category;
            $category_id = $_POST['category_id'];
            
            $category_name = $_POST['category_name'];
            
            if($category_id == 0){
                $res = Yii::$app->db->createCommand("insert into category (category_name,parent_id,path) values ('$category_name','0','0')")->execute();
                echo "<script>alert('添加成功');location.href='?r=product/product_category'</script>";
            }else{
                // var_dump($category_id);die;
                // var_dump($parent_id);die;
                $res = category::find()->where("category_id = '$category_id'")->asArray()->one();
                // var_dump($res);die;
                $parent_id = $res['parent_id'];
                $path = $res['path'];
                // var_dump($path);die;
                // var_dump($category_name);die;
                $db->category_name = $category_name;
                // $db->parent_id = $res['parent_id'];
                $a=$db->parent_id = $category_id;
                // var_dump($a);die;
                $db->path=$path.'-'.$category_id;
                $sql = $db->save();
                echo "<script>alert('添加成功');location.href='?r=product/product_category'</script>";

            }
            


        } else {
            $model = new Category();
            $res = $model->find()->asArray()->all();
            //var_dump($res);die;
            $data = $this->tree($res);
            //var_dump($data);die;
            return $this->render("add_category",['data' => $data]);
        }
    }

    //分类删除
    public function actionDel_category()
    {
        $category_id = $_GET['category_id'];
        $where = "category_id = $category_id";
        $res = Yii::$app->db->createCommand()->delete('category', $where)->execute();
        // var_dump($res);die;
        if ($res)
        {
            $this->redirect(array('product/product_category'));
        }
        else
        {
           $this->redirect(array('product/product_category'));
        }
    }


}
?>