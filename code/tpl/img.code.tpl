echo base64Img('{dir}');
function base64Img($image_file) {
	if(is_file(mb_convert_encoding($image_file,'GBK', 'auto'))){
		$image_file = str_replace('\\','/',mb_convert_encoding($image_file,'GBK', 'auto'));
	}
	else{
		$image_file = str_replace('\\','/',mb_convert_encoding($image_file,'UTF-8','auto'));
	}
    $base64_image = '';
    $image_info = getimagesize($image_file);
    $image_data = fread(fopen($image_file, 'r'), filesize($image_file));
    $base64_image = 'data:' . $image_info['mime'] . ';base64,' . chunk_split(base64_encode($image_data));
    return  '<moleft><img src="'.$base64_image.'" width="100%"/></moleft>';
}