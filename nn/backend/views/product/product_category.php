<?php 
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="http://www.fourshopb.com/<?= Url::to("@web/")?>">
<title>产品分类</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i></i><em>分类列表</em></span>
    <span class="modular fr"><a href="<?= Url::to(['product/add_category']);?>" class="pt-link-btn">添加新分类</a></span>
  </div>

  <table class="list-style">
   <tr>
    <th>分类名称</th>
    <th>是否显示</th>
    <th>操作</th>
   </tr>

   
   <?php foreach ($res as $key => $v): ?>
   <tr>
    <td>
     <input type="checkbox"/>
     <?php echo $v['html'] ?>
     <span><?= $v['category_name'] ?></span>
    </td>
    <td class="center"><img src="images/yes.gif"/></td>
    <td class="center"><a href="<?=Url::toRoute(['product/del_category', 'category_id' => $v['category_id']]); ?>">删除</a></td>
   </tr>
   
   <?php endforeach ?>
   
   
  </table>
  
  <!-- BatchOperation -->
  <div style="overflow:hidden;">
	  <!-- turn page -->
	  <div class="turnPage center fr">
	   <a>第一页</a>
	   <a>1</a>
	   <a>最后一页</a>
	  </div>
  </div>
 </div>
</body>
</html>