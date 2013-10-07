$(function(){
	function checkTime(){
		var now = new Date(CurentTime());
		if(now>endTime){
			alert('活动已经结束了，不能报名了，下次赶早吧');
			return false;
		}
		if(now>startTime){
			alert('活动已经开始不能报名了，下次赶早吧');
			return false;
		}
		return true;
	}

	function CurentTime()
    { 
        var now = new Date();
        var year = now.getFullYear();       //年
        var month = now.getMonth() + 1;     //月
        var day = now.getDate();            //日
        var hh = now.getHours();            //时
        var mm = now.getMinutes();          //分
        var clock = year + "/";
       
        if(month < 10)
            clock += "0";
       
        clock += month + "/";
       
        if(day < 10)
            clock += "0";
           
        clock += day + " ";
       
        if(hh < 10)
            clock += "0";
           
        clock += hh + ":";
        if (mm < 10) clock += '0'; 
        clock += mm+":00"; 
        return(clock); 
    } 

	$('#btn_sign').click(function(){
		if(!checkTime()){
			return;
		}
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
		if(!checkTime()){
			return;
		}
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
	$('#dlg_btn_undo').click(function(){
		$('#dlg').dialog('close');
	});

	$('#btn_undo').click(function(){
		var now = new Date(CurentTime());
		if(now>endTime){
			alert('活动已经结束了，不能取消报名');
			return;
		}
		if(now>startTime){
			alert('活动已经开始了，不能取消报名');
			return;
		}
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