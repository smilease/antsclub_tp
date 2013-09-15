<?php 
	/**
	* 注册和登录控制器
	*/
	class LoginAction extends CommonAction{
		
		public function register(){
			$this->display();
		}

		public function login(){
			$this->display();
		}

		public function runLogin(){
			if(!$this->isPost()){
				halt('页面不存在');
			}
			$uname=I('post.uname');
			$pwd=I('post.pwd','','md5');
			$auto=I('post.auto');

			$condition = array(
				'uname' => $uname,
				'pwd'=> $pwd
				);
			$user=M('User')->where($condition)->find();
			if($user){
				$uid=$user[id];
				$role=$user[role];
				if($user[nickname]){
					$uname=$user[nickname];
				}
				session('uid',$uid);
				session('uname',$uname);
				session('role',$role);
				if($auto=='on'){
					$time=30*24*3600;
					cookie('uid',$uid,$time);
					cookie('uname',$uname,$time);
					cookie('role',$role,$time);
				}
				myRedirect(__APP__,1,'登录成功，正在为您跳转');
			}else{
				myRedirect(U('login'),2,'用户名或密码错误,正在跳转回登陆页...');
			}
		}

		public function logout(){
			session('uid', null);
			session('uname',null);
			session('role',null);
			cookie('uid', null);
			cookie('uname',null);
			cookie('role',null);
			redirect(__APP__);
		}

		public function runRegis(){
			if(!$this->isPost()){
				halt('页面不存在');
			}
			$User= M('User');
			$uname=I('post.uname');
			$email=I('post.email');
			$nickname=I('post.nickname');
			$email=($email=='')?null:$email;
			$nickname=($nickname=='')?null:$nickname;
			if($User->create()) {
				$User->createTime=date('Y-m-d H:i:s',time());
				$User->pwd=I('post.pwd','','md5');
				$User->email=$email;
				$User->nickname=$nickname;
			    $id = $User->add();
		        if($id) {
		            session('uid',$id);
		            if($nickname!=null&&$nickname!=''){
		            	session('uname', $nickname);
		            }else{
		            	session('uname', $uname);
		            }
		            
		            //跳转至首页
		            myRedirect(__APP__, 2,'注册成功，正在为您跳转...');
		        }else{
		            halt('操作失败');
		        }
		    }
		}

		/**
		 * 异步验证字段是否已存在
		 */
		public function checkUnique(){
			if (!$this->isAjax()) {
				halt('页面不存在');
			}
			$cName = I('get.cName');
			$cValue = I('post.'.$cName);
			$where = array($cName=>$cValue);
			if(M('user')->where($where)->getField('id')){
				echo 'false';
			}else {
				echo "true";
			}
		}
	}
?>