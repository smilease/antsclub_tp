$(function(){
	$('#startTime').datetimebox({
		required: true
	});
	$('#endTime').datetimebox({
		required: true
	});
	$('#submit_form').click(function(){
		$('#form_act').submit();
	});
});