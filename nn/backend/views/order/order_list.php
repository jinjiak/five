<?php 
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <base href="http://www.fourshopb.com/<?= Url::to("@web/")?>">
<title>订单列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/public.js"></script>
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i class="order"></i><em>订单列表</em></span>
  </div>
  <div class="operate">
   <form>
    <img src="images/icon_search.gif"/>
    <input type="text" class="textBox length-long" placeholder="输入订单编号或收件人姓名..."/>
    <select class="inline-select">
     <option>未付款</option>
     <option>已付款</option>
    </select>
    <input type="button" value="查询" class="tdBtn"/>
   </form>
  </div>
  <table class="list-style Interlaced">
   <tr>
    <th>订单编号</th>
    <th>下单时间</th>
    <th>收件人</th>
    <th>应付商品总金额</th>
    <th>订单状态</th>
    <th>操作</th>
   </tr>
   <?php foreach ($res as $key => $v): ?>
     
   <tr>
    <td>
     <input type="checkbox"/>
     <i><?= $v['order_no'] ?></i>
    </td>
    <td class="center">
     <span class="block">DeatGhost</span>
     <i><?= $v['create_time'] ?></i>
    </td>
    <td width="450">
     <i><?= $v['accept_name'] ?></i>
     <i><?= $v['address'] ?></i>
    </td>
    <td class="center">
     <i><?= $v['payable_amount'] ?></i>
    </td>
    <td class="center">
     <span>未付款</span>
    </td>
    <td class="center">
     <a href="order_detail.html" class="inline-block" title="查看订单"><img src="images/icon_view.gif"/></a>
     <a href="<?=Url::toRoute(['order/del_order', 'order_id' => $v['order_id']]); ?>">删除</a>
    </td>
   </tr>

   <?php endforeach ?>
  </table>
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