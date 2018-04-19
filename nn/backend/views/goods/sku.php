<?php 
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="http://www.fourshopb.com/<?= Url::to("@web/")?>">
<title>商品列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/adminStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fr"><a href="<?= Url::to(['goods/product_list']);?>" class="pt-link-btn">商品列表</a></span>
  </div>
  <form action="<?= Url::to(['goods/combinationsku'])?>" method="post">
  <table class="list-style">
   <tr>
    <td style="text-align:right;">商品类型：</td>
    <td>
     <select class="textBox" name="category_id" id="se">
      <option>请选择</option>
        <?php foreach ($type_list as $key => $value): ?>
              <option class="aa" name="type_id" value="<?= $value['type_id']?>"><?= $value['type_name']?></option>
        <?php endforeach ?>
     </select>
    </td>
   </tr>
    <tr>
      <td style="text-align:right;">
        规格:
      </td>
      <td style="text-align:left;">
        <select id="Specifications" type="1">
          <option name="attribute_id">请选择</option>
        </select>
      </td>
   </tr>
  <tr>
      <td style="text-align:right;">
        属性值:
      </td>
      <td style="text-align:left;">
        <select id="Attribute">
          <option name="goods_attribute_id">请选择</option> 
        </select>
      </td>
   </tr>
   <tr>
      <td style="text-align:right;">
        参数:
      </td>
      <td style="text-align:left;">
        <select id="parameter" type="0">
         <option name="attribute_id">请选择</option>      
        </select>
      </td>
   </tr>
     <tr>
      <td style="text-align:right;">
        属性值:
      </td>
      <td style="text-align:left;">
        <select id="Attributes">
          <option name="goods_attribute_id">请选择</option> 
        </select>
      </td>
   </tr>
   <tr>
      <td style="text-align:right;">
        库存:
      </td>
      <td style="text-align:left;">
        <input type="text" name="store_nums" id="Stock">
      </td>
   </tr>
   <tr>
    <td style="text-align:right;"></td>
    <td><input type="button" value="添加货品" id="submit" class="tdBtn"/></td>
   </tr>
  </table>
  </form>
 </div>
</body>
</html>
<script type="text/javascript" src="<?= Url::to("@web/js/jquery-1.8.3.js"); ?>"></script>
<script type="text/javascript">
  $("#submit").click(function(){
    var goods_attribute_id = $("#Attribute").find("option:selected").val();  
    var goods_attributes_id = $("#Attributes").find("option:selected").val();
    var Stock = $('#Stock').val();
    $.ajax({
            url: "<?= Url::to(['goods/combinationsku'])?>",  
            type: "post",
            data:{goods_attribute_id:goods_attribute_id,goods_attributes_id:goods_attributes_id,Stock:Stock},
            dataType:'Json',
            success:function(data) {
              if (data == 1) {
                window.location.href="<?= Url::to(['goods/product_list'])?>";
              } else {
                alert('添加货品失败,请重新添加');
                window.location.href="<?= Url::to(['goods/sku'])?>";
              }
            }
    })
  })
  $("#se").change(function(){
      var type_id = $(this).find("option:selected").val();
      var str = "";
      var strs = "";
      $.ajax({
            url: "<?= Url::to(['goods/sku'])?>",  
            type: "post",
            data:{type_id:type_id},
            dataType:'Json',

            success:function(data) {
              $.each(data['Specifications'],function(k,v){
                str+='<option name="attribute_id" value="' + v.attribute_id + '">' + v.attribute_name + '</option>';
              });
              $('#Specifications').append(str);
              $.each(data['parameter'],function(k,v){
                strs+='<option name="attribute_id" value="' + v.attribute_id + '">' + v.attribute_name + '</option>';
              });
              $('#parameter').append(strs);
           }
      })
  })

  $(document).on('change','#Specifications',function(){
    var attribute_id = $(this).find("option:selected").val();
    var res = '';
    $.ajax({
            url: "<?= Url::to(['goods/specifications'])?>",  
            type: "post",
            data:{attribute_id:attribute_id},
            dataType:'json',
            success:function(result) {
              $.each(result,function(k,v){
                //alert(v.attribute_values);
                res+='<option name="goods_attribute_id" value="' + v.goods_attribute_id + '">' + v.attribute_values + '</option>';
              });
              $('#Attribute').append(res);
           }     
    })
  });

  $(document).on('change','#parameter',function(){
    var attribute_id = $(this).find("option:selected").val();
    var ret = '';
    $.ajax({
            url: "<?= Url::to(['goods/parameter'])?>",  
            type: "post",
            data:{attribute_id:attribute_id},
            dataType:'json',
            success:function(results) {
              $.each(results,function(k,v){
                // alert(v.attribute_values);
              ret+='<option name="goods_attribute_id" value="' + v.goods_attribute_id + '">' + v.attribute_values + '</option>';
              });
              $('#Attributes').append(ret);
           }     
    })
  });

</script>