<?php 
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <base href="http://www.fourshopb.com/<?= Url::to("@web/")?>">
<title>新增产品分类</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i></i><em>添加分类</em></span>
    <span class="modular fr"><a href="<?= Url::to(['product/product_category']);?>" class="pt-link-btn">添加分类</a></span>
  </div>
  <form action="<?= Url::to(['product/add_category'])?>" method="post" enctype="multipart/form-data">
  <table class="list-style">
   <tr>
    <td style="text-align:right;width:15%;">分类名称：</td>
    <td>
     <input type="text" class="textBox" name="category_name"/>
    </td>
   </tr>
   <tr>
    <td style="text-align:right;width:10%;">上级分类：</td>
    <td>
     <select class="textBox" name="category_id">
      <option value = "0">顶级分类</option>

      <?php foreach ($data as $key => $value): ?>   
　　      <option value="<?= $value['category_id']?>"><?= $value['html']?><?= $value['category_name']?></option>
　　  <?php endforeach ?>

     </select>
    </td>
   </tr>
   </tr>
   
   <tr>
    <td style="text-align:right;"></td>
    <td><input type="submit" value="保存" class="tdBtn"/></td>
   </tr>
   </tr>
  </table>
 </div>
</body>
</html>