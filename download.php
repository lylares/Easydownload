<!-- O(∩_∩)O~
Wordpress插件:Easydownload
作者:lylares
插件使用:https://www.lylares.com/wordpress-plugins-easydownload.html
-->
<?php
require( dirname(__FILE__) . '/wp-load.php' );
$id=htmlspecialchars($_GET['id']);
$author=htmlspecialchars($_GET['author']);
$btitle=htmlspecialchars($_GET['btitle']);
$title = get_post($id)->post_title;
$Easydownload_name=get_post_meta($id, 'Easydownload_name', true);//资源名称
$Easydownload_size=get_post_meta($id, 'Easydownload_size', true);//资源大小
$Easydownload_date=get_post_meta($id, 'Easydownload_date', true);//更新时间
$Easydownload_type=get_post_meta($id, 'Easydownload_type', true);//资源类型
$Easydownload_version=get_post_meta($id, 'Easydownload_version', true);//当前版本
$Easydownload_info=get_post_meta($id, 'Easydownload_info', true);//说明与描述
$Easydownload_author=get_post_meta($id, 'Easydownload_author', true);//作者
$Easydownload_Preview=get_post_meta($id, 'Easydownload_Preview', true);//演示地址
$Easydownload_common=get_post_meta($id, 'Easydownload_common', true);//普通下载
$Easydownload_formal=get_post_meta($id, 'Easydownload_formal', true);//官方网盘地址
$Easydownload_other=get_post_meta($id, 'Easydownload_other', true);//其他网盘
$Easydownload_baidu=get_post_meta($id, 'Easydownload_baidu', true);//百度网盘
$Easydownload_baidupassword=get_post_meta($id, 'Easydownload_baidupassword', true);//百度网盘密码
$Easydownload_360password=get_post_meta($id, 'Easydownload_360password', true);//360盘
$Easydownload_Decompression=get_post_meta($id, 'Easydownload_Decompression', true);//解压密码
$Easydownload_other_password=get_post_meta($id, 'Easydownload_other_password', true);//其他密码
echo $Easydownload_other_password;
 ?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"
		name="viewport" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<!-- Favicons -->
		<link rel="apple-touch-icon" href="//api.lylares.com/server/static/easydownload/assets/img/">
		<link rel="icon" href="//api.lylares.com/server/static/easydownload/assets/img/">
		<title>
			<?php echo $title;?>-下载
		</title>
		<link rel="canonical" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>"/>
		<!-- Social tags -->
		<meta name="keywords" content="<?php echo $title;?>">
		<meta name="description" content="<?php echo $Easydownload_name;?>">
		<meta itemprop="name" content="Wordpress附件下载插件 By liulin.in">
		<meta itemprop="description" content="<?php echo $Easydownload_name;?>  By liulin.in">
		<meta itemprop="image" content="//api.lylares.com/server/static/easydownload/assets/img/">
		<!-- Fonts and icons //api.lylares.com/server/static/easydownload/-->
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"
		/>
		<link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css"
		/>
		<link rel="stylesheet" href="//api.lylares.com/server/static/easydownload/assets/css/material-kit.min.css">
		<!-- Documentation extras -->
		<style>
			.list-group-item :first-child { margin-right: 0.2rem; }
			.item-title{font-size:1rem;}
			.info{margin-left:11px}
			.am-center{top: 0px;bottom: 0px;left: 0px;right: 0px;margin-left: auto;margin-right: auto;}
			a {color: #fafafa;text-decoration: none;}
			a:hover{color: #fafafa;}
			.info p {color: rgba(0,0,0,.87);}
			.card-description, .description, .footer-big p {color: rgba(0,0,0,.87);}
			 ul > li > a{color:#000} ul > li > a:hover{color:#9c27b0}
			 ul li{list-style-type:none;}  
		</style>
	</head>
	<body class="signup-page ">
		<nav class="navbar  navbar-transparent    navbar-absolute  navbar-expand-lg "
		color-on-scroll="100" id="sectionsNav">
			<div class="container">
				<div class="navbar-translate">
					<a class="navbar-brand" href="./">
						<?php echo $btitle;?>
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false"
					aria-label="Toggle navigation">
						<span class="navbar-toggler-icon">
						</span>
						<span class="navbar-toggler-icon">
						</span>
						<span class="navbar-toggler-icon">
						</span>
					</button>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav ml-auto">
						<li class="dropdown nav-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<i class="material-icons">
									apps
								</i>
								更多
							</a>
							<div class="dropdown-menu dropdown-with-icons">
								<a href="#" class="dropdown-item" target="_blank">
									<i class="material-icons">
										layers
									</i>
									友链1
								</a>
								<a href="#" class="dropdown-item" target="_blank">
									<i class="material-icons">
										tv
									</i>
									友链2
								</a>
							</div>
						</li>
						<!-- <li class="button-container nav-item iframe-extern">
							<a href="<?php echo $Easydownload_formal;?>"
							target="_blank" class="btn  btn-primary   btn-round btn-block">
								<i class="material-icons">
									cloud_download
								</i>
								官网下载
							</a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		
		<div class="modal fade" id="noticeModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-notice" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" style="margin-left:auto;">打赏作者</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:auto;">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body ">
				<div class="tab-content tab-space ">
					<div class="tab-pane text-center" id="pill1">
						<div class="card" style="width:100%">
							<img class="card-img-top" src="#这里填支付宝二维码图片地址" alt="Card image cap" width="90%">
							<div class="card-body">
								<p class="card-text">
									使用支付宝扫一扫
								</p>
							</div>
						</div>
					</div>
					<div class="tab-pane active text-center" id="pill2">
						<div class="card" style="width: 100%">
							<img class="card-img-top" src="#这里填微信二维码图片地址" alt="Card image cap" width="90%">
							<div class="card-body">
								<p class="card-text">
									使用微信扫一扫
								</p>
							</div>
						</div>
					</div>
					<div class="tab-pane text-center" id="pill3">
						<div class="card" style="width:100%">
							<img class="card-img-top" src="#这里填QQ二维码图片地址" alt="Card image cap" width="90%">
							<div class="card-body">
								<p class="card-text">
									使用QQ扫一扫
								</p>
							</div>
						</div>
					</div>
					<ul class="nav nav-pills nav-pills-rose">
						<li class="nav-item am-center">
						<a class="nav-link "href="#pill1" data-toggle="tab">支付宝</a>
						</li>
						<li class="nav-item am-center">
						<a class="nav-link active" href="#pill2" data-toggle="tab">微信</a>
						</li>
						<li class="nav-item am-center">
						<a class="nav-link" href="#pill3" data-toggle="tab">QQ</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

		<div class="page-header header-filter" filter-color="purple" style="background-image: url(https://api.lylares.com/server/static/easydownload/assets/img/bg7.jpg); background-size: cover; background-position: top center;">
			<div class="container">
				<div class="row">
					<div class="card card-nav-tabs">
						<div class="card-header card-header-primary" style="text-align:center">
							<h3>
								<a href="<?php echo dirname('https://'.$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"]); ?>/?p=<?php echo $id;?>" target="_blank"><?php echo $title;?></a>
							</h3>
						</div>
						<div class="card-body">
							<div class="card card-signup">
								<h4 class="card-title text-center">
									<?php echo $Easydownload_name;?>
								</h4>
								<!-- <div class="text-right " style="margin-right:2rem">	
									<button class="btn btn-primary btn-round text-center">
										<i class="material-icons">
											fullscreen
										</i>
										预览
									</button>
								</div> -->
								<div class="card-body">
									<div class="row">
										<div class="col-md-5 ml-auto">
											
												<ul class="list-group list-group-flush" >
													<li class="list-group-item">
														<i class="material-icons">
															attach_file
														</i>
														<span class="item-title">文件大小：<span><?php echo $Easydownload_size;?>
													</li>
													<li class="list-group-item">
														<i class="material-icons">
															done
														</i>
														<span class="item-title">当前版本：</span>v<?php echo $Easydownload_version;?>
													</li>
													
													<li class="list-group-item">
													<i class="material-icons">
															cloud_done
													</i>
													<span class="item-title">网盘信息：</span>
												</li>
												<li>
													<ul>
													<?php if($Easydownload_formal){?>
													<li><a href="<?php echo $Easydownload_formal;?>" target="_blank">官方网盘</a></li>
													<?php }if($Easydownload_baidu){?>
													<li><a href="<?php echo $Easydownload_baidu;?>" target="_blank">百度网盘</a></li>
													<?php }if($Easydownload_other){?>
													<li><a href="<?php echo $Easydownload_other;?>" target="_blank">其他网盘</a></li>
													
													<?php }?>
													</ul>
												</li>	
												<li class="list-group-item">
													<i class="material-icons">
															info
													</i>
													<span class="item-title">附件描述：</span><span style="margin-left:5px;line-height:200%"><?php echo $Easydownload_info;?></span>
												</li>
												</ul>
												<div class="info info-horizontal info">
													<div class="icon icon-rose">
														<i class="material-icons">
															notification_important
														</i>
													</div>
													<div class="description">
														<h4 class="info-title">
															使用说明
														</h4>
														<p class="description">
														<ol><li>这里自定义使用说明这里自定义使用说明这里自定义使用说明这里自定义使用说明</li></ol>
														</p>
													</div>
												</div>
											
										</div>
										
										<div class="col-md-5 mr-auto">
											<ul class="list-group list-group-flush">
												<li class="list-group-item">
													<i class="material-icons">
														subject
													</i>
													<span class="item-title">文件类型：</span><?php echo $Easydownload_type;?>
												</li>
												<li class="list-group-item">
													<i class="material-icons">
															access_time
													</i>
													<span class="item-title">更新日期：</span><?php echo $Easydownload_date;?>
												</li>
												
												<li class="list-group-item">
														<i class="material-icons">
															lock
														</i>
														<span class="item-title">密码信息：</span>
												</li>
												<li>
													<ul>
														<?php if($Easydownload_baidupassword){
															?><li>百度网盘密码：<?php echo $Easydownload_baidupassword;?></li><?php
															} if($Easydownload_Decompression){
																?><li>解压密码：<?php echo $Easydownload_Decompression;?></li><?php 
																}if($Easydownload_other_password){
																?><li>其他密码：<?php echo $Easydownload_Decompression;?></li><?php 
																}?>
													</ul>
												</li>
												<li class="list-group-item">
													<i class="material-icons">
															person
													</i>
													<span class="item-title">作者：</span><?php if($Easydownload_author){echo $Easydownload_author;}else{echo $author;}?>
												</li>
											</ul>
											<div class="info info-horizontal" style="width:100%;">
											    <div class="icon icon-rose">
												    <i class="material-icons">
															copyright
												    </i>
											    </div>
											    <div class="description">
												    <h4 class="info-title">
															版权声明
												    </h4>
												    <p class="description">这里自定义版权声明版权声明版权声明版权声明版权声明版权声明版权声明</p>
											    </div>
											</div>
										</div>
									</div>
								</div>
								<div class="text-center">
									<button class="btn btn-rose btn-round text-center"data-toggle="modal" data-target="#noticeModal" >
										<i class="material-icons">
											insert_emoticon
										</i>
										打赏
									</button>
									<span class="text-right">
									<button class="btn btn-primary btn-round text-center" onclick="window.open('<?php echo $Easydownload_formal;?>')">
										<i class="material-icons">
											cloud_download
										</i>
										官网下载
									</button>
									</span>
								</div>
							</div>
							<footer class="blockquote-footer">
								自定义页脚...
							</footer>
						</div>
					</div>
					<div class="col-md-10 ml-auto mr-auto">
					</div>
				</div>
			</div>
			<footer class="footer ">
				<div class="container">
					<nav class="pull-left">
						<ul>
							<li>
								<a href="#" target="_blank">
									自定义链接1
								</a>
							</li>
							<li>
								<a href="#" target="_blank">
									自定义链接2
								</a>
							</li>
							<li>
								<a href="https://liulin.in/wordpress-plugins-easydownload.html" target="_blank">
									Wordpress插件{Easydownload}
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright pull-right">
						&copy;
						<script>
							document.write(new Date().getFullYear())
						</script>
						, made
						by
						<a href="https://www.lylares.com" target="_blank">
							www.lylares.com
						</a>
					</div>
				</div>
			</footer>
		</div>
    </div>
		<!-- Core JS Files -->
		<script src="https://lib.baomitu.com/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://static.lylares.com/mtl/js/core/popper.min.js"></script>
                <script src="https://static.lylares.com/mtl/js/bootstrap-material-design.min.js"></script>
		<script src="https://static.lylares.com/hestia/assets/assets-for-demo/js/modernizr.js"></script>
		<script src="https://cdn.lylares.com/static/material-design/js/materialBerry-main.js"></script>
	</body>
</html>
