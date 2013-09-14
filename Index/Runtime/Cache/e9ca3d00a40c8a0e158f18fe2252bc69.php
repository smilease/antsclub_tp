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
						<h2>羽毛球
							<span class="more">
								<a href="<?php echo U('Activity/more',array('c'=>'ba'));?>">更多>></a>
							</span>	
						</h2>
					</div>
					<ul>
						<?php if(is_array($badmintonList)): foreach($badmintonList as $key=>$vo): ?><li class="info_r">
								<div class="title_l"><a href="<?php echo U('Activity/view',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a></div>
								<ul class="detail_l">
									<li>开始时间：<?php echo ($vo["startTime"]); ?></li>
									<li>结束时间：<?php echo ($vo["endTime"]); ?></li>
									<li>活动地点：<?php echo ($vo["address"]); ?></li>
									<li>活动详情：<?php echo ($vo["detail"]); ?></li>
								</ul>
							</li><?php endforeach; endif; ?>		
					</ul>
				</div>
				<div class="info">
					<div class="hd">
						<h2>游泳
							<span class="more">
								<a href="<?php echo U('Activity/more',array('c'=>'sw'));?>">更多>></a>
							</span>	
						</h2>
					</div>
					<ul>
						<?php if(is_array($swimmingList)): foreach($swimmingList as $key=>$vo): ?><li class="info_r">
								<div class="title_l"><a href="<?php echo U('Activity/view',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a></div>
								<ul class="detail_l">
									<li>开始时间：<?php echo ($vo["startTime"]); ?></li>
									<li>结束时间：<?php echo ($vo["endTime"]); ?></li>
									<li>活动地点：<?php echo ($vo["address"]); ?></li>
									<li>活动详情：<?php echo ($vo["detail"]); ?></li>
								</ul>
							</li><?php endforeach; endif; ?>
					</ul>
				</div>
				<div class="info">
					<div class="hd">
						<h2>桌球
							<span class="more">
								<a href="<?php echo U('Activity/more',array('c'=>'bi'));?>">更多>></a>
							</span>	
						</h2>
					</div>
					<ul>
						<?php if(is_array($billiardsList)): foreach($billiardsList as $key=>$vo): ?><li class="info_r">
								<div class="title_l"><a href="<?php echo U('Activity/view',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a></div>
								<ul class="detail_l">
									<li>开始时间：<?php echo ($vo["startTime"]); ?></li>
									<li>结束时间：<?php echo ($vo["endTime"]); ?></li>
									<li>活动地点：<?php echo ($vo["address"]); ?></li>
									<li>活动详情：<?php echo ($vo["detail"]); ?></li>
								</ul>
							</li><?php endforeach; endif; ?>		
					</ul>
				</div>
				
				<div class="info">
					<div class="hd">
						<h2>其他
						</h2>
					</div>
					<ul>
					</ul>
				</div>
			</div>
			<div id="right">
				<div class="active_info">
					<div class="hd">
						<h2>网站动态
						</h2>
					</div>
					<ul>
						<li class="info_l active">
							<div class="title_l"><a href="/video/video_list.jsp">《羽毛球专家把脉》视频上线</a></div>
							<ul class="detail_l">
								<li>本片由羽坛天王赵剑华和前国家女队队员、
								国际羽联世界羽毛球培训中心主教练、首都体育学院羽毛球运动学教授肖杰两位大师坐镇球场，
								通过专业示范、细心讲解和多角度演示，专门针对羽毛球运动爱好者实战中的问题和疑惑，
								进行一对一地把脉诊断，并量身定做一个提高实战技能的运动处方。</li>
								<li><a href="/video/video_list.jsp">点击观看</a></li>
							</ul>
						</li>	
					</ul>
				</div>	
				<div class="active_info">
					<div class="hd">
						<h2>热门群组
						</h2>
					</div>
					<ul>
						<li class="info_l active">
							<div class="title_l">菁羽俱乐部</div>
							<ul class="detail_l">
								<li>QQ群：274938074</li>
								<li>网址：antsclub.cloudfoundry.com</li>
								<li>活动场地 菁英公寓、纳米园</li>
								<li>活动时间 每周二、三、六、日</li>
							</ul>
						</li>
						<li class="info_l active">
							<div class="title_l">哼哈羽球群</div>
							<ul class="detail_l">
								<li>QQ群：19768049</li>
								<li>网址：www.17workout.com</li>
								<li>活动场地 菁英公寓、纳米园</li>
								<li>活动时间 每周二、三、六、日</li>
							</ul>
						</li>		
					</ul>
				</div>
			</div>
		</div>
	</div>
</body>
</html>