<?php 
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <base href="http://www.fourshopb.com/<?= Url::to("@web/")?>">
<title>修改新权限</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i class="add_user"></i><em>修改权限</em></span>
  </div>
 <form action="<?= Url::to(['power/power_tion_update']);?>" method="post">
  <table class="list-style">
   <tr>
    <td style="width:15%;text-align:right;">权限名：</td>
    <td><input type="text" name="power_name" value="<?php echo $bb['power_name']?>" class="textBox length-middle"/></td>
   </tr>
   <tr>
    <td style="text-align:right;">控制器：</td>
    <td><input type="text" name="controller" value="<?php echo $bb['controller']?>" class="textBox length-middle"/></td>
   </tr>
   <tr>
    <td style="text-align:right;">方法名：</td>
    <td><input type="text" name="action" value="<?php echo $bb['action']?>" class="textBox length-middle"/></td>
    <input type="hidden" name="power_id" value="<?php echo $bb['power_id']?>">
   </tr>
   <tr>
    <td style="text-align:right;"></td>
    <td><input type="submit" class="tdBtn" value="修改新权限"/></td>
   </tr>
  </table>
  </form>
 </div>
</body>
</html>