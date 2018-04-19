<?php 
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <base href="http://www.fourshopb.com/<?= Url::to("@web/")?>">
<title>用户列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/public.js"></script>
</head>
<body>
<div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i class="user"></i><em>用户列表</em></span>
    <span class="modular fr"><a href="<?= Url::to(['power/power_admin_add']);?>" class="pt-link-btn">+添加新用户</a></span>
  </div>
  <table class="list-style Interlaced">
   <tr>
     <th>编号</th>
     <th>管理员昵称</th>
     <th>管理员密码</th>
     <th>操作</th>
   </tr>
   <?php foreach ($bb as $key => $value): ?>
     
   
   <tr>
    <td>
     <input type="checkbox"/>
     <span class="middle"><?php echo $value['admin_id'] ?></span>
    </td>
    <td class="center"><?php echo $value['admin_name'] ?></td>
    <td class="center"><?php echo $value['admin_pwd'] ?></td>
    <td class="center">
     <a class="inline-block" href="<?= Url::to(['power/power_admin_del','id'=>$value['admin_id']]);?>" title="删除"><img src="images/icon_drop.gif"/></a>
    </td>
   </tr>
   <?php endforeach ?>
  </table>
  <!-- BatchOperation -->
 
  </div>
 </div>
</body>
</html>