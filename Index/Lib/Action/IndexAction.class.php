<?php
	// 首页控制器
	class IndexAction extends CommonAction {
	    public function index(){
	    	$data=session('uname');
	    	if($data){
	    		$this->data = $data;
	    	}else if(cookie('uname')){
	    		$this->data = cookie('uname');
	    	}
			$this->badmintonList=M('activity')->where('typeCode="badminton"')->order('createTime desc')->limit(3)->select();
			$this->swimmingList=M('activity')->where('typeCode="swimming"')->order('createTime desc')->limit(3)->select();
			$this->billiardsList=M('activity')->where('typeCode="billiards"')->order('createTime desc')->limit(3)->select();

	    	$this->display();
	    }

	    public function wait(){
	    	myRedirect(__APP__,2,'功能建设中，稍后推出，现在为您跳转回首页');
	    }
	}