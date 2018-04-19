<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Brand;
use yii\web\UploadedFile;
class BrandController extends Controller
{
    // ...现存的代码...
	public $layout = false;

	public function init()
	{
        $this->enableCsrfValidation = false;
    }
    /**
	 *
	 *品牌列表
	 * @param 
	 * @return array
	 */
	public function actionBrand_list()
	{
		$model = new Brand();
        $session = Yii::$app->session;
        $res = $model->find()->asArray()->all();
        // var_dump($res);die;
        return $this->render('brand_list', ['res' => $res]);
		// return $this->render("brand_list");
	}

	//品牌添加
	public function actionAdd_brand()
	{
		if ($_POST) {
            $brand = new Brand;
            $data = Yii::$app->request->post();
            $brand->brand_logo  = UploadedFile::getInstance($brand, 'brand_logo');
            //var_dump($brand->brand_logo);die;
            if ($brand->brand_logo) {
                    $brand_logo = 'uploads/'.date('YmdHis').rand(1111,9999).'.'.$brand->brand_logo->extension;
                    $brand->brand_logo->saveAs($brand_logo);
                    $brand->brand_name = $data['brand_name'];
                    $brand->description = $data['description'];
                    $brand->brand_logo = $brand_logo;
                    $brand->sort = $data['sort'];
                    $brand_res = $brand->save();
                    if ($brand_res) {
                        return $this->redirect(['brand/brand_list']);
                    } else {
                        return $this->redirect(['error/error', 'error' => '添加失败']);
                    }
                } else {
                    return $this->redirect(['error/error', 'error' => '图片接受失败']);
                }
        } else {
            $brand = new Brand;
            return $this->render("add_brand",['brand' => $brand]);
        }
	}

    //品牌搜索
    public function actionSearch()
    {
        $model = new Brand();
        $search = Yii::$app->request->post();
        $find = $model->find()->where(["like","brand_name",$search])->asArray()->all();
        return json_encode($find);
    }

    //品牌删除
    public function actionDelete()
    {

        $brand_id = $_GET['brand_id'];
        $where = "brand_id = $brand_id";
        $res = Yii::$app->db->createCommand()->delete('brand', $where)->execute();
        if ($res)
        {
            $this->redirect(array('brand/brand_list'));
        }
        else
        {
           $this->redirect(array('brand/brand_list'));
        }
    }

    //品牌修改
    public function actionUpdate()
    {
        $brand = new Brand;
        $res = Yii::$app->request->get();  
        $brand_id = $res['brand_id'];  
        $sql = "select * from brand where brand_id = '$brand_id'"; 
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('up_brand',['data'=>$data, 'brand' => $brand]);
    }

    public function actionUpdate_do()
    {
        $brand = new Brand;
 
        $data = Yii::$app->request->post();
        $brand_id = $data['brand_id'];
        $brand->brand_logo  = UploadedFile::getInstance($brand, 'brand_logo');
        if ($brand->brand_logo) {
            $brand_logo = 'uploads/'.date('YmdHis').rand(1111,9999).'.'.$brand->brand_logo->extension;
            $brand->brand_logo->saveAs($brand_logo);
            $brand_res = $brand->find()->where(['brand_id' => $brand_id])->one();
            $brand_res->brand_id = $data['brand_id'];
            $brand_res->brand_name = $data['brand_name'];
            $brand_res->description = $data['description'];
            $brand_res->brand_logo = $brand_logo;
            $brand_update = $brand_res->save();
            if ($brand_update) {
                $res = $brand->find()->asArray()->all();
                return $this->render('brand_list',['res'=>$res]);
            } else {
                return $this->redirect(['error/error', 'error'=>'修改失败']);
            }
        } else {
            return $this->redirect(['error/error', 'error' => '图片接收失败']);
        }
    }
}
?>