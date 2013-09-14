$(function () {
	$('#form_act').validate({
		errorElement : 'span',
		success : function (label) {
			label.addClass('success');
		},
		rules : {
			uname : {
				required : true,
			},
			pwd : {
				required : true,
			},
		},
		messages : {
			uname : {
				required : '登录名不能为空',
			},
			pwd : {
				required : '密码不能为空'
			},
		}
	});
	$('#submit_form').click(function(){
		$('#form_login').submit();
	});
	document.onkeydown = function(e){ 
	    var ev = document.all ? window.event : e;
	    if(ev.keyCode==13) {
	    	$('#form_login').submit();
	     }
	}
});