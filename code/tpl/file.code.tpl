echo fileList('{dir}');
function fileList($dir_list){
	if($dir_list == 'dir'){
		$dir_list = str_replace('\\','/',dirname(__FILE__));
	}
	if(!is_dir($dir_list)){
		if(is_dir(mb_convert_encoding($dir_list,'GBK', 'auto'))){
			$dir = str_replace('\\','/',mb_convert_encoding($dir_list,'GBK', 'auto'));
		}
		else{
			$dir = str_replace('\\','/',mb_convert_encoding($dir_list,'UTF-8','auto'));
		}
	}
	else{
		$dir = str_replace('\\','/',$dir_list);
	}
	$file_list = array_filter(array_merge(getDir($dir),getFile($dir)));
	return '<moleft>dir|上层目录|'.mb_convert_encoding(dirname($dir),'UTF-8', mb_detect_encoding(dirname($dir), array("ASCII",'UTF-8',"GB2312","GBK",'BIG5'))).'||'.implode('||', $file_list).'</moleft>';
}
function getDir($dir){
    $dirArray[]=NULL;
    if (false != ($handle = opendir ( $dir ))) {
        $i=0;
        while ( false !== ($file = readdir ( $handle )) ) {
            if (is_dir($dir.'/'.$file)) {
	    		if($file != '.' && $file != '..'){
	    			//[0]类型|[1]文件夹名|[2]文件夹路径
	            	$file_en = mb_convert_encoding($file, 'UTF-8', mb_detect_encoding($file, array("ASCII",'UTF-8',"GB2312","GBK",'BIG5')));
	                $dirArray[$i]='dir|'.$file_en.'|'.mb_convert_encoding($dir.'/'.$file,'UTF-8', mb_detect_encoding($dir.'/'.$file, array("ASCII",'UTF-8',"GB2312","GBK",'BIG5')));
	                $i++;
	    		}
            }
        }
        closedir ( $handle );
    }
    return $dirArray;
}
function getFile($dir) {
    $fileArray[]=NULL;
    if (false != ($handle = opendir ( $dir ))) {
        $i=0;
        while ( false !== ($file = readdir ( $handle )) ) {
            if (is_file($dir.'/'.$file)) {
            	if(filesize($dir.'/'.$file)<1024){
					$filesize = filesize($dir.'/'.$file).'B';
				}
				if(filesize($dir.'/'.$file)>='1024' && filesize($dir.'/'.$file)<'1048576'){
					$filesize = round(filesize($dir.'/'.$file)/'1024','2').'KB';
				}
				if(filesize($dir.'/'.$file)>='1048576' && filesize($dir.'/'.$file)<'1073741824'){
					$filesize = round(filesize($dir.'/'.$file)/'1048576','2').'MB';
				}
				$houz_type = str_replace('.', '', strrchr($dir.'/'.$file,'.'));
					if($houz_type == 'png' || $houz_type == 'jpg' || $houz_type == 'gif' || $houz_type == 'jpeg'){
						$func_type = 'readImg';
						$text_type = '查看';
						$disabled = ' ';
					}else if($houz_type == 'ini' || $houz_type == 'php' || $houz_type == 'js' || $houz_type == 'css' || $houz_type == 'html' || $houz_type == 'txt'){
						$func_type = 'readFile';
						$text_type = '编辑';
						$disabled = ' ';
					}else if($houz_type == 'zip' || $houz_type == 'rar' || $houz_type == 'gz' || $houz_type == '7z'){
						$func_type = 'readZip';
						$text_type = '解压';
						$disabled = ' ';
					}else{
						$func_type = 'nullFunc';
						$text_type = '暂无';
						$disabled = 'disabled';
					}
					if(@date('Y-m-d H:i:s',filectime($dir.'/'.$file))){
						$file_c = @date('Y-m-d H:i:s',filectime($dir.'/'.$file));
					}
					else{
						$file_c = '1970-01-01 08:00:00';
					}
					if(@date('Y-m-d H:i:s',filemtime($dir.'/'.$file))){
						$file_m = @date('Y-m-d H:i:s',filectime($dir.'/'.$file));
					}
					else{
						$file_m = '1970-01-01 08:00:00';
					}
					$file_en = mb_convert_encoding($file, 'UTF-8', mb_detect_encoding($file, array("ASCII",'UTF-8',"GB2312","GBK",'BIG5')));
				//[0]类型|[1]文件名|[2]文件路径|[3]文件大小|[4]文件后缀|[5]处理函数|[6]显示文字|[7]是否激活|[8]创建时间|[9]修改时间
                $fileArray[$i]='file|'.$file_en.'|'.mb_convert_encoding($dir.'/'.$file,'UTF-8', mb_detect_encoding($dir.'/'.$file, array("ASCII",'UTF-8',"GB2312","GBK",'BIG5'))).'|'.$filesize.'|'.pathinfo($dir.'/'.$file,PATHINFO_EXTENSION).'|'.$func_type.'|'.$text_type.'|'.$disabled.'|'.$file_c.'|'.$file_m;            
                if($i==100){
                    break;
                }
                $i++;
            }
        }
        closedir ( $handle );
    }
    return $fileArray;
}