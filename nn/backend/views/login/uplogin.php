<?php 
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<base href="http://www.fourshopb.com/<?= Url::to("@web/")?>">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一款基于JQuery做的动画背景后台管理登录模板 - </title>

<link href="css/main.css" rel="stylesheet" type="text/css" />

</head>
<body>


<div class="login">
    <div class="box png">				
		<div class="logo png"></div>
		<form action="<?= Url::to(['login/uplogin'])?>" method="post">
		<div class="input">
			<div class="log">

				<div class="pwd">
					<input type="hidden" name="admin_id" value = "<?= $res_list['admin_id']?>">
					<label>原	密	码</label><input type="text" id="pwd" class="text" placeholder="密码" name="admin_pwd" tabindex="2" value="<?=$res_list['admin_pwd'] ?>">
				</div>
				<div class="pwd">
					<label>新	密	码</label><input type="password" class="text" placeholder="密码" name="admin_uppwd" tabindex="2">
					<input type="submit" class="submit" tabindex="3" value="修改">
					<div class="check"></div>
				</div>

				<div class="tip"></div>
				
			</div>
		</div>
		</form>
	</div>
    <div class="air-balloon ab-1 png"></div>
	<div class="air-balloon ab-2 png"></div>
    <div class="footer"></div>
</div>

<script type="text/javascript" src="js/jQuerd.js"></script>
<script type="text/javascript" src="js/fun.base.js"></script>
<script type="text/javascript" src="js/script.js"></script>


<!--[if IE 6]>
<script src="js/DD_belatedPNG.js" type="text/javascript"></script>
<script>DD_belatedPNG.fix('.png')</script>
<![endif]-->
</body>
</html>
<script type="text/javascript" src="jquery-1.8.3.js"></script>
<script type="text/javascript">
	$("#pwd").blur(function(){
		var pwd = $("#pwd").val();
		var yuan = $("#yuan").val();

		if(pwd == yuan){
			alert('密码正确');
		}else{
			alert('密码有误');
		}
	})
</script>
