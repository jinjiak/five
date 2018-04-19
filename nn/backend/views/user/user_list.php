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
   <!--  <span class="modular fr"><a href="<?= Url::to(['user/add_user']);?>" class="pt-link-btn">+添加新用户</a></span> -->
  </div>
  <div class="operate">
   <form>
   </form>
  </div>
  <table class="list-style Interlaced">
   <tr>
        <th>编号</th>
        <th>头像</th>
        <th>用户名</th>
        <th>密码</th>
        <th>状态</th>
        <th>手机号</th>
        <th>邮箱</th>
        <th>操作</th>
   </tr>
   <?php foreach ($alias as $key => $value) { ?>
   <tr>
        <td>
            <input type="checkbox"/>
            <span class="middle"><?php echo $value['user_id'] ?></span>
        </td>
      
        <td width="10%"><img src='<?='http://www.fourshopa.com/'.$value['head_ico'] ?>' width='50px' height='50px'></td>

        <td class="center"><?php echo $value['user_name'] ?></td>
        <td class="center"><?php echo $value['user_pwd'] ?></td>
        <td class="center">
            <?php if ($value['user_status'] == 1) {?>
                <img src="images/yes.gif"/>
            <?php } else { ?>
                <img src="images/no.gif"/>
            <?php } ?>
        </td>
    <td class="center"><?php echo $value['user_tel'] ?></td>
    <td class="center"><?php echo $value['user_email'] ?></td> 
    <td class="center">
        <a class="inline-block" href="<?= Url::to(['user/del','user_id'=>$value['user_id']]);?>" title="删除"><img src="images/icon_drop.gif"/></a>
    </td>
   </tr>
      <?php  } ?>
  </table>
  <!-- BatchOperation -->
  <div style="overflow:hidden;">
	  <div class="turnPage center fr">
	  </div>
  </div>
 </div>
</body>
</html>

