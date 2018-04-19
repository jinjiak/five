<?php 
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="http://www.fourshopb.com/<?= Url::to("@web/")?>">
<title>商品列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i class="add"></i><em>编辑/添加商品</em></span>
    <span class="modular fr"><a href="<?= Url::to(['goods/product_list']);?>" class="pt-link-btn">商品列表</a></span>
  </div>
  <form action="<?= Url::to(['goods/edit_product']);?>" method="post" enctype='multipart/form-data'>
  <table class="list-style">
   <tr>
    <td style="text-align:right;width:15%;">商品名称：</td>
    <td><input type="text" class="textBox length-long" name="goods_name" /></td>
   </tr>
    <tr>
   <tr>
    <td style="text-align:right;">商品分类：</td>
    <td>
     <select class="textBox" name="category_id">
        <?php foreach ($data as $key => $value): ?>
              <option value="<?= $value['category_id']?>"><?= $value['html']?><?= $value['category_name']?></option>
        <?php endforeach ?>
     </select>
    </td>
   </tr>
      <tr>
    <td style="text-align:right;">商品品牌：</td>
    <td>
     <select class="textBox" name="brand_id">
        <?php foreach ($brand_list as $key => $value): ?>
              <option value="<?= $value['brand_id']?>"><?= $value['brand_name']?></option>
        <?php endforeach ?>
     </select>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;">市场价：</td>
    <td>
     <input type="text" class="textBox length-short" name="market_price" />
     <span>元</span>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;">销量价：</td>
    <td>
     <input type="text" class="textBox length-short" name="sell_price" />
     <span>元</span>
    </td>
   </tr>
    <tr>
    <td style="text-align:right;">成本价：</td>
    <td>
     <input type="text" class="textBox length-short" name="cost_price" />
     <span>元</span>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;">库存：</td>
    <td>
     <input type="text" class="textBox length-short" name="store_nums" />
     <span>盘</span>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;">商品主图：</td>
    <td>
      <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
                         <?= $form->field($Ablum, 'ablum_img')->fileInput() ?>
    </td>
   </tr>
   
   <tr>
    <td style="text-align:right;">商品详情：</td>
    <td><textarea class="textarea" name="content">...这里直接调用文本编辑器...移除此处的“textarea”即可</textarea></td>
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
<script type="text/javascript" src="<?= Url::to("@web/js/jquery-1.8.3.js"); ?>"></script>
<script type="text/javascript">
</script>