<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\models\EntryForm;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <base href="http://www.fourshopb.com/<?= Url::to("@web/")?>">
<title>添加新用户</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i class="add_user"></i><em>添加新用户</em></span>
  </div>
  <form action="<?= Url::to(['power/power_admin_save']);?>" method="post">
    <table class="list-style">
     <tr>
      <td style="width:15%;text-align:right;">账号：</td>
      <td><input type="text" name="admin_name" class="textBox length-middle"/></td>
     </tr>
     <tr>
      <td style="text-align:right;">设置密码：</td>
      <td><input type="password" name="admin_pwd" class="textBox length-middle"/></td>
      </tr>
    
     <tr>
      <td style="text-align:right;"></td>
      <td><input type="submit" class="tdBtn" value="添加新用户"/></td>
     </tr>
    </table>
  </form>
 </div>
</body>
</html>