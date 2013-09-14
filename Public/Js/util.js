function removeDotZero(s){
	if(s){
		s=s.replace('.0','');
		return s;
	}
	return '';
};

$.extend($.fn.validatebox.defaults.rules, {
	number:{         
		validator: function(value,param){
			var reg = /^[0-9]*$/;
			return reg.test(value);
		},
		message: "只能输入数字."
	}
});