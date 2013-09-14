$(function(){
	$('#btn_sign').click(function(){
		if(maxNum!=''&&totalSignNum>=maxNum){
			alert('傻了吧，报名人数满了吧，下次赶早吧，骚年！');
		}else if(uid==''||uid==null){
			alert('请先登录才能报名');
		}else{
			$.ajax({
				url : signUrl,
				type : 'post',
				data : {actId: actId},
				dataType : 'json',
				success : function(r){
					$.messager.show({
						title:'提示',
						msg:r.msg,
						timeout:3000,
						showType:'slide'
					});
					if(r.success){
						totalSignNum++;
						signUsers=signUsers+', '+uname;
						if(signUsers.substring(0,1)===','){
							signUsers=signUsers.substring(1,signUsers.length);
						}
						$('#signUsers').html(signUsers+'</br> 共 '+totalSignNum+' 人');
						$('#span_signNum').html('已报名：<strong>'+totalSignNum+'</strong>人');
					}
				}
			});
		}
	});

	$('#btn_signMore').click(function(){
		if(uid==''||uid==null){
			alert('请先登录才能带人报名');
		}else{
			$('#dlg').dialog('open');
			$('#signName').val(uname+'(+1)');
		}
	});

	$('#dlg_btn_signMore').click(function(){
		var signName=$('#signName').val();
		var signNum=parseInt($('#signNum').val());
		if(signName==''){
			alert('请输入报名称呼');
			$('#signName').focus();
		}else if(signNum==''){
			alert('请输入报名人数');
			$('#signNum').focus();
		}else{
			$('#dlg').dialog('close');
			$.ajax({
				url : signMoreUrl,
				type : 'post',
				data : {
						actId : actId,
						signName : signName,
						signNum : signNum,
						maxNum : maxNum,
						totalSignNum : totalSignNum
						},
				dataType : 'json',
				success : function(r){
					console.info(r);
					if(r.success){
						$.messager.show({
							title : '提示',
							msg : r.msg,
							timeout : 3000,
							showType : 'slide'
						});
						signUsers=r.signUsers;
						totalSignNum=r.totalNum;
						$('#signUsers').html(r.signUsers+'</br> 共 '+totalSignNum+' 人');
						$('#span_signNum').html('已报名：<strong>'+totalSignNum+'</strong>人');
					}else{
						alert(r.msg);
					}
				}
			});
		}
		
	});

	$('#btn_undo').click(function(){
		$.ajax({
			url : undoUrl,
			type : 'post',
			data : {
				actId : actId
			},
			dataType : 'json' ,
			success : function(r){
				$.messager.show({
					title : '提示',
					msg : r.msg,
					timeout : 3000,
					showType : 'slide'
				});
				if(r.success){
					signUsers=r.signUsers;
					totalSignNum=r.totalNum;
					$('#signUsers').html(signUsers+'</br> 共 '+totalSignNum+' 人');
					$('#span_signNum').html('已报名：<strong>'+totalSignNum+'</strong>人');
				}
			}
		});
	});
})