<?php 
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>header</title>
<base href="http://www.fourshopb.com/<?= Url::to("@web/")?>">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="header">
 <div class="logo">
  <img src="images/admin_logo.png" title="在哪儿"/>
 </div>
 <div class="fr top-link">
  <a href="admin_list.html" target="mainCont" title="DeathGhost"><i class="adminIcon"></i><span id="user" name="1">欢迎<?=$admin_name ?>管理员登陆</span></a>
  <a href="javascript:void(0)" target="mainCont" title="修改密码"><i class="revisepwdIcon"></i><span id="up">修改密码</span></a>
  <a href="javascript:void(0)" title="安全退出" style="background:rgb(60,60,60);"><i class="quitIcon"></i><span id="out">安全退出</span></a>
 </div>
</div>
</body>
</html>

<script type="text/javascript" src="/jquery-1.8.3.js"></script>
<script type="text/javascript">
	//退出登录
$(function(){
	$('#out').click(function(){
		//var id=$('#user').attr('name');
		$.ajax({
			url:"<?= URL::to(['login/goout'])?>",
			// data:{id:id},
			// type:'post',
			success:function(){
				window.parent.location.href="<?= URL::to(['login/login'])?>";
			}
		})
	})
})
//修改密码
$(function(){
	$('#up').click(function(){
		//var id=$('#user').attr('name');
		$.ajax({
			url:"<?= URL::to(['login/uplogin'])?>",
			// data:{id:id},
			// type:'post',
			success:function(){
				window.parent.location.href="<?= URL::to(['login/uplogin'])?>";
			}
		})
	})
})
</script>