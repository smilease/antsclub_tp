<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <link href='__PUBLIC__/Css/index.css' rel='stylesheet' type='text/css'>
	<link href='__PUBLIC__/Css/form.css' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Js/easyui132/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Js/easyui132/themes/icon.css">

</head>
<body>
	<div id='header'>
	<div id='bar'>
		<div class='inner'>
			<a href='/' id='logo'>
				<img alt='有共同爱好的人在一起' src='__PUBLIC__/Images/logo_top.jpg'>
			</a>
			<div id='nav' class='left'>
				<a href='/wait.jsp'>羽毛球</a>
				<a href='/wait.jsp'>桌球</a>
				<a href='/wait.jsp'>英语</a>
			</div>
			<div id='login' class='right'>
				<?php if ($_SESSION['uname']) : ?>
					<a href='#'>欢迎 <?php echo $_SESSION['uname']; ?></a>
					<a href='<?php echo U('Login/logout');?>'>注销</a>
				<?php else : ?>
					<a href='<?php echo U('Login/login');?>'>登录</a>
					<a href='<?php echo U('Login/register');?>'>注册</a>
				<?php endif; ?>				
			</div>
		</div>
	</div>
	<div id='menu' class='inner'>
		<ul>
			<li>
				<a href='/'>首页</a>
			</li>
			<li>
				<a href='<?php echo U('Index/wait');?>'>视频</a>
			</li>
			<li>
				<a href='<?php echo U('Index/wait');?>'>相册</a>
			</li>
			<li>
				<a href='<?php echo U('Index/wait');?>'>关于AntsClub</a>
			</li>
			<?php if($_SESSION['role'] == '3'): ?>
				<li>
					<a href='<?php echo U('Activity/add');?>'>发起活动</a>
				</li>
			<?php endif; ?>
		</ul>
	</div>
</div>



	<div id="wrapper">
		<div id="content">
			<div id="left">
				<div class="info">
					<div class="hd">
						<h2>用户登陆
						</h2>
					</div>
					<form id='form_login' action="<?php echo U('runLogin');?>" method="post">
						<div class="row">
							<label class="field">登陆名
							</label>
							<div class="item">
								<input id="address" class="basic-input" name="uname" maxlength="70" size="46"/>
							</div>
						</div>
						<div class="row">
							<label class="field">密码
							</label>
							<div class="item">
								<input id="pwd" class="basic-input" type="password"  name="pwd" maxlength="70" size="46"/>
							</div>
						</div>
						<div class="row">
							<div class="item">
								<input type="checkbox" name='auto' class='auto' id='auto' checked='1'/>
								<label for="auto">记住我，下次自动登录</label>
							</div>
						</div>
						<hr class="hrline"/>
						<div class="row footer">
							<div class="item">
								<input class="loc-btn" type="button" id="submit_form" value="提交"/>
								<input class="lnk-flat" type="button" id="cancel_form" value="取消"/>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div id="right">
				<div class="active_info">
					<div class="hd">
						<h2>登录说明
						</h2>
					</div>
					<ul>
						<li class="info_l active">
							<div class="title_l">1、登录名和密码是必填项</div>
							<div class="title_l">2、如果您注册时有输入昵称，则登陆和报名后显示昵称，否则显示登录名</div>
							<div class="title_l">3、输入完成后，点击回车即可正确提交</div>
							<div class="title_l">4、登录成功后会转向首页</div>
						</li>	
					</ul>
				</div>	
			</div>
		</div>
	</div>
	<div id="footer">
	</div>
	<script src="__PUBLIC__/Js/jquery-1.8.0.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="__PUBLIC__/Js/easyui132/jquery.easyui.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/easyui132/locale/easyui-lang-zh_CN.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/easyui132/extends/extends.datebox.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/util.js"></script>

	<script type="text/javascript" src="__PUBLIC__/Js/jquery-validate.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/login.js"></script>
</body>
</html>