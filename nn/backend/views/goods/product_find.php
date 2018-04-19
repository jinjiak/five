<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="http://www.fourshopb.com/<?= Url::to("@web/")?>">
<title>产品列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i class="add"></i><em>修改商品</em></span>
    <span class="modular fr"><a href="<?= Url::to(['goods/product_list']);?>" class="pt-link-btn">商品列表</a></span>
  </div>
  <form action="<?= Url::to(['goods/product_update']);?>" method="post" enctype ='multipart/form-data'>
  <table class="list-style">
   <tr>
    <td style="text-align:right;width:15%;">商品名称：</td>
    <td><input type="text" name="goods_name" value="<?=$goods['goods_name'] ?>" class="textBox length-long"/></td>
    <input type="hidden" name="goods_id" value="<?=$goods['goods_id']?>">
   </tr>
    <tr>
    <td style="text-align:right;">商品品牌：</td>
    <td>
     <select class="textBox" name="brand_id">
      <!-- <optgroup label="西餐"> -->
        <?php foreach ($brand as $key => $value): ?>
          <option value="<?php echo $value['brand_id'] ?>"
              <?php 
                if($value['brand_id']==$goods['brand_id']){
                  echo "selected='selected'";
                }
               ?>
            >
            <?php echo $value['brand_name'] ?>   
            </option>
        <?php endforeach ?>
     </select>
    </td>
   </tr>
   <tr>
   <tr>
    <td style="text-align:right;">销售价格：</td>
    <td>
     <input type="text" name="sell_price" value="<?=$goods['sell_price']?>" class="textBox length-short"/>
     <span>元</span>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;">市场价格：</td>
    <td>
     <input type="text" name="market_price" value="<?=$goods['market_price']?>" class="textBox length-short"/>
     <span>元</span>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;">成本价格：</td>
    <td>
     <input type="text" name="cost_price" value="<?=$goods['cost_price']?>" class="textBox length-short"/>
     <span>元</span>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;">库存：</td>
    <td>
     <input type="text" name="store_nums" value="<?=$goods['store_nums']?>" class="textBox length-short"/>
     <span>盘</span>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;">商品状态：</td>
    <td>
     <input type="radio" name="is_status" value="3" id="jingpin"
      <?php 
        if($goods['is_status']=='3'){
          echo "checked='checked'";
        }
      ?>
     />
     <label for="jingpin">上架</label>
      <input type="radio" name="is_status" value="2" id="jingpin"
      <?php 
        if($goods['is_status']=='2'){
          echo "checked='checked'";
        }
      ?>
     />
     <label for="jingpin">下架</label>
      <input type="radio" name="is_status" value="0" id="jingpin"
      <?php 
        if($goods['is_status']=='0'){
          echo "checked='checked'";
        }
      ?>
     />
     <label for="jingpin">正常</label>
    </td>
   </tr>
  <tr>
      <td style="text-align:right;">商品图片：</td>
      <td>
             <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
                         <?= $form->field($goods, 'ablum_path')->fileInput() ?>
       <img src="<?= 'http://www.fourshopb.com/'.$goods['ablum_path'] ?>" width="60" height="60" class="mlr5"/>
      </td>
    </tr>
   <tr>
    <td style="text-align:right;">商品详情：</td>
    <td><textarea class="textarea" name="content" ><?=$goods['content'] ?></textarea></td>
   </tr>
   <tr>
    <td style="text-align:right;"></td>
    <td><input type="submit" value="发布新商品" class="tdBtn"/></td>
   </tr>
  </table>
  </form>
 </div>
</body>
</html>