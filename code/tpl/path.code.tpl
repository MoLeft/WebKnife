echo path('{link}','{pass}','{dir}');
function path($link,$pass,$dir){
	if($dir=='dir'){
		$dir = str_replace('\\','/',dirname(__FILE__));
	}
	else{
		$dir = str_replace('\\','/',$dir);
	}
	$now_path = '<ul class="breadcrumb">';
	$count = count(explode('/',str_replace('\\','/',$dir)))-1;
	for($a=$count;$a>=0;$a--){
		$file_list[$a]=str_replace('\\','/',$dir);
		$dir=str_replace('\\','/',dirname($dir));
	}
	sort($file_list);
	if($count<1){
		$active = array_pop($file_list);
		$now_path .= '<li class="active">'.str_replace('/','',$active).'</li></ul>';
	}else{
		$first = array_shift($file_list);
		$active = array_pop($file_list);
		$now_path .= '<li><a onclick="openDir(\''.$link.'\',\''.$pass.'\',\''.str_replace('\\','/',$first).'\')">'.str_replace('/','',str_replace('\\','/',$first)).'</a></li>';
		foreach ($file_list as $path) { 
			@$now_path .= '<li><a onclick="openDir(\''.$link.'\',\''.$pass.'\',\''.str_replace('\\','/',$path).'\')">'.str_replace('/','',str_replace(str_replace('\\','/',dirname($path)),'',str_replace('\\','/',$path))).'</a></li>';
		}
		$now_path .= '<li class="active">'.str_replace('/','',str_replace(str_replace('\\','/',dirname($active)),'',str_replace('\\','/',$active))).'</li></ul>';
	}
	return '<moleft>'.$now_path.'</moleft>';
}