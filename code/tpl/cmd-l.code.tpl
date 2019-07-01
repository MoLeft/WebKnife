$a = '终端连接成功，此主机信息如下：<br>';
$a .= '操作系统：'.mb_convert_encoding(php_uname('s'),'UTF-8',mb_detect_encoding(php_uname('s'), array("ASCII",'UTF-8',"GB2312","GBK",'BIG5'))).'<br>';
$a .= '主机名称：'.mb_convert_encoding(php_uname('n'),'UTF-8',mb_detect_encoding(php_uname('n'), array("ASCII",'UTF-8',"GB2312","GBK",'BIG5'))).'<br>';
$a .= '版本名称：'.mb_convert_encoding(php_uname('r'),'UTF-8',mb_detect_encoding(php_uname('r'), array("ASCII",'UTF-8',"GB2312","GBK",'BIG5'))).'<br>';
$a .= '版本序号：'.mb_convert_encoding(php_uname('v'),'UTF-8',mb_detect_encoding(php_uname('v'), array("ASCII",'UTF-8',"GB2312","GBK",'BIG5'))).'<br>';
$a .= '核心类型：'.mb_convert_encoding(php_uname('m'),'UTF-8',mb_detect_encoding(php_uname('m'), array("ASCII",'UTF-8',"GB2312","GBK",'BIG5'))).'<br>';
$a .= '正在等待执行输入的指令...';
echo '<moleft>'.$a.'</moleft>';