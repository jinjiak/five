﻿<?php 
use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>左侧导航</title>
<base href="http://www.fourshopb.com/<?= Url::to("@web/")?>">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/public.js"></script>
</head>
<body style="background:#313131">
<div class="menu-list">
 <a href="main.html" target="mainCont" class="block menu-list-title center" style="border:none;margin-bottom:8px;color:#fff;">起始页</a>
 <ul>
  <li class="menu-list-title">
   <span>订单管理</span>
   <i>◢</i>
  </li>
  <li>
   <ul class="menu-children">
    <li><a href="<?= Url::to(['order/order_list']);?>" title="商品列表" target="mainCont">订单列表</a></li>
   </ul>
  </li>
 
  <li class="menu-list-title">
   <span>商品管理</span>
   <i>◢</i>
  </li>
  <li>
   <ul class="menu-children">
    <li><a href="<?= Url::to(['goods/product_list']);?>" title="商品列表" target="mainCont">商品列表</a></li>
    <li><a href="<?= Url::to(['product/product_category']);?>" title="商品分类" target="mainCont">商品分类</a></li>
    <li><a href="<?= Url::to(['brand/brand_list']);?>" title="商品品牌" target="mainCont">商品品牌</a></li>
   </ul>
  </li>
  
  <li class="menu-list-title">
   <span>用户管理</span>
   <i>◢</i>
  </li>
  <li>
   <ul class="menu-children">
    <li><a href="<?= Url::to(['user/user_list']);?>" title="用户列表" target="mainCont">用户列表</a></li>
    <li><a href="<?= Url::to(['user/add_user']);?>" title="添加用户" target="mainCont">添加用户</a></li>
   </ul>
  </li>
    
 </ul>
</div>
<div class="menu-footer">© 更多模板：<a href="http://www.mycodes.net/" target="_blank">源码之家</a></div>
</body>
</html>