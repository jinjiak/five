<?php 
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <base href="http://www.fourshopb.com/<?= Url::to("@web/")?>">
<title>权限列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/public.js"></script>
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i class="user"></i><em>权限列表</em></span>
    <span class="modular fr"><a href="<?= Url::to(['power/power_tion_add']);?>" class="pt-link-btn">+添加新权限</a></span>
  </div>
  <div class="operate">
   
  </div>
  <table class="list-style Interlaced">
   <tr>
     <th>编号</th>
     <th>权限名称</th>
     <th>控制器</th>
     <th>方法</th>
     <th>操作</th>
   </tr>
   <?php foreach ($bb as $key => $value): ?>
     <tr>
      <td>
       <input type="checkbox"/>
       <span class="middle"><?php echo $value['power_id'] ?></span>
      </td>
      <td class="center"><?php echo $value['power_name'] ?></td>
      <td class="center"><?php echo $value['controller'] ?></td>
      <td class="center"><?php echo $value['action'] ?></td>
      <td class="center">
       <a href="<?= Url::to(['power/power_tion_find','id'=>$value['power_id']]);?>" class="inline-block" title="编辑"><img src="images/icon_edit.gif"/></a>
       <a class="inline-block" href="<?= Url::to(['power/power_tion_del','id'=>$value['power_id']]);?>" title="删除"><img src="images/icon_drop.gif"/></a>
      </td>
     </tr>
    <?php endforeach ?>  
 
  </table>
  <!-- BatchOperation -->
  <div style="overflow:hidden;">
      <!-- Operation -->
	  <!-- <div class="BatchOperation fl">
	   <input type="checkbox" id="del"/>
	   <label for="del" class="btnStyle middle">全选</label>
	   <input type="button" value="批量删除" class="btnStyle"/>
	  </div>
	  turn page -->
	  <!-- <div class="turnPage center fr">
	   <a>第一页</a>
	   <a>1</a>
	   <a>最后一页</a> -->
	  </div>
  </div>
 </div>
</body>
</html>