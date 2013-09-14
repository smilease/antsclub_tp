<?php
function p ($arr) {
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
}
//自定义redirect方法，增加编码设置
function myRedirect($url,$timeout,$msg){
	header('Content-type:text/html;Charset=UTF-8');
	redirect($url,$timeout,$msg);
}