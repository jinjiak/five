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
    <span class="modular fl"><i class="add"></i><em>编辑/添加品牌</em></span>
    <span class="modular fr"><a href="<?= Url::to(['brand/brand_list']);?>" class="pt-link-btn">品牌列表</a></span>
  </div>
  <form action="<?= Url::to(['brand/update_do'])?>" method="post" enctype="multipart/form-data">
  <table class="list-style">

  <?php foreach ($data as $key => $value): ?>

    <tr>
      <td style="text-align:right;width:15%;">品牌名称：</td>
      <td><input type="text" value="<?php echo $value['brand_name'] ?>" name="brand_name" id="brand_name" class="textBox length-long"/><input type="hidden" name="brand_id" value="<?= $value['brand_id']?>"></td>
    </tr>
     
    <tr>
      <td style="text-align:right;">品牌logo：</td>
      <td>
             <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
                         <?= $form->field($brand, 'brand_logo')->fileInput() ?>
       <img src="<?= 'http://www.fourshopb.com/'.$value['brand_logo'] ?>" width="60" height="60" class="mlr5"/>
      </td>
    </tr>

    <tr>
      <td style="text-align:right;">品牌描述：</td>
      <td><input type="text" value="<?php echo $value['description'] ?>" name="description" id="description" class="textBox length-long"/></td>
    </tr>
        <tr>
      <td style="text-align:right;">品牌排序：</td>
      <td><input type="text" value="<?php echo $value['sort'] ?>" name="sort" id="description" class="textBox length-long"/></td>
    </tr>
  <?php endforeach ?>

  <tr>
    <td style="text-align:right;"></td>
    <td><input type="submit" value="修改" class="tdBtn"/></td>
  </tr>
  </table>
  </form>
 </div>
</body>
</html>