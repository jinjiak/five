<?php 
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>地址管理</title>

		<link href="../AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="../AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="../css/personal.css" rel="stylesheet" type="text/css">
		<link href="../css/addstyle.css" rel="stylesheet" type="text/css">
		<script src="../AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="../AmazeUI-2.4.2/assets/js/amazeui.js"></script>

	</head>

	<body>
		<!--头 -->
		<header>
			<article>
				<div class="mt-logo">
					<!--顶部导航条 -->
					<div class="am-container header">
						<ul class="message-l">
							<div class="topMessage">
								<div class="menu-hd">
									<a href="<?= Url::to(['login/login']);?>" target="_top" class="h">亲，请登录</a>
									<a href="<?= Url::to(['register/register']);?>" target="_top">免费注册</a>
								</div>
							</div>
						</ul>
						<ul class="message-r">
							<div class="topMessage home">
								<div class="menu-hd"><a href="<?= Url::to(['home/home']);?>" target="_top" class="h">商城首页</a></div>
							</div>
							<div class="topMessage my-shangcheng">
								<div class="menu-hd MyShangcheng"><a href="<?= Url::to(['index/information']);?>" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
							</div>
							<div class="topMessage mini-cart">
								<div class="menu-hd"><a id="mc-menu-hd" href="<?= Url::to(['shopcart/shopcart']);?>" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
							</div>
							<div class="topMessage favorite">
								<div class="menu-hd"><a href="<?= Url::to(['index/collection']);?>" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
						</ul>
						</div>

						<!--悬浮搜索框-->

						<div class="nav white">
							<div class="logoBig">
								<li><img src="../images/logobig.png" /></li>
							</div>

							<div class="search-bar pr">
								<a name="index_none_header_sysc" href="#"></a>
								<form>
									<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
									<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
								</form>
							</div>
						</div>

						<div class="clear"></div>
					</div>

			</article>
		</header>
           <div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="<?= Url::to(['home/home']);?>">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li>
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>
			</div>
		<b class="line"></b>

		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-address">
					
						<div class="clear"></div>
						<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">修改地址</a>
						<!--例子-->
						<div class="am-modal am-modal-no-btn" id="doc-modal-1">

							<div class="add-dress">

								<!--标题 -->
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Save&nbsp;address</small></div>
								</div>
								<hr/>

								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
									<form class="am-form am-form-horizontal">

										<div class="am-form-group">
											<label for="user-name" class="am-form-label">收货人</label>
											<div class="am-form-content">
												<input type="text" class="accept_name" value="<?php echo $posts['accept_name'] ?>" id="user-name" placeholder="收货人">
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-phone" class="am-form-label">手机号码</label>
											<div class="am-form-content">
												<input id="user-phone" class="tel" name="tel" value="<?php echo $posts['tel'] ?>" placeholder="手机号必填" type="text">
											</div>
										</div>
										<div class="am-form-group">
											<label for="user-address" class="am-form-label">所在地</label>
											<div class="am-form-content address">
												 <select id="provinces">  
									                <option value="">请选择省份</option>  
									            </select>		

									            <select id="citys">  
									                <option value="">请选择市</option>  
									            </select>

									            <select id="countys">  
									                <option value="">请选择县</option>  
									            </select> 
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-intro" class="am-form-label">详细地址</label>
											<div class="am-form-content">
												<textarea class="" rows="3" id="user-intro" placeholder="输入详细地址"><?php echo $posts['address_name'] ?></textarea>
												<small>100字以内写出你的详细地址...</small>
											</div>
										</div>

										<div class="am-form-group">
											<div class="am-u-sm-9 am-u-sm-push-3">
												<input type="hidden" name="" id="address_id" value="<?php echo $posts['address_id'] ?>">
												<a class="am-btn am-btn-danger" id="save">保存</a>
												<a href="javascript: void(0)" class="am-close am-btn am-btn-danger" data-am-modal-close>取消</a>
											</div>
										</div>
									</form>
								</div>

							</div>

						</div>

					</div>
					<script>
						//地址修改
						$(function(){
							$("#save").click(function(){
				            	//alert(123);
				            	var province= $("#li1").val();//省
				            	var city= $("#li2").val();	//市		            
				            	var area= $("#li3").val(); //县
				            	var accept_name=$(".accept_name").val();//收货人
				            	var tel=$(".tel").val();//电话号
				            	var address_name=$("#user-intro").val();//地址详细信息
				            	var address_id=$("#address_id").val();//地址表id
				            	//alert(address_name);				            	
				            	$.ajax({  
			                        type:"post",  
			                        url:"<?=Url::to(['index/address_save'])?>", 
			                        data: {			                        	
			                        	'accept_name':accept_name,
			                        	'tel':tel,
			                        	'address_name':address_name,
			                        	'province':province,
			                        	'city':city,
			                        	'area':area,
			                        	'address_id':address_id,
			                        },  
			                        dataType:"json",  
			                        success:function(data) {  
			                        	if(data==1){
			                        		window.location.href = "http://www.fourshopa.com/index/address";
			                        	}else{
			                        		alert('修改失败');
			                        		window.location.reload();
			                        	}	                           
			                           
			                        }  
			                    });

				            }); 
						})
						
					</script>
					<script type="text/javascript">
            			//四级联动
    						$(document).ready(function() {  
				                //  加载所有的省份  
				                $.ajax({  
				                    type: "get",  
				                    url: "<?=Url::to(['index/region_do'])?>", // type=1表示查询省份  
				                    data: {"parent_id": "1", "type": "1"},  
				                    dataType: "json",  
				                    success: function(data) { 
				                    //alert(data); 
				                        $("#provinces").html("<option value=''>请选择省份</option>");  
				                        $.each(data, function(i, item) {  
				                            $("#provinces").append("<option id='li1' value='" + item.region_id + "'>" + item.region_name + "</option>");  
				                        });  
				                    }  
				                });  
				  
				                $("#provinces").change(function() {  
				                    $.ajax({  
				                        type: "get",  
				                        url: "<?=Url::to(['index/region_do'])?>", // type =2表示查询市  
				                        data: {"parent_id": $(this).val(), "type": "2"},  
				                        dataType: "json",  
				                        success: function(data) {  
				                            $("#citys").html("<option value=''>请选择市</option>");  
				                            $.each(data, function(i, item) {  
				                                $("#citys").append("<option id='li2' value='" + item.region_id + "'>" + item.region_name + "</option>");  
				                            });  
				                        }  
				                    });  
				                });
								$("#citys").change(function() {  
				                    $.ajax({  
				                        type: "get",  
				                        url: "<?=Url::to(['index/region_do'])?>", // type =2表示查询市  
				                        data: {"parent_id": $(this).val(), "type": "3"},  
				                        dataType: "json",  
				                        success: function(data) {  
				                            $("#countys").html("<option  value=''>请选择县</option>");  
				                            $.each(data, function(i, item) {  
				                                $("#countys").append("<option id='li3' value='" + item.region_id + "'>" + item.region_name + "</option>");  
				                            });  
				                        }  
				                    });  
				                });  
				            });
				            //期望工作
				            
				            
				        </script>  
					<script type="text/javascript">
						$(document).ready(function() {							
							$(".new-option-r").click(function() {
								$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
							});
							
							var $ww = $(window).width();
							if($ww>640) {
								$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
							}
							
						})
					</script>

					<div class="clear"></div>

				</div>
				<!--底部-->
				<div class="footer">
					<div class="footer-hd">
						<p>
							<a href="#">恒望科技</a>
							<b>|</b>
							<a href="#">商城首页</a>
							<b>|</b>
							<a href="#">支付宝</a>
							<b>|</b>
							<a href="#">物流</a>
						</p>
					</div>
					<div class="footer-bd">
						<p>
							<a href="#">关于恒望</a>
							<a href="#">合作伙伴</a>
							<a href="#">联系我们</a>
							<a href="#">网站地图</a>
							<em>© 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em>
						</p>
					</div>
				</div>
			</div>

				<aside class="menu">
				<ul>
					<li class="person active">
						<a href="<?= Url::to(['index/index']);?>">个人中心</a>
					</li>
					<li class="person">
						<a href="<?= Url::to(['index/index']);?>">个人资料</a>
						<ul>
							<li> <a href="<?= Url::to(['index/information']);?>">个人信息</a></li>
							<li> <a href="<?= Url::to(['index/question']);?>">安全设置</a></li>
							<li> <a href="<?= Url::to(['index/address']);?>">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的交易</a>
						<ul>
							<li><a href="<?= Url::to(['index/order']);?>">订单管理</a></li>
							
						</ul>
					</li>
					<!-- <li class="person">
						<a href="#">我的资产</a>
						<ul>
							<li> <a href="coupon.html">优惠券 </a></li>
							<li> <a href="bonus.html">红包</a></li>
							<li> <a href="bill.html">账单明细</a></li>
						</ul>
					</li> -->

					<li class="person">
						<a href="#">我的小窝</a>
						<ul>
							<li> <a href="<?= Url::to(['index/collection']);?>">收藏</a></li>
						<!-- 	<li> <a href="foot.html">足迹</a></li>
							<li> <a href="comment.html">评价</a></li>
							<li> <a href="news.html">消息</a></li> -->
						</ul>
					</li>

				</ul>

			</aside>
		</div>

	</body>

</html>