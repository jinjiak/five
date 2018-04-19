<?php
namespace backend\controllers;
use Yii;
use yii\web\Controller;
use yii\db\Connection;
use yii\helpers\Url;
use backend\models\Type;
use backend\models\Ablum;
use backend\models\Attribute;
use backend\models\GoodsAttribute;
use backend\models\Products;
use backend\models\Goods;
use backend\models\Category;
use backend\models\Brand;
use yii\web\UploadedFile;
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
        $connection = Yii::$app->db;
        $command = $connection->createCommand("select * from goods as g,category as c,brand as b where g.category_id=c.category_id and g.brand_id=b.brand_id and is_status!=1");        
        $data = $command->queryAll();     
        return $this->render('product_list',["aa"=>$data]);

    }
    //删除
    public function actionDel(){
        $get=Yii::$app->request->get();
        $goods_id=$get['goods_id'];
        //var_dump($goods_id);die;
        $model= new goods();
        $update = $model->find()->where(['goods_id' => $goods_id])->one();
        //var_dump($update);die;
        $update->is_status = 1;
        $yes = $update->save();
        //var_dump($yes);die;
        if ($yes) {
            return $this->redirect(['goods/product_list']);
        } else {
            return $this->redirect(['goods/product_list']);
        }
    }
    //商品修改页面
    public function actionProduct_find(){
        $get=Yii::$app->request->get();
        $goods_id=$get['goods_id'];
        //var_dump($goods_id);die;
        $brand=new brand();
        $goods= new goods();
        $goods = $goods->find()->where(['goods_id' => $goods_id])->one();
        $brand = $brand->find()->all();
        return $this->render('product_find',["goods"=>$goods,"brand"=>$brand]);
    }
    public function actionProduct_update(){
        $po=Yii::$app->request->post();
        $goods_id=$po['goods_id'];
        $goods= new goods();
        $g=$goods->find()->where(['goods_id'=>$goods_id])->one();
       //var_dump($po);
        // var_dump($g);die;
        $goods->ablum_path  = UploadedFile::getInstance($goods, 'ablum_path');
        $ablum_path = 'uploads/'.date('YmdHis').rand(1111,9999).'.'.$goods->ablum_path->extension;
        $goods->ablum_path->saveAs($ablum_path);
        $g->ablum_path = $ablum_path;
        $g->goods_name=$po['goods_name'];
        $g->sell_price=$po['sell_price'];
        $g->market_price=$po['market_price'];
        $g->cost_price=$po['cost_price'];
        $g->store_nums=$po['store_nums'];
        $g->is_status=$po['is_status'];
        $g->brand_id=$po['brand_id'];
        $g->content=$po['content'];         
        // var_dump($g);die;
        if($g->save()){
            return $this->redirect(['goods/product_list']);
        }
    }
    //商品添加
    public function actionEdit_product(){
        $Ablum = new Ablum;
        $Goods = new Goods;
        // print_r($Goods);die;
        if ($_POST) { 
            $data = Yii::$app->request->post();
            $sell_price = $data['sell_price'];

             //var_dump($sell_price);die;
                $Ablum->ablum_img  = UploadedFile::getInstance($Ablum, 'ablum_img');
                //var_dump($Ablum->ablum_img);die;
                if ($Ablum->ablum_img) {
                    $ablum_img = 'uploads/'.date('YmdHis').rand(1111,9999).'.'.$Ablum->ablum_img->extension;
                    $Ablum->ablum_img->saveAs($ablum_img);
                    $Ablum->ablum_img =$ablum_img;
                    $Ablum->save();
                    $ablum_id = $Ablum->attributes['ablum_id'];
                    $ablum_res = $Ablum->find()->where(['ablum_id' => $ablum_id])->one();
                    $ablum_path = $ablum_res['ablum_img'];    
                    $Goods->goods_name = $data['goods_name'];
                    $Goods->category_id = $data['category_id'];
                    $Goods->brand_id = $data['brand_id'];
                    $Goods->market_price = $data['market_price'];
                    $Goods->sell_price = $data['sell_price'];
                    $Goods->cost_price = $data['cost_price'];
                    $Goods->store_nums = $data['store_nums'];
                    $Goods->content = $data['content'];
                    $Goods->ablum_path = $ablum_path;
                    $Goods->create_time = date("Y-m-d H:i",time());
                    $Goods->goods_no = date('Ymd').rand(1111,9999);
                    if ($Goods->save()) {
                       $goods_id = $Goods->attributes['goods_id'];
                       $session = Yii::$app->session;
                        $result = [
                            'goods_id'=>$goods_id,
                            'sell_price'=>$sell_price,
                        ];
                        $set_result = $session->set('goods_id', $result);
                        //print_r($set_result);die;
                        return $this->redirect(['goods/sku']);
                    } else {
                        return $this->redirect(['goods/product_list']);
                    }
                }    else {
                    return $this->redirect(['error/error', 'error' => "对不起没有接到图片"]);
                }
        } else {
            $Ablum = new Ablum;
            $Category = new Category;
            $Type = new Type;
            $Brand = new Brand;
            $brand_list = $Brand->find()->asArray()->all();
            $type_list = $Type->find()->asArray()->all();
            $category_res = $Category->find()->asArray()->all();
            $data = $this->tree($category_res);
            //print_r($type_list);die;
            return $this->render("edit_product",['data' => $data, 'type_list' => $type_list, 'Ablum' => $Ablum, 'brand_list' => $brand_list]);            
        }

    }

    public function actionSku()
    {
        if ($_POST) {
            $Attribute = new Attribute;
            $data = Yii::$app->request->post();
            $Specifications = $Attribute->find()->where(['type_id' => $data['type_id'], 'attribute_type' => 1])->asArray()->all();
            //var_dump($gg);
            if ($Specifications) {
                $parameter = $Attribute->find()->where(['type_id' => $data['type_id'], 'attribute_type' => 0])->asArray()->all();
                $date = ['Specifications' => $Specifications, 'parameter' => $parameter];
                echo json_encode($date);

            } else {
                return $this->redirect(['error/error', 'eroor' => '查询数据失败']);
            }
        } else {
            $Type = new Type;
            $type_list = $Type->find()->asArray()->all();
            return $this->render('sku',['type_list' => $type_list]);
        }
    }

    public function actionSpecifications()
    {

        $attribute_id = Yii::$app->request->post('attribute_id');
        $GoodsAttribute_res = Yii::$app->db->createCommand("select * from attribute,goods_attribute where attribute.attribute_id = $attribute_id and attribute.attribute_id = goods_attribute.attribute_id and attribute.attribute_type = 1")->queryAll();
        //print_r($GoodsAttribute_res);die;
        echo json_encode($GoodsAttribute_res);
    }

    public function actionParameter()
    {

        $attribute_id = Yii::$app->request->post('attribute_id');
        $Parameter_res = Yii::$app->db->createCommand("select * from attribute,goods_attribute where attribute.attribute_id = $attribute_id and attribute.attribute_id = goods_attribute.attribute_id and attribute.attribute_type = 0")->queryAll();
        //print_r($GoodsAttribute_res);die;
        echo json_encode($Parameter_res);
    }

    public function actionCombinationsku()
    {
        $Products = new Products;
        $GoodsAttribute = new GoodsAttribute;
        $session = Yii::$app->session;
        $result = $session->get('goods_id');
        $goods_id = $result['goods_id'];
        $sell_price = $result['sell_price'];
        $data = Yii::$app->request->post(); 
        $goods_attribute_one = $data['goods_attribute_id'];
        $goods_attribute_two = $data['goods_attributes_id'];
        $store_nums = $data['Stock'];
        $Products_res_one = $GoodsAttribute->find()->where(['goods_attribute_id' => $goods_attribute_one])->asArray()->one();
        if ($Products_res_one) {
            $spec_array_one = $Products_res_one['attribute_values'];
            $Products_res_two = $GoodsAttribute->find()->where(['goods_attribute_id' => $goods_attribute_two])->asArray()->one();
            if ($Products_res_two) {
                $spec_array_two = $Products_res_two['attribute_values'];
                $Products->products_no = $goods_attribute_one."_".$goods_attribute_two;
                $Products->spec_array = $spec_array_one."_".$spec_array_two;
                $Products->store_nums = $store_nums;
                $Products->goods_id = $goods_id;
                $Products->sell_price = $sell_price;
                if ($Products->save()) {
                    echo json_encode(1);
                } else {
                    return $this->redirect(['error/error', 'error' => '添加货品失败']);
                }
            } else {
                return $this->redirect(['error/error','error' => '属性值查询失败']);
            }
        } else {
            return $this->redirect(['error/error','error' => '规格值查询失败']);
        }

        
    }
    //递归循环
    function tree(&$list,$pid=0,$level=0,$html='--'){
        static $tree = array();
        foreach($list as $v){
            if($v['parent_id'] == $pid){
                $v['sort'] = $level;
                 $v['html'] = str_repeat($html,$level);
                $tree[] = $v;
                $this->tree($list,$v['category_id'],$level+1);
            } 
        }
        return $tree;
    }


}
?>