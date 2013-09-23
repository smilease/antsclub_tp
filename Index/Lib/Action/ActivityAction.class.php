<?php
	//活动控制器
	class ActivityAction extends CommonAction{
		public function  add(){
			$this->pageTitle='创建活动';
			$this->display('activity');
		}

		public function saveOrUpdate(){
			$type = array(
				'badminton' => '羽毛球', 
				'billiards' => '桌球',
				'swimming' => '游泳',
				'other' => '其他'
			);
			$m=M('activity');
			if($m->create()){
				$m->createTime=date('Y-m-d H:i:s',time());
				$m->typeName=$type[$m->typeCode];
				if($m->id){
					if($m->save()){
						$msg='活动更新成功，正在为您跳转到首页';
					}else{
						$msg='活动更新失败，正在为您跳转到首页';
					}
				}else{
					if($m->maxNum==''){
						$m->maxNum=null;
					}
					if($m->add()){
						$msg='活动发布成功，正在为您跳转到首页';
					}else{
						$msg='活动发布失败，正在为您跳转到首页';
					}
				}
				myRedirect(__APP__,1,$msg);
			}else{

			}

		}
		public function edit(){
			$id=I('get.id');
			$this->activity=M('activity')->find($id);
			$this->pageTitle='编辑活动';
			$this->display('activity');
		}
		public function view(){
			$id=I('get.id');
			//$this->activity=M('activity')->where('id='.$id)->find();
			$sql='select a.*,ua.signName,ua.signNum,ua.userName from activity a '
					.' left join user_activity ua on a.id=ua.activityId '
					.' where a.id="'.$id.'" order by ua.signTime';
			$Model = new Model();// 实例化一个model对象 没有对应任何数据表
			$data=$Model->query($sql);	
			$signUsers='';
			$totalNum=0;
			
			foreach ($data as $v) {
				//p($v[signName]);
				$signUsers.=$v[signName].', ';
				$totalNum+=$v[signNum];
			}
			$signUsers=substr($signUsers, 0,strlen($signUsers)-2);
			// echo $signUsers;
			// echo $totalNum;
			$activity = array(
				'id' => $data[0][id],
				'typeName' => $data[0][typeName], 
				'title' => $data[0][title], 
				'startTime' => $data[0][startTime],
				'endTime' => $data[0][endTime],
				'address' => $data[0][address],
				'detail' => $data[0][detail],
				'maxNum' => $data[0][maxNum],
				'signUsers' => $signUsers,
				'totalNum' => $totalNum
			);

			$this->activity=$activity;
			$this->display();
		}
		public function more(){
			$typeCode=I('get.c');
			if($typeCode=='ba'){
				$this->title='羽毛球';
				$typeCode='badminton';
			}elseif ($typeCode=='sw') {
				$this->title='游泳';
				$typeCode='swimming';
			}elseif ($typeCode='bi') {
				$this->title='桌球';
				$typeCode='billiards';
			}
			$this->list=M('activity')->where('typeCode="'.$typeCode.'"')
							->order('createTime desc')->limit(12)->select();
			$this->display();
		}

		public function sign(){
			$actId=I('post.actId');
			$uid=session('uid');
			$uname=session('uname');

			$condition = array(
				'activityId' => $actId, 
				'userId' => $uid
			);

			$m=M('user_activity');
			if($m->where($condition)->find()){
				$success=false;
				$msg='您已经报过名了，不能重复报名，如需新增报名人员，请点击带人报名';
			}else{
				$m->activityId=$actId;
				$m->userId=$uid;
				$m->userName=$uname;
				$m->signName=$uname;
				$m->signNum=1;
				$m->signTime=date('Y-m-d H:i:s',time());
				if($m->add()){
					$success=true;
					$msg='报名成功';
				}
			}
			
			$r=array(
				'success' => $success,
				'msg' => $msg
				 );
			echo json_encode($r);
		}

		public function signMore(){
			$actId=I('post.actId');
			$signName=I('post.signName');
			$signNum=I('post.signNum');
			$maxNum=I('post.maxNum');
			$totalSignNum=I('post.totalSignNum');
			$uid=session('uid');
			$uname=session('uname');
			$condition = array(
				'activityId' => $actId, 
				'userId' => $uid
			);
			$m=M('user_activity');
			$existSignNum=$m->where($condition)->getField('signNum');
			$v=$totalSignNum-$existSignNum+$signNum;
			$success=true;
			if($maxNum){
				if($existSignNum){
					if($totalSignNum-$existSignNum+$signNum>$maxNum){
						$success=false;	
						$msg='报名人数超上限，报名失败，下次早点报名吧';
					}
				}else if(($totalSignNum+$signNum)>$maxNum){
					$success=false;	
					$msg='报名人数超上限，报名失败，下次赶早吧';
				}
			}

			if($success){
				$m->where($condition)->delete();
				$m->activityId=$actId;
				$m->userId=$uid;
				$m->userName=$uname;
				$m->signName=$signName;
				$m->signNum=$signNum;
				$m->signTime=date('Y-m-d H:i:s',time());
				if($m->add()){
					$msg='带人报名成功';
					$sql='select ua.signName,ua.signNum from activity a '
							.' left join user_activity ua on a.id=ua.activityId '
							.' where a.id="'.$actId.'" order by ua.signTime';
					$Model = new Model();// 实例化一个model对象 没有对应任何数据表
					$data=$Model->query($sql);	
					$signUsers='';
					$totalNum=0;
					foreach ($data as $v) {
						$signUsers.=$v[signName].', ';
						$totalNum+=$v[signNum];
					}
					$signUsers=substr($signUsers, 0,strlen($signUsers)-2);
				}else{
					$success=false;
					$msg='系统异常，请联系管理员';
				}

			}
		
			$r=array(
				'success' => $success,
				'msg' => $msg,
				'signUsers' => $signUsers,
				'totalNum' => $totalNum
			);
			echo json_encode($r);
		}

		public function undo(){
			$actId=I('post.actId');
			$uid=session('uid');
			$condition = array(
				'activityId' => $actId, 
				'userId' => $uid
			);
			$m=M('user_activity');
			if($m->where($condition)->delete()){
				$success=true;
				$msg='报名取消成功';
				$sql='select ua.signName,ua.signNum from activity a '
						.' left join user_activity ua on a.id=ua.activityId '
						.' where a.id="'.$actId.'" order by ua.signTime';
				$Model = new Model();// 实例化一个model对象 没有对应任何数据表
				$data=$Model->query($sql);	
				$signUsers='';
				$totalNum=0;
				
				foreach ($data as $v) {
					$signUsers.=$v[signName].', ';
					$totalNum+=$v[signNum];
				}
				$signUsers=substr($signUsers, 0,strlen($signUsers)-2);
			}else{
				$msg='报名取消失败，亲，你报名了没？';
			}
			$r=array(
				'success' => $success,
				'msg' => $msg,
				'signUsers' => $signUsers,
				'totalNum' => $totalNum
			);
			echo json_encode($r);
		}

	}
?>