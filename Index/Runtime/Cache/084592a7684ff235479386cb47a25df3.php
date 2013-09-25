<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <link href='__PUBLIC__/Css/index.css' rel='stylesheet' type='text/css'>
	<link href='__PUBLIC__/Css/form.css' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Js/easyui132/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Js/easyui132/themes/icon.css">

<title>test include</title>
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
						<h2>用户注册
						</h2>
					</div>
					<form id='form_act' action="<?php echo U('runRegis');?>" method="post">
						<div class="row">
							<label class="field">登录名
							</label>
							<div class="item">
								<input id="uname" class="basic-input" data-options="required:true" name="uname" maxlength="70" size="46"/><span style="color:red">*</span>
							</div>
						</div>
						      
						<div class="row">
							<label class="field">密码
							</label>
							<div class="item">
								<input id="pwd" class="basic-input" data-options="required:true" type="password" name="pwd" maxlength="70" size="46"/><span style="color:red">*</span>
							</div>
						</div>
						<div class="row">
							<label class="field">邮箱
							</label>
							<div class="item">
								<input id="email" class="basic-input" name="email" maxlength="70" size="46"/>
							</div>
						</div>
						<div class="row">
							<label class="field">昵称
							</label>
							<div class="item">
								<input id="nickname" class="basic-input" name="nickname" maxlength="70" size="46"/>
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
						<h2>注册说明
						</h2>
					</div>
					<ul>
						<li class="info_l active">
							<div class="title_l">1、登录名和密码是必填项</div>
							<div class="title_l">2、输入昵称，则登陆和报名后显示昵称，否则显示登录名</div>
							<div class="title_l">3、登录名、邮箱、昵称都必须唯一，不能重复</div>
							<div class="title_l">4、输入完成后，点击回车即可正确提交</div>
							<div class="title_l">5、注册成功后会自动登录并转向首页</div>
						</li>	
					</ul>
				</div>	
			</div>
		</div>
	</div>
	<div id="footer"></div>
	<script type='text/javascript'>
		var checkUname = "<?php echo U('checkUnique','cName=uname');?>";
		var checkEmail = "<?php echo U('checkUnique','cName=email');?>";
		var checkNickname = "<?php echo U('checkUnique','cName=nickname');?>";
	</script>
	<script src="__PUBLIC__/Js/jquery-1.8.0.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="__PUBLIC__/Js/easyui132/jquery.easyui.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/easyui132/locale/easyui-lang-zh_CN.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/easyui132/extends/extends.datebox.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/util.js"></script>

	<script type="text/javascript" src="__PUBLIC__/Js/jquery-validate.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Js/register.js"></script>
</body>
</html>