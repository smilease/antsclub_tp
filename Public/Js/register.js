$(function () {
	$('#form_act').validate({
		errorElement : 'span',
		success : function (label) {
			label.addClass('success');
		},
		rules : {
			uname : {
				required : true,
				remote : {
					url : checkUname,
					type : 'post',
					dataType : 'json',
					data : {
						uname : function () {
							return $('#uname').val();
						}
					}
				}
			},
			pwd : {
				required : true,
			},
			email : {
				remote : {
					url : checkEmail,
					type : 'post',
					dataType : 'json',
					data : {
						email : function(){
							return $('#email').val();
						}
					}
				}
			},
			nickname : {
				remote : {
					url : checkNickname,
					type : 'post',
					dataType : 'json',
					data : {
						nickname : function(){
							return $('#nickname').val();
						}
					}
				}
			}
		},
		messages : {
			uname : {
				required : '登录名不能为空',
				remote : '账号已存在'
			},
			pwd : {
				required : '密码不能为空'
			},
			email : {
				remote : '邮箱地址已存在'
			},
			nickname : {
				remote : '昵称已存在'
			}
		}
	});
	$('#submit_form').click(function(){
		$('#form_act').submit();
	});

	$('#go_login').click(function(){
		window.location.href = loginUrl;
	});

	$('#cancel_form').click(function(){
		window.location.href = cancleUrl;
	});

	document.onkeydown = function(e){ 
	    var ev = document.all ? window.event : e;
	    if(ev.keyCode==13) {
	    	$('#form_act').submit();
	     }
	}
});