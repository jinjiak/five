<?php 
use yii\helpers\Html;
use yii\helpers\Url;
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
    <span class="modular fl"><i class="add_user"></i><em>添加新会员</em></span>
  </div>
  <form action="<?= Url::to(['power/power_list_save']);?>" method="post">
  <table class="list-style">
   <tr>
    <td style="width:15%;text-align:right;">用户昵称：</td>
    <td>
      <select name="admin_id">
        <?php foreach ($aa as $key => $val): ?>
        <option value="<?php echo $val['admin_id'] ?>"><?php echo $val['admin_name'] ?></option>
        <?php endforeach ?>
      </select>
      <!-- <input type="text" name="admin_name" class="textBox length-middle"/> --></td>
   </tr>
   <tr>
    <td style="width:15%;text-align:right;">权限：</td>
    <td>
      <?php foreach ($bb as $key => $value): ?>
        <p><input type="checkbox" name="power_id[]" value="<?php echo $value['power_id'] ?>" /><?php echo $value['power_name'] ?></p>
      <?php endforeach ?>
      
    </td>
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