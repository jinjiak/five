<?php 
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <base href="http://www.fourshopb.com/<?= Url::to("@web/")?>">
<title>商品列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/public.js"></script>
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i></i><em>商品列表</em></span>
    <span class="modular fr"><a href="<?= Url::to(['goods/edit_product']);?>" class="pt-link-btn">+添加商品</a></span>
  </div>
  <div class="operate">
   <form>
    <select class="inline-select">
     <option>A店铺</option>
     <option>B店铺</option>
    </select>
    <input type="text" class="textBox length-long" placeholder="输入产品名称..."/>
    <input type="button" value="查询" class="tdBtn"/>
   </form>
  </div>
  <table class="list-style Interlaced">
   <tr>
    <th></th>
    <th>分类</th>
    <th>商品名称</th>
    <th>商品货号</th>
    <th>销售价格</th>
    <th>市场价格</th>
    <th>成本价格</th> 
    <th>创建时间</th>
    <th>库存</th>
    <th>商品图片</th>
    <th>商品状态</th>
    <th>商品描述</th>
    <th>品牌</th>
    <th>操作</th>
   </tr>
  <?php foreach ($aa as $key => $value) { ?>
   <tr>
    <td>
      <input type="checkbox" class="middle children-checkbox"/>
     <span><?php echo $value['goods_id'] ?></span>
    </td>
    <td class="center"><?php echo $value['category_name'] ?></td>
    <td class="center"><?php echo $value['goods_name'] ?></td>
    <td class="center"><?php echo $value['goods_no'] ?></td>
    <td class="center"><?php echo $value['sell_price'] ?></td>
    <td class="center"><?php echo $value['market_price'] ?></td>
    <td class="center"><?php echo $value['cost_price'] ?></td>
    <td class="center"><?php echo $value['create_time'] ?></td>
    <td class="center"><?php echo $value['store_nums'] ?></td>

    <td width="10%"><img src='<?= 'http://www.fourshopb.com/'.$value['ablum_path']?>' width='50px' height='50px' ></td>
     <td class="center">
            <?php if ($value['is_status'] == 0) {?>
                <img src="images/yes.gif"/>
            <?php } else if ($value['is_status'] == 1) { ?>
                <img src="images/no.gif"/> 
            <?php } else if ($value['is_status'] == 2) {?>
                  <a href=""><a href="">下架</a></a>
            <?php } else {?>
                  <a href=""><a href="">申请上架</a></a>
            <?php } ?>
     </td>
    <td class="td-name"><?php echo $value['content'] ?></td>
    <td class="center"><?php echo $value['brand_name'] ?></td>
    <td class="center">
     <!-- <a title="查看" target="_blank"><img src="images/icon_view.gif"/></a> -->
     <a title="编辑"  href="<?= Url::to(['goods/product_find','goods_id'=>$value['goods_id']]);?>"><img src="images/icon_edit.gif"/></a>
     <a title="删除" href="<?= Url::to(['goods/del','goods_id'=>$value['goods_id']]);?>"><img src="images/icon_drop.gif"/></a>
    </td>
   </tr>  
     <?php } ?>
  </table>
  <!-- BatchOperation -->
  <div style="overflow:hidden;">
      <!-- Operation -->
	  <div class="BatchOperation fl">
	   <input type="checkbox" id="del"/>
	   <label for="del" class="btnStyle middle">全选</label>
	   <input type="button" value="批量删除" class="btnStyle"/>
	  </div>
	  <!-- turn page -->

  </div>
 </div>
</body>
</html>