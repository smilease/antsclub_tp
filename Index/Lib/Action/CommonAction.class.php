<?php
	//公用控制器
	class CommonAction extends Action{
		Public function _initialize () {
			$session_uname=session('uname');
	    	if($session_uname==''&&cookie('uname')){
	    		session('uname',cookie('uname'));
	    		session('uid',cookie('uid'));
	    		session('role',cookie('role'));
	    	}
		}
	}
?>