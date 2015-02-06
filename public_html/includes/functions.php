functions<?
require_once('config.php');
//please don't edit below this line
///////////////////////////////////////////////////////////
foreach($functions as $k => $v){
	if($v == true){
		//echo 'substr: '.substr($v,-3);
		if(substr($k, -3) == 'php'){
			include('includes/functions/'.$k);
		} else {
			$alinclude .= '<script type="text/javascript" src="includes/functions/'.$k.'"></script>
			';
		}
	}
}
echo '<!-- Functions Loaded -->';
?>
