<?php 
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <base href="http://www.fourshopb.com/<?= Url::to("@web/")?>">
<title>品牌列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/public.js"></script>
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i></i><em>品牌列表</em></span>
    <span class="modular fr"><a href="<?= Url::to(['brand/add_brand']);?>" class="pt-link-btn">添加品牌</a></span>
  </div>
  <div class="operate">
   <form>
    <input type="text" id="search" class="textBox length-long" placeholder="输入品牌名称"/>
    <input type="button" id="find" value="查询" class="tdBtn"/>
   </form>
  </div>
  <table class="list-style Interlaced">
    <thead>
   <tr>
    <th>品牌ID</th>
    <th>品牌名称</th>
    <th>品牌logo</th>
    <th>描述</th>
    <th>排序</th>
    <th>编辑</th>
   </tr>
 </thead>
   <tbody class="news">
    <?php foreach ($res as $k => $v): ?>
  <tr>
    <td>
     <span>
     <input type="checkbox" class="middle children-checkbox"/>
     <i><?= $v['brand_id'] ?></i>
     </span>
    </td>
    <td class="td-name">
      <span class="ellipsis td-name block"><?= $v['brand_name'] ?></span>
    </td>
    <td class="center pic-area"><img src="<?= $v['brand_logo'] ?>" class="thumbnail"/></td>
    <td class="center">
     <span>
      <?= $v['description'] ?>
     </span>
    </td>
    <td class="center">
     <span>
      <?= $v['sort'] ?>
     </span>
    </td>
    <td class="center">
     <a href="<?=Url::toRoute(['brand/update', 'brand_id' => $v['brand_id']]);?>">编辑</a>|
     <a href="<?=Url::toRoute(['brand/delete', 'brand_id' => $v['brand_id']]); ?>">删除</a>
    </td>
   </tr>
    <?php endforeach ?>
  </tbody>
  </table>
	  <!-- turn page -->
	  <!-- <div class="turnPage center fr">
	   <a>第一页</a>
	   <a>1</a>
	   <a>最后一页</a>
	  </div> -->
  </div>
 </div>
</body>
</html>
<script type="text/javascript" src="jquery-1.8.3.js" ></script>
<script type="text/javascript">
  $("#find").click(function(){
    var search = $("#search").val();
    var str = "";
    $.ajax({
      url: "<?= Url::to(['brand/search']);?>",
      type: "post",
      data:{
        search: search
      },
      dataType: "json",
      success:function(data){
        $.each(data,function(k,v){
            str+='<tr><td><span><input type="checkbox" class="middle children-checkbox"/><i>'+v.brand_id+'</i></span</td><td class="td-name"<span class="ellipsis td-name block">'+v.brand_name+'</span></td><td class="center pic-area"><img src="'+v.brand_logo+'" class="thumbnail"/></td><td class="center"><span>'+v.description+'</span></td<td class="center"<span>'+v.sort+'</span></td><td class="center"><a href="edit_product.html" title="编辑"><img src="images/icon_edit.gif"/></a><a title="删除"><img src="images/icon_drop.gif"/></a></td></tr>';
        });
        $(".news").html(str);
      }
    });
    
  })
</script>