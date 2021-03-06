<?php 
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>我的收藏</title>

		<link href="../AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="../AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="../css/personal.css" rel="stylesheet" type="text/css">
		<link href="../css/colstyle.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="../js/jquery.js"></script>
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

					<div class="user-collection">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的收藏</strong> / <small>My&nbsp;Collection</small></div>
						</div>
						<hr/>

						<div class="you-like">
							<div class="s-bar">
								我的收藏
								<!-- <a class="am-badge am-badge-danger am-round">降价</a>
								<a class="am-badge am-badge-danger am-round">下架</a> -->
							</div>
							<div class="s-content">
								<?php foreach ($posts as $key => $value): ?>
									
									<div class="s-item-wrap">
										<div class="s-item">

											<div class="s-pic">
												<a href="#" class="s-pic-link">
													<img src="../images/-0-saturn_solar.jpg_220x220.jpg" alt="<?php echo $value['goods_name']?>" title="<?php echo $value['goods_name']?>" class="s-pic-img s-guess-item-img">
													<?php if ($value['is_status']!=0): ?>
														<span class="tip-title">已下架</span>
													<?php endif ?>
												</a>
											</div>
											<div class="s-info">
												<div class="s-title"><a href="#" title="<?php echo $value['goods_name']?>"><?php echo $value['goods_name']?></a></div>
												<div class="s-price-box">
													<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value"><?php echo $value['sell_price'] ?></em></span>
													<span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value"><?php echo $value['market_price'] ?></em></span>
												</div>
												<div class="s-extra-box">
													<!-- <span class="s-comment">好评: 99.93%</span>
													<span class="s-sales">月销: 278</span> -->
													<input type="hidden" id="favorite_id" value="<?php echo $value['favorite_id'] ?>">
													<a href="javascript:void(0);" id="quxiao" class="c-nodo J_delFav_btn">取消收藏</a>
												</div>
											</div>
											<div class="s-tp">
												<!-- <span class="ui-btn-loading-before">找相似</span>
												<i class="am-icon-shopping-cart"></i>
												<span class="ui-btn-loading-before buy">加入购物车</span> -->
												<!-- <p>
													<a href="javascript:;" class="c-nodo J_delFav_btn">取消收藏</a>
												</p> -->
											</div>
										</div>
								</div>
							<?php endforeach ?>
							</div>

							<!-- div class="s-more-btn i-load-more-item" data-screen="0"><i class="am-icon-refresh am-icon-fw"></i>更多</div> -->
							

						</div>

					</div>

				</div>
				<script type="text/javascript">
					$(function(){
						$("#quxiao").click(function(){
							var favorite_id=$("#favorite_id").val();
							//alert(favorite_id);
							$.ajax({
				                type:"post",
				                url:"<?=Url::to(['index/collection_del']);?>",
				                data:{
				                  "favorite_id":favorite_id,
				                },
				                dataType:"json",      
				                success:function(data){
				                	if(data==1){
				                		window.location.href = "";
				                	}else{
				                		alert("取消收藏失败");
				                	}
				                }
			                });
			    
						});
					});

				</script>
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