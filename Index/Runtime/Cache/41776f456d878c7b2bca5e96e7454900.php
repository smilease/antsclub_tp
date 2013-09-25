<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <link href='__PUBLIC__/Css/index.css' rel='stylesheet' type='text/css'>
	<link href='__PUBLIC__/Css/form.css' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Js/easyui132/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Js/easyui132/themes/icon.css">

<title>Antsclub</title>
</head>
<body>
<div id='header'>
	<div id='bar'>
		<div class='inner'>
			<a href='/' id='logo'>
				<img alt='有共同爱好的人在一起' src='__PUBLIC__/Images/logo_top.jpg'>
			</a>
			<div id='nav' class='left'>
				<a href='<?php echo U('Index/wait');?>'>羽毛球</a>
				<a href='<?php echo U('Index/wait');?>'>桌球</a>
				<a href='<?php echo U('Index/wait');?>'>英语</a>
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
						<h2><?php echo ($pageTitle); ?>
						</h2>
					</div>
					<form id='form_act' action="<?php echo U('saveOrUpdate');?>" method="post">
						<input type="hidden" id="id" name="id" value="<?php echo ($activity["id"]); ?>"/> 
						<div class="row">
							<label class="field">活动分类
							</label>
							<div class="item">
								<select id="type" class="basic-input" name="typeCode">
									<option value="badminton">羽毛球</option>
									<option value="billiards">桌球</option>
									<option value="swimming">游泳</option>
									<option value="other">其他</option>
								</select>
								<select id="subtype" class="basic-input hide" name="subtype" style="display:none">
								</select>
							</div>
						</div>
						<div class="row">
							<label class="field">活动标题
							</label>
							<div class="item">
								<input id="title" class="basic-input" name="title" maxlength="70" size="46" value='<?php echo ($activity["title"]); ?>'/>
							</div>
						</div>
						      
						<div class="row">
							<label class="field">活动地点
							</label>
							<div class="item">
								<input id="address" class="basic-input" name="address" maxlength="70" size="46" value='<?php echo ($activity["address"]); ?>'/>
							</div>
						</div>
						<div class="row">
							<label class="field">开始时间
							</label>
							<div class="item">
								<input id="startTime" name="startTime" value='<?php echo ($activity["startTime"]); ?>'></input>
							</div>
						</div>
						<div class="row">
							<label class="field">结束时间
							</label>
							<div class="item">
								<input id="endTime" name="endTime" value='<?php echo ($activity["endTime"]); ?>'></input>
							</div>
						</div>
						<div class="row">
							<label class="field">限制人数
							</label>
							<div class="item">
								<input id="maxNum" class="basic-input" name="maxNum" maxlength="20" size="19" value='<?php echo ($activity["maxNum"]); ?>'/>
							</div>
						</div>
						<div class="row">
							<label class="field">活动详情
							</label>
							<div class="item">
								<textarea clas="basic-input" rows="10" cols="42" 
								max_length="4000" name="detail"><?php echo ($activity["detail"]); ?></textarea>
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
						<h2>活动创建说明
						</h2>
					</div>
					<ul>
						<li class="info_l active">
							<div class="title_l">1、活动标题、地点、开始时间、结束时间为必填项</div>
						</li>	
					</ul>
				</div>	
			</div>
		</div>
	</div>
	<script src="__PUBLIC__/Js/jquery-1.8.0.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="__PUBLIC__/Js/easyui132/jquery.easyui.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/easyui132/locale/easyui-lang-zh_CN.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/easyui132/extends/extends.datebox.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/util.js"></script>

	<script type="text/javascript" src='__PUBLIC__/Js/act_add.js'></script>
</body>
</html>