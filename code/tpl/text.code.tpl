header("Content-type: text/html; charset=utf-8");
echo readText('{dir}');
function readText($dir) {
    $start = base64_decode('PHRleHRhcmVhIGlkPSJjb2RlX2VkaXQiPg==');
    $end= base64_decode('PC90ZXh0YXJlYT4KPHNjcmlwdCB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiPgogICAgdmFyIGVkaXRvcj1Db2RlTWlycm9yLmZyb21UZXh0QXJlYShkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgiY29kZV9lZGl0IiksewogICAgICAgICAvL3BocOmrmOS6ruaYvuekugogICAgICAgICBtb2RlOiJ0ZXh0L3gtcGhwIiwKICAgICAgICAgLy9qYXZhc2NyaXB06auY5LquCiAgICAgICAgIG1vZGU6ImphdmFzY3JpcHQiLAogICAgICAgICAvL+aYvuekuuihjOWPtwogICAgICAgICBsaW5lTnVtYmVyczp0cnVlLAogICAgICAgICAvL+iuvue9ruS4u+mimAogICAgICAgICB0aGVtZToiZWNsaXBzZSIsCiAgICAgICAgIC8v5Luj56CB5oqY5Y+gCiAgICAgICAgIGxpbmVXcmFwcGluZzp0cnVlLAogICAgICAgICBmb2xkR3V0dGVyOiB0cnVlLAogICAgICAgICBndXR0ZXJzOlsiQ29kZU1pcnJvci1saW5lbnVtYmVycyIsICJDb2RlTWlycm9yLWZvbGRndXR0ZXIiXSwKICAgICAgICAgIC8v5ous5Y+35Yy56YWNCiAgICAgICAgICBtYXRjaEJyYWNrZXRzOnRydWUsCiAgICAgICAgICAvL+aZuuiDveaPkOekuiAKICAgICAgICAgIGV4dHJhS2V5czp7IkN0cmwiOiJhdXRvY29tcGxldGUifQp9KTsKZWRpdG9yLnNldFNpemUoJzEwMCUnLCc1NTBweCcpOwo8L3NjcmlwdD4=');
    if(is_file(mb_convert_encoding($dir,'GBK', 'auto'))){
			$dir = str_replace('\\','/',mb_convert_encoding($dir,'GBK', 'auto'));
	}
	else{
		$dir = str_replace('\\','/',mb_convert_encoding($dir,'UTF-8','auto'));
	}
    $text = file_get_contents($dir);
    $text = characet($text);
    $text = $start.htmlentities($text).$end;
    return  '<moleft>'.$text.'</moleft>';
}
function characet($data){
  if( !empty($data) ){
    $fileType = mb_detect_encoding($data , array('UTF-8','GBK','LATIN1','BIG5')) ;
    if( $fileType != 'UTF-8'){
      $data = mb_convert_encoding($data ,'utf-8' , $fileType);
    }
  }
  return $data;
}