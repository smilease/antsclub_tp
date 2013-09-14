$.fn.datebox.defaults.formatter = function(date){
	var y = format(date.getFullYear());
	var m = format(date.getMonth()+1);
	var d = format(date.getDate());
	return y+'-'+m+'-'+d;
}
function format(s){
	if(s<10){
		return '0'+s;
	}else{
		return s;
	}
}