<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
						<h2>活动详情
							<span class="more" id="span_signNum">
								已报名：<?php echo ($activity["totalNum"]); ?>人
								<?php if($_SESSION['role'] == '3'): ?>
									<a href="<?php echo U('Activity/edit',array('id'=>$activity['id']));?>">编辑活动</a>
								<?php endif; ?>
							</span>	
						</h2>
					</div>
					<form id='form_act' action="/activity/save" method="post">
						<div class="row">
							<label class="field">活动分类
							</label>
							<label class="field_content">
								<?php echo ($activity["typeName"]); ?>
							</label>
						</div>
						<div class="row">
							<label class="field">活动标题
							</label>
							<label class="field_content">
								<?php echo ($activity["title"]); ?>
							</label>
						</div>
						      
						<div class="row">
							<label class="field">活动地点
							</label>
							<label class="field_content">
								<?php echo ($activity["address"]); ?>
							</label>
						</div>
						<div class="row">
							<label class="field">开始时间
							</label>
							<label class="field_content">
								<?php echo ($activity["startTime"]); ?>
							</label>
						</div>
						<div class="row">
							<label class="field">结束时间
							</label>
							<label class="field_content">
								<?php echo ($activity["endTime"]); ?>
							</label>
						</div>
						<div class="row">
							<label class="field">限制人数
							</label>
							<label class="field_content">
								<?php echo ($activity["maxNum"]); ?>
							</label>
						</div>
						<div class="row">
							<label class="field">活动详情
							</label>
							<label class="field_content">
								<?php echo ($activity["detail"]); ?>
							</label>
						</div>
						<hr class="hrline"/>
						<div class="row">
							<label class="field">报名人员
							</label>
							<label class="field_content" id="signUsers">
								<?php echo ($activity["signUsers"]); ?></br>
								共&nbsp;<?php echo ($activity["totalNum"]); ?>&nbsp;人
							</label>
						</div>
						<div class="row footer">
							<div class="item">
								<input class="loc-btn" type="button" id="btn_sign" value="报名"/>
								<input class="loc-btn" type="button" id="btn_signMore" value="带人报名"/>
								<input class="lnk-flat" type="button" id="btn_undo" value="取消报名"/>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div id="right">
				<div class="active_info">
					<div class="hd">
						<h2>报名说明
						</h2>
					</div>
					<ul>
						<li class="info_l active">
							<div class="title_l">1、登陆用户才能报名</div>
							<div class="title_l">2、如果只给自己报名，点击报名按钮即可</div>
							<div class="title_l">3、点击取消报名会取消自己所有的报名，包括代报名的人</div>
							<div class="title_l">4、点击带人报名，可以给自己和他人一起报名，请在弹出框中输入报名的称呼和人数</div>
							<div class="title_l">5、如果需要修改报名信息，可以再点击带人报名，在弹出框中输入新的报名称呼和人数，新的报名信息会覆盖旧信息</div>
						</li>	
					</ul>
				</div>	
			</div>
			<div id="dlg_wrapper" style="display:none">
				<div id="dlg" class="easyui-dialog" title="带人报名" 
					 data-options="iconCls:'icon-save',closed: true" style="width:300px;height:200px;padding:10px;">
					<form action="" method="post">
						<label for="user" class="field">报名称呼:</label>
						<input type="text" id='signName' value="" /><br />
						<label for="signNum">报名人数:</label>
						连我在内有<input type="text" id="signNum" value="2" style="width: 56px"/>人参加<br />
						<hr class="hrline"/>
						<div class="row footer">
							<div class="item">
								<input class="loc-btn" type="button" id="dlg_btn_signMore" value="带人报名"/>
								<input class="lnk-flat" type="button" id="dlg_btn_undo" value="返回"/>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="__PUBLIC__/Js/jquery-1.8.0.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="__PUBLIC__/Js/easyui132/jquery.easyui.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/easyui132/locale/easyui-lang-zh_CN.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/easyui132/extends/extends.datebox.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/util.js"></script>

	<script type="text/javascript">
		var signUrl='<?php echo U('sign');?>';
		var signMoreUrl='<?php echo U('signMore');?>';
		var undoUrl='<?php echo U('undo');?>';
		var uid='<?php echo (session('uid')); ?>';
		var uname='<?php echo (session('uname')); ?>';
		var actId='<?php echo ($activity["id"]); ?>';
		var totalSignNum=<?php echo ($activity["totalNum"]); ?>;
		var signUsers='<?php echo ($activity["signUsers"]); ?>';
		var maxNum='<?php echo ($activity["maxNum"]); ?>';
	</script>
	<script type="text/javascript" src='__PUBLIC__/Js/act_view.js'></script>
</body>
</html>